
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_caja_ingreso extends javax.swing.JInternalFrame {
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
//Para validaciones varias  
    public int conf=0       ,   oper=0      ,   grabado=0   ;
    public int dat_nec=0    ,   cant=17      ;
    public String sql="";
//Para trabajar con fechas    
    public Date f_actual = new Date();
    public SimpleDateFormat formatofecha1 = new SimpleDateFormat("dd/MM/yyyy");
    public SimpleDateFormat formatofecha2 = new SimpleDateFormat("yyyy-MM-dd");
    public String  fec_sel="" ;
    public String fec_act1="" , fec_act2="";
    public int comp_fec = 0;
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_caja_ingreso() {
        initComponents();
        this.setTitle("Ingresar Pagos");
        vl.logo_jif(this,cant);
        formato_objet();
        habil_panel(false);
        llen_cmb_transaccion();
        llen_cmb_f_pago();
        lllen_cmb_doc_entreg();
        color_campos_oblig();
        fec_act1 = formatofecha1.format(f_actual);
        fec_act2 = formatofecha2.format(f_actual);
        txt_mat_fecha.setText(fec_act1); 
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_caj_lim = new javax.swing.JButton();
        btn_caj_guardar = new javax.swing.JButton();
        btn_caj_salir = new javax.swing.JButton();
        pnl_datos_alumno = new javax.swing.JPanel();
        lbl_3 = new javax.swing.JLabel();
        txt_caj_ced_est = new javax.swing.JTextField();
        btn_caj_bus_ced_est = new javax.swing.JButton();
        lbl_4 = new javax.swing.JLabel();
        txt_caj_ape_nom = new javax.swing.JTextField();
        lbl_11 = new javax.swing.JLabel();
        txt_mat_fecha = new javax.swing.JTextField();
        jPanel1 = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        cmb_doc_entreg = new javax.swing.JComboBox<>();
        lbl_2 = new javax.swing.JLabel();
        txt_caj_num_doc = new javax.swing.JTextField();
        jPanel2 = new javax.swing.JPanel();
        lbl_5 = new javax.swing.JLabel();
        lbl_6 = new javax.swing.JLabel();
        cmb_f_pago = new javax.swing.JComboBox<>();
        cmb_transaccion = new javax.swing.JComboBox<>();
        lbl_7 = new javax.swing.JLabel();
        lbl_8 = new javax.swing.JLabel();
        lbl_10 = new javax.swing.JLabel();
        txt_caj_val_canc = new javax.swing.JTextField();
        txt_caj_cant = new javax.swing.JTextField();
        lbl_9 = new javax.swing.JLabel();

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

        pnl_datos_alumno.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_3.setText("Cedula:");

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

        btn_caj_bus_ced_est.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_caj_bus_ced_est.setToolTipText("Buscar Usuario");
        btn_caj_bus_ced_est.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_caj_bus_ced_estActionPerformed(evt);
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

        lbl_11.setText("Fecha:");

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

        javax.swing.GroupLayout pnl_datos_alumnoLayout = new javax.swing.GroupLayout(pnl_datos_alumno);
        pnl_datos_alumno.setLayout(pnl_datos_alumnoLayout);
        pnl_datos_alumnoLayout.setHorizontalGroup(
            pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_4)
                    .addComponent(lbl_3))
                .addGap(27, 27, 27)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                        .addComponent(txt_caj_ced_est, javax.swing.GroupLayout.PREFERRED_SIZE, 107, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_caj_bus_ced_est, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(lbl_11)
                        .addGap(31, 31, 31)
                        .addComponent(txt_mat_fecha, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                        .addGap(1, 1, 1)
                        .addComponent(txt_caj_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, 350, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(26, Short.MAX_VALUE))
        );
        pnl_datos_alumnoLayout.setVerticalGroup(
            pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_datos_alumnoLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_caj_ced_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_3))
                    .addComponent(btn_caj_bus_ced_est)
                    .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(lbl_11)
                        .addComponent(txt_mat_fecha, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_datos_alumnoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txt_caj_ape_nom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_4))
                .addContainerGap(14, Short.MAX_VALUE))
        );

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

        txt_caj_num_doc.setEditable(false);
        txt_caj_num_doc.setBackground(new java.awt.Color(255, 255, 255));
        txt_caj_num_doc.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_num_docKeyPressed(evt);
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
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(8, 8, 8)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_1)
                    .addComponent(cmb_doc_entreg, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_2)
                    .addComponent(txt_caj_num_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(16, Short.MAX_VALUE))
        );

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Datos de la Recaudación", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_5.setText("Recaudación:");

        lbl_6.setText("Forma de Pago");

        cmb_f_pago.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_f_pagoItemStateChanged(evt);
            }
        });
        cmb_f_pago.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_f_pagoActionPerformed(evt);
            }
        });

        cmb_transaccion.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_transaccionItemStateChanged(evt);
            }
        });
        cmb_transaccion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_transaccionActionPerformed(evt);
            }
        });

        lbl_7.setText("Valor a Cancelar");

        lbl_8.setText("Valor Cancelado");

        lbl_10.setText("$");

        txt_caj_val_canc.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_caj_val_cancKeyPressed(evt);
            }
        });

        txt_caj_cant.setEditable(false);
        txt_caj_cant.setBackground(new java.awt.Color(255, 255, 255));
        txt_caj_cant.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        txt_caj_cant.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_caj_cantActionPerformed(evt);
            }
        });

        lbl_9.setText("$");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_5)
                    .addComponent(lbl_6))
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(cmb_transaccion, javax.swing.GroupLayout.PREFERRED_SIZE, 130, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cmb_f_pago, javax.swing.GroupLayout.PREFERRED_SIZE, 130, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(lbl_7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lbl_8, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(lbl_9)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txt_caj_cant, javax.swing.GroupLayout.PREFERRED_SIZE, 65, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGap(1, 1, 1)
                        .addComponent(lbl_10)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txt_caj_val_canc, javax.swing.GroupLayout.PREFERRED_SIZE, 65, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txt_caj_cant, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_9))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(lbl_8)
                            .addComponent(txt_caj_val_canc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_10)))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(cmb_transaccion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(lbl_7)
                            .addComponent(lbl_5))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_6)
                            .addComponent(cmb_f_pago, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(pnl_datos_alumno, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel2, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(186, 186, 186))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(pnl_datos_alumno, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 10, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_caj_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_limActionPerformed
        limpiar();
    }//GEN-LAST:event_btn_caj_limActionPerformed

    private void limpiar(){
        //oper=0;
        String lmp="";
        btn_caj_guardar.setEnabled(false); 
        txt_caj_ced_est.setText(lmp);
        txt_caj_ape_nom.setText(lmp);
        txt_caj_val_canc.setText(lmp);
        txt_caj_cant.setText(lmp);
        txt_caj_num_doc.setText(lmp);        
        cod_alu=0;
    }
    
    private void btn_caj_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_guardarActionPerformed
        //if (oper==1){
            dat_nec=1;
            verif_dat_neces();
            if (dat_nec==1){
                num_doc_ent=txt_caj_num_doc.getText();
                val_canc=Double.parseDouble(txt_caj_val_canc.getText())  ;
//Valido si ya se ingreso el numero del documento                
                CRUD c = new CRUD();
                sql= "SELECT id FROM caja \n" +
                    " WHERE id_doc_entreg = '"+cod_doc_ent+"' \n" +
                    " AND n_doc_entreg= '"+num_doc_ent+"'";
                ResultSet rs = c.select(sql);
                try {
                    if (rs.next()!= false){
                        JOptionPane.showMessageDialog(this, "El documento o su número ya existe en el sistema, seleccione otro documento ", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        cmb_doc_entreg.requestFocus();
                    }else{
                        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del Pago?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                        if (conf==0){
                            CRUD_Caja caja = new CRUD_Caja();
                            grabado= caja.agre_pago(cod_matri,cod_trans,cod_f_pago,val_canc,cod_doc_ent,num_doc_ent,fec_act2) ;
                            if(grabado==2){
                                JOptionPane.showMessageDialog(this, "Los datos del Pago no se pudieron guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                            }else{
                                //CRUD_matricula matri = new CRUD_matricula();
                                sald_nue=saldo_ant-val_canc;
                                if(sald_nue==0){
                                    cance="S";
                                }else{
                                    cance="N";
                                }
                                grabado = caja.agre_pag_pnd_act(cod_pago, cod_matri, cod_trans, sald_nue, cance);
                                if(grabado ==2){
                                    JOptionPane.showMessageDialog(this, "Los datos del Pago no se pudieron guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                                }else{
                                    JOptionPane.showMessageDialog(this, "Los datos del Pago se pudieron guardar en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                                    btn_caj_guardar.setEnabled(true); 
                                    txt_caj_val_canc.setText("");
                                    txt_caj_cant.setText("");
                                    txt_caj_num_doc.setText("");
                                    bus_pagos(cod_alu);
                                }
                            }
                        }
                    }
                } catch (SQLException ex) {
                    Logger.getLogger(frm_caja_ingreso.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
       // }
    }//GEN-LAST:event_btn_caj_guardarActionPerformed

    private void btn_caj_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_salirActionPerformed
        frm_principal.v_caja_ingreso=null;
        this.dispose();
    }//GEN-LAST:event_btn_caj_salirActionPerformed

    private void txt_caj_ced_estActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_caj_ced_estActionPerformed

    }//GEN-LAST:event_txt_caj_ced_estActionPerformed

    private void txt_caj_ced_estKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ced_estKeyPressed

    }//GEN-LAST:event_txt_caj_ced_estKeyPressed

    private void txt_caj_ced_estKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ced_estKeyTyped
        cant = txt_caj_ced_est.getText().length();
        if (cant>= 0 && cant<10 ) vl.Solo_Numeros(evt);
        if (cant == 10) {
            vl.max_carateres_txt(txt_caj_ced_est,cant,evt);
        }
    }//GEN-LAST:event_txt_caj_ced_estKeyTyped

    private void btn_caj_bus_ced_estActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_caj_bus_ced_estActionPerformed
        if (txt_caj_ced_est.getText().length()==10 ){
            dat_nec=1;
            a_ced=txt_caj_ced_est.getText();
            dat_nec=vl.verif_cedula(a_ced, txt_caj_ced_est);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_caj_ced_est.requestFocus();
            }
            if (dat_nec==1){
                bus_est(a_ced);
            }
        }else{
            if(frm_principal.v_busc_estud==null && frm_principal.v_busc_emple==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_estud = new frm_buscar_estudiante();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_estud);
                frm_principal.v_busc_estud.formul=3;      
            }else{
                frm_principal.enfocar_ventana();  
            }  
        }

    }//GEN-LAST:event_btn_caj_bus_ced_estActionPerformed

    private void txt_caj_ape_nomKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_ape_nomKeyPressed
        
    }//GEN-LAST:event_txt_caj_ape_nomKeyPressed

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

    private void cmb_f_pagoItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_f_pagoItemStateChanged
        if(evt.getSource()==cmb_f_pago){
            f_pago=(String)cmb_f_pago.getSelectedItem();
            CRUD y = new CRUD();
            sql="SELECT id FROM forma_pago WHERE forma_pago = '" + f_pago + "'";
            ResultSet rs = y.select(sql);
            try {
                if (rs.next()== false){
                    JOptionPane.showMessageDialog(this, "No se han imgresados Formas d Pagos en el sistema", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                }else{
                    cod_f_pago= Integer.parseInt(rs.getString(1));

                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_caja_ingreso.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }//GEN-LAST:event_cmb_f_pagoItemStateChanged

    private void cmb_f_pagoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_f_pagoActionPerformed

    }//GEN-LAST:event_cmb_f_pagoActionPerformed

    private void cmb_transaccionItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_transaccionItemStateChanged
        if(evt.getSource()==cmb_transaccion){
            if (oper>0){
                String slc=(String)cmb_transaccion.getSelectedItem();
            }
        }
    }//GEN-LAST:event_cmb_transaccionItemStateChanged

    private void cmb_transaccionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_transaccionActionPerformed
        if (oper>0){
            String slc=(String)cmb_transaccion.getSelectedItem();
        }
    }//GEN-LAST:event_cmb_transaccionActionPerformed

    private void txt_caj_val_cancKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_caj_val_cancKeyPressed

    }//GEN-LAST:event_txt_caj_val_cancKeyPressed

    private void txt_caj_cantActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_caj_cantActionPerformed

    }//GEN-LAST:event_txt_caj_cantActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_caja_ingreso=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void txt_mat_fechaKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyPressed

    }//GEN-LAST:event_txt_mat_fechaKeyPressed

    private void txt_mat_fechaKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyReleased

    }//GEN-LAST:event_txt_mat_fechaKeyReleased

    private void txt_mat_fechaKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_mat_fechaKeyTyped
   
    }//GEN-LAST:event_txt_mat_fechaKeyTyped

    private void verif_dat_neces(){
        if (cod_alu==0 ){
            JOptionPane.showMessageDialog(this, "Debe de seleccionar al estudiante", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            btn_caj_bus_ced_est.requestFocus();             
            dat_nec=0;
        }else{
            if ("".equals(txt_caj_num_doc.getText()) ){
                JOptionPane.showMessageDialog(this, "Debe de ingresar em número del documento", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
                txt_caj_num_doc.requestFocus();             
                dat_nec=0;
            }else{            
                if (cod_f_pago==0 ){
                    JOptionPane.showMessageDialog(this, "Debe de seleccionar la forma de pago", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    cmb_f_pago.requestFocus();             
                    dat_nec=0; 
                }else{
                    if ("".equals(txt_caj_val_canc.getText()) ){
                        JOptionPane.showMessageDialog(this, "Debe de ingresar el valor a cancelar", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        txt_caj_val_canc.requestFocus();             
                        dat_nec=0; 
                    }else{
                        saldo_ant=Double.parseDouble(txt_caj_cant.getText());
                        val_canc=Double.parseDouble(txt_caj_val_canc.getText());
                        if(val_canc>saldo_ant){
                            JOptionPane.showMessageDialog(this, "El valor a cancelar es mayoy al saldo pendiente", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                            txt_caj_val_canc.requestFocus();             
                            dat_nec=0; 
                        }/*else{
                            Date fecha_ini = jdc_fec.getDate();
                            long d = fecha_ini.getTime();
                            java.sql.Date f_ini = new java.sql.Date(d);
                            fec_sel= f_ini.toString()  ;
                            comp_fec = fec_sel.compareTo(fec_act);
                            if(comp_fec == 1){
                                JOptionPane.showMessageDialog(this, "La fecha seleccionada es mayor a la fecha actual", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                                jdc_fec.requestFocus();
                                dat_nec=0;
                            }
                        }*/
                                
                    }
                }
            }         
        }
    }
    
    public void bus_pagos(int id_est) throws SQLException{
        CRUD b_est = new CRUD();
        a_est="A";
        sql=" SELECT t.transaccion,p.valor,p.saldo,t.id AS cod_trans, \n" +
            " p.id AS cod_pago,m.id AS cod_mat \n" +
            " FROM matricula AS m INNER JOIN pag_pend  AS p ON m.id=p.id_matricula\n" +
            " INNER JOIN transaccion AS t  ON p.id_transaccion=t.id\n" +
            " WHERE  m.id_alumno='"+id_est+"' AND p.cancelado='N'\n" +
            " AND m.est_reg= 'A'";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){ 
                cod_pago=rs.getInt("cod_pago");
                cmb_transaccion.removeAllItems();
                cmb_transaccion.addItem(rs.getString("transaccion")); 
                txt_caj_cant.setText(String.valueOf(rs.getDouble("saldo")));
                cod_matri =rs.getInt("cod_mat");
                cod_trans=rs.getInt("cod_trans");
            }      
    }
    
    
    
    public void bus_est(String cd_est){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id,cedula,apellidos,nombres \n" +
                " FROM alumno WHERE cedula = '" + cd_est + "' \n" +
                " AND est_reg= '" + a_est + "' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_alu=rs.getInt("id");
                a_ced = rs.getString("cedula") ;
                txt_caj_ced_est.setText(a_ced);
                nom_alu= rs.getString("apellidos") + " " + rs.getString("nombres");
                txt_caj_ape_nom.setText(nom_alu);
                txt_caj_ape_nom.setEditable(false); 
                btn_caj_guardar.setEnabled(true);
                habil_panel(true);
                bloquear_obj(true);
                bus_pagos(cod_alu);
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_caja_ingreso.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    private void llen_cmb_transaccion(){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT transaccion FROM transaccion " +
                                        "WHERE est_reg = 'A' "); 
                if (rs.next()== false){
                    
                }else{                                           
                    do{ cmb_transaccion.addItem(rs.getString(1));                                               
                      }while(rs.next());                                                       
                }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    private void llen_cmb_f_pago(){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT forma_pago FROM forma_pago " +
                                        "WHERE est_reg = 'A' "); 
                if (rs.next()== false){
                    
                }else{                                           
                    do{ cmb_f_pago.addItem(rs.getString(1));                                               
                      }while(rs.next());                                                       
                }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    private void lllen_cmb_doc_entreg(){
        cmb_doc_entreg.addItem("Recibo");
        cmb_doc_entreg.addItem("Factura");
        cod_doc_ent=1;
    }
    private void habil_panel(boolean hab){
        txt_caj_ced_est.setEnabled(hab);
        txt_caj_ape_nom.setEnabled(hab);
        cmb_transaccion.setEnabled(hab);
        cmb_f_pago.setEnabled(hab);
        cmb_doc_entreg.setEnabled(hab);
        txt_caj_val_canc.setEnabled(hab);
        txt_caj_num_doc.setEnabled(hab);
    }
        private void bloquear_obj(boolean hab){
        txt_caj_num_doc.setEditable(hab);
        txt_caj_val_canc.setEditable(hab);
        btn_caj_bus_ced_est.setEnabled(hab);
        cmb_doc_entreg.setEnabled(hab);
        cmb_transaccion.setEnabled(hab);
        cmb_f_pago.setEnabled(hab);                
    }

    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4,lbl_5);
        fg.form_etiq5(lbl_6, lbl_7, lbl_8, lbl_9,lbl_10); 
        fg.form_etiq1(lbl_11);
        fg.formato_texto4(txt_caj_num_doc, txt_caj_ced_est, txt_caj_ape_nom, txt_caj_val_canc);  
        fg.formato_combo3(cmb_doc_entreg, cmb_transaccion, cmb_f_pago); 
    }
    
    private void color_campos_oblig (){
        txt_caj_ced_est.setBackground(vl.ama);    
        txt_caj_ape_nom.setBackground(vl.ama); 
        txt_caj_num_doc.setBackground(vl.ama); 
        txt_caj_val_canc.setBackground(vl.ama);     
    }   
    
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_caj_bus_ced_est;
    private javax.swing.JButton btn_caj_guardar;
    private javax.swing.JButton btn_caj_lim;
    private javax.swing.JButton btn_caj_salir;
    private javax.swing.JComboBox<String> cmb_doc_entreg;
    private javax.swing.JComboBox<String> cmb_f_pago;
    private javax.swing.JComboBox<String> cmb_transaccion;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_10;
    private javax.swing.JLabel lbl_11;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_7;
    private javax.swing.JLabel lbl_8;
    private javax.swing.JLabel lbl_9;
    private javax.swing.JPanel pnl_datos_alumno;
    private javax.swing.JTextField txt_caj_ape_nom;
    private javax.swing.JTextField txt_caj_cant;
    private javax.swing.JTextField txt_caj_ced_est;
    private javax.swing.JTextField txt_caj_num_doc;
    private javax.swing.JTextField txt_caj_val_canc;
    private javax.swing.JTextField txt_mat_fecha;
    // End of variables declaration//GEN-END:variables
}
