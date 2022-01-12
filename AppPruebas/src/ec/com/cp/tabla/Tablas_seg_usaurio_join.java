/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import ec.com.cp.model.join.model_seg_proveedor_join;
import ec.com.cp.model.join.model_seg_usuario_join;
import java.util.ArrayList;
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
public class Tablas_seg_usaurio_join {
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
    
    public static void listarUsuarios(ArrayList<model_seg_usuario_join> lista, JTable Tabla) {
        int[] a = {60,130,90,300,90,180};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.LEFT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°","CARGO","CEDULA","NOMBRES Y APELLIDOS",
            "TELEFONO","CORREO"};
        String[] Filas = new String[6];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {

                Filas[0] = "" + lista.get(i).getId_usuario();
                Filas[1] = lista.get(i).getRol();
                Filas[2] = lista.get(i).getCedula();
                Filas[3] = lista.get(i).getNombre();
                Filas[4] = lista.get(i).getTelefono();
                Filas[5] = lista.get(i).getEmail();
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
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr1);
                Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
                Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr1);
//            }
        }
    }
    
    public static void listarProveedores(ArrayList<model_seg_proveedor_join> lista, JTable Tabla) {
        int[] a = {60,90,300,90,180};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr1.setHorizontalAlignment(SwingConstants.CENTER);
        tcr.setHorizontalAlignment(SwingConstants.LEFT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°","CEDULA","NOMBRE COMERCIAL",
            "TELEFONO","CORREO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {
//            if (lista.get(i).getEstado()=='A') {

                Filas[0] = "" + lista.get(i).getId_usuario();
                Filas[1] = lista.get(i).getCedula();
                Filas[2] = lista.get(i).getNombre_comercial();
                Filas[3] = lista.get(i).getTelefono_dos();
                Filas[4] = lista.get(i).getEmail();
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
}
