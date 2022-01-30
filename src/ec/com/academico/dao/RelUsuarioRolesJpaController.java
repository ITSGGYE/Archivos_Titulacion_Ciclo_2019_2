/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.RelUsuarioRoles;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.Roles;
import ec.com.academico.dto.Usuarios;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RelUsuarioRolesJpaController implements Serializable {

    public RelUsuarioRolesJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(RelUsuarioRoles relUsuarioRoles) {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Roles idRol = relUsuarioRoles.getIdRol();
            if (idRol != null) {
                idRol = em.getReference(idRol.getClass(), idRol.getIdRoles());
                relUsuarioRoles.setIdRol(idRol);
            }
            Usuarios idUsuario = relUsuarioRoles.getIdUsuario();
            if (idUsuario != null) {
                idUsuario = em.getReference(idUsuario.getClass(), idUsuario.getIdUsuario());
                relUsuarioRoles.setIdUsuario(idUsuario);
            }
            em.persist(relUsuarioRoles);
            if (idRol != null) {
                idRol.getRelUsuarioRolesList().add(relUsuarioRoles);
                idRol = em.merge(idRol);
            }
            if (idUsuario != null) {
                idUsuario.getRelUsuarioRolesList().add(relUsuarioRoles);
                idUsuario = em.merge(idUsuario);
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(RelUsuarioRoles relUsuarioRoles) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            RelUsuarioRoles persistentRelUsuarioRoles = em.find(RelUsuarioRoles.class, relUsuarioRoles.getIdUsuRol());
            Roles idRolOld = persistentRelUsuarioRoles.getIdRol();
            Roles idRolNew = relUsuarioRoles.getIdRol();
            Usuarios idUsuarioOld = persistentRelUsuarioRoles.getIdUsuario();
            Usuarios idUsuarioNew = relUsuarioRoles.getIdUsuario();
            if (idRolNew != null) {
                idRolNew = em.getReference(idRolNew.getClass(), idRolNew.getIdRoles());
                relUsuarioRoles.setIdRol(idRolNew);
            }
            if (idUsuarioNew != null) {
                idUsuarioNew = em.getReference(idUsuarioNew.getClass(), idUsuarioNew.getIdUsuario());
                relUsuarioRoles.setIdUsuario(idUsuarioNew);
            }
            relUsuarioRoles = em.merge(relUsuarioRoles);
            if (idRolOld != null && !idRolOld.equals(idRolNew)) {
                idRolOld.getRelUsuarioRolesList().remove(relUsuarioRoles);
                idRolOld = em.merge(idRolOld);
            }
            if (idRolNew != null && !idRolNew.equals(idRolOld)) {
                idRolNew.getRelUsuarioRolesList().add(relUsuarioRoles);
                idRolNew = em.merge(idRolNew);
            }
            if (idUsuarioOld != null && !idUsuarioOld.equals(idUsuarioNew)) {
                idUsuarioOld.getRelUsuarioRolesList().remove(relUsuarioRoles);
                idUsuarioOld = em.merge(idUsuarioOld);
            }
            if (idUsuarioNew != null && !idUsuarioNew.equals(idUsuarioOld)) {
                idUsuarioNew.getRelUsuarioRolesList().add(relUsuarioRoles);
                idUsuarioNew = em.merge(idUsuarioNew);
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = relUsuarioRoles.getIdUsuRol();
                if (findRelUsuarioRoles(id) == null) {
                    throw new NonexistentEntityException("The relUsuarioRoles with id " + id + " no longer exists.");
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
            RelUsuarioRoles relUsuarioRoles;
            try {
                relUsuarioRoles = em.getReference(RelUsuarioRoles.class, id);
                relUsuarioRoles.getIdUsuRol();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The relUsuarioRoles with id " + id + " no longer exists.", enfe);
            }
            Roles idRol = relUsuarioRoles.getIdRol();
            if (idRol != null) {
                idRol.getRelUsuarioRolesList().remove(relUsuarioRoles);
                idRol = em.merge(idRol);
            }
            Usuarios idUsuario = relUsuarioRoles.getIdUsuario();
            if (idUsuario != null) {
                idUsuario.getRelUsuarioRolesList().remove(relUsuarioRoles);
                idUsuario = em.merge(idUsuario);
            }
            em.remove(relUsuarioRoles);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<RelUsuarioRoles> findRelUsuarioRolesEntities() {
        return findRelUsuarioRolesEntities(true, -1, -1);
    }

    public List<RelUsuarioRoles> findRelUsuarioRolesEntities(int maxResults, int firstResult) {
        return findRelUsuarioRolesEntities(false, maxResults, firstResult);
    }

    private List<RelUsuarioRoles> findRelUsuarioRolesEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(RelUsuarioRoles.class));
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

    public RelUsuarioRoles findRelUsuarioRoles(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(RelUsuarioRoles.class, id);
        } finally {
            em.close();
        }
    }

    public int getRelUsuarioRolesCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<RelUsuarioRoles> rt = cq.from(RelUsuarioRoles.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
