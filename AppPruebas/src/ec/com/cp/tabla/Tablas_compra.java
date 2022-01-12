/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import ec.com.cp.model.join.model_co_orden_compra_join;
import ec.com.cp.model.model_co_cabecera_compra;
import ec.com.cp.model.model_co_detalle_compra;
import ec.com.cp.util.Formato_Numeros;
import java.util.List;
import javax.swing.JButton;
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
public class Tablas_compra {
    
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
    
    
    public static void listarOrdenCompra(List<model_co_cabecera_compra> lista, JTable Tabla) {
        int[] a = {100, 125, 180, 180, 180, 180, 180,125};
        String estado = "";

        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        tcr1.setHorizontalAlignment(SwingConstants.CENTER);
        tcr.setHorizontalAlignment(SwingConstants.LEFT);
        model = Tablas.VaciarTabla(Tabla);

        String[] Co = {"N°","ESTADO","CREADO POR","FECHA DE CREACION","RECIBIDO POR", 
            "APROBADO POR","FECHA DE VERIFICACION", "TOTAL FACTURADO"};
        String[] Filas = new String[8];
        model = new DefaultTableModel(null, Co);
        for (int i = 0; i < lista.size(); i++) {
//            estado = String.valueOf(lista.get(i).getEstado());
            Filas[0] = "" + lista.get(i).getId_cabecera();
            Filas[1] = lista.get(i).getEstado();
            Filas[2] = lista.get(i).getUsuario_creacion();
            Filas[3] = ""+lista.get(i).getF_creacion();
            Filas[4] = "" + lista.get(i).getRecibido();
//            Filas[5] = "" + lista.get(i).getF_recibido();
            Filas[5] = "" + lista.get(i).getVerificado();
            Filas[6] = "" + lista.get(i).getF_verificado();
            Filas[7] = "" + lista.get(i).getTotal_facturado();
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
            Tabla.getColumnModel().getColumn(7).setCellRenderer(tcr1);
        }
    }
    
    public static void listarOrdenCompraReporte(List<model_co_cabecera_compra> lista, JTable Tabla) {
        int[] a = {100, 125, 180, 180, 180, 180, 180,125};
        String estado = "";

        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        tcr1.setHorizontalAlignment(SwingConstants.CENTER);
        tcr.setHorizontalAlignment(SwingConstants.LEFT);
        model = Tablas.VaciarTabla(Tabla);

        String[] Co = {"ESTADO","N°","CREADO POR","FECHA DE CREACION","RECIBIDO POR", 
            "APROBADO POR","FECHA DE VERIFICACION", "TOTAL FACTURADO"};
        String[] Filas = new String[8];
        model = new DefaultTableModel(null, Co);
        for (int i = 0; i < lista.size(); i++) {
//            estado = String.valueOf(lista.get(i).getEstado());
            Filas[1] = "" + lista.get(i).getId_cabecera().toString();
            Filas[0] = lista.get(i).getEstado();
            Filas[2] = lista.get(i).getUsuario_creacion();
            Filas[3] = ""+lista.get(i).getF_creacion();
            Filas[4] = "" + lista.get(i).getRecibido();
//            Filas[5] = "" + lista.get(i).getF_recibido();
            Filas[5] = "" + lista.get(i).getVerificado();
            Filas[6] = "" + lista.get(i).getF_verificado();
            Filas[7] = "" + lista.get(i).getTotal_facturado();
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
            Tabla.getColumnModel().getColumn(7).setCellRenderer(tcr1);
        }
    }
    
    
    private static boolean[] tbVenta = {false, false, false, true, false, false, false, false, false, true};

    public static void llenarDetalleCompra(JTable tabla, List<model_co_detalle_compra> lista) {
        int[] a = {10, 30, 200, 30, 60};
        model_co_detalle_compra co = new model_co_detalle_compra();

        tabla
                .setDefaultRenderer(Object.class,
                        new Render());
        DefaultTableModel dt = new DefaultTableModel(new String[]{"N°", "COD. PROD",
            "DESCRIPCION", "CANTIDAD", "PRECIO",/* "DESCUENTO",*/ "IVA", "SUBTOTAL", "TOTAL", "",}, 0) {
            Class[] types = new Class[]{
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
//                java.lang.Object.class,
                JButton.class

            };

            public Class getColumnClass(int columnIndex) {
                return types[columnIndex];
            }

            public boolean isCellEditable(int row, int column) {
                return tbVenta[column];
            }
        };
        if (lista.size() > 0) {
            for (int i = 0; i < lista.size(); i++) {
                Object filas[] = new Object[9];
                co = lista.get(i);
                filas[0] = lista.get(i).getLinea_detalle();
                filas[1] = lista.get(i).getId_producto() ;
                filas[2] = lista.get(i).getDescripcion();
                filas[3] = lista.get(i).getCantidad();
                filas[4] = lista.get(i).getPrecio_unitario();
//                filas[5] = lista.get(i).getDecuento();
//                filas[6] = "";
//                filas[7] = "";
//                filas[8] = "";
                filas[5] = Formato_Numeros.formatoNumero("" + lista.get(i).getIva());
                filas[6] = Formato_Numeros.formatoNumero("" + lista.get(i).getSub_total());
                filas[7] = Formato_Numeros.formatoNumero("" + lista.get(i).getTotal());
                JButton button = new JButton("ELIMINAR");
                filas[8] = button;
                dt.addRow(filas);

            }

        }
        tabla.setModel(dt);
        tabla.setRowHeight(30);

        tabla.setModel(dt);
    }
    
    private static boolean[] tbOrdenCompra = {false, false, false, true, true, false, false, false};

    public static void llenarDetalleOrdenCompra(JTable tabla, List<model_co_detalle_compra> lista) {
//        int[] a = {10, 30, 200, 30, 60};
        model_co_detalle_compra co = new model_co_detalle_compra();

        tabla
                .setDefaultRenderer(Object.class,
                        new Render());
        DefaultTableModel dt = new DefaultTableModel(new String[]{"N°", "COD. PROD",
            "DESCRIPCION", "CANTIDAD", "PRECIO", /*"DESCUENTO", */"IVA", "SUBTOTAL", "TOTAL",}, 0) {
            Class[] types = new Class[]{
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class
//                java.lang.Object.class

            };

            @Override
            public Class getColumnClass(int columnIndex) {
                return types[columnIndex];
            }

            @Override
            public boolean isCellEditable(int row, int column) {
                return tbOrdenCompra[column];
            }
        };
        if (lista.size() > 0) {
            for (int i = 0; i < lista.size(); i++) {
                Object filas[] = new Object[8];
                co = lista.get(i);
                filas[0] = lista.get(i).getLinea_detalle();
                filas[1] = lista.get(i).getId_producto() ;
                filas[2] = lista.get(i).getDescripcion();
                filas[3] = lista.get(i).getCantidad();
                filas[4] = lista.get(i).getPrecio_unitario();
//                filas[5] = lista.get(i).getDecuento();
                filas[5] = Formato_Numeros.formatoNumero("" + lista.get(i).getIva());
                filas[6] = Formato_Numeros.formatoNumero("" + lista.get(i).getSub_total());
                filas[7] = Formato_Numeros.formatoNumero("" + lista.get(i).getTotal());
//                JButton button = new JButton("ELIMINAR");
//                filas[9] = button;
                dt.addRow(filas);

            }

        }
        tabla.setModel(dt);
        tabla.setRowHeight(30);

        tabla.setModel(dt);
    }
}
