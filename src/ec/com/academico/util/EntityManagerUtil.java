/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.util;

import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

/**
 *
 * @author admin1
 */
public class EntityManagerUtil {

    public static EntityManagerFactory obtenerEntityManager() {
        EntityManagerFactory emf = null;
        emf = Persistence.createEntityManagerFactory("SistemaAcademicoPU");
        return emf;

    }

    public static boolean obtenerEntityManagerConnection() {

        EntityManagerFactory emf = obtenerEntityManager();

        return emf.isOpen();
    }
}
