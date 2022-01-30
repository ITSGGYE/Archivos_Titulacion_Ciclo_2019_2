/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dtoJoin.DocumentosMatriculaJoin;
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
public class DocumentosMariculaEXT {

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("SistemaAcademicoPU");
    static EntityManager em = emf.createEntityManager();

    public List<DocumentosMatriculaJoin> listarDocumentosMatriculaJoin(Long id) {

        List<DocumentosMatriculaJoin> lista = null;
        String nativeQuery
                = "SELECT rdoc.`id_rel_matri_doc`,rdoc.`estado`,rdoc.`fecha_creacion`,rdoc.`id_matricula`,rdoc.`id_documento`\n"
                + ",doc.`documento`\n"
                + "FROM `rel_matri_doc` rdoc\n"
                + "INNER JOIN `documentos` doc ON doc.`id_documentos` = rdoc.`id_documento`\n"
                + "WHERE rdoc.`id_matricula` =" + id + ";";
        Query query = em.createNativeQuery(nativeQuery);
        //query.setParameter(1, Integer.parseInt(id));
        try {

            List<Object[]> lsObj = query.getResultList();
            lista = new ArrayList<DocumentosMatriculaJoin>();

            for (Object[] pos : lsObj) {
//                DocumentosMatriculaJoin objDocMatri = new DocumentosMatriculaJoin();
                DocumentosMatriculaJoin objDocMatri = new DocumentosMatriculaJoin();
                objDocMatri.setId_rel_matri_doc(Long.parseLong(pos[0].toString()));
                objDocMatri.setId_documento(Long.parseLong(pos[4].toString()));
                objDocMatri.setDocumento(pos[5].toString());
                char ch = pos[1].toString().charAt(0);
                objDocMatri.setEstado(ch);
                lista.add(objDocMatri);
            }

        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return lista;
    }

    public void actualizarDocumentos(Long idRel, char estado) {
        try {
//            EntityManager em = getEntityManager();

            String nativeQuery = " UPDATE `rel_matri_doc` SET estado = '" + estado + "' \n"
                    + "WHERE `id_rel_matri_doc`=" + idRel + "; ";
            Query query = em.createNativeQuery(nativeQuery);
//        Query query = em.createNativeQuery(nativeQuery,PeriodoLectivo.class);
//        query.executeUpdate();
            System.out.println("querY " + query);

        } catch (Exception e) {
        }
    }

}
