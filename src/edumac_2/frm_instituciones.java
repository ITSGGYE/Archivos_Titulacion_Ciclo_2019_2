
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;


public class frm_instituciones extends javax.swing.JInternalFrame {
//Para la Institucion
    public String nom_int =""   ,   ruc =""     ,   amie =""    ;
    public String dir =""       ,   tel =""     ,   rector =""  ;
    public String secre =""                                     ;
    public int cod_peri=0       ,   dat_nec =0  ,   conf=0      ;
//Para validaciones varias
    public int cant=7;
    public String sql_inf="";
    public int grabado=0   ;
//Catidad maxima de caracteres
    public int nm=60    ,   rc=14   ,   ami=10   ,   dr=60   ,   tlf=10;
    public int rct=60    ,   scr=60 ;
    
    Formato_General fg = new Formato_General();        
    Validaciones vl = new Validaciones();

    public frm_instituciones() {
        initComponents();
        setTitle("Información de la Escuela");
        vl.logo_jif(this,cant);
        formato_objet();
        color_campos_oblig ();
        dat_inst();
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_f_lim = new javax.swing.JButton();
        btn_f_guardar = new javax.swing.JButton();
        btn_d_salir = new javax.swing.JButton();
        pnl_dat_inst = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        txt_institucion = new javax.swing.JTextField();
        pnl_inf_repre = new javax.swing.JPanel();
        lbl_6 = new javax.swing.JLabel();
        txt_rect = new javax.swing.JTextField();
        lbl_7 = new javax.swing.JLabel();
        txt_secre = new javax.swing.JTextField();
        lbl_2 = new javax.swing.JLabel();
        txt_ruc = new javax.swing.JTextField();
        lbl_5 = new javax.swing.JLabel();
        txt_amie = new javax.swing.JTextField();
        lbl_3 = new javax.swing.JLabel();
        txt_direccion = new javax.swing.JTextField();
        txt_telefono = new javax.swing.JTextField();
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

        btn_f_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Limpiar.png"))); // NOI18N
        btn_f_lim.setText("Limpiar");
        btn_f_lim.setToolTipText("Limpiar Formulario");
        btn_f_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_f_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_f_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_f_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_f_lim);

