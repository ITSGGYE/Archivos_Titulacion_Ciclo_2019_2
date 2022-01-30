
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_empleados extends javax.swing.JInternalFrame {
//Para los datos del empleado
    public static String emp_ced="";
    public int cod_emp=0        ;
    public String emp=""        ,   emp_dir=""      ;
    public String emp_telf=""   ;
    public String emp_est=""    ;
//Para validaciones varias  
    public int emp_conf=0       ,   emp_oper=0      ,   emp_grabado=0   ;
    public int emp_dat_nec=0    ,   cant=4      ;
    public String    emp_sql="";
//Catidad maxima de caracteres
    public int epd=35    ,   drc=50   ,   fno=10   ,   ln=25   ,   obsv=200;
    public int cdl=10    ;    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_empleados() {
        initComponents();
        this.setTitle("Información Empleados");//Titulo formulario
        vl.logo_jif(this,cant);
        formato_objet();
        vl.col_orig5(btn_emp_nue,btn_emp_mod,btn_emp_eli,btn_emp_guardar,btn_emp_salir);
        color_campos_oblig();
        habil_panel(false);
        bloquear_obj(false);
        btn_emp_lim.setEnabled(false);
        btn_emp_guardar.setEnabled(false);
        btn_empl_bus.setEnabled(false);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_emp_nue = new javax.swing.JButton();
        btn_emp_mod = new javax.swing.JButton();
        btn_emp_eli = new javax.swing.JButton();
        btn_emp_lim = new javax.swing.JButton();
        btn_emp_guardar = new javax.swing.JButton();
        btn_emp_salir = new javax.swing.JButton();
        jPanel2 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        lbl_3 = new javax.swing.JLabel();
        txt_emp_dir = new javax.swing.JTextField();
        txt_emp_emp = new javax.swing.JTextField();
        txt_emp_ced = new javax.swing.JTextField();
        btn_empl_bus = new javax.swing.JButton();
        txt_emp_tel = new javax.swing.JTextField();
        lbl_4 = new javax.swing.JLabel();

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

        btn_emp_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_emp_nue.setText("Nuevo");
        btn_emp_nue.setToolTipText("Nuevo");
        btn_emp_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_nue);

        btn_emp_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_emp_mod.setText("Modificar");
        btn_emp_mod.setToolTipText("Modificar");
        btn_emp_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_mod);

        btn_emp_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_emp_eli.setText("Eliminar");
        btn_emp_eli.setToolTipText("Eliminar ");
        btn_emp_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_eli);

        btn_emp_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_emp_lim.setText("Limpiar");
        btn_emp_lim.setToolTipText("Limpiar Formulario");
        btn_emp_lim.setFocusable(false);
        btn_emp_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_lim.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_emp_lim.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_emp_lim.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_emp_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_lim);

        btn_emp_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_emp_guardar.setText("Guardar");
        btn_emp_guardar.setToolTipText("Guardar");
        btn_emp_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_guardar);

        btn_emp_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_emp_salir.setText("Salir");
        btn_emp_salir.setToolTipText("Salir");
        btn_emp_salir.setFocusable(false);
        btn_emp_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_emp_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_emp_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_emp_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_emp_salir);

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Datos del Empleado", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        lbl_2.setText("Apellidos y Nombres:");

        lbl_3.setText("Dirección:");

        txt_emp_dir.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_emp_dirKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_emp_dirKeyTyped(evt);
            }
        });

        txt_emp_emp.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_emp_empKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_emp_empKeyTyped(evt);
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

        btn_empl_bus.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_empl_bus.setToolTipText("Buscar Familiar");
        btn_empl_bus.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_empl_busActionPerformed(evt);
            }
        });

        txt_emp_tel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_emp_telKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_emp_telKeyTyped(evt);
            }
        });

        lbl_4.setText("Telefono:");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_2)
                    .addComponent(lbl_3)
                    .addComponent(lbl_1)
                    .addComponent(lbl_4))
                .addGap(26, 26, 26)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(txt_emp_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_empl_bus, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(txt_emp_dir, javax.swing.GroupLayout.PREFERRED_SIZE, 300, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_emp_tel, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_emp_emp, javax.swing.GroupLayout.DEFAULT_SIZE, 350, Short.MAX_VALUE))
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGap(11, 11, 11)
                        .addComponent(lbl_1)
                        .addGap(13, 13, 13)
                        .addComponent(lbl_2, javax.swing.GroupLayout.PREFERRED_SIZE, 11, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(lbl_3))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(txt_emp_ced, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btn_empl_bus))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txt_emp_emp, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txt_emp_dir, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_4)
                    .addComponent(txt_emp_tel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(16, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 10, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_emp_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_nueActionPerformed
        emp_oper = 1;//Opcion seleccionada
        vl.col_orig5(btn_emp_nue,btn_emp_mod,btn_emp_eli,btn_emp_guardar,btn_emp_salir);
        this.setTitle("Nuevo Empleado");//Titulo formulario
        habil_panel(true);//Para habilitar los objetos
        bloquear_obj(true);
        btn_emp_nue.setBackground(vl.ama);//Cambia color del boton
        //Activo y desactivo los botones de opcion
        btn_empl_bus.setEnabled(false);
        btn_emp_lim.setEnabled(true);
        btn_emp_guardar.setEnabled(true);
        txt_emp_ced.requestFocus();//Ubico el cursor
    }//GEN-LAST:event_btn_emp_nueActionPerformed

    private void btn_emp_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_modActionPerformed
        emp_oper = 2;//Opcion seleccionada
        vl.col_orig5(btn_emp_nue,btn_emp_mod,btn_emp_eli,btn_emp_guardar,btn_emp_salir);
        this.setTitle("Modificar Datos del Empleado");//Titulo formulario
        habil_panel(false);//Para habilitar los objetos
        btn_emp_mod.setBackground(vl.ama);//Cambia color del boton
        //Activo y desactivo los botones de opcion
        btn_empl_bus.setEnabled(true);
        btn_emp_lim.setEnabled(true);
        btn_emp_guardar.setEnabled(true);
        txt_emp_ced.setEnabled(true);//Ubico el cursor
        txt_emp_ced.requestFocus();//Ubico el cursor
        txt_emp_ced.setEnabled(true);
        txt_emp_ced.setEditable(true);
    }//GEN-LAST:event_btn_emp_modActionPerformed

    private void btn_emp_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_eliActionPerformed
        emp_oper = 3;//Opcion seleccionada
        vl.col_orig5(btn_emp_nue,btn_emp_mod,btn_emp_eli,btn_emp_guardar,btn_emp_salir);
        this.setTitle("Eliminar Datos del Empleado");//Titulo formulario
        habil_panel(false);//Para habilitar los objetos
        btn_emp_eli.setBackground(vl.ama);//Cambia color del boton
        //Activo y desactivo los botones de opcion
        btn_empl_bus.setEnabled(true);
        btn_emp_lim.setEnabled(true);
        btn_emp_guardar.setEnabled(true);
        txt_emp_ced.setEnabled(true);//Ubico el cursor
        txt_emp_ced.requestFocus();//Ubico el cursor
        txt_emp_ced.setEditable(true);

    }//GEN-LAST:event_btn_emp_eliActionPerformed

    private void btn_emp_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_limActionPerformed
        limpiar();               
    }//GEN-LAST:event_btn_emp_limActionPerformed

    private void btn_emp_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_guardarActionPerformed
        if (emp_oper==1 || emp_oper==2){
            emp_dat_nec=1;
            verif_dat_neces();
            if (emp_dat_nec==1){
                capt_datos();
                if(emp_oper==1){
                    try {
                        //Verifico si la cedula existe en el sistema
                        CRUD c = new CRUD();
                        emp_sql= "SELECT id , est_reg, empleado \n"+
                                " FROM empleado WHERE cedula = '"+ emp_ced + "'";
                        ResultSet rs = c.select(emp_sql);
                        if (rs.next()!= false){
                            emp=rs.getString("empleado");
                            cod_emp=rs.getInt("id");
                            if("A".equals(rs.getString("est_reg"))){
                                JOptionPane.showMessageDialog(this, "La cédula ya existe en el sistema, pertenece a  '"+ emp +"'", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                txt_emp_ced.requestFocus();
                            }else{
                                emp_conf = JOptionPane.showConfirmDialog(this, "El cédula fue eliminada del sistem, pertenece a '"+ emp +"'. Desea recuperar los datos", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                if (emp_conf==0){//Confirmación del usuario
                                    CRUD_Empleados emp_recp = new CRUD_Empleados();
                                    emp_grabado = emp_recp.act_emp_eli(cod_emp);
                                    if(emp_grabado == 0){
                                        JOptionPane.showMessageDialog(this, "Los datos dl familiar no se pudieron recuperar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                    }else{
                                        JOptionPane.showMessageDialog(this, "Los datos dl familiar fueron recuperados en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    }
                                }
                            }
                        }else{
                            emp_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del Nuevo Empleado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                            if (emp_conf==0){
                                CRUD_Empleados a_i_emp = new CRUD_Empleados();
                                emp_grabado = a_i_emp.agre_emp(emp_ced,emp,emp_dir,emp_telf);
                                if(emp_grabado == 0){
                                    JOptionPane.showMessageDialog(this, "El Empleado no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Empleado fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    limpiar();
                                }
                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_empleados.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
                if(emp_oper==2){
                    emp_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos del Empleado seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (emp_conf==0){
                        CRUD_Empleados a_a_alu = new CRUD_Empleados();
                        emp_grabado = a_a_alu.act_emp(cod_emp,emp_ced,emp,emp_dir,emp_telf);
                        if(emp_grabado == 0){
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado se actualizaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            limpiar();
                        }else{
                            JOptionPane.showMessageDialog(this, "Los datos del Empleado no se pudieron actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }
                    }
                }
            }
        }
        if(emp_oper==3){
            emp_conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar los datos del Empleado seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (emp_conf==0){
                CRUD_Empleados a_e_alu = new CRUD_Empleados();
                emp_grabado = a_e_alu.eli_emp(cod_emp);
                if(emp_grabado == 1){
                    JOptionPane.showMessageDialog(this, "Los datos del Empleado fueron eliminados del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                    limpiar();
                }else{
                    JOptionPane.showMessageDialog(this, "Los datos del Empleado no fueron eliminados del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                }
            }
        }
    }//GEN-LAST:event_btn_emp_guardarActionPerformed

    private void btn_emp_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_emp_salirActionPerformed
        frm_principal.v_empl=null;
        this.dispose();
    }//GEN-LAST:event_btn_emp_salirActionPerformed

    private void txt_emp_dirKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_dirKeyReleased

    }//GEN-LAST:event_txt_emp_dirKeyReleased

    private void txt_emp_dirKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_dirKeyTyped
        cant = txt_emp_dir.getText().length();
        if (cant == drc) vl.max_carateres_txt(txt_emp_dir,cant,evt);
    }//GEN-LAST:event_txt_emp_dirKeyTyped

    private void txt_emp_empKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_empKeyReleased

    }//GEN-LAST:event_txt_emp_empKeyReleased

    private void txt_emp_empKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_empKeyTyped
        cant = txt_emp_emp.getText().length();
        if (cant>= 0 && cant<epd ){    vl.Solo_Letras(evt);        }
        if (cant == epd) vl.max_carateres_txt(txt_emp_emp,cant,evt);
    }//GEN-LAST:event_txt_emp_empKeyTyped

    private void txt_emp_cedKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_cedKeyPressed

    }//GEN-LAST:event_txt_emp_cedKeyPressed

    private void txt_emp_cedKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_cedKeyTyped
        cant = txt_emp_ced.getText().length();
        if (cant>= 0 && cant<cdl ){     vl.Solo_Numeros(evt);      }
        if (cant == cdl) vl.max_carateres_txt(txt_emp_ced,cant,evt);
    }//GEN-LAST:event_txt_emp_cedKeyTyped

    private void btn_empl_busActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_empl_busActionPerformed
        if (txt_emp_ced.getText().length()==10 ){
            emp_dat_nec=1;
            emp_ced=txt_emp_ced.getText();
            emp_dat_nec=vl.verif_cedula(emp_ced, txt_emp_ced);
            if(emp_dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_emp_ced.requestFocus();//Ubico el cursor
            }
            if (emp_dat_nec==1){
                try {
                    bus_emp(emp_ced);
                } catch (ParseException ex) {
                    Logger.getLogger(frm_empleados.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }else{
            if(frm_principal.v_busc_emple==null && frm_principal.v_busc_estud==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_emple = new frm_buscar_empleado();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_emple);
                frm_principal.v_busc_emple.formul=1;      
            }else{
                frm_principal.enfocar_ventana();  
            }
        }
    }//GEN-LAST:event_btn_empl_busActionPerformed

    private void txt_emp_telKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_telKeyPressed

    }//GEN-LAST:event_txt_emp_telKeyPressed

    private void txt_emp_telKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_emp_telKeyTyped
        cant = txt_emp_tel.getText().length();
        if (cant>= 0 && cant<fno ){     vl.Solo_Numeros(evt);        }
        if (cant == fno) vl.max_carateres_txt(txt_emp_tel,cant,evt);
    }//GEN-LAST:event_txt_emp_telKeyTyped

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_empl=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void formato_objet(){
        fg.form_etiq4(lbl_1, lbl_2, lbl_3, lbl_4);
        fg.formato_texto4(txt_emp_ced, txt_emp_emp, txt_emp_dir, txt_emp_tel);      
    }
    
    public void bus_emp(String cd_est) throws ParseException{
        habil_panel(false);
        bloquear_obj(false);
        try {
            CRUD b_est = new CRUD();
            emp_est="A";
            emp_sql="SELECT id,cedula,empleado,direccion,telefono \n" +
                "FROM empleado WHERE cedula = '"+cd_est+"' AND est_reg= '"+ emp_est+"' ";
            ResultSet rs = b_est.select(emp_sql);
            if (rs.next()!= false){
                cod_emp=rs.getInt("id");
                txt_emp_ced.setText(rs.getString("cedula") );
                txt_emp_emp.setText(rs.getString("empleado") );
                txt_emp_dir.setText(rs.getString("direccion") );
                txt_emp_tel.setText(rs.getString("telefono") );
                if(emp_oper==2){
                        habil_panel(true);
                        bloquear_obj(true);
                        btn_emp_guardar.setEnabled(true);
                    }
                    if(emp_oper==3){
                        habil_panel(true);
                        bloquear_obj(false);
                        txt_emp_ced.setEditable(true);
                        btn_emp_guardar.setEnabled(true);
                    }
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_empleados.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    private void verif_dat_neces(){
        if (txt_emp_ced.getText().length()==0 ){
            JOptionPane.showMessageDialog(this, "Debe ingresar el número de Cédula del Empleado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            txt_emp_ced.requestFocus();             
            emp_dat_nec=0;
        }else{
            if (txt_emp_ced.getText().length()<cdl ){
                JOptionPane.showMessageDialog(this, "Faltan digitos en el número de Cédula del Empleado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_emp_ced.requestFocus();             
                emp_dat_nec=0;
            }else{      
                emp_ced=txt_emp_ced.getText();
                emp_dat_nec=vl.verif_cedula(emp_ced,txt_emp_ced);
                if (emp_dat_nec==0){
                    JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    txt_emp_ced.requestFocus();
                    emp_dat_nec=0;
                }else{    
                    if (txt_emp_emp.getText().length()==0 ){
                        JOptionPane.showMessageDialog(this, "Debe de ingresar los Apellidos y Nombres del Empleado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_emp_emp.requestFocus();             
                        emp_dat_nec=0;                    
                    }    
                }     
            }
        }
    }
    
    private void habil_panel(boolean hab){
        txt_emp_ced.setEnabled(hab);
        txt_emp_emp.setEnabled(hab);
        txt_emp_dir.setEnabled(hab);
        txt_emp_tel.setEnabled(hab);
    }
    
    private void bloquear_obj(boolean hab){
        txt_emp_ced.setEditable(hab);
        txt_emp_emp.setEditable(hab);
        txt_emp_dir.setEditable(hab);
        txt_emp_tel.setEditable(hab);  
    }
    
    private void limpiar(){
        vl.col_orig5(btn_emp_nue,btn_emp_mod,btn_emp_eli,btn_emp_guardar,btn_emp_salir);
        String limp ="";
        txt_emp_ced.setText(limp);
        txt_emp_emp.setText(limp);
        txt_emp_dir.setText(limp);
        txt_emp_tel.setText(limp);
        btn_emp_nue.setEnabled(true);
        btn_emp_mod.setEnabled(true);
        btn_emp_eli.setEnabled(true);
        btn_emp_guardar.setEnabled(false);
        btn_empl_bus.setEnabled(false);       
        habil_panel(false);
        bloquear_obj(false);
        btn_emp_lim.setEnabled(false);
        emp_ced="" ;
        cod_emp=0  ;
    }
    
    private void capt_datos(){
        emp_ced     =   txt_emp_ced.getText();
        emp         =   txt_emp_emp.getText();
        emp_dir     =   txt_emp_dir.getText();
        emp_telf    =   txt_emp_tel.getText();
    }
    private void color_campos_oblig (){
        txt_emp_ced.setBackground(vl.ama);    
        txt_emp_emp.setBackground(vl.ama); 
   
    }
    
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_emp_eli;
    private javax.swing.JButton btn_emp_guardar;
    private javax.swing.JButton btn_emp_lim;
    private javax.swing.JButton btn_emp_mod;
    private javax.swing.JButton btn_emp_nue;
    private javax.swing.JButton btn_emp_salir;
    private javax.swing.JButton btn_empl_bus;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JTextField txt_emp_ced;
    private javax.swing.JTextField txt_emp_dir;
    private javax.swing.JTextField txt_emp_emp;
    private javax.swing.JTextField txt_emp_tel;
    // End of variables declaration//GEN-END:variables
}
