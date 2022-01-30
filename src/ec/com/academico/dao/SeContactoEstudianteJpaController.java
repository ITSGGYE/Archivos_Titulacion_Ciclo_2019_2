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
import ec.com.academico.dto.Estudiantes;
import ec.com.academico.dto.SeContactoEstudiante;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class SeContactoEstudianteJpaController implements Serializable {

    public SeContactoEstudianteJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(SeContactoEstudiante seContactoEstudiante) {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Estudiantes idEstudiante = seContactoEstudiante.getIdEstudiante();
            if (idEstudiante != null) {
                idEstudiante = em.getReference(idEstudiante.getClass(), idEstudiante.getIdEstudiantes());
                seContactoEstudiante.setIdEstudiante(idEstudiante);
            }
            em.persist(seContactoEstudiante);
            if (idEstudiante != null) {
                idEstudiante.getSeContactoEstudianteList().add(seContactoEstudiante);
                idEstudiante = em.merge(idEstudiante);
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(SeContactoEstudiante seContactoEstudiante) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            SeContactoEstudiante persistentSeContactoEstudiante = em.find(SeContactoEstudiante.class, seContactoEstudiante.getIdContactoEstudiante());
            Estudiantes idEstudianteOld = persistentSeContactoEstudiante.getIdEstudiante();
            Estudiantes idEstudianteNew = seContactoEstudiante.getIdEstudiante();
            if (idEstudianteNew != null) {
                idEstudianteNew = em.getReference(idEstudianteNew.getClass(), idEstudianteNew.getIdEstudiantes());
                seContactoEstudiante.setIdEstudiante(idEstudianteNew);
            }
            seContactoEstudiante = em.merge(seContactoEstudiante);
            if (idEstudianteOld != null && !idEstudianteOld.equals(idEstudianteNew)) {
                idEstudianteOld.getSeContactoEstudianteList().remove(seContactoEstudiante);
                idEstudianteOld = em.merge(idEstudianteOld);
            }
            if (idEstudianteNew != null && !idEstudianteNew.equals(idEstudianteOld)) {
                idEstudianteNew.getSeContactoEstudianteList().add(seContactoEstudiante);
                idEstudianteNew = em.merge(idEstudianteNew);
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = seContactoEstudiante.getIdContactoEstudiante();
                if (findSeContactoEstudiante(id) == null) {
                    throw new NonexistentEntityException("The seContactoEstudiante with id " + id + " no longer exists.");
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
            SeContactoEstudiante seContactoEstudiante;
            try {
                seContactoEstudiante = em.getReference(SeContactoEstudiante.class, id);
                seContactoEstudiante.getIdContactoEstudiante();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The seContactoEstudiante with id " + id + " no longer exists.", enfe);
            }
            Estudiantes idEstudiante = seContactoEstudiante.getIdEstudiante();
            if (idEstudiante != null) {
                idEstudiante.getSeContactoEstudianteList().remove(seContactoEstudiante);
                idEstudiante = em.merge(idEstudiante);
            }
            em.remove(seContactoEstudiante);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<SeContactoEstudiante> findSeContactoEstudianteEntities() {
        return findSeContactoEstudianteEntities(true, -1, -1);
    }

    public List<SeContactoEstudiante> findSeContactoEstudianteEntities(int maxResults, int firstResult) {
        return findSeContactoEstudianteEntities(false, maxResults, firstResult);
    }

    private List<SeContactoEstudiante> findSeContactoEstudianteEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(SeContactoEstudiante.class));
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

    public SeContactoEstudiante findSeContactoEstudiante(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(SeContactoEstudiante.class, id);
        } finally {
            em.close();
        }
    }

    public int getSeContactoEstudianteCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<SeContactoEstudiante> rt = cq.from(SeContactoEstudiante.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
