
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Periodos {
    public String est="A"   ,   sql=""      ,   sx_r=""   ;
    public int est_reg = 0;

    public static void main(String[] args) throws SQLException{
      CRUD prt = new CRUD();  
    }
    public int agre_period(String prdo){
        int est_reg = 0;        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO periodo (periodo,est_reg) " +
                  "VALUES (?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString(1, prdo); 
            ps.setString(2, est); 
            est_reg = ps.executeUpdate();
            conn.close();            
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_period(int c_prdo,String n_prdo){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE periodo SET periodo = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, n_prdo);
            ps.setInt(2, c_prdo);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    public int act_period_eli(int c_prdo){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE periodo SET est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, std);   
            ps.setInt(2, c_prdo);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    public int eli_period(int c_prdo){ 
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE periodo SET " +
                    "est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, est);
            ps.setInt(2, c_prdo);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
}
