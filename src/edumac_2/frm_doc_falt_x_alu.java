
package edumac_2;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.DefaultCellEditor;
import javax.swing.JCheckBox;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumn;

public class frm_doc_falt_x_alu extends javax.swing.JInternalFrame {
//Para los datos del estudiante
    public static String    a_ced=""        ;
    public static int       cod_alu_sel=0   ;
    public String           ced_alu_sel ="" ;
    public String           alu_nom=""      ;
//Para craer matricula
    public int              cod_matric=0    ,cod_perio=0    ;
//Para craer documentos  
    public String           doc_entreg=""   ,docu=""        ;
    public int              cnt_dc =0       ,id_doc=0       ;
    public boolean          doc_sel=false   ;
    public int              cant_doc=0      ,cnt_doc_sis=0  ;
//Para validaciones varias
    public int              conf=0          ,grabado=0      ;
    public int              dat_nec=0       ,cant=16         ;
    public String           a_est=""        ,sql=""         ;
    public int              cont =0         ;
//Para el formato de la tabla
    Render classrender = new Render();
    JCheckBox check = new JCheckBox();
    DefaultCellEditor defaultcelleditor = new DefaultCellEditor(check);
    DefaultTableModel tablamodel = new DefaultTableModel();
    
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones();

    public frm_doc_falt_x_alu() {
        initComponents();
        this.setTitle("Documentos que faltan por entregar"); 
        vl.logo_jif(this,cant); 
        formato_objet();       
        color_campos_oblig();
        formato_tabla();
        btn_dfa_guardar.setEnabled(false);
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
        btn_dfa_lim = new javax.swing.JButton();
        btn_dfa_guardar = new javax.swing.JButton();
        btn_dfa_salir = new javax.swing.JButton();
        pnl_dat_est = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JLabel();
        txt_dfa_ced_est_sel = new javax.swing.JTextField();
        btn_dfa_bus_ced_alu = new javax.swing.JButton();
        lbl_2 = new javax.swing.JLabel();
        txt_est_sel = new javax.swing.JTextField();
        jPanel2 = new javax.swing.JPanel();
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

        btn_dfa_lim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Limpiar.png"))); // NOI18N
        btn_dfa_lim.setText("Limpiar");
        btn_dfa_lim.setToolTipText("Limpiar Formulario");
        btn_dfa_lim.setFocusable(false);
        btn_dfa_lim.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_dfa_lim.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_dfa_lim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_dfa_limActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_dfa_lim);

