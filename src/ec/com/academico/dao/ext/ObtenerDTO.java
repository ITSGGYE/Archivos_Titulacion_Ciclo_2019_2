/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dao.ext;

import ec.com.academico.dao.CursosJpaController;
import ec.com.academico.dao.DocumentosJpaController;
import ec.com.academico.dao.ParalelosJpaController;
import ec.com.academico.dao.ParentescoJpaController;
import ec.com.academico.dao.PeriodoLectivoJpaController;
import ec.com.academico.dao.RelCursoParaleloJpaController;
import ec.com.academico.dao.RelMatriDocJpaController;
import ec.com.academico.dao.TipoIdentificacionJpaController;
import ec.com.academico.dao.TipoMatriculaJpaController;
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.Paralelos;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.PeriodoLectivo;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.RelMatriDoc;
import ec.com.academico.dto.TipoIdentificacion;
import ec.com.academico.dto.TipoMatricula;
import ec.com.academico.util.EntityManagerUtil;
import java.math.BigInteger;
import java.util.List;

/**
 *
 * @author Usuario
 */
public class ObtenerDTO {

    public static Parentesco ObtenerParentesco(String nombre) {
        ParentescoJpaController control = new ParentescoJpaController(EntityManagerUtil.obtenerEntityManager());
        Parentesco dto = new Parentesco();
        List<Parentesco> lista = control.findParentescoEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre() == nombre) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static TipoIdentificacion ObtenerIndetificacion(String nombre) {
        TipoIdentificacionJpaController control = new TipoIdentificacionJpaController(EntityManagerUtil.obtenerEntityManager());
        TipoIdentificacion dto = new TipoIdentificacion();
        List<TipoIdentificacion> lista = control.findTipoIdentificacionEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdentificacion() == nombre) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static TipoIdentificacion ObtenerIndetificacion(Long id) {
        TipoIdentificacionJpaController control = new TipoIdentificacionJpaController(EntityManagerUtil.obtenerEntityManager());
        TipoIdentificacion dto = new TipoIdentificacion();
        List<TipoIdentificacion> lista = control.findTipoIdentificacionEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdTipoIdentificacion() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Cursos ObtenerCurso(BigInteger id) {
        CursosJpaController control = new CursosJpaController(EntityManagerUtil.obtenerEntityManager());
        Cursos dto = new Cursos();
        List<Cursos> lista = control.findCursosEntities();
        BigInteger big = id;
        int valor = big.intValue();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdCursos() == valor) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Paralelos ObtenerParalelos(BigInteger id) {
        ParalelosJpaController control = new ParalelosJpaController(EntityManagerUtil.obtenerEntityManager());
        Paralelos dto = new Paralelos();
        List<Paralelos> lista = control.findParalelosEntities();
        BigInteger big = id;
        int valor = big.intValue();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdParalelos() == valor) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Paralelos ObtenerParalelos(String nombre) {
        ParalelosJpaController control = new ParalelosJpaController(EntityManagerUtil.obtenerEntityManager());
        Paralelos dto = new Paralelos();
        List<Paralelos> lista = control.findParalelosEntities();
        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Cursos ObtenerCursos(String nombre) {
        CursosJpaController control = new CursosJpaController(EntityManagerUtil.obtenerEntityManager());
        Cursos dto = new Cursos();
        List<Cursos> lista = control.findCursosEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getNombre().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static RelCursoParalelo ObtenerRelCursosParalelos(Long id_curso, Long id_paralelo) {
        RelCursoParaleloJpaController control = new RelCursoParaleloJpaController(EntityManagerUtil.obtenerEntityManager());
        RelCursoParalelo dto = new RelCursoParalelo();
        List<RelCursoParalelo> lista = control.findRelCursoParaleloEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdCurso().getIdCursos() == id_curso
                    && lista.get(i).getIdParalelo().getIdParalelos() == id_paralelo) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static TipoMatricula ObtenerTipoMatricula(String nombre) {
        TipoMatriculaJpaController control = new TipoMatriculaJpaController(EntityManagerUtil.obtenerEntityManager());
        TipoMatricula dto = new TipoMatricula();
        List<TipoMatricula> lista = control.findTipoMatriculaEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getTipoMatricula() == nombre) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static TipoMatricula ObtenerTipoMatricula(Long id) {
        TipoMatriculaJpaController control = new TipoMatriculaJpaController(EntityManagerUtil.obtenerEntityManager());
        TipoMatricula dto = new TipoMatricula();
        List<TipoMatricula> lista = control.findTipoMatriculaEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdTipoMatricula() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static PeriodoLectivo ObtenerPeriodoLectivo(String nombre) {
        PeriodoLectivoJpaController control = new PeriodoLectivoJpaController(EntityManagerUtil.obtenerEntityManager());
        PeriodoLectivo dto = new PeriodoLectivo();
        List<PeriodoLectivo> lista = control.findPeriodoLectivoEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getPeriodo().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static Documentos ObtenerDocumentos(String nombre) {
        DocumentosJpaController control = new DocumentosJpaController(EntityManagerUtil.obtenerEntityManager());
        Documentos dto = new Documentos();
        List<Documentos> lista = control.findDocumentosEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getDocumento().equals(nombre)) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static RelMatriDoc ObtenerRelMatriDoc(Long id) {
        RelMatriDocJpaController control = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
        RelMatriDoc dto = new RelMatriDoc();
        List<RelMatriDoc> lista = control.findRelMatriDocEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdRelMatriDoc() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static RelMatriDoc ObtenerRelMatriDocIdMatricula(Long id) {
        RelMatriDocJpaController control = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
        RelMatriDoc dto = new RelMatriDoc();
        List<RelMatriDoc> lista = control.findRelMatriDocEntities();

        for (int i = 0; i < lista.size(); i++) {
            if (lista.get(i).getIdMatricula().getIdMatricula() == id) {
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static RelMatriDoc ObtenerRelMatriDocRes(Matricula obj) {
        RelMatriDocJpaController control = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
        RelMatriDoc dto = new RelMatriDoc();
        List<RelMatriDoc> lista = control.findRelMatriDocEntities();

        for (int i = 0; i < lista.size(); i++) {
            System.out.println("-" + lista.get(i).getIdRelMatriDoc());
            if (lista.get(i).getIdMatricula().getIdMatricula() == obj.getIdMatricula()) {
//                System.out.println("marticulas regi doc "+lista.get(i).getIdDocumento().getDocumento());
                dto = lista.get(i);
                break;
            }
        }
        return dto;
    }

    public static RelMatriDoc ObtenerRelMatriDocRes2(Long id) {
        RelMatriDoc obj = new RelMatriDoc();
        RelMatriDocJpaController rmdc = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
        List<RelMatriDoc> listRelDoc = rmdc.findRelMatriDocEntities();
        for (int i = 0; i < listRelDoc.size(); i++) {
//            System.out.println("lista nue**" + listRelDoc.get(i).getIdRelMatriDoc());
//            System.out.println("ID" + id);
            if (listRelDoc.get(i).getIdMatricula().getIdMatricula().longValue()==id) {
                System.out.println("estado"+listRelDoc.get(i).getEstado()
                        +" "+listRelDoc.get(i).getIdDocumento());
                obj = listRelDoc.get(i);
            }
        }
//                break;
        return obj;
    }
}
