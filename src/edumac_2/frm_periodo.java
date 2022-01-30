
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_periodo extends javax.swing.JInternalFrame {
//Catidad maxima de caracteres
    public int perd  =   10    ; 
//Para validaciones varias    
    public int cant=10       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_perid =0                  ;
    public String sql=""    ,   perid = ""     ;
    public int red = 255    ,   green = 255 ,   blue = 170  ;
    DefaultTableModel tablamodel = new DefaultTableModel(){
//Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
             return false;    }       };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();


    public frm_periodo() {
        initComponents();
        this.setTitle("Periodos");
        vl.logo_jif(this,cant);
        formato_objet();
        formato_tabla();
        bus_periodo();
        vl.col_orig5(btn_perio_nue, btn_perio_mod, btn_perio_eli,btn_perio_guardar,btn_parrio_salir);
        txt_periodo.setBackground(vl.ama);
        txt_periodo.setEditable(false);
        tbl_period.setEnabled(false);
        btn_perio_guardar.setEnabled(false);
    }
    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Periodos"); 
        TableColumn columna = tbl_period.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_period.getColumn("Periodos");
        columna.setPreferredWidth(80);  
        columna.setMaxWidth(80);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_perio_nue = new javax.swing.JButton();
        btn_perio_mod = new javax.swing.JButton();
        btn_perio_eli = new javax.swing.JButton();
        btn_perio_guardar = new javax.swing.JButton();
        btn_parrio_salir = new javax.swing.JButton();
        pnl_dat_rol = new javax.swing.JPanel();
        txt_periodo = new javax.swing.JTextField();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_period = new javax.swing.JTable();

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

        btn_perio_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_perio_nue.setText("Nuevo");
        btn_perio_nue.setToolTipText("Nuevo");
        btn_perio_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_perio_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_perio_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_perio_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_perio_nue);

        btn_perio_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_perio_mod.setText("Modificar");
        btn_perio_mod.setToolTipText("Modificar");
        btn_perio_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_perio_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_perio_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_perio_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_perio_mod);

        btn_perio_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Eliminar.png"))); // NOI18N
        btn_perio_eli.setText("Eliminar");
        btn_perio_eli.setToolTipText("Eliminar ");
        btn_perio_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_perio_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_perio_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_perio_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_perio_eli);

        btn_perio_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_perio_guardar.setText("Guardar");
        btn_perio_guardar.setToolTipText("Guardar");
        btn_perio_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_perio_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_perio_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_perio_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_perio_guardar);

        btn_parrio_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_parrio_salir.setText("Salir");
        btn_parrio_salir.setToolTipText("Salir");
        btn_parrio_salir.setFocusable(false);
        btn_parrio_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_parrio_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_parrio_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_parrio_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_parrio_salir);

        pnl_dat_rol.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Periodos", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_periodo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_periodoKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_periodoKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_periodoKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_rolLayout = new javax.swing.GroupLayout(pnl_dat_rol);
        pnl_dat_rol.setLayout(pnl_dat_rolLayout);
        pnl_dat_rolLayout.setHorizontalGroup(
            pnl_dat_rolLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_rolLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_periodo)
                .addContainerGap())
        );
        pnl_dat_rolLayout.setVerticalGroup(
            pnl_dat_rolLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_rolLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(txt_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        tbl_period.setModel(tablamodel);
        tbl_period.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_period.getTableHeader().setReorderingAllowed(false);
        tbl_period.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_periodMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_period);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, 233, Short.MAX_VALUE)
            .addComponent(pnl_dat_rol, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addGap(35, 35, 35)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(20, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_perio_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_perio_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_perio_nue,btn_perio_mod,btn_perio_eli,btn_perio_guardar,btn_parrio_salir);
        this.setTitle("Nuevo Periodo");
        txt_periodo.setEditable(true);
        tbl_period.setEnabled(false);
        txt_periodo.requestFocus();
        btn_perio_nue.setBackground(vl.ama);
        btn_perio_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_perio_nueActionPerformed

    private void btn_perio_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_perio_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_perio_nue,btn_perio_mod,btn_perio_eli,btn_perio_guardar,btn_parrio_salir);
        this.setTitle("Modificar Periodo");
        txt_periodo.setEditable(true);
        tbl_period.setEnabled(true);
        txt_periodo.requestFocus();
        btn_perio_mod.setBackground(vl.ama);
        btn_perio_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_perio_modActionPerformed

    private void btn_perio_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_perio_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_perio_nue,btn_perio_mod,btn_perio_eli,btn_perio_guardar,btn_parrio_salir);
        this.setTitle("Eliminar Periodo");
        txt_periodo.setEditable(false);
        tbl_period.setEnabled(true);
        btn_perio_eli.setBackground(vl.ama);
        tbl_period.requestFocus();
        btn_perio_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_perio_eliActionPerformed

    private void btn_perio_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_perio_guardarActionPerformed
        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_periodo.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre del Periodo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_periodo.requestFocus();
            }else{
                perid = txt_periodo.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar el nuevo Periodo en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        try {
                            CRUD c = new CRUD();
                            sql= "SELECT id, est_reg FROM periodo WHERE periodo = '"+ perid + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Periodo ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Periodo fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_perid = Integer.parseInt(rs.getString("id"));
                                        CRUD_Periodos act_prd_eli = new CRUD_Periodos();
                                        grabado= act_prd_eli.act_period_eli(cod_perid);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Periodo no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Periodo fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_periodo();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Periodos ing_prd = new CRUD_Periodos();
                                grabado = ing_prd.agre_period(perid);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Periodo no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Periodo fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_periodo.setText("");
                                    bus_periodo();
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_periodo.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar el Periodo seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            CRUD c = new CRUD();
                            sql= "SELECT id, est_reg FROM periodo WHERE periodo = '"+ perid + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Periodo ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Periodo fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_perid = Integer.parseInt(rs.getString("id"));
                                        CRUD_Periodos act_prd_eli = new CRUD_Periodos();
                                        grabado= act_prd_eli.act_period_eli(cod_perid);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Periodo no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Periodo fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_periodo();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Periodos mod_prd = new CRUD_Periodos();
                                grabado = mod_prd.act_period(cod_perid, perid) ;
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Periodo seleccionado no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Periodo seleccionado se actualizó en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_periodo.setText("");
                                    bus_periodo();
                                }
                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_periodo.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }

        if(oper==3){
            if (cod_perid==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Periodo para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar el Periodo seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Periodos eli_prd = new CRUD_Periodos();
                    grabado = eli_prd.eli_period(cod_perid);
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "El Periodo seleccionado no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El Periodo seleccionado fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_periodo.setText("");
                        bus_periodo();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_perio_guardarActionPerformed

    private void btn_parrio_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_parrio_salirActionPerformed
        frm_principal.v_perio=null;
        this.dispose();
    }//GEN-LAST:event_btn_parrio_salirActionPerformed

    private void txt_periodoKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_periodoKeyPressed

    }//GEN-LAST:event_txt_periodoKeyPressed

    private void txt_periodoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_periodoKeyReleased

    }//GEN-LAST:event_txt_periodoKeyReleased

    private void txt_periodoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_periodoKeyTyped
        cant = txt_periodo.getText().length();
        if (cant == perd) vl.max_carateres_txt(txt_periodo,cant,evt);
    }//GEN-LAST:event_txt_periodoKeyTyped

    private void tbl_periodMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_periodMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_period.getSelectedRow();
            perid= tbl_period.getValueAt(fl_sel, 1).toString();
            bus_periodo_sel(perid);
        }
    }//GEN-LAST:event_tbl_periodMouseClicked

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_perio=null;
    }//GEN-LAST:event_formInternalFrameClosed

     private void bus_periodo_sel(String dc){
        try {
            CRUD c7 = new CRUD();
            sql="SELECT id  \n" +
                "FROM periodo WHERE periodo = '"+ dc + "'";
            ResultSet rs = c7.select(sql);
            if (rs.next()!= false){
               cod_perid= rs.getInt("id");
               txt_periodo.setText(perid);            
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_periodo.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    private void formato_objet(){
        fg.formato_texto1(txt_periodo);      
    }
    
    private void bus_periodo(){
        try {
            CRUD c7 = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT periodo \n" +
                "FROM periodo WHERE est_reg = 'A'";    
            ResultSet rs = c7.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Periodos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_period,tablamodel);
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
            Logger.getLogger(frm_periodo.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    
    
    
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_parrio_salir;
    private javax.swing.JButton btn_perio_eli;
    private javax.swing.JButton btn_perio_guardar;
    private javax.swing.JButton btn_perio_mod;
    private javax.swing.JButton btn_perio_nue;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_dat_rol;
    private javax.swing.JTable tbl_period;
    private javax.swing.JTextField txt_periodo;
    // End of variables declaration//GEN-END:variables
}
