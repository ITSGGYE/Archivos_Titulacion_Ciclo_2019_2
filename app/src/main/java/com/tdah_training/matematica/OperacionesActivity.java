package com.tdah_training.matematica;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.SystemClock;
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
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.tdah_training.R;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.memorizacion.MemoriaActivity;
import com.tdah_training.modelo.Estudiante;
import com.tdah_training.vista.CuadroInfo;
import com.tdah_training.vista.DocenteActivity;
import com.tdah_training.vista.EstudianteActivity;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class OperacionesActivity extends AppCompatActivity implements View.OnClickListener {
    private long mLastClickTime = 0;
    static int RES = 0;
    static int RES_SELEC = 0;
    private int LIMITE_MAX;
    private int OPERACIONES_MAX;
    private int PUNTAJE_GANADO;


    List<Button> botones;
    TextView txtTitulo, txtDescripcion;
    Button bt_num1, bt_num2, bt_oper, bt_op1, bt_op2, bt_op3, bt_op4, bt_res;

    Random rn;
    private Estudiante estLogeado;
    private Button BOTON_SELEC;
    private DatabaseReference myRef;
    private ValueEventListener valueEventListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jgo_operacion);

        myRef = FirebaseDatabase.getInstance().getReference();
        estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);

        obtenetComponentes();
        configNivel();
        actualizarInfoEst();
        sortear();
        agregarEventos();
    }

    @Override
    public void onBackPressed() {
        // do nothing.
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
                Intent intent = new Intent(OperacionesActivity.this, EstudianteActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
                finish();
                break;
            case R.id.icon_info_jg1:
                new CuadroInfo(this, Operaciones.getInfoOperaciones());
                break;
        }
        return true;
    }

    @Override
    public void onClick(View view) {
        //Para evitar el doble click en los botones de respuesta (3 seg de bloqueo)
        if (SystemClock.elapsedRealtime() - mLastClickTime < 3000){
            return;
        }
        mLastClickTime = SystemClock.elapsedRealtime();

        BOTON_SELEC = (Button) view;
        RES_SELEC = Integer.parseInt(BOTON_SELEC.getText().toString());
        new Hilo().execute();
    }

    private void configNivel() {
        if (estLogeado.getNivel().toLowerCase().equals("nivel 1")) {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N1;
            LIMITE_MAX = Constantes.LIMITE_MAX_N1;
            OPERACIONES_MAX = Constantes.OPERACIONES_MAX_N1;
        } else {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N2;
            LIMITE_MAX = Constantes.LIMITE_MAX_N2;
            OPERACIONES_MAX = Constantes.OPERACIONES_MAX_N2;
        }
    }

    private void actualizarInfoEst() {
        txtTitulo.setText(estLogeado.toString() +
                " | Score: " + estLogeado.getScore() +
                " | Nivel: " + estLogeado.getNivel());
    }

    private void obtenetComponentes() {
        rn = new Random();

        botones = new ArrayList<>();

        txtTitulo = findViewById(R.id.txt_puntaje_ope);
        txtDescripcion = findViewById(R.id.txt_descripcion);

        bt_num1 = findViewById(R.id.bt_num1);
        bt_num2 = findViewById(R.id.bt_num2);
        bt_oper = findViewById(R.id.bt_oper);
        bt_res = findViewById(R.id.bt_res);

        bt_op1 = findViewById(R.id.bt_op1);
        bt_op2 = findViewById(R.id.bt_op2);
        bt_op3 = findViewById(R.id.bt_op3);
        bt_op4 = findViewById(R.id.bt_op4);

        botones.add(bt_op1);
        botones.add(bt_op2);
        botones.add(bt_op3);
        botones.add(bt_op4);

    }

    private void sortear() {

        int ope = getAleatorio(OPERACIONES_MAX);
        int pos_res = getAleatorio(4);
        int num1 = getAleatorio(LIMITE_MAX);
        int num2 = getAleatorio(LIMITE_MAX);

        String oper = "";

        switch (ope) {
            case 0://suma
                RES = num1 + num2;
                oper = "+";
                break;
            case 1://resta
                RES = num1 - num2;
                oper = "-";
                break;
            case 2: //multiplicación
                RES = num1 * num2;
                oper = "*";
                break;
        }

        //seteamos los datos
        bt_res.setText("???");
        bt_num1.setText(num1 + "");
        bt_num2.setText(num2 + "");
        bt_oper.setText(oper);

        botones.get(0).setText(String.valueOf(RES + 1));
        botones.get(1).setText(String.valueOf(RES + 2));
        botones.get(2).setText(String.valueOf(RES - 1));
        botones.get(3).setText(String.valueOf(RES - 2));
        //seteamos respueta coreecta
        botones.get(pos_res).setText(String.valueOf(RES));
    }

    private void agregarEventos() {
        for (Button bt : botones) {
            //asignamos el evento click a todos los botones de respuesta
             bt.setOnClickListener(this);
        }
    }

    private int getAleatorio(int max) {
        return rn.nextInt(max);
    }

    private void pausar(long tiempo) {
        try {
            Thread.sleep(tiempo);
        } catch (Exception ex) {
            Log.w("Pausa", ex.getMessage());
        }
    }

    private void actualizarPuntajeEnBase() {
        estLogeado.incrementarScore(PUNTAJE_GANADO);

        myRef.child(Constantes.ESTUDIANTE).child(estLogeado.getId()).child("score")
                .setValue(estLogeado.getScore()).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(OperacionesActivity.this, "FELICIDADES GANASTE " + PUNTAJE_GANADO + " PUNTOS", Toast.LENGTH_SHORT).show();
                actualizarInfoEst();
            }
        });
    }

    //para manejar hilos en segundo plano. Obtenemos un sleep antes de pasar a la siguiente operación
    private class Hilo extends AsyncTask<Void, String, Void> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            if (estLogeado == null) {
                estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);
            }
        }

        @Override
        protected Void doInBackground(Void... voids) {
            publishProgress();
            pausar(3000);
            return null;
        }


        @Override
        protected void onProgressUpdate(String... values) {
            super.onProgressUpdate(values);

            if (RES_SELEC == RES) {
                actualizarPuntajeEnBase();
            } else {
                Toast.makeText(OperacionesActivity.this, "RESPUESTA INCORRECTA!", Toast.LENGTH_SHORT).show();
                bt_res.setText(RES + "");
            }
        }

        @Override
        protected void onPostExecute(Void aVoid) {
            super.onPostExecute(aVoid);
            //bt_res.setText(RES + "");
            sortear();
        }

        @Override
        protected void onCancelled() {
            super.onCancelled();
        }
    }
}
