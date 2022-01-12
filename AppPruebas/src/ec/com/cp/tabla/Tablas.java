/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import ec.com.cp.model.join.model_pdt_presentacion_join;
import ec.com.cp.model.model_pdt_articulo;
import ec.com.cp.model.model_pdt_categoria;
import ec.com.cp.model.model_pdt_envase;
import ec.com.cp.model.model_pdt_marca;
import ec.com.cp.model.model_pdt_medida;
import ec.com.cp.model.join.model_pdt_producto_join;
import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
import ec.com.cp.model.join.model_seg_cliente_join;
import ec.com.cp.model.model_inv_detalle_tarifario;
import ec.com.cp.model.model_pdt_articulo_dos;
import ec.com.cp.model.model_pdt_marca_dos;
import ec.com.cp.model.model_pdt_producto;
import java.util.List;
import javax.swing.JTable;
import javax.swing.RowFilter;
import javax.swing.SwingConstants;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableRowSorter;

/**
 *
 * @author Usuario
 */
public class Tablas {

    static DefaultTableModel model;

    public static void filtro(String valor, JTable Tabla) {
        TableRowSorter<DefaultTableModel> tr = new TableRowSorter<>(model);
        Tabla.setRowSorter(tr);
        tr.setRowFilter(RowFilter.regexFilter("(?i)" + valor));
    }

    public static DefaultTableModel VaciarTabla(JTable tabla) {
        DefaultTableModel tab
                = (DefaultTableModel) tabla.getModel();
        while (tab.getRowCount() > 0) {
            tab.removeRow(0);
        }
        return tab;
    }

