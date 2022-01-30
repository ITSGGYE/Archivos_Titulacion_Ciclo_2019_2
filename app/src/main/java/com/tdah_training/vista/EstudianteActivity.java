package com.tdah_training.vista;

import android.annotation.SuppressLint;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.matematica.TrianguloActivity;
import com.tdah_training.matematica.OperacionesActivity;
import com.tdah_training.memorizacion.MemoriaActivity;
import com.tdah_training.memorizacion.RompecabezasActivity;
import com.tdah_training.modelo.Docente;
import com.tdah_training.modelo.Estudiante;

public class EstudianteActivity extends AppCompatActivity implements View.OnClickListener  {
    private DatabaseReference myRef;
    private TextView txtNombreEst, txtApellidoEst, txtNivel, txtScore, txtCurso;
    private Button btJgoRompe, btJgoMemo, btJgoOpe, btJgoAreas;
    private ImageView img_est;
    private Estudiante estLogeado = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_estudiante);
        estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);
        myRef = FirebaseDatabase.getInstance().getReference();
        obtenerComponentes();
        agregarEvento();
        cargarDatosEst();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_estudiante, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case R.id.icon_cerrar_sesion_est: {
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
        }
        return true;
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    //estas son las opciones de juegos
    @Override
    public void onClick(View view) {
        Intent intent = null;
        //evaluamos que botón de juego pulsó el estudiante
        switch (view.getId()) {
            case R.id.bt_juego_rompecabeza: //botón rompecabezas
                intent = new Intent(EstudianteActivity.this, RompecabezasActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                finish();
                break;
            case R.id.bt_juego_memoria://botón memoria
                intent = new Intent(EstudianteActivity.this, MemoriaActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                finish();
                break;
            case R.id.bt_juego_operaciones://botón operaciones matemáticas
                intent = new Intent(EstudianteActivity.this, OperacionesActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                finish();
                break;
            case R.id.bt_juego_triangulo://botón triángulo mágico
                intent = new Intent(EstudianteActivity.this, TrianguloActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                finish();
                break;
        }
        estLogeado =null;
    }

    //obtenemos los componentes de la interfaz gráfica
    private void obtenerComponentes() {
        txtNombreEst = findViewById(R.id.textNombresEst);
        txtApellidoEst = findViewById(R.id.textApellidosEst);
        txtScore = findViewById(R.id.textScore);
        txtCurso = findViewById(R.id.textCurso);
        img_est = findViewById(R.id.img_est);
        txtNivel = findViewById(R.id.textNivel);

        btJgoRompe = findViewById(R.id.bt_juego_rompecabeza);
        btJgoMemo = findViewById(R.id.bt_juego_memoria);
        btJgoOpe = findViewById(R.id.bt_juego_operaciones);
        btJgoAreas = findViewById(R.id.bt_juego_triangulo);
    }

    //asignamos los eventos a los botones de juego
    private void agregarEvento() {
        btJgoRompe.setOnClickListener(this);
        btJgoMemo.setOnClickListener(this);
        btJgoOpe.setOnClickListener(this);
        btJgoAreas.setOnClickListener(this);
    }

    //extraé los datos del estudiante de obtejo recibido y los presenta en los campos de la interfaz gráfica
    private void cargarDatosEst() {
        try {
            //asignamos valores a los campos docente
            txtNombreEst.setText(estLogeado.getNombres());
            txtApellidoEst.setText(estLogeado.getApellidos());
            txtCurso.setText(estLogeado.getCurso());
            txtNivel.setText(estLogeado.getNivel());
            txtScore.setText(String.valueOf(estLogeado.getScore()));

            //evaluamos el sexo del estudiante para asignarle una imgen por defecto
            if (estLogeado.getSexo().toLowerCase().equals("masculino")) {
                img_est.setBackgroundResource(R.drawable.ic_est_masculino);
            } else if (estLogeado.getSexo().toLowerCase().equals("femenino")) {
                img_est.setBackgroundResource(R.drawable.ic_est_femenino);
            } else {
                img_est.setBackgroundResource(R.drawable.ic_otros);
            }

        } catch (Exception e) {
            Toast.makeText(this, "Error:" + e.toString(), Toast.LENGTH_LONG).show();
        }
    }

    //cuando cierre la sesión devolveremos a la vista Login para que pueda volver a iniciar sesión
    private void cerrarSesion() {
        Toast.makeText(EstudianteActivity.this, "Sesión cerrada", Toast.LENGTH_SHORT).show();
        startActivity(new Intent(EstudianteActivity.this, LoginActivity.class));
        finish();
    }

}
