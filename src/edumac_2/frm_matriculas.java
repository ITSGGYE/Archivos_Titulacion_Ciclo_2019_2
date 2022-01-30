
package edumac_2;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.DefaultCellEditor;
import javax.swing.JCheckBox;
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

public class frm_matriculas extends javax.swing.JInternalFrame {
//Para los datos del estudiante
    public static int cod_alu_sel=0     ;
    public String  ced_alu_sel =""     ;
    public String alu_nom=""            ;
//Para el paralelo
    public int cod_paral=0      ;
    public String para_sel=""   ,   parale=""       ;
//Para craer matricula
    public int      cod_perio=0         ,   cod_matric=0    ;
    public String   peri_act=""         ,   canc=""         ;
    public int      m_ini=0             ,   m_fin=0         ,  cnt_m=0 ;
    public int      cant_doc=0          ,   cod_trans =0    ,   cnt_doc_sis=0;
    public double   val_mat=0           ,   val_mes=0       ;
    public String   f_mat=""  ;
//Para craer documentos  
    public String   doc_entreg=""       ,   docu=""         ;
    public int      cnt_dc =0           ,   id_doc=0        ;
//Para trabajar con fechas    
    public Date f_actual = new Date();
    public SimpleDateFormat formatofecha1 = new SimpleDateFormat("dd/MM/yyyy");
    public SimpleDateFormat formatofecha2 = new SimpleDateFormat("yyyy-MM-dd");
    public String fec_act1="" , fec_act2="";
    public int comp_fec = 0;
//Para validaciones varias
    public int conf=0       ,   mat_oper=0      ,   grabado=0   ;
    public int dat_nec=0    ,   cant=15      ;
    public String mat_sql="";
    public boolean doc_sel=false;
    public int cont =0;
//Para el formato de la tabla
    Render classrender = new Render();
    JCheckBox check = new JCheckBox();
    DefaultCellEditor defaultcelleditor = new DefaultCellEditor(check);
    DefaultTableModel tablamodel = new DefaultTableModel();
    
    public static String a_ced="";
    public int cod_per_act = 0;
    public int cod_usu_act=0;
    public int cont_matri=0 ,   id_matric=0;
    public String ape_nom = ""    , n_mat = ""  ,   doc_comp="N";

    public String a_est=""    , sql="";
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_matriculas() {
        initComponents();
        this.setTitle("Matricula"); 
        vl.logo_jif(this,cant);
        formato_objet();
        color_campos_oblig();
        formato_tabla();
        llenar_combo_paralelo();  
        busc_cant_alu();
        llenar_tabla_documento(doc_sel);
        btn_mat_lim.setEnabled(false);
        btn_mat_guardar.setEnabled(false);
        txt_est_sel.setEditable(false);
        txt_tot_alu_para.setEditable(false);
        cmb_paralelo.setEnabled(false);
        hab_pnl_alu(false);
        hab_pnl_doc(false);
        busc_peri_act();
        //jdc_fec_mat.setDate(f_actual);
        fec_act1 = formatofecha1.format(f_actual);
        fec_act2 = formatofecha2.format(f_actual);
        buscar_periodo();
        txt_mat_periodo.setBackground(vl.ama);
        txt_mat_fecha.setBackground(vl.ama);
        txt_mat_fecha.setText(fec_act1);  
    }

    private void formato_tabla(){
        tablamodel.addColumn("#");        
        tablamodel.addColumn("Documentos"); 
        tablamodel.addColumn("Entregado");
        TableColumn columna = jtb_documento.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = jtb_documento.getColumn("Documentos");
        columna.setPreferredWidth(300); 
        columna.setMaxWidth(300);
        columna = jtb_documento.getColumn("Entregado");
        columna.setPreferredWidth(70);
        columna.setMaxWidth(70);
        
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_mat_nue = new javax.swing.JButton();
        btn_mat_mod = new javax.swing.JButton();
        btn_mat_eli = new javax.swing.JButton();
        btn_mat_lim = new javax.swing.JButton();
        btn_mat_guardar = new javax.swing.JButton();
        btn_mat_salir = new javax.swing.JButton();
        pnl_dat_est = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        txt_mat_ced_est_sel = new javax.swing.JTextField();
        btn_a_bus_ced = new javax.swing.JButton();
        lbl_2 = new javax.swing.JLabel();
        txt_est_sel = new javax.swing.JTextField();
        lbl_3 = new javax.swing.JLabel();
        cmb_paralelo = new javax.swing.JComboBox<>();
        lbl_4 = new javax.swing.JLabel();
        txt_tot_alu_para = new javax.swing.JTextField();
        lbl_5 = new javax.swing.JLabel();
        lbl_6 = new javax.swing.JLabel();
        txt_mat_periodo = new javax.swing.JTextField();
        txt_mat_fecha = new javax.swing.JTextField();
        jpn_doc = new javax.swing.JPanel();
        chb_todos = new javax.swing.JCheckBox();
        jScrollPane1 = new javax.swing.JScrollPane();
        jtb_documento = new javax.swing.JTable();

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

        btn_mat_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Nuevo.png"))); // NOI18N
        btn_mat_nue.setText("Nueva");
        btn_mat_nue.setToolTipText("Nueva");
        btn_mat_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_nue);

