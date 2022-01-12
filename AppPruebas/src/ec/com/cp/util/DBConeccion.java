/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.util;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class DBConeccion {
    
    private String iplocal = "183.33.180.100";

    private String clave = "pincaypincay";
    private String port = "3306";
    private String user = "pincay";
    private String BD = "db_comercial_pincay_desa";
    public static Connection conn = null;
 
    public Connection getConnection() throws ClassNotFoundException {

        try {
            Class.forName("com.mysql.jdbc.Driver");

//            conn = DriverManager.getConnection("jdbc:mysql://" + iplocal + ":" + port + "/" + BD + "", user, clave);
//          
            conn = DriverManager.getConnection("jdbc:mysql://183.33.180.100:3306/db_comercial_pincay_desa", "pincay", "pincaypincay");
            System.out.println("Conectado");

        } catch (Exception ex) {
            //System.out.println("jdbc:mysql://" + iplocal + ":" + port + "/" + BD + "" + "," + user + "," + clave);
            ex.printStackTrace();
            //System.out.println("Error de conexión: " + ex.printStackTrace());
        }

        return conn;
    }

    public static void main(String[] args) {
        DBConeccion conectarBD = new DBConeccion();
        try {
            conectarBD.getConnection();
            if(conn != null){ 
                System.out.println("se conecto ");
            }else{
                System.out.println("no se conecto ");
            }
            //System.out.println(conectarBD.getConnection());
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DBConeccion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    /*
     public Connection getConnection() throws ClassNotFoundException {
        public static void main(String [] args) throws Exception {
        // Class.forName( "com.mysql.jdbc.Driver" ); // do this in init
        // // edit the jdbc url 
        Connection conn = DriverManager.getConnection( 
            "jdbc:mysql://localhost:3306/projects?user=user1&password=123");
        // Statement st = conn.createStatement();
        // ResultSet rs = st.executeQuery( "select * from table" );

        System.out.println("Connected?");
    }   
       
    }*/
}
