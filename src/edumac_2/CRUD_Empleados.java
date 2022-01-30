
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Empleados {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
    public int agre_emp(String ced,String empl, String dir, String tlfn){       
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO empleado" +
                  "(cedula,empleado,direccion,telefono,est_reg) " +
                  "VALUES (?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString(1, ced);
            ps.setString(2, empl);
            ps.setString(3, dir);
            ps.setString(4, tlfn);           
            ps.setString(5, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_emp(int a_c_emp,String ced,String empl, String dir, String tlfn){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE empleado as a SET " +
                    "a.cedula       = ? ,   a.empleado    = ?     ," +
                    "a.direccion      = ? ,   a.telefono     = ?   " +
                    "WHERE a.id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, ced);
            ps.setString    (2, empl);
            ps.setString    (3, dir);
            ps.setString    (4, tlfn);
            ps.setInt       (5, a_c_emp);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
    public int act_emp_eli(int c_prt){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE empleado SET est_reg = ? WHERE id= ?"; 
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
    public int eli_emp(int c_prt){  
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE empleado SET est_reg = ? WHERE id= ?"; 
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
}
