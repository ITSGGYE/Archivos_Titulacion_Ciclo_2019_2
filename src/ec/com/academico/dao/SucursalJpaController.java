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
import ec.com.academico.dto.Empresa;
import ec.com.academico.dto.RelSucUsu;
import ec.com.academico.dto.Sucursal;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class SucursalJpaController implements Serializable {

    public SucursalJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Sucursal sucursal) {
        if (sucursal.getRelSucUsuList() == null) {
            sucursal.setRelSucUsuList(new ArrayList<RelSucUsu>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Empresa idEmpresa = sucursal.getIdEmpresa();
            if (idEmpresa != null) {
                idEmpresa = em.getReference(idEmpresa.getClass(), idEmpresa.getIdEmpresa());
                sucursal.setIdEmpresa(idEmpresa);
            }
            List<RelSucUsu> attachedRelSucUsuList = new ArrayList<RelSucUsu>();
            for (RelSucUsu relSucUsuListRelSucUsuToAttach : sucursal.getRelSucUsuList()) {
                relSucUsuListRelSucUsuToAttach = em.getReference(relSucUsuListRelSucUsuToAttach.getClass(), relSucUsuListRelSucUsuToAttach.getIdRelSucUsu());
                attachedRelSucUsuList.add(relSucUsuListRelSucUsuToAttach);
            }
            sucursal.setRelSucUsuList(attachedRelSucUsuList);
            em.persist(sucursal);
            if (idEmpresa != null) {
                idEmpresa.getSucursalList().add(sucursal);
                idEmpresa = em.merge(idEmpresa);
            }
            for (RelSucUsu relSucUsuListRelSucUsu : sucursal.getRelSucUsuList()) {
                Sucursal oldIdSucursalOfRelSucUsuListRelSucUsu = relSucUsuListRelSucUsu.getIdSucursal();
                relSucUsuListRelSucUsu.setIdSucursal(sucursal);
                relSucUsuListRelSucUsu = em.merge(relSucUsuListRelSucUsu);
                if (oldIdSucursalOfRelSucUsuListRelSucUsu != null) {
                    oldIdSucursalOfRelSucUsuListRelSucUsu.getRelSucUsuList().remove(relSucUsuListRelSucUsu);
                    oldIdSucursalOfRelSucUsuListRelSucUsu = em.merge(oldIdSucursalOfRelSucUsuListRelSucUsu);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Sucursal sucursal) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Sucursal persistentSucursal = em.find(Sucursal.class, sucursal.getIdSucursal());
            Empresa idEmpresaOld = persistentSucursal.getIdEmpresa();
            Empresa idEmpresaNew = sucursal.getIdEmpresa();
            List<RelSucUsu> relSucUsuListOld = persistentSucursal.getRelSucUsuList();
            List<RelSucUsu> relSucUsuListNew = sucursal.getRelSucUsuList();
            if (idEmpresaNew != null) {
                idEmpresaNew = em.getReference(idEmpresaNew.getClass(), idEmpresaNew.getIdEmpresa());
                sucursal.setIdEmpresa(idEmpresaNew);
            }
            List<RelSucUsu> attachedRelSucUsuListNew = new ArrayList<RelSucUsu>();
            for (RelSucUsu relSucUsuListNewRelSucUsuToAttach : relSucUsuListNew) {
                relSucUsuListNewRelSucUsuToAttach = em.getReference(relSucUsuListNewRelSucUsuToAttach.getClass(), relSucUsuListNewRelSucUsuToAttach.getIdRelSucUsu());
                attachedRelSucUsuListNew.add(relSucUsuListNewRelSucUsuToAttach);
            }
            relSucUsuListNew = attachedRelSucUsuListNew;
            sucursal.setRelSucUsuList(relSucUsuListNew);
            sucursal = em.merge(sucursal);
            if (idEmpresaOld != null && !idEmpresaOld.equals(idEmpresaNew)) {
                idEmpresaOld.getSucursalList().remove(sucursal);
                idEmpresaOld = em.merge(idEmpresaOld);
            }
            if (idEmpresaNew != null && !idEmpresaNew.equals(idEmpresaOld)) {
                idEmpresaNew.getSucursalList().add(sucursal);
                idEmpresaNew = em.merge(idEmpresaNew);
            }
            for (RelSucUsu relSucUsuListOldRelSucUsu : relSucUsuListOld) {
                if (!relSucUsuListNew.contains(relSucUsuListOldRelSucUsu)) {
                    relSucUsuListOldRelSucUsu.setIdSucursal(null);
                    relSucUsuListOldRelSucUsu = em.merge(relSucUsuListOldRelSucUsu);
                }
            }
            for (RelSucUsu relSucUsuListNewRelSucUsu : relSucUsuListNew) {
                if (!relSucUsuListOld.contains(relSucUsuListNewRelSucUsu)) {
                    Sucursal oldIdSucursalOfRelSucUsuListNewRelSucUsu = relSucUsuListNewRelSucUsu.getIdSucursal();
                    relSucUsuListNewRelSucUsu.setIdSucursal(sucursal);
                    relSucUsuListNewRelSucUsu = em.merge(relSucUsuListNewRelSucUsu);
                    if (oldIdSucursalOfRelSucUsuListNewRelSucUsu != null && !oldIdSucursalOfRelSucUsuListNewRelSucUsu.equals(sucursal)) {
                        oldIdSucursalOfRelSucUsuListNewRelSucUsu.getRelSucUsuList().remove(relSucUsuListNewRelSucUsu);
                        oldIdSucursalOfRelSucUsuListNewRelSucUsu = em.merge(oldIdSucursalOfRelSucUsuListNewRelSucUsu);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = sucursal.getIdSucursal();
                if (findSucursal(id) == null) {
                    throw new NonexistentEntityException("The sucursal with id " + id + " no longer exists.");
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
            Sucursal sucursal;
            try {
                sucursal = em.getReference(Sucursal.class, id);
                sucursal.getIdSucursal();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The sucursal with id " + id + " no longer exists.", enfe);
            }
            Empresa idEmpresa = sucursal.getIdEmpresa();
            if (idEmpresa != null) {
                idEmpresa.getSucursalList().remove(sucursal);
                idEmpresa = em.merge(idEmpresa);
            }
            List<RelSucUsu> relSucUsuList = sucursal.getRelSucUsuList();
            for (RelSucUsu relSucUsuListRelSucUsu : relSucUsuList) {
                relSucUsuListRelSucUsu.setIdSucursal(null);
                relSucUsuListRelSucUsu = em.merge(relSucUsuListRelSucUsu);
            }
            em.remove(sucursal);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Sucursal> findSucursalEntities() {
        return findSucursalEntities(true, -1, -1);
    }

    public List<Sucursal> findSucursalEntities(int maxResults, int firstResult) {
        return findSucursalEntities(false, maxResults, firstResult);
    }

    private List<Sucursal> findSucursalEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Sucursal.class));
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

    public Sucursal findSucursal(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Sucursal.class, id);
        } finally {
            em.close();
        }
    }

    public int getSucursalCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Sucursal> rt = cq.from(Sucursal.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
