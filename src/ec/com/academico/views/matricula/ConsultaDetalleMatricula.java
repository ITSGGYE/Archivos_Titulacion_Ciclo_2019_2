/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.views.matricula;

import ec.com.academico.dao.CursosJpaController;
import ec.com.academico.dao.DocumentosJpaController;
import ec.com.academico.dao.MatriculaJpaController;
import ec.com.academico.dao.RelCursoParaleloJpaController;
import ec.com.academico.dao.RelMatriDocJpaController;
import ec.com.academico.dao.ext.DocumentosMariculaEXT;
import ec.com.academico.dao.ext.MatriculasExt;
import ec.com.academico.dao.ext.ObtenerDTO;
import static ec.com.academico.dao.ext.ObtenerDTO.ObtenerRelMatriDoc;
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.Paralelos;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.RelMatriDoc;
import ec.com.academico.dto.TipoIdentificacion;
import ec.com.academico.dtoJoin.DocumentosMatriculaJoin;
import ec.com.academico.util.ClaseReporte;
import ec.com.academico.util.EntityManagerUtil;
import ec.com.academico.util.FormatoFecha;
import ec.com.academico.util.ReporteComprobanteMatricula;
import ec.com.academico.util.Tablas;
import java.awt.Dimension;
import java.awt.MouseInfo;
import java.awt.Point;
import java.math.BigInteger;
import java.sql.Date;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JDialog;
import javax.swing.JOptionPane;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.data.JRBeanCollectionDataSource;
import net.sf.jasperreports.engine.util.JRLoader;
import net.sf.jasperreports.view.JRViewer;

/**
 *
 * @author Usuario
 */
public class ConsultaDetalleMatricula extends javax.swing.JDialog {

    /**
     * Creates new form ConsultaDetalleMatricula
     */
    int x, y;
    Matricula objMatri;
    List<Documentos> listDoc;
    DocumentosJpaController dc = new DocumentosJpaController(EntityManagerUtil.obtenerEntityManager());
    List<RelMatriDoc> listRelDoc;
    List<DocumentosMatriculaJoin> listRelDocMatricuJoin;
    DocumentosMariculaEXT mjx = new DocumentosMariculaEXT();
    RelMatriDocJpaController rmc = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
    int ancho = java.awt.Toolkit.getDefaultToolkit().getScreenSize().width;
    RelMatriDoc RelMatriDoc = new RelMatriDoc();
    RelMatriDocJpaController rmdc = new RelMatriDocJpaController(EntityManagerUtil.obtenerEntityManager());
    java.util.Date d = new java.util.Date();
///////////
    List<RelCursoParalelo> listRelCursoParalelo;
    RelCursoParaleloJpaController rcpc = new RelCursoParaleloJpaController(EntityManagerUtil.obtenerEntityManager());
    List<Cursos> listCur;
    CursosJpaController cc = new CursosJpaController(EntityManagerUtil.obtenerEntityManager());
///////////

    MatriculaJpaController Mc = new MatriculaJpaController(EntityManagerUtil.obtenerEntityManager());

    public ConsultaDetalleMatricula(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
    }

