
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Parentescos {
    public String est="A"   ,   sql=""      ,   sx_r=""   ;
    public int est_reg = 0;

    public static void main(String[] args) throws SQLException{
      CRUD prt = new CRUD();  
    }
    public int agre_pare(String prt){
        int est_reg = 0;        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO parentesco (parentesco,est_reg) " +
                  "VALUES (?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString(1, prt); 
            ps.setString(2, est); 
            est_reg = ps.executeUpdate();
            conn.close();            
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_pare(int c_prt,String n_prt){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE parentesco SET parentesco = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, n_prt);
            ps.setInt(2, c_prt);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    public int act_pare_eli(int c_prt){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE parentesco SET est_reg = ? WHERE id= ?"; 
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
    public int eli_pare(int c_prt){ 
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE parentesco SET " +
                    "est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, est);
            ps.setInt(2, c_prt);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
}
