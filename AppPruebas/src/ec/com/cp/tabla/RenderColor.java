/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.tabla;

import java.awt.Color;
import java.awt.Component;
import javax.swing.JTable;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.TableCellRenderer;

/**
 *
 * @author Usuario
 */
public class RenderColor extends DefaultTableCellRenderer {

//    @Override
//    public Component getTableCellRendererComponent(JTable table, Object value, boolean Selected, boolean hasFocus, int row, int col) {
//
//        super.getTableCellRendererComponent(table, value, Selected, hasFocus, row, col);
//        System.out.println("row+"+table.getValueAt(row, 0).toString()+table.getValueAt(row, 1).toString()+
//                table.getValueAt(row, 2).toString()+table.getValueAt(row, 3).toString()+table.getValueAt(row, 4).toString()+
//                table.getValueAt(row, 5).toString()+table.getValueAt(row, 6).toString()+table.getValueAt(row, 7).toString());
//        if (Long.parseLong(table.getValueAt(row, 2).toString()) <= Long.parseLong(table.getValueAt(row, 6).toString())) {
//            setBackground(Color.RED);
//        }
//        if (Long.parseLong(table.getValueAt(row, 2).toString()) >= Long.parseLong(table.getValueAt(row, 7).toString())) {
//            setBackground(Color.GREEN);
//        }
//
////        return super.getTableCellRendererComponent(table, value, Selected, hasFocus, row, col); 
//        return this;
//
//    }
//    private int columna;
    @Override
    public Component getTableCellRendererComponent(JTable table, Object value, boolean selected, boolean focused, int row, int column) {
        setBackground(Color.white);
        table.setForeground(Color.black);
        super.getTableCellRendererComponent(table, value, selected, focused, row, column);
        if (Long.parseLong(table.getValueAt(row, 3).toString()) <= Long.parseLong(table.getValueAt(row, 7).toString()) 
                && Long.parseLong(table.getValueAt(row, 3).toString()) > 0) {
//            this.setForeground(Color.RED);
            setBackground(Color.ORANGE);
        } else if (Long.parseLong(table.getValueAt(row, 3).toString()) > Long.parseLong(table.getValueAt(row, 8).toString())) {
//            setForeground(Color.GRAY);
            setBackground(Color.BLUE);
        } else if (Long.parseLong(table.getValueAt(row, 3).toString()) <= 0) {
//            this.setForeground(Color.BLUE);
            setBackground(Color.RED);
        }
        return this;
    }
}
