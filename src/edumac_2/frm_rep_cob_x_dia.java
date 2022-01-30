
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;


public class frm_rep_cob_x_dia extends javax.swing.JInternalFrame {
//Para el paralelo
    public int cod_paral=0      ;
    public String para_sel=""   ,   parale=""       ;
//Para trabajar con fechas    
    public Date f_actual = new Date();
    public SimpleDateFormat formatofecha = new SimpleDateFormat("yyyy-MM-dd");
    public String fec_ini =""   , fec_fin =""   , fec_act="";
    public int comp_fec = 0 , cant = 22 , tmp=0;
//Para validaciones varias    
    public String   a_est="A"       ,sql=""     ,doc_entreg="";
    public String   alu =""         ; 
    public double acum=0;
    
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    DefaultTableModel tablamodel = new DefaultTableModel();

    public frm_rep_cob_x_dia() {
        initComponents();
        this.setTitle("Reporte Cobros realizados por Día");//Titulo formulario
        vl.logo_jif(this,cant);
        jdc_fec_ini.setDate(f_actual);
        fec_act = formatofecha.format(f_actual);
        formato_objet();
        form_tbl();
        

    }

    private void form_tbl(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Doc Entregado"); 
        tablamodel.addColumn("# Documento"); 
        tablamodel.addColumn("Valor"); 
        TableColumn columna = jtb_recau_x_dia.getColumn("#");
        columna.setPreferredWidth(40) ;
        columna.setMaxWidth(40);       
        columna = jtb_recau_x_dia.getColumn("Doc Entregado");
        columna.setPreferredWidth(100);
        columna.setMaxWidth(100);
        columna = jtb_recau_x_dia.getColumn("# Documento");
        columna.setPreferredWidth(120); 
        columna.setMaxWidth(120);
        columna = jtb_recau_x_dia.getColumn("Valor");
        columna.setPreferredWidth(80); 
        columna.setMaxWidth(80);
        
    }
    

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_dfa_rep = new javax.swing.JButton();
        btn_dfa_salir = new javax.swing.JButton();
        jPanel2 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        jdc_fec_ini = new com.toedter.calendar.JDateChooser();
        jScrollPane1 = new javax.swing.JScrollPane();
        jtb_recau_x_dia = new javax.swing.JTable();
        btn_bus_recau = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        txt_total = new javax.swing.JTextField();

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

        btn_dfa_rep.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Reporte.png"))); // NOI18N
        btn_dfa_rep.setText("Reporte");
        btn_dfa_rep.setToolTipText("Salir");
        btn_dfa_rep.setFocusable(false);
        btn_dfa_rep.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_dfa_rep.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_dfa_rep.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_dfa_repActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_dfa_rep);

        btn_dfa_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_dfa_salir.setText("Salir");
        btn_dfa_salir.setToolTipText("Salir");
        btn_dfa_salir.setFocusable(false);
        btn_dfa_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_dfa_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_dfa_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_dfa_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_dfa_salir);

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Documentos", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Fecha:");

        jdc_fec_ini.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N

        jtb_recau_x_dia.setModel(tablamodel);
        jScrollPane1.setViewportView(jtb_recau_x_dia);

        btn_bus_recau.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_recau.setToolTipText("Buscar");
        btn_bus_recau.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_recauActionPerformed(evt);
            }
        });

        jLabel1.setText("Total Cobrado: $");

        txt_total.setEditable(false);
        txt_total.setBackground(new java.awt.Color(255, 255, 255));
        txt_total.setHorizontalAlignment(javax.swing.JTextField.RIGHT);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(lbl_1)
                        .addGap(35, 35, 35)
                        .addComponent(jdc_fec_ini, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_bus_recau, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 350, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(jPanel2Layout.createSequentialGroup()
                                .addComponent(jLabel1)
                                .addGap(18, 18, 18)
                                .addComponent(txt_total, javax.swing.GroupLayout.PREFERRED_SIZE, 76, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jdc_fec_ini, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_1)
                    .addComponent(btn_bus_recau, javax.swing.GroupLayout.Alignment.TRAILING))
                .addGap(11, 11, 11)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 192, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(txt_total, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(14, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_dfa_repActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_repActionPerformed
        //presentar_reporte();
    }//GEN-LAST:event_btn_dfa_repActionPerformed

    private void btn_dfa_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_salirActionPerformed
        frm_principal.v_rep_cob_x_dia=null;
        this.dispose();
    }//GEN-LAST:event_btn_dfa_salirActionPerformed

    private void formato_objet(){
        fg.form_etiq1(lbl_1);
    }
    
    private void capt_datos(){
//Para trabajar con fechas    
        Date fecha_ini = jdc_fec_ini.getDate();
        long d = fecha_ini.getTime();
        java.sql.Date f_ini = new java.sql.Date(d);
        fec_ini= f_ini.toString()  ;
    }
    
    private void btn_bus_recauActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_recauActionPerformed
        capt_datos();
//Verifico que la fecha no sea mayor a la actual
        comp_fec = fec_ini.compareTo(fec_act);
        if(comp_fec == 1){
            JOptionPane.showMessageDialog(this, "La fecha desde es mayor a la fecha actual", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            jdc_fec_ini.requestFocus();
        }else{
            try {
                vl.limpiar_tabla(jtb_recau_x_dia,tablamodel);
                CRUD y = new CRUD();
                ArrayList<Object[]> datos = new ArrayList<Object[]>();
                sql=" SELECT doc_entreg, n_doc_entreg ,val_pagado \n" +
                        " FROM caja \n" +
                        " WHERE fecha = '"+fec_ini+"' \n" +
                        " AND est_reg = 'A'";
                ResultSet rs = y.select(sql);
                if (rs.next()== false){
                    JOptionPane.showMessageDialog(this, "No hay cobros reaLizados en la fecha seleccionada", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    btn_dfa_rep.setEnabled(false);
                    jdc_fec_ini.requestFocus();
                }else{
                    btn_dfa_rep.setEnabled(true);
                    int j =1;
                    acum=0;
                    do{
                        Object [] filas = new Object[4];
                        for(int i=0; i<1;i++){
                            filas[i] = j;
                            tmp= Integer.parseInt(String.valueOf(rs.getObject(i+1)));
                            if (tmp==1) doc_entreg = "Recibo";
                            if (tmp==2) doc_entreg = "Factura";
                            filas[i+1] = doc_entreg ;
                            filas[i+2] = rs.getObject(i+2); ;
                            filas[i+3] = rs.getObject(i+3); ;
                            acum = acum + Double.valueOf(String.valueOf(rs.getObject(i+3)));
                        }
                        datos.add(filas);
                        j=j+1;
                    }while(rs.next());       
                    for(int i=0;i<datos.size();i++) tablamodel.addRow(datos.get(i));
                    txt_total.setText(String.valueOf(acum));
                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_rep_cob_x_dia.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }//GEN-LAST:event_btn_bus_recauActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_rep_cob_x_dia=null;
    }//GEN-LAST:event_formInternalFrameClosed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_recau;
    private javax.swing.JButton btn_dfa_rep;
    private javax.swing.JButton btn_dfa_salir;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private com.toedter.calendar.JDateChooser jdc_fec_ini;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JTable jtb_recau_x_dia;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JTextField txt_total;
    // End of variables declaration//GEN-END:variables
}
