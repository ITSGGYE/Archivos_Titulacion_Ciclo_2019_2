package com.tdah_training.matematica;

import android.content.Intent;
import android.os.Bundle;
import android.os.SystemClock;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
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

import java.util.Random;

public class TrianguloActivity extends AppCompatActivity implements TextView.OnEditorActionListener {
    private int PUNTAJE_GANADO, NUMERO_MAX;
    private TextView txtTitulo, txtDescripcion, txtNumTri, txtSumLinea1, txtSumLinea2, txtSumLinea3;
    private EditText edtNodo1, edtNodo2, edtNodo3, edtNodo4, edtNodo5, edtNodo6;
    private Button btComprobar;

    private Random rn;
    private int n1, n2, n3, n4, n5, n6, NUM_PROPUESTO;
    private int sumL1, sumL2, sumL3;
    private Estudiante estLogeado;
    private DatabaseReference myRef;
    private ValueEventListener valueEventListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jgo_triangulo);

        myRef = FirebaseDatabase.getInstance().getReference();
        estLogeado = (Estudiante) getIntent().getSerializableExtra(Constantes.ESTUDIANTE);

        obtenetComponentes();
        configNivel();
        actualizarInfoEst();
        sortearNumeroCompletar();
        agregarEventos();
    }

    @Override
    public void onBackPressed() {
        // do nothing.
    }

    //segun el nivel del estudiante se asignan los valores de juego
    private void configNivel() {
        if (estLogeado.getNivel().toLowerCase().equals("nivel 1")) {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N1;
            NUMERO_MAX = Constantes.NUM_COMPLETAR_MAX_N1;
        } else {
            PUNTAJE_GANADO = Constantes.PUNTAJE_N2;
            NUMERO_MAX = Constantes.NUM_COMPLETAR_MAX_N1;
        }
    }

    private void agregarEventos() {
        edtNodo1.setOnEditorActionListener(this);
        edtNodo2.setOnEditorActionListener(this);
        edtNodo3.setOnEditorActionListener(this);
        edtNodo4.setOnEditorActionListener(this);
        edtNodo5.setOnEditorActionListener(this);
        edtNodo6.setOnEditorActionListener(this);

        btComprobar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //para confirmar el juego primero comprobamos que ningún nodo esté vacío
                if (validarNodosVacios()) {
                    //si ninguno está vacío veriifcamos si existen números repetidos en cada una de las tres lineas
                    if (!validarNodosRepetidos()) {
                        //no hace nada
                    }   //si no existen números repetidos podemos verificar las sumas de cada línea e igual
                        //al número que se debe completar [NUM_PROPUESTO]
                    else if (NUM_PROPUESTO == sumL1 && NUM_PROPUESTO == sumL2 && NUM_PROPUESTO == sumL3) {
                        //si la suma de cada línea es igual al propuesto, entonces se suma el puntaje ganado
                        actualizarPuntajeEnBase();
                        //limpiamos los nodos
                        limpiarNodos();
                        //y se sortea un nuevo número a completar
                        sortearNumeroCompletar();
                    }
                    else{
                        Toast.makeText(TrianguloActivity.this, "Todas las lineas deben sumar "+txtNumTri.getText(), Toast.LENGTH_SHORT).show();
                    }
                } else {
                    Toast.makeText(TrianguloActivity.this, "Debe llenar todos los nodos", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    private void sumarLineas() {

        NUM_PROPUESTO = Integer.parseInt(txtNumTri.getText().toString());

        n1 = Integer.parseInt(edtNodo1.getText().toString());
        n2 = Integer.parseInt(edtNodo2.getText().toString());
        n3 = Integer.parseInt(edtNodo3.getText().toString());
        n4 = Integer.parseInt(edtNodo4.getText().toString());
        n5 = Integer.parseInt(edtNodo5.getText().toString());
        n6 = Integer.parseInt(edtNodo6.getText().toString());

        //PARA EL TOTAL DE LA LINEA1 DEL TRIANGULO SE SUMAN LOS NODOS 1, 3 Y 6
        //PARA EL TOTAL DE LA LINEA2 DEL TRIANGULO SE SUMAN LOS NODOS 1, 2 Y 4
        //PARA EL TOTAL DE LA LINEA3 DEL TRIANGULO SE SUMAN LOS NODOS 4, 5 Y 6

        sumL1 = n1 + n3 + n6;
        sumL2 = n1 + n2 + n4;
        sumL3 = n4 + n5 + n6;

        txtSumLinea1.setText(sumL1 + "");
        txtSumLinea2.setText(sumL2 + "");
        txtSumLinea3.setText(sumL3 + "");
    }

    private boolean validarNodosRepetidos() {
        int n1, n2, n3, n4, n5, n6;
        boolean validado = true;

        n1 = Integer.parseInt(edtNodo1.getText().toString());
        n2 = Integer.parseInt(edtNodo2.getText().toString());
        n3 = Integer.parseInt(edtNodo3.getText().toString());
        n4 = Integer.parseInt(edtNodo4.getText().toString());
        n5 = Integer.parseInt(edtNodo5.getText().toString());
        n6 = Integer.parseInt(edtNodo6.getText().toString());


        //validamos que entre los números no se repitan
        //NODO 1
        if (n1 == n3 || n1 == n6 || n1 == n2 || n1 == n4) {
            edtNodo1.setError("Número repetido");
            validado = false;
        } else {
            edtNodo1.setError(null);
        }
        //NODO 2
        if (n2 == n1 || n2 == n4) {
            edtNodo2.setError("Número repetido");
            validado = false;
        } else {
            edtNodo2.setError(null);
        }
        //NODO 3
        if (n3 == n1 || n3 == n6) {
            edtNodo3.setError("Número repetido");
            validado = false;
        } else {
            edtNodo3.setError(null);
        }
        //NODO 4
        if (n4 == n1 || n4 == n2 || n4 == n5 || n4 == n6) {
            edtNodo4.setError("Número repetido");
            validado = false;
        } else {
            edtNodo4.setError(null);
        }
        //NODO 5
        if (n5 == n4 || n5 == n6) {
            edtNodo5.setError("Número repetido");
            validado = false;
        } else {
            edtNodo5.setError(null);
        }
        //NODO 6
        if (n6 == n1 || n6 == n3 || n6 == n4 || n6 == n5) {
            edtNodo6.setError("Número repetido");
            validado = false;
        } else {
            edtNodo6.setError(null);
        }
        return validado;
    }

    private void actualizarInfoEst() {
        txtTitulo.setText(estLogeado.toString() +
                " | Score: " + estLogeado.getScore() +
                " | Nivel: " + estLogeado.getNivel());
    }

    private void obtenetComponentes() {
        rn = new Random();

        txtTitulo = findViewById(R.id.txt_puntaje_tri);
        txtDescripcion = findViewById(R.id.txt_descripcion);

        txtDescripcion.setText("INGRESE LOS NÚMEROS EN LOS NODOS DEL TRIÁNGULO HASTA SUMAR EL NÚMERO");

        txtNumTri = findViewById(R.id.txtNumeroTriangulo);

        txtSumLinea1 = findViewById(R.id.txtSumaLinea1);
        txtSumLinea2 = findViewById(R.id.txtSumaLinea2);
        txtSumLinea3 = findViewById(R.id.txtSumaLinea3);

        edtNodo1 = findViewById(R.id.edtNodo1);
        edtNodo2 = findViewById(R.id.edtNodo2);
        edtNodo3 = findViewById(R.id.edtNodo3);
        edtNodo4 = findViewById(R.id.edtNodo4);
        edtNodo5 = findViewById(R.id.edtNodo5);
        edtNodo6 = findViewById(R.id.edtNodo6);

        btComprobar = findViewById(R.id.btComprobar);

        limpiarNodos();
    }

    private void limpiarNodos() {
        //asignamos valores iniciales
        edtNodo1.setText("0");
        edtNodo2.setText("0");
        edtNodo3.setText("0");
        edtNodo4.setText("0");
        edtNodo5.setText("0");
        edtNodo6.setText("0");
        txtSumLinea1.setText("0");
        txtSumLinea2.setText("0");
        txtSumLinea3.setText("0");
    }

    //valida si algún nodo se encuentra vacío
    private boolean validarNodosVacios() {
        boolean llenos = true;
        if (edtNodo1.getText().toString().isEmpty() ||
                edtNodo1.getText().toString().isEmpty() ||
                edtNodo2.getText().toString().isEmpty() ||
                edtNodo3.getText().toString().isEmpty() ||
                edtNodo4.getText().toString().isEmpty() ||
                edtNodo5.getText().toString().isEmpty() ||
                edtNodo6.getText().toString().isEmpty()) {
            llenos = false;
        }
        return llenos;
    }

    //obteniene un número aleatorio
    private int getAleatorio() {
        return rn.nextInt(NUMERO_MAX - 5) + 5;
    }

    private void sortearNumeroCompletar() {
        int numTri = getAleatorio();
        txtNumTri.setText(numTri + "");
        //actualizarInfoEst();
    }

    private void actualizarPuntajeEnBase() {
        estLogeado.incrementarScore(PUNTAJE_GANADO);

        myRef.child(Constantes.ESTUDIANTE).child(estLogeado.getId()).child("score")
                .setValue(estLogeado.getScore()).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(TrianguloActivity.this, "FELICIDADES GANASTE " + PUNTAJE_GANADO + " PUNTOS", Toast.LENGTH_SHORT).show();
            }
        });

        actualizarInfoEst();
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
                Intent intent = new Intent(TrianguloActivity.this, EstudianteActivity.class);
                intent.putExtra(Constantes.ESTUDIANTE, estLogeado);
                startActivity(intent);

                break;

            case R.id.icon_info_jg1:
                new CuadroInfo(this, Operaciones.getInfoTriangulo());

                break;
        }
        return true;
    }

    //evento que permite sumar los nodos a medida que se modifique cualquiera de ellos
    @Override
    public boolean onEditorAction(TextView textView, int i, KeyEvent keyEvent) {

        if (validarNodosVacios()) {
            sumarLineas();
        }
        return false;
    }

}
