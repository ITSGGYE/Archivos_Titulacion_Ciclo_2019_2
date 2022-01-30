/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Documentos;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.RelMatriDoc;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class DocumentosJpaController implements Serializable {

    public DocumentosJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Documentos documentos) {
        if (documentos.getRelMatriDocList() == null) {
            documentos.setRelMatriDocList(new ArrayList<RelMatriDoc>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<RelMatriDoc> attachedRelMatriDocList = new ArrayList<RelMatriDoc>();
            for (RelMatriDoc relMatriDocListRelMatriDocToAttach : documentos.getRelMatriDocList()) {
                relMatriDocListRelMatriDocToAttach = em.getReference(relMatriDocListRelMatriDocToAttach.getClass(), relMatriDocListRelMatriDocToAttach.getIdRelMatriDoc());
                attachedRelMatriDocList.add(relMatriDocListRelMatriDocToAttach);
            }
            documentos.setRelMatriDocList(attachedRelMatriDocList);
            em.persist(documentos);
            for (RelMatriDoc relMatriDocListRelMatriDoc : documentos.getRelMatriDocList()) {
                Documentos oldIdDocumentoOfRelMatriDocListRelMatriDoc = relMatriDocListRelMatriDoc.getIdDocumento();
                relMatriDocListRelMatriDoc.setIdDocumento(documentos);
                relMatriDocListRelMatriDoc = em.merge(relMatriDocListRelMatriDoc);
                if (oldIdDocumentoOfRelMatriDocListRelMatriDoc != null) {
                    oldIdDocumentoOfRelMatriDocListRelMatriDoc.getRelMatriDocList().remove(relMatriDocListRelMatriDoc);
                    oldIdDocumentoOfRelMatriDocListRelMatriDoc = em.merge(oldIdDocumentoOfRelMatriDocListRelMatriDoc);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Documentos documentos) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Documentos persistentDocumentos = em.find(Documentos.class, documentos.getIdDocumentos());
            List<RelMatriDoc> relMatriDocListOld = persistentDocumentos.getRelMatriDocList();
            List<RelMatriDoc> relMatriDocListNew = documentos.getRelMatriDocList();
            List<RelMatriDoc> attachedRelMatriDocListNew = new ArrayList<RelMatriDoc>();
            for (RelMatriDoc relMatriDocListNewRelMatriDocToAttach : relMatriDocListNew) {
                relMatriDocListNewRelMatriDocToAttach = em.getReference(relMatriDocListNewRelMatriDocToAttach.getClass(), relMatriDocListNewRelMatriDocToAttach.getIdRelMatriDoc());
                attachedRelMatriDocListNew.add(relMatriDocListNewRelMatriDocToAttach);
            }
            relMatriDocListNew = attachedRelMatriDocListNew;
            documentos.setRelMatriDocList(relMatriDocListNew);
            documentos = em.merge(documentos);
            for (RelMatriDoc relMatriDocListOldRelMatriDoc : relMatriDocListOld) {
                if (!relMatriDocListNew.contains(relMatriDocListOldRelMatriDoc)) {
                    relMatriDocListOldRelMatriDoc.setIdDocumento(null);
                    relMatriDocListOldRelMatriDoc = em.merge(relMatriDocListOldRelMatriDoc);
                }
            }
            for (RelMatriDoc relMatriDocListNewRelMatriDoc : relMatriDocListNew) {
                if (!relMatriDocListOld.contains(relMatriDocListNewRelMatriDoc)) {
                    Documentos oldIdDocumentoOfRelMatriDocListNewRelMatriDoc = relMatriDocListNewRelMatriDoc.getIdDocumento();
                    relMatriDocListNewRelMatriDoc.setIdDocumento(documentos);
                    relMatriDocListNewRelMatriDoc = em.merge(relMatriDocListNewRelMatriDoc);
                    if (oldIdDocumentoOfRelMatriDocListNewRelMatriDoc != null && !oldIdDocumentoOfRelMatriDocListNewRelMatriDoc.equals(documentos)) {
                        oldIdDocumentoOfRelMatriDocListNewRelMatriDoc.getRelMatriDocList().remove(relMatriDocListNewRelMatriDoc);
                        oldIdDocumentoOfRelMatriDocListNewRelMatriDoc = em.merge(oldIdDocumentoOfRelMatriDocListNewRelMatriDoc);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = documentos.getIdDocumentos();
                if (findDocumentos(id) == null) {
                    throw new NonexistentEntityException("The documentos with id " + id + " no longer exists.");
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
            Documentos documentos;
            try {
                documentos = em.getReference(Documentos.class, id);
                documentos.getIdDocumentos();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The documentos with id " + id + " no longer exists.", enfe);
            }
            List<RelMatriDoc> relMatriDocList = documentos.getRelMatriDocList();
            for (RelMatriDoc relMatriDocListRelMatriDoc : relMatriDocList) {
                relMatriDocListRelMatriDoc.setIdDocumento(null);
                relMatriDocListRelMatriDoc = em.merge(relMatriDocListRelMatriDoc);
            }
            em.remove(documentos);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Documentos> findDocumentosEntities() {
        return findDocumentosEntities(true, -1, -1);
    }

    public List<Documentos> findDocumentosEntities(int maxResults, int firstResult) {
        return findDocumentosEntities(false, maxResults, firstResult);
    }

    private List<Documentos> findDocumentosEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Documentos.class));
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

    public Documentos findDocumentos(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Documentos.class, id);
        } finally {
            em.close();
        }
    }

    public int getDocumentosCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Documentos> rt = cq.from(Documentos.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
