
package edumac_2;
import java.sql.ResultSet;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_buscar_persona extends javax.swing.JInternalFrame {

    int sel_bus = 1;
    public int cant=0;   
    public int formul=0     ;
    String ced_per_sel =""  ,  nom_per_sel ="", ape_per_sel ="" ;    
    public String dat_bus=""    ,   sql=""  ,   sql2="" ;
    
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }  
    };
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_buscar_persona() {
        initComponents();
        this.setTitle("Busqueda de familiares por Cédula");  
        formato_tabla();                        
        String r = String.valueOf(sel_bus);
        txt_busqueda_persn.setBackground(vl.ama);
        formato_objet();
    }
    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Cédula");
        tablamodel.addColumn("Nombres y Apellidos");
        TableColumn columna = tbl_bus_per.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_bus_per.getColumn("Cédula");
        columna.setPreferredWidth(90); 
        columna.setMaxWidth(90);
        columna = tbl_bus_per.getColumn("Nombres y Apellidos");
        columna.setPreferredWidth(250);
        columna.setMaxWidth(250);

    } 

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        pnl_dat_usu3 = new javax.swing.JPanel();
        txt_busqueda_persn = new javax.swing.JTextField();
        lbl_1 = new javax.swing.JLabel();
        cmb_busqueda_per = new javax.swing.JComboBox<>();
        btn_bus_per = new javax.swing.JButton();
        lbl_2 = new javax.swing.JLabel();
        jPanel2 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbl_bus_per = new javax.swing.JTable();
        btn_bus_perso_aceptar = new javax.swing.JButton();
        btn_bus_est_canc = new javax.swing.JButton();

        setClosable(true);
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

        txt_busqueda_persn.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_busqueda_persnKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_busqueda_persnKeyTyped(evt);
            }
        });

        lbl_1.setText("Buscar por:");

        cmb_busqueda_per.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Cédula", "Apellidos y Nombres" }));
        cmb_busqueda_per.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_busqueda_perItemStateChanged(evt);
            }
        });
        cmb_busqueda_per.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_busqueda_perActionPerformed(evt);
            }
        });

        btn_bus_per.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_per.setToolTipText("Buscar Usuario");
        btn_bus_per.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_perActionPerformed(evt);
            }
        });

        lbl_2.setText("Buscar:");

        javax.swing.GroupLayout pnl_dat_usu3Layout = new javax.swing.GroupLayout(pnl_dat_usu3);
        pnl_dat_usu3.setLayout(pnl_dat_usu3Layout);
        pnl_dat_usu3Layout.setHorizontalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_usu3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_1)
                    .addComponent(lbl_2))
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(txt_busqueda_persn, javax.swing.GroupLayout.PREFERRED_SIZE, 285, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_bus_per, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap())
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addComponent(cmb_busqueda_per, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );
        pnl_dat_usu3Layout.setVerticalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_usu3Layout.createSequentialGroup()
                .addGap(0, 0, Short.MAX_VALUE)
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lbl_1)
                            .addComponent(cmb_busqueda_per))
                        .addGap(11, 11, 11)
                        .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lbl_2)
                            .addComponent(txt_busqueda_persn, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(btn_bus_per))
                .addGap(18, 18, 18))
        );

        tbl_bus_per.setModel(tablamodel);
        tbl_bus_per.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_bus_perMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbl_bus_per);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 415, Short.MAX_VALUE)
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(282, 282, 282))
        );

        btn_bus_perso_aceptar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Aceptar.png"))); // NOI18N
        btn_bus_perso_aceptar.setText("Aceptar");
        btn_bus_perso_aceptar.setHorizontalTextPosition(javax.swing.SwingConstants.RIGHT);
        btn_bus_perso_aceptar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_bus_perso_aceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_perso_aceptarActionPerformed(evt);
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
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btn_bus_perso_aceptar)
                .addGap(18, 18, 18)
                .addComponent(btn_bus_est_canc)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, 81, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 177, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(btn_bus_est_canc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(btn_bus_perso_aceptar))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txt_busqueda_persnKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_busqueda_persnKeyReleased

    }//GEN-LAST:event_txt_busqueda_persnKeyReleased

    private void txt_busqueda_persnKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_busqueda_persnKeyTyped
        cant = txt_busqueda_persn.getText().length();
        if (sel_bus==1){
            if (cant>= 0 && cant<10 ) vl.Solo_Numeros(evt);
            if (cant == 10) {
                vl.max_carateres_txt(txt_busqueda_persn,cant,evt);
            }
        }
        if (sel_bus==2){
            if (cant>= 0 && cant<35 ) vl.Solo_Letras(evt);
            if (cant == 35) vl.max_carateres_txt(txt_busqueda_persn,cant,evt);
        }
    }//GEN-LAST:event_txt_busqueda_persnKeyTyped

    private void cmb_busqueda_perItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_busqueda_perItemStateChanged

    }//GEN-LAST:event_cmb_busqueda_perItemStateChanged

    private void cmb_busqueda_perActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_busqueda_perActionPerformed
        if (cmb_busqueda_per.getSelectedItem()=="Cédula"){
            sel_bus=1;
            this.setTitle("Busqueda de familiar por Cédula");
            txt_busqueda_persn.setText("");
            vl.limpiar_tabla(tbl_bus_per,tablamodel);
        }
        if (cmb_busqueda_per.getSelectedItem()=="Apellidos y Nombres"){
            sel_bus=2;
            this.setTitle("Busqueda de familiar por apellidos y nombres");
            txt_busqueda_persn.setText("");
            vl.limpiar_tabla(tbl_bus_per,tablamodel);
        }
        String r = String.valueOf(sel_bus);
    }//GEN-LAST:event_cmb_busqueda_perActionPerformed

    private void btn_bus_perActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_perActionPerformed
        vl.limpiar_tabla(tbl_bus_per,tablamodel);
        llenar_tabla();
    }//GEN-LAST:event_btn_bus_perActionPerformed

    private void tbl_bus_perMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_bus_perMouseClicked
        ced_per_sel="";
        int fl_sel = tbl_bus_per.getSelectedRow();
        ced_per_sel= tbl_bus_per.getValueAt(fl_sel, 1).toString();
        ape_per_sel= tbl_bus_per.getValueAt(fl_sel, 2).toString();
    }//GEN-LAST:event_tbl_bus_perMouseClicked

    private void btn_bus_perso_aceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_perso_aceptarActionPerformed
        try {
            if(formul==1) frm_principal.v_famil.bus_persona(ced_per_sel);
            if(formul==2) frm_principal.v_rel_alu_fam.bus_persona(ced_per_sel);
            frm_principal.v_busc_person =null;
            this.setVisible(false);
        } catch (ParseException ex) {
            Logger.getLogger(frm_buscar_persona.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_btn_bus_perso_aceptarActionPerformed

    private void btn_bus_est_cancActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_est_cancActionPerformed
        frm_principal.v_busc_person =null;
        this.dispose();
    }//GEN-LAST:event_btn_bus_est_cancActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_busc_person =null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void llenar_tabla(){
        dat_bus=txt_busqueda_persn.getText();
        sql="SELECT  cedula, persona FROM persona WHERE \n"; 
        sql2="%' AND est_reg= 'A'";
        if ("".equals(dat_bus)){
            sql = sql + "est_reg = 'A'";
        }else{
            if (sel_bus==1) sql = sql + "cedula LIKE '%"+dat_bus+sql2;            
            if (sel_bus==2) sql = sql + "persona LIKE '%"+dat_bus+sql2;                    
        }    
        CRUD c = new CRUD(); 
        ArrayList<Object[]> datos = new ArrayList<Object[]>();
            try{           
                ResultSet rs = c.select(sql); 
                if (rs.next()== false){
                    JOptionPane.showMessageDialog(this, "No existen datos de la busqueda seleccionada", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
                    txt_busqueda_persn.requestFocus();
                }else{  
                    int j =1;
                       do{ 
                           Object [] filas = new Object[3];
                           for(int i=0; i<1;i++){                               
                                filas[i] = j;
                                filas[i+1] = rs.getObject(i+1);
                                filas[i+2] = rs.getObject(i+2);
                           }
                           datos.add(filas); 
                           j=j+1;
                      }while(rs.next());
                      for(int i=0;i<datos.size();i++ ){
                        tablamodel.addRow(datos.get(i)  );
                      }                       
                }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    
    private void formato_objet(){
        fg.form_etiq2(lbl_1, lbl_2);
        fg.formato_texto1(txt_busqueda_persn);  
        fg.formato_combo1(cmb_busqueda_per);
    }       
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_est_canc;
    private javax.swing.JButton btn_bus_per;
    private javax.swing.JButton btn_bus_perso_aceptar;
    private javax.swing.JComboBox<String> cmb_busqueda_per;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JPanel pnl_dat_usu3;
    private javax.swing.JTable tbl_bus_per;
    private javax.swing.JTextField txt_busqueda_persn;
    // End of variables declaration//GEN-END:variables
}
