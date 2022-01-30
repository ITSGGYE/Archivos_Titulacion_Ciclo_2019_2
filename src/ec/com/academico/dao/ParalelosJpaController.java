/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Paralelos;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.RelCursoParalelo;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class ParalelosJpaController implements Serializable {

    public ParalelosJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Paralelos paralelos) {
        if (paralelos.getRelCursoParaleloList() == null) {
            paralelos.setRelCursoParaleloList(new ArrayList<RelCursoParalelo>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<RelCursoParalelo> attachedRelCursoParaleloList = new ArrayList<RelCursoParalelo>();
            for (RelCursoParalelo relCursoParaleloListRelCursoParaleloToAttach : paralelos.getRelCursoParaleloList()) {
                relCursoParaleloListRelCursoParaleloToAttach = em.getReference(relCursoParaleloListRelCursoParaleloToAttach.getClass(), relCursoParaleloListRelCursoParaleloToAttach.getIdRelCursoParalelo());
                attachedRelCursoParaleloList.add(relCursoParaleloListRelCursoParaleloToAttach);
            }
            paralelos.setRelCursoParaleloList(attachedRelCursoParaleloList);
            em.persist(paralelos);
            for (RelCursoParalelo relCursoParaleloListRelCursoParalelo : paralelos.getRelCursoParaleloList()) {
                Paralelos oldIdParaleloOfRelCursoParaleloListRelCursoParalelo = relCursoParaleloListRelCursoParalelo.getIdParalelo();
                relCursoParaleloListRelCursoParalelo.setIdParalelo(paralelos);
                relCursoParaleloListRelCursoParalelo = em.merge(relCursoParaleloListRelCursoParalelo);
                if (oldIdParaleloOfRelCursoParaleloListRelCursoParalelo != null) {
                    oldIdParaleloOfRelCursoParaleloListRelCursoParalelo.getRelCursoParaleloList().remove(relCursoParaleloListRelCursoParalelo);
                    oldIdParaleloOfRelCursoParaleloListRelCursoParalelo = em.merge(oldIdParaleloOfRelCursoParaleloListRelCursoParalelo);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Paralelos paralelos) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Paralelos persistentParalelos = em.find(Paralelos.class, paralelos.getIdParalelos());
            List<RelCursoParalelo> relCursoParaleloListOld = persistentParalelos.getRelCursoParaleloList();
            List<RelCursoParalelo> relCursoParaleloListNew = paralelos.getRelCursoParaleloList();
            List<RelCursoParalelo> attachedRelCursoParaleloListNew = new ArrayList<RelCursoParalelo>();
            for (RelCursoParalelo relCursoParaleloListNewRelCursoParaleloToAttach : relCursoParaleloListNew) {
                relCursoParaleloListNewRelCursoParaleloToAttach = em.getReference(relCursoParaleloListNewRelCursoParaleloToAttach.getClass(), relCursoParaleloListNewRelCursoParaleloToAttach.getIdRelCursoParalelo());
                attachedRelCursoParaleloListNew.add(relCursoParaleloListNewRelCursoParaleloToAttach);
            }
            relCursoParaleloListNew = attachedRelCursoParaleloListNew;
            paralelos.setRelCursoParaleloList(relCursoParaleloListNew);
            paralelos = em.merge(paralelos);
            for (RelCursoParalelo relCursoParaleloListOldRelCursoParalelo : relCursoParaleloListOld) {
                if (!relCursoParaleloListNew.contains(relCursoParaleloListOldRelCursoParalelo)) {
                    relCursoParaleloListOldRelCursoParalelo.setIdParalelo(null);
                    relCursoParaleloListOldRelCursoParalelo = em.merge(relCursoParaleloListOldRelCursoParalelo);
                }
            }
            for (RelCursoParalelo relCursoParaleloListNewRelCursoParalelo : relCursoParaleloListNew) {
                if (!relCursoParaleloListOld.contains(relCursoParaleloListNewRelCursoParalelo)) {
                    Paralelos oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo = relCursoParaleloListNewRelCursoParalelo.getIdParalelo();
                    relCursoParaleloListNewRelCursoParalelo.setIdParalelo(paralelos);
                    relCursoParaleloListNewRelCursoParalelo = em.merge(relCursoParaleloListNewRelCursoParalelo);
                    if (oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo != null && !oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo.equals(paralelos)) {
                        oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo.getRelCursoParaleloList().remove(relCursoParaleloListNewRelCursoParalelo);
                        oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo = em.merge(oldIdParaleloOfRelCursoParaleloListNewRelCursoParalelo);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = paralelos.getIdParalelos();
                if (findParalelos(id) == null) {
                    throw new NonexistentEntityException("The paralelos with id " + id + " no longer exists.");
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
            Paralelos paralelos;
            try {
                paralelos = em.getReference(Paralelos.class, id);
                paralelos.getIdParalelos();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The paralelos with id " + id + " no longer exists.", enfe);
            }
            List<RelCursoParalelo> relCursoParaleloList = paralelos.getRelCursoParaleloList();
            for (RelCursoParalelo relCursoParaleloListRelCursoParalelo : relCursoParaleloList) {
                relCursoParaleloListRelCursoParalelo.setIdParalelo(null);
                relCursoParaleloListRelCursoParalelo = em.merge(relCursoParaleloListRelCursoParalelo);
            }
            em.remove(paralelos);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Paralelos> findParalelosEntities() {
        return findParalelosEntities(true, -1, -1);
    }

    public List<Paralelos> findParalelosEntities(int maxResults, int firstResult) {
        return findParalelosEntities(false, maxResults, firstResult);
    }

    private List<Paralelos> findParalelosEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Paralelos.class));
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

    public Paralelos findParalelos(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Paralelos.class, id);
        } finally {
            em.close();
        }
    }

    public int getParalelosCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Paralelos> rt = cq.from(Paralelos.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
