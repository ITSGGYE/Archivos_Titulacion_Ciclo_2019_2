/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.util;

import ec.com.academico.dao.RolesJpaController;
import ec.com.academico.dao.UsuariosJpaController;
import ec.com.academico.dto.Roles;
import ec.com.academico.dto.Usuarios;
import java.util.List;

/**
 *
 * @author nuevouser
 */
public class ObtenerDTO {

    public static Usuarios ObtenerUsuario(String nombres) {

        UsuariosJpaController control = new UsuariosJpaController(EntityManagerUtil.obtenerEntityManager());
        Usuarios dto = new Usuarios();
        List<Usuarios> lista = control.findUsuariosEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombres().equals(nombres)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Usuarios ObtenerUsuario(int id) {
        UsuariosJpaController control = new UsuariosJpaController(EntityManagerUtil.obtenerEntityManager());
        Usuarios dto = new Usuarios();
        List<Usuarios> lista = control.findUsuariosEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdUsuario() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
    public static Roles ObtenerRol(int id) {
        RolesJpaController control = new RolesJpaController(EntityManagerUtil.obtenerEntityManager());
        Roles dto = new Roles();
        List<Roles> lista = control.findRolesEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdRoles() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }
}
