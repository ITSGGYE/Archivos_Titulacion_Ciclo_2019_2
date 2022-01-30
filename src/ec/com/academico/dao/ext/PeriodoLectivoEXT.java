/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dao.PeriodoLectivoJpaController;
import ec.com.academico.dto.PeriodoLectivo;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;

/**
 *
 * @author Usuario
 */
public class PeriodoLectivoEXT extends PeriodoLectivoJpaController {

    public PeriodoLectivoEXT(EntityManagerFactory emf) {
        super(emf);
    }

    public void guardarPeriodoInactivo() {
        try {
            EntityManager em = getEntityManager();

            String nativeQuery = " UPDATE `periodo_lectivo` SET estado = 'I'; ";
            Query query = em.createNativeQuery(nativeQuery, PeriodoLectivo.class);
//        Query query = em.createNativeQuery(nativeQuery,PeriodoLectivo.class);
//        query.executeUpdate();
            System.out.println("querY " + query);

        } catch (Exception e) {
        }
    }

//    public List<PeriodoLectivo> guardarPeriodoInactivo() {
//
//        EntityManager em = getEntityManager();
//
//        List<PeriodoLectivo> lista = null;
//
//        String nativeQuery = "UPDATE `periodo_lectivo` SET estado = 'I';";
//        Query query = em.createNativeQuery(nativeQuery, PeriodoLectivo.class);
//        lista = query.getResultList();
//        System.out.println("o -" + lista);
//        return lista;
//    }
}
