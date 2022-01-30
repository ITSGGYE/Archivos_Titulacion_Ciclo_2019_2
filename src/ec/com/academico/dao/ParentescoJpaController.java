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
import ec.com.academico.dto.Parentesco;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class ParentescoJpaController implements Serializable {

    public ParentescoJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Parentesco parentesco) {
        if (parentesco.getEstudiantesList() == null) {
            parentesco.setEstudiantesList(new ArrayList<Estudiantes>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<Estudiantes> attachedEstudiantesList = new ArrayList<Estudiantes>();
            for (Estudiantes estudiantesListEstudiantesToAttach : parentesco.getEstudiantesList()) {
                estudiantesListEstudiantesToAttach = em.getReference(estudiantesListEstudiantesToAttach.getClass(), estudiantesListEstudiantesToAttach.getIdEstudiantes());
                attachedEstudiantesList.add(estudiantesListEstudiantesToAttach);
            }
            parentesco.setEstudiantesList(attachedEstudiantesList);
            em.persist(parentesco);
            for (Estudiantes estudiantesListEstudiantes : parentesco.getEstudiantesList()) {
                Parentesco oldIdParentescoOfEstudiantesListEstudiantes = estudiantesListEstudiantes.getIdParentesco();
                estudiantesListEstudiantes.setIdParentesco(parentesco);
                estudiantesListEstudiantes = em.merge(estudiantesListEstudiantes);
                if (oldIdParentescoOfEstudiantesListEstudiantes != null) {
                    oldIdParentescoOfEstudiantesListEstudiantes.getEstudiantesList().remove(estudiantesListEstudiantes);
                    oldIdParentescoOfEstudiantesListEstudiantes = em.merge(oldIdParentescoOfEstudiantesListEstudiantes);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Parentesco parentesco) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Parentesco persistentParentesco = em.find(Parentesco.class, parentesco.getIdParentesco());
            List<Estudiantes> estudiantesListOld = persistentParentesco.getEstudiantesList();
            List<Estudiantes> estudiantesListNew = parentesco.getEstudiantesList();
            List<Estudiantes> attachedEstudiantesListNew = new ArrayList<Estudiantes>();
            for (Estudiantes estudiantesListNewEstudiantesToAttach : estudiantesListNew) {
                estudiantesListNewEstudiantesToAttach = em.getReference(estudiantesListNewEstudiantesToAttach.getClass(), estudiantesListNewEstudiantesToAttach.getIdEstudiantes());
                attachedEstudiantesListNew.add(estudiantesListNewEstudiantesToAttach);
            }
            estudiantesListNew = attachedEstudiantesListNew;
            parentesco.setEstudiantesList(estudiantesListNew);
            parentesco = em.merge(parentesco);
            for (Estudiantes estudiantesListOldEstudiantes : estudiantesListOld) {
                if (!estudiantesListNew.contains(estudiantesListOldEstudiantes)) {
                    estudiantesListOldEstudiantes.setIdParentesco(null);
                    estudiantesListOldEstudiantes = em.merge(estudiantesListOldEstudiantes);
                }
            }
            for (Estudiantes estudiantesListNewEstudiantes : estudiantesListNew) {
                if (!estudiantesListOld.contains(estudiantesListNewEstudiantes)) {
                    Parentesco oldIdParentescoOfEstudiantesListNewEstudiantes = estudiantesListNewEstudiantes.getIdParentesco();
                    estudiantesListNewEstudiantes.setIdParentesco(parentesco);
                    estudiantesListNewEstudiantes = em.merge(estudiantesListNewEstudiantes);
                    if (oldIdParentescoOfEstudiantesListNewEstudiantes != null && !oldIdParentescoOfEstudiantesListNewEstudiantes.equals(parentesco)) {
                        oldIdParentescoOfEstudiantesListNewEstudiantes.getEstudiantesList().remove(estudiantesListNewEstudiantes);
                        oldIdParentescoOfEstudiantesListNewEstudiantes = em.merge(oldIdParentescoOfEstudiantesListNewEstudiantes);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = parentesco.getIdParentesco();
                if (findParentesco(id) == null) {
                    throw new NonexistentEntityException("The parentesco with id " + id + " no longer exists.");
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
            Parentesco parentesco;
            try {
                parentesco = em.getReference(Parentesco.class, id);
                parentesco.getIdParentesco();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The parentesco with id " + id + " no longer exists.", enfe);
            }
            List<Estudiantes> estudiantesList = parentesco.getEstudiantesList();
            for (Estudiantes estudiantesListEstudiantes : estudiantesList) {
                estudiantesListEstudiantes.setIdParentesco(null);
                estudiantesListEstudiantes = em.merge(estudiantesListEstudiantes);
            }
            em.remove(parentesco);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Parentesco> findParentescoEntities() {
        return findParentescoEntities(true, -1, -1);
    }

    public List<Parentesco> findParentescoEntities(int maxResults, int firstResult) {
        return findParentescoEntities(false, maxResults, firstResult);
    }

    private List<Parentesco> findParentescoEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Parentesco.class));
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

    public Parentesco findParentesco(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Parentesco.class, id);
        } finally {
            em.close();
        }
    }

    public int getParentescoCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Parentesco> rt = cq.from(Parentesco.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
