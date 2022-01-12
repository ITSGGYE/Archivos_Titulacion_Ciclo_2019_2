/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.util;

import ec.com.cp.model.join.model_seg_usuario_join;
import java.util.ArrayList;
import javax.swing.JOptionPane;

/**
 *
 * @author carlos
 */
public class util_validaciones {
    public static boolean buscarCedulaEmpleados(ArrayList<model_seg_usuario_join> lista, String cedula) {
        boolean valor = false;
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getCedula().equals(cedula)) {
                valor = true;
                break;
            } else {
                valor = false;
            }
        }
        return valor;
    }
    
    public static boolean validarCedulaEmpedos(ArrayList<model_seg_usuario_join> lista, String cedula) {
        boolean valor = false;
        if (cedula.length() < 10) {
            valor = false;
        } else if (cedula.length() > 13) {
            valor = false;
        } else {
            boolean valor1 = buscarCedulaEmpleados(lista, cedula);
            if (valor1 == true) {
                JOptionPane.showMessageDialog(null, "Cedula ya existente");
                valor = false;
            } else {
                valor = true;
            }
        }
        return valor;
    }
}
