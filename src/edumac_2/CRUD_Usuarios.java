
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Usuarios {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
    public int agre_usu(String usua,String pas, int cod_rol, int cod_empl){       
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO usuario" +
                  "(usuario,clave,id_rol,id_empleado,est_reg) " +
                  "VALUES (?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString    (1, usua);
            ps.setString    (2, pas);
            ps.setInt       (3, cod_rol);
            ps.setInt       (4, cod_empl);           
            ps.setString    (5, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_usu(int c_usu,String usua, int cod_rol, int cod_empl){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE usuario as a SET " +
                    "a.usuario       = ? ," +
                    "a.id_rol      = ? ,   a.id_empleado     = ?   " +
                    "WHERE a.id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, usua);
            ps.setInt       (2, cod_rol);
            ps.setInt       (3, cod_empl);
            ps.setInt       (4, c_usu);
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
            sql = "UPDATE usuario SET est_reg = ? WHERE id= ?"; 
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
    public int eli_usu(int c_prt){  
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE usuario SET est_reg = ? WHERE id= ?"; 
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
