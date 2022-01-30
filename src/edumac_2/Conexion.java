
package edumac_2;
import java.sql.Connection;
import java.sql.DriverManager;

public class Conexion {
    private final String url = "jdbc:mysql://localhost:3306/Edumac_2";
    private final String user= "root";
    private final String pass = "";
    private Connection conn = null; 
    
    public Connection conectar(){     
        try {            
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(url,user,pass);
            System.out.println("Conectado");                                  
        } catch (Exception ex) {
            System.out.println("Error de conexion: " + ex.getMessage());
        }
        return conn;
    }  
}
