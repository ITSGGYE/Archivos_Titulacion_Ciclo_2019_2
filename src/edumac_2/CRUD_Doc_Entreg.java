
package edumac_2;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;


public class CRUD_Doc_Entreg {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    
    public static void main(String[] args) throws SQLException{
         CRUD dcmt = new CRUD();         
     }
    
     public int act_doc_entreg(int id_mat,int id_doc,String std){        
        Conexion c = new Conexion();        
        ResultSet rs = null;     
        est="A";
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = " UPDATE rel_matri_doc SET " +
                  " entregado = ? "+
                  " WHERE id_matricula = ?" +
                  " AND id_documento = ?"  +
                  " AND est_reg = ? "; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, std);
            ps.setInt   (2, id_mat);
            ps.setInt   (3, id_doc);
            ps.setString(4, est);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
}
