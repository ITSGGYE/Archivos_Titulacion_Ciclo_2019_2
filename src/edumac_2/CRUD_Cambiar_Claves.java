
package edumac_2;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;


public class CRUD_Cambiar_Claves {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
    
    public int act_clave(int cod_usua, String passw){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE usuario  SET clave = ? " +                    
                    " WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, passw);
            ps.setInt       (2, cod_usua);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }        
}
