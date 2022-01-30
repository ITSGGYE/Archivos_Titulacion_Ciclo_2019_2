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
import ec.com.academico.dto.RelSucUsu;
import java.util.ArrayList;
import java.util.List;
import ec.com.academico.dto.RelUsuarioRoles;
import ec.com.academico.dto.Usuarios;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class UsuariosJpaController implements Serializable {

    public UsuariosJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Usuarios usuarios) {
        if (usuarios.getRelSucUsuList() == null) {
            usuarios.setRelSucUsuList(new ArrayList<RelSucUsu>());
        }
        if (usuarios.getRelUsuarioRolesList() == null) {
            usuarios.setRelUsuarioRolesList(new ArrayList<RelUsuarioRoles>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<RelSucUsu> attachedRelSucUsuList = new ArrayList<RelSucUsu>();
            for (RelSucUsu relSucUsuListRelSucUsuToAttach : usuarios.getRelSucUsuList()) {
                relSucUsuListRelSucUsuToAttach = em.getReference(relSucUsuListRelSucUsuToAttach.getClass(), relSucUsuListRelSucUsuToAttach.getIdRelSucUsu());
                attachedRelSucUsuList.add(relSucUsuListRelSucUsuToAttach);
            }
            usuarios.setRelSucUsuList(attachedRelSucUsuList);
            List<RelUsuarioRoles> attachedRelUsuarioRolesList = new ArrayList<RelUsuarioRoles>();
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRolesToAttach : usuarios.getRelUsuarioRolesList()) {
                relUsuarioRolesListRelUsuarioRolesToAttach = em.getReference(relUsuarioRolesListRelUsuarioRolesToAttach.getClass(), relUsuarioRolesListRelUsuarioRolesToAttach.getIdUsuRol());
                attachedRelUsuarioRolesList.add(relUsuarioRolesListRelUsuarioRolesToAttach);
            }
            usuarios.setRelUsuarioRolesList(attachedRelUsuarioRolesList);
            em.persist(usuarios);
            for (RelSucUsu relSucUsuListRelSucUsu : usuarios.getRelSucUsuList()) {
                Usuarios oldIdUsuarioOfRelSucUsuListRelSucUsu = relSucUsuListRelSucUsu.getIdUsuario();
                relSucUsuListRelSucUsu.setIdUsuario(usuarios);
                relSucUsuListRelSucUsu = em.merge(relSucUsuListRelSucUsu);
                if (oldIdUsuarioOfRelSucUsuListRelSucUsu != null) {
                    oldIdUsuarioOfRelSucUsuListRelSucUsu.getRelSucUsuList().remove(relSucUsuListRelSucUsu);
                    oldIdUsuarioOfRelSucUsuListRelSucUsu = em.merge(oldIdUsuarioOfRelSucUsuListRelSucUsu);
                }
            }
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRoles : usuarios.getRelUsuarioRolesList()) {
                Usuarios oldIdUsuarioOfRelUsuarioRolesListRelUsuarioRoles = relUsuarioRolesListRelUsuarioRoles.getIdUsuario();
                relUsuarioRolesListRelUsuarioRoles.setIdUsuario(usuarios);
                relUsuarioRolesListRelUsuarioRoles = em.merge(relUsuarioRolesListRelUsuarioRoles);
                if (oldIdUsuarioOfRelUsuarioRolesListRelUsuarioRoles != null) {
                    oldIdUsuarioOfRelUsuarioRolesListRelUsuarioRoles.getRelUsuarioRolesList().remove(relUsuarioRolesListRelUsuarioRoles);
                    oldIdUsuarioOfRelUsuarioRolesListRelUsuarioRoles = em.merge(oldIdUsuarioOfRelUsuarioRolesListRelUsuarioRoles);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Usuarios usuarios) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Usuarios persistentUsuarios = em.find(Usuarios.class, usuarios.getIdUsuario());
            List<RelSucUsu> relSucUsuListOld = persistentUsuarios.getRelSucUsuList();
            List<RelSucUsu> relSucUsuListNew = usuarios.getRelSucUsuList();
            List<RelUsuarioRoles> relUsuarioRolesListOld = persistentUsuarios.getRelUsuarioRolesList();
            List<RelUsuarioRoles> relUsuarioRolesListNew = usuarios.getRelUsuarioRolesList();
            List<RelSucUsu> attachedRelSucUsuListNew = new ArrayList<RelSucUsu>();
            for (RelSucUsu relSucUsuListNewRelSucUsuToAttach : relSucUsuListNew) {
                relSucUsuListNewRelSucUsuToAttach = em.getReference(relSucUsuListNewRelSucUsuToAttach.getClass(), relSucUsuListNewRelSucUsuToAttach.getIdRelSucUsu());
                attachedRelSucUsuListNew.add(relSucUsuListNewRelSucUsuToAttach);
            }
            relSucUsuListNew = attachedRelSucUsuListNew;
            usuarios.setRelSucUsuList(relSucUsuListNew);
            List<RelUsuarioRoles> attachedRelUsuarioRolesListNew = new ArrayList<RelUsuarioRoles>();
            for (RelUsuarioRoles relUsuarioRolesListNewRelUsuarioRolesToAttach : relUsuarioRolesListNew) {
                relUsuarioRolesListNewRelUsuarioRolesToAttach = em.getReference(relUsuarioRolesListNewRelUsuarioRolesToAttach.getClass(), relUsuarioRolesListNewRelUsuarioRolesToAttach.getIdUsuRol());
                attachedRelUsuarioRolesListNew.add(relUsuarioRolesListNewRelUsuarioRolesToAttach);
            }
            relUsuarioRolesListNew = attachedRelUsuarioRolesListNew;
            usuarios.setRelUsuarioRolesList(relUsuarioRolesListNew);
            usuarios = em.merge(usuarios);
            for (RelSucUsu relSucUsuListOldRelSucUsu : relSucUsuListOld) {
                if (!relSucUsuListNew.contains(relSucUsuListOldRelSucUsu)) {
                    relSucUsuListOldRelSucUsu.setIdUsuario(null);
                    relSucUsuListOldRelSucUsu = em.merge(relSucUsuListOldRelSucUsu);
                }
            }
            for (RelSucUsu relSucUsuListNewRelSucUsu : relSucUsuListNew) {
                if (!relSucUsuListOld.contains(relSucUsuListNewRelSucUsu)) {
                    Usuarios oldIdUsuarioOfRelSucUsuListNewRelSucUsu = relSucUsuListNewRelSucUsu.getIdUsuario();
                    relSucUsuListNewRelSucUsu.setIdUsuario(usuarios);
                    relSucUsuListNewRelSucUsu = em.merge(relSucUsuListNewRelSucUsu);
                    if (oldIdUsuarioOfRelSucUsuListNewRelSucUsu != null && !oldIdUsuarioOfRelSucUsuListNewRelSucUsu.equals(usuarios)) {
                        oldIdUsuarioOfRelSucUsuListNewRelSucUsu.getRelSucUsuList().remove(relSucUsuListNewRelSucUsu);
                        oldIdUsuarioOfRelSucUsuListNewRelSucUsu = em.merge(oldIdUsuarioOfRelSucUsuListNewRelSucUsu);
                    }
                }
            }
            for (RelUsuarioRoles relUsuarioRolesListOldRelUsuarioRoles : relUsuarioRolesListOld) {
                if (!relUsuarioRolesListNew.contains(relUsuarioRolesListOldRelUsuarioRoles)) {
                    relUsuarioRolesListOldRelUsuarioRoles.setIdUsuario(null);
                    relUsuarioRolesListOldRelUsuarioRoles = em.merge(relUsuarioRolesListOldRelUsuarioRoles);
                }
            }
            for (RelUsuarioRoles relUsuarioRolesListNewRelUsuarioRoles : relUsuarioRolesListNew) {
                if (!relUsuarioRolesListOld.contains(relUsuarioRolesListNewRelUsuarioRoles)) {
                    Usuarios oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles = relUsuarioRolesListNewRelUsuarioRoles.getIdUsuario();
                    relUsuarioRolesListNewRelUsuarioRoles.setIdUsuario(usuarios);
                    relUsuarioRolesListNewRelUsuarioRoles = em.merge(relUsuarioRolesListNewRelUsuarioRoles);
                    if (oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles != null && !oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles.equals(usuarios)) {
                        oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles.getRelUsuarioRolesList().remove(relUsuarioRolesListNewRelUsuarioRoles);
                        oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles = em.merge(oldIdUsuarioOfRelUsuarioRolesListNewRelUsuarioRoles);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = usuarios.getIdUsuario();
                if (findUsuarios(id) == null) {
                    throw new NonexistentEntityException("The usuarios with id " + id + " no longer exists.");
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
            Usuarios usuarios;
            try {
                usuarios = em.getReference(Usuarios.class, id);
                usuarios.getIdUsuario();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The usuarios with id " + id + " no longer exists.", enfe);
            }
            List<RelSucUsu> relSucUsuList = usuarios.getRelSucUsuList();
            for (RelSucUsu relSucUsuListRelSucUsu : relSucUsuList) {
                relSucUsuListRelSucUsu.setIdUsuario(null);
                relSucUsuListRelSucUsu = em.merge(relSucUsuListRelSucUsu);
            }
            List<RelUsuarioRoles> relUsuarioRolesList = usuarios.getRelUsuarioRolesList();
            for (RelUsuarioRoles relUsuarioRolesListRelUsuarioRoles : relUsuarioRolesList) {
                relUsuarioRolesListRelUsuarioRoles.setIdUsuario(null);
                relUsuarioRolesListRelUsuarioRoles = em.merge(relUsuarioRolesListRelUsuarioRoles);
            }
            em.remove(usuarios);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Usuarios> findUsuariosEntities() {
        return findUsuariosEntities(true, -1, -1);
    }

    public List<Usuarios> findUsuariosEntities(int maxResults, int firstResult) {
        return findUsuariosEntities(false, maxResults, firstResult);
    }

    private List<Usuarios> findUsuariosEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Usuarios.class));
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

    public Usuarios findUsuarios(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Usuarios.class, id);
        } finally {
            em.close();
        }
    }

    public int getUsuariosCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Usuarios> rt = cq.from(Usuarios.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
