/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.modelEXT;

import ec.com.cp.controler.ctr_inv_bodega;
import ec.com.cp.controler.ctr_pdt_articulo;
import ec.com.cp.controler.ctr_pdt_categoria;
import ec.com.cp.controler.ctr_pdt_envase;
import ec.com.cp.controler.ctr_pdt_marca;
import ec.com.cp.controler.ctr_pdt_medida;
import ec.com.cp.controler.ctr_pdt_subcategoria;
import ec.com.cp.controler.ctr_seg_proveedor;
import ec.com.cp.model.model_pdt_categoria;
import ec.com.cp.model.model_pdt_envase;
import ec.com.cp.model.model_pdt_medida;
import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
import ec.com.cp.model.join.model_seg_proveedor_join;
import ec.com.cp.model.model_gen_bodega;
import ec.com.cp.model.model_pdt_articulo_dos;
import ec.com.cp.model.model_pdt_marca_dos;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Usuario
 */
public class ObtenerModel {

    public static model_pdt_categoria ObtenerCategoria(String nombre) {

        ctr_pdt_categoria control = new ctr_pdt_categoria();
        model_pdt_categoria dto = new model_pdt_categoria();
        List<model_pdt_categoria> lista = control.listarCategorias(1);

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static model_pdt_subcategoria_join_subcategoria ObtenerSubcategoria(String nombre) {

        ctr_pdt_subcategoria control = new ctr_pdt_subcategoria();
        model_pdt_subcategoria_join_subcategoria dto = new model_pdt_subcategoria_join_subcategoria();
        List<model_pdt_subcategoria_join_subcategoria> lista = control.listarSubCategorias(1);

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
    
    public static model_pdt_subcategoria_join_subcategoria ObtenerSubcategoriaId(Long id) {

        ctr_pdt_subcategoria control = new ctr_pdt_subcategoria();
        model_pdt_subcategoria_join_subcategoria dto = new model_pdt_subcategoria_join_subcategoria();
        ArrayList<model_pdt_subcategoria_join_subcategoria> lista = control.listarSubCategorias(1);

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getId_categoria().equals(id)) {
                dto = lista.get(i);
                System.out.println("sucategorias: "+dto.getId_subcategoria());
//                break;
            }
        }
        return dto;
    }
    
    public static model_pdt_articulo_dos ObtenerArticulo(String nombre) {

        ctr_pdt_articulo control = new ctr_pdt_articulo();
        model_pdt_articulo_dos dto = new model_pdt_articulo_dos();
        List<model_pdt_articulo_dos> lista = control.listarArticulos(1);
        for (int i = 0; i < lista.size(); i++) {
//            System.out.println("1" + lista.get(i).getNombre_articulo());
            if (lista.get(i).getArticulo().equals(nombre)) {
                dto = lista.get(i);
//                System.out.println(" entro id " + lista.get(i).getId_articulo());
                break;
            }
        }
        return dto;
    }

    public static model_pdt_medida ObtenerMedida(String nombre) {

        ctr_pdt_medida control = new ctr_pdt_medida();
        model_pdt_medida dto = new model_pdt_medida();
        List<model_pdt_medida> lista = control.listarMedida();

        for (int i = 0; i < lista.size(); i++) {
//            System.out.println("nombreMe :" + nombre.toString());
//            System.out.println("listME :" + lista.get(i).getNombre_medida());
            if (lista.get(i).getNombre_medida().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static model_pdt_envase ObtenerEnvase(String nombre) {

        ctr_pdt_envase control = new ctr_pdt_envase();
        model_pdt_envase dto = new model_pdt_envase();
        List<model_pdt_envase> lista = control.listarMedida(1);

        for (int i = 0; i < lista.size(); i++) {
//            System.out.println("nombre :" + nombre);
//            System.out.println("listen :" + lista.get(i).getNombre_envase());
            if (lista.get(i).getNombre_envase().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
    
    public static model_pdt_marca_dos ObtenerMarca(String nombre) {

        ctr_pdt_marca control = new ctr_pdt_marca();
        model_pdt_marca_dos dto = new model_pdt_marca_dos();
        List<model_pdt_marca_dos> lista = control.listarMarcas(1);

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre_marca().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
    
    public static model_gen_bodega ObtenerBodega(Long id) {

        ctr_inv_bodega control = new ctr_inv_bodega();
        model_gen_bodega dto = new model_gen_bodega();
        List<model_gen_bodega> lista = control.ListarBodega();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getId_bodega().equals(id)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
    
    public static model_seg_proveedor_join ObtenerProveedor(Long id) {

        ctr_seg_proveedor control = new ctr_seg_proveedor();
        model_seg_proveedor_join dto = new model_seg_proveedor_join();
        List<model_seg_proveedor_join> lista = control.ListaProveedorJoinTodo();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getId_usuario().equals(id)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
}


