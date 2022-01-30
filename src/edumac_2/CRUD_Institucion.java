
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class CRUD_Institucion {
    public int est_reg = 0;
    public String sql="";
    public int cod = 1 ;
    public String est="A";
    
    Conexion c = new Conexion();        
    ResultSet rs = null;  
    Connection conn = null; 
    
    public int mod_inst(String nombre,String ruc,String amie,String direccion,String telefono,String rector,String secretario){              
        
        try{    
            
            conn = c.conectar();
            sql = "UPDATE inf_institucion as a SET " +
                    "a.nombre       = ? ,   a.ruc       = ?     ," +
                    "a.amie         = ? ,   a.direccion = ?     ," +
                    "a.telefono    = ? ,   a.rector   = ?     ," +
                    "a.secretario   = ?    " +
                    "WHERE a.est_reg = ? AND a.id = ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, nombre);
            ps.setString(2, ruc);
            ps.setString(3, amie);
            ps.setString(4, direccion);
            ps.setString(5, telefono);
            ps.setString(6, rector);
            ps.setString(7, secretario);
            ps.setString(8, est);
            ps.setInt   (9, cod);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
}
