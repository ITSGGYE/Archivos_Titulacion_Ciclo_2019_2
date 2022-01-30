
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Paralelos {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
         CRUD parl = new CRUD();         
     }
    public int agre_paralelo(String prl){
        int est_reg = 0;        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO paralelo (paralelo,est_reg) " +
                  "VALUES (?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString(1, prl);
            ps.setString(2, est);
            est_reg = ps.executeUpdate();
            conn.close();            
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_paralelo(int c_prl,String n_prl){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE paralelo SET " +
                    "paralelo = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, n_prl);
            ps.setInt(2, c_prl);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
     public int act_para_eli(int c_prt){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE paralelo SET est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, std);   
            ps.setInt(2, c_prt);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    public int eli_paralelo(int c_prl){ 
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE paralelo SET " +
                    "est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, est);
            ps.setInt(2, c_prl);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
}
