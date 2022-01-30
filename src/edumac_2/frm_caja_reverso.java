
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_caja_reverso extends javax.swing.JInternalFrame {
//Para los datos del estudiante
    public static String a_ced="";
    public int cod_alu=0            ;
    public String nom_alu=""        ;
    public String a_est=""          ; 
 //Para los datos del pago
    public int      cod_pago=0      ,   cod_trans=0     ,   cod_matri=0 ;
    public double   saldo_ant=0     ,   val_canc=0      ,   sald_nue=0  ;
    public int      cod_f_pago=0    ,   cod_doc_ent=0   ;
    public String   num_doc_ent=""  ,   f_pago=""       ,   cance=""    ;
    public int      cod_pag_pend= 0;
    //Para validaciones varias  
    public int conf=0       ,   oper=0      ,   grabado=0   ;
    public int dat_nec=0    ,   cant=18      ;
    public String  sql="";

    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_caja_reverso() {
        initComponents();
        this.setTitle("Reversar Pagos");
        vl.logo_jif(this,cant); 
        formato_objet();
        lllen_cmb_doc_entreg();
        color_campos_oblig(); 
        btn_caj_guardar.setEnabled(false);
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_caj_lim = new javax.swing.JButton();
        btn_caj_guardar = new javax.swing.JButton();
        btn_caj_salir = new javax.swing.JButton();
        jPanel1 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        cmb_doc_entreg = new javax.swing.JComboBox<>();
        lbl_2 = new javax.swing.JLabel();
        txt_caj_num_doc = new javax.swing.JTextField();
        btn_caj_bus_doc = new javax.swing.JButton();
        pnl_datos_alumno = new javax.swing.JPanel();
        lbl_3 = new javax.swing.JLabel();
        txt_caj_ced_est = new javax.swing.JTextField();
        lbl_4 = new javax.swing.JLabel();
        txt_caj_ape_nom = new javax.swing.JTextField();
        lbl_5 = new javax.swing.JLabel();
        lbl_6 = new javax.swing.JLabel();
        lbl_8 = new javax.swing.JLabel();
        lbl_10 = new javax.swing.JLabel();
        txt_caj_val_canc = new javax.swing.JTextField();
        txt_f_pago = new javax.swing.JTextField();
        txt_cta_x_cob = new javax.swing.JTextField();

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

        btn_caj_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_caj_lim.setText("Limpiar");
        btn_caj_lim.setToolTipText("Limpiar Formulario");
        btn_caj_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_caj_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_caj_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_caj_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_caj_lim);

        btn_caj_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_caj_guardar.setText("Guardar");
        btn_caj_guardar.setToolTipText("Guardar");
        btn_caj_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_caj_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_caj_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_caj_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_caj_guardar);

        btn_caj_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_caj_salir.setText("Salir");
        btn_caj_salir.setToolTipText("Salir");
        btn_caj_salir.setFocusable(false);
        btn_caj_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_caj_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_caj_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_caj_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_caj_salir);

        jPanel1.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Documento Entregado", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Documento:");

        cmb_doc_entreg.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_doc_entregItemStateChanged(evt);
            }
        });
        cmb_doc_entreg.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_doc_entregActionPerformed(evt);
            }
        });

        lbl_2.setText("N° Documento:");

        txt_caj_num_doc.setBackground(new java.awt.Color(255, 255, 255));
        txt_caj_num_doc.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_num_docKeyPressed(evt);
            }
        });

        btn_caj_bus_doc.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_caj_bus_doc.setToolTipText("Buscar Usuario");
        btn_caj_bus_doc.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_caj_bus_docActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lbl_1)
                .addGap(23, 23, 23)
                .addComponent(cmb_doc_entreg, javax.swing.GroupLayout.PREFERRED_SIZE, 105, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(lbl_2, javax.swing.GroupLayout.PREFERRED_SIZE, 88, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(txt_caj_num_doc, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(btn_caj_bus_doc, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(8, 8, 8)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(btn_caj_bus_doc)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(lbl_1)
                        .addComponent(cmb_doc_entreg, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_2)
                        .addComponent(txt_caj_num_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pnl_datos_alumno.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Información del cobro realizado:", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_3.setText("Cedula:");

        txt_caj_ced_est.setEditable(false);
        txt_caj_ced_est.setBackground(new java.awt.Color(255, 255, 255));
        txt_caj_ced_est.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_caj_ced_estActionPerformed(evt);
            }
        });
        txt_caj_ced_est.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_ced_estKeyPressed(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_caj_ced_estKeyTyped(evt);
            }
        });

        lbl_4.setText("Estudiante:");

        txt_caj_ape_nom.setEditable(false);
        txt_caj_ape_nom.setBackground(new java.awt.Color(255, 255, 255));
        txt_caj_ape_nom.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_ape_nomKeyPressed(evt);
            }
        });

        lbl_5.setText("Recaudación:");

        lbl_6.setText("Forma de Pago");

        lbl_8.setText("Valor Cancelado");

        lbl_10.setText("$");

        txt_caj_val_canc.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_val_cancKeyPressed(evt);
            }
        });

        txt_f_pago.setEditable(false);
        txt_f_pago.setBackground(new java.awt.Color(255, 255, 255));
        txt_f_pago.setHorizontalAlignment(javax.swing.JTextField.LEFT);
        txt_f_pago.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_f_pagoActionPerformed(evt);
            }
        });

        txt_cta_x_cob.setEditable(false);
        txt_cta_x_cob.setBackground(new java.awt.Color(255, 255, 255));
        txt_cta_x_cob.setHorizontalAlignment(javax.swing.JTextField.LEFT);
        txt_cta_x_cob.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_cta_x_cobActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout pnl_datos_alumnoLayout = new javax.swing.GroupLayout(pnl_datos_alumno);
        pnl_datos_alumno.setLayout(pnl_datos_alumnoLayout);
        pnl_datos_alumnoLayout.setHorizontalGroup(
            pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_6, javax.swing.GroupLayout.DEFAULT_SIZE, 80, Short.MAX_VALUE)
                    .addComponent(lbl_5, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lbl_4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lbl_3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGap(18, 18, 18)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(txt_caj_ced_est, javax.swing.GroupLayout.PREFERRED_SIZE, 107, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                        .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                            .addComponent(txt_f_pago)
                            .addGap(36, 36, 36)
                            .addComponent(lbl_8, javax.swing.GroupLayout.PREFERRED_SIZE, 99, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(13, 13, 13)
                            .addComponent(lbl_10)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(txt_caj_val_canc, javax.swing.GroupLayout.PREFERRED_SIZE, 65, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                            .addGap(1, 1, 1)
                            .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(txt_caj_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, 350, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(txt_cta_x_cob, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addContainerGap())
        );
        pnl_datos_alumnoLayout.setVerticalGroup(
            pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_caj_ced_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_3))
                .addGap(11, 11, 11)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_caj_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_4))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_5)
                    .addComponent(txt_cta_x_cob, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_8)
                    .addComponent(txt_caj_val_canc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_10)
                    .addComponent(lbl_6)
                    .addComponent(txt_f_pago, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(pnl_datos_alumno, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGap(0, 1, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_datos_alumno, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_caj_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_limActionPerformed
        limpiar();
    }//GEN-LAST:event_btn_caj_limActionPerformed

    private void btn_caj_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_guardarActionPerformed
        String msj ="";
        num_doc_ent=txt_caj_num_doc.getText();
        if (cod_doc_ent == 1) msj="¿Está seguro de reversar el recibo # '"+num_doc_ent+"'?";
        if (cod_doc_ent == 2) msj="¿Está seguro de reversar la factura # '"+num_doc_ent+"'?";           
        conf = JOptionPane.showConfirmDialog(this, msj,"Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
        if (conf==0){
            CRUD_Caja caja = new CRUD_Caja();
            grabado = caja.reversar_pag(cod_pago);
            if(grabado==2){
                JOptionPane.showMessageDialog(this, "El Pago no se pudieron reversar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
            }else{
                sald_nue = saldo_ant + val_canc ; 
                if ("S".equals(cance)) cance = "N";
                grabado = caja.reversar_pag_pnd(cod_pag_pend, sald_nue, cance);
                if(grabado==2){
                    JOptionPane.showMessageDialog(this, "El Pago Pendiente no se pudieron reversar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                }else{
                    JOptionPane.showMessageDialog(this, "Los datos del Pago se pudieron reversar en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                    limpiar();
                }
            }
        }
    }//GEN-LAST:event_btn_caj_guardarActionPerformed

    private void btn_caj_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_salirActionPerformed
        frm_principal.v_caja_reverso=null;
        this.dispose();
    }//GEN-LAST:event_btn_caj_salirActionPerformed

    private void cmb_doc_entregItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_doc_entregItemStateChanged
        if(evt.getSource()==cmb_doc_entreg){
            if( cmb_doc_entreg.getSelectedItem() == "Recibo"){
                cod_doc_ent=1;
            }else{
                cod_doc_ent=2;
            }
        }
    }//GEN-LAST:event_cmb_doc_entregItemStateChanged

    private void cmb_doc_entregActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_doc_entregActionPerformed

    }//GEN-LAST:event_cmb_doc_entregActionPerformed

    private void txt_caj_num_docKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_num_docKeyPressed

    }//GEN-LAST:event_txt_caj_num_docKeyPressed

    private void btn_caj_bus_docActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_bus_docActionPerformed
        //Validamos los datos necesarios
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){
            num_doc_ent = txt_caj_num_doc.getText();
            try {
//Buscamos el codigo de la matricula y los atos del cobro
                CRUD b_cta = new CRUD();
                sql="SELECT c.id_matricula , c.id_transaccion, c.val_pagado, \n" +
                    "t.`transaccion`, fp.`forma_pago`, c.id \n" +
                    " FROM caja AS c INNER JOIN transaccion AS t ON c.id_transaccion = t.id \n" +
                    " INNER JOIN forma_pago AS fp ON c.id_forma_pago = fp.id \n" +
                    " WHERE c.est_reg = 'A' AND \n" +
                    " c.id_doc_entreg = '"+cod_doc_ent+"' AND \n" +
                    " c.n_doc_entreg = '"+num_doc_ent+"'";
                ResultSet rs1 = b_cta.select(sql);
                if (rs1.next()== false){
                    JOptionPane.showMessageDialog(this, "El documento entregado no existe en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    cmb_doc_entreg.requestFocus();
                    btn_caj_guardar.setEnabled(false);
                }else{
                    cod_pago= Integer.parseInt(rs1.getString("c.id"));
                    cod_matri= Integer.parseInt(rs1.getString("id_matricula"));
                    cod_trans= Integer.parseInt(rs1.getString("id_transaccion"));
                    val_canc = rs1.getDouble("val_pagado");
                    txt_caj_val_canc.setText(String.valueOf(rs1.getDouble("val_pagado")));
                    txt_f_pago.setText(rs1.getString("forma_pago"));
                    txt_cta_x_cob.setText(rs1.getString("transaccion"));
                    //Datos del alumno
                    CRUD b_alum = new CRUD();
                    sql="SELECT a.cedula, a.apellidos, a.nombres\n" +
                        "FROM matricula AS m INNER JOIN alumno AS a ON m.`id_alumno`= a.id\n" +
                        "WHERE m.`id` = '"+cod_matri+"'";
                    ResultSet rs2 = b_alum.select(sql);
                    if (rs2.next()!= false){
                        txt_caj_ced_est.setText(rs2.getString("cedula"));
                        nom_alu = rs2.getString("apellidos") + " " + rs2.getString("nombres");
                        txt_caj_ape_nom.setText(nom_alu);
                    }
//Buscamos los datos del pago pendiente 
                    CRUD b_pag_pend = new CRUD();
                    sql="SELECT id , saldo , cancelado\n" +
                        " FROM pag_pend \n" +
                        " WHERE id_matricula = '"+cod_matri+"' \n" +
                        " AND id_transaccion = '"+cod_trans+"' ";
                    ResultSet rs3 = b_pag_pend.select(sql);
                    if (rs3.next()!= false){
                        cod_pag_pend = rs3.getInt("id");
                        saldo_ant = rs3.getDouble("saldo");
                        cance = rs3.getString("cancelado");
                    }
                    btn_caj_guardar.setEnabled(true);
                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_caja_reverso.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }//GEN-LAST:event_btn_caj_bus_docActionPerformed

    private void txt_caj_ced_estActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_caj_ced_estActionPerformed
        
    }//GEN-LAST:event_txt_caj_ced_estActionPerformed

    private void txt_caj_ced_estKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ced_estKeyPressed

    }//GEN-LAST:event_txt_caj_ced_estKeyPressed

    private void txt_caj_ced_estKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ced_estKeyTyped

    }//GEN-LAST:event_txt_caj_ced_estKeyTyped

    private void lllen_cmb_doc_entreg(){
        cmb_doc_entreg.addItem("Recibo");
        cmb_doc_entreg.addItem("Factura");
        cod_doc_ent=1;
    }
    
    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4,lbl_5);
        fg.form_etiq3(lbl_6, lbl_8,lbl_10); 
        fg.formato_texto4(txt_caj_num_doc, txt_caj_ced_est, txt_caj_ape_nom, txt_caj_val_canc);  
        
    }
    
    private void color_campos_oblig (){
        txt_caj_num_doc.setBackground(vl.ama);    
        cmb_doc_entreg.setBackground(vl.ama);  
    }
    
    private void limpiar(){
        String lmp="";
        txt_caj_ced_est.setText(lmp);
        txt_caj_ape_nom.setText(lmp);
        txt_caj_val_canc.setText(lmp);
        txt_cta_x_cob.setText(lmp);
        txt_f_pago.setText(lmp);
        txt_caj_num_doc.setText(lmp);
        cod_alu=0;
        cod_pago=0;      
        cod_trans=0; 
        cod_f_pago=0;    

    }
       
    private void verif_dat_neces(){
        if (cod_doc_ent==0 ){
            JOptionPane.showMessageDialog(this, "Debe de seleccionar al documento entregado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            cmb_doc_entreg.requestFocus(); 
            dat_nec=0;
        }else{
            if ("".equals(txt_caj_num_doc.getText()) ){
                JOptionPane.showMessageDialog(this, "Debe de ingresar em número del documento entregado", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                txt_caj_num_doc.requestFocus();             
                dat_nec=0;
            }  
        }
    }
        
        
    private void txt_caj_ape_nomKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ape_nomKeyPressed
      
    }//GEN-LAST:event_txt_caj_ape_nomKeyPressed

    private void txt_caj_val_cancKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_val_cancKeyPressed

    }//GEN-LAST:event_txt_caj_val_cancKeyPressed

    private void txt_f_pagoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_f_pagoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_f_pagoActionPerformed

    private void txt_cta_x_cobActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_cta_x_cobActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_cta_x_cobActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_caja_reverso=null;
    }//GEN-LAST:event_formInternalFrameClosed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_caj_bus_doc;
    private javax.swing.JButton btn_caj_guardar;
    private javax.swing.JButton btn_caj_lim;
    private javax.swing.JButton btn_caj_salir;
    private javax.swing.JComboBox<String> cmb_doc_entreg;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_10;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_8;
    private javax.swing.JPanel pnl_datos_alumno;
    private javax.swing.JTextField txt_caj_ape_nom;
    private javax.swing.JTextField txt_caj_ced_est;
    private javax.swing.JTextField txt_caj_num_doc;
    private javax.swing.JTextField txt_caj_val_canc;
    private javax.swing.JTextField txt_cta_x_cob;
    private javax.swing.JTextField txt_f_pago;
    // End of variables declaration//GEN-END:variables
}
