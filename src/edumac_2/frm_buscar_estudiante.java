
package edumac_2;

import java.sql.ResultSet;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_buscar_estudiante extends javax.swing.JInternalFrame {

    int sel_bus = 1;
    public int cant=0;   
    public int formul=0     ;
    public String ced_alu_sel =""  ,  nom_alu_sel ="", ape_alu_sel ="" ;    
    public String dat_bus=""    ,   sql=""  ,   sql2="" ;
//Catidad maxima de caracteres
    public int cdl=10    ,   nm=35   ;
    
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }  
    };
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_buscar_estudiante() {
        initComponents();
        this.setTitle("Busqueda de estudiante por Cédula"); 
        txt_busqueda_est.setBackground(vl.ama);
        formato_objet();
        String r = String.valueOf(sel_bus); 
        formato_tabla();
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Cédula");
        tablamodel.addColumn("Apellidos");
        tablamodel.addColumn("Nombres");
        TableColumn columna = tbl_bus_alu.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_bus_alu.getColumn("Cédula");
        columna.setPreferredWidth(90); 
        columna.setMaxWidth(90);
        columna = tbl_bus_alu.getColumn("Apellidos");
        columna.setPreferredWidth(150);
        columna.setMaxWidth(150);
        columna = tbl_bus_alu.getColumn("Nombres");
        columna.setPreferredWidth(150); 
        columna.setMaxWidth(150);
    }  
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        pnl_dat_usu3 = new javax.swing.JPanel();
        txt_busqueda_est = new javax.swing.JTextField();
        btn_bus_est = new javax.swing.JButton();
        lbl_1 = new javax.swing.JLabel();
        cmb_busqueda_alu = new javax.swing.JComboBox<>();
        lbl_2 = new javax.swing.JLabel();
        jPanel2 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbl_bus_alu = new javax.swing.JTable();
        btn_bus_est_aceptar = new javax.swing.JButton();
        btn_bus_est_canc = new javax.swing.JButton();

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

        pnl_dat_usu3.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Busqueda", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        txt_busqueda_est.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_busqueda_estKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_busqueda_estKeyTyped(evt);
            }
        });

        btn_bus_est.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_est.setToolTipText("Buscar");
        btn_bus_est.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_estActionPerformed(evt);
            }
        });

        lbl_1.setText("Buscar por:");

        cmb_busqueda_alu.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Cédula", "Apellidos", "Nombres" }));
        cmb_busqueda_alu.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_busqueda_aluItemStateChanged(evt);
            }
        });
        cmb_busqueda_alu.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_busqueda_aluActionPerformed(evt);
            }
        });

        lbl_2.setText("Buscar:");

        javax.swing.GroupLayout pnl_dat_usu3Layout = new javax.swing.GroupLayout(pnl_dat_usu3);
        pnl_dat_usu3.setLayout(pnl_dat_usu3Layout);
        pnl_dat_usu3Layout.setHorizontalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_1)
                    .addComponent(lbl_2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 28, Short.MAX_VALUE)
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addComponent(txt_busqueda_est, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_bus_est, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(cmb_busqueda_alu, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(25, 25, 25))
        );
        pnl_dat_usu3Layout.setVerticalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_usu3Layout.createSequentialGroup()
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(cmb_busqueda_alu, javax.swing.GroupLayout.DEFAULT_SIZE, 22, Short.MAX_VALUE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(txt_busqueda_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btn_bus_est)))
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addGap(13, 13, 13)
                        .addComponent(lbl_1)
                        .addGap(20, 20, 20)
                        .addComponent(lbl_2)))
                .addContainerGap())
        );

        tbl_bus_alu.setModel(tablamodel);
        tbl_bus_alu.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_bus_aluMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbl_bus_alu);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 463, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(142, 142, 142))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(282, 282, 282))
        );

        btn_bus_est_aceptar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Aceptar.png"))); // NOI18N
        btn_bus_est_aceptar.setText("Aceptar");
        btn_bus_est_aceptar.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        btn_bus_est_aceptar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_bus_est_aceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_est_aceptarActionPerformed(evt);
            }
        });

        btn_bus_est_canc.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Cancelar.png"))); // NOI18N
        btn_bus_est_canc.setText("Cerrar");
        btn_bus_est_canc.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        btn_bus_est_canc.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_bus_est_canc.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_est_cancActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btn_bus_est_aceptar)
                .addGap(15, 15, 15)
                .addComponent(btn_bus_est_canc)
                .addGap(22, 22, 22))
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 483, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 177, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(btn_bus_est_canc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(btn_bus_est_aceptar))
                .addGap(12, 12, 12))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txt_busqueda_estKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_busqueda_estKeyReleased

    }//GEN-LAST:event_txt_busqueda_estKeyReleased

    private void txt_busqueda_estKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_busqueda_estKeyTyped
        //c_valid_varias vl = new c_valid_varias();
        cant = txt_busqueda_est.getText().length();
        if (sel_bus==1){
            if (cant>= 0 && cant<cdl ) vl.Solo_Numeros(evt);
            if (cant == cdl) {
                vl.max_carateres_txt(txt_busqueda_est,cant,evt);
            }
        }
        if (sel_bus==2 || sel_bus==3 ){
            if (cant>= 0 && cant<nm ) vl.Solo_Letras(evt);
            if (cant == nm) vl.max_carateres_txt(txt_busqueda_est,cant,evt);
        }
    }//GEN-LAST:event_txt_busqueda_estKeyTyped

    private void btn_bus_estActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_estActionPerformed
        vl.limpiar_tabla(tbl_bus_alu,tablamodel);
        llenar_tabla();
    }//GEN-LAST:event_btn_bus_estActionPerformed

    private void cmb_busqueda_aluItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_busqueda_aluItemStateChanged

    }//GEN-LAST:event_cmb_busqueda_aluItemStateChanged

    private void cmb_busqueda_aluActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_busqueda_aluActionPerformed
        if (cmb_busqueda_alu.getSelectedItem()=="Cédula"){
            sel_bus=1;
            this.setTitle("Busqueda de estudiante por Cédula");
            txt_busqueda_est.setText("");
            vl.limpiar_tabla(tbl_bus_alu,tablamodel);
        }
        if (cmb_busqueda_alu.getSelectedItem()=="Apellidos"){
            sel_bus=2;
            this.setTitle("Busqueda de estudiante por Apellidos");
            txt_busqueda_est.setText("");
            vl.limpiar_tabla(tbl_bus_alu,tablamodel);
        }
        if (cmb_busqueda_alu.getSelectedItem()=="Nombres"){
            sel_bus=3;
            this.setTitle("Busqueda de estudiante por Nombres");
            txt_busqueda_est.setText("");
            vl.limpiar_tabla(tbl_bus_alu,tablamodel);
        }
        String r = String.valueOf(sel_bus);
    }//GEN-LAST:event_cmb_busqueda_aluActionPerformed

    private void tbl_bus_aluMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_bus_aluMouseClicked
        ced_alu_sel="";
        int fl_sel = tbl_bus_alu.getSelectedRow();
        ced_alu_sel= tbl_bus_alu.getValueAt(fl_sel, 1).toString();
        ape_alu_sel= tbl_bus_alu.getValueAt(fl_sel, 2).toString();
        nom_alu_sel= tbl_bus_alu.getValueAt(fl_sel, 3).toString();

    }//GEN-LAST:event_tbl_bus_aluMouseClicked

    private void btn_bus_est_aceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_est_aceptarActionPerformed
        try {
            //Dependiendo del formulario que lo llamo, devuelve el codigo
            if(formul==1) frm_principal.v_estud.bus_est(ced_alu_sel);
            if(formul==2) frm_principal.v_rel_alu_fam.bus_est(ced_alu_sel);  
            if(formul==3) frm_principal.v_caja_ingreso.bus_est(ced_alu_sel);
            if(formul==4) frm_principal.v_matric.bus_est(ced_alu_sel);
            if(formul==5) frm_principal.v_doc_fal_x_alu.busc_inf(ced_alu_sel);  
            frm_principal.v_busc_estud=null;
            this.setVisible(false);
        } catch (ParseException ex) {
            Logger.getLogger(frm_buscar_estudiante.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_btn_bus_est_aceptarActionPerformed

    private void btn_bus_est_cancActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_est_cancActionPerformed
        frm_principal.v_busc_estud=null;
        this.dispose();
    }//GEN-LAST:event_btn_bus_est_cancActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_busc_estud=null;
    }//GEN-LAST:event_formInternalFrameClosed

     
    private void llenar_tabla(){
        dat_bus=txt_busqueda_est.getText();
        sql="SELECT  cedula, apellidos,nombres FROM alumno WHERE \n"; 
        sql2="%' AND est_reg= 'A'";
        if ("".equals(dat_bus)){
            sql = sql + "est_reg = 'A'";
        }else{
            if (sel_bus==1) sql = sql + "cedula LIKE '%"+dat_bus+sql2;            
            if (sel_bus==2) sql = sql + "apellidos LIKE '%"+dat_bus+sql2;           
            if (sel_bus==3) sql = sql + "nombres LIKE '%"+dat_bus+sql2;           
        }    
        CRUD c = new CRUD(); 
        ArrayList<Object[]> datos = new ArrayList<Object[]>();
        try{           
            ResultSet rs = c.select(sql); 
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No existen datos de la busqueda seleccionada", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
                txt_busqueda_est.requestFocus();
            }else{   
                int j =1;
                    do{ 
                       Object [] filas = new Object[4];
                       for(int i=0; i<1;i++){   
                            filas[i] = j;
                            filas[i+1] = rs.getObject(i+1);
                            filas[i+2] = rs.getObject(i+2);
                            filas[i+3] = rs.getObject(i+3);
                       }
                       datos.add(filas); 
                       j=j+1;
                }while(rs.next());
                for(int i=0;i<datos.size();i++ ) tablamodel.addRow(datos.get(i)  );

            }
        }catch(Exception ex){
              JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
        }      
    }
    private void formato_objet(){
        fg.form_etiq2(lbl_1, lbl_2);
        fg.formato_texto1(txt_busqueda_est);  
        fg.formato_combo1(cmb_busqueda_alu);
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_est;
    private javax.swing.JButton btn_bus_est_aceptar;
    private javax.swing.JButton btn_bus_est_canc;
    private javax.swing.JComboBox<String> cmb_busqueda_alu;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JPanel pnl_dat_usu3;
    private javax.swing.JTable tbl_bus_alu;
    private javax.swing.JTextField txt_busqueda_est;
    // End of variables declaration//GEN-END:variables
}
