/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.views.estudiantes;

import ec.com.academico.dao.EstudiantesJpaController;
import ec.com.academico.dao.ParentescoJpaController;
import ec.com.academico.dao.TipoIdentificacionJpaController;
import ec.com.academico.dao.ext.ObtenerDTO;
import ec.com.academico.dao.ext.Validaciones;
import ec.com.academico.dao.ext.ValidarDTO;
import ec.com.academico.dto.Estudiantes;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.Representante;
import ec.com.academico.dto.TipoIdentificacion;
import ec.com.academico.util.ClaseReporte;
import ec.com.academico.util.EntityManagerUtil;
import ec.com.academico.util.FormatoFecha;
import ec.com.academico.util.ReporteEstudiante;
import ec.com.academico.views.cursos.ConsultaCursos;
import ec.com.academico.views.matricula.ConsultaMatriculas;
import java.awt.Dimension;
import java.awt.Image;
import java.awt.MouseInfo;
import java.awt.Point;
import java.math.BigInteger;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JDialog;
import javax.swing.JFileChooser;
import javax.swing.JOptionPane;
import javax.swing.filechooser.FileNameExtensionFilter;
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
public class EditarEstudiante extends javax.swing.JDialog {

    /**
     * Creates new form EditarEstudiante
     */
    int x, y;
    private String rutaimagen = "";
    public String fot;
    Representante representante = new Representante();
    Estudiantes est;
    List<TipoIdentificacion> listTipIdent;
    TipoIdentificacionJpaController tic = new TipoIdentificacionJpaController(EntityManagerUtil.obtenerEntityManager());
    List<Parentesco> listParent;
    ParentescoJpaController pc = new ParentescoJpaController(EntityManagerUtil.obtenerEntityManager());
    Representante objrepr2 = new Representante();
    FormatoFecha F = new FormatoFecha();
    EstudiantesJpaController ec = new EstudiantesJpaController(EntityManagerUtil.obtenerEntityManager());

    int ancho = java.awt.Toolkit.getDefaultToolkit().getScreenSize().width;

    public EditarEstudiante(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
    }

