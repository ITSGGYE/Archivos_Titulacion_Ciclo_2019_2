
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_rel_alu_fam extends javax.swing.JInternalFrame {
//Para los datos del estudiante
    public static String ced_alu_sel ="";
    public static String ced_pers_sel ="";
    public int cod_alu_sel=0;
    public String nom_alu="" ;
//Para los datos del familiar 
    public String fam_ced=""    ,   fam_nom = ""    ,   fam_tel=""  ;
    public String fam_l_trab=""    ,   fam_profes = ""    ,   fam_email=""  ;
    public String fam_repre="N"      , tmpo ="";   
    public int  cod_fam= 0     ;
//Para el parentesco
    public int cod_paren=0      ;
    public String paren_sel=""  ;
//Catidad maxima de caracteres
    public int cdl=10    ,   prs=60   ,   prf=25   ,   ltr=40   ,   em=50;  
    public int tlf=10    ;
//Para validaciones varias 
    public int dat_nec=0 , cod_rela=0;
    public int cant=26       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,c_temp = 0, cont_repre=0;
    public String sql=""    ;
    public String a_est=""    ;
    public int      cnt_dc =0 , cant_fam=0 ;
    
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }      
    };
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_rel_alu_fam() {
        initComponents();
        this.setTitle("Relacionar Familiares con Estudiante");//Titulo formulario
        vl.logo_jif(this,cant); 
        formato_objet();
        color_campos_oblig();
        formato_tabla();
        llenar_combo_parentesco();
        habil_panel(false);
        bloquear_obj(false);
        fam_repre="N"; 
        btn_fam_guardar.setEnabled(false);
        btn_fam_limpiar.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Parentesco"); 
        tablamodel.addColumn("Familiar");
        tablamodel.addColumn("Apoderado");
        TableColumn columna = tbl_familiar.getColumn("#");
        columna.setPreferredWidth(40);
        columna.setMaxWidth(40);
        columna = tbl_familiar.getColumn("Parentesco");
        columna.setPreferredWidth(100);
        columna.setMaxWidth(100);
        columna = tbl_familiar.getColumn("Familiar");
        columna.setPreferredWidth(200);
        columna.setMaxWidth(200);
        columna = tbl_familiar.getColumn("Apoderado");
        columna.setPreferredWidth(70);
        columna.setMaxWidth(70);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_fam_nue = new javax.swing.JButton();
        btn_fam_mod = new javax.swing.JButton();
        btn_fam_eli = new javax.swing.JButton();
        btn_fam_limpiar = new javax.swing.JButton();
        btn_fam_guardar = new javax.swing.JButton();
        btn_fam_salir = new javax.swing.JButton();
        pnl_estud = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        txt_ced_est_sel = new javax.swing.JTextField();
        btn_bus_alu = new javax.swing.JButton();
        lbl_2 = new javax.swing.JLabel();
        txt_est_sel = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbl_familiar = new javax.swing.JTable();
        pnl_fam = new javax.swing.JPanel();
        lbl_3 = new javax.swing.JLabel();
        lbl_4 = new javax.swing.JLabel();
        txt_fam_ape_nom = new javax.swing.JTextField();
        txt_fam_ced = new javax.swing.JTextField();
        btn_fam_bus = new javax.swing.JButton();
        chb_rep = new javax.swing.JCheckBox();
        lbl_5 = new javax.swing.JLabel();
        cmb_parentesco = new javax.swing.JComboBox<>();

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

        btn_fam_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_fam_nue.setText("Nuevo");
        btn_fam_nue.setToolTipText("Nuevo");
        btn_fam_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_nue);

        btn_fam_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_fam_mod.setText("Modificar");
        btn_fam_mod.setToolTipText("Modificar");
        btn_fam_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_mod);

        btn_fam_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_fam_eli.setText("Eliminar");
        btn_fam_eli.setToolTipText("Eliminar ");
        btn_fam_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_eli);

        btn_fam_limpiar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Limpiar.png"))); // NOI18N
        btn_fam_limpiar.setText("Limpiar");
        btn_fam_limpiar.setToolTipText("Limpiar Formulario");
        btn_fam_limpiar.setFocusable(false);
        btn_fam_limpiar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_limpiar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_limpiar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_limpiarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_limpiar);

        btn_fam_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_fam_guardar.setText("Guardar");
        btn_fam_guardar.setToolTipText("Guardar");
        btn_fam_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_guardar);

        btn_fam_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_fam_salir.setText("Salir");
        btn_fam_salir.setToolTipText("Salir");
        btn_fam_salir.setFocusable(false);
        btn_fam_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fam_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fam_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fam_salir);

        pnl_estud.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        btn_bus_alu.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_alu.setToolTipText("Buscar Estudiante");
        btn_bus_alu.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_aluActionPerformed(evt);
            }
        });

        lbl_2.setText("Estudiante:");

        txt_est_sel.setEditable(false);
        txt_est_sel.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N

        javax.swing.GroupLayout pnl_estudLayout = new javax.swing.GroupLayout(pnl_estud);
        pnl_estud.setLayout(pnl_estudLayout);
        pnl_estudLayout.setHorizontalGroup(
            pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_estudLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_2)
                    .addComponent(lbl_1))
                .addGroup(pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_estudLayout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addGroup(pnl_estudLayout.createSequentialGroup()
                        .addGap(16, 16, 16)
                        .addComponent(txt_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_bus_alu, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );
        pnl_estudLayout.setVerticalGroup(
            pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_estudLayout.createSequentialGroup()
                .addGroup(pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(lbl_1)
                        .addComponent(txt_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(btn_bus_alu))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_estudLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_2)
                    .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 11, Short.MAX_VALUE))
        );

        jPanel1.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Familiares del Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N
        jPanel1.setAutoscrolls(true);

        tbl_familiar.setModel(tablamodel);
        tbl_familiar.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_familiarMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbl_familiar);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 444, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pnl_fam.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Datos del Familiar", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_3.setText("Cedula:");

        lbl_4.setText("Apellidos y Nombres:");

        txt_fam_ape_nom.setEditable(false);
        txt_fam_ape_nom.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_fam_ape_nomKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_ape_nomKeyTyped(evt);
            }
        });

        txt_fam_ced.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_fam_cedKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_cedKeyTyped(evt);
            }
        });

        btn_fam_bus.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Busqueda.png"))); // NOI18N
        btn_fam_bus.setToolTipText("Buscar Familiar");
        btn_fam_bus.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_busActionPerformed(evt);
            }
        });

        chb_rep.setText("Es el representante");
        chb_rep.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                chb_repItemStateChanged(evt);
            }
        });
        chb_rep.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                chb_repMouseClicked(evt);
            }
        });
        chb_rep.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                chb_repActionPerformed(evt);
            }
        });

        lbl_5.setText("Parentesco:");

        cmb_parentesco.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_parentescoItemStateChanged(evt);
            }
        });
        cmb_parentesco.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_parentescoActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout pnl_famLayout = new javax.swing.GroupLayout(pnl_fam);
        pnl_fam.setLayout(pnl_famLayout);
        pnl_famLayout.setHorizontalGroup(
            pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_famLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_4)
                    .addComponent(lbl_3)
                    .addComponent(lbl_5))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(txt_fam_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(pnl_famLayout.createSequentialGroup()
                        .addComponent(cmb_parentesco, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(26, 26, 26)
                        .addComponent(chb_rep))
                    .addGroup(pnl_famLayout.createSequentialGroup()
                        .addComponent(txt_fam_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_fam_bus, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(28, 28, 28))
        );
        pnl_famLayout.setVerticalGroup(
            pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_famLayout.createSequentialGroup()
                .addGap(38, 38, 38)
                .addComponent(lbl_4, javax.swing.GroupLayout.PREFERRED_SIZE, 11, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(13, 13, 13)
                .addComponent(lbl_5)
                .addContainerGap(18, Short.MAX_VALUE))
            .addGroup(pnl_famLayout.createSequentialGroup()
                .addGroup(pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_fam_ced, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_3))
                    .addComponent(btn_fam_bus))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(txt_fam_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_famLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(cmb_parentesco, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(chb_rep, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE))
                .addGap(0, 0, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(layout.createSequentialGroup()
                        .addContainerGap()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(pnl_estud, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(pnl_fam, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addGap(2, 2, 2)))
                .addGap(1, 1, 1))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_estud, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_fam, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_fam_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_nueActionPerformed
        Limpiar();
        oper = 1;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Nuevo Familiar");
        btn_fam_nue.setBackground(vl.ama);
        habil_panel(false);
        bloquear_obj(false);
        txt_ced_est_sel.setEnabled(true);
        txt_ced_est_sel.setEditable(true);
        txt_ced_est_sel.requestFocus();        
        btn_bus_alu.setEnabled(true);
        tbl_familiar.setEnabled(true);
        jPanel1.setEnabled(false);
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);

    }//GEN-LAST:event_btn_fam_nueActionPerformed

    private void btn_fam_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Modificar Familiar");
        btn_fam_mod.setBackground(vl.ama);
        habil_panel(false);
        bloquear_obj(false);
        txt_ced_est_sel.setEditable(true);
        txt_ced_est_sel.setEnabled(true);
        txt_ced_est_sel.requestFocus();
        btn_bus_alu.setEnabled(true);
        tbl_familiar.setEnabled(true);       
        btn_fam_guardar.setEnabled(true);
        btn_fam_bus.setEnabled(false);
        //txt_fam_ced.setEditable(false);
        txt_fam_ced.setEnabled(false);
        cmb_parentesco.setEnabled(false); 
        chb_rep.setEnabled(false); 
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);
    }//GEN-LAST:event_btn_fam_modActionPerformed

    private void btn_fam_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Eliminar Familiar");
        btn_fam_eli.setBackground(vl.ama);
        habil_panel(false);
        bloquear_obj(false);
        txt_ced_est_sel.setEnabled(true);
        txt_ced_est_sel.setEditable(true);
        txt_fam_ced.setEditable(false);
        txt_fam_ced.setEnabled(true);
        txt_ced_est_sel.requestFocus();        
        btn_bus_alu.setEnabled(true);
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);
        btn_fam_bus.setEnabled(false);
        jPanel1.setEnabled(true);
    }//GEN-LAST:event_btn_fam_eliActionPerformed

    private void btn_fam_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_guardarActionPerformed
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){       
            if (oper==1 || oper==2){
                bus_cod_paren();             
                if(oper==1){
                    dat_nec=1;
                    verif_repre();
                    if ("S".equals(fam_repre)){                            
                        if (cont_repre ==1) {
                            JOptionPane.showMessageDialog(this, "Ya existe un familiar como representante del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre); 
                            chb_rep.requestFocus();
                            dat_nec=0;                                
                        }
                    }else{
                        if (cont_repre ==0) {
                            JOptionPane.showMessageDialog(this, "No existe ningun familiar como representante del estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre); 
                            chb_rep.requestFocus();
                            dat_nec=0;                                
                        }
                    }
                    if (dat_nec ==1) {   
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del familiar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){//Confirmación del usuario                     
                            CRUD_Familiar fm_rel = new CRUD_Familiar();
                            grabado = fm_rel.agre_relac_persona(cod_alu_sel, cod_paren, cod_fam, fam_repre);
                            if(grabado == 0){
                                JOptionPane.showMessageDialog(this, "El familiar no se pudo relacionar con el estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                JOptionPane.showMessageDialog(this, "El familiar fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                bus_est(ced_alu_sel);                        
                            }
                        }
                    }
                }
                if(oper==2){                  
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos del familiar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        CRUD_Familiar fm_act_rel = new CRUD_Familiar();
                        grabado = fm_act_rel.act_relac_persona(cod_paren, fam_repre, cod_rela);
                        if(grabado == 0){
                            JOptionPane.showMessageDialog(this, "Los datos del familiar no se pudo relacionar con el estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }else{
                            JOptionPane.showMessageDialog(this, "Los datos del familiar fueron actualizados en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            txt_fam_ced.setText("");
                            txt_fam_ape_nom.setText(""); 
                            llenar_combo_parentesco();
                            bus_familiares(cod_alu_sel);                        
                        }


                    }
                }
            }
            if (oper==3){
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar la relacion del familiar con el estudiante","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Familiar fm_eli = new CRUD_Familiar();
                    grabado = fm_eli.eli_relac_persona(cod_rela);
                    if(grabado == 0){
                        JOptionPane.showMessageDialog(this, "No se pudo eliminar la relación del familiar con el estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "Se elimino la relación del familiar con el estudiante","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_fam_ced.setText("");
                        txt_fam_ape_nom.setText(""); 
                        llenar_combo_parentesco();
                        bus_familiares(cod_alu_sel);                          
                    }
                }
            }                
        }
    
    }//GEN-LAST:event_btn_fam_guardarActionPerformed

    private void btn_fam_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_salirActionPerformed
        frm_principal.v_rel_alu_fam=null;
        this.dispose();
    }//GEN-LAST:event_btn_fam_salirActionPerformed

    private void btn_bus_aluActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_aluActionPerformed
        ced_alu_sel="";
//Si escribio todos los digitos de la cedula
        if (txt_ced_est_sel.getText().length()==10 ){
            dat_nec=1;
            ced_alu_sel=txt_ced_est_sel.getText();
            dat_nec=vl.verif_cedula(ced_alu_sel, txt_ced_est_sel);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_ced_est_sel.requestFocus();
            }
            if (dat_nec==1) {
                bus_est(ced_alu_sel);
            }
        }else{//Si escribio menos digitos de la cedula
            if(frm_principal.v_busc_emple==null && frm_principal.v_busc_estud==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_estud = new frm_buscar_estudiante();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_estud);
                frm_principal.v_busc_estud.formul=2;      
            }else{    
                frm_principal.enfocar_ventana();
            }         
        }
    }//GEN-LAST:event_btn_bus_aluActionPerformed

    private void tbl_familiarMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_familiarMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel_tab = tbl_familiar.getSelectedRow();
            paren_sel= tbl_familiar.getValueAt(fl_sel_tab, 1).toString();
            fam_nom= tbl_familiar.getValueAt(fl_sel_tab, 2).toString();             
            fam_repre=tbl_familiar.getValueAt(fl_sel_tab, 3).toString(); 
            if("S".equals(fam_repre)) {  fam_repre="S";             
            }else {                fam_repre="N";       }
            boolean exists = false;
            for (int index = 0; index < cmb_parentesco.getItemCount() && !exists; index++) {
              if (paren_sel.equals(cmb_parentesco.getItemAt(index))) {
                exists = true;
              }
            }
            if (!exists) {
              cmb_parentesco.addItem(paren_sel);
            }
            cmb_parentesco.setSelectedItem(paren_sel);
            txt_fam_ced.setEditable(false);
            txt_fam_ced.setEnabled(true);
            if (oper == 2){
                cmb_parentesco.setEnabled(true);
                chb_rep.setEnabled(true);
                btn_fam_bus.setEnabled(false);
            }
            if (oper == 3){
                cmb_parentesco.setEnabled(false);
                chb_rep.setEnabled(false);
                btn_fam_bus.setEnabled(false);
            }
            //fam_repre="N";
            bus_fam_sel_tab(fam_nom);
        }
        
        
    }//GEN-LAST:event_tbl_familiarMouseClicked

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_rel_alu_fam=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void cmb_parentescoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_parentescoActionPerformed

    }//GEN-LAST:event_cmb_parentescoActionPerformed

    private void cmb_parentescoItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_parentescoItemStateChanged

    }//GEN-LAST:event_cmb_parentescoItemStateChanged

    private void chb_repActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_chb_repActionPerformed

    }//GEN-LAST:event_chb_repActionPerformed

    private void btn_fam_busActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_busActionPerformed
        if (txt_fam_ced.getText().length()==10 ){
            dat_nec=1;
            fam_ced=txt_fam_ced.getText();
            dat_nec=vl.verif_cedula(fam_ced, txt_fam_ced);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_fam_ced.requestFocus();//Ubico el cursor
            }
            if (dat_nec==1){
                try {
                    bus_persona(ced_pers_sel);
                } catch (ParseException ex) {
                    Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }else{
            if(frm_principal.v_busc_emple==null && frm_principal.v_busc_estud==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_person = new frm_buscar_persona();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_person);
                frm_principal.v_busc_person.formul=2;
            }else{
                frm_principal.enfocar_ventana();
            }
        }
    }//GEN-LAST:event_btn_fam_busActionPerformed

    private void txt_fam_cedKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_cedKeyTyped
        cant = txt_fam_ced.getText().length();
        if (cant>= 0 && cant<cdl ){      vl.Solo_Numeros(evt);          }
        if (cant == cdl) vl.max_carateres_txt(txt_fam_ced,cant,evt);
    }//GEN-LAST:event_txt_fam_cedKeyTyped

    private void txt_fam_cedKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_cedKeyPressed

    }//GEN-LAST:event_txt_fam_cedKeyPressed

    private void txt_fam_ape_nomKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_ape_nomKeyTyped
        cant = txt_fam_ape_nom.getText().length();
        if (cant>= 0 && cant<prs ){   vl.Solo_Letras(evt);     }
        if (cant == prs) vl.max_carateres_txt(txt_fam_ape_nom,cant,evt);
    }//GEN-LAST:event_txt_fam_ape_nomKeyTyped

    private void txt_fam_ape_nomKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_ape_nomKeyReleased

    }//GEN-LAST:event_txt_fam_ape_nomKeyReleased

    private void btn_fam_limpiarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_limpiarActionPerformed
        Limpiar();
    }//GEN-LAST:event_btn_fam_limpiarActionPerformed

    private void chb_repMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_chb_repMouseClicked
        if(chb_rep.isSelected()==true){ fam_repre="S";
        }else{                          fam_repre="N";  }
    }//GEN-LAST:event_chb_repMouseClicked

    private void chb_repItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_chb_repItemStateChanged
        if(chb_rep.isSelected()==true){ fam_repre="S";
        }else{                          fam_repre="N";  }
    }//GEN-LAST:event_chb_repItemStateChanged
    
    private void habil_panel(boolean hab){
        txt_ced_est_sel.setEnabled(hab);
        btn_bus_alu.setEnabled(hab);        
        txt_fam_ced.setEnabled(hab);
        chb_rep.setEnabled(hab);
        cmb_parentesco.setEnabled(hab); 
        btn_fam_bus.setEnabled(hab); 
    }
    
    private void bloquear_obj(boolean hab){
        txt_ced_est_sel.setEditable(hab);      
        txt_fam_ced.setEditable(hab);
        chb_rep.setEnabled(hab);;  
        cmb_parentesco.setEnabled(hab);; 
        chb_rep.setEnabled(hab);; 
    }
    
    public void bus_est(String cd_est){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id,cedula,apellidos,nombres \n" +
                " FROM alumno WHERE cedula = '" + cd_est + "' \n" +
                " AND est_reg= '" + a_est + "' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_alu_sel=rs.getInt("id");
                ced_alu_sel = rs.getString("cedula") ;
                txt_ced_est_sel.setText(ced_alu_sel);
                nom_alu= rs.getString("apellidos") + " " + rs.getString("nombres");
                txt_est_sel.setText(nom_alu);
                txt_est_sel.setEditable(false);
                llenar_combo_parentesco();
                habil_panel(true);
                bloquear_obj(true);
                btn_fam_bus.setEnabled(true);
                
                bus_familiares(cod_alu_sel);
                if (oper==2 || oper==3){
                    //btn_bus_alu.setEnabled(true);
                    btn_fam_bus.setEnabled(false);
                    
                }
                txt_ced_est_sel.setEditable(true);
                txt_fam_ced.setEnabled(true);
                txt_fam_ced.setEditable(true);
                cmb_parentesco.setEnabled(false);
                chb_rep.setEnabled(false);
            }else{
                JOptionPane.showMessageDialog(this, "El número de Cédula '"+cd_est+"' no existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_ced_est_sel.requestFocus();
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    public void bus_fam_sel_tab(String nomb){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql=" SELECT rl.id , p.cedula ,p.persona , \n" +
                " pr.parentesco , rl.representante, rl.id_persona  \n" +
                " FROM rel_perso_alu AS rl \n" +
                " INNER JOIN persona AS p ON rl.id_persona = p.id \n" +
                " INNER JOIN parentesco AS pr ON rl.id_parentesco = pr.id \n" +
                " WHERE rl.id_alumno = '"+cod_alu_sel+"'\n" +
                " AND rl.est_reg = 'A'\n" +
                " AND p.persona = '"+nomb+"'";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_rela=rs.getInt("id");               
                cod_fam=rs.getInt("id_persona");
                txt_fam_ced.setText(rs.getString("cedula")) ;
                txt_fam_ape_nom.setText(rs.getString("persona")) ;
                fam_repre= rs.getString("representante");               
                if ("S".equals(fam_repre)){
                    chb_rep.setSelected(true);
                    
                }else{
                    chb_rep.setSelected(false);
                }
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    
    public void bus_familiares(Integer cod_est_sel){
        paren_sel="";
        try {
            CRUD b_d_fam_sel = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            a_est="A";
            sql=" SELECT  pr.parentesco , p.persona , rl.representante   \n" +
                " FROM rel_perso_alu AS rl \n" +
                " INNER JOIN persona AS p ON rl.id_persona = p.id\n" +
                " INNER JOIN parentesco AS pr ON rl.id_parentesco = pr.id\n" +
                " WHERE rl.id_alumno = '"+cod_est_sel+"'\n" +
                " AND rl.est_reg = 'A' ";
            ResultSet rs = b_d_fam_sel.select(sql);
            if (rs.next()!= false){
                limpiar_tabla();
                int j =1;
                do{ 
                   Object [] filas = new Object[4];
                   for(int i=0; i<1;i++){                               
                        filas[i] = j;
                        filas[i+1]  = rs.getObject(i+1);
                        paren_sel=String.valueOf(rs.getObject(i+1));
                        cmb_parentesco.removeItem(paren_sel);
                        filas[i+2]  = rs.getObject(i+2);
                        fam_repre   = (String) rs.getObject(i+3);
                        if("S".equals(fam_repre)){
                            fam_repre = "S";
                        }else{
                            fam_repre = "N";
                        }
                        filas[i+3]  =fam_repre;
                   }
                   datos.add(filas);
                   j=j+1;
                }while(rs.next());
                for(int i=0;i<datos.size();i++) tablamodel.addRow(datos.get(i));                
                /*cod_alu_sel=rs.getInt("id");
                ced_alu_sel = rs.getString("cedula") ;
                txt_ced_est_sel.setText(ced_alu_sel);
                nom_alu= rs.getString("apellidos") + " " + rs.getString("nombres");
                txt_est_sel.setText(nom_alu);
                txt_est_sel.setEditable(false);*/
                //fam_repre="N";
                verif_repre();
                
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    private void limpiar_tabla(){
        int fl= tbl_familiar.getRowCount();
        if (fl>0) for(int i=0;i< fl;i++) tablamodel.removeRow(0);           
    }
    
    
    public void bus_fam_rec_ing(String ced_fam){
        try {
            CRUD fam_rec_ing = new CRUD();
            a_est="A";
            sql="SELECT id \n" +
                " FROM persona WHERE cedula = '"+ced_fam+"' AND est_reg= '"+a_est+"' ";
            ResultSet rs = fam_rec_ing.select(sql);
            if (rs.next()!= false){
                cod_fam=rs.getInt("id");
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    private void llenar_combo_parentesco(){
        CRUD c = new CRUD(); 
        cmb_parentesco.removeAllItems();
        try{           
            ResultSet rs = c.select("SELECT parentesco FROM parentesco " +
                                    "WHERE est_reg = 'A' "); 
            if (rs.next()!= false){ 

                do{ cmb_parentesco.addItem(rs.getString(1));                                               
                  }while(rs.next());                                                       
            }
        }catch(Exception ex){
              JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
        }   
    }
    private void verif_dat_neces(){
//Verifica que los datos necesarios esten escritos o seleccionados
        if (cod_alu_sel==0 ){
            JOptionPane.showMessageDialog(this, "Debe seleccionar un estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            txt_ced_est_sel.requestFocus();             
            dat_nec=0;
        }else{
           if (cod_fam==0 ){
               JOptionPane.showMessageDialog(this, "Debe seleccionar un familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
               txt_ced_est_sel.requestFocus();             
               dat_nec=0;               
           }   
        }                                    
    }

    
     private void color_campos_oblig (){
        txt_ced_est_sel.setBackground(vl.ama);
        txt_fam_ced.setBackground(vl.ama);    
        txt_fam_ape_nom.setBackground(vl.ama); 
        txt_est_sel.setBackground(vl.ama); 
        txt_fam_ape_nom.setBackground(vl.ama); 
        cmb_parentesco.setBackground(vl.ama); 
        
    }
      
     private void Limpiar(){  
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Relacionar Familiares con Estudiante");//Titulo formulario
        String limp ="";
        oper=0;
        txt_ced_est_sel.setText(limp);
        txt_est_sel.setText(limp);
        txt_fam_ced.setText(limp);
        txt_fam_ape_nom.setText(limp);
        chb_rep.setSelected(false);
        chb_rep.setSelected(false);
        btn_bus_alu.setEnabled(false);
        habil_panel(false);
        bloquear_obj(false);
        fam_repre="N";
        txt_ced_est_sel.setEnabled(false);
        txt_ced_est_sel.setEditable(false);
        //txt_ced_est_sel.requestFocus();        
        btn_bus_alu.setEnabled(false);
        btn_fam_guardar.setEnabled(false);
        btn_fam_limpiar.setEnabled(false);
        limpiar_tabla();

    }
    
    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4, lbl_5);
        fg.formato_texto4(txt_ced_est_sel, txt_est_sel, txt_fam_ced, txt_fam_ape_nom); 
    }
    
    public void bus_cod_paren(){
        try {
            paren_sel=(String)cmb_parentesco.getSelectedItem();
            CRUD y = new CRUD();
            sql="SELECT id FROM parentesco WHERE parentesco = '" + paren_sel + "'";
            ResultSet rs = y.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No se han imgresados Parentescos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                cod_paren= Integer.parseInt(rs.getString(1));
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void val_fam_tab(){
        cnt_dc = tbl_familiar.getRowCount();
        for (int i = 0; i < cnt_dc; i++) {
            tmpo=tbl_familiar.getValueAt(i, 2).toString();
            if (tmpo.equals(fam_nom)){
                //mensaje
                dat_nec=1;
            } 
        }        
    }
    private void presentar_fam(){
        txt_fam_ced.setText(fam_ced) ;
        txt_fam_ape_nom.setText(fam_nom) ;          
    } 
    private void verif_repre(){
        String tmp1="";
        cont_repre=0;
        c_temp = tablamodel.getRowCount();
        if (oper==1){
            for (int i = 0; i < c_temp; i++) {
               tmp1= tablamodel.getValueAt(i,3).toString();
               if ("S".equals(tmp1))  cont_repre= cont_repre+1;            
           }
        }
        /*if (oper==2){            
            for (int i = 0; i < c_temp; i++) {
                if(i!=(fl_sel_tab)) {              
                    tmp1= tablamodel.getValueAt(i,3).toString();
                    if ("S".equals(tmp1))  cont_repre= cont_repre+1; 
                } 
            }
        }*/
    }

    public void bus_persona(String cd_pers) throws ParseException{
        habil_panel(false);
        bloquear_obj(false);
//1.- Busco la información del familiar seleccionado
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id ,cedula,persona \n" +
            " FROM persona \n" +
            " WHERE cedula = '" + cd_pers + "' \n" +
            " AND est_reg = '" + a_est + "' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_fam     =   rs.getInt("id");
                fam_ced     =   rs.getString("cedula");
                fam_nom     =   rs.getString("persona");
//2.- Valido si la persona seleccionada ya ets relacionada con el estudiante
                sql="SELECT id FROM  rel_perso_alu \n" +
                    " WHERE id_alumno = '" + cod_alu_sel + "' \n" +
                    " AND id_persona= '" + cod_fam + "' \n" +
                    " AND est_reg= '" + a_est + "' ";
                ResultSet rs1 = b_est.select(sql);
                if (rs1.next()!= false){
                    JOptionPane.showMessageDialog(this, "El familiar " + fam_nom + " ya esta relacionado con el estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                }else{
                    presentar_fam();
                    if(oper==1){
                        habil_panel(true);
                        bloquear_obj(false);
                        cmb_parentesco.setEnabled(true);
                        chb_rep.setEnabled(true);
                    }
                    if(oper==2){
                        habil_panel(true);
                        bloquear_obj(true);
                        btn_fam_guardar.setEnabled(true);
                        cmb_parentesco.setEnabled(true);
                        chb_rep.setEnabled(true);
                    }
                    if(oper==3){
                        habil_panel(true);
                        bloquear_obj(false);
                        txt_fam_ced.setEditable(true);
                        btn_fam_guardar.setEnabled(true);
                        cmb_parentesco.setEnabled(false);
                        chb_rep.setEnabled(false);
                    }
                
                }                               
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_rel_alu_fam.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_alu;
    private javax.swing.JButton btn_fam_bus;
    private javax.swing.JButton btn_fam_eli;
    private javax.swing.JButton btn_fam_guardar;
    private javax.swing.JButton btn_fam_limpiar;
    private javax.swing.JButton btn_fam_mod;
    private javax.swing.JButton btn_fam_nue;
    private javax.swing.JButton btn_fam_salir;
    private javax.swing.JCheckBox chb_rep;
    private javax.swing.JComboBox<String> cmb_parentesco;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JPanel pnl_estud;
    private javax.swing.JPanel pnl_fam;
    private javax.swing.JTable tbl_familiar;
    private javax.swing.JTextField txt_ced_est_sel;
    private javax.swing.JTextField txt_est_sel;
    private javax.swing.JTextField txt_fam_ape_nom;
    private javax.swing.JTextField txt_fam_ced;
    // End of variables declaration//GEN-END:variables
}
