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
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.modelo.Docente;
import com.tdah_training.modelo.Estudiante;

import java.util.ArrayList;
import java.util.List;

public class DocenteCrudActivity extends AppCompatActivity {

    private static final java.util.UUID UUID = null;
    private List<Estudiante> listPerson = new ArrayList<Estudiante>();
    ArrayAdapter<Estudiante> arrayAdapter;


    EditText txtNombres, txtApellidos, txtCorreo, txtContraseña, txtCurso;
    Spinner spSexo;
    ListView lstReg;

    private boolean res;
    private String nombres, apellidos, sexo, curso, correo, contrasena, nivel;
    private int score;
    private DatabaseReference myRef;
    private Docente docLogeado;
    private Estudiante estSelec;
    private ValueEventListener valueEventListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_estudante_crud);

        //instanciamos el componente de la base de datos firebase
        myRef = FirebaseDatabase.getInstance().getReference();
        //obtenemos el objeto docente que se envió desde la vista anterior
        docLogeado = (Docente) getIntent().getSerializableExtra(Constantes.DOCENTE);

        obtenerComponentes();
        agregarEventos();
        listarDatosEstudiantes();
    }


    @Override
    public void onBackPressed() {
        // do nothing.
    }

    private void obtenerComponentes() {
        try {
            txtNombres = findViewById(R.id.crud_nombres_est);
            txtApellidos = findViewById(R.id.crud_apellidos_est);
            txtCorreo = findViewById(R.id.crud_correo_est);
            txtContraseña = findViewById(R.id.crud_contrasena_est);
            txtCurso = findViewById(R.id.crud_curso_est);
            spSexo = findViewById(R.id.crud_sexo_est);

            lstReg = findViewById(R.id.lv_datosEstudiantes);

        } catch (Exception e) {
            Toast.makeText(DocenteCrudActivity.this, e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    private void agregarEventos() {
        //Para obtener los datos del estudiante de la lista al formulario
        lstReg.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                estSelec = (Estudiante) parent.getItemAtPosition(position);
                cargarDatosEst();
            }
        });
    }

    private void cargarDatosEst() {
        txtNombres.setText(estSelec.getNombres());
        txtApellidos.setText(estSelec.getApellidos());
        txtCorreo.setText(estSelec.getCorreo());
        txtContraseña.setText(estSelec.getContrasena());
        txtCurso.setText(estSelec.getCurso());

        for (int i = 0; i < spSexo.getCount(); i++) {
            if (spSexo.getItemAtPosition(i).toString().equals(estSelec.getSexo())) {
                spSexo.setSelection(i);
            }
        }
    }

    //se establece el evento escucha para una sola vez para los cambios de la tabla ESTUDIANTE
    //esto quiere decir que el listener solo se actualizará una vez
    private void listarDatosEstudiantes() {
        myRef.child(Constantes.ESTUDIANTE).addValueEventListener(new ValueEventListener() {
            @Override
            //obtenemos la lista de objetos de los estudiantes desde la base de datos
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                //limpiamos la lista de estudiantes
                listPerson.clear();
                try {
                    //recorremos el conjunto de objetos de estudiantes obtenidos desde la base de datos
                    for (DataSnapshot dh : dataSnapshot.getChildren()) {
                        //obtenemos uno a uno y realizamos casting respectivo
                        Estudiante e = dh.getValue(Estudiante.class);
                        //comparamos que pertenezca al docente que inició sesión
                        if (e.getId_docente().equals(docLogeado.getId())) {
                            listPerson.add(e);//se los agrega a la lista
                        }
                    }
                    //definimos al adaptador de tipo de la lista como la lista Persona
                    arrayAdapter = new ArrayAdapter<>(DocenteCrudActivity.this, android.R.layout.simple_list_item_1, listPerson);
                    //finalmente asignamos el adaptador a la lista de la interfaz gráfica
                    lstReg.setAdapter(arrayAdapter);
                } catch (Exception e) {
                    Toast.makeText(DocenteCrudActivity.this, e.getMessage(), Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    //verifica si algún campo está vacío
    private boolean camposVacios() {
        if (nombres.equals("") || correo.equals("") || contrasena.equals("") || apellidos.equals("")) {
            return true;
        } else {
            return false;
        }
    }

    //obtenemos los dato de la vista y los asignamos a las variables globales, para luego asignar al objeto estudiante
    private void extraerdatos() {
        nombres = txtNombres.getText().toString().trim();
        correo = txtCorreo.getText().toString().trim();
        contrasena = txtContraseña.getText().toString().trim();
        apellidos = txtApellidos.getText().toString().trim();
        curso = txtCurso.getText().toString().trim();
        sexo = spSexo.getSelectedItem().toString();

        nivel = "nivel 1";
        score = 0;
    }

    //impiar las campos de la interfaz gráfica
    private void limpiarCajas() {
        txtNombres.setText("");
        txtApellidos.setText("");
        txtCorreo.setText("");
        txtContraseña.setText("");
        txtCurso.setText("");
        spSexo.setSelection(0);
    }

    //valida que ningún campos del formulario de estudiates esté vacío
    private void validacion() {
        if (nombres.equals("")) {
            txtNombres.setError("Required");
        } else if (apellidos.equals("")) {
            txtApellidos.setError("Required");
        } else if (correo.equals("")) {
            txtCorreo.setError("Required");
        } else if (contrasena.equals("")) {
            txtContraseña.setError("Required");
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_docente_crud, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        //extraemos los datos del estudiante
        extraerdatos();

        switch (item.getItemId()) {
            //agregar un estudiante
            case R.id.icon_agregar_doc: {
                if (camposVacios()) {
                    validacion();
                } else {
                    try {
                        agregarEstudiante();
                        limpiarCajas();
                    } catch (Exception e) {
                        Toast.makeText(DocenteCrudActivity.this, e.toString(), Toast.LENGTH_LONG).show();
                    }

                }
                break;
            }
            //actualizar un estudiante
            case R.id.icon_actualizar_doc: {
                if (camposVacios()) {
                    validacion();
                } else {
                    //presentamos un cuadro de dialogo para que el usuario confirme realizar esta acción
                    AlertDialog.Builder builder = new AlertDialog.Builder(this);
                    builder.setMessage("¿Desea actualizar el registro?")
                            .setTitle("Administración de estudiantes")
                            .setCancelable(false)
                            .setIcon(R.drawable.log)
                            .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    actualizarEstudiante();
                                    limpiarCajas();
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
            case R.id.icon_eliminar_doc:
                if (camposVacios()) {
                    validacion();
                } else {
                    //presentamos un cuadro de dialogo para que el usuario confirme realizar esta acción
                    AlertDialog.Builder builder = new AlertDialog.Builder(this);
                    builder.setMessage("¿Desea eliminar el registro?")
                            .setTitle("Administración de estudiantes")
                            .setCancelable(false)
                            .setIcon(R.drawable.log)
                            .setPositiveButton(R.string.si, new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {
                                    eliminarEstudiante();
                                    limpiarCajas();
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

            case R.id.icon_regresar_doc:
                //regresar
                Intent intent = new Intent(DocenteCrudActivity.this, DocenteActivity.class);
                intent.putExtra(Constantes.DOCENTE, docLogeado);
                startActivity(intent);
                finish();
                break;
        }
        return true;
    }

    //para eliminar estduiante seleccionado
    private void eliminarEstudiante() {
        myRef.child(Constantes.ESTUDIANTE)
                .child(estSelec.getId()).removeValue().addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(DocenteCrudActivity.this, "Estudiante eliminado", Toast.LENGTH_SHORT).show();
            }
        });

    }

    //para actualizar estduiante seleccionado
    private void actualizarEstudiante() {
        estSelec.setNombres(nombres);
        estSelec.setApellidos(apellidos);
        estSelec.setSexo(sexo);
        estSelec.setCurso(curso);
        estSelec.setCorreo(correo);
        estSelec.setContrasena(contrasena);
        estSelec.setFecha_ultima_modificacion(Operaciones.getFecha());

        myRef.child(Constantes.ESTUDIANTE)
                .child(estSelec.getId()).setValue(estSelec).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(DocenteCrudActivity.this, "Estudiante actualizado", Toast.LENGTH_LONG).show();
            }
        });
    }

    //para agregar estudiante nuevo
    private void agregarEstudiante() {
        Estudiante e = new Estudiante();
        //asociación con el docente que lo crea
        e.setId_docente(docLogeado.getId());
        e.setId(UUID.randomUUID().toString());//se genera un id automático
        e.setNombres(txtNombres.getText().toString());
        e.setApellidos(txtApellidos.getText().toString());
        e.setSexo(spSexo.getSelectedItem().toString());
        e.setCurso(txtCurso.getText().toString());
        e.setCorreo(txtCorreo.getText().toString());
        e.setContrasena(txtContraseña.getText().toString());
        //datos constantes
        e.setNivel(nivel);
        e.setScore(score);
        e.setFecha_creacion(Operaciones.getFecha());
        e.setFecha_ultima_modificacion(Operaciones.getFecha());
        //guardar en base
        myRef.child(Constantes.ESTUDIANTE)
                .child(e.getId()).setValue(e).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                //indicar mensaje al ususario
                Toast.makeText(DocenteCrudActivity.this, "Estudiante agregado", Toast.LENGTH_LONG).show();
            }
        });
    }
}
