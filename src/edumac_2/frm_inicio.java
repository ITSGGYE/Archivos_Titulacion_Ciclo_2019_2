
package edumac_2;

public class frm_inicio extends javax.swing.JFrame {
    public String titulo="<html>Modulo de Matriculación y Registro de Control de pagos de Mensualidades<html>";
    
    Validaciones vl = new Validaciones();

    public frm_inicio() {
        initComponents();
        lbl_titulo.setText(titulo);
        this.setLocationRelativeTo(null);
        setTitle("Presentación");
    }    

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        lbl_Logo = new javax.swing.JLabel();
        lbl_nombre = new javax.swing.JLabel();
        lbl_titulo = new javax.swing.JLabel();
        btn_siguiente = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(255, 255, 255));
        setResizable(false);

        lbl_Logo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Imagenes/Logo_Edummac.png"))); // NOI18N

        lbl_nombre.setBackground(new java.awt.Color(255, 255, 255));
        lbl_nombre.setFont(new java.awt.Font("Times New Roman", 1, 24)); // NOI18N
        lbl_nombre.setText("EDUMMAC");

        lbl_titulo.setBackground(java.awt.Color.white);
        lbl_titulo.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        lbl_titulo.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        lbl_titulo.setText("Sistema de Matriculación");

        btn_siguiente.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Siguiente.png"))); // NOI18N
        btn_siguiente.setText("Siguiente");
        btn_siguiente.setHorizontalTextPosition(javax.swing.SwingConstants.LEFT);
        btn_siguiente.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_siguiente.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_siguienteActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_siguiente)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(layout.createSequentialGroup()
                            .addGap(19, 19, 19)
                            .addComponent(lbl_Logo)
                            .addGap(28, 28, 28)
                            .addComponent(lbl_nombre))
                        .addComponent(lbl_titulo, javax.swing.GroupLayout.PREFERRED_SIZE, 268, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(19, 19, 19)
                        .addComponent(lbl_Logo))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(lbl_nombre)
                        .addGap(15, 15, 15)))
                .addComponent(lbl_titulo, javax.swing.GroupLayout.PREFERRED_SIZE, 74, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(btn_siguiente)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_siguienteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_siguienteActionPerformed
        frm_login login = new frm_login(new javax.swing.JDialog(),true) ;
        setVisible(false);
        login.setVisible(true);
        this.dispose();
    }//GEN-LAST:event_btn_siguienteActionPerformed

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
            java.util.logging.Logger.getLogger(frm_inicio.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(frm_inicio.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(frm_inicio.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(frm_inicio.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new frm_inicio().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_siguiente;
    private javax.swing.JLabel lbl_Logo;
    private javax.swing.JLabel lbl_nombre;
    private javax.swing.JLabel lbl_titulo;
    // End of variables declaration//GEN-END:variables
}
