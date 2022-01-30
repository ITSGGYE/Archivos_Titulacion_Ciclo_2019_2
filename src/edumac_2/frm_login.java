
package edumac_2;

import java.awt.event.KeyEvent;
import static java.lang.Integer.parseInt;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;
import java.util.logging.Level;
import java.util.logging.Logger;

public class frm_login extends javax.swing.JDialog {
    //Para el usuario y contraseña
    private String   pass = ""   ;
    //public String usuario="",   rol_usu=""  ;
    public int cod_usu_sis = 0;        
    //Variables_Globales vg=new Variables_Globales();
    Validaciones vl = new Validaciones();

    public frm_login(javax.swing.JDialog parent, boolean modal) {
        super(parent, modal);
        initComponents();
        setTitle("Inicio de Sesión");
        vl.logo(this); 
        this.setLocationRelativeTo(null);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        lbl_imagen2 = new javax.swing.JLabel();
        lbl_usuario = new javax.swing.JLabel();
        lbl_usuario1 = new javax.swing.JLabel();
        btn_salir = new javax.swing.JButton();
        btn_entrar = new javax.swing.JButton();
        txt_pass = new javax.swing.JPasswordField();
        txt_usuario = new javax.swing.JTextField();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setAlwaysOnTop(true);

        lbl_imagen2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Imagenes/Login.png"))); // NOI18N

        lbl_usuario.setFont(new java.awt.Font("Times New Roman", 0, 12)); // NOI18N
        lbl_usuario.setText("USUARIO:");

        lbl_usuario1.setFont(new java.awt.Font("Times New Roman", 0, 12)); // NOI18N
        lbl_usuario1.setText("CONTRASEÑA:");

        btn_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Exit.png"))); // NOI18N
        btn_salir.setText("Salir");
        btn_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_salirActionPerformed(evt);
            }
        });

        btn_entrar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Entrar.png"))); // NOI18N
        btn_entrar.setText("Ingresar");
        btn_entrar.setHorizontalTextPosition(javax.swing.SwingConstants.LEFT);
        btn_entrar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_entrarActionPerformed(evt);
            }
        });

        txt_pass.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_passActionPerformed(evt);
            }
        });
        txt_pass.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_passKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_passKeyTyped(evt);
            }
        });

        txt_usuario.setFont(new java.awt.Font("Times New Roman", 0, 14)); // NOI18N
        txt_usuario.setHorizontalAlignment(javax.swing.JTextField.LEFT);
        txt_usuario.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_usuarioActionPerformed(evt);
            }
        });
        txt_usuario.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_usuarioKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(lbl_imagen2, javax.swing.GroupLayout.PREFERRED_SIZE, 73, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_usuario1)
                            .addComponent(lbl_usuario))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txt_usuario)
                            .addComponent(txt_pass, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(19, 19, 19))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(btn_salir, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(btn_entrar)
                        .addContainerGap())))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(lbl_imagen2, javax.swing.GroupLayout.PREFERRED_SIZE, 67, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_usuario, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_usuario))
                        .addGap(11, 11, 11)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lbl_usuario1)
                            .addComponent(txt_pass, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btn_salir)
                    .addComponent(btn_entrar))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_salirActionPerformed
        this.dispose();
    }//GEN-LAST:event_btn_salirActionPerformed

    private void btn_entrarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_entrarActionPerformed
        ingresar();
    }//GEN-LAST:event_btn_entrarActionPerformed

    private void txt_passActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_passActionPerformed

    }//GEN-LAST:event_txt_passActionPerformed

    private void txt_passKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_passKeyTyped

    }//GEN-LAST:event_txt_passKeyTyped

    private void txt_usuarioActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_usuarioActionPerformed

    }//GEN-LAST:event_txt_usuarioActionPerformed

    private void txt_usuarioKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_usuarioKeyTyped

    }//GEN-LAST:event_txt_usuarioKeyTyped

    private void txt_passKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_passKeyPressed
        if (evt.getKeyCode() == KeyEvent.VK_ENTER) {
                ingresar(); //Método que tienes que crearte
        }
    }//GEN-LAST:event_txt_passKeyPressed

    private void ingresar(){
        pass = new String (txt_pass.getPassword() );        
        if ("".equals(txt_usuario.getText()) ){
            JOptionPane.showMessageDialog(this, "Debe ingresar el usuario", "Error de Ingreso", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            txt_usuario.requestFocus();
        }else{
            if ("".equals(pass) ){
                JOptionPane.showMessageDialog(this, "Debe ingresar la contraseña", "Error de Ingreso", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_pass.requestFocus();
            }else{  
                pass= Hash.sha1(pass);

                    CRUD c7 = new CRUD();
                    String sql ="SELECT e.`empleado`,u.`id` , r.`rol` \n" +
                            "FROM usuario AS u \n" +
                            "INNER JOIN  empleado AS e ON u.`id_empleado`=e.`id` \n" +
                            "INNER JOIN rol AS r  ON u.`id_rol` = r.`id`\n" +
                            "WHERE u.`usuario` = '"+txt_usuario.getText()+"' \n" +
                            "AND u.`clave` = '"+pass+"' \n" +
                            "AND u.`est_reg` = 'A' ";
                    ResultSet rs = c7.select(sql);
                try {
                    if (rs.next()== false){
                        JOptionPane.showMessageDialog(this, "El Usuario o la Contraseña estan incorrecto", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_usuario.requestFocus();
                    }else{
                        frm_principal principal = new frm_principal();        
                        principal.txt_usuario.setText(rs.getString("empleado"));
                        principal.txt_rol.setText(rs.getString("rol"));
                        principal.val_menu(rs.getString("rol"));
                        setVisible(false);
                        setTitle("Inicio de Sesion de Usuarios"); 
                        principal.setVisible(true);
                        this.dispose();
                    }
                } catch (SQLException ex) {
                    Logger.getLogger(frm_login.class.getName()).log(Level.SEVERE, null, ex);
                }           
            }
        }        
    }

    public static void main(String args[]) {

        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(frm_login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(frm_login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(frm_login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(frm_login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }

        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                frm_login dialog = new frm_login(new javax.swing.JDialog(), true);
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
    private javax.swing.JButton btn_entrar;
    private javax.swing.JButton btn_salir;
    private javax.swing.JLabel lbl_imagen2;
    private javax.swing.JLabel lbl_usuario;
    private javax.swing.JLabel lbl_usuario1;
    private javax.swing.JPasswordField txt_pass;
    private javax.swing.JTextField txt_usuario;
    // End of variables declaration//GEN-END:variables
}