        btn_dfa_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Guardar.png"))); // NOI18N
        btn_dfa_guardar.setText("Guardar");
        btn_dfa_guardar.setToolTipText("Guardar");
        btn_dfa_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_dfa_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_dfa_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_dfa_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_dfa_guardar);

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

        pnl_dat_est.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Información Estudiante", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Arial", 1, 12), new java.awt.Color(0, 153, 153))); // NOI18N

        lbl_1.setText("Cedula:");

        txt_dfa_ced_est_sel.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_dfa_ced_est_selKeyPressed(evt);
            }
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txt_dfa_ced_est_selKeyReleased(evt);
            }
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_dfa_ced_est_selKeyTyped(evt);
            }
        });

        btn_dfa_bus_ced_alu.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_dfa_bus_ced_alu.setToolTipText("Buscar");
        btn_dfa_bus_ced_alu.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_dfa_bus_ced_aluActionPerformed(evt);
            }
        });

        lbl_2.setText("Estudiante");

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

        javax.swing.GroupLayout pnl_dat_estLayout = new javax.swing.GroupLayout(pnl_dat_est);
        pnl_dat_est.setLayout(pnl_dat_estLayout);
        pnl_dat_estLayout.setHorizontalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lbl_2)
                    .addComponent(lbl_1))
                .addGap(18, 18, 18)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pnl_dat_estLayout.createSequentialGroup()
                        .addComponent(txt_dfa_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btn_dfa_bus_ced_alu, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, 342, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(14, Short.MAX_VALUE))
        );
        pnl_dat_estLayout.setVerticalGroup(
            pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_dat_estLayout.createSequentialGroup()
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(btn_dfa_bus_ced_alu)
                    .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txt_dfa_ced_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_1)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(pnl_dat_estLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(lbl_2)
                    .addComponent(txt_est_sel, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jPanel2.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Documentos", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

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

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(chb_todos)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 421, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(chb_todos)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(pnl_dat_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 453, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(pnl_dat_est, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_dfa_limActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_limActionPerformed
        limpiar();
    }//GEN-LAST:event_btn_dfa_limActionPerformed

    private void btn_dfa_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_guardarActionPerformed
        conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos seleccionados en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
        if (conf==0){
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
                    sql=" SELECT id FROM documento \n "+
                    " WHERE documento = '" + docu + "' \n "+
                    " AND est_reg = '" + a_est + "'";
                    ResultSet rs = b_dc.select(sql);
                    if (rs.next()!= false){
                        id_doc=rs.getInt("id");
                        CRUD_Doc_Entreg doc_ntrg = new CRUD_Doc_Entreg();
                        grabado= doc_ntrg.act_doc_entreg(cod_matric,id_doc,doc_entreg);
                        if(grabado ==0){
                            JOptionPane.showMessageDialog(this, "El documento " +docu+ " no se pudo guardar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        }

                    }
                } catch (SQLException ex) {
                    Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
            if(grabado !=0){
                JOptionPane.showMessageDialog(this, "Los Documentos entregados se actualizaron en el sistema","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
                limpiar();
            }
        }
        
    }//GEN-LAST:event_btn_dfa_guardarActionPerformed

    private void btn_dfa_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_salirActionPerformed
        frm_principal.v_doc_fal_x_alu=null;
        this.dispose();
    }//GEN-LAST:event_btn_dfa_salirActionPerformed

    private void txt_dfa_ced_est_selKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_dfa_ced_est_selKeyPressed

    }//GEN-LAST:event_txt_dfa_ced_est_selKeyPressed

    private void txt_dfa_ced_est_selKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_dfa_ced_est_selKeyReleased
        // if (txt_e_cedula.getText().length() == 10 && oper==1) verif_ced_rep();
    }//GEN-LAST:event_txt_dfa_ced_est_selKeyReleased

    private void txt_dfa_ced_est_selKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_dfa_ced_est_selKeyTyped
        //Se obtiene la cantidad de caracteres de JtextField
        cant = txt_dfa_ced_est_sel.getText().length();
        //Si la cantidad es igual o mayor a cero y menor a la cantidad
        //que tiene el campo en la base de datos se debe validar
        //que se ingrese solo números

        if (cant>= 0 && cant<10 ) vl.Solo_Numeros(evt);
        // Si cabtidad del JtextField es igual a la cantidad en la base de datos
        //no permitir que ingrese mas digitos
        if (cant == 10){
            vl.max_carateres_txt(txt_dfa_ced_est_sel,cant,evt);
            //if(oper==1) verif_ced_rep();
        }
    }//GEN-LAST:event_txt_dfa_ced_est_selKeyTyped

    private void btn_dfa_bus_ced_aluActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_dfa_bus_ced_aluActionPerformed
        if (txt_dfa_ced_est_sel.getText().length()==10 ){
            dat_nec=1;
            a_ced=txt_dfa_ced_est_sel.getText();
            dat_nec=vl.verif_cedula(a_ced, txt_dfa_ced_est_sel);
            if(dat_nec==0){
                JOptionPane.showMessageDialog(this, "El número de Cedula ingresado no es un número de Cedula Valido", "Mensaje", JOptionPane.ERROR_MESSAGE,vl.ima_pre);
                txt_dfa_ced_est_sel.requestFocus();
            }
            if (dat_nec==1){
                busc_inf(a_ced);
                /*bus_est(a_ced);
                bus_mat(cod_alu_sel);
                doc_sel=false;
                //llenar_tabla_documento(doc_sel);
                btn_dfa_guardar.setEnabled(true);*/
            }
        }else{
            if(frm_principal.v_busc_estud==null && frm_principal.v_busc_emple==null && frm_principal.v_busc_person==null){
                frm_principal.v_busc_estud = new frm_buscar_estudiante();
                vl.ver_pantalla(frm_principal.jdp_escritorio, frm_principal.v_busc_estud);
                frm_principal.v_busc_estud.formul=5;      
            }else{
                frm_principal.enfocar_ventana();  
            }
            
            /*frm_buscar_estudiante bus_ests = new frm_buscar_estudiante();
            bus_ests.formul=5;
            bus_ests.setVisible(true);
            if (!"".equals(a_ced)){
                bus_est(a_ced);
                bus_mat(cod_alu_sel);
                llen_tab_doc_ent();
                btn_dfa_guardar.setEnabled(true);
                color_campos_oblig();
            }*/
        }
    }//GEN-LAST:event_btn_dfa_bus_ced_aluActionPerformed

    private void txt_est_selKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyPressed

    }//GEN-LAST:event_txt_est_selKeyPressed

    private void txt_est_selKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyReleased
        txt_est_sel.setText(txt_est_sel.getText().toUpperCase());
    }//GEN-LAST:event_txt_est_selKeyReleased

    private void txt_est_selKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_est_selKeyTyped
        cant = txt_est_sel.getText().length();

        if (cant>= 0 && cant<25 ) vl.Solo_Letras(evt);
        if (cant == 25) vl.max_carateres_txt(txt_est_sel,cant,evt);
    }//GEN-LAST:event_txt_est_selKeyTyped

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_doc_fal_x_alu=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void chb_todosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_chb_todosActionPerformed
        //boolean valor = (Boolean) nombreJTable.getValueAt(fila,columna)
        if(chb_todos.isSelected()==true){ doc_sel=true;
        }else{                          doc_sel=false;  }
        llenar_tabla_documento(doc_sel);
    }//GEN-LAST:event_chb_todosActionPerformed

    private void chb_todosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_chb_todosMouseClicked

    }//GEN-LAST:event_chb_todosMouseClicked
    
    private void formato_objet(){
        fg.form_etiq2(lbl_1, lbl_2);
        fg.formato_texto2(txt_dfa_ced_est_sel, txt_est_sel);      
    }
    
    private void cont_docum_entreg(){
        cant_doc=0;
        cnt_dc = jtb_documento.getRowCount();
        for (int i = 0; i < cnt_dc; i++) {
            boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 1).toString());
            if(res==true)  cant_doc=cant_doc+1;                                 
        }
    }
    
    private void color_campos_oblig (){
        txt_dfa_ced_est_sel.setBackground(vl.ama);    
        txt_est_sel.setBackground(vl.ama); 

    }
    public void bus_est(String cd_est){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql="SELECT id,cedula,apellidos,nombres \n" +
                "FROM alumno WHERE cedula = '"+cd_est+"' AND est_reg= '"+a_est+"' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_alu_sel=rs.getInt("id");
                txt_dfa_ced_est_sel.setText(rs.getString("cedula") );
                alu_nom = rs.getString("apellidos") + " " + rs.getString("nombres") ;
                txt_est_sel.setText(alu_nom);  
                btn_dfa_guardar.setEnabled(true);
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    public void busc_inf(String ced_busc){
        bus_est(ced_busc);
        bus_mat(cod_alu_sel);
        llen_tab_doc_ent();
        btn_dfa_guardar.setEnabled(true);
    }
    
    public void bus_mat(int cd_est){
        try {
            CRUD b_est = new CRUD();
            a_est="A";
            sql=" SELECT id,id_periodo FROM matricula\n" +
                " WHERE id_alumno = '"+cd_est+"' \n" +
                " AND est_reg= '"+a_est+"' ";
            ResultSet rs = b_est.select(sql);
            if (rs.next()!= false){
                cod_matric=rs.getInt("id");
                cod_perio=rs.getInt("id_periodo");               
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
        }      
    }
    
    private void llen_tab_doc_ent(){
        try {
            vl.limpiar_tabla(jtb_documento,tablamodel);
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
                        filas[i+1] = rs.getObject(i+2); 
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
            Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
        }


    }
      
    private void llenar_tabla_documento(boolean sele){
       int cntd =jtb_documento.getRowCount();
        ArrayList<Object[]> datos = new ArrayList<Object[]>();
        int j =1;
        for (int i = 0; i < cntd; i++) {
            //boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
            docu =tablamodel.getValueAt(i, 1).toString();
            //if (res!= sele) res= sele;
            Object [] filas = new Object[3];
            for(int k=0; k<1;k++){
                filas[k] = j;
                filas[k+1] = docu;
                filas[k+2] =sele;
            }
            datos.add(filas);
            j=j+1;            
        }
        vl.limpiar_tabla(jtb_documento,tablamodel);
        for(int i=0;i<datos.size();i++) {
            tablamodel.addRow(datos.get(i));
            jtb_documento.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
            jtb_documento.setDefaultRenderer(jtb_documento.getColumnClass(2), classrender);
        }
    }
       
    private void limpiar(){
        String limp ="";
        txt_dfa_ced_est_sel.setText(limp);
        txt_est_sel.setText(limp); 
        btn_dfa_guardar.setEnabled(false);
        vl.limpiar_tabla(jtb_documento,tablamodel);
        chb_todos.setSelected(false); ;
    }
    
    
    
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_dfa_bus_ced_alu;
    private javax.swing.JButton btn_dfa_guardar;
    private javax.swing.JButton btn_dfa_lim;
    private javax.swing.JButton btn_dfa_salir;
    private javax.swing.JCheckBox chb_todos;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jtb_documento;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JLabel lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JPanel pnl_dat_est;
    private javax.swing.JTextField txt_dfa_ced_est_sel;
    private javax.swing.JTextField txt_est_sel;
    // End of variables declaration//GEN-END:variables
}
