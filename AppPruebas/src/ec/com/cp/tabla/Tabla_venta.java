/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import ec.com.cp.model.model_ven_detalle_venta;
import ec.com.cp.util.Formato_Numeros;
import java.util.List;
import javax.swing.JButton;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author Usuario
 */
public class Tabla_venta {

    private static boolean[] tbVenta = {false, false, false, true, false, false, false, false, false, true};

    public static void llenarDetalleVenta(JTable tabla, List<model_ven_detalle_venta> lista) {
        int[] a = {10, 30, 200, 30, 60};
        model_ven_detalle_venta vo = new model_ven_detalle_venta();

        tabla
                .setDefaultRenderer(Object.class,
                        new Render());
        DefaultTableModel dt = new DefaultTableModel(new String[]{"N°", "COD. PROD",
            "DESCRIPCION", "CANTIDAD", "PRECIO", "DESCUENTO", "IVA", "SUBTOTAL", "TOTAL", "",}, 0) {
            Class[] types = new Class[]{
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
                java.lang.Object.class,
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
                Object filas[] = new Object[10];
                vo = lista.get(i);
                filas[0] = lista.get(i).getLinea_detalle();
                filas[1] = lista.get(i).getId_producto() ;
                filas[2] = lista.get(i).getDescripcion();
                filas[3] = lista.get(i).getCantidad();
                filas[4] = lista.get(i).getPrecio_unitario();
                filas[5] = lista.get(i).getDecuento();
//                filas[6] = "";
//                filas[7] = "";
//                filas[8] = "";
                filas[6] = Formato_Numeros.formatoNumero("" + lista.get(i).getIva());
                filas[7] = Formato_Numeros.formatoNumero("" + lista.get(i).getSub_total());
                filas[8] = Formato_Numeros.formatoNumero("" + lista.get(i).getTotal());
                JButton button = new JButton("ELIMINAR");
                filas[9] = button;
                dt.addRow(filas);

            }

        }
        tabla.setModel(dt);
        tabla.setRowHeight(30);

        tabla.setModel(dt);
    }

}
