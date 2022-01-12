/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.combo;

import ec.com.cp.model.join.model_seg_usuario_join;
import ec.com.cp.model.model_emp_empresa;
import ec.com.cp.model.model_seg_rol;
import java.util.ArrayList;
import javax.swing.DefaultComboBoxModel;

/**
 *
 * @author carlos
 */
public class combos_seg_usuario {
    private static Object[] arregloUsuarioRol(ArrayList<model_seg_rol> lista) {
        Object[] arreglo = new Object[lista.size() + 1];
        arreglo[0] = "SELECCIONE CARGO...";
        for (int i = 0; i < lista.size(); i++) {
            arreglo[(i + 1)] = lista.get(i).getRol();
        }
        return arreglo;

    }

    public static DefaultComboBoxModel ComboGetRol(ArrayList<model_seg_rol> lista) {
        DefaultComboBoxModel model = new DefaultComboBoxModel();
        Object[] arreglo = arregloUsuarioRol(lista);
//        System.out.println(lista.size() + " tam " + arreglo.length);
        for (int i = 0; i < arreglo.length; i++) {
            model.addElement(arreglo[i]);
        }
        return model;

    }
}
