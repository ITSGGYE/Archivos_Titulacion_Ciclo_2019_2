package com.tdah_training.vista;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.modelo.Docente;

import java.util.ArrayList;
import java.util.List;

public class AdminCrudActivity extends AppCompatActivity {

    private static final java.util.UUID UUID = null;
    private List<Docente> listPerson = new ArrayList<Docente>();
    ArrayAdapter<Docente> arrayAdapter;

    EditText txtNombres, txtApellidos, txtCorreo, txtContraseña;
    Spinner spSexo;
    ListView lstReg;
    Docente docSeleccionado;
    String nombre, apellido, correo, contrasena, sexo;

    //Objetos firebase
    private DatabaseReference myRef;
    private FirebaseAuth auten;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_docente_crud);

        inicarFirebase();

        txtNombres = findViewById(R.id.crud_nombres_doc);
        txtApellidos = findViewById(R.id.crud_apellidos_est);
        txtCorreo = findViewById(R.id.crud_correo_doc);
        txtContraseña = findViewById(R.id.crud_contraseña_doc);
        spSexo = findViewById(R.id.crud_sexo_doc);
        lstReg = findViewById(R.id.lv_datosDocentes);

        listarDatos();

        lstReg.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                docSeleccionado = (Docente) parent.getItemAtPosition(position);
                txtNombres.setText(docSeleccionado.getNombres());
                txtApellidos.setText(docSeleccionado.getApellidos());
                txtCorreo.setText(docSeleccionado.getCorreo());
                txtContraseña.setText(docSeleccionado.getContrasena());

                for (int i = 0; i < spSexo.getCount(); i++) {
                    if (spSexo.getItemAtPosition(i).toString().equals(docSeleccionado.getSexo())) {
                        spSexo.setSelection(i);
                    }
                }
            }
        });
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_administrador_crud, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        nombre = txtNombres.getText().toString().trim();
        apellido = txtApellidos.getText().toString().trim();
        sexo = spSexo.getSelectedItem().toString();
        correo = txtCorreo.getText().toString().trim();
        contrasena = txtContraseña.getText().toString().trim();

        switch (item.getItemId()) {
            //AGREGAR UN DOCENTE
            case R.id.icon_agregar_adm: {
                if (camposVacios()) {
                    validacion();
                } else {

                    auten.createUserWithEmailAndPassword(correo, contrasena).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {
                            if (task.isSuccessful()) {
                                Docente d = new Docente();
                                d.setId(task.getResult().getUser().getUid());
                                d.setNombres(nombre);
                                d.setApellidos(apellido);
                                d.setCorreo(correo);
                                d.setContrasena(contrasena);
                                d.setSexo(sexo);

                                myRef.child(Constantes.DOCENTE).child(d.getId()).setValue(d).addOnCompleteListener(new OnCompleteListener<Void>() {
                                    @Override
                                    public void onComplete(@NonNull Task<Void> task) {
                                        Toast.makeText(AdminCrudActivity.this, "Agregado", Toast.LENGTH_LONG).show();
                                        limpiarCajas();
                                    }
                                });
                            }
                        }
                    });
                }
                break;
            }
            case R.id.icon_actualizar_adm: {
                if (camposVacios()) {
                    validacion();
                } else {

                    AlertDialog.Builder builder = new AlertDialog.Builder(this);
                    builder.setMessage("¿Desea actualizar el registro?")
                            .setTitle("Administración de docentes")
                            .setCancelable(false)
                            .setIcon(R.drawable.log)
                            .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {

                                    docSeleccionado.setNombres(txtNombres.getText().toString().trim());
                                    docSeleccionado.setApellidos(txtApellidos.getText().toString().trim());
                                    docSeleccionado.setCorreo(txtCorreo.getText().toString().trim());
                                    docSeleccionado.setContrasena(txtContraseña.getText().toString().trim());
                                    docSeleccionado.setSexo(spSexo.getSelectedItem().toString());

                                    myRef.child(Constantes.DOCENTE).child(docSeleccionado.getId()).setValue(docSeleccionado).addOnCompleteListener(new OnCompleteListener<Void>() {
                                        @Override
                                        public void onComplete(@NonNull Task<Void> task) {
                                            Toast.makeText(AdminCrudActivity.this, "Actualizado", Toast.LENGTH_LONG).show();
                                            limpiarCajas();
                                        }
                                    });
                                }
                            })
                            .setNegativeButton(R.string.cancel, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    // User cancelled the dialog
                                }
                            });
                    // Create the AlertDialog object and return it
                    builder.create();
                    builder.show();
                }
                break;
            }
            case R.id.icon_eliminar_adm: {
                if (camposVacios()) {
                    validacion();
                } else {

                    AlertDialog.Builder builder = new AlertDialog.Builder(this);
                    builder.setMessage("¿Desea eliminar el registro?")
                            .setTitle("Administración de docentes")
                            .setCancelable(false)
                            .setIcon(R.drawable.log)
                            .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    myRef.child(Constantes.DOCENTE).child(docSeleccionado.getId()).removeValue().addOnCompleteListener(new OnCompleteListener<Void>() {
                                        @Override
                                        public void onComplete(@NonNull Task<Void> task) {
                                            Toast.makeText(AdminCrudActivity.this, "Eliminado", Toast.LENGTH_LONG).show();
                                            limpiarCajas();
                                        }
                                    });
                                }
                            })
                            .setNegativeButton(R.string.cancel, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    // User cancelled the dialog
                                }
                            });
                    // Create the AlertDialog object and return it
                    builder.create();
                    builder.show();
                }
                break;
            }
            default: {
                //cerrar sesión
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setMessage("¿Desea cerrar la sesión?")
                        .setTitle("Cerrar sesión")
                        .setCancelable(false)
                        .setIcon(R.drawable.log)
                        .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                //MyApp.logout();

                                Toast.makeText(AdminCrudActivity.this, "Sesión cerrada", Toast.LENGTH_SHORT).show();
                                Intent intent = new Intent(AdminCrudActivity.this, LoginActivity.class);
                                startActivity(intent);
                                finish();
                            }
                        })
                        .setNegativeButton(R.string.cancel, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                // User cancelled the dialog
                            }
                        });
                // Create the AlertDialog object and return it
                builder.create();
                builder.show();
                break;
            }
        }
        return true;
    }

    private void inicarFirebase() {
        myRef = FirebaseDatabase.getInstance().getReference();
        auten = FirebaseAuth.getInstance();
    }

    private void listarDatos() {
        myRef.child(Constantes.DOCENTE).addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                listPerson.clear();
                for (DataSnapshot dh : dataSnapshot.getChildren()) {
                    Docente d = dh.getValue(Docente.class);
                    listPerson.add(d);
                }
                arrayAdapter = new ArrayAdapter<Docente>(AdminCrudActivity.this, android.R.layout.simple_list_item_1, listPerson);
                lstReg.setAdapter(arrayAdapter);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    private boolean camposVacios() {
        if (nombre.equals("") || correo.equals("") || contrasena.equals("") || apellido.equals("") || sexo.equals("SELECCIONE")) {
            return true;
        } else {
            return false;
        }
    }

    private void limpiarCajas() {
        txtNombres.setText("");
        txtApellidos.setText("");
        txtCorreo.setText("");
        txtContraseña.setText("");
        spSexo.setSelection(0);
    }

    private void validacion() {
        nombre = txtNombres.getText().toString();
        correo = txtCorreo.getText().toString();
        contrasena = txtContraseña.getText().toString();
        apellido = txtApellidos.getText().toString();

        if (nombre.equals("")) {
            txtNombres.setError("Required");
        } else if (apellido.equals("")) {
            txtApellidos.setError("Required");
        } else if (correo.equals("")) {
            txtCorreo.setError("Required");
        } else if (contrasena.equals("")) {
            txtContraseña.setError("Required");
        } else if (spSexo.getSelectedItemPosition() == 0) {

        }
    }

}
