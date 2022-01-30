/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Asistencias;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.ClasesMateria;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class AsistenciasJpaController implements Serializable {

    public AsistenciasJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Asistencias asistencias) {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            ClasesMateria idClase = asistencias.getIdClase();
            if (idClase != null) {
                idClase = em.getReference(idClase.getClass(), idClase.getIdClaseMateria());
                asistencias.setIdClase(idClase);
            }
            em.persist(asistencias);
            if (idClase != null) {
                idClase.getAsistenciasList().add(asistencias);
                idClase = em.merge(idClase);
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Asistencias asistencias) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Asistencias persistentAsistencias = em.find(Asistencias.class, asistencias.getIdAsistencia());
            ClasesMateria idClaseOld = persistentAsistencias.getIdClase();
            ClasesMateria idClaseNew = asistencias.getIdClase();
            if (idClaseNew != null) {
                idClaseNew = em.getReference(idClaseNew.getClass(), idClaseNew.getIdClaseMateria());
                asistencias.setIdClase(idClaseNew);
            }
            asistencias = em.merge(asistencias);
            if (idClaseOld != null && !idClaseOld.equals(idClaseNew)) {
                idClaseOld.getAsistenciasList().remove(asistencias);
                idClaseOld = em.merge(idClaseOld);
            }
            if (idClaseNew != null && !idClaseNew.equals(idClaseOld)) {
                idClaseNew.getAsistenciasList().add(asistencias);
                idClaseNew = em.merge(idClaseNew);
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = asistencias.getIdAsistencia();
                if (findAsistencias(id) == null) {
                    throw new NonexistentEntityException("The asistencias with id " + id + " no longer exists.");
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
            Asistencias asistencias;
            try {
                asistencias = em.getReference(Asistencias.class, id);
                asistencias.getIdAsistencia();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The asistencias with id " + id + " no longer exists.", enfe);
            }
            ClasesMateria idClase = asistencias.getIdClase();
            if (idClase != null) {
                idClase.getAsistenciasList().remove(asistencias);
                idClase = em.merge(idClase);
            }
            em.remove(asistencias);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Asistencias> findAsistenciasEntities() {
        return findAsistenciasEntities(true, -1, -1);
    }

    public List<Asistencias> findAsistenciasEntities(int maxResults, int firstResult) {
        return findAsistenciasEntities(false, maxResults, firstResult);
    }

    private List<Asistencias> findAsistenciasEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Asistencias.class));
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

    public Asistencias findAsistencias(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Asistencias.class, id);
        } finally {
            em.close();
        }
    }

    public int getAsistenciasCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Asistencias> rt = cq.from(Asistencias.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
