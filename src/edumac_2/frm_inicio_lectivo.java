
package edumac_2;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

public class frm_inicio_lectivo extends javax.swing.JInternalFrame {
//Para mes inicial y final
    public int mes_fin=0        ,   mes_ini=0       ;
    public String mes_sel="";
//Para validaciones varias  
    public int conf=0           ,   oper=0          ,   grabado=0       ;
    public int dat_nec=0        ,   il_cant=14          ;
//Para modificar o eliminar 
    public int cod_ini_lect=1;
//Para este formulario
    public int cod_per_sel=0    ,   cant_mes=0      ,   cod_ini_selec=0 ;
    public String    sql=""     ,   sel_periodo=""                      ;
    public double v_matri=0      ,   v_mensu=0                          ;
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_inicio_lectivo() {
        initComponents();
        this.setTitle("Inicio Año Lectivo");//Titulo formulario
        vl.logo_jif(this,il_cant);
        formato_objet();
        llenar_combo_periodo();
        llenar_combo_mes_ini();
        color_campos_oblig();
        //bloquear_obj(false);
        txt_mes_fin.setEditable(false);  
        bus_dat_peri_sel(cod_per_sel);

    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_ini_año_lim = new javax.swing.JButton();
        btn_ini_año_guardar = new javax.swing.JButton();
        btn_ini_año_salir = new javax.swing.JButton();
        pnl_inicio_lectivo = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        lbl_2 = new javax.swing.JLabel();
        lbl_8 = new javax.swing.JLabel();
        lbl_4 = new javax.swing.JLabel();
        txt_mes_fin = new javax.swing.JTextField();
        txt_cant_mes = new javax.swing.JTextField();
        txt_v_matric = new javax.swing.JTextField();
        lbl_5 = new javax.swing.JLabel();
        cmb_periodo = new javax.swing.JComboBox<>();
        btn_bus_ini_lect = new javax.swing.JButton();
        lbl_6 = new javax.swing.JLabel();
        lbl_3 = new javax.swing.JLabel();
        cmb_mes_ini = new javax.swing.JComboBox<>();
        txt_v_mens = new javax.swing.JTextField();
        lbl_7 = new javax.swing.JLabel();

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

        btn_ini_año_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_ini_año_lim.setText("Limpiar");
        btn_ini_año_lim.setToolTipText("Limpiar Formulario");
        btn_ini_año_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_ini_año_lim.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_lim.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_lim.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_ini_año_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_ini_año_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_ini_año_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_ini_año_lim);

