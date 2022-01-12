/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import ec.com.cp.controler.ctr_gen_iva;
import ec.com.cp.model.join.model_inv_inventario_join;
import ec.com.cp.model.model_gen_iva;
import ec.com.cp.model.model_inv_detalle_tarifario;
import ec.com.cp.util.Formato_Numeros;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JTable;
import javax.swing.RowFilter;
import javax.swing.SwingConstants;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableRowSorter;

/**
 *
 * @author carlos
 */
public class Tablas_inv_inventario {

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

    public static void listarInventario(List<model_inv_inventario_join> lista, JTable Tabla) {
        int[] a = {100, 450, 100, 100, 30, 30, 30, 50, 50};

//        model_gen_iva obj = new model_gen_iva();
        ctr_gen_iva crudIva = new ctr_gen_iva();
        ArrayList<model_gen_iva> listIva = crudIva.listarIvaActivo(1);

        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "  PRODUCTO", "CANTIDAD", "PRECIO", "IVA", "SUBTOTAL", "VALOR TOTAL", "MIN", "MAX"};
        String[] Filas = new String[9];
        model = new DefaultTableModel(null, Co);
        Long iva = null;
        for (int i = 0; i < lista.size(); i++) {

            Tabla.setDefaultRenderer(Object.class, new RenderColor());
            Double precio = lista.get(i).getPrecio();
            long cantidad = lista.get(i).getCantidad();
            Double Subtotal;
            Subtotal = precio * cantidad;
            Filas[0] = "" + lista.get(i).getId_kardex();
            Filas[1] = lista.get(i).getNombre_producto();
//            if(){
//            }
            Filas[2] = "" + lista.get(i).getCantidad();
            Filas[3] = "" + lista.get(i).getPrecio();

            for (int j = 0; j < listIva.size(); j++) {
                if (listIva.get(j).getId_iva().equals(lista.get(i).getId_iva())) {
                    iva = Long.valueOf(listIva.get(j).getIva());
                }
            }
            Double resultadoIva = Subtotal * iva / 100;
            Filas[4] = Formato_Numeros.formatoNumero("" + resultadoIva);
            Double Total = Subtotal + resultadoIva;
            Filas[5] = Formato_Numeros.formatoNumero("" + Subtotal);
            Filas[6] = Formato_Numeros.formatoNumero("" + Total);
            Filas[7] = "" + lista.get(i).getMinimo();
            Filas[8] = "" + lista.get(i).getMaximo();
            model.addRow(Filas);
            Tabla.setRowHeight(30);
//            Tabla.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
            Tabla.setModel(model);
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
//            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
//            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
//            Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(7).setPreferredWidth(a[7]);
//            Tabla.getColumnModel().getColumn(7).setCellRenderer(tcr);
        }
    }

    public static void listarInventarioStock(List<model_inv_inventario_join> lista, JTable Tabla) {
        int[] a = {75, 150, 400, 75, 75, 75, 75};

//        model_gen_iva obj = new model_gen_iva();
        ctr_gen_iva crudIva = new ctr_gen_iva();
        ArrayList<model_gen_iva> listIva = crudIva.listarIvaActivo(1);

        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);

        String[] Co = {"COD.", "COD. BARRA", "DESCRIPCION", "STOCK", "PRECIO", "DESCUENTO", "IVA"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);
        Long iva = null;
        for (int i = 0; i < lista.size(); i++) {

//            Tabla.setDefaultRenderer(Object.class, new RenderColor());
            Filas[0] = "" + lista.get(i).getId_producto();
            Filas[1] = lista.get(i).getCodigo_barra();
            Filas[2] = lista.get(i).getNombre_producto();
            Filas[3] = "" + lista.get(i).getCantidad();
            Filas[4] = "" + lista.get(i).getValor_venta();
            Filas[5] = "" + lista.get(i).getValor_descuento();
            Filas[6] = lista.get(i).getIva_string();
            model.addRow(Filas);
//            Tabla.setRowHeight(30);
//            Tabla.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
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
        }
    }
    
    public static void listarInventarioStockEntrada(List<model_inv_inventario_join> lista, JTable Tabla) {
        int[] a = {75, 150, 400, 75, 75, 75, 75};

//        model_gen_iva obj = new model_gen_iva();
        ctr_gen_iva crudIva = new ctr_gen_iva();
        ArrayList<model_gen_iva> listIva = crudIva.listarIvaActivo(1);

        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);

        String[] Co = {"COD.", "COD. BARRA", "DESCRIPCION", "PRECIO", "STOCK", "STOCK MINIMO", "STOCK MAXIMO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);
        Long iva = null;
        for (int i = 0; i < lista.size(); i++) {

//            Tabla.setDefaultRenderer(Object.class, new RenderColor());
            Filas[0] = "" + lista.get(i).getId_producto();
            Filas[1] = lista.get(i).getCodigo_barra();
            Filas[2] = lista.get(i).getNombre_producto();
            Filas[3] = "" + lista.get(i).getValor_costo();
            Filas[4] = "" + lista.get(i).getCantidad();
            Filas[5] = "" + lista.get(i).getMinimo();
            Filas[6] = ""+lista.get(i).getMaximo();
            model.addRow(Filas);
//            Tabla.setRowHeight(30);
//            Tabla.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
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
        }
    }

    public static void listarInventarioCuenca(List<model_inv_inventario_join> lista, JTable Tabla
    ) {
        int[] a = {100, 450, 100, 100, 30, 30, 30, 50,100};

//        model_gen_iva obj = new model_gen_iva();
        ctr_gen_iva crudIva = new ctr_gen_iva();
        ArrayList<model_gen_iva> listIva = crudIva.listarIvaActivo(1);

        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
//        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
//        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "COD. BARRA", "  PRODUCTO", "CANTIDAD", "VALOR COSTO", "VALOR VENTA","VALOR DESCUENTO", "MIN", "MAX","BODEGA"};
        String[] Filas = new String[10];
        model = new DefaultTableModel(null, Co);
        Long iva = null;
        Tabla.setDefaultRenderer(Object.class, new RenderColor());
        for (int i = 0; i < lista.size(); i++) {
            for (int j = 0; j < listIva.size(); j++) {
                if (listIva.get(j).getId_iva().equals(lista.get(i).getId_iva())) {
                    iva = Long.valueOf(listIva.get(j).getIva());
                }
            }
//            long cantidad = lista.get(i).getCantidad();
//            Double Subtotal;
//            Subtotal = precio * cantidad;
            Filas[0] = "" + lista.get(i).getId_producto();
            if(lista.get(i).getCodigo_barra().equals("")){
                Filas[1] = "       -";
            }else{
            Filas[1] = "" + lista.get(i).getCodigo_barra();}
            Filas[2] = lista.get(i).getNombre_producto();
            Filas[3] = "" + lista.get(i).getCantidad();
            Filas[4] = Formato_Numeros.formatoNumero("" + lista.get(i).getValor_costo());
//            Double resultadoIva = Subtotal * iva / 100;
            Filas[5] =Formato_Numeros.formatoNumero("" + lista.get(i).getValor_venta());
//            Double Total = Subtotal + resultadoIva;
            Filas[6] = Formato_Numeros.formatoNumero("" + lista.get(i).getValor_descuento());
            Filas[7] = "" + lista.get(i).getMinimo();
            Filas[8] = "" + lista.get(i).getMaximo();
            Filas[9] = lista.get(i).getNombre_bodega();
            model.addRow(Filas);
            Tabla.setRowHeight(30);
//            Tabla.setAutoResizeMode(JTable.AUTO_RESIZE_OFF);
            Tabla.setModel(model);
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
//            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
//            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
//            Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
//            Tabla.getColumnModel().getColumn(7).setPreferredWidth(a[7]);
//            Tabla.getColumnModel().getColumn(7).setCellRenderer(tcr);
        }
    }
}
