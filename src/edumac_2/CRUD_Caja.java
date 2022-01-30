
package edumac_2;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;


public class CRUD_Caja {
    public String est="A";
    public int est_reg = 0;
    public String sql="";
    
    public static void main(String[] args) throws SQLException{
        CRUD a = new CRUD();         
     
    }
//Para agregar alumnos nuevos al sistema
    public int agre_pago(int id_mat,int id_tran, int id_f_pago, 
            double pago, int doc_ent, String num_doc, String fecha){       
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "INSERT INTO caja" +
                  "(id_matricula,id_transaccion,id_forma_pago,val_pagado,"+
                  "id_doc_entreg,n_doc_entreg,fecha,est_reg) " +
                  "VALUES (?,?,?,?,?,?,?,?);";
            PreparedStatement ps = conn.prepareStatement(sql);            
            ps.setInt       (1, id_mat);
            ps.setInt       (2, id_tran);
            ps.setInt       (3, id_f_pago);
            ps.setDouble    (4, pago);
            ps.setInt       (5, doc_ent);
            ps.setString    (6, num_doc);
            ps.setString    (7, fecha);
            ps.setString    (8, est); 
            est_reg = ps.executeUpdate();
            conn.close(); 
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }      
        return est_reg;
    }
    
    public int agre_pag_pnd_act(int cod_pago,int id_mat,int id_tran,
            double saldo,String ccld){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE pag_pend  SET " +
                    "id_matricula   = ? ,   id_transaccion  = ?     ," +
                    "saldo           = ?     ," +
                    "cancelado      = ?      " +                    
                    " WHERE id= ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setInt       (1, id_mat);
            ps.setInt       (2, id_tran);
            ps.setDouble    (3, saldo);
            ps.setString    (4, ccld);
            ps.setInt       (5, cod_pago);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    } 
    
    public int reversar_pag(int cod_pago){        
        est="D";
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = "UPDATE caja  SET est_reg = ? WHERE id = ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setString    (1, est);
            ps.setInt       (2, cod_pago);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    } 
    
    public int reversar_pag_pnd(int cod_pag_pen, double sld , String cancel){        
        Conexion c = new Conexion();        
        ResultSet rs = null;        
        try{            
            Connection conn = null;            
            conn = c.conectar();
            sql = " UPDATE pag_pend SET \n" +
                  " saldo = ? , cancelado = ? \n"+
                  " WHERE id = ?"; 
            PreparedStatement ps = conn.prepareStatement(sql);           
            ps.setDouble    (1, sld);
            ps.setString    (2, cancel);
            ps.setInt       (3, cod_pag_pen);
            est_reg = ps.executeUpdate();            
            conn.close();           
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }       
        return est_reg;
    }   
}
