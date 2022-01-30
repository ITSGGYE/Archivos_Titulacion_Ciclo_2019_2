/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dao.CursosJpaController;
import ec.com.academico.dao.DocumentosJpaController;
import ec.com.academico.dao.EstudiantesJpaController;
import ec.com.academico.dao.ParalelosJpaController;
import ec.com.academico.dao.ParentescoJpaController;
import ec.com.academico.dao.RelCursoParaleloJpaController;
import ec.com.academico.dao.RelUsuarioRolesJpaController;
import ec.com.academico.dao.RepresentanteJpaController;
import ec.com.academico.dao.UsuariosJpaController;
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Estudiantes;
import ec.com.academico.dto.Paralelos;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.RelUsuarioRoles;
import ec.com.academico.dto.Representante;
import ec.com.academico.dto.Usuarios;
import ec.com.academico.util.EntityManagerUtil;
import java.util.List;

/**
 *
 * @author Usuario
 */
public class ValidarDTO {

    public static boolean ValidarUsuario(String nombre) {
        RelUsuarioRolesJpaController control = new RelUsuarioRolesJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<RelUsuarioRoles> lista = control.findRelUsuarioRolesEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getUsuario().equals(nombre)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarCursoParalelo(Long IdCurso, Long IdParalelo) {
        RelCursoParaleloJpaController control = new RelCursoParaleloJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<RelCursoParalelo> lista = control.findRelCursoParaleloEntities();

        for (int i = 0; i < lista.size(); i++) {
            System.out.println("id curs " + lista.get(i).getIdCurso() + " " + IdCurso);
            System.out.println("id par " + lista.get(i).getIdParalelo() + " " + IdParalelo);
            if (lista.get(i).getIdCurso().getIdCursos().equals(IdCurso) && lista.get(i).getIdParalelo().getIdParalelos().equals(IdParalelo)) {
                valor = true;
                System.out.println("enter");
            }

        }
        return valor;
    }

    public static boolean ValidarCurso(String nombre) {
        CursosJpaController control = new CursosJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Cursos> lista = control.findCursosEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarParalelo(String nombre) {
        ParalelosJpaController control = new ParalelosJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Paralelos> lista = control.findParalelosEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarDocumentos(String nombre) {
        DocumentosJpaController control = new DocumentosJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Documentos> lista = control.findDocumentosEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getDocumento().equals(nombre)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarParentesco(String nombre) {
        ParentescoJpaController control = new ParentescoJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Parentesco> lista = control.findParentescoEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarEstudiante(String cedula) {
        EstudiantesJpaController control = new EstudiantesJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Estudiantes> lista = control.findEstudiantesEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdentificacion().equals(cedula)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarRepresentante(String cedula) {
        RepresentanteJpaController control = new RepresentanteJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Representante> lista = control.findRepresentanteEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdentificacion().equals(cedula)) {
                valor = true;
            }
        }
        return valor;
    }

    public static boolean ValidarPersona(String cedula) {
        UsuariosJpaController control = new UsuariosJpaController(EntityManagerUtil.obtenerEntityManager());
        boolean valor = false;
        List<Usuarios> lista = control.findUsuariosEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdentificacion().equals(cedula)) {
                valor = true;
            }
        }
        return valor;
    }
}
