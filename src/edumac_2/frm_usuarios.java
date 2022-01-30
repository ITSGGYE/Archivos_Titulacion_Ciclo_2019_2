
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;


public class frm_usuarios extends javax.swing.JInternalFrame {
//Para datos del epleado
    public static String ced_emp_u="";
    public int cod_emp=0             ;
    public String nom_emp="" ,emp_est=""    ; 
//Para los datos del usuario
    public int cod_rol=0     ,  cod_usu=0    ;
    public String usu_emp="" ,  pass_emp=""  ,  conf_pass="manitas";
    public String rol_usu ="";
//Para validaciones varias    
    public int conf=0               ,   oper=0          ,   grabado=0       ;
    public int cant=3               ;
    public int dat_nec=0            ;
    public String sql="";
//Catidad maxima de caracteres
    public int usua=12    ,   pas=10   ;    
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    Llenar_combos lc = new Llenar_combos();

    public frm_usuarios() {
        initComponents();
        this.setTitle("Usuarios");//Titulo formulario
        vl.logo_jif(this,cant);
        formato_objet();
        vl.col_orig5(btn_u_nue,btn_u_mod,btn_u_eli,btn_u_guardar,btn_u_salir);
        txt_emp_ced.setBackground(vl.ama);
        txt_u_user.setBackground(vl.ama);
        btn_u_guardar.setEnabled(false);
        btn_u_bus.setEnabled(false);
        btn_u_lim.setEnabled(false);
        hab_pnl_usu(false);
        bloq_obj_usu(false);                
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_u_nue = new javax.swing.JButton();
        btn_u_mod = new javax.swing.JButton();
        btn_u_eli = new javax.swing.JButton();
        btn_u_lim = new javax.swing.JButton();
        btn_u_guardar = new javax.swing.JButton();
        btn_u_salir = new javax.swing.JButton();
        pnl_dat_emp = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        btn_u_bus = new javax.swing.JButton();
        txt_emp_ced = new javax.swing.JTextField();
        txt_emp_nom = new javax.swing.JTextField();
        pnl_dat_usu = new javax.swing.JPanel();
        lbl_4 = new javax.swing.JLabel();
        txt_u_user = new javax.swing.JTextField();
        lbl_3 = new javax.swing.JLabel();
        cmb_usu_rol = new javax.swing.JComboBox<>();

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

        btn_u_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Nuevo.png"))); // NOI18N
        btn_u_nue.setText("Nuevo");
        btn_u_nue.setToolTipText("Nuevo");
        btn_u_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_nue.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_nue.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_nue.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_nue);

