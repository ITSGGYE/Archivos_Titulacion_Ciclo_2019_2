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
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.PeriodoLectivo;
import ec.com.academico.dto.TipoMatricula;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.RelMatriDoc;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class MatriculaJpaController implements Serializable {

    public MatriculaJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Matricula matricula) {
        if (matricula.getRelMatriDocList() == null) {
            matricula.setRelMatriDocList(new ArrayList<RelMatriDoc>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Estudiantes idEstudiante = matricula.getIdEstudiante();
            if (idEstudiante != null) {
                idEstudiante = em.getReference(idEstudiante.getClass(), idEstudiante.getIdEstudiantes());
                matricula.setIdEstudiante(idEstudiante);
            }
            PeriodoLectivo idPeriodoLectivo = matricula.getIdPeriodoLectivo();
            if (idPeriodoLectivo != null) {
                idPeriodoLectivo = em.getReference(idPeriodoLectivo.getClass(), idPeriodoLectivo.getIdPeriodoLectivo());
                matricula.setIdPeriodoLectivo(idPeriodoLectivo);
            }
            TipoMatricula idTipoMatricula = matricula.getIdTipoMatricula();
            if (idTipoMatricula != null) {
                idTipoMatricula = em.getReference(idTipoMatricula.getClass(), idTipoMatricula.getIdTipoMatricula());
                matricula.setIdTipoMatricula(idTipoMatricula);
            }
            RelCursoParalelo idCurso = matricula.getIdCurso();
            if (idCurso != null) {
                idCurso = em.getReference(idCurso.getClass(), idCurso.getIdRelCursoParalelo());
                matricula.setIdCurso(idCurso);
            }
            List<RelMatriDoc> attachedRelMatriDocList = new ArrayList<RelMatriDoc>();
            for (RelMatriDoc relMatriDocListRelMatriDocToAttach : matricula.getRelMatriDocList()) {
                relMatriDocListRelMatriDocToAttach = em.getReference(relMatriDocListRelMatriDocToAttach.getClass(), relMatriDocListRelMatriDocToAttach.getIdRelMatriDoc());
                attachedRelMatriDocList.add(relMatriDocListRelMatriDocToAttach);
            }
            matricula.setRelMatriDocList(attachedRelMatriDocList);
            em.persist(matricula);
            if (idEstudiante != null) {
                idEstudiante.getMatriculaList().add(matricula);
                idEstudiante = em.merge(idEstudiante);
            }
            if (idPeriodoLectivo != null) {
                idPeriodoLectivo.getMatriculaList().add(matricula);
                idPeriodoLectivo = em.merge(idPeriodoLectivo);
            }
            if (idTipoMatricula != null) {
                idTipoMatricula.getMatriculaList().add(matricula);
                idTipoMatricula = em.merge(idTipoMatricula);
            }
            if (idCurso != null) {
                idCurso.getMatriculaList().add(matricula);
                idCurso = em.merge(idCurso);
            }
            for (RelMatriDoc relMatriDocListRelMatriDoc : matricula.getRelMatriDocList()) {
                Matricula oldIdMatriculaOfRelMatriDocListRelMatriDoc = relMatriDocListRelMatriDoc.getIdMatricula();
                relMatriDocListRelMatriDoc.setIdMatricula(matricula);
                relMatriDocListRelMatriDoc = em.merge(relMatriDocListRelMatriDoc);
                if (oldIdMatriculaOfRelMatriDocListRelMatriDoc != null) {
                    oldIdMatriculaOfRelMatriDocListRelMatriDoc.getRelMatriDocList().remove(relMatriDocListRelMatriDoc);
                    oldIdMatriculaOfRelMatriDocListRelMatriDoc = em.merge(oldIdMatriculaOfRelMatriDocListRelMatriDoc);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Matricula matricula) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Matricula persistentMatricula = em.find(Matricula.class, matricula.getIdMatricula());
            Estudiantes idEstudianteOld = persistentMatricula.getIdEstudiante();
            Estudiantes idEstudianteNew = matricula.getIdEstudiante();
            PeriodoLectivo idPeriodoLectivoOld = persistentMatricula.getIdPeriodoLectivo();
            PeriodoLectivo idPeriodoLectivoNew = matricula.getIdPeriodoLectivo();
            TipoMatricula idTipoMatriculaOld = persistentMatricula.getIdTipoMatricula();
            TipoMatricula idTipoMatriculaNew = matricula.getIdTipoMatricula();
            RelCursoParalelo idCursoOld = persistentMatricula.getIdCurso();
            RelCursoParalelo idCursoNew = matricula.getIdCurso();
            List<RelMatriDoc> relMatriDocListOld = persistentMatricula.getRelMatriDocList();
            List<RelMatriDoc> relMatriDocListNew = matricula.getRelMatriDocList();
            if (idEstudianteNew != null) {
                idEstudianteNew = em.getReference(idEstudianteNew.getClass(), idEstudianteNew.getIdEstudiantes());
                matricula.setIdEstudiante(idEstudianteNew);
            }
            if (idPeriodoLectivoNew != null) {
                idPeriodoLectivoNew = em.getReference(idPeriodoLectivoNew.getClass(), idPeriodoLectivoNew.getIdPeriodoLectivo());
                matricula.setIdPeriodoLectivo(idPeriodoLectivoNew);
            }
            if (idTipoMatriculaNew != null) {
                idTipoMatriculaNew = em.getReference(idTipoMatriculaNew.getClass(), idTipoMatriculaNew.getIdTipoMatricula());
                matricula.setIdTipoMatricula(idTipoMatriculaNew);
            }
            if (idCursoNew != null) {
                idCursoNew = em.getReference(idCursoNew.getClass(), idCursoNew.getIdRelCursoParalelo());
                matricula.setIdCurso(idCursoNew);
            }
            List<RelMatriDoc> attachedRelMatriDocListNew = new ArrayList<RelMatriDoc>();
            for (RelMatriDoc relMatriDocListNewRelMatriDocToAttach : relMatriDocListNew) {
                relMatriDocListNewRelMatriDocToAttach = em.getReference(relMatriDocListNewRelMatriDocToAttach.getClass(), relMatriDocListNewRelMatriDocToAttach.getIdRelMatriDoc());
                attachedRelMatriDocListNew.add(relMatriDocListNewRelMatriDocToAttach);
            }
            relMatriDocListNew = attachedRelMatriDocListNew;
            matricula.setRelMatriDocList(relMatriDocListNew);
            matricula = em.merge(matricula);
            if (idEstudianteOld != null && !idEstudianteOld.equals(idEstudianteNew)) {
                idEstudianteOld.getMatriculaList().remove(matricula);
                idEstudianteOld = em.merge(idEstudianteOld);
            }
            if (idEstudianteNew != null && !idEstudianteNew.equals(idEstudianteOld)) {
                idEstudianteNew.getMatriculaList().add(matricula);
                idEstudianteNew = em.merge(idEstudianteNew);
            }
            if (idPeriodoLectivoOld != null && !idPeriodoLectivoOld.equals(idPeriodoLectivoNew)) {
                idPeriodoLectivoOld.getMatriculaList().remove(matricula);
                idPeriodoLectivoOld = em.merge(idPeriodoLectivoOld);
            }
            if (idPeriodoLectivoNew != null && !idPeriodoLectivoNew.equals(idPeriodoLectivoOld)) {
                idPeriodoLectivoNew.getMatriculaList().add(matricula);
                idPeriodoLectivoNew = em.merge(idPeriodoLectivoNew);
            }
            if (idTipoMatriculaOld != null && !idTipoMatriculaOld.equals(idTipoMatriculaNew)) {
                idTipoMatriculaOld.getMatriculaList().remove(matricula);
                idTipoMatriculaOld = em.merge(idTipoMatriculaOld);
            }
            if (idTipoMatriculaNew != null && !idTipoMatriculaNew.equals(idTipoMatriculaOld)) {
                idTipoMatriculaNew.getMatriculaList().add(matricula);
                idTipoMatriculaNew = em.merge(idTipoMatriculaNew);
            }
            if (idCursoOld != null && !idCursoOld.equals(idCursoNew)) {
                idCursoOld.getMatriculaList().remove(matricula);
                idCursoOld = em.merge(idCursoOld);
            }
            if (idCursoNew != null && !idCursoNew.equals(idCursoOld)) {
                idCursoNew.getMatriculaList().add(matricula);
                idCursoNew = em.merge(idCursoNew);
            }
            for (RelMatriDoc relMatriDocListOldRelMatriDoc : relMatriDocListOld) {
                if (!relMatriDocListNew.contains(relMatriDocListOldRelMatriDoc)) {
                    relMatriDocListOldRelMatriDoc.setIdMatricula(null);
                    relMatriDocListOldRelMatriDoc = em.merge(relMatriDocListOldRelMatriDoc);
                }
            }
            for (RelMatriDoc relMatriDocListNewRelMatriDoc : relMatriDocListNew) {
                if (!relMatriDocListOld.contains(relMatriDocListNewRelMatriDoc)) {
                    Matricula oldIdMatriculaOfRelMatriDocListNewRelMatriDoc = relMatriDocListNewRelMatriDoc.getIdMatricula();
                    relMatriDocListNewRelMatriDoc.setIdMatricula(matricula);
                    relMatriDocListNewRelMatriDoc = em.merge(relMatriDocListNewRelMatriDoc);
                    if (oldIdMatriculaOfRelMatriDocListNewRelMatriDoc != null && !oldIdMatriculaOfRelMatriDocListNewRelMatriDoc.equals(matricula)) {
                        oldIdMatriculaOfRelMatriDocListNewRelMatriDoc.getRelMatriDocList().remove(relMatriDocListNewRelMatriDoc);
                        oldIdMatriculaOfRelMatriDocListNewRelMatriDoc = em.merge(oldIdMatriculaOfRelMatriDocListNewRelMatriDoc);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = matricula.getIdMatricula();
                if (findMatricula(id) == null) {
                    throw new NonexistentEntityException("The matricula with id " + id + " no longer exists.");
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
            Matricula matricula;
            try {
                matricula = em.getReference(Matricula.class, id);
                matricula.getIdMatricula();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The matricula with id " + id + " no longer exists.", enfe);
            }
            Estudiantes idEstudiante = matricula.getIdEstudiante();
            if (idEstudiante != null) {
                idEstudiante.getMatriculaList().remove(matricula);
                idEstudiante = em.merge(idEstudiante);
            }
            PeriodoLectivo idPeriodoLectivo = matricula.getIdPeriodoLectivo();
            if (idPeriodoLectivo != null) {
                idPeriodoLectivo.getMatriculaList().remove(matricula);
                idPeriodoLectivo = em.merge(idPeriodoLectivo);
            }
            TipoMatricula idTipoMatricula = matricula.getIdTipoMatricula();
            if (idTipoMatricula != null) {
                idTipoMatricula.getMatriculaList().remove(matricula);
                idTipoMatricula = em.merge(idTipoMatricula);
            }
            RelCursoParalelo idCurso = matricula.getIdCurso();
            if (idCurso != null) {
                idCurso.getMatriculaList().remove(matricula);
                idCurso = em.merge(idCurso);
            }
            List<RelMatriDoc> relMatriDocList = matricula.getRelMatriDocList();
            for (RelMatriDoc relMatriDocListRelMatriDoc : relMatriDocList) {
                relMatriDocListRelMatriDoc.setIdMatricula(null);
                relMatriDocListRelMatriDoc = em.merge(relMatriDocListRelMatriDoc);
            }
            em.remove(matricula);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Matricula> findMatriculaEntities() {
        return findMatriculaEntities(true, -1, -1);
    }

    public List<Matricula> findMatriculaEntities(int maxResults, int firstResult) {
        return findMatriculaEntities(false, maxResults, firstResult);
    }

    private List<Matricula> findMatriculaEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Matricula.class));
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

    public Matricula findMatricula(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Matricula.class, id);
        } finally {
            em.close();
        }
    }

    public int getMatriculaCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Matricula> rt = cq.from(Matricula.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