        btn_ini_año_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_ini_año_guardar.setText("Guardar");
        btn_ini_año_guardar.setToolTipText("Guardar");
        btn_ini_año_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_ini_año_guardar.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_guardar.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_guardar.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_ini_año_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_ini_año_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_ini_año_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_ini_año_guardar);

        btn_ini_año_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Salir.png"))); // NOI18N
        btn_ini_año_salir.setText("Salir");
        btn_ini_año_salir.setToolTipText("Salir");
        btn_ini_año_salir.setFocusable(false);
        btn_ini_año_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_ini_año_salir.setMaximumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_salir.setMinimumSize(new java.awt.Dimension(59, 57));
        btn_ini_año_salir.setPreferredSize(new java.awt.Dimension(59, 57));
        btn_ini_año_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_ini_año_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_ini_año_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_ini_año_salir);

        pnl_inicio_lectivo.setBorder(javax.swing.BorderFactory.createTitledBorder(javax.swing.BorderFactory.createEtchedBorder(), "Datos del Inicio Lectivo", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_1.setText("Periodo");

        lbl_2.setText("Valor Matricula");

        lbl_8.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_8.setText("Cantidad de Meses");

        lbl_4.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_4.setText("Mes de Fin Actividades");

        txt_mes_fin.setHorizontalAlignment(javax.swing.JTextField.RIGHT);

        txt_cant_mes.setHorizontalAlignment(javax.swing.JTextField.RIGHT);
        txt_cant_mes.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_cant_mesActionPerformed(evt);
            }
        });
        txt_cant_mes.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_cant_mesKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_cant_mesKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_cant_mesKeyTyped(evt);
            }
        });

        txt_v_matric.setHorizontalAlignment(javax.swing.JTextField.RIGHT);
        txt_v_matric.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_v_matricKeyTyped(evt);
            }
        });

        lbl_5.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_5.setText("$");

        cmb_periodo.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_periodoItemStateChanged(evt);
            }
        });
        cmb_periodo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_periodoActionPerformed(evt);
            }
        });

        btn_bus_ini_lect.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_ini_lect.setToolTipText("Buscar");
        btn_bus_ini_lect.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_ini_lectActionPerformed(evt);
            }
        });

        lbl_6.setText("Valor Mensualidad");

        lbl_3.setText("Mes de Inicio Actividades");

        cmb_mes_ini.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_mes_iniItemStateChanged(evt);
            }
        });
        cmb_mes_ini.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                cmb_mes_iniMouseClicked(evt);
            }
        });
        cmb_mes_ini.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_mes_iniActionPerformed(evt);
            }
        });

        txt_v_mens.setHorizontalAlignment(javax.swing.JTextField.RIGHT);
        txt_v_mens.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_v_mensKeyTyped(evt);
            }
        });

        lbl_7.setFont(new java.awt.Font("Arial", 1, 12)); // NOI18N
        lbl_7.setText("$");

        javax.swing.GroupLayout pnl_inicio_lectivoLayout = new javax.swing.GroupLayout(pnl_inicio_lectivo);
        pnl_inicio_lectivo.setLayout(pnl_inicio_lectivoLayout);
        pnl_inicio_lectivoLayout.setHorizontalGroup(
            pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                        .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(lbl_8)
                            .addComponent(lbl_3)
                            .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(lbl_2)
                                    .addComponent(lbl_6))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(lbl_7)
                                    .addComponent(lbl_5, javax.swing.GroupLayout.Alignment.TRAILING)))
                            .addComponent(lbl_1))
                        .addGap(10, 10, 10))
                    .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                        .addComponent(lbl_4)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 22, Short.MAX_VALUE)))
                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(txt_cant_mes, javax.swing.GroupLayout.PREFERRED_SIZE, 35, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                        .addComponent(cmb_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, 145, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_bus_ini_lect, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(txt_mes_fin, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cmb_mes_ini, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                        .addComponent(txt_v_mens, javax.swing.GroupLayout.Alignment.LEADING)
                        .addComponent(txt_v_matric, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 55, Short.MAX_VALUE)))
                .addContainerGap(29, Short.MAX_VALUE))
        );
        pnl_inicio_lectivoLayout.setVerticalGroup(
            pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addComponent(lbl_1)
                .addGap(12, 12, 12)
                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_5)
                    .addComponent(lbl_2, javax.swing.GroupLayout.PREFERRED_SIZE, 14, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_7)
                    .addComponent(lbl_6))
                .addGap(16, 16, 16)
                .addComponent(lbl_8)
                .addGap(18, 18, 18)
                .addComponent(lbl_3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(lbl_4)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, pnl_inicio_lectivoLayout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(btn_bus_ini_lect)
                    .addGroup(pnl_inicio_lectivoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                        .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                            .addComponent(txt_v_matric, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(txt_v_mens, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(8, 8, 8)
                            .addComponent(txt_cant_mes, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(10, 10, 10)
                            .addComponent(cmb_mes_ini, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(txt_mes_fin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGroup(pnl_inicio_lectivoLayout.createSequentialGroup()
                            .addComponent(cmb_periodo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(151, 151, 151))))
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, 382, Short.MAX_VALUE)
            .addComponent(pnl_inicio_lectivo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_inicio_lectivo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_ini_año_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_ini_año_limActionPerformed
        limpiar();       
    }//GEN-LAST:event_btn_ini_año_limActionPerformed

    private void btn_ini_año_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_ini_año_guardarActionPerformed
        dat_nec=1;
        verif_dat_neces();
        if (dat_nec==1){
            //String estad= "A";
            capt_datos();
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos del Nuevo Año Lectivo?\n"+
                                                       "Puede haber valores pendientes por cobrar","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                CRUD_Inicio_Lectivo act_lec_mod = new CRUD_Inicio_Lectivo();
                grabado = act_lec_mod.act_ini_lec(v_matri, v_mensu, cod_per_sel, mes_ini, cant_mes, mes_fin, cod_ini_lect);
                if(grabado == 0){
                    JOptionPane.showMessageDialog(this, "Los datos del Nuevo Año Lectrivo se guardaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                }else{
                    JOptionPane.showMessageDialog(this, "Los datos del Nuevo Año Lectrivo no se pudieron guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                }
             }
        }
    }//GEN-LAST:event_btn_ini_año_guardarActionPerformed

    private void btn_ini_año_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_ini_año_salirActionPerformed
        frm_principal.v_ini_lect=null;
        this.dispose();
    }//GEN-LAST:event_btn_ini_año_salirActionPerformed

    private void txt_cant_mesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_cant_mesActionPerformed

    }//GEN-LAST:event_txt_cant_mesActionPerformed

    private void txt_cant_mesKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_cant_mesKeyTyped
        il_cant = txt_cant_mes.getText().length();
        if (il_cant>= 0 && il_cant < 2 ) vl.Solo_Numeros(evt);
        if (il_cant == 2) vl.max_carateres_txt(txt_cant_mes,il_cant,evt);
    }//GEN-LAST:event_txt_cant_mesKeyTyped

    private void cmb_periodoItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_periodoItemStateChanged
        String slc=(String)cmb_periodo.getSelectedItem();
        bus_periodo(slc);
    }//GEN-LAST:event_cmb_periodoItemStateChanged

    private void cmb_periodoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_periodoActionPerformed
        String slc=(String)cmb_periodo.getSelectedItem();
        bus_periodo(slc);
 
    }//GEN-LAST:event_cmb_periodoActionPerformed

    private void btn_bus_ini_lectActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_ini_lectActionPerformed
        //if (cod_per_sel>0 ){
            bus_dat_peri_sel(cod_per_sel);
       /* }else{
            JOptionPane.showMessageDialog(this, "Debe de seleccionar un periodo", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
            cmb_periodo.requestFocus();
        }*/
    }//GEN-LAST:event_btn_bus_ini_lectActionPerformed

    private void cmb_mes_iniItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_mes_iniItemStateChanged
        String slc=(String)cmb_mes_ini.getSelectedItem();
        if("Enero".equals(slc))     mes_ini =1;
        if("Febrero".equals(slc))   mes_ini =2;
        if("Marzo".equals(slc))     mes_ini =3;
        if("Abril".equals(slc))     mes_ini =4;
        if("Mayo".equals(slc))      mes_ini =5;
        if("Junio".equals(slc))     mes_ini =6;
        if("Julio".equals(slc))     mes_ini =7;
        if("Agosto".equals(slc))    mes_ini =8;
        if("Septiembre".equals(slc))mes_ini =9;
        if("Octubre".equals(slc))   mes_ini =10;
        if("Noviembre".equals(slc)) mes_ini =11;
        if("Diciembre".equals(slc)) mes_ini =12;
        if(mes_ini>0){
            if(txt_cant_mes.getText().length()>0){
                cant_mes= Integer.parseInt(txt_cant_mes.getText());
                sacar_mes_fin();
            }
        }
    }//GEN-LAST:event_cmb_mes_iniItemStateChanged

        private void bus_periodo(String prd_sel){
        try {
            CRUD c7 = new CRUD();
            sql="SELECT id FROM periodo \n" +
                "WHERE periodo = '" + prd_sel + "' AND est_reg = 'A'";
            ResultSet rs = c7.select(sql);
            if (rs.next()!= false){ 
                cod_per_sel= rs.getInt("id");  
              
            }
         } catch (SQLException ex) {
            Logger.getLogger(frm_inicio_lectivo.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    private void bus_dat_peri_sel(int cod_prd_sel){
        try {
            CRUD c7 = new CRUD();
            sql="SELECT id,val_matri,val_mensu,mes_ini,cant_mes,mes_fin  \n" +
                "FROM inicio_lectivo \n" +
                "WHERE id_periodo = '" + cod_prd_sel + "' AND est_reg = 'A'";
            ResultSet rs = c7.select(sql);
            if (rs.next()!= false){ 
                cod_ini_lect= rs.getInt("id");                
                txt_v_matric.setText(Double.toString(rs.getDouble("val_matri")));
                txt_v_mens.setText(Double.toString(rs.getDouble("val_mensu")));
                cmb_mes_ini.setSelectedItem(sacar_mes(rs.getInt("mes_ini")));
                txt_cant_mes.setText(String.valueOf(rs.getInt("cant_mes")));
                txt_mes_fin.setText(sacar_mes(rs.getInt("mes_fin")));                              
                //bloquear_obj(true);
            }else{
                JOptionPane.showMessageDialog(this, "No hay regisdtros del periodo seleccionado", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                limpiar();
                //bloquear_obj(false);
            }
                
         } catch (SQLException ex) {
            Logger.getLogger(frm_inicio_lectivo.class.getName()).log(Level.SEVERE, null, ex);
        }        
    }
    
    private void sacar_mes_fin(){
        mes_fin = mes_ini+ (cant_mes-1);
        if(mes_fin>12) mes_fin= mes_fin-12;
            switch (mes_fin){
            case 1:     txt_mes_fin.setText("Enero");       break;
            case 2:     txt_mes_fin.setText("Febrero");     break;
            case 3:     txt_mes_fin.setText("Marzo");       break;
            case 4:     txt_mes_fin.setText("Abril");       break;
            case 5:     txt_mes_fin.setText("Mayo");        break;
            case 6:     txt_mes_fin.setText("Junio");       break;
            case 7:     txt_mes_fin.setText("Julio");       break;
            case 8:     txt_mes_fin.setText("Agosto");      break;
            case 9:     txt_mes_fin.setText("Septiembre");  break;
            case 10:    txt_mes_fin.setText("Octubre");     break;
            case 11:    txt_mes_fin.setText("Noviembre");   break;
            case 12:    txt_mes_fin.setText("Diciembre");   break;
            }         
    }
    private String sacar_mes(int m_ini){

            switch (m_ini){
            case 1:     mes_sel =   "Enero";        break;
            case 2:     mes_sel =   "Febrero";      break;
            case 3:     mes_sel =   "Marzo";        break;
            case 4:     mes_sel =   "Abril";        break;
            case 5:     mes_sel =   "Mayo";         break;
            case 6:     mes_sel =   "Junio";        break;
            case 7:     mes_sel =   "Julio";        break;
            case 8:     mes_sel =   "Agosto";       break;
            case 9:     mes_sel =   "Septiembre";   break;
            case 10:    mes_sel =   "Octubre";      break;
            case 11:    mes_sel =   "Noviembre";    break;
            case 12:    mes_sel =   "Diciembre";    break;
            }         
        return mes_sel;
    }
    
    private void color_campos_oblig (){
        txt_v_matric.setBackground(vl.ama);    
        txt_v_mens.setBackground(vl.ama); 
        txt_cant_mes.setBackground(vl.ama); 

    }
    
    private void capt_datos(){
        v_matri =Double.parseDouble(txt_v_matric.getText());
        v_mensu =Double.parseDouble(txt_v_mens.getText());
        il_cant =Integer.parseInt(txt_cant_mes.getText());  
    }
    
    private void llenar_combo_mes_ini(){
        cmb_mes_ini.addItem("Enero");
        cmb_mes_ini.addItem("Febrero");
        cmb_mes_ini.addItem("Marzo");
        cmb_mes_ini.addItem("Abril");
        cmb_mes_ini.addItem("Mayo");
        cmb_mes_ini.addItem("Junio");
        cmb_mes_ini.addItem("Julio");
        cmb_mes_ini.addItem("Agosto");
        cmb_mes_ini.addItem("Septiembre");
        cmb_mes_ini.addItem("Octubre");
        cmb_mes_ini.addItem("Noviembre");
        cmb_mes_ini.addItem("Diciembre");     
    }
    
    private void llenar_combo_periodo(){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT periodo FROM periodo " +
                                        "WHERE est_reg = 'A' "); 
                if (rs.next()== false){
                    
                }else{                                           
                    do{ cmb_periodo.addItem(rs.getString(1));                                               
                      }while(rs.next());                                                       
                }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    
    private void bloquear_obj(boolean hab){
        txt_v_matric.setEditable(hab);
        txt_v_mens.setEditable(hab);
        txt_cant_mes.setEditable(hab);
        cmb_mes_ini.setEnabled(hab);
        //cmb_periodo.setEnabled(hab);
    }
    
       private void limpiar(){
        String limp ="";
        txt_v_matric.setText(limp);
        txt_v_mens.setText(limp);
        txt_cant_mes.setText(limp); 
        txt_mes_fin.setText(limp); 
    }
  
    private void formato_objet(){
        fg.form_etiq5(lbl_1, lbl_2, lbl_3, lbl_4, lbl_5);
        fg.form_etiq3(lbl_6, lbl_7, lbl_8); 
        fg.formato_texto4(txt_v_matric, txt_mes_fin, txt_v_mens, txt_cant_mes);      
    }
       
    private void verif_dat_neces(){
        if (cod_per_sel==0 ){
            JOptionPane.showMessageDialog(this, "Debe seleccionar un periodo", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);           
            cmb_periodo.requestFocus();             
            dat_nec=0;
        }else{
            if (txt_v_matric.getText().length()==0 ){
                JOptionPane.showMessageDialog(this, "Debe ingresar el valor de la matricula", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_v_matric.requestFocus();             
                dat_nec=0;  
            }else{
                if (txt_v_mens.getText().length()==0 ){
                    JOptionPane.showMessageDialog(this, "Debe ingresar el valor de la mensualidad", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                    txt_v_mens.requestFocus();             
                    dat_nec=0; 
                }else{    
                    if (mes_ini==0 ){
                        JOptionPane.showMessageDialog(this, "Debe de seleccionar el mes que inician las actividades", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                        cmb_mes_ini.requestFocus();             
                        dat_nec=0;
                    }else{
                        if (txt_cant_mes.getText().length()==0 ){
                            JOptionPane.showMessageDialog(this, "Debe de ingresar la cantidad de meses", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                            txt_cant_mes.requestFocus();             
                            dat_nec=0;                                                               
                        }
                    }    
                }     
            }
        }
    }   
    
    
    
    private void cmb_mes_iniMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_cmb_mes_iniMouseClicked

    }//GEN-LAST:event_cmb_mes_iniMouseClicked

    private void cmb_mes_iniActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_mes_iniActionPerformed

    }//GEN-LAST:event_cmb_mes_iniActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_ini_lect=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void txt_v_matricKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_v_matricKeyTyped
        il_cant = txt_v_matric.getText().length();
        if (il_cant>= 0 && il_cant < 6 ) vl.Solo_Decimales(evt);
        if (il_cant == 6) vl.max_carateres_txt(txt_v_matric,il_cant,evt);
    }//GEN-LAST:event_txt_v_matricKeyTyped

    private void txt_v_mensKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_v_mensKeyTyped
        il_cant = txt_v_mens.getText().length();
        if (il_cant>= 0 && il_cant < 6 ) vl.Solo_Decimales(evt);
        if (il_cant == 6) vl.max_carateres_txt(txt_v_mens,il_cant,evt);

    }//GEN-LAST:event_txt_v_mensKeyTyped

    private void txt_cant_mesKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_cant_mesKeyPressed
       
    }//GEN-LAST:event_txt_cant_mesKeyPressed

    private void txt_cant_mesKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_cant_mesKeyReleased
        il_cant = txt_cant_mes.getText().length();
        if (il_cant== 0) {
            cmb_mes_ini.setEnabled(false);           
        }else{
            cmb_mes_ini.setEnabled(true);
            cant_mes= Integer.parseInt(txt_cant_mes.getText());
            sacar_mes_fin();
        }
    }//GEN-LAST:event_txt_cant_mesKeyReleased


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_ini_lect;
    private javax.swing.JButton btn_ini_año_guardar;
    private javax.swing.JButton btn_ini_año_lim;
    private javax.swing.JButton btn_ini_año_salir;
    private javax.swing.JComboBox<String> cmb_mes_ini;
    private javax.swing.JComboBox<String> cmb_periodo;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JLabel lbl_5;
    private javax.swing.JLabel lbl_6;
    private javax.swing.JLabel lbl_7;
    private javax.swing.JLabel lbl_8;
    private javax.swing.JPanel pnl_inicio_lectivo;
    private javax.swing.JTextField txt_cant_mes;
    private javax.swing.JTextField txt_mes_fin;
    private javax.swing.JTextField txt_v_matric;
    private javax.swing.JTextField txt_v_mens;
    // End of variables declaration//GEN-END:variables
}
