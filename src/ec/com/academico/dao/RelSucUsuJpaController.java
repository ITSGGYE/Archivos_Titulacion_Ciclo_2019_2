/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.RelSucUsu;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.Usuarios;
import ec.com.academico.dto.Sucursal;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class RelSucUsuJpaController implements Serializable {

    public RelSucUsuJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(RelSucUsu relSucUsu) {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Usuarios idUsuario = relSucUsu.getIdUsuario();
            if (idUsuario != null) {
                idUsuario = em.getReference(idUsuario.getClass(), idUsuario.getIdUsuario());
                relSucUsu.setIdUsuario(idUsuario);
            }
            Sucursal idSucursal = relSucUsu.getIdSucursal();
            if (idSucursal != null) {
                idSucursal = em.getReference(idSucursal.getClass(), idSucursal.getIdSucursal());
                relSucUsu.setIdSucursal(idSucursal);
            }
            em.persist(relSucUsu);
            if (idUsuario != null) {
                idUsuario.getRelSucUsuList().add(relSucUsu);
                idUsuario = em.merge(idUsuario);
            }
            if (idSucursal != null) {
                idSucursal.getRelSucUsuList().add(relSucUsu);
                idSucursal = em.merge(idSucursal);
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(RelSucUsu relSucUsu) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            RelSucUsu persistentRelSucUsu = em.find(RelSucUsu.class, relSucUsu.getIdRelSucUsu());
            Usuarios idUsuarioOld = persistentRelSucUsu.getIdUsuario();
            Usuarios idUsuarioNew = relSucUsu.getIdUsuario();
            Sucursal idSucursalOld = persistentRelSucUsu.getIdSucursal();
            Sucursal idSucursalNew = relSucUsu.getIdSucursal();
            if (idUsuarioNew != null) {
                idUsuarioNew = em.getReference(idUsuarioNew.getClass(), idUsuarioNew.getIdUsuario());
                relSucUsu.setIdUsuario(idUsuarioNew);
            }
            if (idSucursalNew != null) {
                idSucursalNew = em.getReference(idSucursalNew.getClass(), idSucursalNew.getIdSucursal());
                relSucUsu.setIdSucursal(idSucursalNew);
            }
            relSucUsu = em.merge(relSucUsu);
            if (idUsuarioOld != null && !idUsuarioOld.equals(idUsuarioNew)) {
                idUsuarioOld.getRelSucUsuList().remove(relSucUsu);
                idUsuarioOld = em.merge(idUsuarioOld);
            }
            if (idUsuarioNew != null && !idUsuarioNew.equals(idUsuarioOld)) {
                idUsuarioNew.getRelSucUsuList().add(relSucUsu);
                idUsuarioNew = em.merge(idUsuarioNew);
            }
            if (idSucursalOld != null && !idSucursalOld.equals(idSucursalNew)) {
                idSucursalOld.getRelSucUsuList().remove(relSucUsu);
                idSucursalOld = em.merge(idSucursalOld);
            }
            if (idSucursalNew != null && !idSucursalNew.equals(idSucursalOld)) {
                idSucursalNew.getRelSucUsuList().add(relSucUsu);
                idSucursalNew = em.merge(idSucursalNew);
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = relSucUsu.getIdRelSucUsu();
                if (findRelSucUsu(id) == null) {
                    throw new NonexistentEntityException("The relSucUsu with id " + id + " no longer exists.");
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
            RelSucUsu relSucUsu;
            try {
                relSucUsu = em.getReference(RelSucUsu.class, id);
                relSucUsu.getIdRelSucUsu();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The relSucUsu with id " + id + " no longer exists.", enfe);
            }
            Usuarios idUsuario = relSucUsu.getIdUsuario();
            if (idUsuario != null) {
                idUsuario.getRelSucUsuList().remove(relSucUsu);
                idUsuario = em.merge(idUsuario);
            }
            Sucursal idSucursal = relSucUsu.getIdSucursal();
            if (idSucursal != null) {
                idSucursal.getRelSucUsuList().remove(relSucUsu);
                idSucursal = em.merge(idSucursal);
            }
            em.remove(relSucUsu);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<RelSucUsu> findRelSucUsuEntities() {
        return findRelSucUsuEntities(true, -1, -1);
    }

    public List<RelSucUsu> findRelSucUsuEntities(int maxResults, int firstResult) {
        return findRelSucUsuEntities(false, maxResults, firstResult);
    }

    private List<RelSucUsu> findRelSucUsuEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(RelSucUsu.class));
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

    public RelSucUsu findRelSucUsu(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(RelSucUsu.class, id);
        } finally {
            em.close();
        }
    }

    public int getRelSucUsuCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<RelSucUsu> rt = cq.from(RelSucUsu.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
