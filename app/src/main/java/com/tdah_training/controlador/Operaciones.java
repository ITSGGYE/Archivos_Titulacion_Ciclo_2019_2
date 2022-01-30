package com.tdah_training.controlador;

import java.text.SimpleDateFormat;
import java.util.Calendar;

public class Operaciones {



    public static String getFecha(){
        Calendar c = Calendar.getInstance();
        SimpleDateFormat df = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        String formattedDate = df.format(c.getTime());
        return formattedDate;
    }

    public  static String getInfoTriangulo(){
        String info = "- Debes llenar cada uno de los nodos con números que sumados den igual al número propuesto." +
                "\n\n- Los números no se pueden repetir" +
                "\n\n- Si completas el valor propuesto presiona el boton COMPROBAR para validar el resultado";

        return info;
    }

    public static String getInfoOperaciones() {
        String info = "- Debes seleccionar la respuesta correcta." +
                "\n\n- Ten en cuenta que las operaciones pueden ser SUMA, RESTA, MULTIPLICACIón y DIVISIÓN" +
                "\n\n- Si no aciertas, se te mostrará la respuesta correcta";

        return info;
    }

    public static String getInfoRompecabeza() {
        String info = "- Debes cambiar cada casilla hasta completar la imagen correctamente" +
                "\n\n- Puedes mover las casillas en sentido ARRIBA, ABAJO, IZQUIERDA O DERECHA" +
                "\n\n- Las casillas se mueven siempre que éstas dos esten juntas";

        return info;
    }

    public static String getInfoMemoria() {
        String info = "- Se te mostrará una cuadrilla de imagenes por 5 segundos" +
                "\n\n- Debes memorizarlas, luego de ese lapson se ocultarán" +
                "\n\n- Te mostraremos una imagen en la parte superior y deberás revelar en que casilla estaba";

        return info;
    }

    public static String getInfoApp() {
        String desarrollador = "Benyi oliver Jordan Torres";
        String info = "\n\nDesarrollado por "+desarrollador;

        return info;
    }
}
