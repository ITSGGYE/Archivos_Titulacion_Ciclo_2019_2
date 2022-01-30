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
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.PeriodoLectivo;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class PeriodoLectivoJpaController implements Serializable {

    public PeriodoLectivoJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(PeriodoLectivo periodoLectivo) {
        if (periodoLectivo.getMatriculaList() == null) {
            periodoLectivo.setMatriculaList(new ArrayList<Matricula>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<Matricula> attachedMatriculaList = new ArrayList<Matricula>();
            for (Matricula matriculaListMatriculaToAttach : periodoLectivo.getMatriculaList()) {
                matriculaListMatriculaToAttach = em.getReference(matriculaListMatriculaToAttach.getClass(), matriculaListMatriculaToAttach.getIdMatricula());
                attachedMatriculaList.add(matriculaListMatriculaToAttach);
            }
            periodoLectivo.setMatriculaList(attachedMatriculaList);
            em.persist(periodoLectivo);
            for (Matricula matriculaListMatricula : periodoLectivo.getMatriculaList()) {
                PeriodoLectivo oldIdPeriodoLectivoOfMatriculaListMatricula = matriculaListMatricula.getIdPeriodoLectivo();
                matriculaListMatricula.setIdPeriodoLectivo(periodoLectivo);
                matriculaListMatricula = em.merge(matriculaListMatricula);
                if (oldIdPeriodoLectivoOfMatriculaListMatricula != null) {
                    oldIdPeriodoLectivoOfMatriculaListMatricula.getMatriculaList().remove(matriculaListMatricula);
                    oldIdPeriodoLectivoOfMatriculaListMatricula = em.merge(oldIdPeriodoLectivoOfMatriculaListMatricula);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(PeriodoLectivo periodoLectivo) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            PeriodoLectivo persistentPeriodoLectivo = em.find(PeriodoLectivo.class, periodoLectivo.getIdPeriodoLectivo());
            List<Matricula> matriculaListOld = persistentPeriodoLectivo.getMatriculaList();
            List<Matricula> matriculaListNew = periodoLectivo.getMatriculaList();
            List<Matricula> attachedMatriculaListNew = new ArrayList<Matricula>();
            for (Matricula matriculaListNewMatriculaToAttach : matriculaListNew) {
                matriculaListNewMatriculaToAttach = em.getReference(matriculaListNewMatriculaToAttach.getClass(), matriculaListNewMatriculaToAttach.getIdMatricula());
                attachedMatriculaListNew.add(matriculaListNewMatriculaToAttach);
            }
            matriculaListNew = attachedMatriculaListNew;
            periodoLectivo.setMatriculaList(matriculaListNew);
            periodoLectivo = em.merge(periodoLectivo);
            for (Matricula matriculaListOldMatricula : matriculaListOld) {
                if (!matriculaListNew.contains(matriculaListOldMatricula)) {
                    matriculaListOldMatricula.setIdPeriodoLectivo(null);
                    matriculaListOldMatricula = em.merge(matriculaListOldMatricula);
                }
            }
            for (Matricula matriculaListNewMatricula : matriculaListNew) {
                if (!matriculaListOld.contains(matriculaListNewMatricula)) {
                    PeriodoLectivo oldIdPeriodoLectivoOfMatriculaListNewMatricula = matriculaListNewMatricula.getIdPeriodoLectivo();
                    matriculaListNewMatricula.setIdPeriodoLectivo(periodoLectivo);
                    matriculaListNewMatricula = em.merge(matriculaListNewMatricula);
                    if (oldIdPeriodoLectivoOfMatriculaListNewMatricula != null && !oldIdPeriodoLectivoOfMatriculaListNewMatricula.equals(periodoLectivo)) {
                        oldIdPeriodoLectivoOfMatriculaListNewMatricula.getMatriculaList().remove(matriculaListNewMatricula);
                        oldIdPeriodoLectivoOfMatriculaListNewMatricula = em.merge(oldIdPeriodoLectivoOfMatriculaListNewMatricula);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = periodoLectivo.getIdPeriodoLectivo();
                if (findPeriodoLectivo(id) == null) {
                    throw new NonexistentEntityException("The periodoLectivo with id " + id + " no longer exists.");
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
            PeriodoLectivo periodoLectivo;
            try {
                periodoLectivo = em.getReference(PeriodoLectivo.class, id);
                periodoLectivo.getIdPeriodoLectivo();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The periodoLectivo with id " + id + " no longer exists.", enfe);
            }
            List<Matricula> matriculaList = periodoLectivo.getMatriculaList();
            for (Matricula matriculaListMatricula : matriculaList) {
                matriculaListMatricula.setIdPeriodoLectivo(null);
                matriculaListMatricula = em.merge(matriculaListMatricula);
            }
            em.remove(periodoLectivo);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<PeriodoLectivo> findPeriodoLectivoEntities() {
        return findPeriodoLectivoEntities(true, -1, -1);
    }

    public List<PeriodoLectivo> findPeriodoLectivoEntities(int maxResults, int firstResult) {
        return findPeriodoLectivoEntities(false, maxResults, firstResult);
    }

    private List<PeriodoLectivo> findPeriodoLectivoEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(PeriodoLectivo.class));
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

    public PeriodoLectivo findPeriodoLectivo(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(PeriodoLectivo.class, id);
        } finally {
            em.close();
        }
    }

    public int getPeriodoLectivoCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<PeriodoLectivo> rt = cq.from(PeriodoLectivo.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
