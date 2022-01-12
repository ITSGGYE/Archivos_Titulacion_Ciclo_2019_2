/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.combo;

import ec.com.cp.model.model_emp_empresa;
import ec.com.cp.model.model_emp_sucursal;
import java.util.ArrayList;
import javax.swing.DefaultComboBoxModel;

/**
 *
 * @author carlos
 */
public class combos_emp_empresa {
    private static Object[] arregloEmpresa(ArrayList<model_emp_empresa> lista) {
        Object[] arreglo = new Object[lista.size() + 1];
        arreglo[0] = "SELECCIONE EMPRESA...";
        for (int i = 0; i < lista.size(); i++) {
            arreglo[(i + 1)] = lista.get(i).getNombre_comercial();
        }
        return arreglo;

    }

    public static DefaultComboBoxModel ComboGetEmpresa(ArrayList<model_emp_empresa> lista) {
        DefaultComboBoxModel model = new DefaultComboBoxModel();
        Object[] arreglo = arregloEmpresa(lista);
//        System.out.println(lista.size() + " tam " + arreglo.length);
        for (int i = 0; i < arreglo.length; i++) {
            model.addElement(arreglo[i]);
        }
        return model;

    }
    
    private static Object[] arregloSucursal(ArrayList<model_emp_sucursal> lista) {
        Object[] arreglo = new Object[lista.size() + 1];
        arreglo[0] = "SELECCIONE SUCURSAL...";
        for (int i = 0; i < lista.size(); i++) {
            arreglo[(i + 1)] = lista.get(i).getNombre_comercial();
        }
        return arreglo;

    }

    public static DefaultComboBoxModel ComboGetSucursal(ArrayList<model_emp_sucursal> lista) {
        DefaultComboBoxModel model = new DefaultComboBoxModel();
        Object[] arreglo = arregloSucursal(lista);
//        System.out.println(lista.size() + " tam " + arreglo.length);
        for (Object arreglo1 : arreglo) {
            model.addElement(arreglo1);
        }
        return model;

    }
}
