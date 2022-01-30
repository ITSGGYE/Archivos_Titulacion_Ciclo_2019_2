
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Familiar {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
         CRUD f = new CRUD();         
    }
     public int agre_fam(String ced,String prson, String profe,String l_trab, 
        String email,String telf){     
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO persona" +
                  "(cedula,persona,profesion,lug_trab,email,telefono,est_reg) " +
                  "VALUES (?,?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString(1, ced);
            ps.setString(2, prson);
            ps.setString(3, profe);
            ps.setString(4, l_trab);
            ps.setString(5, email);
            ps.setString(6, telf);
            ps.setString(7, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }    
    //Para agregar datos de la persona al sistema
    public int agre_relac_persona(Integer cd_alu,Integer cd_paren, 
            Integer cd_pers,String repre){     
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO rel_perso_alu" +
                  "(id_alumno,id_parentesco,id_persona,representante,est_reg) " +
                  "VALUES (?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setInt   (1, cd_alu);
            ps.setInt   (2, cd_paren);
            ps.setInt   (3, cd_pers);
            ps.setString(4, repre);
            ps.setString(5, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    } 
    public int act_relac_persona(int cod_parent,String repre,int cod_relac){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE rel_perso_alu as a SET \n" +
                    " a.id_parentesco=?,a.representante=? \n" +
                    " WHERE a.id = ? "; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setInt   (1, cod_parent);
            ps.setString(2, repre);
            ps.setInt   (3, cod_relac);          
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }  
    
    public int eli_relac_persona(int cod_relac){        
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE rel_perso_alu as a SET " +
                    " a.est_reg  = ? " +
                    " WHERE a.id = ?  "; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, std);
            ps.setInt   (2, cod_relac);           
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    } 
    
    
    
    public int act_fam(int a_c_pad,String ced,String prson,String profe,
            String l_trab,String email,String telf){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE persona as a SET " +
                    "a.cedula       = ? ,   a.persona   = ? ," +
                    "a.profesion    = ? ,   a.lug_trab  = ? ," +
                    "a.email        = ? ,   a.telefono  = ?  " +
                    "WHERE a.id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, ced);
            ps.setString(2, prson);
            ps.setString(3, profe);
            ps.setString(4, l_trab);
            ps.setString(5, email);
            ps.setString(6, telf);
            ps.setInt(7, a_c_pad);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
    
    public int eli_fam(int c_prt){  
        String std ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE persona SET est_reg = ? WHERE id= ?"; 
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
    public int recup_fam(int c_prt){  
        String std ="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE persona SET est_reg = ? WHERE id= ?"; 
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
