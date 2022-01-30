
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_cambiar_claves extends javax.swing.JInternalFrame {
//Para datos del usuario
    public  String usuario=""   , nue_pass=""   , ant_pass="";
    public String conf_pass="";
    public int id_usu=0;
//Para validaciones varias  
    public int conf=0         ,   oper=0      ,   grabado=0   ;
    public int dat_nec=0      ,   cant=2      ;
    public String sql=""      ;
    public String a_est=""      ;
    public char[] arrayC ;
    public String v_pass =""    ;
//Catidad maxima de caracteres
    public int usa=12    ,   pwr=10  ;
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_cambiar_claves() {
        initComponents();
        this.setTitle("Cambiar Clave");//Titulo formulario
        vl.logo_jif(this,cant);
        formato_objet();

    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        lbl_3 = new javax.swing.JLabel();
        lbl_4 = new javax.swing.JLabel();
        txt_pass_ant = new javax.swing.JPasswordField();
        txt_usuario = new javax.swing.JTextField();
        txt_pass_nue = new javax.swing.JPasswordField();
        txt_conf_pass = new javax.swing.JPasswordField();
        jtb_est_opc = new javax.swing.JToolBar();
        btn_cam_cla_lim = new javax.swing.JButton();
        btn_cam_cla_guardar = new javax.swing.JButton();
        btn_cam_cla_salir = new javax.swing.JButton();

        setClosable(true);
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

        lbl_1.setText("Usuario");

        lbl_2.setText("Contraseña Anterior:");

        lbl_3.setText("Contraseña Nueva:");

        lbl_4.setText("Confirmar Contraseña:");

        txt_pass_ant.setEchoChar('*');
        txt_pass_ant.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_pass_antKeyTyped(evt);
            }
        });

        txt_usuario.setMinimumSize(new java.awt.Dimension(6, 30));
        txt_usuario.setPreferredSize(new java.awt.Dimension(6, 24));
        txt_usuario.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_usuarioFocusLost(evt);
            }
        });
        txt_usuario.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_usuarioKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_4)
                    .addComponent(lbl_2)
                    .addComponent(lbl_3)
                    .addComponent(lbl_1))
                .addGap(27, 27, 27)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(txt_usuario, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(txt_pass_ant)
                    .addComponent(txt_pass_nue)
                    .addComponent(txt_conf_pass, javax.swing.GroupLayout.DEFAULT_SIZE, 116, Short.MAX_VALUE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap(13, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_usuario, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_1))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_pass_ant, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_pass_nue, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_3))
                .addGap(9, 9, 9)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_conf_pass, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_4))
                .addGap(23, 23, 23))
        );

        jtb_est_opc.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        jtb_est_opc.setRollover(true);

        btn_cam_cla_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_cam_cla_lim.setText("Limpiar");
        btn_cam_cla_lim.setToolTipText("Limpiar Formulario");
        btn_cam_cla_lim.setFocusable(false);
        btn_cam_cla_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_cam_cla_lim.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_cam_cla_lim.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_cam_cla_lim.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_cam_cla_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_cam_cla_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_cam_cla_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_cam_cla_lim);

        btn_cam_cla_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_cam_cla_guardar.setText("Guardar");
        btn_cam_cla_guardar.setToolTipText("Guardar");
        btn_cam_cla_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_cam_cla_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_cam_cla_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_cam_cla_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_cam_cla_guardar);

        btn_cam_cla_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_cam_cla_salir.setText("Salir");
        btn_cam_cla_salir.setToolTipText("Salir");
        btn_cam_cla_salir.setFocusable(false);
        btn_cam_cla_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_cam_cla_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_cam_cla_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_cam_cla_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_cam_cla_salir);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txt_pass_antKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_pass_antKeyTyped
        cant = txt_pass_ant.getPassword().length ;
        if (cant == pwr) vl.max_carateres_txt(txt_pass_ant,cant,evt);
    }//GEN-LAST:event_txt_pass_antKeyTyped

    private void txt_usuarioFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_usuarioFocusLost
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_usuarioFocusLost

    private void txt_usuarioKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_usuarioKeyTyped
        cant = txt_usuario.getText().length();
        if (cant>= 0 && cant<usa ) vl.Solo_Letras(evt);
        if (cant == usa) vl.max_carateres_txt(txt_usuario,cant,evt);
    }//GEN-LAST:event_txt_usuarioKeyTyped

    private void btn_cam_cla_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_cam_cla_limActionPerformed
        limpiar();
    }//GEN-LAST:event_btn_cam_cla_limActionPerformed

    private void btn_cam_cla_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_cam_cla_guardarActionPerformed
        try {
            dat_nec=1;
            verif_dat_neces();
            if (dat_nec==1){
                ant_pass= Hash.sha1(ant_pass);
                bus_usuario(usuario,ant_pass);
                if (dat_nec==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de cambiar la clave del usuario "+ usuario + " ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        //Para encriptar o cifrer el password
                        nue_pass= Hash.sha1(conf_pass);
                        CRUD_Cambiar_Claves cam_clav = new CRUD_Cambiar_Claves();
                        grabado = cam_clav.act_clave(id_usu,nue_pass);
                        if(grabado == 0){
                            JOptionPane.showMessageDialog(this, "La clave no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }else{
                            JOptionPane.showMessageDialog(this, "La clave del usuario "+ usuario + " fue cambiada en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            limpiar();
                        }
                    }
                }

            }
        } catch (ParseException ex) {
            Logger.getLogger(frm_cambiar_claves.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_btn_cam_cla_guardarActionPerformed

    private void btn_cam_cla_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_cam_cla_salirActionPerformed
        frm_principal.v_camb_cla=null;
        this.dispose();
    }//GEN-LAST:event_btn_cam_cla_salirActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_camb_cla=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void formato_objet(){
        fg.form_etiq4(lbl_1, lbl_2, lbl_3, lbl_4);
        fg.formato_texto1(txt_usuario);  
        fg.formato_contras3(txt_pass_ant, txt_pass_nue, txt_conf_pass);       
    }

     private void limpiar(){
        String limp ="";
        txt_usuario.setText(limp);
        txt_pass_ant.setText(limp);
        txt_pass_nue.setText(limp);
        txt_conf_pass.setText(limp);
        usuario="" ;  
        nue_pass="" ;  
        ant_pass="";
        conf_pass="";
        id_usu=0;
    }
    
    public void bus_usuario(String usr,String pssw) throws ParseException{
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id FROM usuario \n" +
                " WHERE usuario = '"+usr+"' \n" +
                " AND clave     = '"+pssw+"'\n"+ 
                 "AND est_reg   = '"+a_est+"' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                id_usu=rs.getInt("id");  
                dat_nec=1;                
            }else{
                JOptionPane.showMessageDialog(this, "Usuario o Clave incorrectos", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                txt_usuario.requestFocus();
                dat_nec=0;
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_cambiar_claves.class.getName()).log(Level.SEVERE, null, ex);
        }      
    } 
     private void verif_dat_neces() throws ParseException{
         usuario=txt_usuario.getText();
         ant_pass = new String (txt_pass_ant.getPassword());
         nue_pass = new String (txt_pass_nue.getPassword());
         conf_pass = new String (txt_conf_pass.getPassword());
         if ("".equals(usuario)){
            JOptionPane.showMessageDialog(this, "Debe ingresar el Usuario", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            txt_usuario.requestFocus();             
            dat_nec=0;
        }else{
            //ant_pass = new String (txt_pass_ant.getPassword());                       
            //arrayC = txt_pass_ant.getPassword();
            //v_pass = new String(arrayC);
            if ("".equals(ant_pass)){
                JOptionPane.showMessageDialog(this, "Debe ingresar la clave anterior", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_pass_ant.requestFocus();             
                dat_nec=0;
            }else{   
                if ("".equals(nue_pass)){
                    JOptionPane.showMessageDialog(this, "Debe ingresar la nueva clave", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                    txt_pass_nue.requestFocus();             
                    dat_nec=0;
                }else{
                    if ("".equals(conf_pass) ){
                        JOptionPane.showMessageDialog(this, "Debe ingresar la confirmacion de la nueva clave", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                        txt_conf_pass.requestFocus();             
                        dat_nec=0;
                    }else{
                        if(!nue_pass.equals(conf_pass)){
                            JOptionPane.showMessageDialog(this, "La nueva clave y su confirmación no son iguales", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                            txt_pass_nue.requestFocus();             
                            dat_nec=0;          
                        } 
                    }    
                }
            }
        }
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_cam_cla_guardar;
    private javax.swing.JButton btn_cam_cla_lim;
    private javax.swing.JButton btn_cam_cla_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JPasswordField txt_conf_pass;
    public static javax.swing.JPasswordField txt_pass_ant;
    private javax.swing.JPasswordField txt_pass_nue;
    public static javax.swing.JTextField txt_usuario;
    // End of variables declaration//GEN-END:variables
}