    public static void listarCategorias(List<model_pdt_categoria> lista, JTable Tabla) {
        int[] a = {10, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CATEGORIA", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_categoria();
            Filas[1] = lista.get(i).getNombre();
            Filas[2] = Character.toString(lista.get(i).getEstado());
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarSubCategorias(List<model_pdt_subcategoria_join_subcategoria> lista, JTable Tabla) {
        int[] a = {10, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "SUBCATEGORIA", "CATEGORIA", "ESTADO"};
        String[] Filas = new String[4];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_subcategoria();
            Filas[1] = lista.get(i).getNombre();
            Filas[2] = "" + lista.get(i).getNombre_categoria();
            Filas[3] = Character.toString(lista.get(i).getEstado());
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
//            }
        }
    }

//    public static void listarMarcas(List<model_pdt_marca> lista, JTable Tabla) {
//        int[] a = {10, 100, 100, 10};
//        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
//        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
//        model = Tablas.VaciarTabla(Tabla);
//        String[] Co = {"N°", "MARCA", "ARTICULO", "ESTADO"};
//        String[] Filas = new String[4];
//        model = new DefaultTableModel(null, Co);
//
//        Tabla.setShowGrid(true);
//        for (int i = 0; i < lista.size(); i++) {
////            if (lista.get(i).getEstado()=='A') {
//            Filas[0] = "" + lista.get(i).getId_marca();
//            Filas[1] = lista.get(i).getNombre();
//            Filas[2] = lista.get(i).getArticulo();
//            Filas[3] = Character.toString(lista.get(i).getEstado());
//            model.addRow(Filas);
//            Tabla.setModel(model);
//            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
//            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
//            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
//            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
//            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
////            }
//        }
//    }
    
    public static void listarArticulos(List<model_pdt_articulo_dos> lista, JTable Tabla) {
        int[] a = {10, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "ARTICULO", "MARCA", "ESTADO"};
        String[] Filas = new String[4];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_articulo();
            Filas[2] = lista.get(i).getNombre_marca();
            Filas[1] = lista.get(i).getArticulo();
            Filas[3] = Character.toString(lista.get(i).getEstado());
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarMarcasIdArticulo(List<model_pdt_marca_dos> lista, JTable Tabla) {
        int[] a = {10, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "MARCA", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_marca();
            Filas[1] = lista.get(i).getNombre_marca();
            Filas[2] = Character.toString(lista.get(i).getEstado());
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarProducto(List<model_pdt_producto> lista, JTable Tabla) {
        int[] a = {100, 200, 300, 200,200, 200, 200, 200, 200, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO BARRA","NOMBRE DE PRODUCTO", "CATEGORIA", "SUBCATEGORIA", "MARCA", "ARTICULO", "MEDIDA", "ENVASE", "PRECIO", "ESTADO"};
        String[] Filas = new String[11];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_producto();
            System.out.println("*" + lista.get(i).getCodigo_barra() + "*");
            if ("".equals(lista.get(i).getCodigo_barra())) {
                Filas[1] = "-";
            } else {
                Filas[1] = "" + lista.get(i).getCodigo_barra();
            }
            Filas[2] = lista.get(i).getNombre_producto1();
            Filas[3] = lista.get(i).getNombre_categoria();
            Filas[4] = lista.get(i).getNombre_subcategoria();
            Filas[5] = lista.get(i).getArticulo();
            Filas[6] = lista.get(i).getNombre_marca();
            Filas[7] = lista.get(i).getNombre_medida();
            Filas[8] = lista.get(i).getNombre_envase();
            Filas[9] = "" + lista.get(i).getPrecio();
            Filas[10] = "" + lista.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
            Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(7).setPreferredWidth(a[7]);
            Tabla.getColumnModel().getColumn(7).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(8).setPreferredWidth(a[8]);
            Tabla.getColumnModel().getColumn(8).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(9).setPreferredWidth(a[9]);
            Tabla.getColumnModel().getColumn(9).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(10).setPreferredWidth(a[10]);
            Tabla.getColumnModel().getColumn(10).setCellRenderer(tcr);
//            }
        }
    }
    public static void listarMarca(List<model_pdt_marca_dos> lista, JTable Tabla) {
        int[] a = {10, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "MARCA", "SUBCATEGORIA", "CATEGORIA", "ESTADO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_marca();
            Filas[1] = lista.get(i).getNombre_marca();
            Filas[2] = lista.get(i).getNombre_subcategoria();
            Filas[3] = lista.get(i).getNombre_categoria();
            Filas[4] = Character.toString(lista.get(i).getEstado());
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
//            }
        }
    }

//    public static void listarArticulos(List<model_pdt_articulo> lista, JTable Tabla) {
//        int[] a = {10, 100, 100, 100, 10};
//        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
//        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
//        model = Tablas.VaciarTabla(Tabla);
//        String[] Co = {"N°", "ARTICULO", "SUBCATEGORIA", "CATEGORIA", "ESTADO"};
//        String[] Filas = new String[5];
//        model = new DefaultTableModel(null, Co);
//
//        Tabla.setShowGrid(true);
//        for (int i = 0; i < lista.size(); i++) {
////            if (lista.get(i).getEstado()=='A') {
//            Filas[0] = "" + lista.get(i).getId_articulo();
//            Filas[1] = lista.get(i).getNombre_articulo();
//            Filas[2] = lista.get(i).getSubcategoria();
//            Filas[3] = lista.get(i).getCategoria();
//            Filas[4] = Character.toString(lista.get(i).getEstado());
//            model.addRow(Filas);
//            Tabla.setModel(model);
//            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
//            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
//            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
//            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
//            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
//            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
////            }
//        }
//    }

    public static void listarArticulosIdSubcategoria(List<model_pdt_articulo_dos> lista, JTable Tabla) {
        int[] a = {10, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "ARTICULO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getEstado() == 'A') {
                Filas[0] = "" + lista.get(i).getId_articulo();
                Filas[1] = lista.get(i).getArticulo();
                Filas[2] = Character.toString(lista.get(i).getEstado());
                model.addRow(Filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            }
        }
    }

    public static void listarEnvase(List<model_pdt_envase> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "ENVASE", "ESTADO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_envase();
            Filas[1] = lista.get(i).getNombre_envase();
            Filas[2] = lista.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarMedida(List<model_pdt_medida> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "MEDIDA", "ESTADO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_medida();
            Filas[1] = lista.get(i).getNombre_medida();
            Filas[2] = lista.get(i).getEstdao();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarPresentacionIdMarca(List<model_pdt_presentacion_join> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "ENVASE", "MEDIDA"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_presentacion();
            Filas[1] = lista.get(i).getNombre_envase();
            Filas[2] = lista.get(i).getNombre_medida();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarClientes(List<model_seg_cliente_join> lista, JTable Tabla) {
        int[] a = {10, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "N°IDENTIFICACION", "NOMBRE COMPLETO", "DIRECCION", "ESTADO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_persona();
            Filas[1] = lista.get(i).getCedula();
            Filas[2] = lista.get(i).getNombre();
            Filas[3] = lista.get(i).getDireccion();
            Filas[4] = lista.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarDetalleTarifario(List<model_inv_detalle_tarifario> lista, JTable Tabla) {
        int[] a = {100, 400, 150, 100,150/*, 100*/};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "PRODUCTO", "VALOR COMPRA", "VALOR VENTA", "VALOR DESCUENTO"/*, "ESTADO"*/};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {
            Filas[0] = "" + lista.get(i).getId_detalle_tarifario();
            Filas[1] = lista.get(i).getNombre_producto();
            Filas[2] = "" + lista.get(i).getValor_costo();
            Filas[3] = "" + lista.get(i).getValor_venta();
            Filas[4] = "" + lista.get(i).getValor_descuento();
//            Filas[5] = lista.get(i).getAplica_iva();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
//            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
//            }
        }
    }
}
