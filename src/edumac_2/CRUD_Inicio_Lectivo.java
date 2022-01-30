
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Inicio_Lectivo {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
//Para agregar alumnos nuevos al sistema
    public int agre_ini_lec(Double v_matri,Double v_mensu,int cod_period, 
            int m_ini,int c_mes,int m_fin){     
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO inicio_lectivo" +
                  "(val_matri,val_mensu,id_periodo,mes_ini,cant_mes,mes_fin,est_reg) " +
                  "VALUES (?,?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setDouble(1, v_matri);
            ps.setDouble(2, v_mensu);
            ps.setInt   (3, cod_period);
            ps.setInt   (4, m_ini);
            ps.setInt   (5, c_mes);
            ps.setInt   (6, m_fin);
            ps.setString(7, est);
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    public int act_ini_lec(Double v_matr,Double v_mens,
            int cod_perio,int m_in,int c_ms,int m_fn,int cod_ini_lec){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE inicio_lectivo as a SET " +
                    "a.val_matri        = ?     ,   a.val_mensu     = ?     ," +
                    "a.id_periodo       = ?     ,   a.mes_ini       = ?     ," +
                    "a.cant_mes         = ?     ,   a.mes_fin       = ?      " +
                    " WHERE a.id = ? "; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setDouble    (1, v_matr);
            ps.setDouble    (2, v_mens);
            ps.setInt       (3, cod_perio);
            ps.setInt       (4, m_in);
            ps.setInt       (5, c_ms);
            ps.setInt       (6, m_fn);
            ps.setInt       (7, cod_ini_lec);
            est_reg = ps.executeUpdate();            
            conn.close();                
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }
    public int eli_ini_lec(int c_sel){  
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE inicio_lectivo SET est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, std);   
            ps.setInt       (2, c_sel);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
}
