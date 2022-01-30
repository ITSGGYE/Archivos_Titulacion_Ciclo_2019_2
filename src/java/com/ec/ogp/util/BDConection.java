  package com.ec.ogp.util;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class BDConection {

    public static Connection conectar() throws ClassNotFoundException {
        Connection conn = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/escuela_vol_dos", "root", "root");
            

            System.out.println("Conectado");

        } catch (SQLException ex) {
            System.out.println("Error de conexión: " + ex.getMessage());
        }

        return conn;
    }
}
