package com.tdah_training.vista;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.matematica.OperacionesActivity;
import com.tdah_training.modelo.Docente;
import com.tdah_training.modelo.Estudiante;

import java.util.ArrayList;

public class DocenteActivity extends AppCompatActivity {
    private Estudiante estSeleccionado = null;
    private Docente docLogeado = null;

    private TextView txtNombreDoc, txtApellidoDoc;
    private ImageView img_doc, img_est;
    private TextView txtNombreEst, txtApellidoEst, txtNivel, txtScore, txtCurso;
    private Spinner spEstudiante, spNuevoNivel;
    private Button btActualizarNivel;

    private ArrayList<Estudiante> listPerson;
    ArrayAdapter<Estudiante> arrayAdapter;
    private DatabaseReference myRef;
    private ValueEventListener valueEventListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_docente);

        myRef = FirebaseDatabase.getInstance().getReference();
        docLogeado = (Docente) getIntent().getSerializableExtra(Constantes.DOCENTE);

        //bienvenida();

        obtenerComponentes();
        añadirEventos();
        cargarDatosDoc();
        llenarSpinerestudiantes();
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_docente, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.icon_administrar: {
                try {
                    adminstrarEstudiantes();
                } catch (Exception e) {
                    Toast.makeText(null, e.getMessage(), Toast.LENGTH_LONG).show();
                }

            }
            break;
            case R.id.icon_cerrar_sesion_doc: {
                AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setMessage("¿Desea cerrar la sesión?")
                        .setTitle("Cerrar sesión")
                        .setCancelable(false)
                        .setIcon(R.drawable.log)
                        .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                cerrarSesion();
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

            default:
                break;
        }
        return true;

    }

    private void obtenerComponentes() {
        listPerson = new ArrayList<>();

        txtNombreDoc = findViewById(R.id.textNombresDoc);
        txtApellidoDoc = findViewById(R.id.textApellidosDoc);
        img_doc = findViewById(R.id.img_doc);

        txtNombreEst = findViewById(R.id.textNombresEst);
        txtApellidoEst = findViewById(R.id.textApellidosEst);
        txtScore = findViewById(R.id.textScore);
        txtCurso = findViewById(R.id.textCurso);
        txtNivel = findViewById(R.id.textNivel);
        img_est = findViewById(R.id.img_doc_est);

        spEstudiante = findViewById(R.id.spin_estudiantes);
        spNuevoNivel = findViewById(R.id.spin_nuevo_nivel);

        btActualizarNivel = findViewById(R.id.bt_actualizar_nivel);
    }

    private void añadirEventos() {
        //click en item de spiner
        spEstudiante.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                if (listPerson.size() > 0) {
                    estSeleccionado = (Estudiante) listPerson.get(i);
                    cargarDatosEst();
                } else {
                    limpiarCampos();
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {
                limpiarCampos();
            }
        });

        //boton guardar nivel
        btActualizarNivel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    estSeleccionado.setNivel(spNuevoNivel.getSelectedItem().toString());
                    estSeleccionado.setFecha_ultima_modificacion(Operaciones.getFecha());
                    myRef.child(Constantes.ESTUDIANTE).child(estSeleccionado.getId()).setValue(estSeleccionado).addOnCompleteListener(new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            Toast.makeText(DocenteActivity.this, "Nivel actualizado para " + estSeleccionado.toString(), Toast.LENGTH_SHORT).show();
                            cargarDatosEst();
                        }
                    });

                } catch (Exception e) {
                    Toast.makeText(DocenteActivity.this, "Error boton actualizar nivel:" + e.getMessage(), Toast.LENGTH_LONG).show();
                }

            }
        });
    }

    private void adminstrarEstudiantes() {
        Toast.makeText(this, "Administrar estudiantes", Toast.LENGTH_LONG).show();
        Intent intent = new Intent(DocenteActivity.this, DocenteCrudActivity.class);
        intent.putExtra(Constantes.DOCENTE, docLogeado);
        startActivity(intent);
        finish();
    }

    private void cargarDatosDoc() {
        try {
            //asignamos valores a los campos docente
            txtNombreDoc.setText(docLogeado.getNombres());
            txtApellidoDoc.setText(docLogeado.getApellidos());

            if (docLogeado.getSexo().toLowerCase().equals("masculino")) {
                img_doc.setBackgroundResource(R.drawable.ic_doc_masculino);
            } else if (docLogeado.getSexo().toLowerCase().equals("femenino")) {
                img_doc.setBackgroundResource(R.drawable.ic_doc_femenino);
            } else {
                img_doc.setBackgroundResource(R.drawable.ic_otros);
            }
        } catch (Exception e) {
            Toast.makeText(this, "Error cargar Datos docentes:" + e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    private void cargarDatosEst() {
        try {
            txtNombreEst.setText(estSeleccionado.getNombres());
            txtApellidoEst.setText(estSeleccionado.getApellidos());
            txtScore.setText(String.valueOf(estSeleccionado.getScore()));
            txtNivel.setText(estSeleccionado.getNivel());
            txtCurso.setText(estSeleccionado.getCurso());

            if (estSeleccionado.getSexo().toLowerCase().equals("masculino")) {
                img_est.setBackgroundResource(R.drawable.ic_est_masculino);
            } else if (estSeleccionado.getSexo().toLowerCase().equals("femenino")) {
                img_est.setBackgroundResource(R.drawable.ic_est_femenino);
            } else {
                img_est.setBackgroundResource(R.drawable.ic_otros);
            }
        } catch (Exception e) {
            Toast.makeText(this, "Error cargar Datos estudiantes:" + e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    private void llenarSpinerestudiantes() {
        myRef.child("Estudiante").addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                listPerson.clear();

                if (snapshot.exists()) {
                    for (DataSnapshot dat : snapshot.getChildren()) {
                        try {
                            Estudiante e = dat.getValue(Estudiante.class);

                            if (e.getId_docente().equals(docLogeado.getId())) {
                                listPerson.add(e);
                            }
                        } catch (Exception ex) {
                            Log.e("Error spiner", ex.getMessage());
                            Toast.makeText(DocenteActivity.this, ex.getMessage(), Toast.LENGTH_LONG).show();
                        }
                        arrayAdapter = new ArrayAdapter<Estudiante>(DocenteActivity.this, android.R.layout.simple_spinner_dropdown_item, listPerson);
                        spEstudiante.setAdapter(arrayAdapter);
                    }
                } else {
                    Toast.makeText(getBaseContext(), "No hay datos", Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        });
    }

    private void limpiarCampos() {
        txtNombreEst.setText("");
        txtApellidoEst.setText("");
        txtScore.setText("");
        txtNivel.setText("");
        txtCurso.setText("");
    }

    private void cerrarSesion() {
        Toast.makeText(DocenteActivity.this, "Sesión cerrada", Toast.LENGTH_SHORT).show();
        startActivity(new Intent(DocenteActivity.this, LoginActivity.class));
        finish();
    }
}
