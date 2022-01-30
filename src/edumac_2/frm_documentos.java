
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_documentos extends javax.swing.JInternalFrame {
//Para validaciones varias
    public int cant=5       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_doc =0  ;
    public String sql=""    ,   doc = ""    ;
//Catidad maxima de caracteres
    public int dct=50    ;  
    DefaultTableModel tablamodel = new DefaultTableModel(){
//Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }          };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();    
    
    public frm_documentos() {
        initComponents();
        this.setTitle("Documentos"); 
        vl.logo_jif(this,cant); 
        formato_objet();
        formato_tabla();
        bus_doc();
        vl.col_orig5(btn_d_nue,btn_d_mod,btn_d_eli,btn_d_guardar,btn_d_salir);
        txt_d_docum.setBackground(vl.ama);
        txt_d_docum.setEditable(false);
        btn_d_guardar.setEnabled(false);
        tbl_d_documentos.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Documentos"); 
        TableColumn columna = tbl_d_documentos.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_d_documentos.getColumn("Documentos");
        columna.setPreferredWidth(300);
        columna.setMaxWidth(300);      
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_d_nue = new javax.swing.JButton();
        btn_d_mod = new javax.swing.JButton();
        btn_d_eli = new javax.swing.JButton();
        btn_d_guardar = new javax.swing.JButton();
        btn_d_salir = new javax.swing.JButton();
        pnl_dat_doc = new javax.swing.JPanel();
        txt_d_docum = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_d_documentos = new javax.swing.JTable();

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

        btn_d_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_d_nue.setText("Nuevo");
        btn_d_nue.setToolTipText("Nuevo");
        btn_d_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_d_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_d_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_d_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_d_nue);

        btn_d_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_d_mod.setText("Modificar");
        btn_d_mod.setToolTipText("Modificar");
        btn_d_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_d_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_d_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_d_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_d_mod);

        btn_d_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_d_eli.setText("Eliminar");
        btn_d_eli.setToolTipText("Eliminar ");
        btn_d_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_d_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_d_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_d_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_d_eli);

        btn_d_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_d_guardar.setText("Guardar");
        btn_d_guardar.setToolTipText("Guardar");
        btn_d_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_d_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_d_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_d_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_d_guardar);

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

        pnl_dat_doc.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Documento", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_d_docum.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_d_documActionPerformed(evt);
            }
        });
        txt_d_docum.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_d_documKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_d_documKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_docLayout = new javax.swing.GroupLayout(pnl_dat_doc);
        pnl_dat_doc.setLayout(pnl_dat_docLayout);
        pnl_dat_docLayout.setHorizontalGroup(
            pnl_dat_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_docLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_d_docum, javax.swing.GroupLayout.DEFAULT_SIZE, 316, Short.MAX_VALUE)
                .addContainerGap())
        );
        pnl_dat_docLayout.setVerticalGroup(
            pnl_dat_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_docLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_d_docum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel1.setAutoscrolls(true);

        tbl_d_documentos.setModel(tablamodel);
        tbl_d_documentos.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_d_documentos.setEditingColumn(0);
        tbl_d_documentos.setEditingRow(0);
        tbl_d_documentos.getTableHeader().setReorderingAllowed(false);
        tbl_d_documentos.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_d_documentosMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_d_documentos);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 354, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.DEFAULT_SIZE, 138, Short.MAX_VALUE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(pnl_dat_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_d_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_d_nue,btn_d_mod,btn_d_eli,btn_d_guardar,btn_d_salir);
        this.setTitle("Nuevo Documento");
        txt_d_docum.setEditable(true);
        tbl_d_documentos.setEnabled(false);
        txt_d_docum.requestFocus();
        btn_d_nue.setBackground(vl.ama);
        btn_d_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_d_nueActionPerformed

    private void btn_d_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_d_nue,btn_d_mod,btn_d_eli,btn_d_guardar,btn_d_salir);
        this.setTitle("Modificar Documento");
        txt_d_docum.setEditable(true);
        tbl_d_documentos.setEnabled(true);
        txt_d_docum.requestFocus();
        btn_d_mod.setBackground(vl.ama);
        btn_d_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_d_modActionPerformed

    private void btn_d_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_d_nue,btn_d_mod,btn_d_eli,btn_d_guardar,btn_d_salir);
        this.setTitle("Eliminar Documento");
        txt_d_docum.setEditable(false);
        tbl_d_documentos.setEnabled(true);
        btn_d_eli.setBackground(vl.ama);
        tbl_d_documentos.requestFocus();
        btn_d_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_d_eliActionPerformed

    private void btn_d_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_guardarActionPerformed

        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_d_docum.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre del Documento", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_d_docum.requestFocus();
            }else{
                doc = txt_d_docum.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar el Nuevo Documento?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        try {
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM documento WHERE documento = '"+ doc + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Documento ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Documento fue eliminado del sistema con anterioridad. Desea recuperarlo", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_doc= Integer.parseInt(rs.getString("id"));
                                        CRUD_Documentos act_doc_eli = new CRUD_Documentos();
                                        grabado= act_doc_eli.act_doc_eli(cod_doc);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Documento no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Documento fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_doc();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Documentos ing_doc = new CRUD_Documentos();
                                grabado = ing_doc.agre_doc(doc);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Documento no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Documento fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_d_docum.setText("");
                                    bus_doc();
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_documentos.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar el nombre del Docuemnto seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            doc = txt_d_docum.getText();
                            CRUD c = new CRUD();
                            sql= "SELECT id,est_reg FROM documento WHERE documento = '"+ doc + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Documento ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Documento fue eliminado del sistema con anterioridad. Desea recuperarlo", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_doc= Integer.parseInt(rs.getString("id"));
                                        CRUD_Documentos act_doc_eli = new CRUD_Documentos();
                                        grabado= act_doc_eli.act_doc_eli(cod_doc);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Documento no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Documento fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_doc();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Documentos mod_doc = new CRUD_Documentos();
                                grabado = mod_doc.act_doc(cod_doc, doc);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Docmuneto seleccionado no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Documento seleccionado se actualizo en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_d_docum.setText("");
                                    bus_doc();
                                }

                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_documentos.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }
        if(oper==3){
            if (cod_doc==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Documento para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar el Documento seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Documentos eli_doc = new CRUD_Documentos();
                    grabado = eli_doc.eli_doc(cod_doc);
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "El Documento seleccionado no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El Documento seleccionado fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_d_docum.setText("");
                        bus_doc();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_d_guardarActionPerformed

    private void btn_d_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_d_salirActionPerformed
        frm_principal.v_doc=null;
        this.dispose();
    }//GEN-LAST:event_btn_d_salirActionPerformed

    private void txt_d_documActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_d_documActionPerformed

    }//GEN-LAST:event_txt_d_documActionPerformed

    private void txt_d_documKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_d_documKeyReleased

    }//GEN-LAST:event_txt_d_documKeyReleased

    private void txt_d_documKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_d_documKeyTyped
        cant = txt_d_docum.getText().length();
        if (cant>= 0 && cant<dct ){    vl.Solo_Numeros_Letras(evt);     }
        if (cant == dct) vl.max_carateres_txt(txt_d_docum,cant,evt);
    }//GEN-LAST:event_txt_d_documKeyTyped

    private void tbl_d_documentosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_d_documentosMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_d_documentos.getSelectedRow();
            doc= tbl_d_documentos.getValueAt(fl_sel, 1).toString();
            bus_doc_sel(doc);
        }
    }//GEN-LAST:event_tbl_d_documentosMouseClicked

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_doc=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void bus_doc(){
        try {
            CRUD b_doc = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT documento \n" +
                "FROM documento WHERE est_reg = 'A'";
            ResultSet rs = b_doc.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Documentos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_d_documentos, tablamodel);
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
            Logger.getLogger(frm_documentos.class.getName()).log(Level.SEVERE, null, ex);
        }           
    }
    
    private void formato_objet(){
        fg.formato_texto1(txt_d_docum);      
    }
    private void bus_doc_sel(String dc){
        try {
            CRUD doc_sel = new CRUD();
            sql="SELECT id \n" +
                "FROM documento WHERE documento = '"+ dc + "'";
            ResultSet rs = doc_sel.select(sql);
            if (rs.next()!= false){
              cod_doc= rs.getInt("id");
              txt_d_docum.setText(doc);
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_documentos.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_d_eli;
    private javax.swing.JButton btn_d_guardar;
    private javax.swing.JButton btn_d_mod;
    private javax.swing.JButton btn_d_nue;
    private javax.swing.JButton btn_d_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_dat_doc;
    private javax.swing.JTable tbl_d_documentos;
    private javax.swing.JTextField txt_d_docum;
    // End of variables declaration//GEN-END:variables
}
