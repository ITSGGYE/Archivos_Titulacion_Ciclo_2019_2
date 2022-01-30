
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ButtonGroup;
import javax.swing.JOptionPane;

public class frm_estudiantes extends javax.swing.JInternalFrame {
//Para los datos del estudiante
    public static String a_ced="";
    public int cod_alu=0            , a_nacion=1        ;
    public String a_nom=""          ,   a_ape=""        ,   a_dir=""        ;
    public String a_sex=""          ,   a_lug_nac=""    ;                             ;
    public String a_vive_padres="N"  ,   a_observ=""     ;
    public String a_est=""          ;
//Para validaciones varias  
    public int a_conf=0         ,   a_oper=0      ,   a_grabado=0   ;
    public int a_dat_nec=0      ,   a_cant=12      ;
    public String a_sql=""      ;
//Catidad maxima de caracteres
    public int ap=35    ,   nm=35   ,   dr=60   ,   ln=25   ,   obsv=200;
//Formato y valdaciones generales    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
//Para trabajar con fechas    
    public Date fecha = new Date();
    public SimpleDateFormat formatofecha = new SimpleDateFormat("yyyy-MM-dd");
    public String a_f_nac ="";

    public frm_estudiantes() {
        initComponents();
        this.setTitle("Información Estudiante");//Titulo formulario
        vl.logo_jif(this,a_cant);
        formato_objet();
        color_campos_oblig();
    //Agrupa Radio Button
        ButtonGroup gbtn_a_sex = new ButtonGroup();
        gbtn_a_sex.add(rdb_a_mujer);
        gbtn_a_sex.add(rdb_a_hombre);
        ButtonGroup gbtn_a_vs = new ButtonGroup();
        gbtn_a_vs.add(rdb_a_vs);
        gbtn_a_vs.add(rdb_a_vn); 
        habil_panel(false); 
        vl.col_orig5(btn_e_nue,btn_e_mod,btn_e_eli,btn_e_guardar,btn_e_salir);
        jdc_fec_nac.setDate(fecha);
        btn_e_guardar.setEnabled(false);
        btn_e_lim.setEnabled(false);
        btn_a_bus_ced.setEnabled(false);       
        rdb_a_mujer.setBackground(vl.ama);
        rdb_a_hombre.setBackground(vl.ama);
        rdb_a_vs.setBackground(vl.ama);
        rdb_a_vn.setBackground(vl.ama);
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_e_nue = new javax.swing.JButton();
        btn_e_mod = new javax.swing.JButton();
        btn_e_eli = new javax.swing.JButton();
        btn_e_lim = new javax.swing.JButton();
        btn_e_guardar = new javax.swing.JButton();
        btn_e_salir = new javax.swing.JButton();
        pnl_dat_est = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_5 = new javax.swing.JLabel();
        lbl_3 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        lbl_4 = new javax.swing.JLabel();
        lbl_8 = new javax.swing.JLabel();
        lbl_9 = new javax.swing.JLabel();
        lbl_7 = new javax.swing.JLabel();
        txt_e_cedula = new javax.swing.JTextField();
        btn_a_bus_ced = new javax.swing.JButton();
        rdb_a_mujer = new javax.swing.JRadioButton();
        rdb_a_hombre = new javax.swing.JRadioButton();
        txt_e_apellidos = new javax.swing.JTextField();
        txt_e_nombres = new javax.swing.JTextField();
        txt_e_dir = new javax.swing.JTextField();
        txt_e_lug_nac = new javax.swing.JTextField();
        rdb_a_vs = new javax.swing.JRadioButton();
        rdb_a_vn = new javax.swing.JRadioButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        txt_e_observ = new javax.swing.JTextArea();
        lbl_6 = new javax.swing.JLabel();
        cmb_nacion = new javax.swing.JComboBox<>();
        jdc_fec_nac = new com.toedter.calendar.JDateChooser();

        setClosable(true);
        setIconifiable(true);
        addInternalFrameListener(new javax.swing.event.InternalFrameListener() {
            public void internalFrameActivated(javax.swing.event.InternalFrameEvent evt) {
            }
            public void internalFrameClosed(javax.swing.event.InternalFrameEvent evt) {
                formInternalFrameClosed(evt);
            }
            public void internalFrameClosing(javax.swing.event.InternalFrameEvent evt) {
            }
            public void internalFrameDeactivated(javax.swing.event.InternalFrameEvent evt) {
            }
            public void internalFrameDeiconified(javax.swing.event.InternalFrameEvent evt) {
            }
            public void internalFrameIconified(javax.swing.event.InternalFrameEvent evt) {
            }
            public void internalFrameOpened(javax.swing.event.InternalFrameEvent evt) {
            }
        });

        jtb_est_opc.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        jtb_est_opc.setRollover(true);

        btn_e_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Nuevo.png"))); // NOI18N
        btn_e_nue.setText("Nuevo");
        btn_e_nue.setToolTipText("Nuevo");
        btn_e_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_nue.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_nue.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_nue.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_nue);

