/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Cursos;
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
public class CursosJpaController implements Serializable {

    public CursosJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Cursos cursos) {
        if (cursos.getRelCursoParaleloList() == null) {
            cursos.setRelCursoParaleloList(new ArrayList<RelCursoParalelo>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<RelCursoParalelo> attachedRelCursoParaleloList = new ArrayList<RelCursoParalelo>();
            for (RelCursoParalelo relCursoParaleloListRelCursoParaleloToAttach : cursos.getRelCursoParaleloList()) {
                relCursoParaleloListRelCursoParaleloToAttach = em.getReference(relCursoParaleloListRelCursoParaleloToAttach.getClass(), relCursoParaleloListRelCursoParaleloToAttach.getIdRelCursoParalelo());
                attachedRelCursoParaleloList.add(relCursoParaleloListRelCursoParaleloToAttach);
            }
            cursos.setRelCursoParaleloList(attachedRelCursoParaleloList);
            em.persist(cursos);
            for (RelCursoParalelo relCursoParaleloListRelCursoParalelo : cursos.getRelCursoParaleloList()) {
                Cursos oldIdCursoOfRelCursoParaleloListRelCursoParalelo = relCursoParaleloListRelCursoParalelo.getIdCurso();
                relCursoParaleloListRelCursoParalelo.setIdCurso(cursos);
                relCursoParaleloListRelCursoParalelo = em.merge(relCursoParaleloListRelCursoParalelo);
                if (oldIdCursoOfRelCursoParaleloListRelCursoParalelo != null) {
                    oldIdCursoOfRelCursoParaleloListRelCursoParalelo.getRelCursoParaleloList().remove(relCursoParaleloListRelCursoParalelo);
                    oldIdCursoOfRelCursoParaleloListRelCursoParalelo = em.merge(oldIdCursoOfRelCursoParaleloListRelCursoParalelo);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Cursos cursos) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Cursos persistentCursos = em.find(Cursos.class, cursos.getIdCursos());
            List<RelCursoParalelo> relCursoParaleloListOld = persistentCursos.getRelCursoParaleloList();
            List<RelCursoParalelo> relCursoParaleloListNew = cursos.getRelCursoParaleloList();
            List<RelCursoParalelo> attachedRelCursoParaleloListNew = new ArrayList<RelCursoParalelo>();
            for (RelCursoParalelo relCursoParaleloListNewRelCursoParaleloToAttach : relCursoParaleloListNew) {
                relCursoParaleloListNewRelCursoParaleloToAttach = em.getReference(relCursoParaleloListNewRelCursoParaleloToAttach.getClass(), relCursoParaleloListNewRelCursoParaleloToAttach.getIdRelCursoParalelo());
                attachedRelCursoParaleloListNew.add(relCursoParaleloListNewRelCursoParaleloToAttach);
            }
            relCursoParaleloListNew = attachedRelCursoParaleloListNew;
            cursos.setRelCursoParaleloList(relCursoParaleloListNew);
            cursos = em.merge(cursos);
            for (RelCursoParalelo relCursoParaleloListOldRelCursoParalelo : relCursoParaleloListOld) {
                if (!relCursoParaleloListNew.contains(relCursoParaleloListOldRelCursoParalelo)) {
                    relCursoParaleloListOldRelCursoParalelo.setIdCurso(null);
                    relCursoParaleloListOldRelCursoParalelo = em.merge(relCursoParaleloListOldRelCursoParalelo);
                }
            }
            for (RelCursoParalelo relCursoParaleloListNewRelCursoParalelo : relCursoParaleloListNew) {
                if (!relCursoParaleloListOld.contains(relCursoParaleloListNewRelCursoParalelo)) {
                    Cursos oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo = relCursoParaleloListNewRelCursoParalelo.getIdCurso();
                    relCursoParaleloListNewRelCursoParalelo.setIdCurso(cursos);
                    relCursoParaleloListNewRelCursoParalelo = em.merge(relCursoParaleloListNewRelCursoParalelo);
                    if (oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo != null && !oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo.equals(cursos)) {
                        oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo.getRelCursoParaleloList().remove(relCursoParaleloListNewRelCursoParalelo);
                        oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo = em.merge(oldIdCursoOfRelCursoParaleloListNewRelCursoParalelo);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = cursos.getIdCursos();
                if (findCursos(id) == null) {
                    throw new NonexistentEntityException("The cursos with id " + id + " no longer exists.");
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
            Cursos cursos;
            try {
                cursos = em.getReference(Cursos.class, id);
                cursos.getIdCursos();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The cursos with id " + id + " no longer exists.", enfe);
            }
            List<RelCursoParalelo> relCursoParaleloList = cursos.getRelCursoParaleloList();
            for (RelCursoParalelo relCursoParaleloListRelCursoParalelo : relCursoParaleloList) {
                relCursoParaleloListRelCursoParalelo.setIdCurso(null);
                relCursoParaleloListRelCursoParalelo = em.merge(relCursoParaleloListRelCursoParalelo);
            }
            em.remove(cursos);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Cursos> findCursosEntities() {
        return findCursosEntities(true, -1, -1);
    }

    public List<Cursos> findCursosEntities(int maxResults, int firstResult) {
        return findCursosEntities(false, maxResults, firstResult);
    }

    private List<Cursos> findCursosEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Cursos.class));
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

    public Cursos findCursos(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Cursos.class, id);
        } finally {
            em.close();
        }
    }

    public int getCursosCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Cursos> rt = cq.from(Cursos.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
