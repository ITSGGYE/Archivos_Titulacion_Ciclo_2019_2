/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao;

import ec.com.academico.dao.exceptions.NonexistentEntityException;
import ec.com.academico.dto.Empresa;
import java.io.Serializable;
import javax.persistence.Query;
import javax.persistence.EntityNotFoundException;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;
import ec.com.academico.dto.Sucursal;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class EmpresaJpaController implements Serializable {

    public EmpresaJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(Empresa empresa) {
        if (empresa.getSucursalList() == null) {
            empresa.setSucursalList(new ArrayList<Sucursal>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            List<Sucursal> attachedSucursalList = new ArrayList<Sucursal>();
            for (Sucursal sucursalListSucursalToAttach : empresa.getSucursalList()) {
                sucursalListSucursalToAttach = em.getReference(sucursalListSucursalToAttach.getClass(), sucursalListSucursalToAttach.getIdSucursal());
                attachedSucursalList.add(sucursalListSucursalToAttach);
            }
            empresa.setSucursalList(attachedSucursalList);
            em.persist(empresa);
            for (Sucursal sucursalListSucursal : empresa.getSucursalList()) {
                Empresa oldIdEmpresaOfSucursalListSucursal = sucursalListSucursal.getIdEmpresa();
                sucursalListSucursal.setIdEmpresa(empresa);
                sucursalListSucursal = em.merge(sucursalListSucursal);
                if (oldIdEmpresaOfSucursalListSucursal != null) {
                    oldIdEmpresaOfSucursalListSucursal.getSucursalList().remove(sucursalListSucursal);
                    oldIdEmpresaOfSucursalListSucursal = em.merge(oldIdEmpresaOfSucursalListSucursal);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(Empresa empresa) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            Empresa persistentEmpresa = em.find(Empresa.class, empresa.getIdEmpresa());
            List<Sucursal> sucursalListOld = persistentEmpresa.getSucursalList();
            List<Sucursal> sucursalListNew = empresa.getSucursalList();
            List<Sucursal> attachedSucursalListNew = new ArrayList<Sucursal>();
            for (Sucursal sucursalListNewSucursalToAttach : sucursalListNew) {
                sucursalListNewSucursalToAttach = em.getReference(sucursalListNewSucursalToAttach.getClass(), sucursalListNewSucursalToAttach.getIdSucursal());
                attachedSucursalListNew.add(sucursalListNewSucursalToAttach);
            }
            sucursalListNew = attachedSucursalListNew;
            empresa.setSucursalList(sucursalListNew);
            empresa = em.merge(empresa);
            for (Sucursal sucursalListOldSucursal : sucursalListOld) {
                if (!sucursalListNew.contains(sucursalListOldSucursal)) {
                    sucursalListOldSucursal.setIdEmpresa(null);
                    sucursalListOldSucursal = em.merge(sucursalListOldSucursal);
                }
            }
            for (Sucursal sucursalListNewSucursal : sucursalListNew) {
                if (!sucursalListOld.contains(sucursalListNewSucursal)) {
                    Empresa oldIdEmpresaOfSucursalListNewSucursal = sucursalListNewSucursal.getIdEmpresa();
                    sucursalListNewSucursal.setIdEmpresa(empresa);
                    sucursalListNewSucursal = em.merge(sucursalListNewSucursal);
                    if (oldIdEmpresaOfSucursalListNewSucursal != null && !oldIdEmpresaOfSucursalListNewSucursal.equals(empresa)) {
                        oldIdEmpresaOfSucursalListNewSucursal.getSucursalList().remove(sucursalListNewSucursal);
                        oldIdEmpresaOfSucursalListNewSucursal = em.merge(oldIdEmpresaOfSucursalListNewSucursal);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = empresa.getIdEmpresa();
                if (findEmpresa(id) == null) {
                    throw new NonexistentEntityException("The empresa with id " + id + " no longer exists.");
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
            Empresa empresa;
            try {
                empresa = em.getReference(Empresa.class, id);
                empresa.getIdEmpresa();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The empresa with id " + id + " no longer exists.", enfe);
            }
            List<Sucursal> sucursalList = empresa.getSucursalList();
            for (Sucursal sucursalListSucursal : sucursalList) {
                sucursalListSucursal.setIdEmpresa(null);
                sucursalListSucursal = em.merge(sucursalListSucursal);
            }
            em.remove(empresa);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<Empresa> findEmpresaEntities() {
        return findEmpresaEntities(true, -1, -1);
    }

    public List<Empresa> findEmpresaEntities(int maxResults, int firstResult) {
        return findEmpresaEntities(false, maxResults, firstResult);
    }

    private List<Empresa> findEmpresaEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(Empresa.class));
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

    public Empresa findEmpresa(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(Empresa.class, id);
        } finally {
            em.close();
        }
    }

    public int getEmpresaCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<Empresa> rt = cq.from(Empresa.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