    public EditarEstudiante(java.awt.Frame parent, boolean modal, Estudiantes estu) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
        cargarcbxParentesco();
        cargarcbxTipoIdentificacion();
        est = estu;
        cargarDatos(est);
        activarArea();
//        if ("".equals(est.getRutaImagenCarnet())) {
//            Image img = new ImageIcon("ec.com.academico.iconos.usuario.png").getImage();
////            Image img = new ImageIcon("ec.com.academico.iconos.logologin.png").getImage();
//            ImageIcon img2 = new ImageIcon(img.getScaledInstance(258, 227, Image.SCALE_SMOOTH));
//            imagenUsuario.setIcon(img2);
//        }

    }

    public void cargarcbxParentesco() {
        listParent = pc.findParentescoEntities();
        for (int i = 0; i < listParent.size(); i++) {
            if (listParent.get(i).getEstado() == 'A') {
                cbx_Parentesco.addItem(listParent.get(i).getNombre());
            }
        }
    }

    public void cargarcbxTipoIdentificacion() {
        listTipIdent = tic.findTipoIdentificacionEntities();
        for (int i = 0; i < listTipIdent.size(); i++) {
            if (listTipIdent.get(i).getEstado() == 'A') {
                cbx_tipo_identificacion.addItem(listTipIdent.get(i).getIdentificacion());
            }
        }
    }

    private void cargarDatos(Estudiantes obj) {
        objrepr2.setIdRepresentante(obj.getIdRepresentante().getIdRepresentante());
        //

        txt_apellidos.setText(obj.getApellidos());
        txt_nombres.setText(obj.getNombres());
        txt_representante.setText(obj.getIdRepresentante().getNombres() + " " + obj.getIdRepresentante().getApellidos());
        TipoIdentificacion ident = ObtenerDTO.ObtenerIndetificacion(obj.getIdTipoIdentificacion().longValue());
        txt_tipo_identificacion.setText(ident.getIdentificacion());
        if (obj.getIdRepresentante().getTelefono().equals("")) {
            txt_telefono.setText("-");
        } else {
            txt_telefono.setText(obj.getIdRepresentante().getTelefono());
        }
        if (obj.getIdRepresentante().getCelular().equals("")) {
            txt_celular.setText("-");
        } else {
            txt_celular.setText(obj.getIdRepresentante().getCelular());
        }
        TxtA_direccion_domiciliaria.setText(obj.getDireccionDomiciliaria());
        txt_numero_ident.setText(obj.getIdRepresentante().getIdentificacion());
        txt_numero_identificacion1.setText(obj.getIdentificacion());
        taDiscapacidad.setText(obj.getDiscapacidad());
        jdc_Fecha_nacimiento.setDate(obj.getFechaNacimiento());
//        listTipIdent = tic.findTipoIdentificacionEntities();
        for (int i = 0; i < listTipIdent.size(); i++) {
            if (obj.getIdTipoIdentificacion().toString().equals(listTipIdent.get(i).getIdTipoIdentificacion().toString())) {
                cbx_tipo_identificacion.setSelectedItem(listTipIdent.get(i).getIdentificacion());
            }
        }
        if ("".equals(obj.getRutaImagenCarnet())) {
            Image img = new ImageIcon("ec.com.academico.iconos.usuario.png").getImage();
//            Image img = new ImageIcon("ec.com.academico.iconos.logologin.png").getImage();
            ImageIcon img2 = new ImageIcon(img.getScaledInstance(258, 227, Image.SCALE_SMOOTH));
            imagenUsuario.setIcon(img2);
        } else {
            getPicture2(obj.getRutaImagenCarnet());
        }
        for (int i = 0; i < listParent.size(); i++) {
            if (obj.getIdParentesco().getIdParentesco().toString().equals(listParent.get(i).getIdParentesco().toString())) {
                cbx_Parentesco.setSelectedItem(listParent.get(i).getNombre());
            }
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel6 = new javax.swing.JLabel();
        jPanel2 = new javax.swing.JPanel();
        txt_nombres = new javax.swing.JTextField();
        txt_apellidos = new javax.swing.JTextField();
        txt_numero_identificacion1 = new javax.swing.JTextField();
        cbx_tipo_identificacion = new javax.swing.JComboBox<>();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jdc_Fecha_nacimiento = new com.toedter.calendar.JDateChooser();
        cbDiscapacidad = new javax.swing.JCheckBox();
        jLabel10 = new javax.swing.JLabel();
        Cbx_Sexo = new javax.swing.JComboBox<>();
        jPanel5 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        taDiscapacidad = new javax.swing.JTextArea();
        jPanel6 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        TxtA_direccion_domiciliaria = new javax.swing.JTextArea();
        jPanel3 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        txt_representante = new javax.swing.JTextField();
        btn_esoger_representante = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();
        cbx_Parentesco = new javax.swing.JComboBox<>();
        jLabel3 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        txt_tipo_identificacion = new javax.swing.JTextField();
        txt_numero_ident = new javax.swing.JTextField();
        jLabel13 = new javax.swing.JLabel();
        txt_telefono = new javax.swing.JTextField();
        txt_celular = new javax.swing.JTextField();
        jPanel4 = new javax.swing.JPanel();
        BotonSinImagen = new javax.swing.JButton();
        BotonImagen = new javax.swing.JButton();
        imagenUsuario = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jPanel1.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));

        jLabel6.setBackground(new java.awt.Color(0, 153, 255));
        jLabel6.setFont(new java.awt.Font("Ubuntu", 1, 24)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(254, 254, 254));
        jLabel6.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel6.setText("EDITAR ESTUDIANTE");
        jLabel6.setOpaque(true);
        jLabel6.addMouseMotionListener(new java.awt.event.MouseMotionAdapter() {
            public void mouseDragged(java.awt.event.MouseEvent evt) {
                jLabel6MouseDragged(evt);
            }
        });
        jLabel6.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                jLabel6MousePressed(evt);
            }
        });

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "DATOS DEL ESTUDIANTE"));

        txt_nombres.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_nombresFocusLost(evt);
            }
        });
        txt_nombres.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_nombresKeyTyped(evt);
            }
        });

        txt_apellidos.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_apellidosFocusLost(evt);
            }
        });
        txt_apellidos.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_apellidosKeyTyped(evt);
            }
        });

        txt_numero_identificacion1.setEditable(false);
        txt_numero_identificacion1.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_numero_identificacion1KeyTyped(evt);
            }
        });

        jLabel7.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel7.setText("N° IDENTIFICACION :");

        jLabel8.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel8.setText("TIPO IDENTIFICACION :");

        jLabel9.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel9.setText("FECHA DE NACIMIENTO :");

        jLabel4.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel4.setText("NOMBRES : ");

        jLabel5.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel5.setText("APELLIDOS :");

        cbDiscapacidad.setText("DISCAPACIDAD");
        cbDiscapacidad.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbDiscapacidadActionPerformed(evt);
            }
        });

        jLabel10.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel10.setText("SEXO :");

        Cbx_Sexo.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "MASCULINO", "FEMENINO" }));

        jPanel5.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Descripcion de Discapacidad"));

        taDiscapacidad.setColumns(20);
        taDiscapacidad.setRows(5);
        jScrollPane1.setViewportView(taDiscapacidad);

        javax.swing.GroupLayout jPanel5Layout = new javax.swing.GroupLayout(jPanel5);
        jPanel5.setLayout(jPanel5Layout);
        jPanel5Layout.setHorizontalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 322, Short.MAX_VALUE)
        );
        jPanel5Layout.setVerticalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1)
        );

        jPanel6.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "DIRECCION DOMICILIARIA"));

        TxtA_direccion_domiciliaria.setColumns(20);
        TxtA_direccion_domiciliaria.setRows(5);
        jScrollPane2.setViewportView(TxtA_direccion_domiciliaria);

        javax.swing.GroupLayout jPanel6Layout = new javax.swing.GroupLayout(jPanel6);
        jPanel6.setLayout(jPanel6Layout);
        jPanel6Layout.setHorizontalGroup(
            jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane2)
        );
        jPanel6Layout.setVerticalGroup(
            jPanel6Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE)
        );

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(6, 6, 6)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel8)
                    .addComponent(jLabel4)
                    .addComponent(jLabel7)
                    .addComponent(jLabel5)
                    .addComponent(jLabel9)
                    .addComponent(jLabel10))
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(jdc_Fecha_nacimiento, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(txt_numero_identificacion1)
                        .addComponent(cbx_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, 114, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(txt_apellidos)
                        .addComponent(txt_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, 308, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(Cbx_Sexo, javax.swing.GroupLayout.PREFERRED_SIZE, 116, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(cbDiscapacidad)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addComponent(jPanel5, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addComponent(cbDiscapacidad)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel4)
                            .addComponent(txt_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel5)
                            .addComponent(txt_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel8)
                            .addComponent(cbx_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel7)
                            .addComponent(txt_numero_identificacion1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel9)
                            .addComponent(jdc_Fecha_nacimiento, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(12, 12, 12)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel10)
                            .addComponent(Cbx_Sexo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addContainerGap())
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jPanel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );

        jPanel3.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "REPRESENTANTE"));

        jLabel1.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel1.setText("REPRESENTANTE : ");

        txt_representante.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_representanteFocusLost(evt);
            }
        });

        btn_esoger_representante.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/representante.png"))); // NOI18N
        btn_esoger_representante.setText(".");
        btn_esoger_representante.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_esoger_representanteActionPerformed(evt);
            }
        });

        jLabel2.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel2.setText("PARENTESCO CON EL ESTUDIANTE :");

        cbx_Parentesco.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_ParentescoActionPerformed(evt);
            }
        });

        jLabel3.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel3.setText("TIPO IDENTIFICACION :");

        jLabel11.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel11.setText("TELEFONO :");

        jLabel12.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel12.setText("N° IDENTIFICACION :");

        txt_tipo_identificacion.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_tipo_identificacionFocusLost(evt);
            }
        });

        txt_numero_ident.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_numero_identFocusLost(evt);
            }
        });

        jLabel13.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        jLabel13.setText("CELULAR :");

        txt_telefono.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_telefonoFocusLost(evt);
            }
        });

        txt_celular.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_celularFocusLost(evt);
            }
        });

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel1)
                            .addComponent(jLabel11)
                            .addComponent(jLabel12)
                            .addComponent(jLabel3))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addComponent(txt_representante, javax.swing.GroupLayout.PREFERRED_SIZE, 270, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(btn_esoger_representante, javax.swing.GroupLayout.PREFERRED_SIZE, 1, Short.MAX_VALUE))
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(txt_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, 217, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txt_numero_ident, javax.swing.GroupLayout.PREFERRED_SIZE, 217, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txt_celular, javax.swing.GroupLayout.PREFERRED_SIZE, 217, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txt_telefono, javax.swing.GroupLayout.PREFERRED_SIZE, 217, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(0, 0, Short.MAX_VALUE))))
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addComponent(jLabel2)
                        .addGap(18, 18, 18)
                        .addComponent(cbx_Parentesco, javax.swing.GroupLayout.PREFERRED_SIZE, 169, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jLabel13))
                .addContainerGap())
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(txt_representante, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(btn_esoger_representante))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(txt_tipo_identificacion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel12)
                    .addComponent(txt_numero_ident, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel11)
                    .addComponent(txt_telefono, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel13)
                    .addComponent(txt_celular, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(cbx_Parentesco, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel4.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "FOTO CARNET"));

        BotonSinImagen.setFont(new java.awt.Font("Ubuntu", 1, 10)); // NOI18N
        BotonSinImagen.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/Remove_Image_icon-icons.com_54146.png"))); // NOI18N
        BotonSinImagen.setText("ELIMINAR");
        BotonSinImagen.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BotonSinImagenActionPerformed(evt);
            }
        });

        BotonImagen.setFont(new java.awt.Font("Ubuntu", 1, 10)); // NOI18N
        BotonImagen.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/Add_Image_icon-icons.com_54218 (1).png"))); // NOI18N
        BotonImagen.setText("AGREGAR");
        BotonImagen.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BotonImagenActionPerformed(evt);
            }
        });

        imagenUsuario.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(1, 1, 1), 2));

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(BotonImagen, javax.swing.GroupLayout.PREFERRED_SIZE, 147, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(BotonSinImagen, javax.swing.GroupLayout.PREFERRED_SIZE, 147, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                        .addComponent(imagenUsuario, javax.swing.GroupLayout.PREFERRED_SIZE, 223, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(34, 34, 34)))
                .addContainerGap())
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addComponent(imagenUsuario, javax.swing.GroupLayout.PREFERRED_SIZE, 183, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(BotonImagen, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(BotonSinImagen, javax.swing.GroupLayout.PREFERRED_SIZE, 36, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/Salir.png"))); // NOI18N
        jButton1.setText("SALIR");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setBackground(new java.awt.Color(51, 102, 255));
        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/salvar.png"))); // NOI18N
        jButton2.setText("GUARDAR");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        jButton4.setForeground(new java.awt.Color(255, 0, 51));
        jButton4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/ec/com/academico/iconos/imprimir.png"))); // NOI18N
        jButton4.setText("IMPRIMIR");
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLabel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(234, 234, 234)
                        .addComponent(jButton1)
                        .addGap(18, 18, 18)
                        .addComponent(jButton2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jButton4)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jPanel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(12, 12, 12)))))
                .addContainerGap())
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, 256, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jButton1, javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jButton2, javax.swing.GroupLayout.Alignment.TRAILING)
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

    private void jLabel6MouseDragged(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel6MouseDragged
        Point point = MouseInfo.getPointerInfo().getLocation();
        setLocation(point.x - x, point.y - y);
    }//GEN-LAST:event_jLabel6MouseDragged

    private void jLabel6MousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel6MousePressed
        x = evt.getX();
        y = evt.getY();
    }//GEN-LAST:event_jLabel6MousePressed

    private void txt_nombresFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_nombresFocusLost
        txt_nombres.setText(txt_nombres.getText().toUpperCase());
    }//GEN-LAST:event_txt_nombresFocusLost

    private void txt_nombresKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_nombresKeyTyped
        //        char car = evt.getKeyChar();
        //        if (Character.isLetter(car)) {
        //
        //        } else {
        //            evt.consume();
        //            getToolkit().beep();
        //        }
    }//GEN-LAST:event_txt_nombresKeyTyped

    private void txt_apellidosFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_apellidosFocusLost
        txt_apellidos.setText(txt_apellidos.getText().toUpperCase());
    }//GEN-LAST:event_txt_apellidosFocusLost

    private void txt_apellidosKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_apellidosKeyTyped
        //        char car = evt.getKeyChar();
        //        if (Character.isLetter(car)) {
        //
        //        } else {
        //            evt.consume();
        //            getToolkit().beep();
        //        }
    }//GEN-LAST:event_txt_apellidosKeyTyped

    private void txt_numero_identificacion1KeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_numero_identificacion1KeyTyped
        char car = evt.getKeyChar();
        if (Character.isDigit(car)) {

        } else {
            evt.consume();
            getToolkit().beep();
        }
    }//GEN-LAST:event_txt_numero_identificacion1KeyTyped
    public void activarArea() {
        if (cbDiscapacidad.isSelected() == false) {
            taDiscapacidad.setEditable(false);
        } else {
            taDiscapacidad.setEditable(true);
        }
    }
    private void cbDiscapacidadActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbDiscapacidadActionPerformed
        activarArea();
    }//GEN-LAST:event_cbDiscapacidadActionPerformed

    private void txt_representanteFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_representanteFocusLost
        txt_representante.setText(txt_representante.getText().toUpperCase());
    }//GEN-LAST:event_txt_representanteFocusLost

    private void btn_esoger_representanteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_esoger_representanteActionPerformed
        ConsultaEscogerRepresentante cr = new ConsultaEscogerRepresentante(new javax.swing.JFrame(), true);
        cr.setVisible(true);
        representante = cr.getObj();
        if (representante.getIdRepresentante() != null) {
            //            id_representante = representante.getIdRepresentante();
            txt_representante.setText(representante.getNombres() + " " + representante.getApellidos());
            txt_numero_ident.setText(representante.getIdentificacion());
            TipoIdentificacion ident = ObtenerDTO.ObtenerIndetificacion(representante.getIdTipoIdentificacion().longValue());
            txt_tipo_identificacion.setText(ident.getIdentificacion());
            txt_celular.setText(representante.getCelular());
            txt_telefono.setText(representante.getTelefono());
            //
            objrepr2.setIdRepresentante(representante.getIdRepresentante());
        } else {
            JOptionPane.showMessageDialog(null, "ELIJA UN REPRESENTANTE");
        }
        //        cargarTbaUsuario();
    }//GEN-LAST:event_btn_esoger_representanteActionPerformed

    private void cbx_ParentescoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_ParentescoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_cbx_ParentescoActionPerformed

    private void txt_tipo_identificacionFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_tipo_identificacionFocusLost
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_tipo_identificacionFocusLost

    private void txt_numero_identFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_numero_identFocusLost
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_numero_identFocusLost

    private void txt_telefonoFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_telefonoFocusLost
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_telefonoFocusLost

    private void txt_celularFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_celularFocusLost
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_celularFocusLost

    private void BotonSinImagenActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BotonSinImagenActionPerformed
        // TODO add your handling code here:
        VaciarImagen();
    }//GEN-LAST:event_BotonSinImagenActionPerformed
    public void VaciarImagen() {
        // String fil = "\\G:\\sin-imagen.png";
//        String fil = "//home//ineval//Escritorio//P-FARMACIA UBUNTU//sin-imagen.png";

        imagenUsuario.setIcon(new ImageIcon(fot));
        ImageIcon icon = new ImageIcon(fot);
        Image img = icon.getImage();
        System.out.println(fot + " Foto " + imagenUsuario.getWidth() + " " + imagenUsuario.getHeight());
        Image newimg = img.getScaledInstance(223, 172, java.awt.Image.SCALE_SMOOTH);
        ImageIcon newIcono = new ImageIcon(newimg);
        imagenUsuario.setIcon(newIcono);
        rutaimagen = fot;
    }
    private void BotonImagenActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BotonImagenActionPerformed
        // TODO add your handling code here:
        String pass = "";
        getPicture(pass);
    }//GEN-LAST:event_BotonImagenActionPerformed
    private void getPicture(String path) {
        JFileChooser dig = new JFileChooser(path);
        dig.setFileFilter(new FileNameExtensionFilter("Archivos de imagen",
                "tif", "jpg", "jpeg", "png", "gif"));
        int opcion = dig.showOpenDialog(this);
        if (opcion == JFileChooser.APPROVE_OPTION) {
            String fil = dig.getSelectedFile().getPath();
            imagenUsuario.setIcon(new ImageIcon(fil));
            ImageIcon icon = new ImageIcon(fil);
            Image img = icon.getImage();
            Image newimg = img.getScaledInstance(223, 172, java.awt.Image.SCALE_SMOOTH);
            ImageIcon newIcono = new ImageIcon(newimg);
            imagenUsuario.setIcon(newIcono);
            rutaimagen = dig.getSelectedFile().getPath();
            // rutaimagen = Cadenas.getPathMysql(dig.getSelectedFile().getPath());
            System.out.println(fil + " Foto " + imagenUsuario.getWidth() + " " + imagenUsuario.getHeight());
        }
    }

    private void getPicture2(String path) {
        //JFileChooser dig = new JFileChooser(path);
        //dig.setFileFilter(new FileNameExtensionFilter("Archivos de imagen",
        //  "tif", "jpg", "jpeg", "png", "gif"));
        //int opcion = dig.showOpenDialog(this);
        //if (opcion == JFileChooser.APPROVE_OPTION) {
        //fot = dig.getSelectedFile().getPath();
        //rutaimagen = dig.getSelectedFile().getPath();
        rutaimagen = path;
        imagenUsuario.setIcon(new ImageIcon(path));
        ImageIcon icon = new ImageIcon(path);
        Image img = icon.getImage();
        Image newimg = img.getScaledInstance(223, 172, java.awt.Image.SCALE_SMOOTH);
        ImageIcon newIcono = new ImageIcon(newimg);
        imagenUsuario.setIcon(newIcono);
//        System.out.println(fot + " Foto " + imagenUsuario.getWidth() + " " + imagenUsuario.getHeight());
//        System.out.println("ruta= " + rutaimagen + "\n"
//                + "ruta2 " + fot);
    }
    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        setVisible(false);
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        guardar();
    }//GEN-LAST:event_jButton2ActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