        btn_e_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Modificar.png"))); // NOI18N
        btn_e_mod.setText("Modificar");
        btn_e_mod.setToolTipText("Modificar");
        btn_e_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_mod.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_mod.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_mod.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_mod);

        btn_e_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Eliminar.png"))); // NOI18N
        btn_e_eli.setText("Eliminar");
        btn_e_eli.setToolTipText("Eliminar");
        btn_e_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_eli.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_eli.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_eli.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_eli);

        btn_e_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_e_lim.setText("Limpiar");
        btn_e_lim.setToolTipText("Limpiar Formulario");
        btn_e_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_lim.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_lim.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_lim.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_lim);

        btn_e_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_e_guardar.setText("Guardar");
        btn_e_guardar.setToolTipText("Guardar");
        btn_e_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_guardar.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_guardar.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_guardar.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_guardar);

        btn_e_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_e_salir.setText("Salir");
        btn_e_salir.setToolTipText("Salir");
        btn_e_salir.setFocusable(false);
        btn_e_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_e_salir.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_e_salir.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_e_salir.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_e_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_e_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_e_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_e_salir);

        pnl_dat_est.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        lbl_5.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_5.setText("Lugar de Nacimiento:");

        lbl_3.setText("Nombres:");

        lbl_2.setText("Apellidos:");

        lbl_4.setText("Domicilio:");

        lbl_8.setText("F Nacimiento;");

        lbl_9.setText("Vive con Papa o Mama");

        lbl_7.setText("Observaciones");

        txt_e_cedula.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_e_cedulaFocusLost(evt);
            }
        });
        txt_e_cedula.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_e_cedulaKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_e_cedulaKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_cedulaKeyTyped(evt);
            }
        });

        btn_a_bus_ced.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_a_bus_ced.setToolTipText("Buscar Estudiante");
        btn_a_bus_ced.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_a_bus_cedActionPerformed(evt);
            }
        });

        rdb_a_mujer.setForeground(new java.awt.Color(0, 153, 153));
        rdb_a_mujer.setText("Mujer");
        rdb_a_mujer.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdb_a_mujerActionPerformed(evt);
            }
        });
        rdb_a_mujer.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                rdb_a_mujerKeyPressed(evt);
            }
        });

        rdb_a_hombre.setForeground(new java.awt.Color(0, 153, 153));
        rdb_a_hombre.setText("Hombre");
        rdb_a_hombre.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdb_a_hombreActionPerformed(evt);
            }
        });
        rdb_a_hombre.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                rdb_a_hombreKeyPressed(evt);
            }
        });

        txt_e_apellidos.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_e_apellidosKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_e_apellidosKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_apellidosKeyTyped(evt);
            }
        });

        txt_e_nombres.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_e_nombresActionPerformed(evt);
            }
        });
        txt_e_nombres.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_e_nombresKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_e_nombresKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_nombresKeyTyped(evt);
            }
        });

        txt_e_dir.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_e_dirKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_e_dirKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_dirKeyTyped(evt);
            }
        });

        txt_e_lug_nac.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_e_lug_nacKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_lug_nacKeyTyped(evt);
            }
        });

        rdb_a_vs.setForeground(new java.awt.Color(0, 153, 153));
        rdb_a_vs.setText("Si");
        rdb_a_vs.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdb_a_vsActionPerformed(evt);
            }
        });
        rdb_a_vs.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                rdb_a_vsKeyPressed(evt);
            }
        });

        rdb_a_vn.setForeground(new java.awt.Color(0, 153, 153));
        rdb_a_vn.setText("No");
        rdb_a_vn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdb_a_vnActionPerformed(evt);
            }
        });
        rdb_a_vn.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                rdb_a_vnKeyPressed(evt);
            }
        });

        txt_e_observ.setColumns(20);
        txt_e_observ.setRows(5);
        txt_e_observ.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_e_observKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_e_observKeyTyped(evt);
            }
        });
        jScrollPane1.setViewportView(txt_e_observ);

        lbl_6.setText("Nacionalidad:");

        cmb_nacion.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Nacional", "Extranjero", " " }));
        cmb_nacion.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                cmb_nacionMouseClicked(evt);
            }
        });
        cmb_nacion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_nacionActionPerformed(evt);
            }
        });

        jdc_fec_nac.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N

        javax.swing.GroupLayout pnl_dat_estLayout = new javax.swing.GroupLayout(pnl_dat_est);
        pnl_dat_est.setLayout(pnl_dat_estLayout);
        pnl_dat_estLayout.setHorizontalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_4)
                            .addComponent(lbl_3)
                            .addComponent(lbl_2)
                            .addComponent(lbl_1)
                            .addComponent(lbl_5))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                .addComponent(txt_e_lug_nac, javax.swing.GroupLayout.PREFERRED_SIZE, 166, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(63, 63, 63)
                                .addComponent(lbl_9)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(rdb_a_vs)
                                .addGap(10, 10, 10)
                                .addComponent(rdb_a_vn))
                            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                .addComponent(txt_e_cedula, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(btn_a_bus_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(rdb_a_mujer)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(rdb_a_hombre))
                            .addComponent(txt_e_dir, javax.swing.GroupLayout.PREFERRED_SIZE, 357, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                        .addGap(3, 3, 3)
                                        .addComponent(txt_e_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, 215, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                        .addComponent(lbl_8))
                                    .addComponent(txt_e_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, 221, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(18, 18, 18)
                                .addComponent(jdc_fec_nac, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_7)
                            .addComponent(lbl_6))
                        .addGap(53, 53, 53)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 458, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(cmb_nacion, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_dat_estLayout.setVerticalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_a_bus_ced)
                    .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_e_cedula, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_1))
                    .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(rdb_a_mujer)
                        .addComponent(rdb_a_hombre)))
                .addGap(14, 14, 14)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_e_apellidos, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_3)
                            .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(txt_e_nombres, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(lbl_8)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_e_dir, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_4))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_e_lug_nac, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_5)
                            .addComponent(lbl_9)
                            .addComponent(rdb_a_vs)
                            .addComponent(rdb_a_vn))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lbl_6)
                            .addComponent(cmb_nacion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(jdc_fec_nac, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(11, 11, 11)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_7))
                .addContainerGap(19, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnl_dat_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_est, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_e_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_nueActionPerformed
        //limpiar();  
        a_oper = 1;
        vl.col_orig5(btn_e_nue,btn_e_mod,btn_e_eli,btn_e_guardar,btn_e_salir);
        this.setTitle("Nuevo Estudiante");//Titulo formulario
        btn_e_nue.setBackground(vl.ama);
        habil_panel(true);
        bloquear_obj(true);
        btn_a_bus_ced.setEnabled(false);
        txt_e_cedula.requestFocus();
        btn_e_guardar.setEnabled(true);
        btn_e_lim.setEnabled(true);
    }//GEN-LAST:event_btn_e_nueActionPerformed

    private void btn_e_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_modActionPerformed
        a_oper = 2;
        vl.col_orig5(btn_e_nue,btn_e_mod,btn_e_eli,btn_e_guardar,btn_e_salir);
        this.setTitle("Modificar Informacón del Estudiante");//Titulo formulario
        btn_e_mod.setBackground(vl.ama);
        if (cod_alu>0){
            habil_panel(true);
            bloquear_obj(true);
        }else{
            habil_panel(false);
            bloquear_obj(false);
        }
        txt_e_cedula.setEditable(true);
        txt_e_cedula.setEnabled(true);
        txt_e_cedula.requestFocus();
        btn_a_bus_ced.setEnabled(true);
        rdb_a_mujer.setEnabled(false);
        rdb_a_hombre.setEnabled(false);
        rdb_a_vs.setEnabled(false);
        rdb_a_vn.setEnabled(false);
        btn_e_guardar.setEnabled(true);
        btn_e_lim.setEnabled(true);
        
    }//GEN-LAST:event_btn_e_modActionPerformed

    private void btn_e_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_eliActionPerformed
        a_oper = 3;
        vl.col_orig5(btn_e_nue,btn_e_mod,btn_e_eli,btn_e_guardar,btn_e_salir);
        this.setTitle("Eliminar Datos del Estudiante");//Titulo formulario
        btn_e_eli.setBackground(vl.ama);
        habil_panel(true);
        bloquear_obj(false);
        jdc_fec_nac.setEnabled(false);
        txt_e_cedula.setEditable(true);
        btn_a_bus_ced.setEnabled(true);
        txt_e_cedula.requestFocus();   
        rdb_a_mujer.setEnabled(false);
        rdb_a_hombre.setEnabled(false);
        rdb_a_vs.setEnabled(false);
        rdb_a_vn.setEnabled(false);
        cmb_nacion.setEnabled(false);
        btn_e_guardar.setEnabled(true);
        btn_e_lim.setEnabled(true);
        
    }//GEN-LAST:event_btn_e_eliActionPerformed

    private void btn_e_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_limActionPerformed
        limpiar();
 
    }//GEN-LAST:event_btn_e_limActionPerformed

    private void btn_e_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_guardarActionPerformed
        if (a_oper==1 || a_oper==2){
            a_dat_nec=1;
            verif_dat_neces();
            if (a_dat_nec==1){
                capt_datos();
                if(a_oper==1){                    
                    a_dat_nec=1;
                    verif_ced_rep();
                    if (a_dat_nec==1){
                        a_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del Estudiante?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (a_conf==0){
                            CRUD_Estudiante a_i_alu = new CRUD_Estudiante();
                            a_grabado = a_i_alu.agre_alumno(a_ced,a_ape,a_nom,a_dir,a_sex,a_f_nac,a_lug_nac,a_vive_padres,a_observ,a_nacion);
                            if(a_grabado == 0){
                                JOptionPane.showMessageDialog(this, "El Estudiante '"+ a_ape+"' '"+ a_nom+"' no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                JOptionPane.showMessageDialog(this, "El Estudiante '"+ a_ape+"' '"+ a_nom+"' fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                limpiar();
                            }
                        }
                    }
                }
                
                if(a_oper==2){
                    a_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos del Estudiante seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (a_conf==0){
                        CRUD_Estudiante a_a_alu = new CRUD_Estudiante();
                        a_grabado = a_a_alu.act_alum(cod_alu,a_ced, a_ape, a_nom, a_dir,a_sex, a_f_nac,a_lug_nac, a_vive_padres, a_observ, a_nacion);
                        if(a_grabado != 0){
                            JOptionPane.showMessageDialog(this, "Los datos del Estudiante "+ a_ape+" "+ a_nom+" se actualizaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            limpiar();
                        }else{
                            JOptionPane.showMessageDialog(this, "Los datos del Estudiante "+ a_ape+" "+ a_nom+" no se pudieron actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            //limpiar();
                        }
                    }
                }
            }
        }
        if(a_oper==3){
            a_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar los datos del Estudiante seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (a_conf==0){
                CRUD_Estudiante a_e_alu = new CRUD_Estudiante();
                a_grabado = a_e_alu.eli_alu(cod_alu);
                if(a_grabado == 1){
                    JOptionPane.showMessageDialog(this, "Los datos del Estudiante '"+ a_ape+"' '"+ a_nom+"' fueron eliminados del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                    cod_alu=0;
                    limpiar();
                }else{
                    JOptionPane.showMessageDialog(this, "Los datos del Estudiante '"+ a_ape+"' '"+ a_nom+"' no fueron eliminados del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    
                }
            }
        }
    }//GEN-LAST:event_btn_e_guardarActionPerformed

    private void btn_e_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_e_salirActionPerformed
        frm_principal.v_estud = null;
        this.dispose();
    }//GEN-LAST:event_btn_e_salirActionPerformed

    private void txt_e_cedulaKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_cedulaKeyPressed

    }//GEN-LAST:event_txt_e_cedulaKeyPressed

    private void txt_e_cedulaKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_cedulaKeyReleased
    
    }//GEN-LAST:event_txt_e_cedulaKeyReleased

    private void txt_e_cedulaKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_cedulaKeyTyped
        a_cant = txt_e_cedula.getText().length();
        if (a_cant>= 0 && a_cant<10 ) vl.Solo_Numeros(evt);
        if (a_cant == 10){
            vl.max_carateres_txt(txt_e_cedula,a_cant,evt);
            if(a_oper==1|| a_oper==2) verif_ced_rep();
        } 
    }//GEN-LAST:event_txt_e_cedulaKeyTyped

    private void btn_a_bus_cedActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_a_bus_cedActionPerformed
        a_ced="";
        if (txt_e_cedula.getText().length()==10 ){
            a_dat_nec=1;
            a_ced=txt_e_cedula.getText();
            a_dat_nec=vl.verif_cedula(a_ced, txt_e_cedula);
            if(a_dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_e_cedula.requestFocus();
            }
            if (a_dat_nec==1){
                try {
                    bus_est(a_ced);                    
                } catch (ParseException ex) {
                    Logger.getLogger(frm_estudiantes.class.getName()).log(Level.SEVERE, null, ex);
                }                
            }
        }else{
            if(frm_principal.v_busc_estud==null && frm_principal.v_busc_emple==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_estud = new frm_buscar_estudiante();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_estud);
                frm_principal.v_busc_estud.formul=1;      
            }else{
                frm_principal.enfocar_ventana();  
            }
        }
    }//GEN-LAST:event_btn_a_bus_cedActionPerformed

    private void rdb_a_mujerActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdb_a_mujerActionPerformed
        a_sex = "F";
    }//GEN-LAST:event_rdb_a_mujerActionPerformed

    private void rdb_a_mujerKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_rdb_a_mujerKeyPressed

    }//GEN-LAST:event_rdb_a_mujerKeyPressed

    private void rdb_a_hombreActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdb_a_hombreActionPerformed
        a_sex = "M";
    }//GEN-LAST:event_rdb_a_hombreActionPerformed

    private void rdb_a_hombreKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_rdb_a_hombreKeyPressed

    }//GEN-LAST:event_rdb_a_hombreKeyPressed

    private void txt_e_apellidosKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_apellidosKeyPressed

    }//GEN-LAST:event_txt_e_apellidosKeyPressed

    private void txt_e_apellidosKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_apellidosKeyReleased

    }//GEN-LAST:event_txt_e_apellidosKeyReleased

    private void txt_e_apellidosKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_apellidosKeyTyped
        a_cant = txt_e_apellidos.getText().length();
        if (a_cant>= 0 && a_cant<ap ) vl.Solo_Letras(evt);
        if (a_cant == ap) vl.max_carateres_txt(txt_e_apellidos,a_cant,evt);
    }//GEN-LAST:event_txt_e_apellidosKeyTyped

    private void txt_e_nombresActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_e_nombresActionPerformed

    }//GEN-LAST:event_txt_e_nombresActionPerformed

    private void txt_e_nombresKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_nombresKeyPressed

    }//GEN-LAST:event_txt_e_nombresKeyPressed

    private void txt_e_nombresKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_nombresKeyReleased

    }//GEN-LAST:event_txt_e_nombresKeyReleased

    private void txt_e_nombresKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_nombresKeyTyped
        a_cant = txt_e_nombres.getText().length();
        if (a_cant>= 0 && a_cant<nm ) vl.Solo_Letras(evt);
        if (a_cant == nm) vl.max_carateres_txt(txt_e_nombres,a_cant,evt);
    }//GEN-LAST:event_txt_e_nombresKeyTyped

    private void txt_e_dirKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_dirKeyPressed

    }//GEN-LAST:event_txt_e_dirKeyPressed

    private void txt_e_dirKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_dirKeyReleased

    }//GEN-LAST:event_txt_e_dirKeyReleased

    private void txt_e_dirKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_dirKeyTyped
        a_cant = dr;
        vl.max_carateres_txt(txt_e_dir,a_cant,evt);
    }//GEN-LAST:event_txt_e_dirKeyTyped

    private void txt_e_lug_nacKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_lug_nacKeyPressed

    }//GEN-LAST:event_txt_e_lug_nacKeyPressed

    private void txt_e_lug_nacKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_lug_nacKeyTyped
        a_cant = txt_e_lug_nac.getText().length();
        if (a_cant>= 0 && a_cant<ln ) vl.Solo_Letras(evt);
        if (a_cant == ln) vl.max_carateres_txt(txt_e_lug_nac,a_cant,evt);
    }//GEN-LAST:event_txt_e_lug_nacKeyTyped

    private void rdb_a_vsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdb_a_vsActionPerformed
        a_vive_padres ="S";
    }//GEN-LAST:event_rdb_a_vsActionPerformed

    private void rdb_a_vsKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_rdb_a_vsKeyPressed

    }//GEN-LAST:event_rdb_a_vsKeyPressed

    private void rdb_a_vnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdb_a_vnActionPerformed
        a_vive_padres ="N";
    }//GEN-LAST:event_rdb_a_vnActionPerformed

    private void rdb_a_vnKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_rdb_a_vnKeyPressed

    }//GEN-LAST:event_rdb_a_vnKeyPressed

    private void txt_e_observKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_observKeyReleased

    }//GEN-LAST:event_txt_e_observKeyReleased

    private void txt_e_observKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_e_observKeyTyped
        a_cant = obsv;
        vl.max_carateres_caj(txt_e_observ,a_cant,evt);
    }//GEN-LAST:event_txt_e_observKeyTyped

    private void cmb_nacionMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_cmb_nacionMouseClicked
        if("Nacional".equals(cmb_nacion.getSelectedItem())) { a_nacion=1 ;
        }else{                  a_nacion=2;        }
    }//GEN-LAST:event_cmb_nacionMouseClicked

    private void cmb_nacionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_nacionActionPerformed
        if("Nacional".equals(cmb_nacion.getSelectedItem())) { a_nacion=1 ;
        }else{                  a_nacion=2;        }
    }//GEN-LAST:event_cmb_nacionActionPerformed

    private void txt_e_cedulaFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_e_cedulaFocusLost

    }//GEN-LAST:event_txt_e_cedulaFocusLost

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_estud = null;
    }//GEN-LAST:event_formInternalFrameClosed
    public  void  bus_est(String cd_est) throws ParseException{
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            a_sql="SELECT id,cedula,apellidos,nombres,direccion, \n" +
                "sexo,fecha_nac,lug_nac,vive_padres, \n" +
                "observaciones,nacionalidad \n" +
                "FROM alumno WHERE cedula = '"+cd_est+"' AND est_reg= '"+a_est+"' ";
            ResultSet rs = b_est.select(a_sql);
            if (rs.next()!= false){
                cod_alu=rs.getInt("id");
                txt_e_cedula.setText(rs.getString("cedula") );
                txt_e_apellidos.setText(rs.getString("apellidos") );
                txt_e_nombres.setText(rs.getString("nombres") );
                txt_e_dir.setText(rs.getString("direccion") );
                a_sex=rs.getString("sexo");
                if("F".equals(a_sex)) rdb_a_mujer.setSelected(true);
                if("M".equals(a_sex)) rdb_a_hombre.setSelected(true);
                fecha = formatofecha.parse(rs.getString("fecha_nac"));
                a_f_nac=rs.getString("fecha_nac");
                jdc_fec_nac.setDate(fecha);
                txt_e_lug_nac.setText(rs.getString("lug_nac") );
                a_vive_padres=rs.getString("vive_padres");                
                if("S".equals(a_vive_padres)) rdb_a_vs.setSelected(true);
                if("N".equals(a_vive_padres)) rdb_a_vn.setSelected(true);
                txt_e_observ.setText(rs.getString("observaciones") );
                a_nacion=rs.getInt("nacionalidad");
                if (a_nacion==1){  cmb_nacion.setSelectedItem("Nacional");                  
                }else{              cmb_nacion.setSelectedItem("Extranjero");  }
                btn_e_guardar.setEnabled(true);
                if (a_oper==2){
                        habil_panel(true);
                        bloquear_obj(true);
                }else{
                    habil_panel(true);
                    bloquear_obj(false);
                    txt_e_cedula.setEditable(true);
                    cmb_nacion.setEnabled(false);
                }               
            }else{
                JOptionPane.showMessageDialog(this, "El número de Cédula '"+cd_est+"' no existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_e_cedula.requestFocus();
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_estudiantes.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    private void verif_dat_neces(){
        if (txt_e_cedula.getText().length()==0 ){
            JOptionPane.showMessageDialog(this, "Debe ingresar el número de Cédula del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            txt_e_cedula.requestFocus();             
            a_dat_nec=0;
        }else{
            if (txt_e_cedula.getText().length()<10 ){
                JOptionPane.showMessageDialog(this, "Faltan digitos en el número de Cédula del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_e_cedula.requestFocus();             
                a_dat_nec=0;
            }else{      
                a_ced=txt_e_cedula.getText();
                a_dat_nec=vl.verif_cedula(a_ced,txt_e_cedula);
                if (a_dat_nec==0){
                    JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    txt_e_cedula.requestFocus();
                    a_dat_nec=0;
                }else{    
                    if (txt_e_apellidos.getText().length()==0 ){
                        JOptionPane.showMessageDialog(this, "Debe de ingresar los Apellidos del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_e_apellidos.requestFocus();             
                        a_dat_nec=0;
                    }else{
                        if (txt_e_nombres.getText().length()==0 ){
                        JOptionPane.showMessageDialog(this, "Debe de ingresar los Nombres del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_e_nombres.requestFocus();             
                        a_dat_nec=0;
                        }else{
                            if (txt_e_dir.getText().length()==0 ){
                                JOptionPane.showMessageDialog(this, "Debe de ingresar el domicilio del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                txt_e_dir.requestFocus();             
                                a_dat_nec=0;
                            }else{
                                if ("".equals(a_sex) ){
                                    JOptionPane.showMessageDialog(this, "Debe seleccionar el sexo del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                    rdb_a_mujer.requestFocus();             
                                    a_dat_nec=0;                            
                                }                                
                            }                                      
                        }
                    }    
                }     
            }
        }
    }
    
    private void bloquear_obj(boolean hab){
        txt_e_cedula.setEditable(hab);
        txt_e_apellidos.setEditable(hab);
        txt_e_nombres.setEditable(hab);
        txt_e_dir.setEditable(hab);
        txt_e_lug_nac.setEditable(hab);
        txt_e_observ.setEditable(hab);
        rdb_a_mujer.setEnabled(hab);
        rdb_a_hombre.setEnabled(hab);       
        rdb_a_vs.setEnabled(hab);
        rdb_a_vn.setEnabled(hab);                  
    }
    private void habil_panel(boolean hab){
        txt_e_cedula.setEnabled(hab);
        txt_e_apellidos.setEnabled(hab);
        txt_e_nombres.setEnabled(hab);
        txt_e_dir.setEnabled(hab);
        txt_e_lug_nac.setEnabled(hab);
        txt_e_observ.setEnabled(hab);
        jdc_fec_nac.setEnabled(hab);
        rdb_a_mujer.setEnabled(hab);
        rdb_a_hombre.setEnabled(hab);       
        rdb_a_vs.setEnabled(hab);
        rdb_a_vn.setEnabled(hab);  
        cmb_nacion.setEnabled(hab);
    }
    private void color_campos_oblig (){
        txt_e_cedula.setBackground(vl.ama);    
        txt_e_apellidos.setBackground(vl.ama); 
        txt_e_nombres.setBackground(vl.ama); 
        txt_e_dir.setBackground(vl.ama); 
        jdc_fec_nac.setBackground(vl.ama); 
    }
    private void limpiar(){
        boolean t = false;
        vl.col_orig5(btn_e_nue,btn_e_mod,btn_e_eli,btn_e_guardar,btn_e_salir);
// Inicializo las variables
        cod_alu=0;
        a_oper = 0;
        a_ced="";
        a_sex = "F";
        a_vive_padres ="S";  
//Limpio las cajas de texto  
        String limp ="";
        txt_e_cedula.setText(limp);
        txt_e_apellidos.setText(limp);
        txt_e_nombres.setText(limp);
        txt_e_dir.setText(limp);
        txt_e_lug_nac.setText(limp);
        txt_e_observ.setText(limp);
//jdc_fec_nac.setCalendar(null);  
        habil_panel(false);
        btn_a_bus_ced.setEnabled(false);
        btn_e_guardar.setEnabled(false);
        btn_e_lim.setEnabled(false);

        
    }

    private void verif_ced_rep(){
        try {           
            String cedu =  txt_e_cedula.getText();
            String mensa = "La Cédula ya existe en el sistema, pertenece al alumno ";
            CRUD ced_rep = new CRUD();
            a_sql="SELECT id , apellidos, nombres, est_reg \n" +
                    "FROM alumno WHERE cedula = '"+cedu+"'";
            ResultSet rs = ced_rep.select(a_sql);
            if (rs.next()!= false){
                if("A".equals(rs.getString("est_reg"))){
                    mensa = mensa + rs.getString("apellidos");
                    mensa = mensa + " " + rs.getString("nombres");
                    JOptionPane.showMessageDialog(this, mensa , "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    a_dat_nec=0;
                }else{
                    mensa = "La Cédula fue eliminada del sistema con anterioridad, pertenecia al alumno ";
                    mensa = mensa + rs.getString("apellidos");
                    mensa = mensa + " " + rs.getString("nombres");
                    mensa = mensa + " " + "¿ Desea recuperar los datos del alumno ?";
                    a_conf = JOptionPane.showConfirmDialog(this, mensa ,"Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (a_conf==0){
                        cod_alu = Integer.parseInt(rs.getString("id"));
                        CRUD_Estudiante p_act_alu_eli = new CRUD_Estudiante();
                        a_grabado= p_act_alu_eli.act_alu_eli(cod_alu);
                        if(a_grabado == 2){
                            JOptionPane.showMessageDialog(this, "El Alumno no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }else{                       
                            JOptionPane.showMessageDialog(this, "El Alumno fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            a_dat_nec=0;
                        }
                    }
                    else{
                        cod_alu=0;
                        txt_e_cedula.requestFocus();
                        a_dat_nec=0;
                    }
                }  
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_estudiantes.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4, lbl_5);
        fg.form_etiq4(lbl_6, lbl_7, lbl_8, lbl_9); 
        fg.formato_texto5(txt_e_cedula, txt_e_apellidos, txt_e_nombres, txt_e_dir, txt_e_lug_nac);      
    }

    
    private void capt_datos(){
        a_ced       =txt_e_cedula.getText();
        a_ape       =txt_e_apellidos.getText();
        a_nom       =txt_e_nombres.getText();
        a_dir       =txt_e_dir.getText();
        a_lug_nac   =txt_e_lug_nac.getText();        
        a_observ    =txt_e_observ.getText();
//Para trabajar con fechas    
        Date fecha = jdc_fec_nac.getDate();
        long d = fecha.getTime();
        java.sql.Date s_f_nac = new java.sql.Date(d);
        a_f_nac= s_f_nac.toString()  ;
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_a_bus_ced;
    private javax.swing.JButton btn_e_eli;
    private javax.swing.JButton btn_e_guardar;
    private javax.swing.JButton btn_e_lim;
    private javax.swing.JButton btn_e_mod;
    private javax.swing.JButton btn_e_nue;
    private javax.swing.JButton btn_e_salir;
    private javax.swing.JComboBox<String> cmb_nacion;
    private javax.swing.JScrollPane jScrollPane1;
    private com.toedter.calendar.JDateChooser jdc_fec_nac;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_7;
    private javax.swing.JLabel lbl_8;
    private javax.swing.JLabel lbl_9;
    private javax.swing.JPanel pnl_dat_est;
    private javax.swing.JRadioButton rdb_a_hombre;
    private javax.swing.JRadioButton rdb_a_mujer;
    private javax.swing.JRadioButton rdb_a_vn;
    private javax.swing.JRadioButton rdb_a_vs;
    private javax.swing.JTextField txt_e_apellidos;
    private javax.swing.JTextField txt_e_cedula;
    private javax.swing.JTextField txt_e_dir;
    private javax.swing.JTextField txt_e_lug_nac;
    private javax.swing.JTextField txt_e_nombres;
    private javax.swing.JTextArea txt_e_observ;
    // End of variables declaration//GEN-END:variables
}
