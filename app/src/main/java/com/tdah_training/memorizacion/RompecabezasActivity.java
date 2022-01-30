package com.tdah_training.memorizacion;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.ViewTreeObserver;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.tdah_training.controlador.Constantes;
import com.tdah_training.R;
import com.tdah_training.controlador.CustomAdapter;
import com.tdah_training.controlador.GestureDetectGridView;
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.matematica.OperacionesActivity;
import com.tdah_training.modelo.Estudiante;
import com.tdah_training.vista.CuadroInfo;
import com.tdah_training.vista.EstudianteActivity;

import java.util.ArrayList;
import java.util.Random;

public class RompecabezasActivity extends AppCompatActivity {
    private static int PUNTAJE_GANADO = 50;
    private static GestureDetectGridView MiGrid;

    private static int COLUMNAS = 3;
    private static int NUM_JUEGO = 1;
    private static int DIMENSIONES;

    private static int anchoCasilla, altoCasilla;

    private static TextView txtTitulo;
    private static ImageView imgMuestra;

    private static String[] listaCasillas = null;
    private static Estudiante estLogeado;
    private static DatabaseReference myRef;
    private static Context  context =null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jgo_rompecabezas);
        context = this;
        myRef = FirebaseDatabase.getInstance().getReference();
        estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);

        obtenerComponentes();
        configNivel();
        iniciar();
        sortearCasillas();
        setDimensiones();
        actualizarInfoEst();
    }

    private void reiniciar() {

        sortearCasillas();
        setDimensiones();
    }

    private void pausar(long tiempo) {
        try {
            Thread.sleep(tiempo);
        } catch (Exception ex) {
            Log.w("Pausa", ex.getMessage());
        }
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    private void obtenerComponentes() {
        imgMuestra = findViewById(R.id.img_muestra_rom);
        txtTitulo = findViewById(R.id.txt_puntaje_rom);
    }

    private void configNivel() {
        if (estLogeado.getNivel().equals("nivel 1")) {
            COLUMNAS = 3;
            PUNTAJE_GANADO = 50;
        } else if (estLogeado.getNivel().equals("nivel 2")) {
            COLUMNAS = 4;
            PUNTAJE_GANADO = 100;
        }
    }

    private void iniciar() {
        //actualizamos las dimensiones según el nivel del estudiante
        DIMENSIONES = COLUMNAS * COLUMNAS;

        MiGrid = (GestureDetectGridView) findViewById(R.id.grid1);
        MiGrid.setNumColumns(COLUMNAS);
        //creamos una lista con el tamaño del grid
        listaCasillas = new String[DIMENSIONES];
        //LLENAMOS LA LISTA CON VALORES CONSECUTIVOS, UBICACION DE LAS CASILLAS
        for (int index = 0; index < DIMENSIONES; index++) {
            listaCasillas[index] = String.valueOf(index);
        }
    }

    private void sortearCasillas() {
        int index;
        String temp;
        Random random = new Random();

        //sorteamos los números de las ubicaciones (aleatorio)
        for (int i = listaCasillas.length - 1; i > 0; i--) {
            index = random.nextInt(i + 1);
            temp = listaCasillas[index];
            listaCasillas[index] = listaCasillas[i];
            listaCasillas[i] = temp;
        }
    }

    private void setDimensiones() {
        ViewTreeObserver vto = MiGrid.getViewTreeObserver();
        vto.addOnGlobalLayoutListener(new ViewTreeObserver.OnGlobalLayoutListener() {
            @Override
            public void onGlobalLayout() {
                MiGrid.getViewTreeObserver().removeOnGlobalLayoutListener(this);
                int anchoPantalla = MiGrid.getMeasuredWidth();//obtenemos el ancho medio
                int altoPantalla = MiGrid.getMeasuredHeight();//obtenemos el alto medio

                int altoBarraEstado = getAltoBarraEstado(context); //obtenemos la alura de la barra de estado
                //calculamos el alto requeido para el grid del rompecabeza
                int altoRequerido = altoPantalla - altoBarraEstado;

                //calculamos el ancho y alo de las casillas
                anchoCasilla = anchoPantalla / COLUMNAS;
                altoCasilla = altoRequerido / COLUMNAS;

                visualizar(context);
            }
        });
    }

    private int getAltoBarraEstado(Context context) {
        int result = 0;
        int resourceId = context.getResources().getIdentifier("status_bar_height", "dimen",
                "android");

        if (resourceId > 0) {
            result = context.getResources().getDimensionPixelSize(resourceId);
        }

        return result;
    }

    private void visualizar(Context context) {
        ArrayList<Button> botones = new ArrayList<>();
        Button bt_casilla = null;

        if (NUM_JUEGO == 1) {
            imgMuestra.setBackgroundResource(R.drawable.img_espacio);
            if (COLUMNAS == 3) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_3_p9);
                    botones.add(bt_casilla);
                }
            } else if (COLUMNAS == 4) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p9);
                    else if (listaCasillas[i].equals("9"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p10);
                    else if (listaCasillas[i].equals("10"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p11);
                    else if (listaCasillas[i].equals("11"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p12);
                    else if (listaCasillas[i].equals("12"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p13);
                    else if (listaCasillas[i].equals("13"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p14);
                    else if (listaCasillas[i].equals("14"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p15);
                    else if (listaCasillas[i].equals("15"))
                        bt_casilla.setBackgroundResource(R.drawable.img_1_4_p16);
                    botones.add(bt_casilla);
                }
            }
        } else if (NUM_JUEGO == 2) {
            imgMuestra.setBackgroundResource(R.drawable.img_sistema_solar);
            if (COLUMNAS == 3) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_3_p9);
                    botones.add(bt_casilla);
                }
            } else if (COLUMNAS == 4) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p9);
                    else if (listaCasillas[i].equals("9"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p10);
                    else if (listaCasillas[i].equals("10"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p11);
                    else if (listaCasillas[i].equals("11"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p12);
                    else if (listaCasillas[i].equals("12"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p13);
                    else if (listaCasillas[i].equals("13"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p14);
                    else if (listaCasillas[i].equals("14"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p15);
                    else if (listaCasillas[i].equals("15"))
                        bt_casilla.setBackgroundResource(R.drawable.img_2_4_p16);
                    botones.add(bt_casilla);
                }
            }
        } else if (NUM_JUEGO == 3) {
            imgMuestra.setBackgroundResource(R.drawable.img_matematicas);
            if (COLUMNAS == 3) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n1_c9);
                    botones.add(bt_casilla);
                }
            } else if (COLUMNAS == 4) {
                for (int i = 0; i < listaCasillas.length; i++) {
                    bt_casilla = new Button(context);

                    if (listaCasillas[i].equals("0"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c1);
                    else if (listaCasillas[i].equals("1"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c2);
                    else if (listaCasillas[i].equals("2"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c3);
                    else if (listaCasillas[i].equals("3"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c4);
                    else if (listaCasillas[i].equals("4"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c5);
                    else if (listaCasillas[i].equals("5"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c6);
                    else if (listaCasillas[i].equals("6"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c7);
                    else if (listaCasillas[i].equals("7"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c8);
                    else if (listaCasillas[i].equals("8"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c9);
                    else if (listaCasillas[i].equals("9"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c10);
                    else if (listaCasillas[i].equals("10"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c11);
                    else if (listaCasillas[i].equals("11"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c12);
                    else if (listaCasillas[i].equals("12"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c13);
                    else if (listaCasillas[i].equals("13"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c14);
                    else if (listaCasillas[i].equals("14"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c15);
                    else if (listaCasillas[i].equals("15"))
                        bt_casilla.setBackgroundResource(R.drawable.rom_3_n2_c16);
                    botones.add(bt_casilla);
                }
            }
        }
        MiGrid.setAdapter(new CustomAdapter(botones, anchoCasilla, altoCasilla));
    }

    private void intercambiar(Context context, int posActual, int cambioPos) {
        String newPosition = listaCasillas[posActual + cambioPos];
        listaCasillas[posActual + cambioPos] = listaCasillas[posActual];
        listaCasillas[posActual] = newPosition;
        visualizar(context);

        if (esCompleto()) {
            actualizarScore(context);
        }
    }

    public void moverCasillas(Context context, String dir, int pos) {

        // Upper-left-corner tile
        if (pos == 0) {
            if (dir.equals(Constantes.right)) {
                intercambiar(context, pos, 1);
            } else if (dir.equals(Constantes.down)) {
                intercambiar(context, pos, COLUMNAS);
            } else {
                Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();
            }

            // Upper-center tiles
        } else if (pos > 0 && pos < COLUMNAS - 1) {
            if (dir.equals(Constantes.left)) intercambiar(context, pos, -1);
            else if (dir.equals(Constantes.down)) intercambiar(context, pos, COLUMNAS);
            else if (dir.equals(Constantes.right)) intercambiar(context, pos, 1);
            else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Upper-right-corner tile
        } else if (pos == COLUMNAS - 1) {
            if (dir.equals(Constantes.left)) intercambiar(context, pos, -1);
            else if (dir.equals(Constantes.down)) intercambiar(context, pos, COLUMNAS);
            else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Left-side tiles
        } else if (pos > COLUMNAS - 1 && pos < DIMENSIONES - COLUMNAS &&
                pos % COLUMNAS == 0) {
            if (dir.equals(Constantes.up)) intercambiar(context, pos, -COLUMNAS);
            else if (dir.equals(Constantes.right)) intercambiar(context, pos, 1);
            else if (dir.equals(Constantes.down)) intercambiar(context, pos, COLUMNAS);
            else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Right-side AND bottom-right-corner tiles
        } else if (pos == COLUMNAS * 2 - 1 || pos == COLUMNAS * 3 - 1) {
            if (dir.equals(Constantes.up)) intercambiar(context, pos, -COLUMNAS);
            else if (dir.equals(Constantes.left)) intercambiar(context, pos, -1);
            else if (dir.equals(Constantes.down)) {

                // Tolerates only the right-side tiles to swap downwards as opposed to the bottom-
                // right-corner tile.
                if (pos <= DIMENSIONES - COLUMNAS - 1) intercambiar(context, pos,
                        COLUMNAS);
                else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();
            } else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Bottom-left corner tile
        } else if (pos == DIMENSIONES - COLUMNAS) {
            if (dir.equals(Constantes.up)) intercambiar(context, pos, -COLUMNAS);
            else if (dir.equals(Constantes.right)) intercambiar(context, pos, 1);
            else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Bottom-center tiles
        } else if (pos < DIMENSIONES - 1 && pos > DIMENSIONES - COLUMNAS) {
            if (dir.equals(Constantes.up)) intercambiar(context, pos, -COLUMNAS);
            else if (dir.equals(Constantes.left)) intercambiar(context, pos, -1);
            else if (dir.equals(Constantes.right)) intercambiar(context, pos, 1);
            else Toast.makeText(context, "Movimiento invalido!", Toast.LENGTH_SHORT).show();

            // Center tiles
        } else {
            if (dir.equals(Constantes.up)) intercambiar(context, pos, -COLUMNAS);
            else if (dir.equals(Constantes.left)) intercambiar(context, pos, -1);
            else if (dir.equals(Constantes.right)) intercambiar(context, pos, 1);
            else intercambiar(context, pos, COLUMNAS);
        }
    }

    private boolean esCompleto() {
        boolean completo = false;

        for (int i = 0; i < listaCasillas.length; i++) {
            if (listaCasillas[i].equals(String.valueOf(i))) {
                completo = true;
            } else {
                completo = false;
                break;
            }
        }
        return completo;
    }

    private void actualizarScore(Context context) {
        NUM_JUEGO++;
        if (NUM_JUEGO == 4) {
            NUM_JUEGO = 1;
        }
        actualizarPuntajeEnBase(context);
        actualizarInfoEst();
        reiniciar();
    }

    private void actualizarPuntajeEnBase(final Context context) {
        estLogeado.incrementarScore(PUNTAJE_GANADO);

        myRef.child(Constantes.ESTUDIANTE).child(estLogeado.getId()).child("score")
                .setValue(estLogeado.getScore()).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(context, "FELICIDADES GANASTE " + PUNTAJE_GANADO + " PUNTOS", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void actualizarInfoEst() {
        txtTitulo.setText(estLogeado.toString() +
                " | Score: " + estLogeado.getScore() +
                " | Nivel: " + estLogeado.getNivel());
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_juego, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case R.id.icon_regresar_jgo1: {
                Intent intent = new Intent(RompecabezasActivity.this, EstudianteActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);
            }
            break;

            case R.id.icon_info_jg1: {
                new CuadroInfo(this, Operaciones.getInfoRompecabeza());
            }
            break;
        }
        return true;
    }

}
