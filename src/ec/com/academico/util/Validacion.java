/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.util;

/**
 *
 * @author Usuario
 */
public class Validacion {
        public static boolean FiltroLetraNumeroSinEspacio2(java.awt.event.KeyEvent evt) {

        char car = evt.getKeyChar();
        if ((car < '0' || car > '9') && (car < ',' || car > '.')
                && Character.isSpaceChar(car)&& !Character.isLetterOrDigit(car)
                ){
            evt.consume();
        }
        return true;

    }
}