    public ConsultaDetalleMatricula(java.awt.Frame parent, boolean modal, Matricula matri) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
        objMatri = matri;
        cargarDetalleMatricula();
        cargarCbxCursos();
        cargarCbxParalelos1();
    }

    public void cargarDetalleMatricula() {
        txt_Id.setText(objMatri.getIdMatricula().toString());
        txt_periodo.setText(objMatri.getIdPeriodoLectivo().getPeriodo());
        txt_numero_identificacion.setText(objMatri.getIdEstudiante().getIdentificacion());
        txt_matricula.setText(objMatri.getIdTipoMatricula().getTipoMatricula());
        txt_id_estudiante.setText(objMatri.getIdEstudiante().getIdEstudiantes().toString());
        txt_nombres.setText(objMatri.getIdEstudiante().getNombres());
        txt_apellidos.setText(objMatri.getIdEstudiante().getApellidos());

//        txt_Curso.setText(objMatri.getIdCurso().getIdCurso().getNombre() + " "
//                + objMatri.getIdCurso().getIdParalelo().getNombre());
        TipoIdentificacion ident = ObtenerDTO.ObtenerIndetificacion(objMatri.getIdEstudiante().getIdTipoIdentificacion().longValue());
        txt_tipo_identificacion.setText(ident.getIdentificacion());
        txt_fecha_registro.setText(FormatoFecha.getStringFecha(new java.sql.Date(objMatri.getFechaRegistro().getTime())) + " "
                + objMatri.getFechaRegistro().getHours() + ":" + objMatri.getFechaRegistro().getMinutes() + ":"
                + objMatri.getFechaRegistro().getSeconds());
//        txt_fecha_registro.setText(FormatoFecha.getStringFecha((Date) objMatri.getFechaRegistro()));
        cargarTbaDocumentos(objMatri);
    }

    public void cargarTbaDocumentos(Matricula obj) {
        listRelDocMatricuJoin = mjx.listarDocumentosMatriculaJoin(obj.getIdMatricula());
        Tablas.ListarDocumentoCheckMatriculaCargadaNQ(listRelDocMatricuJoin, TbaDocumentos);
    }

    public void cargarCbxCursos() {
        listCur = cc.findCursosEntities();
        for (int i = 0; i < listCur.size(); i++) {
            if (listCur.get(i).getEstado().equals('A')) {
                cbx_curso.addItem(listCur.get(i).getNombre());
                if (listCur.get(i).getIdCursos().longValue() == objMatri.getIdCurso().getIdCurso().getIdCursos()) {

                    cbx_curso.setSelectedItem(listCur.get(i).getNombre());
                }
            }
        }
    }

    public void cargarCbxParalelos1() {
//         cbx_paralelo.removeAllItems();
        Cursos cursos = ObtenerDTO.ObtenerCursos(cbx_curso.getSelectedItem().toString());
        listRelCursoParalelo = rcpc.findRelCursoParaleloEntities();

        for (int i = 0; i < listRelCursoParalelo.size(); i++) {
            if (cursos.getIdCursos().equals(listRelCursoParalelo.get(i).getIdCurso().getIdCursos())) {
                BigInteger id = BigInteger.valueOf(listRelCursoParalelo.get(i).getIdParalelo().getIdParalelos());
                Paralelos paralelos = ObtenerDTO.ObtenerParalelos(id);
                cbx_paralelo.addItem(paralelos.getNombre());
                if (paralelos.getIdParalelos().equals(objMatri.getIdCurso().getIdParalelo().getIdParalelos())) {

                    cbx_paralelo.setSelectedItem(paralelos.getNombre());
                }
            }
        }
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jButton2 = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jPanel5 = new javax.swing.JPanel();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        txt_periodo = new javax.swing.JTextField();
        jPanel3 = new javax.swing.JPanel();
        jLabel13 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        txt_apellidos = new javax.swing.JTextField();
        txt_nombres = new javax.swing.JTextField();
        txt_tipo_identificacion = new javax.swing.JTextField();
        jLabel14 = new javax.swing.JLabel();
        txt_numero_identificacion = new javax.swing.JTextField();
        jLabel15 = new javax.swing.JLabel();
        txt_id_estudiante = new javax.swing.JTextField();
        jPanel2 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        TbaDocumentos = new javax.swing.JTable();
        txt_matricula = new javax.swing.JTextField();
        jLabel16 = new javax.swing.JLabel();
        txt_Id = new javax.swing.JTextField();
        txt_fecha_registro = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        jPanel4 = new javax.swing.JPanel();
        jLabel7 = new javax.swing.JLabel();
        cbx_curso = new javax.swing.JComboBox<>();
        jLabel8 = new javax.swing.JLabel();
        cbx_paralelo = new javax.swing.JComboBox<>();
        jButton5 = new javax.swing.JButton();
        jButton3 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jPanel1.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));

        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/salvar.png"))); // NOI18N
        jButton2.setText("GUARDAR");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        jLabel2.setBackground(new java.awt.Color(0, 153, 255));
        jLabel2.setFont(new java.awt.Font("Ubuntu", 1, 24)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(254, 254, 254));
        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("MATRICULA");
        jLabel2.setOpaque(true);
        jLabel2.addMouseMotionListener(new java.awt.event.MouseMotionAdapter() {
            public void mouseDragged(java.awt.event.MouseEvent evt) {
                jLabel2MouseDragged(evt);
            }
        });
        jLabel2.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                jLabel2MousePressed(evt);
            }
        });

        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/Salir.png"))); // NOI18N
        jButton1.setText("SALIR");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jPanel5.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "MATRICULA"));

        jLabel9.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel9.setText("TIPO DE MATRICULA : ");

        jLabel10.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel10.setText("PERIODO LECTIVO : ");

        txt_periodo.setEditable(false);

        jPanel3.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "ESTUDIANTE "));

        jLabel13.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel13.setText("TIPO DE IDENTIFICACION :");

        jLabel12.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel12.setText("APELLIDOS :");

        jLabel11.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel11.setText("NOMBRES : ");

        txt_apellidos.setEditable(false);

        txt_nombres.setEditable(false);

        txt_tipo_identificacion.setEditable(false);

        jLabel14.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel14.setText("NUMERO DE IDENTIFICACION :");

        txt_numero_identificacion.setEditable(false);

        jLabel15.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel15.setText("CODIGO : ");

        txt_id_estudiante.setEditable(false);

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel15)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addGap(193, 193, 193)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txt_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, 230, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txt_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, 230, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txt_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, 230, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txt_id_estudiante, javax.swing.GroupLayout.PREFERRED_SIZE, 109, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(jLabel11)
                    .addComponent(jLabel12)
                    .addComponent(jLabel13)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addComponent(jLabel14)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(txt_numero_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, 230, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(0, 35, Short.MAX_VALUE))
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel3Layout.createSequentialGroup()
                .addGap(1, 1, 1)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel15)
                    .addComponent(txt_id_estudiante, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel11)
                    .addComponent(txt_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel12)
                    .addComponent(txt_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel13)
                    .addComponent(txt_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel14)
                    .addComponent(txt_numero_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(18, Short.MAX_VALUE))
        );

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "DOCUMENTOS"));

        TbaDocumentos.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {},
                {},
                {},
                {}
            },
            new String [] {

            }
        ));
        jScrollPane1.setViewportView(TbaDocumentos);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 304, Short.MAX_VALUE)
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE)
        );

        txt_matricula.setEditable(false);

        jLabel16.setFont(new java.awt.Font("Tahoma", 1, 18)); // NOI18N
        jLabel16.setText("N ° :");

        txt_Id.setEditable(false);

        txt_fecha_registro.setEditable(false);

        jLabel1.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel1.setText("FECHA REGISTRO:");

        jPanel4.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "AULA"));

        jLabel7.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel7.setText("CURSO :");

        cbx_curso.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_cursoActionPerformed(evt);
            }
        });

        jLabel8.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel8.setText("PARALELO :");

        jButton5.setText("ACTUALIZAR CURSO");
        jButton5.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton5ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel8)
                    .addComponent(jLabel7))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(cbx_curso, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(jButton5))
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(cbx_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addGap(0, 16, Short.MAX_VALUE)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel7)
                    .addComponent(cbx_curso, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton5))
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(cbx_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel8))
                .addContainerGap())
        );

        javax.swing.GroupLayout jPanel5Layout = new javax.swing.GroupLayout(jPanel5);
        jPanel5.setLayout(jPanel5Layout);
        jPanel5Layout.setHorizontalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(25, 25, 25))
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel5Layout.createSequentialGroup()
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel10)
                            .addComponent(jLabel9)
                            .addComponent(jLabel16))
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel5Layout.createSequentialGroup()
                                .addGap(11, 11, 11)
                                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(txt_Id, javax.swing.GroupLayout.PREFERRED_SIZE, 131, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txt_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, 173, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(jPanel5Layout.createSequentialGroup()
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(txt_fecha_registro)
                                    .addComponent(txt_matricula, javax.swing.GroupLayout.DEFAULT_SIZE, 173, Short.MAX_VALUE)))))
                    .addComponent(jLabel1))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );
        jPanel5Layout.setVerticalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel5Layout.createSequentialGroup()
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel5Layout.createSequentialGroup()
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_Id)
                            .addComponent(jLabel16))
                        .addGap(10, 10, 10)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel10)
                            .addComponent(txt_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(14, 14, 14)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel9)
                            .addComponent(txt_matricula, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel1)
                            .addComponent(txt_fecha_registro, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(1, 1, 1))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel5Layout.createSequentialGroup()
                        .addGap(0, 1, Short.MAX_VALUE)
                        .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)))
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
        );

        jButton3.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/imprimir.png"))); // NOI18N
        jButton3.setText("IMPRIMIR");
        jButton3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton3ActionPerformed(evt);
            }
        });

        jButton4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/action_exit_close_remove_13915.png"))); // NOI18N
        jButton4.setText("EXPULSAR ");
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLabel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jButton1)
                .addGap(18, 18, 18)
                .addComponent(jButton2)
                .addGap(18, 18, 18)
                .addComponent(jButton3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jButton4)
                .addGap(194, 194, 194))
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel5, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton2)
                    .addComponent(jButton1)
                    .addComponent(jButton3)
                    .addComponent(jButton4))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        guardar2();
    }//GEN-LAST:event_jButton2ActionPerformed
    public void guardar() {
        char estado = 0;
        Long idDoc = null;
        for (int i = 0; i < TbaDocumentos.getRowCount(); i++) {
            if (TbaDocumentos.getValueAt(i, 2).toString().equals("true")) {
//                idDoc = Long.parseLong(TbaDocumentos.getValueAt(i, 0).toString());
                estado = 'A';
            } else {
//                idDoc = Long.parseLong(TbaDocumentos.getValueAt(i, 0).toString());
                estado = 'I';
            }
            mjx.actualizarDocumentos(idDoc, estado);
        }
    }

    public void guardar2() {
        for (int i = 0; i < listRelDocMatricuJoin.size(); i++) {
            RelMatriDoc obj = ObtenerRelMatriDoc(listRelDocMatricuJoin.get(i).getId_rel_matri_doc());
            try {
                rmdc.destroy(obj.getIdRelMatriDoc());
            } catch (Exception e) {
            }
        }
        guardarDocumentos(objMatri);
    }

    public void guardarDocumentos(Matricula matri) {
        for (int i = 0; i < TbaDocumentos.getRowCount(); i++) {
            if (TbaDocumentos.getValueAt(i, 2).toString().equals("true")) {
                Documentos doc = ObtenerDTO.ObtenerDocumentos(TbaDocumentos.getValueAt(i, 1).toString());
                RelMatriDoc.setIdMatricula(matri);
                RelMatriDoc.setIdDocumento(doc);
                RelMatriDoc.setFechaCreacion(d);
                RelMatriDoc.setEstado('A');
                try {
                    rmdc.create(RelMatriDoc);

                } catch (Exception e) {
                    e.printStackTrace();
                }
            } else {
                Documentos doc = ObtenerDTO.ObtenerDocumentos(TbaDocumentos.getValueAt(i, 1).toString());
                RelMatriDoc.setIdMatricula(matri);
                RelMatriDoc.setIdDocumento(doc);
                RelMatriDoc.setFechaCreacion(d);
                RelMatriDoc.setEstado('I');
                try {
                    rmdc.create(RelMatriDoc);

                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        }
    }
    private void jLabel2MouseDragged(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel2MouseDragged
        Point point = MouseInfo.getPointerInfo().getLocation();
        setLocation(point.x - x, point.y - y);
    }//GEN-LAST:event_jLabel2MouseDragged

    private void jLabel2MousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel2MousePressed
        x = evt.getX();
        y = evt.getY();
    }//GEN-LAST:event_jLabel2MousePressed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        setVisible(false);
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton3ActionPerformed
        ArrayList tablac = new ArrayList();
//        for (int i = 0; i < TbaDocumentos.getRowCount(); i++) {
//            String idDoc = TbaDocumentos.getValueAt(i, 0).toString();
//            String Documento = TbaDocumentos.getValueAt(i, 1).toString();
//            String estado = TbaDocumentos.getValueAt(i, 2).toString();
        ///////////
        String N = txt_Id.getText();
        String apellidos = txt_apellidos.getText();
        String fecha_registro = txt_fecha_registro.getText();
        String id_estudiante = txt_id_estudiante.getText();
        String matricula = txt_matricula.getText();
        String nombres = txt_nombres.getText();
        String numero_identificacion = txt_numero_identificacion.getText();
        String periodo = txt_periodo.getText();
        String tipo_identificacion = txt_tipo_identificacion.getText();
        String curso = cbx_curso.getSelectedItem().toString();
        String paralelo = cbx_paralelo.getSelectedItem().toString();
        ReporteComprobanteMatricula tabla1 = new ReporteComprobanteMatricula(N, apellidos,
                fecha_registro, id_estudiante, matricula, nombres, numero_identificacion,
                periodo, tipo_identificacion, curso, paralelo
        );

        tablac.add(tabla1);

//        }
        /**/
        try {
//            String dir = System.getProperty("user.dir") + "/Reportes/" + "ConsultaMatriculas.jasper";
//            String dir = System.getProperty("user.dir") + "/src/" + "/ec/" + "/com/" + "/academico/" + "/views/" + "/report/"
//                    + "ComprobanteMatricula.jasper";

            String dir = "/ec/com/academico/views/report/ComprobanteMatricula.jasper";
//            JasperReport reporte = (JasperReport) JRLoader.loadObject(dir);
            JasperReport reporte = (JasperReport) JRLoader.loadObject(getClass().getResource(dir));
            JasperPrint jprint = JasperFillManager.fillReport(reporte, null, new JRBeanCollectionDataSource(tablac));
            JDialog frame = new JDialog(this);
            JRViewer viewer = new JRViewer(jprint);
            frame.add(viewer);
            frame.setSize(new Dimension(ancho / 2, 500));
            frame.setLocationRelativeTo(null);
            frame.setVisible(true);
            viewer.setFitWidthZoomRatio();
        } catch (JRException ex) {
            Logger.getLogger(ConsultaMatriculas.class.getName()).log(Level.SEVERE, null, ex);
        }

    }//GEN-LAST:event_jButton3ActionPerformed

    private void cbx_cursoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_cursoActionPerformed
        actualizarCbx();
    }//GEN-LAST:event_cbx_cursoActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
        int r = JOptionPane.showConfirmDialog(null, "¿DESEA EXPULSAR ESTUDIANTE?", "", JOptionPane.YES_NO_OPTION);
        if (r == JOptionPane.YES_OPTION) {
            try {
                objMatri.setEstado('E');
                Mc.edit(objMatri);

                setVisible(false);

            } catch (Exception e) {
            }
        } else {

        }
    }//GEN-LAST:event_jButton4ActionPerformed

    private void jButton5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton5ActionPerformed
        int r = JOptionPane.showConfirmDialog(null, "¿DESEA ACTUALIZAR CURSO?", "", JOptionPane.YES_NO_OPTION);
        if (r == JOptionPane.YES_OPTION) {
            try {
                Paralelos paralelos = ObtenerDTO.ObtenerParalelos(cbx_paralelo.getSelectedItem().toString());
                Cursos cursos = ObtenerDTO.ObtenerCursos(cbx_curso.getSelectedItem().toString());
                RelCursoParalelo id_curso = ObtenerDTO.ObtenerRelCursosParalelos(cursos.getIdCursos(), paralelos.getIdParalelos());

                objMatri.setIdCurso(id_curso);
                Mc.edit(objMatri);

                setVisible(false);

            } catch (Exception e) {
            }
        } else {

        }
    }//GEN-LAST:event_jButton5ActionPerformed
    public void actualizarCbx() {
        cbx_paralelo.removeAllItems();
//        id_curso = ObtenerIdCurso(cbx_curso.getSelectedItem().toString());
        Cursos cursos = ObtenerDTO.ObtenerCursos(cbx_curso.getSelectedItem().toString());
        listRelCursoParalelo = rcpc.findRelCursoParaleloEntities();

        for (int i = 0; i < listRelCursoParalelo.size(); i++) {
            if (cursos.getIdCursos().equals(listRelCursoParalelo.get(i).getIdCurso().getIdCursos())) {

                BigInteger id = BigInteger.valueOf(listRelCursoParalelo.get(i).getIdParalelo().getIdParalelos());
                Paralelos paralelos = ObtenerDTO.ObtenerParalelos(id);
                cbx_paralelo.addItem(paralelos.getNombre());
            }
        }

    }

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(ConsultaDetalleMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(ConsultaDetalleMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(ConsultaDetalleMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(ConsultaDetalleMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                ConsultaDetalleMatricula dialog = new ConsultaDetalleMatricula(new javax.swing.JFrame(), true);
                dialog.addWindowListener(new java.awt.event.WindowAdapter() {
                    @Override
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTable TbaDocumentos;
    private javax.swing.JComboBox<String> cbx_curso;
    private javax.swing.JComboBox<String> cbx_paralelo;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton3;
    private javax.swing.JButton jButton4;
    private javax.swing.JButton jButton5;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel15;
    private javax.swing.JLabel jLabel16;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextField txt_Id;
    private javax.swing.JTextField txt_apellidos;
    private javax.swing.JTextField txt_fecha_registro;
    private javax.swing.JTextField txt_id_estudiante;
    private javax.swing.JTextField txt_matricula;
    private javax.swing.JTextField txt_nombres;
    private javax.swing.JTextField txt_numero_identificacion;
    private javax.swing.JTextField txt_periodo;
    private javax.swing.JTextField txt_tipo_identificacion;
    // End of variables declaration//GEN-END:variables
}
