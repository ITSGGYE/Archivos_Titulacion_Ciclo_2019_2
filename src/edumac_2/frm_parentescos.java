
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_parentescos extends javax.swing.JInternalFrame {
//Para validaciones varias    
    public int cant=9       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_pare =0 ;
    public String sql=""    ,   pare = ""   ;
//Catidad maxima de caracteres
    public int prt=15    ;    
//Para los colores de los objetos    
    DefaultTableModel tablamodel = new DefaultTableModel(){
//Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
             return false;     }         };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_parentescos() {
        initComponents();
        this.setTitle("Parentesco");
        vl.logo_jif(this,cant);
        formato_objet();
        formato_tabla();
        bus_parent();
        vl.col_orig5(btn_pare_nue,btn_pare_mod,btn_pare_eli,btn_pare_guardar,btn_pare_salir);
        txt_parentesco.setBackground(vl.ama);
        txt_parentesco.setEditable(false);
        tbl_pare_parentescos.setEnabled(false);
        btn_pare_guardar.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Parentesco"); 
        TableColumn columna = tbl_pare_parentescos.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_pare_parentescos.getColumn("Parentesco");
        columna.setPreferredWidth(120);
        columna.setMaxWidth(120);
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_pare_nue = new javax.swing.JButton();
        btn_pare_mod = new javax.swing.JButton();
        btn_pare_eli = new javax.swing.JButton();
        btn_pare_guardar = new javax.swing.JButton();
        btn_pare_salir = new javax.swing.JButton();
        pnl_dat_usu3 = new javax.swing.JPanel();
        txt_parentesco = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_pare_parentescos = new javax.swing.JTable();

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

        btn_pare_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Nuevo.png"))); // NOI18N
        btn_pare_nue.setText("Nuevo");
        btn_pare_nue.setToolTipText("Nuevo");
        btn_pare_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_pare_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_pare_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_pare_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_pare_nue);

        btn_pare_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Modificar.png"))); // NOI18N
        btn_pare_mod.setText("Modificar");
        btn_pare_mod.setToolTipText("Modificar");
        btn_pare_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_pare_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_pare_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_pare_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_pare_mod);

        btn_pare_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Eliminar.png"))); // NOI18N
        btn_pare_eli.setText("Eliminar");
        btn_pare_eli.setToolTipText("Eliminar");
        btn_pare_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_pare_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_pare_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_pare_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_pare_eli);

        btn_pare_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_pare_guardar.setText("Guardar");
        btn_pare_guardar.setToolTipText("Guardar");
        btn_pare_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_pare_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_pare_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_pare_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_pare_guardar);

        btn_pare_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_pare_salir.setText("Salir");
        btn_pare_salir.setToolTipText("Salir");
        btn_pare_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_pare_salir.setMaximumSize(new java.awt.Dimension(42, 57));
        btn_pare_salir.setMinimumSize(new java.awt.Dimension(42, 57));
        btn_pare_salir.setPreferredSize(new java.awt.Dimension(42, 57));
        btn_pare_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_pare_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_pare_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_pare_salir);

        pnl_dat_usu3.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Parentesco", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_parentesco.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_parentescoKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_parentescoKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_parentescoKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_usu3Layout = new javax.swing.GroupLayout(pnl_dat_usu3);
        pnl_dat_usu3.setLayout(pnl_dat_usu3Layout);
        pnl_dat_usu3Layout.setHorizontalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_parentesco, javax.swing.GroupLayout.DEFAULT_SIZE, 180, Short.MAX_VALUE)
                .addContainerGap())
        );
        pnl_dat_usu3Layout.setVerticalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_usu3Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(txt_parentesco, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        tbl_pare_parentescos.setModel(tablamodel);
        tbl_pare_parentescos.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_pare_parentescos.getTableHeader().setReorderingAllowed(false);
        tbl_pare_parentescos.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_pare_parentescosMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_pare_parentescos);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 191, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.DEFAULT_SIZE, 141, Short.MAX_VALUE)
                .addContainerGap())
        );

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
                    .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(4, 4, 4)
                .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_pare_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_pare_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_pare_nue,btn_pare_mod,btn_pare_eli,btn_pare_guardar,btn_pare_salir);
        this.setTitle("Nuevo Parentesco");
        txt_parentesco.setEditable(true);
        tbl_pare_parentescos.setEnabled(false);
        txt_parentesco.requestFocus();
        btn_pare_nue.setBackground(vl.ama);
        btn_pare_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_pare_nueActionPerformed

    private void btn_pare_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_pare_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_pare_nue,btn_pare_mod,btn_pare_eli,btn_pare_guardar,btn_pare_salir);
        this.setTitle("Modificar Parentesco");
        txt_parentesco.setEditable(true);
        btn_pare_guardar.setEnabled(true);
        tbl_pare_parentescos.setEnabled(true);
        txt_parentesco.requestFocus();
        btn_pare_mod.setBackground(vl.ama);
    }//GEN-LAST:event_btn_pare_modActionPerformed

    private void btn_pare_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_pare_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_pare_nue,btn_pare_mod,btn_pare_eli,btn_pare_guardar,btn_pare_salir);
        this.setTitle("Eliminar Parentesco");
        txt_parentesco.setEditable(false);
        btn_pare_guardar.setEnabled(true);
        tbl_pare_parentescos.setEnabled(true);
        txt_parentesco.requestFocus();
        btn_pare_eli.setBackground(vl.ama);
    }//GEN-LAST:event_btn_pare_eliActionPerformed

    private void btn_pare_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_pare_guardarActionPerformed
        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_parentesco.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre del Parentesco", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_parentesco.requestFocus();
            }else{
                pare = txt_parentesco.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar el nuevo Parentesco en el sistema","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        CRUD c = new CRUD();
                        sql= "SELECT id , est_reg FROM parentesco WHERE parentesco = '"+ pare + "'";
                        ResultSet rs = c.select(sql);
                        try {
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Parentesco ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Parentesco fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_pare = Integer.parseInt(rs.getString("id"));
                                        CRUD_Parentescos p_act_pare_eli = new CRUD_Parentescos();
                                        grabado= p_act_pare_eli.act_pare_eli(cod_pare);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Parentesco no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Parentesco fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_parent();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Parentescos p_i_pare = new CRUD_Parentescos();
                                grabado = p_i_pare.agre_pare(pare) ;
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Parentesco no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Parentesco fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_parentesco.setText("");
                                    bus_parent();
                                }

                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_parentescos.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar el Parentesco seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM parentesco WHERE parentesco = '"+ pare + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Parentesco ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    cod_pare = Integer.parseInt(rs.getString("id"));
                                    conf = JOptionPane.showConfirmDialog(this, "El Parentesco fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        CRUD_Parentescos p_act_pare_eli = new CRUD_Parentescos();
                                        grabado= p_act_pare_eli.act_pare_eli(cod_pare);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Parentesco no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Parentesco fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_parent();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Parentescos p_a_rol = new CRUD_Parentescos();
                                grabado = p_a_rol.act_pare(cod_pare, pare) ;
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Parentesco seleccionado no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Parentesco seleccionado se actualizó en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_parentesco.setText("");
                                    bus_parent();
                                }

                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_parentescos.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }
        if(oper==3){
            if (cod_pare==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Parentesco para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar el Parentesco seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Parentescos p_eli_pare = new CRUD_Parentescos();
                    grabado = p_eli_pare.eli_pare(cod_pare)  ;
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "El Parentesco seleccionado no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El Parentesco seleccionado fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_parentesco.setText("");
                        bus_parent();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_pare_guardarActionPerformed

    private void btn_pare_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_pare_salirActionPerformed
        frm_principal.v_parent=null;
        this.dispose();
    }//GEN-LAST:event_btn_pare_salirActionPerformed

    private void txt_parentescoKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_parentescoKeyPressed

    }//GEN-LAST:event_txt_parentescoKeyPressed

    private void txt_parentescoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_parentescoKeyReleased

    }//GEN-LAST:event_txt_parentescoKeyReleased

    private void txt_parentescoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_parentescoKeyTyped
        cant = txt_parentesco.getText().length();
        if (cant>= 0 && cant<prt ){    vl.Solo_Letras(evt);        }
        if (cant == prt) vl.max_carateres_txt(txt_parentesco,cant,evt);
    }//GEN-LAST:event_txt_parentescoKeyTyped

    private void tbl_pare_parentescosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_pare_parentescosMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_pare_parentescos.getSelectedRow();
            pare= tbl_pare_parentescos.getValueAt(fl_sel, 1).toString();
            bus_pare_sel(pare);
        }
    }//GEN-LAST:event_tbl_pare_parentescosMouseClicked

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_parent=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void bus_pare_sel(String dc){
        try {
            CRUD c7 = new CRUD();
            sql="SELECT id  \n" +
                "FROM parentesco WHERE parentesco = '"+ dc + "'";
            ResultSet rs = c7.select(sql);
            if (rs.next()== false){
            }else{
               cod_pare= rs.getInt("id");
               txt_parentesco.setText(pare);
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_parentescos.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    
    private void bus_parent(){
        try {
            CRUD c7 = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT parentesco \n" +
                "FROM parentesco WHERE est_reg = 'A'";    
            ResultSet rs = c7.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Parentescos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_pare_parentescos,tablamodel);
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
            Logger.getLogger(frm_parentescos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void formato_objet(){
        fg.formato_texto1(txt_parentesco);      
    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_pare_eli;
    private javax.swing.JButton btn_pare_guardar;
    private javax.swing.JButton btn_pare_mod;
    private javax.swing.JButton btn_pare_nue;
    private javax.swing.JButton btn_pare_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_dat_usu3;
    private javax.swing.JTable tbl_pare_parentescos;
    private javax.swing.JTextField txt_parentesco;
    // End of variables declaration//GEN-END:variables
}
