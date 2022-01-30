
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_formas_d_pago extends javax.swing.JInternalFrame {
//Para validaciones varias
    public int cant=6       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_f_pago =0  ;
    public String sql=""    ,   f_pago = ""    ;
//Catidad maxima de caracteres
    public int c_f_pag=30    ;  
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }          };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_formas_d_pago() {
        initComponents();
        this.setTitle("Formas de Pago");   
        vl.logo_jif(this,cant); 
        formato_objet();
        formato_tabla();
        bus_f_pago();
        vl.col_orig5(btn_fdp_nue,btn_fdp_mod,btn_fdp_eli,btn_fdp_guardar,btn_fdp_salir);
        txt_f_pago.setBackground(vl.ama);
        txt_f_pago.setEditable(false);
        btn_fdp_guardar.setEnabled(false);
        tbl_f_pago.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Formas de Pago"); 
        TableColumn columna = tbl_f_pago.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_f_pago.getColumn("Formas de Pago");
        columna.setPreferredWidth(140);
        columna.setMaxWidth(140);
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_fdp_nue = new javax.swing.JButton();
        btn_fdp_mod = new javax.swing.JButton();
        btn_fdp_eli = new javax.swing.JButton();
        btn_fdp_guardar = new javax.swing.JButton();
        btn_fdp_salir = new javax.swing.JButton();
        pnl_dat_rol = new javax.swing.JPanel();
        txt_f_pago = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_f_pago = new javax.swing.JTable();

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

        btn_fdp_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_fdp_nue.setText("Nuevo");
        btn_fdp_nue.setToolTipText("Nuevo");
        btn_fdp_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fdp_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fdp_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fdp_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fdp_nue);

        btn_fdp_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_fdp_mod.setText("Modificar");
        btn_fdp_mod.setToolTipText("Modificar");
        btn_fdp_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fdp_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fdp_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fdp_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fdp_mod);

        btn_fdp_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_fdp_eli.setText("Eliminar");
        btn_fdp_eli.setToolTipText("Eliminar ");
        btn_fdp_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fdp_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fdp_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fdp_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fdp_eli);

        btn_fdp_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_fdp_guardar.setText("Guardar");
        btn_fdp_guardar.setToolTipText("Guardar");
        btn_fdp_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fdp_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fdp_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fdp_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fdp_guardar);

        btn_fdp_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_fdp_salir.setText("Salir");
        btn_fdp_salir.setToolTipText("Salir");
        btn_fdp_salir.setFocusable(false);
        btn_fdp_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_fdp_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_fdp_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_fdp_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_fdp_salir);

        pnl_dat_rol.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Formas de Pago", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_f_pago.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_f_pagoKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_f_pagoKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_f_pagoKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_rolLayout = new javax.swing.GroupLayout(pnl_dat_rol);
        pnl_dat_rol.setLayout(pnl_dat_rolLayout);
        pnl_dat_rolLayout.setHorizontalGroup(
            pnl_dat_rolLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_rolLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_f_pago, javax.swing.GroupLayout.PREFERRED_SIZE, 185, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_dat_rolLayout.setVerticalGroup(
            pnl_dat_rolLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_rolLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_f_pago, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(13, Short.MAX_VALUE))
        );

        tbl_f_pago.setModel(tablamodel);
        tbl_f_pago.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_f_pago.getTableHeader().setReorderingAllowed(false);
        tbl_f_pago.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_f_pagoMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_f_pago);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 202, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.DEFAULT_SIZE, 140, Short.MAX_VALUE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(pnl_dat_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 8, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_fdp_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fdp_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_fdp_nue,btn_fdp_mod,btn_fdp_eli,btn_fdp_guardar,btn_fdp_salir);
        this.setTitle("Nueva Forma de Pago");
        txt_f_pago.setEditable(true);
        tbl_f_pago.setEnabled(false);
        txt_f_pago.requestFocus();
        btn_fdp_nue.setBackground(vl.ama);
        btn_fdp_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_fdp_nueActionPerformed

    private void btn_fdp_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fdp_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_fdp_nue,btn_fdp_mod,btn_fdp_eli,btn_fdp_guardar,btn_fdp_salir);
        this.setTitle("Modificar Forma de Pago");
        txt_f_pago.setEditable(true);
        tbl_f_pago.setEnabled(true);
        txt_f_pago.requestFocus();
        btn_fdp_mod.setBackground(vl.ama);
        btn_fdp_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_fdp_modActionPerformed

    private void btn_fdp_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fdp_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_fdp_nue,btn_fdp_mod,btn_fdp_eli,btn_fdp_guardar,btn_fdp_salir);
        this.setTitle("Eliminar Forma de Pago");
        txt_f_pago.setEditable(false);
        tbl_f_pago.setEnabled(true);
        btn_fdp_eli.setBackground(vl.ama);
        tbl_f_pago.requestFocus();
        btn_fdp_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_fdp_eliActionPerformed

    private void btn_fdp_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fdp_guardarActionPerformed
        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_f_pago.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre de la Forma de Pago", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_f_pago.requestFocus();
            }else{
                f_pago = txt_f_pago.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar la Nueva Forma de Pago?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        try {
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM forma_pago WHERE forma_pago = '"+ f_pago + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "La Forma de Pago fue eliminada del sistema con anterioridad. Desea recuperarla", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_f_pago= Integer.parseInt(rs.getString("id"));
                                        CRUD_Formas_d_Pago act_doc_eli = new CRUD_Formas_d_Pago();
                                        grabado= act_doc_eli.act_fdp_eli(cod_f_pago);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "La Forma de Pago no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "La Forma de Pago fue activada en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_f_pago();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Formas_d_Pago ing_doc = new CRUD_Formas_d_Pago();
                                grabado = ing_doc.agre_fdp(f_pago);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago fue ingresada en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_f_pago.setText("");
                                    bus_f_pago();
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_formas_d_pago.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar la Forma de Pago seleccionada?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            f_pago = txt_f_pago.getText();
                            CRUD c = new CRUD();
                            sql= "SELECT id,est_reg FROM forma_pago WHERE forma_pago = '"+ f_pago + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "La Forma de Pagoo fue eliminada del sistema con anterioridad. Desea recuperarla", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_f_pago= Integer.parseInt(rs.getString("id"));
                                        CRUD_Formas_d_Pago act_doc_eli = new CRUD_Formas_d_Pago();
                                        grabado= act_doc_eli.act_fdp_eli(cod_f_pago);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "La Forma de Pago no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "La Forma de Pago fue activada en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_f_pago();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Formas_d_Pago mod_doc = new CRUD_Formas_d_Pago();
                                grabado = mod_doc.act_fdp(cod_f_pago, f_pago);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago seleccionada no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "La Forma de Pago seleccionada se actualizo en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_f_pago.setText("");
                                    bus_f_pago();
                                }

                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_formas_d_pago.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }
        if(oper==3){
            if (cod_f_pago==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Documento para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar la Forma de Pago seleccionada?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Formas_d_Pago eli_doc = new CRUD_Formas_d_Pago();
                    grabado = eli_doc.eli_fdp(cod_f_pago);
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "La Forma de Pago seleccionada no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "La Forma de Pago seleccionada fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_f_pago.setText("");
                        bus_f_pago();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_fdp_guardarActionPerformed

    private void btn_fdp_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_fdp_salirActionPerformed
        frm_principal.v_fdp=null;
        this.dispose();
    }//GEN-LAST:event_btn_fdp_salirActionPerformed

    private void txt_f_pagoKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_f_pagoKeyPressed

    }//GEN-LAST:event_txt_f_pagoKeyPressed

    private void txt_f_pagoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_f_pagoKeyReleased

    }//GEN-LAST:event_txt_f_pagoKeyReleased

    private void txt_f_pagoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_f_pagoKeyTyped
        cant = txt_f_pago.getText().length();
        if (cant>= 0 && cant<c_f_pag ) vl.Solo_Letras(evt);
        if (cant == c_f_pag) vl.max_carateres_txt(txt_f_pago,cant,evt);
    }//GEN-LAST:event_txt_f_pagoKeyTyped

    private void tbl_f_pagoMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_f_pagoMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_f_pago.getSelectedRow();
            f_pago= tbl_f_pago.getValueAt(fl_sel, 1).toString();
            bus_f_pago_sel(f_pago);
        }
    }//GEN-LAST:event_tbl_f_pagoMouseClicked

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_fdp=null;
    }//GEN-LAST:event_formInternalFrameClosed
   
    private void bus_f_pago(){
        try {
            CRUD b_doc = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT forma_pago \n" +
                "FROM forma_pago WHERE est_reg = 'A'";
            ResultSet rs = b_doc.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Documentos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_f_pago,tablamodel);
                int j =1;
                do{ 
                   Object [] filas = new Object[2];
                   for(int i=0; i<1;i++){                               
                        filas[i] = j;
                        filas[i+1] = rs.getObject(i+1);
                   }
                   datos.add(filas);
                   j=j+1;
                }while(rs.next());
                for(int i=0;i<datos.size();i++) tablamodel.addRow(datos.get(i));       
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_formas_d_pago.class.getName()).log(Level.SEVERE, null, ex);
        }           
    }
    
    private void formato_objet(){
        fg.formato_texto1(txt_f_pago);      
    }
    private void bus_f_pago_sel(String dc){
        try {
            CRUD doc_sel = new CRUD();
            sql="SELECT id \n" +
                "FROM forma_pago WHERE forma_pago = '"+ dc + "'";
            ResultSet rs = doc_sel.select(sql);
            if (rs.next()!= false){
              cod_f_pago= rs.getInt("id");
              txt_f_pago.setText(f_pago);
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_formas_d_pago.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_fdp_eli;
    private javax.swing.JButton btn_fdp_guardar;
    private javax.swing.JButton btn_fdp_mod;
    private javax.swing.JButton btn_fdp_nue;
    private javax.swing.JButton btn_fdp_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_dat_rol;
    private javax.swing.JTable tbl_f_pago;
    private javax.swing.JTextField txt_f_pago;
    // End of variables declaration//GEN-END:variables
}