//        ConsultaCursos cc = new ConsultaCursos(new javax.swing.JFrame(), true);
//        cc.setVisible(true);
        ArrayList tablac = new ArrayList();
//        String fecha = FormatoFecha.getStringFecha(java.sql.Date.valueOf(est.getFechaNacimiento().toString()));
//         for (int i = 0; i < TbaRepresentante.getRowCount(); i++) {
        String numeroidentEst = txt_numero_identificacion1.getText().toString();
        String ApellidosEst = txt_apellidos.getText().toString();
        String NombresEst = txt_nombres.getText().toString();
        String tipoidentEst = cbx_tipo_identificacion.getSelectedItem().toString();
        String FechaNacimEst = est.getFechaNacimiento().toString();
        String SexoEst = Cbx_Sexo.getSelectedItem().toString();
        String DiscapEst = taDiscapacidad.getText().toString();
        String Representante = txt_representante.getText().toString();
        String TelefoRepres = txt_telefono.getText().toString();
        String CelularRepres = txt_celular.getText().toString();
        String TipoIdentRepres = txt_tipo_identificacion.getText().toString();
        String NumeIdentRepres = txt_numero_ident.getText().toString();
        String ParenteRepres = cbx_Parentesco.getSelectedItem().toString();
        String Direccion = TxtA_direccion_domiciliaria.getText().toString();
        Map parametros = new HashMap();
        parametros.clear();
        if (rutaimagen.toString() == "") {
//            parametros.put("FotoCarnet", newimg);
        } else {
            ImageIcon icon = new ImageIcon(rutaimagen);
            parametros.put("FotoCarnet", icon.getImage());
        }
        ReporteEstudiante p = new ReporteEstudiante(numeroidentEst, ApellidosEst, NombresEst, tipoidentEst, FechaNacimEst,
                SexoEst, DiscapEst, Representante, TelefoRepres, CelularRepres, TipoIdentRepres,
                NumeIdentRepres, ParenteRepres, Direccion);

        tablac.add(p);
        try {

//            String dir = System.getProperty("user.dir") + "/src/" + "/ec/" + "/com/" + "/academico/" + "/views/" + "/report/"
//                    + "FichaEstudiante.jasper";
            String dir = "/ec/com/academico/views/report/FichaEstudiante.jasper";
//            C:\Users\Xtratech\Documents\NetBeansProjects\SistemaAcademico\SistemaAcademico\src\ec\com\academico\views\report
//            JasperReport reporte = (JasperReport) JRLoader.loadObject(dir);
            JasperReport reporte = (JasperReport) JRLoader.loadObject(getClass().getResource(dir));
            JasperPrint jprint = JasperFillManager.fillReport(reporte, parametros, new JRBeanCollectionDataSource(tablac));

//            JasperPrint jprint = JasperFillManager.fillReport(reporte, parametros, new JRBeanCollectionDataSource(tablac));
// formato de repot 
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
    }//GEN-LAST:event_jButton4ActionPerformed
    public void guardar() {
        try {
            est.setIdRepresentante(objrepr2);
            est.setNombres(txt_nombres.getText());
            est.setApellidos(txt_apellidos.getText());
            String FechaNacimiento = F.getFechaChooser(jdc_Fecha_nacimiento);
            Date Formato = new SimpleDateFormat("yyyy-MM-dd").parse(FechaNacimiento);
            est.setFechaNacimiento(Formato);
            est.setRutaImagenCarnet(rutaimagen);
            est.setDireccionDomiciliaria(TxtA_direccion_domiciliaria.getText());
            if (cbDiscapacidad.isSelected() == false) {
                est.setDiscapacidad("NO");
            } else {
                est.setDiscapacidad(taDiscapacidad.getText());
            }
            if (Cbx_Sexo.getSelectedItem().equals("MASCULINO")) {
                est.setSexo('M');
            } else {
                est.setSexo('F');
            }
            Parentesco paren = ObtenerDTO.ObtenerParentesco(cbx_Parentesco.getSelectedItem().toString());
            est.setIdParentesco(paren);

            ec.edit(est);
            setVisible(false);
            JOptionPane.showMessageDialog(this, "GUARDADO EXITOSAMENTE");
        } catch (Exception ex) {
            Logger.getLogger(EditarEstudiante.class.getName()).log(Level.SEVERE, null, ex);
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
            java.util.logging.Logger.getLogger(EditarEstudiante.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(EditarEstudiante.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(EditarEstudiante.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(EditarEstudiante.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                EditarEstudiante dialog = new EditarEstudiante(new javax.swing.JFrame(), true);
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
    private javax.swing.JButton BotonImagen;
    private javax.swing.JButton BotonSinImagen;
    private javax.swing.JComboBox<String> Cbx_Sexo;
    private javax.swing.JTextArea TxtA_direccion_domiciliaria;
    private javax.swing.JButton btn_esoger_representante;
    private javax.swing.JCheckBox cbDiscapacidad;
    private javax.swing.JComboBox<String> cbx_Parentesco;
    private javax.swing.JComboBox<String> cbx_tipo_identificacion;
    private javax.swing.JLabel imagenUsuario;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton4;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    private javax.swing.JPanel jPanel6;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private com.toedter.calendar.JDateChooser jdc_Fecha_nacimiento;
    private javax.swing.JTextArea taDiscapacidad;
    private javax.swing.JTextField txt_apellidos;
    private javax.swing.JTextField txt_celular;
    private javax.swing.JTextField txt_nombres;
    private javax.swing.JTextField txt_numero_ident;
    private javax.swing.JTextField txt_numero_identificacion1;
    private javax.swing.JTextField txt_representante;
    private javax.swing.JTextField txt_telefono;
    private javax.swing.JTextField txt_tipo_identificacion;
    // End of variables declaration//GEN-END:variables
}
