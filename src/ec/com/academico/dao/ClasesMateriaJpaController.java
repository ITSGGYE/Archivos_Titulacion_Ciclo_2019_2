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
import ec.com.academico.dto.Asistencias;
import ec.com.academico.dto.ClasesMateria;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class ClasesMateriaJpaController implements Serializable {

    public ClasesMateriaJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(ClasesMateria clasesMateria) {
        if (clasesMateria.getAsistenciasList() == null) {
            clasesMateria.setAsistenciasList(new ArrayList<Asistencias>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            CursoProfesor idCursoProfesor = clasesMateria.getIdCursoProfesor();
            if (idCursoProfesor != null) {
                idCursoProfesor = em.getReference(idCursoProfesor.getClass(), idCursoProfesor.getIdCursoProfesor());
                clasesMateria.setIdCursoProfesor(idCursoProfesor);
            }
            List<Asistencias> attachedAsistenciasList = new ArrayList<Asistencias>();
            for (Asistencias asistenciasListAsistenciasToAttach : clasesMateria.getAsistenciasList()) {
                asistenciasListAsistenciasToAttach = em.getReference(asistenciasListAsistenciasToAttach.getClass(), asistenciasListAsistenciasToAttach.getIdAsistencia());
                attachedAsistenciasList.add(asistenciasListAsistenciasToAttach);
            }
            clasesMateria.setAsistenciasList(attachedAsistenciasList);
            em.persist(clasesMateria);
            if (idCursoProfesor != null) {
                idCursoProfesor.getClasesMateriaList().add(clasesMateria);
                idCursoProfesor = em.merge(idCursoProfesor);
            }
            for (Asistencias asistenciasListAsistencias : clasesMateria.getAsistenciasList()) {
                ClasesMateria oldIdClaseOfAsistenciasListAsistencias = asistenciasListAsistencias.getIdClase();
                asistenciasListAsistencias.setIdClase(clasesMateria);
                asistenciasListAsistencias = em.merge(asistenciasListAsistencias);
                if (oldIdClaseOfAsistenciasListAsistencias != null) {
                    oldIdClaseOfAsistenciasListAsistencias.getAsistenciasList().remove(asistenciasListAsistencias);
                    oldIdClaseOfAsistenciasListAsistencias = em.merge(oldIdClaseOfAsistenciasListAsistencias);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(ClasesMateria clasesMateria) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            ClasesMateria persistentClasesMateria = em.find(ClasesMateria.class, clasesMateria.getIdClaseMateria());
            CursoProfesor idCursoProfesorOld = persistentClasesMateria.getIdCursoProfesor();
            CursoProfesor idCursoProfesorNew = clasesMateria.getIdCursoProfesor();
            List<Asistencias> asistenciasListOld = persistentClasesMateria.getAsistenciasList();
            List<Asistencias> asistenciasListNew = clasesMateria.getAsistenciasList();
            if (idCursoProfesorNew != null) {
                idCursoProfesorNew = em.getReference(idCursoProfesorNew.getClass(), idCursoProfesorNew.getIdCursoProfesor());
                clasesMateria.setIdCursoProfesor(idCursoProfesorNew);
            }
            List<Asistencias> attachedAsistenciasListNew = new ArrayList<Asistencias>();
            for (Asistencias asistenciasListNewAsistenciasToAttach : asistenciasListNew) {
                asistenciasListNewAsistenciasToAttach = em.getReference(asistenciasListNewAsistenciasToAttach.getClass(), asistenciasListNewAsistenciasToAttach.getIdAsistencia());
                attachedAsistenciasListNew.add(asistenciasListNewAsistenciasToAttach);
            }
            asistenciasListNew = attachedAsistenciasListNew;
            clasesMateria.setAsistenciasList(asistenciasListNew);
            clasesMateria = em.merge(clasesMateria);
            if (idCursoProfesorOld != null && !idCursoProfesorOld.equals(idCursoProfesorNew)) {
                idCursoProfesorOld.getClasesMateriaList().remove(clasesMateria);
                idCursoProfesorOld = em.merge(idCursoProfesorOld);
            }
            if (idCursoProfesorNew != null && !idCursoProfesorNew.equals(idCursoProfesorOld)) {
                idCursoProfesorNew.getClasesMateriaList().add(clasesMateria);
                idCursoProfesorNew = em.merge(idCursoProfesorNew);
            }
            for (Asistencias asistenciasListOldAsistencias : asistenciasListOld) {
                if (!asistenciasListNew.contains(asistenciasListOldAsistencias)) {
                    asistenciasListOldAsistencias.setIdClase(null);
                    asistenciasListOldAsistencias = em.merge(asistenciasListOldAsistencias);
                }
            }
            for (Asistencias asistenciasListNewAsistencias : asistenciasListNew) {
                if (!asistenciasListOld.contains(asistenciasListNewAsistencias)) {
                    ClasesMateria oldIdClaseOfAsistenciasListNewAsistencias = asistenciasListNewAsistencias.getIdClase();
                    asistenciasListNewAsistencias.setIdClase(clasesMateria);
                    asistenciasListNewAsistencias = em.merge(asistenciasListNewAsistencias);
                    if (oldIdClaseOfAsistenciasListNewAsistencias != null && !oldIdClaseOfAsistenciasListNewAsistencias.equals(clasesMateria)) {
                        oldIdClaseOfAsistenciasListNewAsistencias.getAsistenciasList().remove(asistenciasListNewAsistencias);
                        oldIdClaseOfAsistenciasListNewAsistencias = em.merge(oldIdClaseOfAsistenciasListNewAsistencias);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = clasesMateria.getIdClaseMateria();
                if (findClasesMateria(id) == null) {
                    throw new NonexistentEntityException("The clasesMateria with id " + id + " no longer exists.");
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
            ClasesMateria clasesMateria;
            try {
                clasesMateria = em.getReference(ClasesMateria.class, id);
                clasesMateria.getIdClaseMateria();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The clasesMateria with id " + id + " no longer exists.", enfe);
            }
            CursoProfesor idCursoProfesor = clasesMateria.getIdCursoProfesor();
            if (idCursoProfesor != null) {
                idCursoProfesor.getClasesMateriaList().remove(clasesMateria);
                idCursoProfesor = em.merge(idCursoProfesor);
            }
            List<Asistencias> asistenciasList = clasesMateria.getAsistenciasList();
            for (Asistencias asistenciasListAsistencias : asistenciasList) {
                asistenciasListAsistencias.setIdClase(null);
                asistenciasListAsistencias = em.merge(asistenciasListAsistencias);
            }
            em.remove(clasesMateria);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<ClasesMateria> findClasesMateriaEntities() {
        return findClasesMateriaEntities(true, -1, -1);
    }

    public List<ClasesMateria> findClasesMateriaEntities(int maxResults, int firstResult) {
        return findClasesMateriaEntities(false, maxResults, firstResult);
    }

    private List<ClasesMateria> findClasesMateriaEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(ClasesMateria.class));
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

    public ClasesMateria findClasesMateria(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(ClasesMateria.class, id);
        } finally {
            em.close();
        }
    }

    public int getClasesMateriaCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<ClasesMateria> rt = cq.from(ClasesMateria.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
