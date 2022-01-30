/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dao.EstudiantesJpaController;
import ec.com.academico.dto.Estudiantes;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Query;

/**
 *
 * @author Usuario
 */
public class EstudiantesEXT extends EstudiantesJpaController {

    public EstudiantesEXT(EntityManagerFactory emf) {
        super(emf);
    }

    public List<Estudiantes> estudiantesNoMatriculadosPorPeriodo() {

        EntityManager em = getEntityManager();

        List<Estudiantes> lista = null;

        String nativeQuery = "SELECT e.`id_estudiantes`,e.`identificacion`,e.`nombres`,e.`apellidos`,e.`fecha_nacimiento`,e.`sexo`,\n"
                + "e.`discapacidad`,e.`id_representante`,e.`id_tipo_identificacion`,e.`id_parentesco`,e.`estado`\n"
                + "FROM `estudiantes` e \n"
                + "WHERE e.`id_estudiantes` NOT IN (\n"
                + "SELECT m.`id_estudiante`\n"
                + "FROM `matricula` m \n"
                + "JOIN `periodo_lectivo` p ON p.`id_periodo_lectivo`= m.`id_periodo_lectivo`\n"
                + "WHERE p.`estado`='A');";
        Query query = em.createNativeQuery(nativeQuery, Estudiantes.class);
        lista = query.getResultList();

        return lista;
    }

}
