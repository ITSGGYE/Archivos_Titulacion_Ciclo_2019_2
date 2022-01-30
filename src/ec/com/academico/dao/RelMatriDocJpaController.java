/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.RelMatriDoc;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RelMatriDocJpaController implements Serializable {

    public RelMatriDocJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(RelMatriDoc relMatriDoc) {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Documentos idDocumento = relMatriDoc.getIdDocumento();
            if (idDocumento != null) {
                idDocumento = em.getReference(idDocumento.getClass(), idDocumento.getIdDocumentos());
                relMatriDoc.setIdDocumento(idDocumento);
            }
            Matricula idMatricula = relMatriDoc.getIdMatricula();
            if (idMatricula != null) {
                idMatricula = em.getReference(idMatricula.getClass(), idMatricula.getIdMatricula());
                relMatriDoc.setIdMatricula(idMatricula);
            }
            em.persist(relMatriDoc);
            if (idDocumento != null) {
                idDocumento.getRelMatriDocList().add(relMatriDoc);
                idDocumento = em.merge(idDocumento);
            }
            if (idMatricula != null) {
                idMatricula.getRelMatriDocList().add(relMatriDoc);
                idMatricula = em.merge(idMatricula);
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(RelMatriDoc relMatriDoc) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            RelMatriDoc persistentRelMatriDoc = em.find(RelMatriDoc.class, relMatriDoc.getIdRelMatriDoc());
            Documentos idDocumentoOld = persistentRelMatriDoc.getIdDocumento();
            Documentos idDocumentoNew = relMatriDoc.getIdDocumento();
            Matricula idMatriculaOld = persistentRelMatriDoc.getIdMatricula();
            Matricula idMatriculaNew = relMatriDoc.getIdMatricula();
            if (idDocumentoNew != null) {
                idDocumentoNew = em.getReference(idDocumentoNew.getClass(), idDocumentoNew.getIdDocumentos());
                relMatriDoc.setIdDocumento(idDocumentoNew);
            }
            if (idMatriculaNew != null) {
                idMatriculaNew = em.getReference(idMatriculaNew.getClass(), idMatriculaNew.getIdMatricula());
                relMatriDoc.setIdMatricula(idMatriculaNew);
            }
            relMatriDoc = em.merge(relMatriDoc);
            if (idDocumentoOld != null && !idDocumentoOld.equals(idDocumentoNew)) {
                idDocumentoOld.getRelMatriDocList().remove(relMatriDoc);
                idDocumentoOld = em.merge(idDocumentoOld);
            }
            if (idDocumentoNew != null && !idDocumentoNew.equals(idDocumentoOld)) {
                idDocumentoNew.getRelMatriDocList().add(relMatriDoc);
                idDocumentoNew = em.merge(idDocumentoNew);
            }
            if (idMatriculaOld != null && !idMatriculaOld.equals(idMatriculaNew)) {
                idMatriculaOld.getRelMatriDocList().remove(relMatriDoc);
                idMatriculaOld = em.merge(idMatriculaOld);
            }
            if (idMatriculaNew != null && !idMatriculaNew.equals(idMatriculaOld)) {
                idMatriculaNew.getRelMatriDocList().add(relMatriDoc);
                idMatriculaNew = em.merge(idMatriculaNew);
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = relMatriDoc.getIdRelMatriDoc();
                if (findRelMatriDoc(id) == null) {
                    throw new NonexistentEntityException("The relMatriDoc with id " + id + " no longer exists.");
                }
            }
            throw ex;
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void destroy(Long id) throws NonexistentEntityException {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            RelMatriDoc relMatriDoc;
            try {
                relMatriDoc = em.getReference(RelMatriDoc.class, id);
                relMatriDoc.getIdRelMatriDoc();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The relMatriDoc with id " + id + " no longer exists.", enfe);
            }
            Documentos idDocumento = relMatriDoc.getIdDocumento();
            if (idDocumento != null) {
                idDocumento.getRelMatriDocList().remove(relMatriDoc);
                idDocumento = em.merge(idDocumento);
            }
            Matricula idMatricula = relMatriDoc.getIdMatricula();
            if (idMatricula != null) {
                idMatricula.getRelMatriDocList().remove(relMatriDoc);
                idMatricula = em.merge(idMatricula);
            }
            em.remove(relMatriDoc);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<RelMatriDoc> findRelMatriDocEntities() {
        return findRelMatriDocEntities(true, -1, -1);
    }

    public List<RelMatriDoc> findRelMatriDocEntities(int maxResults, int firstResult) {
        return findRelMatriDocEntities(false, maxResults, firstResult);
    }

    private List<RelMatriDoc> findRelMatriDocEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(RelMatriDoc.class));
            Query q = em.createQuery(cq);
            if (!all) {
                q.setMaxResults(maxResults);
                q.setFirstResult(firstResult);
            }
            return q.getResultList();
        } finally {
            em.close();
        }
    }

    public RelMatriDoc findRelMatriDoc(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(RelMatriDoc.class, id);
        } finally {
            em.close();
        }
    }

    public int getRelMatriDocCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<RelMatriDoc> rt = cq.from(RelMatriDoc.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
