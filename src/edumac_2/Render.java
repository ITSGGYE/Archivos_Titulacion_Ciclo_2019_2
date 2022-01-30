
package edumac_2;
import java.awt.Component;
import javax.swing.JCheckBox;
import javax.swing.JLabel;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableCellRenderer;

public class Render implements TableCellRenderer {
    @Override
    public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
       JLabel label = new JLabel();
       JCheckBox check = new JCheckBox();
       
       DefaultTableModel model = (DefaultTableModel) table.getModel();
       
       if(model.getValueAt(row, column).getClass().equals(Boolean.class)  ){
           check.setSelected(Boolean.parseBoolean(model.getValueAt(row, column).toString()));
           return check;    
       }
       if(column<=1){
           label.setText(model.getValueAt(row, column).toString());
       }
       return label;    
    }
}