        btn_mat_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Modificar.png"))); // NOI18N
        btn_mat_mod.setText("Modificar");
        btn_mat_mod.setToolTipText("Modificar");
        btn_mat_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_mod);

        btn_mat_eli.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Eliminar.png"))); // NOI18N
        btn_mat_eli.setText("Eliminar");
        btn_mat_eli.setToolTipText("Eliminar");
        btn_mat_eli.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_eli.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_eli.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_eliActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_eli);

        btn_mat_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_mat_lim.setText("Limpiar");
        btn_mat_lim.setToolTipText("Limpiar Formulario");
        btn_mat_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_lim);

        btn_mat_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_mat_guardar.setText("Guardar");
        btn_mat_guardar.setToolTipText("Guardar");
        btn_mat_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_guardar);

        btn_mat_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_mat_salir.setText("Salir");
        btn_mat_salir.setToolTipText("Salir");
        btn_mat_salir.setFocusable(false);
        btn_mat_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_mat_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_mat_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_mat_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_mat_salir);

        pnl_dat_est.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Información Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        txt_mat_ced_est_sel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_mat_ced_est_selKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_mat_ced_est_selKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_mat_ced_est_selKeyTyped(evt);
            }
        });

        btn_a_bus_ced.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_a_bus_ced.setToolTipText("Buscar Estudiante");
        btn_a_bus_ced.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_a_bus_cedActionPerformed(evt);
            }
        });

        lbl_2.setText("Estudiante");

        txt_est_sel.setEditable(false);
        txt_est_sel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_est_selKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_est_selKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_est_selKeyTyped(evt);
            }
        });

        lbl_3.setText("Paralelo:");

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

        lbl_4.setText("Total estudiantes en Paralelo:");

        txt_tot_alu_para.setHorizontalAlignment(javax.swing.JTextField.RIGHT);

        lbl_5.setText("Fecha:");

        lbl_6.setText("Periodo Lectivo");

        txt_mat_periodo.setEditable(false);
        txt_mat_periodo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_mat_periodoKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_mat_periodoKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_mat_periodoKeyTyped(evt);
            }
        });

        txt_mat_fecha.setEditable(false);
        txt_mat_fecha.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_mat_fechaKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_mat_fechaKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_mat_fechaKeyTyped(evt);
            }
        });

        javax.swing.GroupLayout pnl_dat_estLayout = new javax.swing.GroupLayout(pnl_dat_est);
        pnl_dat_est.setLayout(pnl_dat_estLayout);
        pnl_dat_estLayout.setHorizontalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addComponent(lbl_3)
                        .addGap(27, 27, 27)
                        .addComponent(cmb_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, 164, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(lbl_5)
                        .addGap(65, 65, 65)
                        .addComponent(txt_mat_fecha))
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_2)
                            .addComponent(lbl_1))
                        .addGap(18, 18, 18)
                        .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 342, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(0, 0, Short.MAX_VALUE))
                            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                                .addComponent(txt_mat_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(btn_a_bus_ced, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(28, 28, 28)
                                .addComponent(lbl_6)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(txt_mat_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, 107, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addComponent(lbl_4)
                        .addGap(35, 35, 35)
                        .addComponent(txt_tot_alu_para, javax.swing.GroupLayout.PREFERRED_SIZE, 46, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap())
        );
        pnl_dat_estLayout.setVerticalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_a_bus_ced)
                    .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_mat_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_1))
                    .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_mat_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_6)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(lbl_2)
                    .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_3)
                    .addComponent(cmb_paralelo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_5)
                    .addComponent(txt_mat_fecha, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(11, 11, 11)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_4)
                    .addComponent(txt_tot_alu_para, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jpn_doc.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Documentos", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

        chb_todos.setText("Seleccionar todos");
        chb_todos.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                chb_todosMouseClicked(evt);
            }
        });
        chb_todos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                chb_todosActionPerformed(evt);
            }
        });

        jtb_documento.setModel(tablamodel);
        jScrollPane1.setViewportView(jtb_documento);

        javax.swing.GroupLayout jpn_docLayout = new javax.swing.GroupLayout(jpn_doc);
        jpn_doc.setLayout(jpn_docLayout);
        jpn_docLayout.setHorizontalGroup(
            jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpn_docLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(chb_todos)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 429, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jpn_docLayout.setVerticalGroup(
            jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpn_docLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(chb_todos)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 154, Short.MAX_VALUE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jpn_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(22, Short.MAX_VALUE))
            .addGroup(layout.createSequentialGroup()
                .addComponent(pnl_dat_est, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jpn_doc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_mat_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_nueActionPerformed
        if(!"".equals(txt_mat_periodo.getText()) ){       
            mat_oper = 1;
            vl.col_orig5(btn_mat_nue,btn_mat_mod,btn_mat_eli,btn_mat_guardar,btn_mat_salir);
            this.setTitle("Nueva Matricula");
            btn_mat_nue.setBackground(vl.ama);
            btn_mat_guardar.setEnabled(true);
            btn_mat_lim.setEnabled(true);
            doc_sel=false;
            llenar_combo_paralelo();
            hab_pnl_alu(true);
            cmb_paralelo.setEnabled(false);
            hab_pnl_doc(false);
            if(cod_alu_sel==0) llenar_tabla_documento(doc_sel);
        }else{
            JOptionPane.showMessageDialog(this, "No existe en el sistema un periodo lectivo activo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            btn_mat_salir.requestFocus(); 
        }
    }//GEN-LAST:event_btn_mat_nueActionPerformed

    private void btn_mat_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_modActionPerformed
        if(!"".equals(txt_mat_periodo.getText()) ){    
            mat_oper = 2;
            vl.col_orig5(btn_mat_nue,btn_mat_mod,btn_mat_eli,btn_mat_guardar,btn_mat_salir);
            this.setTitle("Modificar Matricula");
            btn_mat_mod.setBackground(vl.ama);
            btn_mat_guardar.setEnabled(true);
            btn_mat_lim.setEnabled(true);
            doc_sel=false;
            hab_pnl_alu(true);
            cmb_paralelo.setEnabled(false);
            hab_pnl_doc(false);
            if(cod_alu_sel==0) llenar_tabla_documento(doc_sel);
        }else{
            JOptionPane.showMessageDialog(this, "No existe en el sistema un periodo lectivo activo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            btn_mat_salir.requestFocus(); 
        }
    }//GEN-LAST:event_btn_mat_modActionPerformed

    private void btn_mat_eliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_eliActionPerformed
        if(!"".equals(txt_mat_periodo.getText()) ){  
            mat_oper = 3;
            vl.col_orig5(btn_mat_nue,btn_mat_mod,btn_mat_eli,btn_mat_guardar,btn_mat_salir);
            this.setTitle("Eliminar Matricula");
            btn_mat_eli.setBackground(vl.ama);
            btn_mat_guardar.setEnabled(true);
            btn_mat_lim.setEnabled(true);
            hab_pnl_alu(true);
            cmb_paralelo.setEnabled(false);
            hab_pnl_doc(false);
            if(cod_alu_sel==0) llenar_tabla_documento(doc_sel);
        }else{
            JOptionPane.showMessageDialog(this, "No existe en el sistema un periodo lectivo activo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            btn_mat_salir.requestFocus(); 
        }
    }//GEN-LAST:event_btn_mat_eliActionPerformed

    private void btn_mat_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_limActionPerformed
        limpiar();
    }//GEN-LAST:event_btn_mat_limActionPerformed

    private void btn_mat_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_guardarActionPerformed
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){
            if(mat_oper==1){
                conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos de la matricula en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
                if (conf==0){
                    bus_dat_nec();
                    cont_docum_entreg();
                    //Ingreso datos de la matricula
                    CRUD_Matricula ing_mat = new CRUD_Matricula();
                    grabado= ing_mat.agre_matri(fec_act2,cant_doc, cod_alu_sel, cod_perio, cod_paral);
                    if(grabado ==0){
                        JOptionPane.showMessageDialog(this, "La Matricula no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        dat_nec=1;
                        bus_mat_ingt();
                        if (dat_nec==1){
                            //Ingreso datos del valor de la matricula
                            ing_val_matr();
                            if(grabado == 0){
                                JOptionPane.showMessageDialog(this, "El valor de la matricula no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                //Ingreso datos del valor de las mensualidades
                                cont = m_ini;
                                for(int i=1;i<=cnt_m;i++){
                                    grabado = ing_mat.agre_pagos(cod_matric,cont ,val_mes);
                                    cont=cont+1;
                                    if (cont>12) cont=1;
                                }
                                if(grabado == 0){
                                    JOptionPane.showMessageDialog(this, "El valor de las mensualidades no se pudieron guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);

                                }else{
                                    cnt_dc = jtb_documento.getRowCount();
                                    cant_doc=0;
                                    for (int i = 0; i < cnt_dc; i++) {
                                        try {
                                            boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
                                            if(res==true){  doc_entreg="S";
                                            }else{          doc_entreg="N";   }
                                            docu =tablamodel.getValueAt(i, 1).toString();
                                            CRUD b_dc = new CRUD();
                                            a_est="A";
                                            mat_sql=" SELECT id FROM documento \n "+
                                            " WHERE documento = '" + docu + "' \n "+
                                            " AND est_reg = '" + a_est + "'";
                                            ResultSet rs = b_dc.select(mat_sql);
                                            if (rs.next()!= false){
                                                id_doc=rs.getInt("id");
                                                CRUD_Matricula ing_doc = new CRUD_Matricula();
                                                grabado= ing_doc.agre_todos_doc(cod_matric,id_doc,doc_entreg);
                                                if(grabado ==0){
                                                    JOptionPane.showMessageDialog(this, "El documento " +docu+ " no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                                }
                                            }
                                        } catch (SQLException ex) {
                                            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
                                        }
                                    }
                                    if(grabado ==1){
                                        mat_sql="La Matricula fue ingresada en el sistema con el numero " + cod_matric;
                                        JOptionPane.showMessageDialog(this, mat_sql ,"Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                        presentar_reporte();
                                        limpiar();
                                    }
                                }
                            }
                        }
                    }
                }

            }
        }
        if(mat_oper==2){
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de modificar los datos de la matricula en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                CRUD_Matricula mod_mat = new CRUD_Matricula();
                grabado= mod_mat.act_mat(cod_matric,cod_paral);
                if(grabado ==0){
                    JOptionPane.showMessageDialog(this, "La Matricula no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                }else{
                    cnt_dc = jtb_documento.getRowCount();
                    cant_doc=0;
                    for (int i = 0; i < cnt_dc; i++) {
                        try {
                            docu =tablamodel.getValueAt(i, 1).toString();
                            boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
                            if(res==true){  doc_entreg="S";
                            }else{          doc_entreg="N";   }                         
                            CRUD b_dc = new CRUD();
                            a_est="A";
                            mat_sql=" SELECT id FROM documento \n "+
                            " WHERE documento = '" + docu + "' \n "+
                            " AND est_reg = '" + a_est + "'";
                            ResultSet rs = b_dc.select(mat_sql);
                            if (rs.next()!= false){
                                id_doc=rs.getInt("id");
                                CRUD_Matricula act_doc = new CRUD_Matricula();
                                grabado= act_doc.act_doc(cod_matric,id_doc,doc_entreg);
                                if(grabado ==0){
                                    JOptionPane.showMessageDialog(this, "El documento " +docu+ " no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }
                            }
                        } catch (SQLException ex) {
                            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
                        }
                    }
                    if(grabado ==1){
                        mat_sql="La Matricula fue actualizada en el sistema con el numero " + cod_matric;
                        JOptionPane.showMessageDialog(this, mat_sql ,"Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        presentar_reporte();
                        limpiar();
                    }  
                }
            }
        }   
        if(mat_oper==3){
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de eliminar los datos de la matricula en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                CRUD_Matricula eli_mat = new CRUD_Matricula();
                grabado= eli_mat.eli_mat(cod_matric);
                if(grabado ==0){
                    JOptionPane.showMessageDialog(this, "La Matricula no se pudo eliminar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                }else{
                    CRUD_Matricula eli_doc = new CRUD_Matricula();
                    grabado= eli_doc.eli_doc_mat(cod_matric);
                    if(grabado ==0){
                        JOptionPane.showMessageDialog(this, "Los documentos no se pudieron eliminar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                    }else{
                        CRUD_Matricula eli_pag = new CRUD_Matricula();
                        grabado= eli_pag.eli_pag_mat(cod_matric);
                        if(grabado ==0){
                            JOptionPane.showMessageDialog(this, "Lo spagos no se pudieron eliminar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }else{
                            mat_sql="La Matricula fue eliminada del sistema con el numero " + cod_matric;
                            JOptionPane.showMessageDialog(this, mat_sql ,"Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                            limpiar();
                        }
                    }
                }
            }
        }
    }//GEN-LAST:event_btn_mat_guardarActionPerformed

    private void btn_mat_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_mat_salirActionPerformed
        frm_principal.v_matric=null;
        this.dispose();
    }//GEN-LAST:event_btn_mat_salirActionPerformed

    private void txt_mat_ced_est_selKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_ced_est_selKeyPressed

    }//GEN-LAST:event_txt_mat_ced_est_selKeyPressed

    private void txt_mat_ced_est_selKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_ced_est_selKeyReleased
        
    }//GEN-LAST:event_txt_mat_ced_est_selKeyReleased

    private void txt_mat_ced_est_selKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_ced_est_selKeyTyped
        //Se obtiene la cantidad de caracteres de JtextField
        cant = txt_mat_ced_est_sel.getText().length();
        //Si la cantidad es igual o mayor a cero y menor a la cantidad
        //que tiene el campo en la base de datos se debe validar
        //que se ingrese solo números

        if (cant>= 0 && cant<10 ) vl.Solo_Numeros(evt);
        // Si cabtidad del JtextField es igual a la cantidad en la base de datos
        //no permitir que ingrese mas digitos
        if (cant == 10){
            vl.max_carateres_txt(txt_mat_ced_est_sel,cant,evt);
            //if(oper==1) verif_ced_rep();
        }
    }//GEN-LAST:event_txt_mat_ced_est_selKeyTyped

    private void btn_a_bus_cedActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_a_bus_cedActionPerformed
        if (txt_mat_ced_est_sel.getText().length()==10 ){
            dat_nec=1;
            a_ced=txt_mat_ced_est_sel.getText();
            dat_nec=vl.verif_cedula(a_ced, txt_mat_ced_est_sel);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_mat_ced_est_sel.requestFocus();
            }else{
                bus_est(a_ced);              
            }
        }else{
            if(frm_principal.v_busc_estud==null && frm_principal.v_busc_emple==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_estud = new frm_buscar_estudiante();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_estud);
                frm_principal.v_busc_estud.formul=4;      
            }else{
                frm_principal.enfocar_ventana();  
            }           
        }
    }//GEN-LAST:event_btn_a_bus_cedActionPerformed

    private void txt_est_selKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyPressed

    }//GEN-LAST:event_txt_est_selKeyPressed

    private void txt_est_selKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyReleased
        
    }//GEN-LAST:event_txt_est_selKeyReleased

    private void txt_est_selKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyTyped
       
    }//GEN-LAST:event_txt_est_selKeyTyped

    private void busc_peri_act(){
        try {
            CRUD y = new CRUD();
            mat_sql="SELECT id_periodo   FROM inicio_lectivo \n" +
                    " WHERE est_reg = 'A' ";
            ResultSet rs = y.select(mat_sql);            
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "Debe de ingresar los datos del Año lectivo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                cod_perio= Integer.parseInt(rs.getString(1));
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    
    private void cmb_paraleloItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_paraleloItemStateChanged
        
    }//GEN-LAST:event_cmb_paraleloItemStateChanged

    private void cmb_paraleloMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_cmb_paraleloMouseClicked
        
    }//GEN-LAST:event_cmb_paraleloMouseClicked

    private void busc_cant_alu(){
        para_sel=(String)cmb_paralelo.getSelectedItem();
        CRUD y = new CRUD();
        mat_sql="SELECT id FROM paralelo WHERE paralelo = '" + para_sel + "'";
        ResultSet rs = y.select(mat_sql);
        try {
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No se han imgresados Paralelos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                cod_paral= Integer.parseInt(rs.getString(1));
                mat_sql= "SELECT id FROM matricula WHERE est_reg = 'A' AND id_periodo = '" + cod_perio + "' AND id_paralelo = '" + cod_paral+ "'";
                CRUD x = new CRUD();
                ResultSet rsl = x.select(mat_sql);
                if (rsl.next()== false){
                    mat_sql="0";
                    txt_tot_alu_para.setText(mat_sql);
                }else{
                    cant=0;
                    do{
                        cant=cant + 1;
                    }while(rsl.next());
                    txt_tot_alu_para.setText(Integer.toString(cant));
                }
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    
    private void cmb_paraleloActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_paraleloActionPerformed
        busc_cant_alu();
    }//GEN-LAST:event_cmb_paraleloActionPerformed

    private void chb_todosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_chb_todosMouseClicked

    }//GEN-LAST:event_chb_todosMouseClicked

    private void chb_todosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_chb_todosActionPerformed
        //boolean valor = (Boolean) nombreJTable.getValueAt(fila,columna)
        if(chb_todos.isSelected()==true){ doc_sel=true;
        }else{                          doc_sel=false;  }
        llenar_tabla_documento(doc_sel);
    }//GEN-LAST:event_chb_todosActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_matric=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void txt_mat_periodoKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_periodoKeyPressed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_periodoKeyPressed

    private void txt_mat_periodoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_periodoKeyReleased
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_periodoKeyReleased

    private void txt_mat_periodoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_periodoKeyTyped
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_periodoKeyTyped

    private void txt_mat_fechaKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyPressed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_fechaKeyPressed

    private void txt_mat_fechaKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyReleased
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_fechaKeyReleased

    private void txt_mat_fechaKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyTyped
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_mat_fechaKeyTyped

    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4, lbl_5);
        fg.form_etiq1(lbl_6);
        fg.formato_texto3(txt_mat_ced_est_sel, txt_est_sel, txt_tot_alu_para); 
        fg.formato_texto1(txt_mat_periodo); 
    }
    
    private void limpiar(){
        String limp =   ""      ;
        mat_oper=0;
        cod_alu_sel =   0       ;
        ced_alu_sel =   ""      ;
        alu_nom     =   ""      ;
        cod_paral   =   0       ;
        txt_mat_ced_est_sel.setText(limp);
        txt_est_sel.setText(limp); 
        btn_mat_guardar.setEnabled(false);
        btn_mat_lim.setEnabled(false);
        vl.col_orig5(btn_mat_nue,btn_mat_mod,btn_mat_eli,btn_mat_guardar,btn_mat_salir);
        limpiar_tabla();
        hab_pnl_alu(false);
        hab_pnl_doc(false);
        cmb_paralelo.setEnabled(false);
    }
    
    private void bus_dat_nec(){
        try {
            CRUD b_dat_nec = new CRUD();
            a_est="A";
//Buscamos la informacion en inicio lectivo
            mat_sql=" SELECT val_matri, val_mensu , id_periodo,\n" +
                    " cant_mes,mes_ini \n" +
                    " FROM inicio_lectivo \n" +
                    " WHERE est_reg = '"+a_est+"' ";
            ResultSet rs = b_dat_nec.select(mat_sql);
            if (rs.next()!= false){
                cod_perio=rs.getInt("id_periodo");                
                canc="N";
                m_ini=rs.getInt("mes_ini");
                cnt_m=rs.getInt("cant_mes"); 
                val_mat=rs.getDouble("val_matri"); 
                val_mes=rs.getDouble("val_mensu"); 
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }       
    }
    
    private void cont_docum_entreg(){
        cant_doc=0;
        cnt_dc = jtb_documento.getRowCount();
        for (int i = 0; i < cnt_dc; i++) {
            boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
            if(res==true)  cant_doc=cant_doc+1;                                 
        }
    }
    
    private void bloquear_obj(boolean hab){
        txt_mat_ced_est_sel.setEditable(hab);
        txt_est_sel.setEditable(hab);
        cmb_paralelo.setEditable(hab);
               
    }
    
    private void hab_pnl_alu(boolean hab){
        txt_mat_ced_est_sel.setEnabled(hab);
        btn_a_bus_ced.setEnabled(hab);
    }
    
    private void hab_pnl_doc(boolean hab){
        jpn_doc.setEnabled(hab);
        chb_todos.setEnabled(hab);
        jtb_documento.setEnabled(hab);
    }
    private void color_campos_oblig (){
        txt_mat_ced_est_sel.setBackground(vl.ama);
        txt_est_sel.setBackground(vl.ama);
        cmb_paralelo.setBackground(vl.ama); 
        txt_tot_alu_para.setBackground(vl.ama);
    }
    
    public void ing_val_matr(){
        cont=13;
        CRUD_Matricula ing_mat = new CRUD_Matricula();
        grabado = ing_mat.agre_pagos(cod_matric,cont ,val_mat);       
    }
    
    public void bus_mat_ingt(){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            mat_sql="SELECT MAX(id) AS id FROM matricula ";
            ResultSet rs = b_est.select(mat_sql);
            if (rs.next()!= false){
                cod_matric=rs.getInt("id");  
                
            }else{
                dat_nec=0;
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    public void bus_est(String cd_est){        
        cmb_paralelo.setEnabled(false);
        hab_pnl_doc(false);
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            mat_sql="SELECT id,cedula,apellidos,nombres \n" +
                "FROM alumno WHERE cedula = '"+cd_est+"' AND est_reg= '"+a_est+"' ";
            ResultSet rs = b_est.select(mat_sql);
            if (rs.next()!= false){
                cod_alu_sel=rs.getInt("id");
                ced_alu_sel=rs.getString("cedula");
                alu_nom = rs.getString("apellidos") + " " + rs.getString("nombres") ; 
                CRUD b_mat = new CRUD();
                a_est="A";
                mat_sql="SELECT m.id , p.paralelo,m.id_periodo \n" +
                " FROM matricula AS m INNER JOIN paralelo AS p \n" + 
                " ON m.id_paralelo = p.id " +
                " WHERE m.id_alumno = '"+cod_alu_sel+"' AND m.`est_reg`= '"+a_est+"' ";
                ResultSet rs_mat = b_mat.select(mat_sql);
                if (rs_mat.next()!= false){
                    cod_matric=rs_mat.getInt("m.id");              
                    para_sel=rs_mat.getString("p.paralelo");
                    //cod_period=rs_mat.getInt("m.id_periodo");
                }else{
                    cod_matric=0;                       
                }               
                if(mat_oper == 1 && cod_matric==0){    
                    txt_mat_ced_est_sel.setText(ced_alu_sel);
                    txt_est_sel.setText(alu_nom);
                    cmb_paralelo.setEnabled(true);
                    btn_mat_guardar.setEnabled(true);
                    hab_pnl_doc(true);
                }
                if(mat_oper == 1 && cod_matric > 0){
                    JOptionPane.showMessageDialog(this, "El alumno ya ha sido matriculado en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    cmb_paralelo.setEnabled(false);
                    hab_pnl_doc(false);
                    btn_mat_guardar.setEnabled(false);
                    txt_mat_ced_est_sel.requestFocus();
                
                }
                
                if((mat_oper == 2 || mat_oper == 3) && cod_matric==0){
                    JOptionPane.showMessageDialog(this, "El alumno no ha sido matriculado en el sistema, debe ser ingresado", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    cmb_paralelo.setEnabled(false);
                    hab_pnl_doc(false);
                    btn_mat_guardar.setEnabled(false);
                    txt_mat_ced_est_sel.requestFocus();   
                }
                if((mat_oper==2 || mat_oper==3) && cod_matric>0){
                    txt_mat_ced_est_sel.setText(ced_alu_sel);
                    txt_est_sel.setText(alu_nom);
                    cmb_paralelo.setEnabled(true);
                    btn_mat_guardar.setEnabled(true);
                    cmb_paralelo.setSelectedItem(para_sel);
                    hab_pnl_doc(true);                                     
                    llen_tab_doc_ent(); 
                }
            }else{
                JOptionPane.showMessageDialog(this, "El número de Cédula '"+cd_est+"' no existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_mat_ced_est_sel.requestFocus();
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    private void llen_tab_doc_ent(){
        try {
            limpiar_tabla();
            a_est="A";
            CRUD c = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT r.entregado , d.documento \n" +
                    " FROM rel_matri_doc AS r INNER JOIN documento AS d \n" +
                    " ON r.id_documento = d.id \n" +
                    " WHERE id_matricula = '"+cod_matric+"' \n" +
                    "AND r.est_reg = '"+a_est+"' ";
            ResultSet rs = c.select(sql);
            if (rs.next()!= false){
                int j =1;
                do{
                    Object [] filas = new Object[3];
                    for(int i=0; i<1;i++){
                        filas[i] = j;
                        if ("S".equals(String.valueOf(rs.getObject(i+1)))) {
                            doc_sel=true;
                        }else{
                            doc_sel=false;
                        }
                        filas[i+1] = rs.getObject(2);
                        filas[i+2] =doc_sel;                      
                    }
                    datos.add(filas);
                    j=j+1;
                }while(rs.next());
                cnt_doc_sis=j-1;
                for(int i=0;i<datos.size();i++) {
                    tablamodel.addRow(datos.get(i));
                    jtb_documento.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
                    jtb_documento.setDefaultRenderer(jtb_documento.getColumnClass(2), classrender);
                }       
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }   
    private void verif_dat_neces(){
        if (cod_alu_sel==0 ){
            JOptionPane.showMessageDialog(this, "Debe de seleccionar al estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            btn_a_bus_ced.requestFocus();             
            dat_nec=0;
        }else{
            //capt_dat_fec();
    //Verifico que la fecha desde no sea mayor a la actual        
           /*comp_fec = f_mat.compareTo(fec_act);
           if(comp_fec == 1){
               JOptionPane.showMessageDialog(this, "La fecha la matricula es mayor a la fecha actual", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
               jdc_fec_mat.requestFocus();
               dat_nec=0;
           }*/
       }
    }
      
    /*private void capt_dat_fec(){
//Para trabajar con fechas    
        Date fecha_ini = jdc_fec_mat.getDate();
        long d = fecha_ini.getTime();
        java.sql.Date f_ini = new java.sql.Date(d);
        f_mat= f_ini.toString()  ;       
    }*/
        
    private void presentar_reporte(){
        try {
            Conexion cn = new Conexion();
            Connection conn= cn.conectar();
//            
            JasperReport reporte = null;
            String path="src\\reportes\\rp_matriculas.jasper";
//Para ingresar los parametros de la busqueda en el reporte           
            Map parametro = new HashMap();
            parametro.put("cd_mat", cod_matric);                      
            reporte =(JasperReport) JRLoader.loadObjectFromFile(path);                        
            JasperPrint jprint = JasperFillManager.fillReport(reporte,parametro,conn);        
            JasperViewer view = new JasperViewer(jprint,false);            
            view.setDefaultCloseOperation(DISPOSE_ON_CLOSE); ;
            view.setVisible(true);
        
        } catch (JRException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    private void llenar_combo_paralelo(){
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
    
    private void llenar_tabla_documento(boolean sele){
        cnt_doc_sis=0;
        try {
            CRUD c = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT documento \n" +
                    "FROM documento WHERE est_reg = 'A'";
            ResultSet rs = c.select(sql);
            if (rs.next()== false){
                JOptionPane.showMessageDialog(this, "No se han imgresados Documentos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            }else{
                limpiar_tabla();
                int j =1;
                do{
                    Object [] filas = new Object[3];
                    for(int i=0; i<1;i++){
                        filas[i] = j;
                        filas[i+1] = rs.getObject(1);
                        filas[i+2] =sele;
                    }
                    datos.add(filas);
                    j=j+1;
                }while(rs.next());
                cnt_doc_sis=j-1;
                for(int i=0;i<datos.size();i++) {
                    tablamodel.addRow(datos.get(i));
                    jtb_documento.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
                    jtb_documento.setDefaultRenderer(jtb_documento.getColumnClass(2), classrender);
                }       
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
    
    private void buscar_periodo(){
        CRUD c = new CRUD();
        sql=" SELECT p.periodo\n" +
            " FROM  inicio_lectivo AS il INNER JOIN periodo AS p\n" +
            " ON il.id_periodo= p.id\n" +
            " WHERE il.est_reg='A'";
        ResultSet rs = c.select(sql);
        try {
            if (rs.next()!= false){
                txt_mat_periodo.setText(rs.getString("periodo") );
            }else{
                JOptionPane.showMessageDialog(this, "No existe en el sistema un periodo lectivo activo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                //txt_e_cedula.requestFocus();
            }       
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    
    private void limpiar_tabla(){
        int fl= jtb_documento.getRowCount();
        if (fl>0) for(int i=0;i< fl;i++) tablamodel.removeRow(0);           
    }
    
    
    
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_a_bus_ced;
    private javax.swing.JButton btn_mat_eli;
    private javax.swing.JButton btn_mat_guardar;
    private javax.swing.JButton btn_mat_lim;
    private javax.swing.JButton btn_mat_mod;
    private javax.swing.JButton btn_mat_nue;
    private javax.swing.JButton btn_mat_salir;
    private javax.swing.JCheckBox chb_todos;
    private javax.swing.JComboBox<String> cmb_paralelo;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JPanel jpn_doc;
    private javax.swing.JTable jtb_documento;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JPanel pnl_dat_est;
    private javax.swing.JTextField txt_est_sel;
    private javax.swing.JTextField txt_mat_ced_est_sel;
    private javax.swing.JTextField txt_mat_fecha;
    private javax.swing.JTextField txt_mat_periodo;
    private javax.swing.JTextField txt_tot_alu_para;
    // End of variables declaration//GEN-END:variables
}
