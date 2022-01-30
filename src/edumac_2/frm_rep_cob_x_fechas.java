
package edumac_2;

import java.sql.Connection;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import static javax.swing.WindowConstants.DISPOSE_ON_CLOSE;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.util.JRLoader;
import net.sf.jasperreports.view.JasperViewer;


public class frm_rep_cob_x_fechas extends javax.swing.JInternalFrame {
//Para el paralelo
    public int cod_paral=0      , cant = 23;
    public String para_sel=""   ,   parale=""       ;
//Para trabajar con fechas    
    public Date f_actual = new Date();
    public SimpleDateFormat formatofecha = new SimpleDateFormat("yyyy-MM-dd");
    public String fec_ini =""   , fec_fin =""   , fec_act="";
    public int comp_fec = 0;
//Para validaciones varias    
    public String   a_est="A"       ,sql=""     ,doc_entreg="N";
    public String   alu =""         ; 
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    DefaultTableModel tablamodel = new DefaultTableModel();

    public frm_rep_cob_x_fechas() {
        initComponents();
        this.setTitle("Reporte Cobros realizados por fechas");//Titulo formulario
        vl.logo_jif(this,cant);
        formato_objet();
        form_tbl();
        jdc_fec_ini.setDate(f_actual);
        jdc_fec_fin.setDate(f_actual);
        fec_act = formatofecha.format(f_actual);
    }
    /*private void form_tbl_1(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Tipo Documento"); 
        tablamodel.addColumn("# Documento"); 
        tablamodel.addColumn("Valor"); 
        TableColumn columna = jtb_recau_x_dia.getColumn("#");
        columna.setPreferredWidth(40);
        columna.setMaxWidth(40);
        columna = jtb_recau_x_dia.getColumn("Tipo Documento");
        columna.setPreferredWidth(120);
        columna.setMaxWidth(120);
        columna = jtb_recau_x_dia.getColumn("# Documento");
        columna.setPreferredWidth(250); 
        columna.setMaxWidth(250);
        columna = jtb_recau_x_dia.getColumn("Valor");
        columna.setPreferredWidth(250); 
        columna.setMaxWidth(250);
    }*/
    private void form_tbl(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Fecha");
        tablamodel.addColumn("Tipo Documento"); 
        tablamodel.addColumn("# Documento"); 
        tablamodel.addColumn("Valor"); 
        TableColumn columna = jtb_recau_x_dia.getColumn("#");
        columna.setPreferredWidth(40);
        columna.setMaxWidth(40);
        columna = jtb_recau_x_dia.getColumn("Fecha");
        columna.setPreferredWidth(80);
        columna.setMaxWidth(80);
        columna = jtb_recau_x_dia.getColumn("Tipo Documento");
        columna.setPreferredWidth(100);
        columna.setMaxWidth(100);
        columna = jtb_recau_x_dia.getColumn("# Documento");
        columna.setPreferredWidth(100); 
        columna.setMaxWidth(100);
        columna = jtb_recau_x_dia.getColumn("Valor");
        columna.setPreferredWidth(70); 
        columna.setMaxWidth(70);
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
        lbl_2 = new javax.swing.JLabel();
        jdc_fec_fin = new com.toedter.calendar.JDateChooser();
        btn_bus_recau = new javax.swing.JButton();

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

        lbl_1.setText("Fecha desde:");

        jdc_fec_ini.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N

        jtb_recau_x_dia.setModel(tablamodel);
        jScrollPane1.setViewportView(jtb_recau_x_dia);

        lbl_2.setText("Fecha hasta:");

        jdc_fec_fin.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N

        btn_bus_recau.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_recau.setToolTipText("Buscar");
        btn_bus_recau.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_recauActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
            .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_1)
                    .addComponent(lbl_2))
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jdc_fec_ini, javax.swing.GroupLayout.DEFAULT_SIZE, 100, Short.MAX_VALUE)
                    .addComponent(jdc_fec_fin, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(btn_bus_recau, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 417, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jdc_fec_ini, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_1))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addComponent(lbl_2)
                        .addComponent(jdc_fec_fin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(btn_bus_recau))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 192, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_dfa_repActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_repActionPerformed
        presentar_reporte();
    }//GEN-LAST:event_btn_dfa_repActionPerformed

    private void btn_dfa_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_salirActionPerformed
        frm_principal.v_rep_cob_x_fec=null;
        this.dispose();
    }//GEN-LAST:event_btn_dfa_salirActionPerformed
   
    private void btn_bus_recauActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_recauActionPerformed
        capt_datos();
//Verifico que la fecha desde no sea mayor a la actual        
        comp_fec = fec_ini.compareTo(fec_act);
        if(comp_fec == 1){
            JOptionPane.showMessageDialog(this, "La fecha desde es mayor a la fecha actual", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            jdc_fec_ini.requestFocus();
        }else{
//Verifico que la fecha hasta no sea mayor a la actual        
            comp_fec = fec_fin.compareTo(fec_act);
            if(comp_fec == 1){
                JOptionPane.showMessageDialog(this, "La fecha hasta es mayor a la fecha actual", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                jdc_fec_fin.requestFocus();
            }else{
 //Verifico que la fecha desde no sea mayor a la fecha hasta                       
                comp_fec = fec_ini.compareTo(fec_fin);
                if(comp_fec == 1){
                    JOptionPane.showMessageDialog(this, "La fecha desde es mayor a la fecha hasta", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    jdc_fec_ini.requestFocus();
                }else{
                
                }
            }            
        }

//lbl_3.setText(String.valueOf(fec_ini.compareTo(fec_act)));

    }//GEN-LAST:event_btn_bus_recauActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_rep_cob_x_fec=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void presentar_reporte(){
        doc_entreg="'N'";
        
        try {
            Conexion cn1 = new Conexion();
            Connection conn= cn1.conectar();
//            
            JasperReport reporte1 = null;
            String path="src\\reportes\\rep_Doc_fal_todos.jasper";
//Para ingresar los parametros de la busqueda en el reporte           
            Map parametro = new HashMap();
            parametro.put("entregado",doc_entreg); 
            reporte1 =(JasperReport) JRLoader.loadObjectFromFile(path);                        
            JasperPrint jprint = JasperFillManager.fillReport(reporte1,parametro,conn);        
            
            JasperViewer view = new JasperViewer(jprint,false); 

            view.setDefaultCloseOperation(DISPOSE_ON_CLOSE); ;

            view.setVisible(true);

        
        } catch (JRException ex) {
            Logger.getLogger(frm_rep_cob_x_fechas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void capt_datos(){
//Para trabajar con fechas    
        Date fecha_ini = jdc_fec_ini.getDate();
        long d = fecha_ini.getTime();
        java.sql.Date f_ini = new java.sql.Date(d);
        fec_ini= f_ini.toString()  ;
        Date fecha_fin = jdc_fec_fin.getDate();
        d = fecha_fin.getTime();
        java.sql.Date f_fin = new java.sql.Date(d);
        fec_fin= f_fin.toString()  ;
        
    }
    private void formato_objet(){
        fg.form_etiq2(lbl_1,lbl_2);

    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_recau;
    private javax.swing.JButton btn_dfa_rep;
    private javax.swing.JButton btn_dfa_salir;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private com.toedter.calendar.JDateChooser jdc_fec_fin;
    private com.toedter.calendar.JDateChooser jdc_fec_ini;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JTable jtb_recau_x_dia;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    // End of variables declaration//GEN-END:variables
}
