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
import ec.com.academico.dto.Docente;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.ClasesMateria;
import ec.com.academico.dto.CursoProfesor;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class CursoProfesorJpaController implements Serializable {

    public CursoProfesorJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(CursoProfesor cursoProfesor) {
        if (cursoProfesor.getClasesMateriaList() == null) {
            cursoProfesor.setClasesMateriaList(new ArrayList<ClasesMateria>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Docente idDocente = cursoProfesor.getIdDocente();
            if (idDocente != null) {
                idDocente = em.getReference(idDocente.getClass(), idDocente.getIdDocente());
                cursoProfesor.setIdDocente(idDocente);
            }
            RelCursoParalelo idCurso = cursoProfesor.getIdCurso();
            if (idCurso != null) {
                idCurso = em.getReference(idCurso.getClass(), idCurso.getIdRelCursoParalelo());
                cursoProfesor.setIdCurso(idCurso);
            }
            List<ClasesMateria> attachedClasesMateriaList = new ArrayList<ClasesMateria>();
            for (ClasesMateria clasesMateriaListClasesMateriaToAttach : cursoProfesor.getClasesMateriaList()) {
                clasesMateriaListClasesMateriaToAttach = em.getReference(clasesMateriaListClasesMateriaToAttach.getClass(), clasesMateriaListClasesMateriaToAttach.getIdClaseMateria());
                attachedClasesMateriaList.add(clasesMateriaListClasesMateriaToAttach);
            }
            cursoProfesor.setClasesMateriaList(attachedClasesMateriaList);
            em.persist(cursoProfesor);
            if (idDocente != null) {
                idDocente.getCursoProfesorList().add(cursoProfesor);
                idDocente = em.merge(idDocente);
            }
            if (idCurso != null) {
                idCurso.getCursoProfesorList().add(cursoProfesor);
                idCurso = em.merge(idCurso);
            }
            for (ClasesMateria clasesMateriaListClasesMateria : cursoProfesor.getClasesMateriaList()) {
                CursoProfesor oldIdCursoProfesorOfClasesMateriaListClasesMateria = clasesMateriaListClasesMateria.getIdCursoProfesor();
                clasesMateriaListClasesMateria.setIdCursoProfesor(cursoProfesor);
                clasesMateriaListClasesMateria = em.merge(clasesMateriaListClasesMateria);
                if (oldIdCursoProfesorOfClasesMateriaListClasesMateria != null) {
                    oldIdCursoProfesorOfClasesMateriaListClasesMateria.getClasesMateriaList().remove(clasesMateriaListClasesMateria);
                    oldIdCursoProfesorOfClasesMateriaListClasesMateria = em.merge(oldIdCursoProfesorOfClasesMateriaListClasesMateria);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(CursoProfesor cursoProfesor) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            CursoProfesor persistentCursoProfesor = em.find(CursoProfesor.class, cursoProfesor.getIdCursoProfesor());
            Docente idDocenteOld = persistentCursoProfesor.getIdDocente();
            Docente idDocenteNew = cursoProfesor.getIdDocente();
            RelCursoParalelo idCursoOld = persistentCursoProfesor.getIdCurso();
            RelCursoParalelo idCursoNew = cursoProfesor.getIdCurso();
            List<ClasesMateria> clasesMateriaListOld = persistentCursoProfesor.getClasesMateriaList();
            List<ClasesMateria> clasesMateriaListNew = cursoProfesor.getClasesMateriaList();
            if (idDocenteNew != null) {
                idDocenteNew = em.getReference(idDocenteNew.getClass(), idDocenteNew.getIdDocente());
                cursoProfesor.setIdDocente(idDocenteNew);
            }
            if (idCursoNew != null) {
                idCursoNew = em.getReference(idCursoNew.getClass(), idCursoNew.getIdRelCursoParalelo());
                cursoProfesor.setIdCurso(idCursoNew);
            }
            List<ClasesMateria> attachedClasesMateriaListNew = new ArrayList<ClasesMateria>();
            for (ClasesMateria clasesMateriaListNewClasesMateriaToAttach : clasesMateriaListNew) {
                clasesMateriaListNewClasesMateriaToAttach = em.getReference(clasesMateriaListNewClasesMateriaToAttach.getClass(), clasesMateriaListNewClasesMateriaToAttach.getIdClaseMateria());
                attachedClasesMateriaListNew.add(clasesMateriaListNewClasesMateriaToAttach);
            }
            clasesMateriaListNew = attachedClasesMateriaListNew;
            cursoProfesor.setClasesMateriaList(clasesMateriaListNew);
            cursoProfesor = em.merge(cursoProfesor);
            if (idDocenteOld != null && !idDocenteOld.equals(idDocenteNew)) {
                idDocenteOld.getCursoProfesorList().remove(cursoProfesor);
                idDocenteOld = em.merge(idDocenteOld);
            }
            if (idDocenteNew != null && !idDocenteNew.equals(idDocenteOld)) {
                idDocenteNew.getCursoProfesorList().add(cursoProfesor);
                idDocenteNew = em.merge(idDocenteNew);
            }
            if (idCursoOld != null && !idCursoOld.equals(idCursoNew)) {
                idCursoOld.getCursoProfesorList().remove(cursoProfesor);
                idCursoOld = em.merge(idCursoOld);
            }
            if (idCursoNew != null && !idCursoNew.equals(idCursoOld)) {
                idCursoNew.getCursoProfesorList().add(cursoProfesor);
                idCursoNew = em.merge(idCursoNew);
            }
            for (ClasesMateria clasesMateriaListOldClasesMateria : clasesMateriaListOld) {
                if (!clasesMateriaListNew.contains(clasesMateriaListOldClasesMateria)) {
                    clasesMateriaListOldClasesMateria.setIdCursoProfesor(null);
                    clasesMateriaListOldClasesMateria = em.merge(clasesMateriaListOldClasesMateria);
                }
            }
            for (ClasesMateria clasesMateriaListNewClasesMateria : clasesMateriaListNew) {
                if (!clasesMateriaListOld.contains(clasesMateriaListNewClasesMateria)) {
                    CursoProfesor oldIdCursoProfesorOfClasesMateriaListNewClasesMateria = clasesMateriaListNewClasesMateria.getIdCursoProfesor();
                    clasesMateriaListNewClasesMateria.setIdCursoProfesor(cursoProfesor);
                    clasesMateriaListNewClasesMateria = em.merge(clasesMateriaListNewClasesMateria);
                    if (oldIdCursoProfesorOfClasesMateriaListNewClasesMateria != null && !oldIdCursoProfesorOfClasesMateriaListNewClasesMateria.equals(cursoProfesor)) {
                        oldIdCursoProfesorOfClasesMateriaListNewClasesMateria.getClasesMateriaList().remove(clasesMateriaListNewClasesMateria);
                        oldIdCursoProfesorOfClasesMateriaListNewClasesMateria = em.merge(oldIdCursoProfesorOfClasesMateriaListNewClasesMateria);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = cursoProfesor.getIdCursoProfesor();
                if (findCursoProfesor(id) == null) {
                    throw new NonexistentEntityException("The cursoProfesor with id " + id + " no longer exists.");
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
            CursoProfesor cursoProfesor;
            try {
                cursoProfesor = em.getReference(CursoProfesor.class, id);
                cursoProfesor.getIdCursoProfesor();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The cursoProfesor with id " + id + " no longer exists.", enfe);
            }
            Docente idDocente = cursoProfesor.getIdDocente();
            if (idDocente != null) {
                idDocente.getCursoProfesorList().remove(cursoProfesor);
                idDocente = em.merge(idDocente);
            }
            RelCursoParalelo idCurso = cursoProfesor.getIdCurso();
            if (idCurso != null) {
                idCurso.getCursoProfesorList().remove(cursoProfesor);
                idCurso = em.merge(idCurso);
            }
            List<ClasesMateria> clasesMateriaList = cursoProfesor.getClasesMateriaList();
            for (ClasesMateria clasesMateriaListClasesMateria : clasesMateriaList) {
                clasesMateriaListClasesMateria.setIdCursoProfesor(null);
                clasesMateriaListClasesMateria = em.merge(clasesMateriaListClasesMateria);
            }
            em.remove(cursoProfesor);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<CursoProfesor> findCursoProfesorEntities() {
        return findCursoProfesorEntities(true, -1, -1);
    }

    public List<CursoProfesor> findCursoProfesorEntities(int maxResults, int firstResult) {
        return findCursoProfesorEntities(false, maxResults, firstResult);
    }

    private List<CursoProfesor> findCursoProfesorEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(CursoProfesor.class));
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

    public CursoProfesor findCursoProfesor(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(CursoProfesor.class, id);
        } finally {
            em.close();
        }
    }

    public int getCursoProfesorCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<CursoProfesor> rt = cq.from(CursoProfesor.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
