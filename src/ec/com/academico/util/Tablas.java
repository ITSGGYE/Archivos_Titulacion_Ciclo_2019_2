/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.util;

import ec.com.academico.dto.Estudiantes;
import ec.com.academico.dto.PeriodoLectivo;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dao.ext.ObtenerDTO;
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.Paralelos;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.RelMatriDoc;
import ec.com.academico.dto.RelUsuarioRoles;
import ec.com.academico.dto.Representante;
import ec.com.academico.dto.SeContactoEstudiante;
import ec.com.academico.dto.TipoMatricula;
import ec.com.academico.dto.Usuarios;
import ec.com.academico.dtoJoin.DocumentosMatriculaJoin;
import ec.com.academico.dtoJoin.MatriculaJoin;
import java.math.BigInteger;
import java.sql.Date;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JTable;
import javax.swing.RowFilter;
import javax.swing.SwingConstants;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableRowSorter;

/**
 *
 * @author Usuario
 */
public class Tablas {

    static DefaultTableModel model;
    private static boolean[] editable1 = {false, false, true};

    public static DefaultTableModel VaciarTabla(JTable tabla) {
        DefaultTableModel tab
                = (DefaultTableModel) tabla.getModel();
        while (tab.getRowCount() > 0) {
            tab.removeRow(0);
        }
        return tab;
    }

    public static void filtro(String valor, JTable Tabla) {
        TableRowSorter<DefaultTableModel> tr = new TableRowSorter<>(model);
        Tabla.setRowSorter(tr);
        tr.setRowFilter(RowFilter.regexFilter("(?i)" + valor));
    }

    public static void listarUsuarios(List<RelUsuarioRoles> listUsu, JTable Tabla) {
        int[] a = {10, 100, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "USUARIO", "ROL", "PERSONA"};
        String[] Filas = new String[4];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < listUsu.size(); i++) {
//            if (listUsu.get(i).getEstado().equals("A")) {
            Filas[0] = "" + listUsu.get(i).getIdUsuRol();
            Filas[1] = "" + listUsu.get(i).getUsuario();
            Filas[2] = "" + listUsu.get(i).getIdRol().getNombre();
            Filas[3] = "" + listUsu.get(i).getIdUsuario().getNombres() + " "
                    + listUsu.get(i).getIdUsuario().getApellidos();
//                Filas[2] = ""+listUsu.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarEstudiantes(List<Estudiantes> listEst, JTable Tabla) {
        int[] a = {10, 100, 100, 100, 30};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "NOMBRES", "APELLIDOS", "IDENTIFICACION", "ESTADO"};
        String[] Filas = new String[5];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < listEst.size(); i++) {
//            if (listUsu.get(i).getEstado().equals("A")) {
            Filas[0] = "" + listEst.get(i).getIdEstudiantes();
            Filas[1] = listEst.get(i).getNombres();
            Filas[2] = listEst.get(i).getApellidos();
            Filas[3] = "" + listEst.get(i).getIdentificacion();
            Filas[4] = "" + listEst.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
        }
