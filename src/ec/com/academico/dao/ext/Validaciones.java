/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import java.util.Scanner;

/**
 *
 * @author Usuario
 */
public class Validaciones {

    public static boolean validarCedula(String Cedula) {
        Scanner lec = new Scanner(System.in);
        boolean X ;

//        System.out.println("Ingrese el numero de cédula");
//        String cedula = lec.next();
        int c, suma = 0, acum, resta = 0;

        for (int i = 0; i < Cedula.length() - 1; i++) {
            c = Integer.parseInt(Cedula.charAt(i) + "");
            if (i % 2 == 0) {
                c = c * 2;
                if (c > 9) {
                    c = c - 9;
                }
            }
            suma = suma + c;
        }

        if (suma % 10 != 0) {
            acum = ((suma / 10) + 1) * 10;
            resta = acum - suma;
        }

        int ultimo = Integer.parseInt(Cedula.charAt(9) + "");

        if (ultimo == resta) {
            System.out.println("la cédula ingresa es correcta");
            X= true;
        } else {
            System.out.println("la cedula es incorrecta");
            X= false;
        }
        return X;

    }

}
