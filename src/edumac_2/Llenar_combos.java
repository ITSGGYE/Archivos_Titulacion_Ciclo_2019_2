/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package edumac_2;
import java.sql.ResultSet;
import javax.swing.JComboBox;

public class Llenar_combos {
     
    public void llenar_combo_rol(JComboBox cmb_rol){
        CRUD c = new CRUD(); 
        cmb_rol.removeAllItems();
        try{           
            ResultSet rs = c.select("SELECT rol FROM rol " +
                                    "WHERE est_reg = 'A'"); 
            if (rs.next()!= false){ 
                do{ cmb_rol.addItem(rs.getString(1));                                               
                  }while(rs.next());                                                       
            }
        }catch(Exception ex){
              //JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
        }   
    }
}
