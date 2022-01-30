
package edumac_2;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class CRUD_Matricula {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    public String cnc ="N";
    public static void main(String[] args) throws SQLException{
         CRUD a = new CRUD();         
     }
    
    public int agre_matri(String f_mat, int cant_doc_recib,
            int id_alumno,int id_periodo,int id_paralelo){       
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO matricula" +
                  "(f_mat,cant_doc_recib,id_alumno,"+
                  "id_periodo,id_paralelo,est_reg) " +
                  "VALUES (?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setString    (1, f_mat);
            ps.setInt       (2, cant_doc_recib);
            ps.setInt       (3, id_alumno);
            ps.setInt       (4, id_periodo);
            ps.setInt       (5, id_paralelo);
            ps.setString    (6, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    
    //Para agregar alumnos nuevos al sistema
    public int agre_pagos(int id_matr,int id_trans,double valor){       
        Conexion c = new Conexion();        
        ResultSet rs = null;  
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO pag_pend " +
                  "(id_matricula,id_transaccion,valor,saldo,cancelado,est_reg) " +
                  "VALUES (?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setInt       (1, id_matr);
            ps.setInt       (2, id_trans);
            ps.setDouble    (3, valor);
            ps.setDouble    (4, valor);
            ps.setString    (5, cnc); 
            ps.setString    (6, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    //Para agregar alumnos nuevos al sistema
    public int agre_todos_doc(int id_matr,int id_docs,String entr){       
        Conexion c = new Conexion();        
        ResultSet rs = null;  
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO rel_matri_doc " +
                  "(id_matricula,id_documento,entregado,est_reg) " +
                  "VALUES (?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setInt       (1, id_matr);
            ps.setInt       (2, id_docs);
            ps.setString    (3, entr);
            ps.setString    (4, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    } 
    
    public int act_mat(int cod_mat,int cod_paral){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE matricula as m SET " +
                    " m.id_paralelo   = ? " +                    
                    " WHERE m.id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setInt       (1, cod_paral);
            ps.setInt       (2, cod_mat);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;             
    }    
    
    public int act_doc(int cod_mat,int cod_paral,String entreg){        
        est="A";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE rel_matri_doc as m SET " +
                    " m.entregado   = ? " +                    
                    " WHERE m.id_matricula = ? AND " +
                    " m.id_documento = ? AND " +
                    " m.est_reg = ? "; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, entreg);
            ps.setInt       (2, cod_mat);
            ps.setInt       (3, cod_paral);
            ps.setString    (4, est);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;             
    }    
    
    
    public int eli_mat(int cod_mat){  
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE matricula SET est_reg = ? WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString(1, est);   
            ps.setInt(2, cod_mat);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }    
    public int eli_doc_mat(int cod_mat){        
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE rel_matri_doc as m SET " +
                    " m.est_reg   = ? " +                    
                    " WHERE m.id_matricula = ? ";
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, est);
            ps.setInt       (2, cod_mat);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;             
    }  
    public int eli_pag_mat(int cod_mat){  
        est="A";
        String tmpo ="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE pag_pend SET est_reg = ? " +
            " WHERE id_matricula= ? AND est_reg = ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, tmpo);   
            ps.setInt       (2, cod_mat);
            ps.setString    (3, est); 
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }   
    
}
