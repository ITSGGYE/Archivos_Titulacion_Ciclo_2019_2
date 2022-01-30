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
import ec.com.academico.dto.SeOpcionesMenu;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;

/**
 *
 * @author Usuario
 */
public class SeOpcionesMenuJpaController implements Serializable {

    public SeOpcionesMenuJpaController(EntityManagerFactory emf) {
        this.emf = emf;
    }
    private EntityManagerFactory emf = null;

    public EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

    public void create(SeOpcionesMenu seOpcionesMenu) {
        if (seOpcionesMenu.getSeOpcionesMenuList() == null) {
            seOpcionesMenu.setSeOpcionesMenuList(new ArrayList<SeOpcionesMenu>());
        }
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            SeOpcionesMenu idPadre = seOpcionesMenu.getIdPadre();
            if (idPadre != null) {
                idPadre = em.getReference(idPadre.getClass(), idPadre.getIdOpcionesMenu());
                seOpcionesMenu.setIdPadre(idPadre);
            }
            List<SeOpcionesMenu> attachedSeOpcionesMenuList = new ArrayList<SeOpcionesMenu>();
            for (SeOpcionesMenu seOpcionesMenuListSeOpcionesMenuToAttach : seOpcionesMenu.getSeOpcionesMenuList()) {
                seOpcionesMenuListSeOpcionesMenuToAttach = em.getReference(seOpcionesMenuListSeOpcionesMenuToAttach.getClass(), seOpcionesMenuListSeOpcionesMenuToAttach.getIdOpcionesMenu());
                attachedSeOpcionesMenuList.add(seOpcionesMenuListSeOpcionesMenuToAttach);
            }
            seOpcionesMenu.setSeOpcionesMenuList(attachedSeOpcionesMenuList);
            em.persist(seOpcionesMenu);
            if (idPadre != null) {
                idPadre.getSeOpcionesMenuList().add(seOpcionesMenu);
                idPadre = em.merge(idPadre);
            }
            for (SeOpcionesMenu seOpcionesMenuListSeOpcionesMenu : seOpcionesMenu.getSeOpcionesMenuList()) {
                SeOpcionesMenu oldIdPadreOfSeOpcionesMenuListSeOpcionesMenu = seOpcionesMenuListSeOpcionesMenu.getIdPadre();
                seOpcionesMenuListSeOpcionesMenu.setIdPadre(seOpcionesMenu);
                seOpcionesMenuListSeOpcionesMenu = em.merge(seOpcionesMenuListSeOpcionesMenu);
                if (oldIdPadreOfSeOpcionesMenuListSeOpcionesMenu != null) {
                    oldIdPadreOfSeOpcionesMenuListSeOpcionesMenu.getSeOpcionesMenuList().remove(seOpcionesMenuListSeOpcionesMenu);
                    oldIdPadreOfSeOpcionesMenuListSeOpcionesMenu = em.merge(oldIdPadreOfSeOpcionesMenuListSeOpcionesMenu);
                }
            }
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void edit(SeOpcionesMenu seOpcionesMenu) throws NonexistentEntityException, Exception {
        EntityManager em = null;
        try {
            em = getEntityManager();
            em.getTransaction().begin();
            SeOpcionesMenu persistentSeOpcionesMenu = em.find(SeOpcionesMenu.class, seOpcionesMenu.getIdOpcionesMenu());
            SeOpcionesMenu idPadreOld = persistentSeOpcionesMenu.getIdPadre();
            SeOpcionesMenu idPadreNew = seOpcionesMenu.getIdPadre();
            List<SeOpcionesMenu> seOpcionesMenuListOld = persistentSeOpcionesMenu.getSeOpcionesMenuList();
            List<SeOpcionesMenu> seOpcionesMenuListNew = seOpcionesMenu.getSeOpcionesMenuList();
            if (idPadreNew != null) {
                idPadreNew = em.getReference(idPadreNew.getClass(), idPadreNew.getIdOpcionesMenu());
                seOpcionesMenu.setIdPadre(idPadreNew);
            }
            List<SeOpcionesMenu> attachedSeOpcionesMenuListNew = new ArrayList<SeOpcionesMenu>();
            for (SeOpcionesMenu seOpcionesMenuListNewSeOpcionesMenuToAttach : seOpcionesMenuListNew) {
                seOpcionesMenuListNewSeOpcionesMenuToAttach = em.getReference(seOpcionesMenuListNewSeOpcionesMenuToAttach.getClass(), seOpcionesMenuListNewSeOpcionesMenuToAttach.getIdOpcionesMenu());
                attachedSeOpcionesMenuListNew.add(seOpcionesMenuListNewSeOpcionesMenuToAttach);
            }
            seOpcionesMenuListNew = attachedSeOpcionesMenuListNew;
            seOpcionesMenu.setSeOpcionesMenuList(seOpcionesMenuListNew);
            seOpcionesMenu = em.merge(seOpcionesMenu);
            if (idPadreOld != null && !idPadreOld.equals(idPadreNew)) {
                idPadreOld.getSeOpcionesMenuList().remove(seOpcionesMenu);
                idPadreOld = em.merge(idPadreOld);
            }
            if (idPadreNew != null && !idPadreNew.equals(idPadreOld)) {
                idPadreNew.getSeOpcionesMenuList().add(seOpcionesMenu);
                idPadreNew = em.merge(idPadreNew);
            }
            for (SeOpcionesMenu seOpcionesMenuListOldSeOpcionesMenu : seOpcionesMenuListOld) {
                if (!seOpcionesMenuListNew.contains(seOpcionesMenuListOldSeOpcionesMenu)) {
                    seOpcionesMenuListOldSeOpcionesMenu.setIdPadre(null);
                    seOpcionesMenuListOldSeOpcionesMenu = em.merge(seOpcionesMenuListOldSeOpcionesMenu);
                }
            }
            for (SeOpcionesMenu seOpcionesMenuListNewSeOpcionesMenu : seOpcionesMenuListNew) {
                if (!seOpcionesMenuListOld.contains(seOpcionesMenuListNewSeOpcionesMenu)) {
                    SeOpcionesMenu oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu = seOpcionesMenuListNewSeOpcionesMenu.getIdPadre();
                    seOpcionesMenuListNewSeOpcionesMenu.setIdPadre(seOpcionesMenu);
                    seOpcionesMenuListNewSeOpcionesMenu = em.merge(seOpcionesMenuListNewSeOpcionesMenu);
                    if (oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu != null && !oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu.equals(seOpcionesMenu)) {
                        oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu.getSeOpcionesMenuList().remove(seOpcionesMenuListNewSeOpcionesMenu);
                        oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu = em.merge(oldIdPadreOfSeOpcionesMenuListNewSeOpcionesMenu);
                    }
                }
            }
            em.getTransaction().commit();
        } catch (Exception ex) {
            String msg = ex.getLocalizedMessage();
            if (msg == null || msg.length() == 0) {
                Long id = seOpcionesMenu.getIdOpcionesMenu();
                if (findSeOpcionesMenu(id) == null) {
                    throw new NonexistentEntityException("The seOpcionesMenu with id " + id + " no longer exists.");
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
            SeOpcionesMenu seOpcionesMenu;
            try {
                seOpcionesMenu = em.getReference(SeOpcionesMenu.class, id);
                seOpcionesMenu.getIdOpcionesMenu();
            } catch (EntityNotFoundException enfe) {
                throw new NonexistentEntityException("The seOpcionesMenu with id " + id + " no longer exists.", enfe);
            }
            SeOpcionesMenu idPadre = seOpcionesMenu.getIdPadre();
            if (idPadre != null) {
                idPadre.getSeOpcionesMenuList().remove(seOpcionesMenu);
                idPadre = em.merge(idPadre);
            }
            List<SeOpcionesMenu> seOpcionesMenuList = seOpcionesMenu.getSeOpcionesMenuList();
            for (SeOpcionesMenu seOpcionesMenuListSeOpcionesMenu : seOpcionesMenuList) {
                seOpcionesMenuListSeOpcionesMenu.setIdPadre(null);
                seOpcionesMenuListSeOpcionesMenu = em.merge(seOpcionesMenuListSeOpcionesMenu);
            }
            em.remove(seOpcionesMenu);
            em.getTransaction().commit();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public List<SeOpcionesMenu> findSeOpcionesMenuEntities() {
        return findSeOpcionesMenuEntities(true, -1, -1);
    }

    public List<SeOpcionesMenu> findSeOpcionesMenuEntities(int maxResults, int firstResult) {
        return findSeOpcionesMenuEntities(false, maxResults, firstResult);
    }

    private List<SeOpcionesMenu> findSeOpcionesMenuEntities(boolean all, int maxResults, int firstResult) {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            cq.select(cq.from(SeOpcionesMenu.class));
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

    public SeOpcionesMenu findSeOpcionesMenu(Long id) {
        EntityManager em = getEntityManager();
        try {
            return em.find(SeOpcionesMenu.class, id);
        } finally {
            em.close();
        }
    }

    public int getSeOpcionesMenuCount() {
        EntityManager em = getEntityManager();
        try {
            CriteriaQuery cq = em.getCriteriaBuilder().createQuery();
            Root<SeOpcionesMenu> rt = cq.from(SeOpcionesMenu.class);
            cq.select(em.getCriteriaBuilder().count(rt));
            Query q = em.createQuery(cq);
            return ((Long) q.getSingleResult()).intValue();
        } finally {
            em.close();
        }
    }
    
}
