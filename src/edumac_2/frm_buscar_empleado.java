
package edumac_2;

import java.sql.ResultSet;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_buscar_empleado extends javax.swing.JInternalFrame {
    int sel_bus = 1;
    public int cant=0;   
    public int formul=0     ;
    public String ced_emp_sel =""  ,  nom_emp_sel ="" ;    
    public String dat_bus=""    ,   sql=""  ,   sql2="" ;
//Catidad maxima de caracteres
    public int cdl=10    ,   nm=60   ;
    
    DefaultTableModel tablamodel = new DefaultTableModel(){
    //Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
            return false;  }  
    };
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_buscar_empleado() {
        initComponents();
        this.setTitle("Busqueda de Empleados por Cédula");  
        formato_objet();
        formato_tabla();
        String r = String.valueOf(sel_bus);
        txt_busqueda_est.setBackground(vl.ama);
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Cédula");
        tablamodel.addColumn("Empleado");
        TableColumn columna = tbl_empleado.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = tbl_empleado.getColumn("Cédula");
        columna.setPreferredWidth(90);
        columna.setMaxWidth(90);
        columna = tbl_empleado.getColumn("Empleado");
        columna.setPreferredWidth(250);
        columna.setMaxWidth(250);
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
        pnl_empleado = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbl_empleado = new javax.swing.JTable();
        btn_bus_est_aceptar = new javax.swing.JButton();
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

        cmb_busqueda_alu.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Cédula", "Empleados" }));
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
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_dat_usu3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_1)
                    .addComponent(lbl_2))
                .addGap(18, 18, 18)
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                        .addComponent(txt_busqueda_est, javax.swing.GroupLayout.PREFERRED_SIZE, 270, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_bus_est, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(cmb_busqueda_alu, javax.swing.GroupLayout.PREFERRED_SIZE, 125, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(12, Short.MAX_VALUE))
        );
        pnl_dat_usu3Layout.setVerticalGroup(
            pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_usu3Layout.createSequentialGroup()
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(cmb_busqueda_alu)
                    .addComponent(lbl_1))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_bus_est, javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_usu3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_busqueda_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_2)))
                .addContainerGap())
        );

        tbl_empleado.setModel(tablamodel);
        tbl_empleado.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_empleadoMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbl_empleado);

        javax.swing.GroupLayout pnl_empleadoLayout = new javax.swing.GroupLayout(pnl_empleado);
        pnl_empleado.setLayout(pnl_empleadoLayout);
        pnl_empleadoLayout.setHorizontalGroup(
            pnl_empleadoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_empleadoLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 400, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnl_empleadoLayout.setVerticalGroup(
            pnl_empleadoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_empleadoLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 161, Short.MAX_VALUE)
                .addContainerGap())
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
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(pnl_empleado, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 0, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btn_bus_est_aceptar)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(btn_bus_est_canc)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnl_dat_usu3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_empleado, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(btn_bus_est_canc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(btn_bus_est_aceptar))
                .addContainerGap())
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
            if (cant == cdl)  vl.max_carateres_txt(txt_busqueda_est,cant,evt);
        }
        if (sel_bus==2 ){
            if (cant>= 0 && cant<nm ) vl.Solo_Letras(evt);
            if (cant == nm) vl.max_carateres_txt(txt_busqueda_est,cant,evt);
        }
    }//GEN-LAST:event_txt_busqueda_estKeyTyped

    private void btn_bus_estActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_estActionPerformed
        vl.limpiar_tabla(tbl_empleado,tablamodel);
        llenar_tabla();
    }//GEN-LAST:event_btn_bus_estActionPerformed

    private void cmb_busqueda_aluItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_busqueda_aluItemStateChanged

    }//GEN-LAST:event_cmb_busqueda_aluItemStateChanged

    private void cmb_busqueda_aluActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_busqueda_aluActionPerformed
        if (cmb_busqueda_alu.getSelectedItem()=="Cédula"){
            sel_bus=1;
            this.setTitle("Busqueda de estudiante por Cédula");
            txt_busqueda_est.setText("");
            vl.limpiar_tabla(tbl_empleado,tablamodel);
        }
        if (cmb_busqueda_alu.getSelectedItem()=="Empleados"){
            sel_bus=2;
            this.setTitle("Busqueda de estudiante por Empleados");
            txt_busqueda_est.setText("");
            vl.limpiar_tabla(tbl_empleado,tablamodel);
        }
        String r = String.valueOf(sel_bus);
    }//GEN-LAST:event_cmb_busqueda_aluActionPerformed

    private void tbl_empleadoMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_empleadoMouseClicked
        ced_emp_sel="";
        int fl_sel = tbl_empleado.getSelectedRow();
        ced_emp_sel= tbl_empleado.getValueAt(fl_sel, 1).toString();
        nom_emp_sel= tbl_empleado.getValueAt(fl_sel, 2).toString();
    }//GEN-LAST:event_tbl_empleadoMouseClicked

    private void btn_bus_est_aceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_est_aceptarActionPerformed
        try {
            //Dependiendo del formulario que lo llamo, devuelve el codigo
            if(formul==1)   frm_principal.v_empl.bus_emp(ced_emp_sel);
            if(formul==2)   frm_principal.v_usua.bus_emp(ced_emp_sel);
            frm_principal.v_busc_emple=null;
            this.setVisible(false);
        } catch (ParseException ex) {
            Logger.getLogger(frm_buscar_empleado.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_btn_bus_est_aceptarActionPerformed

    private void btn_bus_est_cancActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_est_cancActionPerformed
        frm_principal.v_busc_emple=null;
        this.dispose();
    }//GEN-LAST:event_btn_bus_est_cancActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_busc_emple=null;
    }//GEN-LAST:event_formInternalFrameClosed


    private void llenar_tabla(){
        dat_bus=txt_busqueda_est.getText();
        sql="SELECT  cedula, empleado FROM empleado WHERE \n"; 
        sql2="%' AND est_reg= 'A'";
        if ("".equals(dat_bus)){
            sql = sql + "est_reg = 'A'";
        }else{
            if (sel_bus==1) sql = sql + "cedula LIKE '%"+dat_bus+sql2;            
            if (sel_bus==2) sql = sql + "empleado LIKE '%"+dat_bus+sql2;                   
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
                           Object [] filas = new Object[3];
                           for(int i=0; i<1;i++){   
                                filas[i] = j;
                                filas[i+1] = rs.getObject(i+1);
                                filas[i+2] = rs.getObject(i+2);
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
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JPanel pnl_dat_usu3;
    private javax.swing.JPanel pnl_empleado;
    private javax.swing.JTable tbl_empleado;
    private javax.swing.JTextField txt_busqueda_est;
    // End of variables declaration//GEN-END:variables
}
