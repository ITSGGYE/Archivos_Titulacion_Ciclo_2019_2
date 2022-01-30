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
import ec.com.academico.dto.Representante;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RepresentanteJpaController implements Serializable {

    public RepresentanteJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Representante representante) {
        if (representante.getEstudiantesList() == null) {
            representante.setEstudiantesList(new ArrayList<Estudiantes>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<Estudiantes> attachedEstudiantesList = new ArrayList<Estudiantes>();
            for (Estudiantes estudiantesListEstudiantesToAttach : representante.getEstudiantesList()) {
                estudiantesListEstudiantesToAttach = em.getReference(estudiantesListEstudiantesToAttach.getClass(), estudiantesListEstudiantesToAttach.getIdEstudiantes());
                attachedEstudiantesList.add(estudiantesListEstudiantesToAttach);
            }
            representante.setEstudiantesList(attachedEstudiantesList);
            em.persist(representante);
            for (Estudiantes estudiantesListEstudiantes : representante.getEstudiantesList()) {
                Representante oldIdRepresentanteOfEstudiantesListEstudiantes = estudiantesListEstudiantes.getIdRepresentante();
                estudiantesListEstudiantes.setIdRepresentante(representante);
                estudiantesListEstudiantes = em.merge(estudiantesListEstudiantes);
                if (oldIdRepresentanteOfEstudiantesListEstudiantes != null) {
                    oldIdRepresentanteOfEstudiantesListEstudiantes.getEstudiantesList().remove(estudiantesListEstudiantes);
                    oldIdRepresentanteOfEstudiantesListEstudiantes = em.merge(oldIdRepresentanteOfEstudiantesListEstudiantes);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Representante representante) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Representante persistentRepresentante = em.find(Representante.class, representante.getIdRepresentante());
            List<Estudiantes> estudiantesListOld = persistentRepresentante.getEstudiantesList();
            List<Estudiantes> estudiantesListNew = representante.getEstudiantesList();
            List<Estudiantes> attachedEstudiantesListNew = new ArrayList<Estudiantes>();
            for (Estudiantes estudiantesListNewEstudiantesToAttach : estudiantesListNew) {
                estudiantesListNewEstudiantesToAttach = em.getReference(estudiantesListNewEstudiantesToAttach.getClass(), estudiantesListNewEstudiantesToAttach.getIdEstudiantes());
                attachedEstudiantesListNew.add(estudiantesListNewEstudiantesToAttach);
            }
            estudiantesListNew = attachedEstudiantesListNew;
            representante.setEstudiantesList(estudiantesListNew);
            representante = em.merge(representante);
            for (Estudiantes estudiantesListOldEstudiantes : estudiantesListOld) {
                if (!estudiantesListNew.contains(estudiantesListOldEstudiantes)) {
                    estudiantesListOldEstudiantes.setIdRepresentante(null);
                    estudiantesListOldEstudiantes = em.merge(estudiantesListOldEstudiantes);
                }
            }
            for (Estudiantes estudiantesListNewEstudiantes : estudiantesListNew) {
                if (!estudiantesListOld.contains(estudiantesListNewEstudiantes)) {
                    Representante oldIdRepresentanteOfEstudiantesListNewEstudiantes = estudiantesListNewEstudiantes.getIdRepresentante();
                    estudiantesListNewEstudiantes.setIdRepresentante(representante);
                    estudiantesListNewEstudiantes = em.merge(estudiantesListNewEstudiantes);
                    if (oldIdRepresentanteOfEstudiantesListNewEstudiantes != null && !oldIdRepresentanteOfEstudiantesListNewEstudiantes.equals(representante)) {
                        oldIdRepresentanteOfEstudiantesListNewEstudiantes.getEstudiantesList().remove(estudiantesListNewEstudiantes);
                        oldIdRepresentanteOfEstudiantesListNewEstudiantes = em.merge(oldIdRepresentanteOfEstudiantesListNewEstudiantes);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = representante.getIdRepresentante();
                if (findRepresentante(id) == null) {
                    throw new NonexistentEntityException("The representante with id " + id + " no longer exists.");
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
            Representante representante;
            try {
                representante = em.getReference(Representante.class, id);
                representante.getIdRepresentante();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The representante with id " + id + " no longer exists.", enfe);
            }
            List<Estudiantes> estudiantesList = representante.getEstudiantesList();
            for (Estudiantes estudiantesListEstudiantes : estudiantesList) {
                estudiantesListEstudiantes.setIdRepresentante(null);
                estudiantesListEstudiantes = em.merge(estudiantesListEstudiantes);
            }
            em.remove(representante);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Representante> findRepresentanteEntities() {
        return findRepresentanteEntities(true, -1, -1);
    }

    public List<Representante> findRepresentanteEntities(int maxResults, int firstResult) {
        return findRepresentanteEntities(false, maxResults, firstResult);
    }

    private List<Representante> findRepresentanteEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Representante.class));
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

    public Representante findRepresentante(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Representante.class, id);
        } finally {
            em.close();
        }
    }

    public int getRepresentanteCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Representante> rt = cq.from(Representante.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
