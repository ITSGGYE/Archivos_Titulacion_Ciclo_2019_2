
package edumac_2;

public class frm_val_salida_sist extends javax.swing.JInternalFrame {

    public int cant=1;
    Validaciones vl = new Validaciones();
            
    public frm_val_salida_sist() {
        initComponents();
        setTitle("Comprobar Salida del Sistema");
        vl.logo_jif(this,cant);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        lbl_imagen = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        btn_salir_acep = new javax.swing.JButton();
        btn_salir_canc = new javax.swing.JButton();

        lbl_imagen.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Imagenes/Preguntar.png"))); // NOI18N

        jLabel1.setFont(new java.awt.Font("Calibri", 1, 18)); // NOI18N
        jLabel1.setText("¿ Esta seguro de salir del sistema ?");

        btn_salir_acep.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Aceptar.png"))); // NOI18N
        btn_salir_acep.setText("Aceptar");
        btn_salir_acep.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        btn_salir_acep.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_salir_acep.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_salir_acepActionPerformed(evt);
            }
        });

        btn_salir_canc.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Cancelar.png"))); // NOI18N
        btn_salir_canc.setText("Cerrar");
        btn_salir_canc.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        btn_salir_canc.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_salir_canc.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_salir_cancActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(btn_salir_acep)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_salir_canc))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lbl_imagen, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel1)))
                .addGap(0, 9, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_imagen, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(10, 10, 10)
                        .addComponent(jLabel1)))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(btn_salir_canc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(btn_salir_acep))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_salir_acepActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_salir_acepActionPerformed
        System.exit(0);
    }//GEN-LAST:event_btn_salir_acepActionPerformed

    private void btn_salir_cancActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_salir_cancActionPerformed
        frm_principal.v_sal_sist=null;
        this.dispose();
    }//GEN-LAST:event_btn_salir_cancActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_salir_acep;
    private javax.swing.JButton btn_salir_canc;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel lbl_imagen;
    // End of variables declaration//GEN-END:variables
}
