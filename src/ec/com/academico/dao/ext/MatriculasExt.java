/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dtoJoin.MatriculaJoin;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;

/**
 *
 * @author Usuario
 */
public class MatriculasExt {

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("SistemaAcademicoPU");
    static EntityManager em = emf.createEntityManager();

    public List<MatriculaJoin> listarMatriculaEstu(String estudiante) {

        List<MatriculaJoin> lista = null;
        String nativeQuery
                = "SELECT m.`id_matricula`,m.`id_estudiante`,es.`nombres`,es.`apellidos`,m.`id_periodo_lectivo`,pl.`periodo`,m.`fecha_registro`,m.`estado`\n"
                + ",m.`id_tipo_matricula`,m.`id_curso`,\n"
                + "rc.`id_rel_curso_paralelo`,\n"
                + "rc.`id_curso`,cur.`nombre`,\n"
                + "rc.`id_paralelo`,par.`nombre`\n"
                + "FROM `matricula` m\n"
                + "INNER JOIN `estudiantes` es ON es.`id_estudiantes`= m.`id_estudiante`\n"
                + "INNER JOIN `periodo_lectivo` pl ON pl.`id_periodo_lectivo` = m.`id_periodo_lectivo`\n"
                + "INNER JOIN `rel_curso_paralelo` rc ON rc. `id_rel_curso_paralelo` = m.`id_curso`\n"
                + "INNER JOIN `cursos` cur ON cur.`id_cursos` = rc.`id_curso`\n"
                + "INNER JOIN `paralelos` par ON par.`id_paralelos` = rc.`id_paralelo`\n"
                + "WHERE es.`apellidos` LIKE '%" + estudiante + "%';";
        Query query = em.createNativeQuery(nativeQuery);
        //query.setParameter(1, Integer.parseInt(id));
        try {

            List<Object[]> lsObj = query.getResultList();
            lista = new ArrayList<MatriculaJoin>();

            for (Object[] pos : lsObj) {
                MatriculaJoin objMatri = new MatriculaJoin();

                objMatri.setId_matricula(Long.parseLong(pos[0].toString()));
                objMatri.setId_estudiante(Long.parseLong(pos[1].toString()));
                objMatri.setNombres(pos[2].toString());
                objMatri.setApellidos(pos[3].toString());
                objMatri.setId_periodo_lectivo(Long.parseLong(pos[4].toString()));
                objMatri.setPeriodo(pos[5].toString());
                objMatri.setFecha_registro(pos[6].toString());
                char ch = pos[7].toString().charAt(0);
                objMatri.setEstado(ch);
                objMatri.setId_tipo_matricula(Long.parseLong(pos[8].toString()));
                objMatri.setId_curso(Long.parseLong(pos[9].toString()));
                objMatri.setCurso(pos[12].toString());
                objMatri.setParalelo(pos[14].toString());
                lista.add(objMatri);
            }

        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return lista;
    }

    public List<MatriculaJoin> listarMatriculaCurso() {

        List<MatriculaJoin> lista = null;
        String nativeQuery
                = "SELECT m.`id_matricula`,m.`id_estudiante`,es.`nombres`,es.`apellidos`,m.`id_periodo_lectivo`,pl.`periodo`,m.`fecha_registro`,m.`estado`\n"
                + ",m.`id_tipo_matricula`,m.`id_curso`,\n"
                + "rc.`id_rel_curso_paralelo`,\n"
                + "rc.`id_curso`,cur.`nombre`,\n"
                + "rc.`id_paralelo`,par.`nombre`\n"
                + "FROM `matricula` m\n"
                + "INNER JOIN `estudiantes` es ON es.`id_estudiantes`= m.`id_estudiante`\n"
                + "INNER JOIN `periodo_lectivo` pl ON pl.`id_periodo_lectivo` = m.`id_periodo_lectivo`\n"
                + "INNER JOIN `rel_curso_paralelo` rc ON rc. `id_rel_curso_paralelo` = m.`id_curso`\n"
                + "INNER JOIN `cursos` cur ON cur.`id_cursos` = rc.`id_curso`\n"
                + "INNER JOIN `paralelos` par ON par.`id_paralelos` = rc.`id_paralelo`;";
        Query query = em.createNativeQuery(nativeQuery);
        //query.setParameter(1, Integer.parseInt(id));
        try {

            List<Object[]> lsObj = query.getResultList();
            lista = new ArrayList<MatriculaJoin>();

            for (Object[] pos : lsObj) {
                MatriculaJoin objMatri = new MatriculaJoin();

                objMatri.setId_matricula(Long.parseLong(pos[0].toString()));
                objMatri.setId_estudiante(Long.parseLong(pos[1].toString()));
                objMatri.setNombres(pos[2].toString());
                objMatri.setApellidos(pos[3].toString());
                objMatri.setId_periodo_lectivo(Long.parseLong(pos[4].toString()));
                objMatri.setPeriodo(pos[5].toString());
                objMatri.setFecha_registro(pos[6].toString());
                char ch = pos[7].toString().charAt(0);
                objMatri.setEstado(ch);
                objMatri.setId_tipo_matricula(Long.parseLong(pos[8].toString()));
                objMatri.setId_curso(Long.parseLong(pos[9].toString()));
                objMatri.setCurso(pos[12].toString());
                objMatri.setParalelo(pos[14].toString());
                lista.add(objMatri);
            }

        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return lista;
    }    public List<MatriculaJoin> listarMatriculaPeriodoLectivoCurso(String periodo,Long id) {

        List<MatriculaJoin> lista = null;
        String nativeQuery
                = "SELECT m.`id_matricula`,m.`id_estudiante`,es.`nombres`,es.`apellidos`,m.`id_periodo_lectivo`,pl.`periodo`,m.`fecha_registro`,m.`estado`\n" +
"                ,m.`id_tipo_matricula`,m.`id_curso`,\n" +
"                rc.`id_rel_curso_paralelo`,\n" +
"                rc.`id_curso`,cur.`nombre`,\n" +
"                rc.`id_paralelo`,par.`nombre`\n" +
"                FROM `matricula` m\n" +
"                INNER JOIN `estudiantes` es ON es.`id_estudiantes`= m.`id_estudiante`\n" +
"                INNER JOIN `periodo_lectivo` pl ON pl.`id_periodo_lectivo` = m.`id_periodo_lectivo`\n" +
"                INNER JOIN `rel_curso_paralelo` rc ON rc. `id_rel_curso_paralelo` = m.`id_curso`\n" +
"                INNER JOIN `cursos` cur ON cur.`id_cursos` = rc.`id_curso`\n" +
"                INNER JOIN `paralelos` par ON par.`id_paralelos` = rc.`id_paralelo`\n" +
"                WHERE pl.`periodo`='"+periodo+"' AND rc.`id_rel_curso_paralelo` = "+id+";";
        Query query = em.createNativeQuery(nativeQuery);
        //query.setParameter(1, Integer.parseInt(id));
        try {

            List<Object[]> lsObj = query.getResultList();
            lista = new ArrayList<MatriculaJoin>();

            for (Object[] pos : lsObj) {
                MatriculaJoin objMatri = new MatriculaJoin();

                objMatri.setId_matricula(Long.parseLong(pos[0].toString()));
                objMatri.setId_estudiante(Long.parseLong(pos[1].toString()));
                objMatri.setNombres(pos[2].toString());
                objMatri.setApellidos(pos[3].toString());
                objMatri.setId_periodo_lectivo(Long.parseLong(pos[4].toString()));
                objMatri.setPeriodo(pos[5].toString());
                objMatri.setFecha_registro(pos[6].toString());
                char ch = pos[7].toString().charAt(0);
                objMatri.setEstado(ch);
                objMatri.setId_tipo_matricula(Long.parseLong(pos[8].toString()));
                objMatri.setId_curso(Long.parseLong(pos[9].toString()));
                objMatri.setCurso(pos[12].toString());
                objMatri.setParalelo(pos[14].toString());
                lista.add(objMatri);
            }

        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return lista;
    }
}