//            }

    }

    public static void listarRepresentante(List<Representante> listRepr, JTable Tabla) {
        int[] a = {10, 100, 100, 50, 50, 30};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "NOMBRES", "APELLIDOS", "IDENTIFICACION", "CELULAR", "ESTADO"};
        String[] Filas = new String[6];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < listRepr.size(); i++) {
//            if (listUsu.get(i).getEstado().equals("A")) {
            Filas[0] = "" + listRepr.get(i).getIdRepresentante();
            Filas[1] = listRepr.get(i).getNombres();
            Filas[2] = listRepr.get(i).getApellidos();
            Filas[3] = "" + listRepr.get(i).getIdentificacion();
            Filas[4] = "" + listRepr.get(i).getCelular();
            Filas[5] = "" + listRepr.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarPersonas(List<Usuarios> listUsu, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "NOMBRES", "APELLIDOS"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < listUsu.size(); i++) {
//            if (listUsu.get(i).getEstado().equals("A")) {
            Filas[0] = "" + listUsu.get(i).getIdUsuario();
            Filas[1] = "" + listUsu.get(i).getNombres();
            Filas[2] = listUsu.get(i).getApellidos();
//                Filas[2] = ""+listUsu.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarPeriodosLectivos(List<PeriodoLectivo> listUsu, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "PERIODO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

//        Tabla.setShowGrid(true);System.out.println("****");
        for (int i = 0; i < listUsu.size(); i++) {
//            if (listUsu.get(i).getEstado().equals("A")) {
            Filas[0] = "" + listUsu.get(i).getIdPeriodoLectivo();
            Filas[1] = "" + listUsu.get(i).getPeriodo();
            Filas[2] = listUsu.get(i).getEstado().toString();
//                Filas[2] = ""+listUsu.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarCursoParalelo(List<RelCursoParalelo> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CURSO", "PARALELO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {

            Filas[0] = "" + lista.get(i).getIdRelCursoParalelo();
            Cursos cu = ObtenerDTO.ObtenerCurso(BigInteger.valueOf(lista.get(i).getIdCurso().getIdCursos()));
            Filas[1] = "" + cu.getNombre();
            Paralelos pa = ObtenerDTO.ObtenerParalelos(BigInteger.valueOf(lista.get(i).getIdParalelo().getIdParalelos()));
            Filas[2] = "" + pa.getNombre();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
        }
    }

    public static void listarCurso(List<Cursos> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CURSO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {

            Filas[0] = "" + lista.get(i).getIdCursos();
            Filas[1] = "" + lista.get(i).getNombre();
            Filas[2] = "" + lista.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
        }
    }

    public static void listarParalelos(List<Paralelos> lista, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CURSO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < lista.size(); i++) {

            Filas[0] = "" + lista.get(i).getIdParalelos();
            Filas[1] = "" + lista.get(i).getNombre();
            Filas[2] = "" + lista.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
        }
    }

    public static void listarDocumentos(List<Documentos> list, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "DOCUMENTO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
//            if (list.get(i).getEstado().equals('A')) {
            Filas[0] = "" + list.get(i).getIdDocumentos();
            Filas[1] = "" + list.get(i).getDocumento();
            Filas[2] = "" + list.get(i).getEstado();
//                Filas[2] = ""+listUsu.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void ListarDocumentoCheckMatricula(List<Documentos> lista, JTable Tabla) {
        model = VaciarTabla(Tabla);
        int[] a = {5, 150};
        Documentos vo = new Documentos();
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        Tabla.setDefaultRenderer(Object.class, new Render());
        //DefaultTableModel dt = new DefaultTableModel(new String[]{"COD.DOCUMENTO", "DOCUMENTO", "ESTADO",}, 0) {
        model = new DefaultTableModel(new String[]{"COD", "DOCUMENTO", "ESTADO",}, 0) {

            Class[] types = new Class[]{
                java.lang.Object.class, java.lang.Object.class, java.lang.Boolean.class
            };

            public Class getColumnClass(int columnIndex) {
                return types[columnIndex];
            }

            public boolean isCellEditable(int row, int column) {
                return editable1[column];
            }
        };

        if (lista.size() > 0) {
            for (int i = 0; i < lista.size(); i++) {
                if (lista.get(i).getEstado() == 'A') {
                    // model.addRow(new Object[]{});
                    System.out.println("");
                    Object fila[] = new Object[3];
                    vo = lista.get(i);
                    fila[0] = vo.getIdDocumentos();
                    fila[1] = vo.getDocumento();
                    String ac = "" + vo.getEstado();
//                    String ac = (String) vo.getEstado();
                    fila[2] = false;
//                if ("A".equals(ac)) {
//                    fila[1] = true;
//                } else {
//                    fila[1] = false;
//                }

                    model.addRow(fila);
                    /**/ Tabla.setModel(model);
                    /**/ Tabla.setRowHeight(15);
                    Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                    Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                    Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                    Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
//                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
//                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                }
            }
        }

        Tabla.setModel(model);
    }

    public static void listarMatriculas(List<Matricula> list, JTable Tabla) {
        int[] a = {10, 50, 250, 100, 100, 100, 5};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            if (list.get(i).getEstado().equals('A')) {
                String curso = list.get(i).getIdCurso().getIdCurso().getNombre();
                String paralelo = " " + list.get(i).getIdCurso().getIdParalelo().getNombre();
                Filas[0] = "" + list.get(i).getIdMatricula();
                Filas[1] = "" + list.get(i).getIdEstudiante().getIdEstudiantes();
                Filas[2] = "" + list.get(i).getIdEstudiante().getApellidos() + " " + list.get(i).getIdEstudiante().getNombres();
                Filas[3] = curso + paralelo;
                Filas[4] = "" + list.get(i).getIdPeriodoLectivo().getPeriodo();
                Filas[5] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
                        + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
                        + list.get(i).getFechaRegistro().getSeconds();
                Filas[6] = "" + list.get(i).getEstado();
                model.addRow(Filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
                Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
                Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
                Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
            }
        }
    }

    public static void ListarDocumentoCheckMatriculaCargada(List<Documentos> lista, JTable Tabla, Matricula obj
    ) {
        model = VaciarTabla(Tabla);
        int[] a = {5, 150};
        Documentos vo = new Documentos();
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        Tabla.setDefaultRenderer(Object.class, new Render());
        //DefaultTableModel dt = new DefaultTableModel(new String[]{"COD.DOCUMENTO", "DOCUMENTO", "ESTADO",}, 0) {
        model = new DefaultTableModel(new String[]{"N°", "DOCUMENTO", "ESTADO",}, 0) {

            Class[] types = new Class[]{
                java.lang.Object.class, java.lang.Object.class, java.lang.Boolean.class
            };

            public Class getColumnClass(int columnIndex) {
                return types[columnIndex];
            }

            public boolean isCellEditable(int row, int column) {
                return editable1[column];
            }
        };

        if (lista.size() > 0) {
            for (int i = 0; i < lista.size(); i++) {
                if (lista.get(i).getEstado() == 'A') {
                    RelMatriDoc rel = ObtenerDTO.ObtenerRelMatriDocRes2(obj.getIdMatricula().longValue());

                    Object fila[] = new Object[3];
                    vo = lista.get(i);
                    fila[0] = vo.getIdDocumentos();
                    fila[1] = vo.getDocumento();
                    String ac = "" + vo.getEstado();
                    if (rel.getIdDocumento().equals(lista.get(i).getIdDocumentos())) {
                    }

                    model.addRow(fila);
                    /**/ Tabla.setModel(model);
                    /**/ Tabla.setRowHeight(15);
                    Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                    Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                    Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                    Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
//                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
//                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                }
            }

        }

        Tabla.setModel(model);
    }

    public static void ListarDocumentoCheckMatriculaCargadaNQ(List<DocumentosMatriculaJoin> lista, JTable Tabla) {
        model = VaciarTabla(Tabla);
        int[] a = {5, 150};
        DocumentosMatriculaJoin vo = new DocumentosMatriculaJoin();
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        Tabla.setDefaultRenderer(Object.class, new Render());
        //DefaultTableModel dt = new DefaultTableModel(new String[]{"COD.DOCUMENTO", "DOCUMENTO", "ESTADO",}, 0) {
        model = new DefaultTableModel(new String[]{"N°", "DOCUMENTO", "ESTADO",}, 0) {

            Class[] types = new Class[]{
                java.lang.Object.class, java.lang.Object.class, java.lang.Boolean.class
            };

            public Class getColumnClass(int columnIndex) {
                return types[columnIndex];
            }

            public boolean isCellEditable(int row, int column) {
                return editable1[column];
            }
        };

        if (lista.size() > 0) {
            for (int i = 0; i < lista.size(); i++) {
//                if (lista.get(i).getEstado() == 'A') {
                Object fila[] = new Object[3];
                vo = lista.get(i);
                fila[0] = vo.getId_documento();
                fila[1] = vo.getDocumento();
                String ac = "" + vo.getEstado();
                if (ac.equals("A")) {
                    fila[2] = true;
                } else {
                    fila[2] = false;
                }

                model.addRow(fila);
                /**/ Tabla.setModel(model);
                /**/ Tabla.setRowHeight(15);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
//                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
//                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//                }
            }

        }

        Tabla.setModel(model);
    }

    public static void listarMatriculasNumMatricula(List<Matricula> list, JTable Tabla, String NumMatri) {
        int[] a = {10, 50, 250, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            if (list.get(i).getIdMatricula() == Long.parseLong(NumMatri)) {
                String curso = list.get(i).getIdCurso().getIdCurso().getNombre();
                String paralelo = " " + list.get(i).getIdCurso().getIdParalelo().getNombre();
                Filas[0] = "" + list.get(i).getIdMatricula();
                Filas[1] = "" + list.get(i).getIdEstudiante().getIdEstudiantes();
                Filas[2] = "" + list.get(i).getIdEstudiante().getApellidos() + " " + list.get(i).getIdEstudiante().getNombres();
                Filas[3] = curso + paralelo;
                Filas[4] = "" + list.get(i).getIdPeriodoLectivo().getPeriodo();
                Filas[5] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
                        + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
                        + list.get(i).getFechaRegistro().getSeconds();
                Filas[6] = "" + list.get(i).getEstado();
                model.addRow(Filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
                Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
                Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
                Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
            }
        }
    }

    public static void listarMatriculasPeriodoLectivo(List<Matricula> list, JTable Tabla, String perLect) {
        int[] a = {10, 50, 250, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            if (list.get(i).getIdPeriodoLectivo().getPeriodo().toString().equals(perLect)) {
                String curso = list.get(i).getIdCurso().getIdCurso().getNombre();
                String paralelo = " " + list.get(i).getIdCurso().getIdParalelo().getNombre();
                Filas[0] = "" + list.get(i).getIdMatricula();
                Filas[1] = "" + list.get(i).getIdEstudiante().getIdEstudiantes();
                Filas[2] = "" + list.get(i).getIdEstudiante().getApellidos() + " " + list.get(i).getIdEstudiante().getNombres();
                Filas[3] = curso + paralelo;
                Filas[4] = "" + list.get(i).getIdPeriodoLectivo().getPeriodo();
                Filas[5] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
                        + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
                        + list.get(i).getFechaRegistro().getSeconds();
                Filas[6] = "" + list.get(i).getEstado();
                model.addRow(Filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
                Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
                Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
                Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
            }
        }
    }

    public static void listarMatriculasEstudiante(List<MatriculaJoin> list, JTable Tabla) {
        int[] a = {10, 50, 250, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            String CursoQuery = list.get(i).getCurso();
            String ParaleloQuery = list.get(i).getParalelo();
            Filas[0] = "" + list.get(i).getId_matricula();
            Filas[1] = "" + list.get(i).getId_estudiante();
            Filas[2] = "" + list.get(i).getApellidos() + " " + list.get(i).getNombres();
            Filas[3] = "" + list.get(i).getCurso() + " " + list.get(i).getParalelo();
            Filas[4] = "" + list.get(i).getPeriodo();
//                Filas[4] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
//                        + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
//                        + list.get(i).getFechaRegistro().getSeconds();
            Filas[5] = "" + list.get(i).getFecha_registro();
            Filas[6] = "" + list.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarMatriculasTodo(List<Matricula> list, JTable Tabla) {
        int[] a = {10, 50, 250, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            String curso = list.get(i).getIdCurso().getIdCurso().getNombre();
            String paralelo = " " + list.get(i).getIdCurso().getIdParalelo().getNombre();
            Filas[0] = "" + list.get(i).getIdMatricula();
//             TipoMatricula id_tipo_matr = ObtenerDTO.ObtenerTipoMatricula(list.get(i).getIdTipoMatricula().getIdTipoMatricula());
//            Filas[1] = "" + id_tipo_matr.getTipoMatricula();
            Filas[1] = "" + list.get(i).getIdEstudiante().getIdEstudiantes();
            Filas[2] = "" + list.get(i).getIdEstudiante().getApellidos() + " " + list.get(i).getIdEstudiante().getNombres();
            Filas[3] = curso + paralelo;
            Filas[4] = "" + list.get(i).getIdPeriodoLectivo().getPeriodo();
            Filas[5] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
                    + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
                    + list.get(i).getFechaRegistro().getSeconds();
            Filas[6] = "" + list.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
            Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
            Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
            Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
            Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
        }
    }
//    }

    public static void listarParentesco(List<Parentesco> list, JTable Tabla) {
        int[] a = {10, 100, 100};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "DOCUMENTO", "ESTADO"};
        String[] Filas = new String[3];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
//            if (list.get(i).getEstado().equals('A')) {
            Filas[0] = "" + list.get(i).getIdParentesco();
            Filas[1] = "" + list.get(i).getNombre();
            Filas[2] = list.get(i).getEstado().toString();
//                Filas[2] = ""+listUsu.get(i).getEstado();
            model.addRow(Filas);
            Tabla.setModel(model);
            Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
            Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
            Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
            Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
            Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
//            }
        }
    }

    public static void listarMatriculasCurso(List<MatriculaJoin> list, JTable Tabla, String curso, String paralelo) {
        int[] a = {10, 50, 250, 100, 100, 100, 10};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr1 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr1.setHorizontalAlignment(SwingConstants.RIGHT);
        model = Tablas.VaciarTabla(Tabla);
        String[] Co = {"N°", "CODIGO ESTUDIANTE", "ESTUDIANTE", "CURSO", "PERIODO LECTIVO", "FECHA DE REGISTRO", "ESTADO"};
        String[] Filas = new String[7];
        model = new DefaultTableModel(null, Co);

        Tabla.setShowGrid(true);
        for (int i = 0; i < list.size(); i++) {
            String CursoQuery = list.get(i).getCurso();
            String ParaleloQuery = list.get(i).getParalelo();
//            System.out.println("curso "+curso+CursoQuery);
//            System.out.println("parlalelo "+paralelo+ParaleloQuery);
            if (curso.equals(CursoQuery) && paralelo.equals(ParaleloQuery)) {
                System.out.println("**");
                Filas[0] = "" + list.get(i).getId_matricula();
                Filas[1] = "" + list.get(i).getId_estudiante();
                Filas[2] = "" + list.get(i).getApellidos() + " " + list.get(i).getNombres();
                Filas[3] = "" + list.get(i).getCurso() + " " + list.get(i).getParalelo();
                Filas[4] = "" + list.get(i).getPeriodo();
//                Filas[4] = FormatoFecha.getStringFecha(new java.sql.Date(list.get(i).getFechaRegistro().getTime())) + " "
//                        + list.get(i).getFechaRegistro().getHours() + ":" + list.get(i).getFechaRegistro().getMinutes() + ":"
//                        + list.get(i).getFechaRegistro().getSeconds();
                Filas[5] = "" + list.get(i).getFecha_registro();
                Filas[6] = "" + list.get(i).getEstado();
                model.addRow(Filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
                Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(5).setPreferredWidth(a[5]);
                Tabla.getColumnModel().getColumn(5).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(6).setPreferredWidth(a[6]);
                Tabla.getColumnModel().getColumn(6).setCellRenderer(tcr);
            }
        }
    }

    public static void TablaContactoEstudiante(List<SeContactoEstudiante> listacontactosestudiante, JTable Tabla, Estudiantes lista) {
        int[] a = {50, 200, 150, 150, 150, 250};
        DefaultTableCellRenderer tcr = new DefaultTableCellRenderer();
        DefaultTableCellRenderer tcr2 = new DefaultTableCellRenderer();
        tcr.setHorizontalAlignment(SwingConstants.CENTER);
        tcr2.setHorizontalAlignment(SwingConstants.LEFT);
        model = VaciarTabla(Tabla);
        String[] b = {"ID", "CONTACTO", "DIRECCION", "TELEFONO", "CELULAR", "CORREO"};
        String[] filas = new String[6];
        model = new DefaultTableModel(null, b);
        Tabla.setShowGrid(true);
        for (int i = 0; i < listacontactosestudiante.size(); i++) {
            if (listacontactosestudiante.get(i).getEstado().equals('A')
                    && listacontactosestudiante.get(i).getIdEstudiante().getIdEstudiantes()
                    == lista.getIdEstudiantes()) {
                filas[0] = String.valueOf(listacontactosestudiante.get(i).getIdContactoEstudiante());
                filas[1] = listacontactosestudiante.get(i).getNombreCompleto();
                filas[2] = listacontactosestudiante.get(i).getDireccionDomiciliaria();
                filas[3] = listacontactosestudiante.get(i).getTelefono();
                filas[4] = listacontactosestudiante.get(i).getCelular();
                filas[5] = listacontactosestudiante.get(i).getEmail();
                model.addRow(filas);
                Tabla.setModel(model);
                Tabla.getColumnModel().getColumn(0).setPreferredWidth(a[0]);
                Tabla.getColumnModel().getColumn(0).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(1).setPreferredWidth(a[1]);
                Tabla.getColumnModel().getColumn(1).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(2).setPreferredWidth(a[2]);
                Tabla.getColumnModel().getColumn(2).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(3).setPreferredWidth(a[3]);
                Tabla.getColumnModel().getColumn(3).setCellRenderer(tcr);
                Tabla.getColumnModel().getColumn(4).setPreferredWidth(a[4]);
                Tabla.getColumnModel().getColumn(4).setCellRenderer(tcr);
            }
        }
    }
}