        btn_f_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_f_guardar.setText("Guardar");
        btn_f_guardar.setToolTipText("Guardar");
        btn_f_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_f_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_f_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_f_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_f_guardar);

        btn_d_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_d_salir.setText("Salir");
        btn_d_salir.setToolTipText("Salir");
        btn_d_salir.setFocusable(false);
        btn_d_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_d_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_d_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_d_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_d_salir);

        pnl_dat_inst.setBorder(javax.swing.BorderFactory.createEtchedBorder());

        lbl_1.setText("Nombre");

        txt_institucion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_institucionActionPerformed(evt);
            }
        });
        txt_institucion.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_institucionKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_institucionKeyTyped(evt);
            }
        });

        pnl_inf_repre.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Representantes:", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_6.setText("Resctor(a):");

        txt_rect.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_rectKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_rectKeyTyped(evt);
            }
        });

        lbl_7.setText("Secretario(a):");

        txt_secre.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_secreKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_secreKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_inf_repreLayout = new javax.swing.GroupLayout(pnl_inf_repre);
        pnl_inf_repre.setLayout(pnl_inf_repreLayout);
        pnl_inf_repreLayout.setHorizontalGroup(
            pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_inf_repreLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_6)
                    .addComponent(lbl_7))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 27, Short.MAX_VALUE)
                .addGroup(pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(txt_secre, javax.swing.GroupLayout.DEFAULT_SIZE, 301, Short.MAX_VALUE)
                    .addComponent(txt_rect))
                .addContainerGap())
        );
        pnl_inf_repreLayout.setVerticalGroup(
            pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_inf_repreLayout.createSequentialGroup()
                .addGap(6, 6, 6)
                .addGroup(pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_6)
                    .addComponent(txt_rect, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 11, Short.MAX_VALUE)
                .addGroup(pnl_inf_repreLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_7)
                    .addComponent(txt_secre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap())
        );

        lbl_2.setText("RUC:");

        txt_ruc.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_rucKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_rucKeyTyped(evt);
            }
        });

        lbl_5.setText("Cod AMIE:");

        txt_amie.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_amieKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_amieKeyTyped(evt);
            }
        });

        lbl_3.setText("Dirección:");

        txt_direccion.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_direccionKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_direccionKeyTyped(evt);
            }
        });

        txt_telefono.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_telefonoKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_telefonoKeyTyped(evt);
            }
        });

        lbl_4.setText("Teléfono:");

        javax.swing.GroupLayout pnl_dat_instLayout = new javax.swing.GroupLayout(pnl_dat_inst);
        pnl_dat_inst.setLayout(pnl_dat_instLayout);
        pnl_dat_instLayout.setHorizontalGroup(
            pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_instLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_instLayout.createSequentialGroup()
                        .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_2)
                            .addComponent(lbl_1))
                        .addGap(26, 26, 26)
                        .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(pnl_dat_instLayout.createSequentialGroup()
                                .addComponent(txt_ruc, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(lbl_5)
                                .addGap(28, 28, 28)
                                .addComponent(txt_amie, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(txt_institucion, javax.swing.GroupLayout.PREFERRED_SIZE, 330, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(pnl_dat_instLayout.createSequentialGroup()
                        .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_4)
                            .addComponent(lbl_3))
                        .addGap(18, 18, 18)
                        .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txt_direccion, javax.swing.GroupLayout.PREFERRED_SIZE, 377, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(pnl_dat_instLayout.createSequentialGroup()
                                .addComponent(txt_telefono, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(73, 73, 73))))
                    .addComponent(pnl_inf_repre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_dat_instLayout.setVerticalGroup(
            pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_instLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_1)
                    .addComponent(txt_institucion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_2)
                    .addComponent(txt_ruc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_5)
                    .addComponent(txt_amie, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(pnl_dat_instLayout.createSequentialGroup()
                        .addGroup(pnl_dat_instLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_direccion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_3))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txt_telefono, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(lbl_4))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 19, Short.MAX_VALUE)
                .addComponent(pnl_inf_repre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(pnl_dat_inst, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_inst, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_f_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_f_limActionPerformed
        Limpiar();
    }//GEN-LAST:event_btn_f_limActionPerformed

    private void btn_f_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_f_guardarActionPerformed
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){
            capt_datos();
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los datos de la Institución?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                CRUD_Institucion mod_inst = new CRUD_Institucion();
                grabado = mod_inst.mod_inst(nom_int, ruc, amie, dir, tel, rector, secre) ;                
                if(grabado != 1){
                    JOptionPane.showMessageDialog(this, "Los datos de la Institución no se pudieron actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    
                }else{
                    JOptionPane.showMessageDialog(this, "Los datos de la Institución se actualizaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);

                }
            }
        }
    }//GEN-LAST:event_btn_f_guardarActionPerformed

    private void btn_d_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_salirActionPerformed
        frm_principal.v_inst=null;
        this.dispose();
    }//GEN-LAST:event_btn_d_salirActionPerformed

    private void txt_institucionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_institucionActionPerformed

    }//GEN-LAST:event_txt_institucionActionPerformed

    private void txt_institucionKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_institucionKeyPressed

    }//GEN-LAST:event_txt_institucionKeyPressed

    private void txt_institucionKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_institucionKeyTyped
        cant = txt_institucion.getText().length();
        if (cant>= 0 && cant<nm )  vl.Solo_Letras(evt);
        if (cant == nm) vl.max_carateres_txt(txt_institucion,cant,evt);
    }//GEN-LAST:event_txt_institucionKeyTyped

    private void txt_rectKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rectKeyPressed

    }//GEN-LAST:event_txt_rectKeyPressed

    private void txt_rectKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rectKeyTyped
        cant = txt_rect.getText().length();
        if (cant>= 0 && cant<rct ) vl.Solo_Letras(evt);
        if (cant == rct) vl.max_carateres_txt(txt_rect,cant,evt);
    }//GEN-LAST:event_txt_rectKeyTyped

    private void txt_secreKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_secreKeyPressed

    }//GEN-LAST:event_txt_secreKeyPressed

    private void txt_secreKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_secreKeyTyped
        cant = txt_secre.getText().length();
        if (cant>= 0 && cant<scr ) vl.Solo_Letras(evt);
        if (cant == scr) vl.max_carateres_txt(txt_secre,cant,evt);
    }//GEN-LAST:event_txt_secreKeyTyped

    private void txt_rucKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rucKeyPressed

    }//GEN-LAST:event_txt_rucKeyPressed

    private void txt_rucKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rucKeyTyped
        cant = txt_ruc.getText().length();
        if (cant>= 0 && cant<rc ) vl.Solo_Numeros(evt);
        if (cant == rc) vl.max_carateres_txt(txt_ruc,cant,evt);
    }//GEN-LAST:event_txt_rucKeyTyped

    private void txt_amieKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_amieKeyPressed

    }//GEN-LAST:event_txt_amieKeyPressed

    private void txt_amieKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_amieKeyTyped
        cant = txt_telefono.getText().length();
        if (cant == ami) vl.max_carateres_txt(txt_amie,cant,evt);
    }//GEN-LAST:event_txt_amieKeyTyped

    private void txt_direccionKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_direccionKeyPressed

    }//GEN-LAST:event_txt_direccionKeyPressed

    private void txt_direccionKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_direccionKeyTyped
        cant = txt_telefono.getText().length();
        if (cant == dr) vl.max_carateres_txt(txt_direccion,cant,evt);
    }//GEN-LAST:event_txt_direccionKeyTyped

    private void txt_telefonoKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_telefonoKeyPressed

    }//GEN-LAST:event_txt_telefonoKeyPressed

    private void txt_telefonoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_telefonoKeyTyped
        cant = txt_telefono.getText().length();
        if (cant>= 0 && cant<tlf )  vl.Solo_Numeros(evt);
        if (cant == tlf) vl.max_carateres_txt(txt_telefono,cant,evt);
    }//GEN-LAST:event_txt_telefonoKeyTyped

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_inst=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void Limpiar(){
            String vacio="";
            txt_institucion.setText(vacio);
            txt_ruc.setText(vacio);
            txt_amie.setText(vacio);
            txt_direccion.setText(vacio);
            txt_telefono.setText(vacio);
            txt_rect.setText(vacio);
            txt_secre.setText(vacio);                     
    }
    private void capt_datos(){
            nom_int=txt_institucion.getText();
            ruc=txt_ruc.getText();
            amie=txt_amie.getText();
            dir=txt_direccion.getText();
            tel=txt_telefono.getText();
            rector=txt_rect.getText();
            secre=txt_secre.getText();
    }
    private void dat_inst(){
        try {
            CRUD c7 = new CRUD();
            sql_inf="SELECT * FROM inf_institucion WHERE id ='1'";
            ResultSet rs = c7.select(sql_inf);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existe Informacion de la Institución en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                txt_institucion.setText(rs.getString("nombre"));
                txt_ruc.setText(rs.getString("ruc"));
                txt_amie.setText(rs.getString("amie"));
                txt_direccion.setText(rs.getString("direccion"));
                txt_telefono.setText(rs.getString("telefono"));
                txt_rect.setText(rs.getString("rector"));
                txt_secre.setText(rs.getString("secretario"));             
             }                  
        } catch (SQLException ex) {
            Logger.getLogger(frm_instituciones.class.getName()).log(Level.SEVERE, null, ex);
        }       
    }
    
    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4, lbl_5);
        fg.form_etiq2(lbl_6, lbl_7); 
        fg.formato_texto5(txt_institucion, txt_ruc, txt_amie, txt_direccion, txt_telefono);  
        fg.formato_texto2(txt_rect,txt_secre);   
    }
 
    private void color_campos_oblig (){
        txt_institucion.setBackground(vl.ama);    
        txt_direccion.setBackground(vl.ama); 
        txt_rect.setBackground(vl.ama); 
        txt_secre.setBackground(vl.ama);
    } 
    
    private void verif_dat_neces(){
        dat_nec= 1;
       if (txt_institucion.getText().length()==0 ){
            JOptionPane.showMessageDialog(this, "Debe ingresar el nombre de la Institución", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            dat_nec=0;
        }else{
            if (txt_direccion.getText().length()==0 ){
                JOptionPane.showMessageDialog(this, "FDebe ingresar la Dirección de la Institución", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                dat_nec=0;
            }else{
                if (txt_rect.getText().length()==0 ){
                    JOptionPane.showMessageDialog(this, "Debe ingresar el Nombre del Rector de la Institución", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    dat_nec=0;
                }else{
                    if (txt_secre.getText().length()==0 ){
                        JOptionPane.showMessageDialog(this, "Debe ingresar el Nombre del Secretario de la Institución", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        dat_nec=0;
                    }                    
                }
            }
        }
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_d_salir;
    private javax.swing.JButton btn_f_guardar;
    private javax.swing.JButton btn_f_lim;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_7;
    private javax.swing.JPanel pnl_dat_inst;
    private javax.swing.JPanel pnl_inf_repre;
    private javax.swing.JTextField txt_amie;
    private javax.swing.JTextField txt_direccion;
    private javax.swing.JTextField txt_institucion;
    private javax.swing.JTextField txt_rect;
    private javax.swing.JTextField txt_ruc;
    private javax.swing.JTextField txt_secre;
    private javax.swing.JTextField txt_telefono;
    // End of variables declaration//GEN-END:variables
}
