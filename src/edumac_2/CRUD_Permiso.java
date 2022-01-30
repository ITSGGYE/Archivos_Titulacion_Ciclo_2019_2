
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Permiso {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
         CRUD prms = new CRUD();         
    }
    
    public int agre_perm(int cd_rl, int cd_prm, String prm){
        int est_reg = 0;        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO perfil (id_rol,id_permiso,est_reg) " +
                  "VALUES (?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setInt(1, cd_rl);
            ps.setInt(2, cd_prm);
            ps.setString(3, prm);
            est_reg = ps.executeUpdate();
            conn.close();            
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    
    public int act_perm(int cd_rl, int cd_prm, String prm){        
        Conexion c = new Conexion();        
        ResultSet rs = null;     
        est="A";
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = " UPDATE perfil as p SET " +
                  " p.est_reg = ? "+
                  " WHERE p.id_rol = ?" +
                  " AND p.id_permiso = ?" ; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString       (1, prm);
            ps.setInt          (2, cd_rl);
            ps.setInt          (3, cd_prm);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    
    public int act_rol(int cd_rl){        
        Conexion c = new Conexion();        
        ResultSet rs = null; 
        String ET= "S";
        est="A";
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = " UPDATE rol as p SET " +
                  " p.tiene_perm = ? "+
                  " WHERE p.id = ?" +
                  " AND p.est_reg = ?" ; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, ET);
            ps.setInt       (2, cd_rl);
            ps.setString    (3, est);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }   
}
