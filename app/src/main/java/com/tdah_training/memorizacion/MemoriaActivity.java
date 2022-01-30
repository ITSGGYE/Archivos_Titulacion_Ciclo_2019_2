package com.tdah_training.memorizacion;

import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.modelo.Estudiante;
import com.tdah_training.vista.CuadroInfo;
import com.tdah_training.vista.EstudianteActivity;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class MemoriaActivity extends AppCompatActivity implements View.OnClickListener {
    TextView txtTitulo, txtDescripcion;
    Button btMuestra, btReloj;
    List<Button> botones, botones2;
    List<Integer> lstNumeros;
    Random rn = new Random();
    private Estudiante estLogeado;
    private DatabaseReference myRef;
    private int PUNTAJE_GANADO, TIEMPO_ESPERA;
    private ValueEventListener valueEventListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jgo_memoria);
        myRef = FirebaseDatabase.getInstance().getReference();
        estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);

        obtenetComponentes();
        configNivel();
        actualizarInfoEst();
        agregarEventos();
        sortearJuego();
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    private void actualizarInfoEst() {
        txtTitulo.setText(estLogeado.toString() +
                " | Score: " + estLogeado.getScore() +
                " | Nivel: " + estLogeado.getNivel());
    }

    private void obtenetComponentes() {
        lstNumeros = new ArrayList<>();
        botones = new ArrayList<>();
        botones2 = new ArrayList<>();

        txtTitulo = findViewById(R.id.txt_puntaje_mem);
        txtDescripcion = findViewById(R.id.txt_descripcion);

        txtDescripcion.setText("PRESIONE LA CASILLA EN DONDE SE ENCUENTRA LA IMAGEN QUE SE MUESTRA");

        btMuestra = findViewById(R.id.bt_muestra);

        btReloj = findViewById(R.id.img_reloj);

        for (int pos = 1; pos <= 9; pos++) {
            Button bt = null;
            switch (pos) {
                case 1:
                    bt = findViewById(R.id.f1);
                    break;
                case 2:
                    bt = findViewById(R.id.f2);
                    break;
                case 3:
                    bt = findViewById(R.id.f3);
                    break;
                case 4:
                    bt = findViewById(R.id.f4);
                    break;
                case 5:
                    bt = findViewById(R.id.f5);
                    break;
                case 6:
                    bt = findViewById(R.id.f6);
                    break;
                case 7:
                    bt = findViewById(R.id.f7);
                    break;
                case 8:
                    bt = findViewById(R.id.f8);
                    break;
                case 9:
                    bt = findViewById(R.id.f9);
                    break;
            }
            botones.add(bt);
            botones2.add(bt);
        }

        llenarListaNum();
    }

    private void configNivel() {
        if (estLogeado.getNivel().toLowerCase().equals("nivel 1")) {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N1;
            TIEMPO_ESPERA = Constantes.TIEMPO_ESPERA_N1;
        } else {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N2;
            TIEMPO_ESPERA = Constantes.TIEMPO_ESPERA_N2;
        }
    }

    private void llenarListaNum() {
        lstNumeros.clear();
        for (int num = 0; num < 12; num++) {
            lstNumeros.add(num);
        }
    }

    private int getAleatorio() {
        int num = rn.nextInt(lstNumeros.size());
        return lstNumeros.remove(num);
    }

    private void asignarImagen(Button bt, int num) {
        switch (num) {
            case 0:
                bt.setBackgroundResource(R.drawable.f1);

                break;
            case 1:
                bt.setBackgroundResource(R.drawable.f2);

                break;
            case 2:
                bt.setBackgroundResource(R.drawable.f3);

                break;
            case 3:
                bt.setBackgroundResource(R.drawable.f4);

                break;
            case 4:
                bt.setBackgroundResource(R.drawable.f5);

                break;
            case 5:
                bt.setBackgroundResource(R.drawable.f6);

                break;
            case 6:
                bt.setBackgroundResource(R.drawable.f7);

                break;
            case 7:
                bt.setBackgroundResource(R.drawable.f8);

                break;
            case 8:
                bt.setBackgroundResource(R.drawable.f9);

                break;
            case 9:
                bt.setBackgroundResource(R.drawable.f10);

                break;
            case 10:
                bt.setBackgroundResource(R.drawable.f11);

                break;
            case 11:
                bt.setBackgroundResource(R.drawable.f12);
                break;
        }
        bt.setText(num + "");
        bt.setTextColor(Color.TRANSPARENT);
    }

    private void sortearCasillas() {
        for (Button bt : botones) {
            int num = getAleatorio();
            asignarImagen(bt, num);
        }
    }

    private void agregarEventos() {
        for (Button bt : botones) {
            bt.setOnClickListener(this);
        }
    }

    private void sortearJuego() {
        llenarListaNum();
        actualizarInfoEst();
        btMuestra.setBackgroundResource(R.drawable.f0);
        sortearCasillas();
        new Hilo().execute();
    }

    private void sortearMuestra() {
        int num = rn.nextInt(botones.size());
        Button bt = botones.get(num);

        btMuestra.setBackground(bt.getBackground());
        btMuestra.setText(bt.getText());
        btMuestra.setTextColor(bt.getCurrentTextColor());
    }

    private void ocultarCasillas() {
        for (Button bt : botones) {
            bt.setBackgroundResource(R.drawable.f0);
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_juego, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case R.id.icon_regresar_jgo1:
                Intent intent = new Intent(MemoriaActivity.this, EstudianteActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                break;
            case R.id.icon_info_jg1:
                new CuadroInfo(this, Operaciones.getInfoMemoria());
                break;
        }
        return true;
    }

    @Override
    public void onClick(View view) {
        Button bt = (Button) view;

        if (btMuestra.getText().equals(bt.getText())) {
            actualizarPuntajeEnBase();
        } else {
            Toast.makeText(MemoriaActivity.this, "No son iguales ", Toast.LENGTH_SHORT).show();
        }
        sortearJuego();
    }

    private void actualizarPuntajeEnBase() {
        estLogeado.incrementarScore(PUNTAJE_GANADO);

        myRef.child(Constantes.ESTUDIANTE).child(estLogeado.getId()).child("score")
                .setValue(estLogeado.getScore()).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(MemoriaActivity.this, "FELICIDADES GANASTE " + PUNTAJE_GANADO + " PUNTOS", Toast.LENGTH_SHORT).show();
                actualizarInfoEst();
            }
        });
    }


    private void pausar(long tiempo) {
        try {
            Thread.sleep(tiempo);
        } catch (Exception ex) {
            Log.w("Pausa", ex.getMessage());
        }
    }

    private class Hilo extends AsyncTask<Void, String, Void> {
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected Void doInBackground(Void... values) {

            for (int i = TIEMPO_ESPERA; i >= 0; i--) {
                pausar(1000);
                publishProgress(i + "");
            }
            return null;
        }

        @Override
        protected void onProgressUpdate(String... values) {
            super.onProgressUpdate(values);
            btReloj.setText(values[0]);

        }

        @Override
        protected void onPostExecute(Void aVoid) {
            super.onPostExecute(aVoid);
            sortearMuestra();
            ocultarCasillas();
        }

        @Override
        protected void onCancelled() {
            super.onCancelled();
        }
    }

}
