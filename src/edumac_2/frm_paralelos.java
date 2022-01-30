
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_paralelos extends javax.swing.JInternalFrame {
//Para validaciones varias
    public int cant=8       ,   conf=0      ,   oper=0      ;
    public int grabado=0    ,   cod_para =0                 ;
    public String sql=""    ,   paral = ""                  ;
//Catidad maxima de caracteres
    public int pr=20    ;
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }  
    };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();


    public frm_paralelos() {
        initComponents();
        setTitle("Paralelos");
        vl.logo_jif(this,cant);
        formato_objet();
        formato_tabla();
        bus_para();
        vl.col_orig5(btn_para_nue,btn_para_mod,btn_para_eli,btn_para_guardar,btn_para_salir);
        txt_para_paralelo.setBackground(vl.ama);
        txt_para_paralelo.setEditable(false);
        btn_para_guardar.setEnabled(false);
        tbl_para_paralelo.setEnabled(false);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Paralelos"); 
        TableColumn columna = tbl_para_paralelo.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_para_paralelo.getColumn("Paralelos");
        columna.setPreferredWidth(130); 
        columna.setMaxWidth(130);
    } 

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_para_nue = new javax.swing.JButton();
        btn_para_mod = new javax.swing.JButton();
        btn_para_eli = new javax.swing.JButton();
        btn_para_guardar = new javax.swing.JButton();
        btn_para_salir = new javax.swing.JButton();
        pnl_para = new javax.swing.JPanel();
        txt_para_paralelo = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbl_para_paralelo = new javax.swing.JTable();

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

        btn_para_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Nuevo.png"))); // NOI18N
        btn_para_nue.setText("Nuevo");
        btn_para_nue.setToolTipText("Nuevo");
        btn_para_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_para_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_para_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_para_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_para_nue);

        btn_para_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Modificar.png"))); // NOI18N
        btn_para_mod.setText("Modificar");
        btn_para_mod.setToolTipText("Modificar");
        btn_para_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_para_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_para_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_para_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_para_mod);

        btn_para_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Eliminar.png"))); // NOI18N
        btn_para_eli.setText("Eliminar");
        btn_para_eli.setToolTipText("Eliminar");
        btn_para_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_para_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_para_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_para_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_para_eli);

        btn_para_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_para_guardar.setText("Guardar");
        btn_para_guardar.setToolTipText("Guardar");
        btn_para_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_para_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_para_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_para_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_para_guardar);

        btn_para_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_para_salir.setText("Salir");
        btn_para_salir.setToolTipText("Salir");
        btn_para_salir.setFocusable(false);
        btn_para_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_para_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_para_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_para_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_para_salir);

        pnl_para.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Paralelo", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_para_paralelo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_para_paraleloKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_para_paraleloKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_paraLayout = new javax.swing.GroupLayout(pnl_para);
        pnl_para.setLayout(pnl_paraLayout);
        pnl_paraLayout.setHorizontalGroup(
            pnl_paraLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_paraLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(txt_para_paralelo, javax.swing.GroupLayout.DEFAULT_SIZE, 186, Short.MAX_VALUE)
                .addContainerGap())
        );
        pnl_paraLayout.setVerticalGroup(
            pnl_paraLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_paraLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(txt_para_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        tbl_para_paralelo.setModel(tablamodel);
        tbl_para_paralelo.setAutoResizeMode(javax.swing.JTable.AUTO_RESIZE_OFF);
        tbl_para_paralelo.getTableHeader().setReorderingAllowed(false);
        tbl_para_paralelo.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_para_paraleloMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbl_para_paralelo);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 201, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane2, javax.swing.GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
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
                    .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(pnl_para, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_para, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_para_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_para_nueActionPerformed
        oper = 1;
        vl.col_orig5(btn_para_nue,btn_para_mod,btn_para_eli,btn_para_guardar,btn_para_salir);
        this.setTitle("Nuevo Paralelo");
        txt_para_paralelo.setEditable(true);
        tbl_para_paralelo.setEnabled(false);
        txt_para_paralelo.requestFocus();
        btn_para_nue.setBackground(vl.ama);
        btn_para_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_para_nueActionPerformed

    private void btn_para_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_para_modActionPerformed
        oper = 2;
        vl.col_orig5(btn_para_nue,btn_para_mod,btn_para_eli,btn_para_guardar,btn_para_salir);
        this.setTitle("Modificar Paralelo");
        txt_para_paralelo.setEditable(true);
        tbl_para_paralelo.setEnabled(true);
        txt_para_paralelo.requestFocus();
        btn_para_mod.setBackground(vl.ama);
        btn_para_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_para_modActionPerformed

    private void btn_para_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_para_eliActionPerformed
        oper = 3;
        vl.col_orig5(btn_para_nue,btn_para_mod,btn_para_eli,btn_para_guardar,btn_para_salir);
        this.setTitle("Eliminar Paralelo");
        txt_para_paralelo.setEditable(false);
        tbl_para_paralelo.setEnabled(true);
        tbl_para_paralelo.requestFocus();
        btn_para_eli.setBackground(vl.ama);
        btn_para_guardar.setEnabled(true);
    }//GEN-LAST:event_btn_para_eliActionPerformed

    private void btn_para_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_para_guardarActionPerformed
        if (oper==0){
            JOptionPane.showMessageDialog(this, "Debe seleccionar una opción", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
        }
        if (oper==1 || oper ==2){
            if (txt_para_paralelo.getText().length()==0){
                JOptionPane.showMessageDialog(this, "Debe ecribir el nombre del Paralelo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_para_paralelo.requestFocus();
            }else{
                paral = txt_para_paralelo.getText();
                if (oper==1){
                    conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar el nuevo Paralelo en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                    if (conf==0){
                        try {
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM paralelo WHERE paralelo= '"+ paral + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Paralelo ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    conf = JOptionPane.showConfirmDialog(this, "El Paralelo fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        cod_para = Integer.parseInt(rs.getString("id"));
                                        CRUD_Paralelos p_act_para_eli = new CRUD_Paralelos();
                                        grabado= p_act_para_eli.act_para_eli(cod_para);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Paralelo no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Paralelo fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);                                          
                                            bus_para();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Paralelos p_agre_para = new CRUD_Paralelos();
                                grabado = p_agre_para.agre_paralelo(paral);
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Paralelo no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Paralelo fue ingresado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_para_paralelo.setText("");
                                    bus_para();
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_paralelos.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                }
                if (oper==2){
                    try {
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar el Paralelo seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                        if (conf==0){
                            CRUD c = new CRUD();
                            sql= "SELECT id , est_reg FROM paralelo WHERE paralelo = '"+ paral + "'";
                            ResultSet rs = c.select(sql);
                            if (rs.next()!= false){
                                if("A".equals(rs.getString("est_reg"))){
                                    JOptionPane.showMessageDialog(this, "El Paralelo ya existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                }else{
                                    cod_para = Integer.parseInt(rs.getString("id"));
                                    conf = JOptionPane.showConfirmDialog(this, "El Paralelo fue eliminado del sistema con anterioridad. ¿ Desea recuperarlo ?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                                    if (conf==0){
                                        CRUD_Paralelos p_act_para_eli = new CRUD_Paralelos();
                                        grabado= p_act_para_eli.act_para_eli(cod_para);
                                        if(grabado == 2){
                                            JOptionPane.showMessageDialog(this, "El Paralelo no se pudo activar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                        }else{
                                            JOptionPane.showMessageDialog(this, "El Paralelo fue activado en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                            bus_para();
                                        }
                                    }
                                }
                            }else{
                                CRUD_Paralelos p_act_parl = new CRUD_Paralelos();
                                grabado = p_act_parl.act_paralelo(cod_para,paral)  ;
                                if(grabado == 2){
                                    JOptionPane.showMessageDialog(this, "El Paralelo seleccionado no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "El Paralelo seleccionado se actualizo en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    txt_para_paralelo.setText("");
                                    bus_para();
                                }

                            }
                        }
                    } catch (SQLException ex) {
                        Logger.getLogger(frm_paralelos.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }
        if(oper==3){
            if (cod_para==0){
                JOptionPane.showMessageDialog(this, "Debe seleccionar un Paralelo para poder eliminarlo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de Eliminar el Paralelo seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    CRUD_Paralelos p_eli_parl = new CRUD_Paralelos();
                    grabado = p_eli_parl.eli_paralelo(cod_para)  ;
                    if(grabado == 2){
                        JOptionPane.showMessageDialog(this, "El Paralelo seleccionado no se pudo eliminar del sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        JOptionPane.showMessageDialog(this, "El Paralelo seleccionado fue eliminado del sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        txt_para_paralelo.setText("");
                        bus_para();
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_para_guardarActionPerformed

    private void btn_para_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_para_salirActionPerformed
        frm_principal.v_paralel=null;
        this.dispose();
    }//GEN-LAST:event_btn_para_salirActionPerformed

    private void txt_para_paraleloKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_para_paraleloKeyReleased

    }//GEN-LAST:event_txt_para_paraleloKeyReleased

    private void txt_para_paraleloKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_para_paraleloKeyTyped
        cant = txt_para_paralelo.getText().length();
        if (cant>= 0 && cant<pr ){   vl.Solo_Numeros_Letras(evt);    }
        if (cant == pr) vl.max_carateres_txt(txt_para_paralelo,cant,evt);
    }//GEN-LAST:event_txt_para_paraleloKeyTyped

    private void tbl_para_paraleloMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_para_paraleloMouseClicked
        if (oper == 2 || oper == 3){
            int fl_sel = tbl_para_paralelo.getSelectedRow();
            paral= tbl_para_paralelo.getValueAt(fl_sel, 1).toString();
            bus_para_sel(paral);
        }
    }//GEN-LAST:event_tbl_para_paraleloMouseClicked

    private void bus_para_sel(String dc){
        try {
            CRUD c7 = new CRUD();
            sql="SELECT id \n" +
                "FROM paralelo WHERE paralelo = '"+ dc + "'";
            ResultSet rs = c7.select(sql);
            if (rs.next()!= false){
               cod_para= rs.getInt("id");
               txt_para_paralelo.setText(paral);
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_paralelos.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
       
    private void bus_para(){
        try {
            CRUD c7 = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT paralelo \n" +
                "FROM paralelo WHERE est_reg = 'A'";
            ResultSet rs = c7.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen Paralelos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
            }else{
                vl.limpiar_tabla(tbl_para_paralelo,tablamodel);
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
            Logger.getLogger(frm_paralelos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    private void formato_objet(){
        fg.formato_texto1(txt_para_paralelo);      
    }
    
    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_paralel=null;
    }//GEN-LAST:event_formInternalFrameClosed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_para_eli;
    private javax.swing.JButton btn_para_guardar;
    private javax.swing.JButton btn_para_mod;
    private javax.swing.JButton btn_para_nue;
    private javax.swing.JButton btn_para_salir;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JPanel pnl_para;
    private javax.swing.JTable tbl_para_paralelo;
    private javax.swing.JTextField txt_para_paralelo;
    // End of variables declaration//GEN-END:variables
}
