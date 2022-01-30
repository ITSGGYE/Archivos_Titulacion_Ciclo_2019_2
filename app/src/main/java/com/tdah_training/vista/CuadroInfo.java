package com.tdah_training.vista;

import android.app.Dialog;
import android.content.Context;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.TextView;

import com.tdah_training.R;

public class CuadroInfo {

    public CuadroInfo(Context context, String info) {
        final Dialog dialogo = new Dialog(context);
        dialogo.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialogo.setCancelable(false);
        dialogo.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialogo.setContentView(R.layout.cuadro_dialogo);

        TextView txtInfo = dialogo.findViewById(R.id.txtInfo);
        Button btnCerrar = dialogo.findViewById(R.id.btCerrarInfo);

        txtInfo.setText(info);

        btnCerrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dialogo.dismiss();
            }
        });

        dialogo.show();
    }
}
