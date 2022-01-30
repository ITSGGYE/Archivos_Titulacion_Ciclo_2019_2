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
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Paralelos;
import ec.com.academico.dto.CursoProfesor;
import java.util.ArrayList;
import java.util.List;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.RelCursoParalelo;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RelCursoParaleloJpaController implements Serializable {

    public RelCursoParaleloJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(RelCursoParalelo relCursoParalelo) {
        if (relCursoParalelo.getCursoProfesorList() == null) {
            relCursoParalelo.setCursoProfesorList(new ArrayList<CursoProfesor>());
        }
        if (relCursoParalelo.getMatriculaList() == null) {
            relCursoParalelo.setMatriculaList(new ArrayList<Matricula>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Cursos idCurso = relCursoParalelo.getIdCurso();
            if (idCurso != null) {
                idCurso = em.getReference(idCurso.getClass(), idCurso.getIdCursos());
                relCursoParalelo.setIdCurso(idCurso);
            }
            Paralelos idParalelo = relCursoParalelo.getIdParalelo();
            if (idParalelo != null) {
                idParalelo = em.getReference(idParalelo.getClass(), idParalelo.getIdParalelos());
                relCursoParalelo.setIdParalelo(idParalelo);
            }
            List<CursoProfesor> attachedCursoProfesorList = new ArrayList<CursoProfesor>();
            for (CursoProfesor cursoProfesorListCursoProfesorToAttach : relCursoParalelo.getCursoProfesorList()) {
                cursoProfesorListCursoProfesorToAttach = em.getReference(cursoProfesorListCursoProfesorToAttach.getClass(), cursoProfesorListCursoProfesorToAttach.getIdCursoProfesor());
                attachedCursoProfesorList.add(cursoProfesorListCursoProfesorToAttach);
            }
            relCursoParalelo.setCursoProfesorList(attachedCursoProfesorList);
            List<Matricula> attachedMatriculaList = new ArrayList<Matricula>();
            for (Matricula matriculaListMatriculaToAttach : relCursoParalelo.getMatriculaList()) {
                matriculaListMatriculaToAttach = em.getReference(matriculaListMatriculaToAttach.getClass(), matriculaListMatriculaToAttach.getIdMatricula());
                attachedMatriculaList.add(matriculaListMatriculaToAttach);
            }
            relCursoParalelo.setMatriculaList(attachedMatriculaList);
            em.persist(relCursoParalelo);
            if (idCurso != null) {
                idCurso.getRelCursoParaleloList().add(relCursoParalelo);
                idCurso = em.merge(idCurso);
            }
            if (idParalelo != null) {
                idParalelo.getRelCursoParaleloList().add(relCursoParalelo);
                idParalelo = em.merge(idParalelo);
            }
            for (CursoProfesor cursoProfesorListCursoProfesor : relCursoParalelo.getCursoProfesorList()) {
                RelCursoParalelo oldIdCursoOfCursoProfesorListCursoProfesor = cursoProfesorListCursoProfesor.getIdCurso();
                cursoProfesorListCursoProfesor.setIdCurso(relCursoParalelo);
                cursoProfesorListCursoProfesor = em.merge(cursoProfesorListCursoProfesor);
                if (oldIdCursoOfCursoProfesorListCursoProfesor != null) {
                    oldIdCursoOfCursoProfesorListCursoProfesor.getCursoProfesorList().remove(cursoProfesorListCursoProfesor);
                    oldIdCursoOfCursoProfesorListCursoProfesor = em.merge(oldIdCursoOfCursoProfesorListCursoProfesor);
                }
            }
            for (Matricula matriculaListMatricula : relCursoParalelo.getMatriculaList()) {
                RelCursoParalelo oldIdCursoOfMatriculaListMatricula = matriculaListMatricula.getIdCurso();
                matriculaListMatricula.setIdCurso(relCursoParalelo);
                matriculaListMatricula = em.merge(matriculaListMatricula);
                if (oldIdCursoOfMatriculaListMatricula != null) {
                    oldIdCursoOfMatriculaListMatricula.getMatriculaList().remove(matriculaListMatricula);
                    oldIdCursoOfMatriculaListMatricula = em.merge(oldIdCursoOfMatriculaListMatricula);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(RelCursoParalelo relCursoParalelo) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            RelCursoParalelo persistentRelCursoParalelo = em.find(RelCursoParalelo.class, relCursoParalelo.getIdRelCursoParalelo());
            Cursos idCursoOld = persistentRelCursoParalelo.getIdCurso();
            Cursos idCursoNew = relCursoParalelo.getIdCurso();
            Paralelos idParaleloOld = persistentRelCursoParalelo.getIdParalelo();
            Paralelos idParaleloNew = relCursoParalelo.getIdParalelo();
            List<CursoProfesor> cursoProfesorListOld = persistentRelCursoParalelo.getCursoProfesorList();
            List<CursoProfesor> cursoProfesorListNew = relCursoParalelo.getCursoProfesorList();
            List<Matricula> matriculaListOld = persistentRelCursoParalelo.getMatriculaList();
            List<Matricula> matriculaListNew = relCursoParalelo.getMatriculaList();
            if (idCursoNew != null) {
                idCursoNew = em.getReference(idCursoNew.getClass(), idCursoNew.getIdCursos());
                relCursoParalelo.setIdCurso(idCursoNew);
            }
            if (idParaleloNew != null) {
                idParaleloNew = em.getReference(idParaleloNew.getClass(), idParaleloNew.getIdParalelos());
                relCursoParalelo.setIdParalelo(idParaleloNew);
            }
            List<CursoProfesor> attachedCursoProfesorListNew = new ArrayList<CursoProfesor>();
            for (CursoProfesor cursoProfesorListNewCursoProfesorToAttach : cursoProfesorListNew) {
                cursoProfesorListNewCursoProfesorToAttach = em.getReference(cursoProfesorListNewCursoProfesorToAttach.getClass(), cursoProfesorListNewCursoProfesorToAttach.getIdCursoProfesor());
                attachedCursoProfesorListNew.add(cursoProfesorListNewCursoProfesorToAttach);
            }
            cursoProfesorListNew = attachedCursoProfesorListNew;
            relCursoParalelo.setCursoProfesorList(cursoProfesorListNew);
            List<Matricula> attachedMatriculaListNew = new ArrayList<Matricula>();
            for (Matricula matriculaListNewMatriculaToAttach : matriculaListNew) {
                matriculaListNewMatriculaToAttach = em.getReference(matriculaListNewMatriculaToAttach.getClass(), matriculaListNewMatriculaToAttach.getIdMatricula());
                attachedMatriculaListNew.add(matriculaListNewMatriculaToAttach);
            }
            matriculaListNew = attachedMatriculaListNew;
            relCursoParalelo.setMatriculaList(matriculaListNew);
            relCursoParalelo = em.merge(relCursoParalelo);
            if (idCursoOld != null && !idCursoOld.equals(idCursoNew)) {
                idCursoOld.getRelCursoParaleloList().remove(relCursoParalelo);
                idCursoOld = em.merge(idCursoOld);
            }
            if (idCursoNew != null && !idCursoNew.equals(idCursoOld)) {
                idCursoNew.getRelCursoParaleloList().add(relCursoParalelo);
                idCursoNew = em.merge(idCursoNew);
            }
            if (idParaleloOld != null && !idParaleloOld.equals(idParaleloNew)) {
                idParaleloOld.getRelCursoParaleloList().remove(relCursoParalelo);
                idParaleloOld = em.merge(idParaleloOld);
            }
            if (idParaleloNew != null && !idParaleloNew.equals(idParaleloOld)) {
                idParaleloNew.getRelCursoParaleloList().add(relCursoParalelo);
                idParaleloNew = em.merge(idParaleloNew);
            }
            for (CursoProfesor cursoProfesorListOldCursoProfesor : cursoProfesorListOld) {
                if (!cursoProfesorListNew.contains(cursoProfesorListOldCursoProfesor)) {
                    cursoProfesorListOldCursoProfesor.setIdCurso(null);
                    cursoProfesorListOldCursoProfesor = em.merge(cursoProfesorListOldCursoProfesor);
                }
            }
            for (CursoProfesor cursoProfesorListNewCursoProfesor : cursoProfesorListNew) {
                if (!cursoProfesorListOld.contains(cursoProfesorListNewCursoProfesor)) {
                    RelCursoParalelo oldIdCursoOfCursoProfesorListNewCursoProfesor = cursoProfesorListNewCursoProfesor.getIdCurso();
                    cursoProfesorListNewCursoProfesor.setIdCurso(relCursoParalelo);
                    cursoProfesorListNewCursoProfesor = em.merge(cursoProfesorListNewCursoProfesor);
                    if (oldIdCursoOfCursoProfesorListNewCursoProfesor != null && !oldIdCursoOfCursoProfesorListNewCursoProfesor.equals(relCursoParalelo)) {
                        oldIdCursoOfCursoProfesorListNewCursoProfesor.getCursoProfesorList().remove(cursoProfesorListNewCursoProfesor);
                        oldIdCursoOfCursoProfesorListNewCursoProfesor = em.merge(oldIdCursoOfCursoProfesorListNewCursoProfesor);
                    }
                }
            }
            for (Matricula matriculaListOldMatricula : matriculaListOld) {
                if (!matriculaListNew.contains(matriculaListOldMatricula)) {
                    matriculaListOldMatricula.setIdCurso(null);
                    matriculaListOldMatricula = em.merge(matriculaListOldMatricula);
                }
            }
            for (Matricula matriculaListNewMatricula : matriculaListNew) {
                if (!matriculaListOld.contains(matriculaListNewMatricula)) {
                    RelCursoParalelo oldIdCursoOfMatriculaListNewMatricula = matriculaListNewMatricula.getIdCurso();
                    matriculaListNewMatricula.setIdCurso(relCursoParalelo);
                    matriculaListNewMatricula = em.merge(matriculaListNewMatricula);
                    if (oldIdCursoOfMatriculaListNewMatricula != null && !oldIdCursoOfMatriculaListNewMatricula.equals(relCursoParalelo)) {
                        oldIdCursoOfMatriculaListNewMatricula.getMatriculaList().remove(matriculaListNewMatricula);
                        oldIdCursoOfMatriculaListNewMatricula = em.merge(oldIdCursoOfMatriculaListNewMatricula);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = relCursoParalelo.getIdRelCursoParalelo();
                if (findRelCursoParalelo(id) == null) {
                    throw new NonexistentEntityException("The relCursoParalelo with id " + id + " no longer exists.");
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
            RelCursoParalelo relCursoParalelo;
            try {
                relCursoParalelo = em.getReference(RelCursoParalelo.class, id);
                relCursoParalelo.getIdRelCursoParalelo();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The relCursoParalelo with id " + id + " no longer exists.", enfe);
            }
            Cursos idCurso = relCursoParalelo.getIdCurso();
            if (idCurso != null) {
                idCurso.getRelCursoParaleloList().remove(relCursoParalelo);
                idCurso = em.merge(idCurso);
            }
            Paralelos idParalelo = relCursoParalelo.getIdParalelo();
            if (idParalelo != null) {
                idParalelo.getRelCursoParaleloList().remove(relCursoParalelo);
                idParalelo = em.merge(idParalelo);
            }
            List<CursoProfesor> cursoProfesorList = relCursoParalelo.getCursoProfesorList();
            for (CursoProfesor cursoProfesorListCursoProfesor : cursoProfesorList) {
                cursoProfesorListCursoProfesor.setIdCurso(null);
                cursoProfesorListCursoProfesor = em.merge(cursoProfesorListCursoProfesor);
            }
            List<Matricula> matriculaList = relCursoParalelo.getMatriculaList();
            for (Matricula matriculaListMatricula : matriculaList) {
                matriculaListMatricula.setIdCurso(null);
                matriculaListMatricula = em.merge(matriculaListMatricula);
            }
            em.remove(relCursoParalelo);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<RelCursoParalelo> findRelCursoParaleloEntities() {
        return findRelCursoParaleloEntities(true, -1, -1);
    }

    public List<RelCursoParalelo> findRelCursoParaleloEntities(int maxResults, int firstResult) {
        return findRelCursoParaleloEntities(false, maxResults, firstResult);
    }

    private List<RelCursoParalelo> findRelCursoParaleloEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(RelCursoParalelo.class));
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

    public RelCursoParalelo findRelCursoParalelo(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(RelCursoParalelo.class, id);
        } finally {
            em.close();
        }
    }

    public int getRelCursoParaleloCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<RelCursoParalelo> rt = cq.from(RelCursoParalelo.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
