/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Estudiantes;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.Representante;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.SeContactoEstudiante;
import java.util.ArrayList;
import java.util.List;
import ec.com.academico.dto.Matricula;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class EstudiantesJpaController implements Serializable {

    public EstudiantesJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Estudiantes estudiantes) {
        if (estudiantes.getSeContactoEstudianteList() == null) {
            estudiantes.setSeContactoEstudianteList(new ArrayList<SeContactoEstudiante>());
        }
        if (estudiantes.getMatriculaList() == null) {
            estudiantes.setMatriculaList(new ArrayList<Matricula>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Representante idRepresentante = estudiantes.getIdRepresentante();
            if (idRepresentante != null) {
                idRepresentante = em.getReference(idRepresentante.getClass(), idRepresentante.getIdRepresentante());
                estudiantes.setIdRepresentante(idRepresentante);
            }
            Parentesco idParentesco = estudiantes.getIdParentesco();
            if (idParentesco != null) {
                idParentesco = em.getReference(idParentesco.getClass(), idParentesco.getIdParentesco());
                estudiantes.setIdParentesco(idParentesco);
            }
            List<SeContactoEstudiante> attachedSeContactoEstudianteList = new ArrayList<SeContactoEstudiante>();
            for (SeContactoEstudiante seContactoEstudianteListSeContactoEstudianteToAttach : estudiantes.getSeContactoEstudianteList()) {
                seContactoEstudianteListSeContactoEstudianteToAttach = em.getReference(seContactoEstudianteListSeContactoEstudianteToAttach.getClass(), seContactoEstudianteListSeContactoEstudianteToAttach.getIdContactoEstudiante());
                attachedSeContactoEstudianteList.add(seContactoEstudianteListSeContactoEstudianteToAttach);
            }
            estudiantes.setSeContactoEstudianteList(attachedSeContactoEstudianteList);
            List<Matricula> attachedMatriculaList = new ArrayList<Matricula>();
            for (Matricula matriculaListMatriculaToAttach : estudiantes.getMatriculaList()) {
                matriculaListMatriculaToAttach = em.getReference(matriculaListMatriculaToAttach.getClass(), matriculaListMatriculaToAttach.getIdMatricula());
                attachedMatriculaList.add(matriculaListMatriculaToAttach);
            }
            estudiantes.setMatriculaList(attachedMatriculaList);
            em.persist(estudiantes);
            if (idRepresentante != null) {
                idRepresentante.getEstudiantesList().add(estudiantes);
                idRepresentante = em.merge(idRepresentante);
            }
            if (idParentesco != null) {
                idParentesco.getEstudiantesList().add(estudiantes);
                idParentesco = em.merge(idParentesco);
            }
            for (SeContactoEstudiante seContactoEstudianteListSeContactoEstudiante : estudiantes.getSeContactoEstudianteList()) {
                Estudiantes oldIdEstudianteOfSeContactoEstudianteListSeContactoEstudiante = seContactoEstudianteListSeContactoEstudiante.getIdEstudiante();
                seContactoEstudianteListSeContactoEstudiante.setIdEstudiante(estudiantes);
                seContactoEstudianteListSeContactoEstudiante = em.merge(seContactoEstudianteListSeContactoEstudiante);
                if (oldIdEstudianteOfSeContactoEstudianteListSeContactoEstudiante != null) {
                    oldIdEstudianteOfSeContactoEstudianteListSeContactoEstudiante.getSeContactoEstudianteList().remove(seContactoEstudianteListSeContactoEstudiante);
                    oldIdEstudianteOfSeContactoEstudianteListSeContactoEstudiante = em.merge(oldIdEstudianteOfSeContactoEstudianteListSeContactoEstudiante);
                }
            }
            for (Matricula matriculaListMatricula : estudiantes.getMatriculaList()) {
                Estudiantes oldIdEstudianteOfMatriculaListMatricula = matriculaListMatricula.getIdEstudiante();
                matriculaListMatricula.setIdEstudiante(estudiantes);
                matriculaListMatricula = em.merge(matriculaListMatricula);
                if (oldIdEstudianteOfMatriculaListMatricula != null) {
                    oldIdEstudianteOfMatriculaListMatricula.getMatriculaList().remove(matriculaListMatricula);
                    oldIdEstudianteOfMatriculaListMatricula = em.merge(oldIdEstudianteOfMatriculaListMatricula);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Estudiantes estudiantes) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Estudiantes persistentEstudiantes = em.find(Estudiantes.class, estudiantes.getIdEstudiantes());
            Representante idRepresentanteOld = persistentEstudiantes.getIdRepresentante();
            Representante idRepresentanteNew = estudiantes.getIdRepresentante();
            Parentesco idParentescoOld = persistentEstudiantes.getIdParentesco();
            Parentesco idParentescoNew = estudiantes.getIdParentesco();
            List<SeContactoEstudiante> seContactoEstudianteListOld = persistentEstudiantes.getSeContactoEstudianteList();
            List<SeContactoEstudiante> seContactoEstudianteListNew = estudiantes.getSeContactoEstudianteList();
            List<Matricula> matriculaListOld = persistentEstudiantes.getMatriculaList();
            List<Matricula> matriculaListNew = estudiantes.getMatriculaList();
            if (idRepresentanteNew != null) {
                idRepresentanteNew = em.getReference(idRepresentanteNew.getClass(), idRepresentanteNew.getIdRepresentante());
                estudiantes.setIdRepresentante(idRepresentanteNew);
            }
            if (idParentescoNew != null) {
                idParentescoNew = em.getReference(idParentescoNew.getClass(), idParentescoNew.getIdParentesco());
                estudiantes.setIdParentesco(idParentescoNew);
            }
            List<SeContactoEstudiante> attachedSeContactoEstudianteListNew = new ArrayList<SeContactoEstudiante>();
            for (SeContactoEstudiante seContactoEstudianteListNewSeContactoEstudianteToAttach : seContactoEstudianteListNew) {
                seContactoEstudianteListNewSeContactoEstudianteToAttach = em.getReference(seContactoEstudianteListNewSeContactoEstudianteToAttach.getClass(), seContactoEstudianteListNewSeContactoEstudianteToAttach.getIdContactoEstudiante());
                attachedSeContactoEstudianteListNew.add(seContactoEstudianteListNewSeContactoEstudianteToAttach);
            }
            seContactoEstudianteListNew = attachedSeContactoEstudianteListNew;
            estudiantes.setSeContactoEstudianteList(seContactoEstudianteListNew);
            List<Matricula> attachedMatriculaListNew = new ArrayList<Matricula>();
            for (Matricula matriculaListNewMatriculaToAttach : matriculaListNew) {
                matriculaListNewMatriculaToAttach = em.getReference(matriculaListNewMatriculaToAttach.getClass(), matriculaListNewMatriculaToAttach.getIdMatricula());
                attachedMatriculaListNew.add(matriculaListNewMatriculaToAttach);
            }
            matriculaListNew = attachedMatriculaListNew;
            estudiantes.setMatriculaList(matriculaListNew);
            estudiantes = em.merge(estudiantes);
            if (idRepresentanteOld != null && !idRepresentanteOld.equals(idRepresentanteNew)) {
                idRepresentanteOld.getEstudiantesList().remove(estudiantes);
                idRepresentanteOld = em.merge(idRepresentanteOld);
            }
            if (idRepresentanteNew != null && !idRepresentanteNew.equals(idRepresentanteOld)) {
                idRepresentanteNew.getEstudiantesList().add(estudiantes);
                idRepresentanteNew = em.merge(idRepresentanteNew);
            }
            if (idParentescoOld != null && !idParentescoOld.equals(idParentescoNew)) {
                idParentescoOld.getEstudiantesList().remove(estudiantes);
                idParentescoOld = em.merge(idParentescoOld);
            }
            if (idParentescoNew != null && !idParentescoNew.equals(idParentescoOld)) {
                idParentescoNew.getEstudiantesList().add(estudiantes);
                idParentescoNew = em.merge(idParentescoNew);
            }
            for (SeContactoEstudiante seContactoEstudianteListOldSeContactoEstudiante : seContactoEstudianteListOld) {
                if (!seContactoEstudianteListNew.contains(seContactoEstudianteListOldSeContactoEstudiante)) {
                    seContactoEstudianteListOldSeContactoEstudiante.setIdEstudiante(null);
                    seContactoEstudianteListOldSeContactoEstudiante = em.merge(seContactoEstudianteListOldSeContactoEstudiante);
                }
            }
            for (SeContactoEstudiante seContactoEstudianteListNewSeContactoEstudiante : seContactoEstudianteListNew) {
                if (!seContactoEstudianteListOld.contains(seContactoEstudianteListNewSeContactoEstudiante)) {
                    Estudiantes oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante = seContactoEstudianteListNewSeContactoEstudiante.getIdEstudiante();
                    seContactoEstudianteListNewSeContactoEstudiante.setIdEstudiante(estudiantes);
                    seContactoEstudianteListNewSeContactoEstudiante = em.merge(seContactoEstudianteListNewSeContactoEstudiante);
                    if (oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante != null && !oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante.equals(estudiantes)) {
                        oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante.getSeContactoEstudianteList().remove(seContactoEstudianteListNewSeContactoEstudiante);
                        oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante = em.merge(oldIdEstudianteOfSeContactoEstudianteListNewSeContactoEstudiante);
                    }
                }
            }
            for (Matricula matriculaListOldMatricula : matriculaListOld) {
                if (!matriculaListNew.contains(matriculaListOldMatricula)) {
                    matriculaListOldMatricula.setIdEstudiante(null);
                    matriculaListOldMatricula = em.merge(matriculaListOldMatricula);
                }
            }
            for (Matricula matriculaListNewMatricula : matriculaListNew) {
                if (!matriculaListOld.contains(matriculaListNewMatricula)) {
                    Estudiantes oldIdEstudianteOfMatriculaListNewMatricula = matriculaListNewMatricula.getIdEstudiante();
                    matriculaListNewMatricula.setIdEstudiante(estudiantes);
                    matriculaListNewMatricula = em.merge(matriculaListNewMatricula);
                    if (oldIdEstudianteOfMatriculaListNewMatricula != null && !oldIdEstudianteOfMatriculaListNewMatricula.equals(estudiantes)) {
                        oldIdEstudianteOfMatriculaListNewMatricula.getMatriculaList().remove(matriculaListNewMatricula);
                        oldIdEstudianteOfMatriculaListNewMatricula = em.merge(oldIdEstudianteOfMatriculaListNewMatricula);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = estudiantes.getIdEstudiantes();
                if (findEstudiantes(id) == null) {
                    throw new NonexistentEntityException("The estudiantes with id " + id + " no longer exists.");
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
            Estudiantes estudiantes;
            try {
                estudiantes = em.getReference(Estudiantes.class, id);
                estudiantes.getIdEstudiantes();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The estudiantes with id " + id + " no longer exists.", enfe);
            }
            Representante idRepresentante = estudiantes.getIdRepresentante();
            if (idRepresentante != null) {
                idRepresentante.getEstudiantesList().remove(estudiantes);
                idRepresentante = em.merge(idRepresentante);
            }
            Parentesco idParentesco = estudiantes.getIdParentesco();
            if (idParentesco != null) {
                idParentesco.getEstudiantesList().remove(estudiantes);
                idParentesco = em.merge(idParentesco);
            }
            List<SeContactoEstudiante> seContactoEstudianteList = estudiantes.getSeContactoEstudianteList();
            for (SeContactoEstudiante seContactoEstudianteListSeContactoEstudiante : seContactoEstudianteList) {
                seContactoEstudianteListSeContactoEstudiante.setIdEstudiante(null);
                seContactoEstudianteListSeContactoEstudiante = em.merge(seContactoEstudianteListSeContactoEstudiante);
            }
            List<Matricula> matriculaList = estudiantes.getMatriculaList();
            for (Matricula matriculaListMatricula : matriculaList) {
                matriculaListMatricula.setIdEstudiante(null);
                matriculaListMatricula = em.merge(matriculaListMatricula);
            }
            em.remove(estudiantes);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Estudiantes> findEstudiantesEntities() {
        return findEstudiantesEntities(true, -1, -1);
    }

    public List<Estudiantes> findEstudiantesEntities(int maxResults, int firstResult) {
        return findEstudiantesEntities(false, maxResults, firstResult);
    }

    private List<Estudiantes> findEstudiantesEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Estudiantes.class));
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

    public Estudiantes findEstudiantes(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Estudiantes.class, id);
        } finally {
            em.close();
        }
    }

    public int getEstudiantesCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Estudiantes> rt = cq.from(Estudiantes.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
