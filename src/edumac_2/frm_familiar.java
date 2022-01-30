
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_familiar extends javax.swing.JInternalFrame {
//Para los datos del familiar 
    public String fam_ced=""    ,   fam_nom = ""    ,   fam_tel=""  ;
    public String fam_l_trab=""    ,   fam_profes = ""    ,   fam_email=""  ;
    public String fam_repre=""      , tmpo ="";   
    public int  cod_fam= 0     ;
    public static String ced_pers_sel ="";
//Para el parentesco
    public int cod_paren=0      ;
    public String paren_sel=""  ;
//Catidad maxima de caracteres
    public int cdl=10    ,   prs=60   ,   prf=25   ,   ltr=40   ,   em=50;  
    public int tlf=10    ;
//Para validaciones varias 
    public int dat_nec=0 ;
    public int cant=13       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ;
    public String sql=""    ;
    public String a_est=""    ;

    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    
    public frm_familiar() {
        initComponents();
        this.setTitle("Información de Familiares");//Titulo formulario
        vl.logo_jif(this,cant); 
        formato_objet();
        color_campos_oblig();
        habil_panel(false);
        btn_fam_bus.setEnabled(false);
        btn_fam_guardar.setEnabled(false);
        btn_fam_limpiar.setEnabled(false);
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
        jPanel2 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        lbl_5 = new javax.swing.JLabel();
        lbl_6 = new javax.swing.JLabel();
        txt_fam_email = new javax.swing.JTextField();
        txt_fam_lug_trab = new javax.swing.JTextField();
        txt_fam_ape_nom = new javax.swing.JTextField();
        txt_fam_ced = new javax.swing.JTextField();
        btn_fam_bus = new javax.swing.JButton();
        lbl_4 = new javax.swing.JLabel();
        txt_fam_tel = new javax.swing.JTextField();
        lbl_7 = new javax.swing.JLabel();
        txt_fam_profes = new javax.swing.JTextField();

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

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Datos del Familiar", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        lbl_2.setText("Apellidos y Nombres:");

        lbl_5.setText("Trabaja en:");

        lbl_6.setText("Email:");

        txt_fam_email.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_fam_emailActionPerformed(evt);
            }
        });
        txt_fam_email.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_emailKeyTyped(evt);
            }
        });

        txt_fam_lug_trab.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_fam_lug_trabKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_lug_trabKeyTyped(evt);
            }
        });

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

        btn_fam_bus.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_fam_bus.setToolTipText("Buscar Familiar");
        btn_fam_bus.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fam_busActionPerformed(evt);
            }
        });

        lbl_4.setText("Profesión:");

        txt_fam_tel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_fam_telKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_telKeyTyped(evt);
            }
        });

        lbl_7.setText("Telefono:");

        txt_fam_profes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_fam_profesActionPerformed(evt);
            }
        });
        txt_fam_profes.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_fam_profesKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_fam_profesKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_2)
                    .addComponent(lbl_1)
                    .addComponent(lbl_7)
                    .addComponent(lbl_4)
                    .addComponent(lbl_5)
                    .addComponent(lbl_6))
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(txt_fam_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(txt_fam_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_fam_bus, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(txt_fam_lug_trab, javax.swing.GroupLayout.PREFERRED_SIZE, 300, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_fam_profes, javax.swing.GroupLayout.PREFERRED_SIZE, 180, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_fam_email, javax.swing.GroupLayout.PREFERRED_SIZE, 300, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_fam_tel, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 12, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_fam_ced, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_1))
                    .addComponent(btn_fam_bus))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_fam_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_2, javax.swing.GroupLayout.PREFERRED_SIZE, 11, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_4)
                    .addComponent(txt_fam_profes, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_fam_lug_trab, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_5))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_fam_email, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_6))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_fam_tel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_7))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_fam_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_nueActionPerformed
        Limpiar();
        oper = 1;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Nuevo Familiar");//Titulo formulario
        btn_fam_nue.setBackground(vl.ama);
        habil_panel(true);
        bloquear_obj(true);
        btn_fam_bus.setEnabled(false);
        txt_fam_ced.requestFocus();
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);
    }//GEN-LAST:event_btn_fam_nueActionPerformed

    private void btn_fam_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Modificar Familiar");//Titulo formulario
        btn_fam_mod.setBackground(vl.ama);
        if (cod_fam>0){
            habil_panel(true);
            bloquear_obj(true);
        }else{
            habil_panel(false);
            bloquear_obj(false);
        }
        txt_fam_ced.setEditable(true);
        txt_fam_ced.setEnabled(true);
        txt_fam_ced.requestFocus();
        btn_fam_bus.setEnabled(true);
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);
    }//GEN-LAST:event_btn_fam_modActionPerformed

    private void btn_fam_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Eliminar Familiar");//Titulo formulario
        btn_fam_eli.setBackground(vl.ama); 
        habil_panel(true);
        bloquear_obj(false);
        txt_fam_ced.setEditable(true);
        btn_fam_bus.setEnabled(true);
        btn_fam_guardar.setEnabled(true);
        btn_fam_limpiar.setEnabled(true);
    }//GEN-LAST:event_btn_fam_eliActionPerformed

    private void btn_fam_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_guardarActionPerformed
        if (oper==1){
            fam_ced =txt_fam_ced.getText();
//Verifico si la cedula existe en el sistema
            CRUD c = new CRUD();
            sql= "SELECT id , est_reg, persona \n"+
                 " FROM persona WHERE cedula = '"+ fam_ced + "'";
            ResultSet rs = c.select(sql);
            try {
                if (rs.next()!= false){
                    fam_nom=rs.getString("persona");
                    cod_fam=rs.getInt("id");
                    if("A".equals(rs.getString("est_reg"))){
                        JOptionPane.showMessageDialog(this, "La cédula ya existe en el sistema, pertenece a  '"+ fam_nom +"'", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_fam_ced.requestFocus();
                    }else{
                        conf = JOptionPane.showConfirmDialog(this, "El cédula fue eliminada del sistem, pertenece a '"+ fam_nom +"'. Desea recuperar los datos", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){//Confirmación del usuario
                            CRUD_Familiar fm_recp = new CRUD_Familiar(); 
                            grabado = fm_recp.recup_fam(cod_fam);
                            if(grabado == 0){
                                 JOptionPane.showMessageDialog(this, "Los datos dl familiar no se pudieron recuperar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                 JOptionPane.showMessageDialog(this, "Los datos dl familiar fueron recuperados en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            }
                        }
                    }
                }else{
                    dat_nec=1;
                    verif_dat_neces();
                    if (dat_nec==1){            
                        capt_datos_fam();
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del familiar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){//Confirmación del usuario
                            CRUD_Familiar fm_ing = new CRUD_Familiar();
                            grabado = fm_ing.agre_fam(fam_ced, fam_nom, fam_profes, fam_l_trab, fam_email, fam_tel)   ;
                            if(grabado == 0){
                                JOptionPane.showMessageDialog(this, "El familiar no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                JOptionPane.showMessageDialog(this, "El familiar fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                Limpiar();
                            }
                        }
                    }
                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_familiar.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        if(oper==2){
            if(cod_fam==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_fam_ced.requestFocus();
            }else{
                dat_nec=1;            
                verif_dat_neces();
                if (dat_nec==1){
                    capt_datos_fam();
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos del familiar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){//Confirmación del usuario
                       CRUD_Familiar fm_mod = new CRUD_Familiar(); 
                       grabado = fm_mod.act_fam(cod_fam, fam_ced, fam_nom, fam_profes, fam_l_trab, fam_email, fam_tel);
                       if(grabado == 0){
                            JOptionPane.showMessageDialog(this, "El familiar no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                       }else{
                            JOptionPane.showMessageDialog(this, "El familiar fue actualizado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                       }
                        
                    }
                }
            }

        }
        if(oper==3){
            if(cod_fam==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_fam_ced.requestFocus();
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar los datos del familiar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){//Confirmación del usuario
                   CRUD_Familiar fm_eli = new CRUD_Familiar(); 
                   grabado = fm_eli.eli_fam(cod_fam);
                   if(grabado == 0){
                        JOptionPane.showMessageDialog(this, "El familiar no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El familiar fue actualizado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                    }
                }
            }
        }

    }//GEN-LAST:event_btn_fam_guardarActionPerformed

    private void btn_fam_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_salirActionPerformed
        frm_principal.v_famil=null;
        this.dispose();
    }//GEN-LAST:event_btn_fam_salirActionPerformed

    private void btn_fam_limpiarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_limpiarActionPerformed
        Limpiar();
    }//GEN-LAST:event_btn_fam_limpiarActionPerformed

    private void txt_fam_emailActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_fam_emailActionPerformed

    }//GEN-LAST:event_txt_fam_emailActionPerformed

    private void txt_fam_emailKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_emailKeyTyped
        cant = txt_fam_email.getText().length();
        if (cant>= 0 && cant<em ){     vl.Solo_Letras(evt);         }
        if (cant == em) vl.max_carateres_txt(txt_fam_email,cant,evt);
    }//GEN-LAST:event_txt_fam_emailKeyTyped

    private void txt_fam_lug_trabKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_lug_trabKeyReleased

    }//GEN-LAST:event_txt_fam_lug_trabKeyReleased

    private void txt_fam_lug_trabKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_lug_trabKeyTyped
        cant = txt_fam_lug_trab.getText().length();
        if (cant>= 0 && cant<ltr ){    vl.Solo_Numeros_Letras(evt);         }
        if (cant == ltr) vl.max_carateres_txt(txt_fam_lug_trab,cant,evt);
    }//GEN-LAST:event_txt_fam_lug_trabKeyTyped

    private void txt_fam_ape_nomKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_ape_nomKeyReleased

    }//GEN-LAST:event_txt_fam_ape_nomKeyReleased

    private void txt_fam_ape_nomKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_ape_nomKeyTyped
        cant = txt_fam_ape_nom.getText().length();
        if (cant>= 0 && cant<prs ){   vl.Solo_Letras(evt);     }
        if (cant == prs) vl.max_carateres_txt(txt_fam_ape_nom,cant,evt);
    }//GEN-LAST:event_txt_fam_ape_nomKeyTyped

    private void txt_fam_cedKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_cedKeyPressed

    }//GEN-LAST:event_txt_fam_cedKeyPressed

    private void txt_fam_cedKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_cedKeyTyped
        cant = txt_fam_ced.getText().length();
        if (cant>= 0 && cant<cdl ){      vl.Solo_Numeros(evt);          }
        if (cant == cdl) vl.max_carateres_txt(txt_fam_ced,cant,evt);
    }//GEN-LAST:event_txt_fam_cedKeyTyped

    private void btn_fam_busActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fam_busActionPerformed
        fam_ced="";
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
                    bus_persona(fam_ced);
                } catch (ParseException ex) {
                    Logger.getLogger(frm_familiar.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }else{
            if(frm_principal.v_busc_emple==null && frm_principal.v_busc_estud==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_person = new frm_buscar_persona();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_person);
                frm_principal.v_busc_person.formul=1;
            }else{
                frm_principal.enfocar_ventana();
            }
        }
    }//GEN-LAST:event_btn_fam_busActionPerformed

    private void txt_fam_telKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_telKeyPressed

    }//GEN-LAST:event_txt_fam_telKeyPressed

    private void txt_fam_telKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_telKeyTyped
        cant = txt_fam_tel.getText().length();
        if (cant>= 0 && cant<tlf ){       vl.Solo_Numeros(evt);        }
        if (cant == tlf) vl.max_carateres_txt(txt_fam_tel,cant,evt);
    }//GEN-LAST:event_txt_fam_telKeyTyped

    private void txt_fam_profesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_fam_profesActionPerformed

    }//GEN-LAST:event_txt_fam_profesActionPerformed

    private void txt_fam_profesKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_profesKeyReleased

    }//GEN-LAST:event_txt_fam_profesKeyReleased

    private void txt_fam_profesKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_fam_profesKeyTyped
        cant = txt_fam_profes.getText().length();
        if (cant>= 0 && cant<prf ){     vl.Solo_Letras(evt);        }
        if (cant == prf) vl.max_carateres_txt(txt_fam_profes,cant,evt);
    }//GEN-LAST:event_txt_fam_profesKeyTyped

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_famil=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void color_campos_oblig (){
        txt_fam_ced.setBackground(vl.ama);    
        txt_fam_ape_nom.setBackground(vl.ama); 
    }
    private void Limpiar(){
        vl.col_orig5(btn_fam_nue,btn_fam_mod,btn_fam_eli,btn_fam_guardar,btn_fam_salir);
        this.setTitle("Información de Familiares");//Titulo formulario
//Limpio las cajas de texto        
        String limp ="";
        txt_fam_ced.setText(limp);
        txt_fam_tel.setText(limp);
        txt_fam_ape_nom.setText(limp);
        txt_fam_lug_trab.setText(limp);
        txt_fam_profes.setText(limp);
        txt_fam_email.setText(limp);
// Inicializo las variables
        fam_ced="";
        cod_fam=0;
        oper=0;
        habil_panel(false);//Desabilito el panel para que escoja una opcion
        btn_fam_bus.setEnabled(false); 
        btn_fam_guardar.setEnabled(false);
        btn_fam_limpiar.setEnabled(false);
    }
    
    private void formato_objet(){
        fg.form_etiq4(lbl_1, lbl_2,lbl_4, lbl_5);
        fg.form_etiq2(lbl_6, lbl_7); 
        fg.formato_texto3(txt_fam_ced, txt_fam_ape_nom, txt_fam_lug_trab);
        fg.formato_texto3(txt_fam_email, txt_fam_tel, txt_fam_profes);   
    }
 private void verif_dat_neces(){
 //Verifica que los datos necesarios esten escritos o seleccionados
        if (txt_fam_ced.getText().length()==0 ){
            JOptionPane.showMessageDialog(this, "Debe ingresar el número de Cédula del familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            txt_fam_ced.requestFocus();             
            dat_nec=0;
        }else{
            if (txt_fam_ced.getText().length()<10 ){
                JOptionPane.showMessageDialog(this, "Faltan digitos en el número de Cédula del familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_fam_ced.requestFocus();             
                dat_nec=0;
            }else{      
                fam_ced=txt_fam_ced.getText();
                dat_nec=vl.verif_cedula(fam_ced,txt_fam_ced);
                if (dat_nec==0){
                    JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    txt_fam_ced.requestFocus();
                    dat_nec=0;
                }else{    
                    if (txt_fam_ape_nom.getText().length()==0 ){
                        JOptionPane.showMessageDialog(this, "Debe de ingresar los Apellidos y Nombres del familiar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_fam_ape_nom.requestFocus();             
                        dat_nec=0;
                    }  
                }     
            }
        }
    }   

    private void presentar_fam(){
        txt_fam_ced.setText(fam_ced) ;
        txt_fam_ape_nom.setText(fam_nom) ;
        txt_fam_lug_trab.setText(fam_l_trab) ;
        txt_fam_email.setText(fam_email) ;
        txt_fam_tel.setText(fam_tel) ;
        txt_fam_profes.setText(fam_profes);           
    }   
    private void capt_datos_fam(){
//Se capturan los datos ingresados en las variables designadas  
        fam_ced         =txt_fam_ced.getText();
        fam_nom         =txt_fam_ape_nom.getText();
        fam_l_trab      =txt_fam_lug_trab.getText();
        fam_email       =txt_fam_email.getText();
        fam_tel         =txt_fam_tel.getText();
        fam_profes      =txt_fam_profes.getText();        
    }
    
    private void habil_panel(boolean hab){
        txt_fam_ced.setEnabled(hab);
        txt_fam_tel.setEnabled(hab);
        txt_fam_ape_nom.setEnabled(hab);
        txt_fam_lug_trab.setEnabled(hab);
        txt_fam_profes.setEnabled(hab);
        txt_fam_email.setEnabled(hab);            
    }
    
    private void bloquear_obj(boolean hab){
        txt_fam_ced.setEditable(hab);
        txt_fam_tel.setEditable(hab);
        txt_fam_ape_nom.setEditable(hab);
        txt_fam_lug_trab.setEditable(hab);
        txt_fam_profes.setEditable(hab);
        txt_fam_email.setEditable(hab);
                   
    }
 
    public void bus_persona(String cd_pers) throws ParseException{
//Busco la información del familiar seleccionado
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id ,cedula,persona,lug_trab ,email, \n" +
            " telefono , profesion \n" +
            " FROM persona \n" +
            " WHERE cedula = '" + cd_pers + "' \n" +
            " AND est_reg = '" + a_est + "' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_fam     =   rs.getInt("id");
                fam_ced     =   rs.getString("cedula");
                fam_nom     =   rs.getString("persona");
                fam_l_trab  =   rs.getString("lug_trab");   
                fam_email   =   rs.getString("email");
                fam_tel     =   rs.getString("telefono");
                fam_profes  =   rs.getString("profesion");
                if (oper==2){
                    habil_panel(true);
                    bloquear_obj(true);                   
                }else{
                    habil_panel(true);
                    bloquear_obj(false);
                    txt_fam_ced.setEditable(true);
                }                
                presentar_fam();
            }else{
                JOptionPane.showMessageDialog(this, "El número de Cédula '"+cd_pers+"' no existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_fam_ced.requestFocus();
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_familiar.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_fam_bus;
    private javax.swing.JButton btn_fam_eli;
    private javax.swing.JButton btn_fam_guardar;
    private javax.swing.JButton btn_fam_limpiar;
    private javax.swing.JButton btn_fam_mod;
    private javax.swing.JButton btn_fam_nue;
    private javax.swing.JButton btn_fam_salir;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_7;
    private javax.swing.JTextField txt_fam_ape_nom;
    private javax.swing.JTextField txt_fam_ced;
    private javax.swing.JTextField txt_fam_email;
    private javax.swing.JTextField txt_fam_lug_trab;
    private javax.swing.JTextField txt_fam_profes;
    private javax.swing.JTextField txt_fam_tel;
    // End of variables declaration//GEN-END:variables
}