        btn_u_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Modificar.png"))); // NOI18N
        btn_u_mod.setText("Modificar");
        btn_u_mod.setToolTipText("Modificar");
        btn_u_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_mod.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_mod.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_mod.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_mod);

        btn_u_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Eliminar.png"))); // NOI18N
        btn_u_eli.setText("Eliminar");
        btn_u_eli.setToolTipText("Eliminar");
        btn_u_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_eli.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_eli.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_eli.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_eli);

        btn_u_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_u_lim.setText("Limpiar");
        btn_u_lim.setToolTipText("Limpiar Formulario");
        btn_u_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_lim.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_lim.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_lim.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_lim);

        btn_u_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_u_guardar.setText("Guardar");
        btn_u_guardar.setToolTipText("Guardar");
        btn_u_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_guardar.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_guardar.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_guardar.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_guardar);

        btn_u_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_u_salir.setText("Salir");
        btn_u_salir.setToolTipText("Salir");
        btn_u_salir.setFocusable(false);
        btn_u_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_u_salir.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_u_salir.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_u_salir.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_u_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_u_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_u_salir);

        pnl_dat_emp.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Datos Personales", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        lbl_2.setText("Apellidos y Nombres:");

        btn_u_bus.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Busqueda.png"))); // NOI18N
        btn_u_bus.setToolTipText("Buscar Usuario");
        btn_u_bus.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_u_busActionPerformed(evt);
            }
        });

        txt_emp_ced.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        txt_emp_ced.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_emp_cedActionPerformed(evt);
            }
        });
        txt_emp_ced.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_emp_cedKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_emp_cedKeyTyped(evt);
            }
        });

        txt_emp_nom.setEditable(false);
        txt_emp_nom.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_emp_nomActionPerformed(evt);
            }
        });
        txt_emp_nom.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_emp_nomKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_emp_nomKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_empLayout = new javax.swing.GroupLayout(pnl_dat_emp);
        pnl_dat_emp.setLayout(pnl_dat_empLayout);
        pnl_dat_empLayout.setHorizontalGroup(
            pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_empLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_empLayout.createSequentialGroup()
                        .addComponent(lbl_1)
                        .addGap(76, 76, 76)
                        .addComponent(txt_emp_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_u_bus, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(pnl_dat_empLayout.createSequentialGroup()
                        .addComponent(lbl_2, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(txt_emp_nom, javax.swing.GroupLayout.PREFERRED_SIZE, 250, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(23, Short.MAX_VALUE))
        );
        pnl_dat_empLayout.setVerticalGroup(
            pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_empLayout.createSequentialGroup()
                .addGroup(pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_u_bus)
                    .addGroup(pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(lbl_1)
                        .addComponent(txt_emp_ced, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_dat_empLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_2)
                    .addComponent(txt_emp_nom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 11, Short.MAX_VALUE))
        );

        pnl_dat_usu.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Datos de la Cuenta", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_4.setText("Usuario");

        txt_u_user.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_u_userKeyTyped(evt);
            }
        });

        lbl_3.setText("Tipo de usuario:");

        cmb_usu_rol.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_usu_rolItemStateChanged(evt);
            }
        });
        cmb_usu_rol.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                cmb_usu_rolFocusLost(evt);
            }
        });
        cmb_usu_rol.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_usu_rolActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_usuLayout = new javax.swing.GroupLayout(pnl_dat_usu);
        pnl_dat_usu.setLayout(pnl_dat_usuLayout);
        pnl_dat_usuLayout.setHorizontalGroup(
            pnl_dat_usuLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_usuLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lbl_3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(cmb_usu_rol, javax.swing.GroupLayout.PREFERRED_SIZE, 128, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(lbl_4)
                .addGap(18, 18, 18)
                .addComponent(txt_u_user, javax.swing.GroupLayout.PREFERRED_SIZE, 93, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_dat_usuLayout.setVerticalGroup(
            pnl_dat_usuLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_usuLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(pnl_dat_usuLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_3)
                    .addGroup(pnl_dat_usuLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(cmb_usu_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_4)
                        .addComponent(txt_u_user, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(159, 159, 159))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(pnl_dat_emp, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(pnl_dat_usu, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_emp, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_usu, javax.swing.GroupLayout.PREFERRED_SIZE, 61, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_u_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_u_nue,btn_u_mod,btn_u_eli,btn_u_guardar,btn_u_salir);
        hab_pnl_usu(true);
        bloq_obj_usu(true);
        this.setTitle("Nuevo Usuario");//Titulo formulario
        btn_u_guardar.setEnabled(true);
        lc.llenar_combo_rol(cmb_usu_rol);
        btn_u_nue.setBackground(vl.ama);
        btn_u_nue.requestFocus();
        btn_u_bus.setEnabled(true);
        btn_u_lim.setEnabled(true);
        txt_emp_ced.setEnabled(true);
    }//GEN-LAST:event_btn_u_nueActionPerformed

    private void btn_u_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_u_nue,btn_u_mod,btn_u_eli,btn_u_guardar,btn_u_salir);
        hab_pnl_usu(true);
        bloq_obj_usu(true);
        this.setTitle("Actualizar Usuario");//Titulo formulario
        btn_u_guardar.setEnabled(true);
        lc.llenar_combo_rol(cmb_usu_rol);
        btn_u_mod.setBackground(vl.ama);
        btn_u_bus.setEnabled(true);
        btn_u_lim.setEnabled(true);
        txt_emp_ced.setEnabled(true);
    }//GEN-LAST:event_btn_u_modActionPerformed

    private void btn_u_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_u_nue,btn_u_mod,btn_u_eli,btn_u_guardar,btn_u_salir);
        hab_pnl_usu(false);
        bloq_obj_usu(false);
        this.setTitle("Actualizar Usuario");//Titulo formulario
        btn_u_guardar.setEnabled(true);
        lc.llenar_combo_rol(cmb_usu_rol);
        btn_u_eli.setBackground(vl.ama);
        btn_u_bus.setEnabled(true);
        btn_u_lim.setEnabled(true);
        txt_emp_ced.setEnabled(true);
    }//GEN-LAST:event_btn_u_eliActionPerformed

    private void btn_u_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_limActionPerformed
        vl.col_orig5(btn_u_nue,btn_u_mod,btn_u_eli,btn_u_guardar,btn_u_salir);
        limpiar();
        hab_pnl_usu(false);
        bloq_obj_usu(false);
        btn_u_bus.setEnabled(false);
        btn_u_nue.setEnabled(true);
        btn_u_mod.setEnabled(true);
        btn_u_eli.setEnabled(true);
        btn_u_guardar.setEnabled(false);
        btn_u_lim.setEnabled(false);
        txt_emp_ced.setEnabled(false);
        cod_emp =0;
        cod_usu=0;
    }//GEN-LAST:event_btn_u_limActionPerformed

    private void btn_u_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_guardarActionPerformed
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){
            capt_datos();
            verif_usua_ing(cod_emp);
            if (dat_nec==0){
                JOptionPane.showMessageDialog(this, "El usuario "+usu_emp+" ya existe en el sistema, seleccione otro", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                txt_u_user.requestFocus();             
            }else{
                if(oper==1){
                    pass_emp= Hash.sha1(conf_pass);
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del Nuevo Usuario?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        CRUD_Usuarios a_i_usu = new CRUD_Usuarios();
                        grabado = a_i_usu.agre_usu(usu_emp,pass_emp,cod_rol,cod_emp);
                        if(grabado == 0){
                            JOptionPane.showMessageDialog(this, "El Usuario no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }else{
                            JOptionPane.showMessageDialog(this, "El Usuario fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        }
                    }
                }
                if(oper==2){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos del Empleado seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        CRUD_Usuarios a_a_usu = new CRUD_Usuarios();
                        grabado = a_a_usu.act_usu(cod_usu,usu_emp,cod_rol,cod_emp);
                        if(grabado == 0){
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado se actualizaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        }else{
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado no se pudieron actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }
                    }
                }
                if(oper==3){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar los datos del Empleado seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        CRUD_Usuarios a_e_usu = new CRUD_Usuarios();
                        grabado = a_e_usu.eli_usu(cod_usu);
                        if(grabado == 1){
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado fueron eliminados del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            cod_emp=0;
                        }else{
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado no fueron eliminados del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_u_guardarActionPerformed

    private void btn_u_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_salirActionPerformed
        frm_principal.v_usua=null;
        this.dispose();
    }//GEN-LAST:event_btn_u_salirActionPerformed

    private void btn_u_busActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_u_busActionPerformed
        if (txt_emp_ced.getText().length()==10 ){
            dat_nec=1;
            ced_emp_u=txt_emp_ced.getText();
            dat_nec=vl.verif_cedula(ced_emp_u, txt_emp_ced);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_emp_ced.requestFocus();//Ubico el cursor
            }
            if (dat_nec==1){
                try {
                    bus_emp(ced_emp_u);                    
                } catch (ParseException ex) {
                    Logger.getLogger(frm_usuarios.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }else{
            if(frm_principal.v_busc_emple==null && frm_principal.v_busc_estud==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_emple = new frm_buscar_empleado();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_emple);
                frm_principal.v_busc_emple.formul=2;      
            }else{
                frm_principal.enfocar_ventana();  
            }            
        }
    }//GEN-LAST:event_btn_u_busActionPerformed

    private void txt_emp_cedActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_emp_cedActionPerformed

    }//GEN-LAST:event_txt_emp_cedActionPerformed

    private void txt_emp_cedKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_cedKeyPressed

    }//GEN-LAST:event_txt_emp_cedKeyPressed

    private void txt_emp_cedKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_cedKeyTyped
        cant = txt_emp_ced.getText().length();
        if (cant>= 0 && cant<10 ) vl.Solo_Numeros(evt);
        if (cant == 10){
            vl.max_carateres_txt(txt_emp_ced,cant,evt);
            //if(oper==1) verif_ced_rep();
        }
    }//GEN-LAST:event_txt_emp_cedKeyTyped

    private void txt_emp_nomActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_emp_nomActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_emp_nomActionPerformed

    private void txt_emp_nomKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_nomKeyReleased

    }//GEN-LAST:event_txt_emp_nomKeyReleased

    private void txt_emp_nomKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_nomKeyTyped

    }//GEN-LAST:event_txt_emp_nomKeyTyped

    private void txt_u_userKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_u_userKeyTyped
        cant = txt_u_user.getText().length();
        if (cant == usua) vl.max_carateres_txt(txt_u_user,cant,evt);
    }//GEN-LAST:event_txt_u_userKeyTyped

    private void cmb_usu_rolItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_usu_rolItemStateChanged
        if(evt.getSource()==cmb_usu_rol){
            String slc=(String)cmb_usu_rol.getSelectedItem();
            sel_rol(slc);
        }
    }//GEN-LAST:event_cmb_usu_rolItemStateChanged

    private void cmb_usu_rolFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_cmb_usu_rolFocusLost
        if(evt.getSource()==cmb_usu_rol){
            String slc=(String)cmb_usu_rol.getSelectedItem();
            sel_rol(slc);
        }
    }//GEN-LAST:event_cmb_usu_rolFocusLost

    private void cmb_usu_rolActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_usu_rolActionPerformed
        sel_rol((String) cmb_usu_rol.getSelectedItem());
    }//GEN-LAST:event_cmb_usu_rolActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_usua=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void hab_pnl_usu(boolean hab){
        cmb_usu_rol.setEnabled(hab);
        txt_u_user.setEnabled(hab);

    }
    
    private void bloq_obj_usu(boolean hab){
        txt_u_user.setEditable(hab);
    }
 
    private void limpiar(){
        String limp ="";
        txt_emp_ced.setText(limp);
        txt_emp_nom.setText(limp);
        txt_u_user.setText(limp);

    }

    private void verif_usua_ing(int cd_mpl){
        try {
            CRUD c = new CRUD();
            ResultSet rs = c.select("SELECT id FROM usuario " +
                    " WHERE usuario = '"+ usu_emp+"' "+
                            " AND id_empleado != '"+ cd_mpl+"'");
            if (rs.next()!= false){
                dat_nec=0;
            }else{
                dat_nec=1;
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_usuarios.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void verif_dat_neces(){
        usu_emp = txt_u_user.getText();        
        if (cod_emp==0 ){
            JOptionPane.showMessageDialog(this, "Debe seleccionar al Empleado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            btn_u_bus.requestFocus();             
            dat_nec=0;
        }else{
            if (cod_rol==0 ){
                JOptionPane.showMessageDialog(this, "Debe de seleccionar el Rol del Usuario", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                cmb_usu_rol.requestFocus();             
                dat_nec=0;
            }else{ 
                if ("".equals(usu_emp) ){
                    JOptionPane.showMessageDialog(this, "El escribir el usuario que se asignará al Empleado", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    txt_u_user.requestFocus();
                    dat_nec=0;
                }     
            }
        }
    }

    public void verif_emp_usu_usua(int cod_emple) throws ParseException{
        try {
            CRUD b_est = new CRUD();
            emp_est="A";
            sql="SELECT id \n" +
                "FROM usuario WHERE id_empleado = '"+cod_emple+"' AND est_reg= '"+ emp_est+"' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                dat_nec=1;//Si empleado tiene usuario
            }else {
                dat_nec=0;//Si empleado no tiene usuario
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_usuarios.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    public void bus_usua(int cod_emple) throws ParseException{
        try {
            CRUD b_est = new CRUD();
            emp_est="A";
            sql="SELECT id,usuario \n" +
                "FROM usuario WHERE id_empleado = '"+cod_emple+"' AND est_reg= '"+ emp_est+"' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_usu=rs.getInt("id");
                txt_u_user.setText(rs.getString("usuario") );
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_usuarios.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    public void bus_emp(String ced_empl) throws ParseException{
        hab_pnl_usu(false);
        bloq_obj_usu(false);
        cod_usu=0;
        try {
//Busco los datos del empleado
            CRUD b_empl = new CRUD();
            emp_est="A";
            sql="SELECT id,cedula,empleado \n" +
                "FROM empleado WHERE cedula = '"+ced_empl+"' AND est_reg= '"+ emp_est+"' ";
            ResultSet rs1 = b_empl.select(sql);
            if (rs1.next()!= false){
                cod_emp=rs1.getInt("id");
                ced_emp_u=rs1.getString("cedula");
                nom_emp=rs1.getString("empleado");
//Verifico si ya tiene un usuario asignado
                CRUD b_usu_empl = new CRUD();            
                sql="SELECT u.id , usuario ,rol  \n" +
                " FROM usuario AS u INNER JOIN rol AS r ON  u.id_rol= r.id \n" +
                " WHERE id_empleado = '"+cod_emp+"' AND u.est_reg= '"+ emp_est+"'";
                ResultSet rs2 = b_usu_empl.select(sql);
                if (rs2.next()!= false){
                    cod_usu =   rs2.getInt("u.id");
                    usu_emp =   rs2.getString("usuario");
                    rol_usu =   rs2.getString("rol");
                }else{
                    cod_usu=0;
                    usu_emp="";
                }               
                if(oper==1){
                    if(cod_usu> 0){
                        JOptionPane.showMessageDialog(this, "El empleado "+nom_emp+" ya tiene asignado el usuario "+usu_emp+" en el sistema, ", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_emp_ced.requestFocus();//Ubico el cursor
                    }else{
                        hab_pnl_usu(true);
                        bloq_obj_usu(true);
                        txt_emp_ced.setText(ced_emp_u );
                        txt_emp_nom.setText(nom_emp);
                    }
                }
                if(oper==2 || oper==3){                   
                    if(cod_usu> 0){
                        txt_emp_ced.setEditable(true);
                        btn_u_guardar.setEnabled(true);
                        txt_u_user.setText(usu_emp);
                        txt_emp_ced.setText(ced_emp_u );
                        txt_emp_nom.setText(nom_emp);
                        txt_u_user.setText(usu_emp);
                        cmb_usu_rol.setSelectedItem(rol_usu);
                        hab_pnl_usu(true);
                        if (oper==3) hab_pnl_usu(false);
                        bloq_obj_usu(true);
                        if(oper==3) bloq_obj_usu(false);
                    }else{
                        JOptionPane.showMessageDialog(this, "El empleado "+nom_emp+" no tiene asignado un usuario en el sistema, ", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_emp_ced.requestFocus();//Ubico el cursor
                    }
                }
            }else{
                JOptionPane.showMessageDialog(this, "El nñumero de cedula no existe en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                dat_nec=0;
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(frm_usuarios.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    private void formato_objet(){
        fg.form_etiq4(lbl_1, lbl_2, lbl_3, lbl_4);
        fg.formato_texto3(txt_emp_ced,txt_emp_nom,txt_u_user);       
    }   
    
 private void capt_datos(){
        usu_emp     =   txt_u_user.getText();
    }   
    private void sel_rol(String selec){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT id FROM rol WHERE rol = '"+ selec +"'"); 
                if (rs.next()== false){
                    
                }else{                                           
                    cod_rol =Integer.parseInt(rs.getString(1));  
                 }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_u_bus;
    private javax.swing.JButton btn_u_eli;
    private javax.swing.JButton btn_u_guardar;
    private javax.swing.JButton btn_u_lim;
    private javax.swing.JButton btn_u_mod;
    private javax.swing.JButton btn_u_nue;
    private javax.swing.JButton btn_u_salir;
    private javax.swing.JComboBox<String> cmb_usu_rol;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JPanel pnl_dat_emp;
    private javax.swing.JPanel pnl_dat_usu;
    private javax.swing.JTextField txt_emp_ced;
    private javax.swing.JTextField txt_emp_nom;
    private javax.swing.JTextField txt_u_user;
    // End of variables declaration//GEN-END:variables
}
