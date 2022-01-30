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
import ec.com.academico.dto.CursoProfesor;
import ec.com.academico.dto.Docente;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class DocenteJpaController implements Serializable {

    public DocenteJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Docente docente) {
        if (docente.getCursoProfesorList() == null) {
            docente.setCursoProfesorList(new ArrayList<CursoProfesor>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<CursoProfesor> attachedCursoProfesorList = new ArrayList<CursoProfesor>();
            for (CursoProfesor cursoProfesorListCursoProfesorToAttach : docente.getCursoProfesorList()) {
                cursoProfesorListCursoProfesorToAttach = em.getReference(cursoProfesorListCursoProfesorToAttach.getClass(), cursoProfesorListCursoProfesorToAttach.getIdCursoProfesor());
                attachedCursoProfesorList.add(cursoProfesorListCursoProfesorToAttach);
            }
            docente.setCursoProfesorList(attachedCursoProfesorList);
            em.persist(docente);
            for (CursoProfesor cursoProfesorListCursoProfesor : docente.getCursoProfesorList()) {
                Docente oldIdDocenteOfCursoProfesorListCursoProfesor = cursoProfesorListCursoProfesor.getIdDocente();
                cursoProfesorListCursoProfesor.setIdDocente(docente);
                cursoProfesorListCursoProfesor = em.merge(cursoProfesorListCursoProfesor);
                if (oldIdDocenteOfCursoProfesorListCursoProfesor != null) {
                    oldIdDocenteOfCursoProfesorListCursoProfesor.getCursoProfesorList().remove(cursoProfesorListCursoProfesor);
                    oldIdDocenteOfCursoProfesorListCursoProfesor = em.merge(oldIdDocenteOfCursoProfesorListCursoProfesor);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Docente docente) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Docente persistentDocente = em.find(Docente.class, docente.getIdDocente());
            List<CursoProfesor> cursoProfesorListOld = persistentDocente.getCursoProfesorList();
            List<CursoProfesor> cursoProfesorListNew = docente.getCursoProfesorList();
            List<CursoProfesor> attachedCursoProfesorListNew = new ArrayList<CursoProfesor>();
            for (CursoProfesor cursoProfesorListNewCursoProfesorToAttach : cursoProfesorListNew) {
                cursoProfesorListNewCursoProfesorToAttach = em.getReference(cursoProfesorListNewCursoProfesorToAttach.getClass(), cursoProfesorListNewCursoProfesorToAttach.getIdCursoProfesor());
                attachedCursoProfesorListNew.add(cursoProfesorListNewCursoProfesorToAttach);
            }
            cursoProfesorListNew = attachedCursoProfesorListNew;
            docente.setCursoProfesorList(cursoProfesorListNew);
            docente = em.merge(docente);
            for (CursoProfesor cursoProfesorListOldCursoProfesor : cursoProfesorListOld) {
                if (!cursoProfesorListNew.contains(cursoProfesorListOldCursoProfesor)) {
                    cursoProfesorListOldCursoProfesor.setIdDocente(null);
                    cursoProfesorListOldCursoProfesor = em.merge(cursoProfesorListOldCursoProfesor);
                }
            }
            for (CursoProfesor cursoProfesorListNewCursoProfesor : cursoProfesorListNew) {
                if (!cursoProfesorListOld.contains(cursoProfesorListNewCursoProfesor)) {
                    Docente oldIdDocenteOfCursoProfesorListNewCursoProfesor = cursoProfesorListNewCursoProfesor.getIdDocente();
                    cursoProfesorListNewCursoProfesor.setIdDocente(docente);
                    cursoProfesorListNewCursoProfesor = em.merge(cursoProfesorListNewCursoProfesor);
                    if (oldIdDocenteOfCursoProfesorListNewCursoProfesor != null && !oldIdDocenteOfCursoProfesorListNewCursoProfesor.equals(docente)) {
                        oldIdDocenteOfCursoProfesorListNewCursoProfesor.getCursoProfesorList().remove(cursoProfesorListNewCursoProfesor);
                        oldIdDocenteOfCursoProfesorListNewCursoProfesor = em.merge(oldIdDocenteOfCursoProfesorListNewCursoProfesor);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = docente.getIdDocente();
                if (findDocente(id) == null) {
                    throw new NonexistentEntityException("The docente with id " + id + " no longer exists.");
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
            Docente docente;
            try {
                docente = em.getReference(Docente.class, id);
                docente.getIdDocente();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The docente with id " + id + " no longer exists.", enfe);
            }
            List<CursoProfesor> cursoProfesorList = docente.getCursoProfesorList();
            for (CursoProfesor cursoProfesorListCursoProfesor : cursoProfesorList) {
                cursoProfesorListCursoProfesor.setIdDocente(null);
                cursoProfesorListCursoProfesor = em.merge(cursoProfesorListCursoProfesor);
            }
            em.remove(docente);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Docente> findDocenteEntities() {
        return findDocenteEntities(true, -1, -1);
    }

    public List<Docente> findDocenteEntities(int maxResults, int firstResult) {
        return findDocenteEntities(false, maxResults, firstResult);
    }

    private List<Docente> findDocenteEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Docente.class));
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

    public Docente findDocente(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Docente.class, id);
        } finally {
            em.close();
        }
    }

    public int getDocenteCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Docente> rt = cq.from(Docente.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
