
package edumac_2;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JInternalFrame;
import javax.swing.JOptionPane;
import static javax.swing.WindowConstants.DISPOSE_ON_CLOSE;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.util.JRLoader;
import net.sf.jasperreports.view.JasperViewer;


public class frm_rep_mat_paralelo extends javax.swing.JInternalFrame {
//Para el paralelo
    public int cod_paral=0      , cant = 20;
    public String para_sel=""   ,   parale=""       ;
//Para validaciones varias
    public String sql="";  
    public String estd= "A" ;
    public String alu =""         ; 
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();
    DefaultTableModel tablamodel = new DefaultTableModel();

    public frm_rep_mat_paralelo() {
        initComponents();
        this.setTitle("Reporte Alumnos Matriculados por Paralelo");//Titulo formulario
        vl.logo_jif(this,cant);
        formato_objet();
        form_tb_x_para();
        vl.limpiar_tabla(jtb_documento,tablamodel);
        lln_cmb_paralelo();
        cmb_paralelo.setBackground(vl.ama);
    }

    private void form_tb_x_para(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Matricula"); 
        tablamodel.addColumn("Cédula"); 
        tablamodel.addColumn("Estudiante"); 
        TableColumn columna = jtb_documento.getColumn("#");
        columna.setPreferredWidth(40);
        columna.setMaxWidth(40);
        columna = jtb_documento.getColumn("Matricula");
        columna.setPreferredWidth(80); 
        columna.setMaxWidth(80);
        columna = jtb_documento.getColumn("Cédula");
        columna.setPreferredWidth(90); 
        columna.setMaxWidth(90);
        columna = jtb_documento.getColumn("Estudiante");
        columna.setPreferredWidth(250); 
        columna.setMaxWidth(250);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_dfa_rep = new javax.swing.JButton();
        btn_dfa_salir = new javax.swing.JButton();
        jPanel2 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jtb_documento = new javax.swing.JTable();
        lbl_1 = new javax.swing.JLabel();
        cmb_paralelo = new javax.swing.JComboBox<>();

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

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Alumnos Matriculados", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        jtb_documento.setModel(tablamodel);
        jScrollPane1.setViewportView(jtb_documento);

        lbl_1.setText("Paralelo:");

        cmb_paralelo.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_paraleloItemStateChanged(evt);
            }
        });
        cmb_paralelo.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                cmb_paraleloMouseClicked(evt);
            }
        });
        cmb_paralelo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_paraleloActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lbl_1)
                .addGap(18, 18, 18)
                .addComponent(cmb_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, 164, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 487, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_1)
                    .addComponent(cmb_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 197, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
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
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGap(21, 21, 21))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_dfa_repActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_repActionPerformed
        presentar_reporte();
    }//GEN-LAST:event_btn_dfa_repActionPerformed

    private void btn_dfa_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_salirActionPerformed
        frm_principal.v_rep_mat_para=null;
        this.dispose();
    }//GEN-LAST:event_btn_dfa_salirActionPerformed

    private void cmb_paraleloItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_paraleloItemStateChanged

    }//GEN-LAST:event_cmb_paraleloItemStateChanged

    private void cmb_paraleloMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_cmb_paraleloMouseClicked

    }//GEN-LAST:event_cmb_paraleloMouseClicked

    private void cmb_paraleloActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_paraleloActionPerformed
        if(evt.getSource()==cmb_paralelo){
            vl.limpiar_tabla(jtb_documento,tablamodel);
            para_sel=(String)cmb_paralelo.getSelectedItem();
            CRUD y = new CRUD();
            sql="SELECT id FROM paralelo WHERE paralelo = '" + para_sel + "'";
            ResultSet rs = y.select(sql);
            try {
                if (rs.next()== false){
                    JOptionPane.showMessageDialog(this, "No se han imgresados Paralelos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                }else{
                    cod_paral= Integer.parseInt(rs.getString(1));
                    bus_alum_matric();
                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_rep_mat_paralelo.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }//GEN-LAST:event_cmb_paraleloActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_rep_mat_para=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void formato_objet(){
        fg.form_etiq1(lbl_1);
        fg.formato_combo1(cmb_paralelo);
    }
    
    private void lln_cmb_paralelo(){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT paralelo FROM paralelo WHERE est_reg = 'A'"); 
                if (rs.next()== false){
                    JOptionPane.showMessageDialog(this, "No se han imgresados Paralelos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                }else{  
                    do{ 
                        parale=rs.getString(1);
                        cmb_paralelo.addItem(parale);  
                        
                      }while(rs.next());                                                       
                }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
      
    private void bus_alum_matric(){
        estd= "A";
        sql=" SELECT \n" +
            " matricula.id AS matricula_id,\n" +
            " alumno.cedula AS alumno_cedula,\n" +
            " alumno.apellidos AS alumno_apellidos,\n" +
            " alumno.nombres AS alumno_nombres  \n" +
            " FROM \n" +
            " alumno alumno INNER JOIN matricula matricula ON alumno.id = matricula.id_alumno    \n" +
            " INNER JOIN paralelo paralelo ON matricula.id_paralelo = paralelo.`id`\n" +
            " WHERE \n" +
            " matricula.est_reg= '"+ estd + "'AND paralelo.id= '"+ cod_paral + "' ";        
        try {
            CRUD b_doc = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            ResultSet rs = b_doc.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No hay alumnos matriuclados en "+ para_sel+"" , "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);            
                btn_dfa_rep.setEnabled(false);
                cmb_paralelo.requestFocus();
            }else{
                btn_dfa_rep.setEnabled(true);
                int j =1;
                do{ 
                   Object [] filas = new Object[4];
                   for(int i=0; i<1;i++){                               
                        filas[i] = j;
                        filas[i+1] = rs.getObject(i+1);
                        filas[i+2] = rs.getObject(i+2);
                        alu= String.valueOf(rs.getObject(i+3)) + " ";
                        alu= alu + String.valueOf(rs.getObject(i+4));
                        filas[i+3] = alu;

                   }
                   datos.add(filas);
                   j=j+1;
                }while(rs.next());
                for(int i=0;i<datos.size();i++) tablamodel.addRow(datos.get(i));       
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_rep_mat_paralelo.class.getName()).log(Level.SEVERE, null, ex);
        }           
    }
    
    private void presentar_reporte(){     
        estd= "'A'";
        try {
            Conexion cn1 = new Conexion();
            Connection conn= cn1.conectar();           
            JasperReport reporte1 = null;
            String path="src\\reportes\\rep_Matric_x_Paral.jasper";
//Para ingresar los parametros de la busqueda en el reporte           
            Map parametro = new HashMap();
            parametro.put("estado",estd); 
            parametro.put("cod_paral",cod_paral);            
            reporte1 =(JasperReport) JRLoader.loadObjectFromFile(path);                        
            JasperPrint jprint = JasperFillManager.fillReport(reporte1,parametro,conn);                            
            JasperViewer view = new JasperViewer(jprint,false); 
            view.setDefaultCloseOperation(DISPOSE_ON_CLOSE); ;
            view.setVisible(true);       
        } catch (JRException ex) {
            Logger.getLogger(frm_rep_mat_paralelo.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_dfa_rep;
    private javax.swing.JButton btn_dfa_salir;
    private javax.swing.JComboBox<String> cmb_paralelo;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jtb_documento;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    // End of variables declaration//GEN-END:variables
}
