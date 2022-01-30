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
import ec.com.academico.dto.RelUsuarioRoles;
import ec.com.academico.dto.Roles;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RolesJpaController implements Serializable {

    public RolesJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Roles roles) {
        if (roles.getRelUsuarioRolesList() == null) {
            roles.setRelUsuarioRolesList(new ArrayList<RelUsuarioRoles>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<RelUsuarioRoles> attachedRelUsuarioRolesList = new ArrayList<RelUsuarioRoles>();
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRolesToAttach : roles.getRelUsuarioRolesList()) {
                relUsuarioRolesListRelUsuarioRolesToAttach = em.getReference(relUsuarioRolesListRelUsuarioRolesToAttach.getClass(), relUsuarioRolesListRelUsuarioRolesToAttach.getIdUsuRol());
                attachedRelUsuarioRolesList.add(relUsuarioRolesListRelUsuarioRolesToAttach);
            }
            roles.setRelUsuarioRolesList(attachedRelUsuarioRolesList);
            em.persist(roles);
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRoles : roles.getRelUsuarioRolesList()) {
                Roles oldIdRolOfRelUsuarioRolesListRelUsuarioRoles = relUsuarioRolesListRelUsuarioRoles.getIdRol();
                relUsuarioRolesListRelUsuarioRoles.setIdRol(roles);
                relUsuarioRolesListRelUsuarioRoles = em.merge(relUsuarioRolesListRelUsuarioRoles);
                if (oldIdRolOfRelUsuarioRolesListRelUsuarioRoles != null) {
                    oldIdRolOfRelUsuarioRolesListRelUsuarioRoles.getRelUsuarioRolesList().remove(relUsuarioRolesListRelUsuarioRoles);
                    oldIdRolOfRelUsuarioRolesListRelUsuarioRoles = em.merge(oldIdRolOfRelUsuarioRolesListRelUsuarioRoles);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Roles roles) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Roles persistentRoles = em.find(Roles.class, roles.getIdRoles());
            List<RelUsuarioRoles> relUsuarioRolesListOld = persistentRoles.getRelUsuarioRolesList();
            List<RelUsuarioRoles> relUsuarioRolesListNew = roles.getRelUsuarioRolesList();
            List<RelUsuarioRoles> attachedRelUsuarioRolesListNew = new ArrayList<RelUsuarioRoles>();
            for (RelUsuarioRoles relUsuarioRolesListNewRelUsuarioRolesToAttach : relUsuarioRolesListNew) {
                relUsuarioRolesListNewRelUsuarioRolesToAttach = em.getReference(relUsuarioRolesListNewRelUsuarioRolesToAttach.getClass(), relUsuarioRolesListNewRelUsuarioRolesToAttach.getIdUsuRol());
                attachedRelUsuarioRolesListNew.add(relUsuarioRolesListNewRelUsuarioRolesToAttach);
            }
            relUsuarioRolesListNew = attachedRelUsuarioRolesListNew;
            roles.setRelUsuarioRolesList(relUsuarioRolesListNew);
            roles = em.merge(roles);
            for (RelUsuarioRoles relUsuarioRolesListOldRelUsuarioRoles : relUsuarioRolesListOld) {
                if (!relUsuarioRolesListNew.contains(relUsuarioRolesListOldRelUsuarioRoles)) {
                    relUsuarioRolesListOldRelUsuarioRoles.setIdRol(null);
                    relUsuarioRolesListOldRelUsuarioRoles = em.merge(relUsuarioRolesListOldRelUsuarioRoles);
                }
            }
            for (RelUsuarioRoles relUsuarioRolesListNewRelUsuarioRoles : relUsuarioRolesListNew) {
                if (!relUsuarioRolesListOld.contains(relUsuarioRolesListNewRelUsuarioRoles)) {
                    Roles oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles = relUsuarioRolesListNewRelUsuarioRoles.getIdRol();
                    relUsuarioRolesListNewRelUsuarioRoles.setIdRol(roles);
                    relUsuarioRolesListNewRelUsuarioRoles = em.merge(relUsuarioRolesListNewRelUsuarioRoles);
                    if (oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles != null && !oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles.equals(roles)) {
                        oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles.getRelUsuarioRolesList().remove(relUsuarioRolesListNewRelUsuarioRoles);
                        oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles = em.merge(oldIdRolOfRelUsuarioRolesListNewRelUsuarioRoles);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = roles.getIdRoles();
                if (findRoles(id) == null) {
                    throw new NonexistentEntityException("The roles with id " + id + " no longer exists.");
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
            Roles roles;
            try {
                roles = em.getReference(Roles.class, id);
                roles.getIdRoles();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The roles with id " + id + " no longer exists.", enfe);
            }
            List<RelUsuarioRoles> relUsuarioRolesList = roles.getRelUsuarioRolesList();
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRoles : relUsuarioRolesList) {
                relUsuarioRolesListRelUsuarioRoles.setIdRol(null);
                relUsuarioRolesListRelUsuarioRoles = em.merge(relUsuarioRolesListRelUsuarioRoles);
            }
            em.remove(roles);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Roles> findRolesEntities() {
        return findRolesEntities(true, -1, -1);
    }

    public List<Roles> findRolesEntities(int maxResults, int firstResult) {
        return findRolesEntities(false, maxResults, firstResult);
    }

    private List<Roles> findRolesEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Roles.class));
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

    public Roles findRoles(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Roles.class, id);
        } finally {
            em.close();
        }
    }

    public int getRolesCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Roles> rt = cq.from(Roles.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
