/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class Fila {
    public Connection getConnection() throws ClassNotFoundException {

        Connection conn = null;
        
        String ip = "186.33.180.100";
        String port = "3306";
        String db = "db_comercial_pincay_desa";
        String pas = "pincaypincay";
        String us = "pincay";
        
//        String ip = "localhost";
//        String port = "3306";
//        String db = "db_comercial_desarrollo";
//        String pas = "";
//        String us = "root";
        try {
            Class.forName("com.mysql.jdbc.Driver");
            //conn = DriverManager.getConnection("jdbc:mysql://"+iplocal+":3306/moduloprueba", "root", "rootpassword");

            conn = DriverManager.getConnection("jdbc:mysql://"+ip+":"+port+"/"+db+"",us,pas);

            System.out.println("Conectado");

        } catch (SQLException ex) {
            System.out.println("Error de conexión: " + ex.getMessage());
        }

        return conn;
    }
       
}
