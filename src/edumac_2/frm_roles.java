
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_roles extends javax.swing.JInternalFrame {
//Para validaciones varias
    public int cant=11       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_rol =0  ;
    public String sql=""    ,   rol = ""    ;
//Catidad maxima de caracteres
    public int rl=20    ;  
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }       };
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    
    public frm_roles() {
        initComponents();
        this.setTitle("Roles"); 
        vl.logo_jif(this,cant);
        formato_objet();
        formato_tabla();
        vl.limpiar_tabla(tbl_rol,tablamodel);
        bus_rol();
        vl.col_orig5(btn_rol_nue,btn_rol_mod,btn_rol_eli,btn_rol_guardar,btn_rol_salir);
        txt_rol.setBackground(vl.ama);
        txt_rol.setEditable(false);
        btn_rol_guardar.setEnabled(false);
        tbl_rol.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Roles"); 
        TableColumn columna = tbl_rol.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_rol.getColumn("Roles");
        columna.setPreferredWidth(120);
        columna.setMaxWidth(120);
        
        
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        pnl_dat_doc = new javax.swing.JPanel();
        txt_rol = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_rol = new javax.swing.JTable();
        jtb_est_opc = new javax.swing.JToolBar();
        btn_rol_nue = new javax.swing.JButton();
        btn_rol_mod = new javax.swing.JButton();
        btn_rol_eli = new javax.swing.JButton();
        btn_rol_guardar = new javax.swing.JButton();
        btn_rol_salir = new javax.swing.JButton();

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

        pnl_dat_doc.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Roles", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_rol.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_rolActionPerformed(evt);
            }
        });
        txt_rol.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_rolKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_rolKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_docLayout = new javax.swing.GroupLayout(pnl_dat_doc);
        pnl_dat_doc.setLayout(pnl_dat_docLayout);
        pnl_dat_docLayout.setHorizontalGroup(
            pnl_dat_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_docLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_rol, javax.swing.GroupLayout.PREFERRED_SIZE, 165, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_dat_docLayout.setVerticalGroup(
            pnl_dat_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_docLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(txt_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        tbl_rol.setModel(tablamodel);
        tbl_rol.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_rol.setEditingColumn(0);
        tbl_rol.setEditingRow(0);
        tbl_rol.getTableHeader().setReorderingAllowed(false);
        tbl_rol.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_rolMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_rol);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 169, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.DEFAULT_SIZE, 138, Short.MAX_VALUE)
                .addContainerGap())
        );

        jtb_est_opc.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        jtb_est_opc.setRollover(true);

        btn_rol_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_rol_nue.setText("Nuevo");
        btn_rol_nue.setToolTipText("Nuevo");
        btn_rol_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_rol_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_rol_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_rol_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_rol_nue);

        btn_rol_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_rol_mod.setText("Modificar");
        btn_rol_mod.setToolTipText("Modificar");
        btn_rol_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_rol_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_rol_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_rol_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_rol_mod);

        btn_rol_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_rol_eli.setText("Eliminar");
        btn_rol_eli.setToolTipText("Eliminar ");
        btn_rol_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_rol_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_rol_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_rol_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_rol_eli);

        btn_rol_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_rol_guardar.setText("Guardar");
        btn_rol_guardar.setToolTipText("Guardar");
        btn_rol_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_rol_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_rol_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_rol_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_rol_guardar);

        btn_rol_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_rol_salir.setText("Salir");
        btn_rol_salir.setToolTipText("Salir");
        btn_rol_salir.setFocusable(false);
        btn_rol_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_rol_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_rol_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_rol_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_rol_salir);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 187, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(pnl_dat_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
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

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_rol=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void txt_rolActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_rolActionPerformed

    }//GEN-LAST:event_txt_rolActionPerformed

    private void txt_rolKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rolKeyReleased

    }//GEN-LAST:event_txt_rolKeyReleased

    private void txt_rolKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_rolKeyTyped
        cant = txt_rol.getText().length();
        if (cant>= 0 && cant<rl ){    vl.Solo_Letras(evt);     }
        if (cant == rl) vl.max_carateres_txt(txt_rol,cant,evt);
    }//GEN-LAST:event_txt_rolKeyTyped

    private void tbl_rolMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_rolMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_rol.getSelectedRow();
            rol= tbl_rol.getValueAt(fl_sel, 1).toString();
            bus_rol_sel(rol);
        }
    }//GEN-LAST:event_tbl_rolMouseClicked

    private void btn_rol_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_rol_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_rol_nue,btn_rol_mod,btn_rol_eli,btn_rol_guardar,btn_rol_salir);
        this.setTitle("Nuevo Rol");
        txt_rol.setEditable(true);
        tbl_rol.setEnabled(false);
        txt_rol.requestFocus();
        btn_rol_nue.setBackground(vl.ama);
        btn_rol_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_rol_nueActionPerformed

    private void btn_rol_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_rol_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_rol_nue,btn_rol_mod,btn_rol_eli,btn_rol_guardar,btn_rol_salir);
        this.setTitle("Modificar Rol");
        txt_rol.setEditable(true);
        tbl_rol.setEnabled(true);
        txt_rol.requestFocus();
        btn_rol_mod.setBackground(vl.ama);
        btn_rol_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_rol_modActionPerformed

    private void btn_rol_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_rol_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_rol_nue,btn_rol_mod,btn_rol_eli,btn_rol_guardar,btn_rol_salir);
        this.setTitle("Eliminar Rol");
        txt_rol.setEditable(false);
        tbl_rol.setEnabled(true);
        btn_rol_eli.setBackground(vl.ama);
        tbl_rol.requestFocus();
        btn_rol_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_rol_eliActionPerformed

    private void btn_rol_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_rol_guardarActionPerformed

        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_rol.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre del Rol", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_rol.requestFocus();
            }else{
                rol = txt_rol.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar el Nuevo Rol?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        try {
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM rol WHERE rol = '"+ rol + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Rol ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Rol fue eliminado del sistema con anterioridad. Desea recuperarlo", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_rol= Integer.parseInt(rs.getString("id"));
                                        CRUD_Roles act_rol_eli = new CRUD_Roles();
                                        grabado= act_rol_eli.act_rol_eli(cod_rol);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Rol no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Rol fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_rol();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Roles ing_doc = new CRUD_Roles();
                                grabado = ing_doc.agre_rol(rol);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Rol no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Rol fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_rol.setText("");
                                    bus_rol();
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_roles.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar el nombre del Rol seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            rol = txt_rol.getText();
                            CRUD c = new CRUD();
                            sql= "SELECT id,est_reg FROM rol WHERE rol = '"+ rol + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Rol ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Rol fue eliminado del sistema con anterioridad. Desea recuperarlo", "Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_rol= Integer.parseInt(rs.getString("id"));
                                        CRUD_Roles act_doc_eli = new CRUD_Roles();
                                        grabado= act_doc_eli.act_rol_eli(cod_rol);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Rol no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Rol fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_rol();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Roles mod_doc = new CRUD_Roles();
                                grabado = mod_doc.act_rol(cod_rol, rol);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Rol seleccionado no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Rol seleccionado se actualizo en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_rol.setText("");
                                    bus_rol();
                                }

                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_roles.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }
        if(oper==3){
            if (cod_rol==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Rol para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar el Rol seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Roles eli_doc = new CRUD_Roles();
                    grabado = eli_doc.eli_rol(cod_rol);
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "El Rol seleccionado no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El Rol seleccionado fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_rol.setText("");
                        bus_rol();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_rol_guardarActionPerformed

    private void bus_rol(){
        try {
            CRUD b_doc = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT rol \n" +
                "FROM rol WHERE est_reg = 'A'";
            ResultSet rs = b_doc.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Roles en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_rol,tablamodel);
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
            Logger.getLogger(frm_roles.class.getName()).log(Level.SEVERE, null, ex);
        }           
    }
    
    private void formato_objet(){
        fg.formato_texto1(txt_rol);      
    }
    private void bus_rol_sel(String dc){
        try {
            CRUD doc_sel = new CRUD();
            sql="SELECT id \n" +
                "FROM rol WHERE rol = '"+ dc + "'";
            ResultSet rs = doc_sel.select(sql);
            if (rs.next()!= false){
              cod_rol= rs.getInt("id");
              txt_rol.setText(rol);
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_roles.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    
    private void btn_rol_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_rol_salirActionPerformed
        frm_principal.v_rol=null;
        this.dispose();
    }//GEN-LAST:event_btn_rol_salirActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_rol_eli;
    private javax.swing.JButton btn_rol_guardar;
    private javax.swing.JButton btn_rol_mod;
    private javax.swing.JButton btn_rol_nue;
    private javax.swing.JButton btn_rol_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_dat_doc;
    private javax.swing.JTable tbl_rol;
    private javax.swing.JTextField txt_rol;
    // End of variables declaration//GEN-END:variables
}
