
package edumac_2;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class CRUD {
    public static void main(String[] args) throws SQLException{
        CRUD c = new CRUD();
    } 
    public ResultSet select(String query){        
        Conexion c = new Conexion();        
        ResultSet rs = null;       
        try{            
            Connection conn = null;            
            conn = c.conectar();
            Statement st = conn.createStatement();            
            rs = st.executeQuery(query);
        }catch(Exception e){
            System.out.println("Error: " + e.getMessage());
        }        
        return rs;
    }
}
