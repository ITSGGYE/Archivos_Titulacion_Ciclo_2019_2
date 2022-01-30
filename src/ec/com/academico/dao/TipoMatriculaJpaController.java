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
import ec.com.academico.dto.TipoMatricula;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class TipoMatriculaJpaController implements Serializable {

    public TipoMatriculaJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(TipoMatricula tipoMatricula) {
        if (tipoMatricula.getMatriculaList() == null) {
            tipoMatricula.setMatriculaList(new ArrayList<Matricula>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<Matricula> attachedMatriculaList = new ArrayList<Matricula>();
            for (Matricula matriculaListMatriculaToAttach : tipoMatricula.getMatriculaList()) {
                matriculaListMatriculaToAttach = em.getReference(matriculaListMatriculaToAttach.getClass(), matriculaListMatriculaToAttach.getIdMatricula());
                attachedMatriculaList.add(matriculaListMatriculaToAttach);
            }
            tipoMatricula.setMatriculaList(attachedMatriculaList);
            em.persist(tipoMatricula);
            for (Matricula matriculaListMatricula : tipoMatricula.getMatriculaList()) {
                TipoMatricula oldIdTipoMatriculaOfMatriculaListMatricula = matriculaListMatricula.getIdTipoMatricula();
                matriculaListMatricula.setIdTipoMatricula(tipoMatricula);
                matriculaListMatricula = em.merge(matriculaListMatricula);
                if (oldIdTipoMatriculaOfMatriculaListMatricula != null) {
                    oldIdTipoMatriculaOfMatriculaListMatricula.getMatriculaList().remove(matriculaListMatricula);
                    oldIdTipoMatriculaOfMatriculaListMatricula = em.merge(oldIdTipoMatriculaOfMatriculaListMatricula);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(TipoMatricula tipoMatricula) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            TipoMatricula persistentTipoMatricula = em.find(TipoMatricula.class, tipoMatricula.getIdTipoMatricula());
            List<Matricula> matriculaListOld = persistentTipoMatricula.getMatriculaList();
            List<Matricula> matriculaListNew = tipoMatricula.getMatriculaList();
            List<Matricula> attachedMatriculaListNew = new ArrayList<Matricula>();
            for (Matricula matriculaListNewMatriculaToAttach : matriculaListNew) {
                matriculaListNewMatriculaToAttach = em.getReference(matriculaListNewMatriculaToAttach.getClass(), matriculaListNewMatriculaToAttach.getIdMatricula());
                attachedMatriculaListNew.add(matriculaListNewMatriculaToAttach);
            }
            matriculaListNew = attachedMatriculaListNew;
            tipoMatricula.setMatriculaList(matriculaListNew);
            tipoMatricula = em.merge(tipoMatricula);
            for (Matricula matriculaListOldMatricula : matriculaListOld) {
                if (!matriculaListNew.contains(matriculaListOldMatricula)) {
                    matriculaListOldMatricula.setIdTipoMatricula(null);
                    matriculaListOldMatricula = em.merge(matriculaListOldMatricula);
                }
            }
            for (Matricula matriculaListNewMatricula : matriculaListNew) {
                if (!matriculaListOld.contains(matriculaListNewMatricula)) {
                    TipoMatricula oldIdTipoMatriculaOfMatriculaListNewMatricula = matriculaListNewMatricula.getIdTipoMatricula();
                    matriculaListNewMatricula.setIdTipoMatricula(tipoMatricula);
                    matriculaListNewMatricula = em.merge(matriculaListNewMatricula);
                    if (oldIdTipoMatriculaOfMatriculaListNewMatricula != null && !oldIdTipoMatriculaOfMatriculaListNewMatricula.equals(tipoMatricula)) {
                        oldIdTipoMatriculaOfMatriculaListNewMatricula.getMatriculaList().remove(matriculaListNewMatricula);
                        oldIdTipoMatriculaOfMatriculaListNewMatricula = em.merge(oldIdTipoMatriculaOfMatriculaListNewMatricula);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = tipoMatricula.getIdTipoMatricula();
                if (findTipoMatricula(id) == null) {
                    throw new NonexistentEntityException("The tipoMatricula with id " + id + " no longer exists.");
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
            TipoMatricula tipoMatricula;
            try {
                tipoMatricula = em.getReference(TipoMatricula.class, id);
                tipoMatricula.getIdTipoMatricula();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The tipoMatricula with id " + id + " no longer exists.", enfe);
            }
            List<Matricula> matriculaList = tipoMatricula.getMatriculaList();
            for (Matricula matriculaListMatricula : matriculaList) {
                matriculaListMatricula.setIdTipoMatricula(null);
                matriculaListMatricula = em.merge(matriculaListMatricula);
            }
            em.remove(tipoMatricula);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<TipoMatricula> findTipoMatriculaEntities() {
        return findTipoMatriculaEntities(true, -1, -1);
    }

    public List<TipoMatricula> findTipoMatriculaEntities(int maxResults, int firstResult) {
        return findTipoMatriculaEntities(false, maxResults, firstResult);
    }

    private List<TipoMatricula> findTipoMatriculaEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(TipoMatricula.class));
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

    public TipoMatricula findTipoMatricula(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(TipoMatricula.class, id);
        } finally {
            em.close();
        }
    }

    public int getTipoMatriculaCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<TipoMatricula> rt = cq.from(TipoMatricula.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
