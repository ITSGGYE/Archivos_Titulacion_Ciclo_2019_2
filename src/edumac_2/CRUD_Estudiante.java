
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Estudiante {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
//Para agregar alumnos nuevos al sistema
    public int agre_alumno(String ced,String ape, String nom,String dir, 
            String sxo, String f_nac,String l_nac,
            String viv_pm,String observaciones, int naciona){       
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO alumno" +
                  "(cedula,apellidos,nombres,direccion,sexo,fecha_nac,"+
                  "lug_nac,vive_padres,observaciones,nacionalidad,est_reg) " +
                  "VALUES (?,?,?,?,?,?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString    (1, ced);
            ps.setString    (2, ape);
            ps.setString    (3, nom);
            ps.setString    (4, dir);
            ps.setString    (5, sxo);
            ps.setString    (6, f_nac);
            ps.setString    (7, l_nac);
            ps.setString    (8, viv_pm);
            ps.setString    (9, observaciones);
            ps.setInt       (10, naciona);  
            ps.setString(11, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_alum(int a_c_mod,String a_ced, String a_ape,
        String a_nom,String a_dir,String a_sxo,String a_f_nac,
        String a_l_nac,String a_v_c_p, String a_obser,
        int a_naciona){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE alumno as a SET " +
                    "a.cedula       = ? ,   a.apellidos     = ?     ," +
                    "a.nombres      = ? ,   a.direccion     = ?     ," +
                    "a.sexo         = ? ,   a.fecha_nac     = ?     ," +
                    "a.lug_nac      = ? ,   a.vive_padres   = ?     ," +
                    "a.observaciones= ? ,   a.nacionalidad  = ?     " +                    
                    " WHERE a.id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, a_ced);
            ps.setString    (2, a_ape);
            ps.setString    (3, a_nom);
            ps.setString    (4, a_dir);
            ps.setString    (5, a_sxo);
            ps.setString    (6, a_f_nac);
            ps.setString    (7, a_l_nac);
            ps.setString    (8, a_v_c_p);
            ps.setString    (9, a_obser);
            ps.setInt       (10, a_naciona);
            ps.setInt       (11, a_c_mod);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
    public int act_alu_eli(int c_prt){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE alumno SET est_reg = ? WHERE id= ?"; 
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
    public int eli_alu(int c_prt){  
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE alumno SET est_reg = ? WHERE id= ?"; 
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
