/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.modelEXT;

import ec.com.cp.controler.ctr_pdt_categoria;
import ec.com.cp.model.model_pdt_categoria;
import java.util.List;

/**
 *
 * @author Usuario
 */
public class ValidarDTO {

    public static boolean ValidarPdtCategoria(String nombre) {
        ctr_pdt_categoria crud = new ctr_pdt_categoria();
        boolean valor = false;
        List<model_pdt_categoria> lista = crud.listarCategorias(1);

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                valor = true;
            }
        }
        return valor;

    }
}
