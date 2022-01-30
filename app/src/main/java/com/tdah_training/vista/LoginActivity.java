package com.tdah_training.vista;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.os.Message;
import android.text.TextUtils;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
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
import com.tdah_training.controlador.Operaciones;
import com.tdah_training.modelo.Docente;
import com.tdah_training.modelo.Estudiante;

public class LoginActivity extends AppCompatActivity implements View.OnClickListener {

    private EditText txtEmail, txtContrasena;
    private Button btLogin_est, btLogin_doc, btLogin_adm;
    private ProgressDialog barPro;
    private DatabaseReference myRef;
    private FirebaseAuth auten;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //instancialos los objetos de firebase
        myRef = FirebaseDatabase.getInstance().getReference();
        auten = FirebaseAuth.getInstance();

        obtenerComponentes();
        agregarEventos();
    }



    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_login, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case R.id.icon_salir_app:
                finishAffinity();

                break;

                case R.id.icon_info_app:
                new CuadroInfo(this, Operaciones.getInfoApp());
                break;
        }
        return true;
    }

    @Override
    public void onBackPressed() {
        //no hace nada
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.btLogin_est:
                LoginEstudiante();
                break;
            case R.id.btLogin_doc:
                LoginDocente();
                break;
            case R.id.btLogin_adm:
                LoginAdministrador();
                break;
        }
    }

    //obtenemos los componewntes de la interfaz gráfica
    private void obtenerComponentes() {
        txtEmail = findViewById(R.id.txtEmail);
        txtContrasena = findViewById(R.id.txtContrasena);
        btLogin_est = findViewById(R.id.btLogin_est);
        btLogin_doc = findViewById(R.id.btLogin_doc);
        btLogin_adm = findViewById(R.id.btLogin_adm);
        barPro = new ProgressDialog(this);
        barPro.setCancelable(false);
        barPro.setCanceledOnTouchOutside(false);
        barPro.setIcon(R.drawable.log);
    }

    //agregamos los eventos clic a los botones de la interfaz gráfica
    private void agregarEventos() {
        //agregamos los eventos
        btLogin_est.setOnClickListener(this);
        btLogin_doc.setOnClickListener(this);
        btLogin_adm.setOnClickListener(this);
    }

    //utilizada para inisiar sesión como estudiante
    private void LoginEstudiante() {
        final String correo = txtEmail.getText().toString();
        final String contrasena = txtContrasena.getText().toString();

        //validamos correo que no sea vacia
        if (!validarCredencial(correo, contrasena)) {
            return;
        }

        //presentamos la barra de proceso
        barPro.setMessage("Procesando petición");
        barPro.show();

        try {
            myRef.child(Constantes.ESTUDIANTE).addListenerForSingleValueEvent(new ValueEventListener() {
                @Override
                public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                    boolean logeado = false;
                    for (DataSnapshot ds : dataSnapshot.getChildren()) {
                        Estudiante e = ds.getValue(Estudiante.class);

                        if (e.getCorreo().equals(correo) && e.getContrasena().equals(contrasena)) {
                            logeado = true;
                            Intent intent = new Intent(LoginActivity.this, EstudianteActivity.class);
                            intent.putExtra(Constantes.ESTUDIANTE, e);
                            startActivity(intent);
                            finish();
                            limpiarCredencial();
                            break;
                        }
                    }
                    barPro.dismiss();
                    if (!logeado) {
                        Toast.makeText(LoginActivity.this,
                                "Credenciales incorrectas EST", Toast.LENGTH_SHORT).show();
                    }
                }

                @Override
                public void onCancelled(@NonNull DatabaseError databaseError) {

                }
            });
        } catch (Exception e) {
            Toast.makeText(LoginActivity.this, e.toString(), Toast.LENGTH_LONG).show();
        }
    }

    //utilizada para inisiar sesión como docente
    private void LoginDocente() {
        final String correo = txtEmail.getText().toString();
        final String contrasena = txtContrasena.getText().toString();

        //validamos correo que no sea vacia
        if (!validarCredencial(correo, contrasena)) {
            return;
        }

        //presentamos la barra de proceso
        barPro.setMessage("Procesando petición");
        barPro.show();

        try {
            myRef.child(Constantes.DOCENTE).addListenerForSingleValueEvent(new ValueEventListener() {
                @Override
                public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                    boolean logeado = false;
                    for (DataSnapshot ds : dataSnapshot.getChildren()) {
                        Docente d = ds.getValue(Docente.class);

                        if (d.getCorreo().equals(correo) && d.getContrasena().equals(contrasena)) {
                            logeado = true;
                            Intent intent = new Intent(LoginActivity.this, DocenteActivity.class);
                            intent.putExtra(Constantes.DOCENTE, d);
                            startActivity(intent);
                            finish();
                            limpiarCredencial();
                            break;
                        }
                    }
                    barPro.dismiss();
                    if (!logeado) {
                        Toast.makeText(LoginActivity.this,
                                "Credenciales incorrectas DOC", Toast.LENGTH_SHORT).show();
                    }
                }

                @Override
                public void onCancelled(@NonNull DatabaseError databaseError) {

                }
            });
        } catch (Exception e) {
            Toast.makeText(LoginActivity.this, e.toString(), Toast.LENGTH_LONG).show();
        }
    }

    //utilizada para inisiar sesión como administrador
    private void LoginAdministrador() {
        final String correo = txtEmail.getText().toString();
        final String contrasena = txtContrasena.getText().toString();

        //validamos email que no sea vacia
        if (!validarCredencial(correo, contrasena)) {
            return;
        }

        //presentamos la barra de proceso
        barPro.setMessage("Procesando petición");
        barPro.show();

        //logeamos usuario
        auten.signInWithEmailAndPassword(correo, contrasena)
                .addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        try {
                            if (task.isSuccessful()) {
                                startActivity(new Intent(LoginActivity.this, AdminCrudActivity.class));
                                finish();
                                limpiarCredencial();
                            } else {
                                Toast.makeText(LoginActivity.this,
                                        "Credenciales incorrectas ADM",
                                        Toast.LENGTH_SHORT).show();
                            }
                        } catch (Exception e) {
                        }
                        barPro.dismiss();
                    }
                });
    }

    //validamos correoque no sea vacío
    private boolean validarCredencial(String email, String contrasena) {
        //validamos email que no sea vacia
        if (TextUtils.isEmpty(email)) {
            Toast.makeText(this, "Debe ingresar un email", Toast.LENGTH_SHORT).show();
            return false;
        }

        //validamos contraseña que no sea vacia
        if (TextUtils.isEmpty(contrasena)) {
            Toast.makeText(this, "Debe ingresar una contraseña", Toast.LENGTH_SHORT).show();
            return false;
        }

        return true;
    }

    //limpia las cajas de correo y clave
    private void limpiarCredencial() {
        txtContrasena.setText(null);
        txtEmail.setText(null);
    }

}