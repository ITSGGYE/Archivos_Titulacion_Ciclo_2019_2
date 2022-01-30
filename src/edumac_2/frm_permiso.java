
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

public class frm_permiso extends javax.swing.JInternalFrame {
//Catidad maxima de caracteres
    public int perd  =   10    ; 
//Para validaciones varias    
    public int cant=25       ,   conf=0      ,   oper=0      ;
     public String sql=""    ,  mns =""     , slc= "";
     public int grabado=0    ;
     public boolean sele = false;
     public int cod_rol=0 , cnt_fil = 0, CTT =0;
     public String perms= "", menu="";
     public int id_cod_perm=0;
//Para el formato de la tabla
    Render classrender = new Render();
    JCheckBox check = new JCheckBox();
    DefaultCellEditor defaultcelleditor = new DefaultCellEditor(check);
    DefaultTableModel tablamodel = new DefaultTableModel();
/*Para evitar que la columna se editable
        @Override
        public boolean isCellEditable(int fl, int clm) {
             return false;    }       };*/
    Formato_General fg = new Formato_General();
    Validaciones vl = new Validaciones(); 
    Llenar_combos lc = new Llenar_combos();
    
    public frm_permiso() {
        initComponents();
        this.setTitle("Matricula"); 
        vl.logo_jif(this,cant);
        formato_objet();
        btn_prm_guardar.setEnabled(false);
        //lc.llenar_combo_rol(cmb_rol);
        formato_tabla();     
        jpn_doc.setEnabled(false);
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jtb_est_opc = new javax.swing.JToolBar();
        btn_prm_nue = new javax.swing.JButton();
        btn_prm_mod = new javax.swing.JButton();
        btn_prm_guardar = new javax.swing.JButton();
        btn_parrio_salir = new javax.swing.JButton();
        jpn_doc = new javax.swing.JPanel();
        chb_todos = new javax.swing.JCheckBox();
        jScrollPane1 = new javax.swing.JScrollPane();
        jtb_permisos = new javax.swing.JTable();
        lbl_3 = new javax.swing.JLabel();
        cmb_rol = new javax.swing.JComboBox<>();
        btn_bus_rol = new javax.swing.JButton();

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

        btn_prm_nue.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Nuevo.png"))); // NOI18N
        btn_prm_nue.setText("Nuevo");
        btn_prm_nue.setToolTipText("Nuevo");
        btn_prm_nue.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_prm_nue.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_prm_nue.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_prm_nueActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_prm_nue);

        btn_prm_mod.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Modificar.png"))); // NOI18N
        btn_prm_mod.setText("Modificar");
        btn_prm_mod.setToolTipText("Modificar");
        btn_prm_mod.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_prm_mod.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_prm_mod.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_prm_modActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_prm_mod);

        btn_prm_guardar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Guardar.png"))); // NOI18N
        btn_prm_guardar.setText("Guardar");
        btn_prm_guardar.setToolTipText("Guardar");
        btn_prm_guardar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_prm_guardar.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_prm_guardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_prm_guardarActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_prm_guardar);

        btn_parrio_salir.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/btn_Salir.png"))); // NOI18N
        btn_parrio_salir.setText("Salir");
        btn_parrio_salir.setToolTipText("Salir");
        btn_parrio_salir.setFocusable(false);
        btn_parrio_salir.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        btn_parrio_salir.setVerticalTextPosition(javax.swing.SwingConstants.BOTTOM);
        btn_parrio_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_parrio_salirActionPerformed(evt);
            }
        });
        jtb_est_opc.add(btn_parrio_salir);

        jpn_doc.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED), "Menús", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 0, 11), new java.awt.Color(0, 153, 153))); // NOI18N

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

        jtb_permisos.setModel(tablamodel);
        jScrollPane1.setViewportView(jtb_permisos);

        javax.swing.GroupLayout jpn_docLayout = new javax.swing.GroupLayout(jpn_doc);
        jpn_doc.setLayout(jpn_docLayout);
        jpn_docLayout.setHorizontalGroup(
            jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpn_docLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(chb_todos)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 303, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jpn_docLayout.setVerticalGroup(
            jpn_docLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpn_docLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(chb_todos)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 280, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        lbl_3.setText("Roles");

        cmb_rol.addItemListener(new java.awt.event.ItemListener() {
            public void itemStateChanged(java.awt.event.ItemEvent evt) {
                cmb_rolItemStateChanged(evt);
            }
        });
        cmb_rol.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                cmb_rolMouseClicked(evt);
            }
        });
        cmb_rol.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cmb_rolActionPerformed(evt);
            }
        });

        btn_bus_rol.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/btn_Busqueda.png"))); // NOI18N
        btn_bus_rol.setToolTipText("Buscar");
        btn_bus_rol.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_bus_rolActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jtb_est_opc, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(26, 26, 26)
                        .addComponent(lbl_3)
                        .addGap(18, 18, 18)
                        .addComponent(cmb_rol, javax.swing.GroupLayout.PREFERRED_SIZE, 164, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(btn_bus_rol, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(jpn_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jtb_est_opc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(cmb_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(lbl_3))
                    .addComponent(btn_bus_rol))
                .addGap(18, 18, 18)
                .addComponent(jpn_doc, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btn_prm_nueActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_prm_nueActionPerformed
        oper = 1;
        vl.col_orig4(btn_prm_nue,btn_prm_mod,btn_prm_guardar,btn_parrio_salir);
       
        this.setTitle("Nuevo Periodo");
        btn_prm_nue.setBackground(vl.ama);
        btn_prm_guardar.setEnabled(true);
        jpn_doc.setEnabled(true);
        slc="N";
        lln_combo_rol(slc);
        llenar_tabla_permiso();
        btn_bus_rol.setEnabled(false);
    }//GEN-LAST:event_btn_prm_nueActionPerformed

    private void btn_prm_modActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_prm_modActionPerformed
        oper = 2;
        vl.col_orig4(btn_prm_nue,btn_prm_mod,btn_prm_guardar,btn_parrio_salir);
        this.setTitle("Modificar Periodo");
        btn_prm_mod.setBackground(vl.ama);
        btn_prm_guardar.setEnabled(true);
        jpn_doc.setEnabled(true);
        slc="S";
        lln_combo_rol(slc);
        btn_bus_rol.setEnabled(true);
    }//GEN-LAST:event_btn_prm_modActionPerformed

    private void btn_prm_guardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_prm_guardarActionPerformed
        sel_rol((String) cmb_rol.getSelectedItem());
        if (oper == 1){   
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de guardar los datos seleccionados en el sistema?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                guardar_prm_nuevos(cod_rol);
            }
        }
        if (oper == 2){
            conf = JOptionPane.showConfirmDialog(this, "¿Está seguro de actualizar los permisos del Rol seleccionado?","Confirmacion",JOptionPane.YES_NO_OPTION,JOptionPane.QUESTION_MESSAGE,vl.ima_pre);
            if (conf==0){
                act_prm_sel(cod_rol);
 
            }
        }

       
    }//GEN-LAST:event_btn_prm_guardarActionPerformed

    private void btn_parrio_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_parrio_salirActionPerformed
        frm_principal.v_permiso=null;
        this.dispose();
    }//GEN-LAST:event_btn_parrio_salirActionPerformed

    private void chb_todosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_chb_todosMouseClicked

    }//GEN-LAST:event_chb_todosMouseClicked

    private void chb_todosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_chb_todosActionPerformed
        if(chb_todos.isSelected()==true){ sele=true;
        }else{                          sele=false;  }
        llenar_tabla_menus(sele);
    }//GEN-LAST:event_chb_todosActionPerformed

    public void lln_combo_rol(String opc){
        CRUD c = new CRUD(); 
        cmb_rol.removeAllItems();
        try{           
            ResultSet rs = c.select("SELECT rol FROM rol " +
                                    " WHERE est_reg = 'A'"+
                                    " AND tiene_perm= '"+ opc +"'"); 
            if (rs.next()!= false){ 

                do{ cmb_rol.addItem(rs.getString(1));                                               
                  }while(rs.next());                                                       
            }
        }catch(Exception ex){
              //JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
        }   
    }
    
    private void llenar_tabla_menus(boolean sele){
       int cntd =jtb_permisos.getRowCount();
        ArrayList<Object[]> datos = new ArrayList<Object[]>();
        int j =1;
        for (int i = 0; i < cntd; i++) {
            //boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
            mns =tablamodel.getValueAt(i, 1).toString();
            //if (res!= sele) res= sele;
            Object [] filas = new Object[3];
            for(int k=0; k<1;k++){
                filas[k] = j;
                filas[k+1] = mns;
                filas[k+2] =sele;
            }
            datos.add(filas);
            j=j+1;            
        }
        vl.limpiar_tabla(jtb_permisos,tablamodel);
        for(int i=0;i<datos.size();i++) {
            tablamodel.addRow(datos.get(i));
            jtb_permisos.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
            jtb_permisos.setDefaultRenderer(jtb_permisos.getColumnClass(2), classrender);
        }
    }
    
    
    private void cmb_rolItemStateChanged(java.awt.event.ItemEvent evt) {//GEN-FIRST:event_cmb_rolItemStateChanged

    }//GEN-LAST:event_cmb_rolItemStateChanged

    private void cmb_rolMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_cmb_rolMouseClicked

    }//GEN-LAST:event_cmb_rolMouseClicked

    private void cmb_rolActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cmb_rolActionPerformed
        sel_rol((String) cmb_rol.getSelectedItem());
    }//GEN-LAST:event_cmb_rolActionPerformed

    private void sel_rol(String selec){
        CRUD c = new CRUD(); 
            try{           
                ResultSet rs = c.select("SELECT id FROM rol WHERE rol = '"+ selec +"'"); 
                if (rs.next()== false){
                    
                }else{                                           
                    cod_rol =Integer.parseInt(rs.getString(1));  
                 }
            }catch(Exception ex){
                  JOptionPane.showMessageDialog(this, ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }   
    }
    
    private void btn_bus_rolActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_bus_rolActionPerformed
        sel_rol((String) cmb_rol.getSelectedItem());
        llen_tab_prm_ing();
        
    }//GEN-LAST:event_btn_bus_rolActionPerformed

    private void formInternalFrameClosed(javax.swing.event.InternalFrameEvent evt) {//GEN-FIRST:event_formInternalFrameClosed
        frm_principal.v_permiso=null;
    }//GEN-LAST:event_formInternalFrameClosed

    private void formato_objet(){
        fg.formato_combo1(cmb_rol);
        fg.form_etiq1(lbl_3);
    }
    private void formato_tabla(){
        tablamodel.addColumn("#");   
        tablamodel.addColumn("Menu"); 
        tablamodel.addColumn("Permiso"); 
        TableColumn columna = jtb_permisos.getColumn("#");
        columna.setPreferredWidth(30);
        columna.setMaxWidth(30);
        columna = jtb_permisos.getColumn("Menu");
        columna.setPreferredWidth(180); 
        columna.setMaxWidth(180);
        columna = jtb_permisos.getColumn("Permiso");
        columna.setPreferredWidth(70);
        columna.setMaxWidth(70);

    }
    private void llenar_tabla_permiso(){
        //cnt_doc_sis=0;
        sele = false;
        try {
            CRUD c = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT menu_secu \n" +
                    "FROM menu_secu WHERE est_reg = 'A'";
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
                //cnt_doc_sis=j-1;
                for(int i=0;i<datos.size();i++) {
                    tablamodel.addRow(datos.get(i));
                    jtb_permisos.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
                    jtb_permisos.setDefaultRenderer(jtb_permisos.getColumnClass(2), classrender);
                }       
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_matriculas.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
    private void act_prm_sel(int id_cd_rol){
        cnt_fil = jtb_permisos.getRowCount();
        id_cod_perm=0;
        CTT =0;
        for (int i = 0; i < cnt_fil; i++) {
            try {
                boolean res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
                if(res==true){  perms="A";
                }else{          perms="D";   }
                menu =tablamodel.getValueAt(i, 1).toString();
                CRUD b_dc = new CRUD();
                //a_est="A";
                sql=" SELECT p.id \n" +
                    " FROM permiso AS p INNER JOIN menu_secu AS ms \n" +
                    " ON p.id_menu_secu = ms.id\n" +
                    " WHERE ms.menu_secu = '"+menu+"'";
                ResultSet rs = b_dc.select(sql);
                if (rs.next()!= false){
                    id_cod_perm=rs.getInt("id");
                    CRUD_Permiso ing_prm = new CRUD_Permiso();
                    grabado= ing_prm.act_perm(id_cd_rol,id_cod_perm, perms);
                    if(grabado ==0){
                        JOptionPane.showMessageDialog(this, "El permiso no se pudo actualizar en el sistema", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        CTT=1;
                    }

                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        if (CTT==0){
            JOptionPane.showMessageDialog(this, "Los permisos fueron actualizados al rol","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);            
        }

    }
    private void guardar_prm_nuevos(int id_cod_rol){
        id_cod_perm=0 ;
        CTT =0;
        cnt_fil = jtb_permisos.getRowCount();
        for (int i = 0; i < cnt_fil; i++) {
            menu = tablamodel.getValueAt(i, 1).toString();
            boolean res ;
            res = Boolean.valueOf(tablamodel.getValueAt(i, 2).toString());
            if(res==true){  perms="A";   }else{          perms="D";   }
            CRUD b_oerm = new CRUD();
            sql=" SELECT pr.id\n" +
                " FROM menu_secu AS ms INNER JOIN permiso AS pr \n" +
                " ON pr.id_menu_secu = ms.id\n" +
                " WHERE ms.menu_secu= '"+ menu  +"'";
            ResultSet rs = b_oerm.select(sql);
            try {
                if (rs.next()!= false){
                    id_cod_perm=rs.getInt("id");
                    CRUD_Permiso ing_prm = new CRUD_Permiso();
                    grabado= ing_prm.agre_perm(id_cod_rol,id_cod_perm, perms);
                    if(grabado ==0){
                        JOptionPane.showMessageDialog(this, "El Menu " +menu+ " no se pudo asignar al rol", "Error", JOptionPane.ERROR_MESSAGE,vl.ima_conf);
                        CTT =1;
                    }                    
                }
            } catch (SQLException ex) {
                Logger.getLogger(frm_permiso.class.getName()).log(Level.SEVERE, null, ex);
            }
        } 
        if (CTT==0){
            CRUD_Permiso ing_prm_rol = new CRUD_Permiso();
            grabado= ing_prm_rol.act_rol(id_cod_rol);
            JOptionPane.showMessageDialog(this, "Los permisos fueron asignados al rol","Mensaje de Confirmacion",JOptionPane.QUESTION_MESSAGE,vl.ima_conf);
            
        }
    }
    
    private void limpiar_tabla(){
        int fl= jtb_permisos.getRowCount();
        if (fl>0) for(int i=0;i< fl;i++) tablamodel.removeRow(0);           
    }
    private void llen_tab_prm_ing(){
        try {
            vl.limpiar_tabla(jtb_permisos,tablamodel);
            //a_est="A";
            CRUD c = new CRUD();
            ArrayList<Object[]> datos = new ArrayList<Object[]>();
            sql="SELECT ms.menu_secu , pf.`est_reg`\n" +
                " FROM perfil AS pf INNER JOIN permiso AS pr \n" +
                " ON pf.id_permiso=pr.`id`\n" +
                " INNER JOIN menu_secu AS ms \n" +
                " ON pr.id_menu_secu= ms.id\n" +
                " WHERE pf.id_rol='"+cod_rol+"'";
            ResultSet rs = c.select(sql);
            if (rs.next()!= false){
                int j =1;
                do{
                    Object [] filas = new Object[3];
                    for(int i=0; i<1;i++){
                        filas[i] = j;
                        if ("A".equals(String.valueOf(rs.getObject(i+2)))) {
                            sele=true;
                        }else{
                            sele=false;
                        }
                        filas[i+1] = rs.getObject(i+1); 
                        filas[i+2] =sele;                       
                    }
                    datos.add(filas);
                    j=j+1;
                }while(rs.next());
                for(int i=0;i<datos.size();i++) {
                    tablamodel.addRow(datos.get(i));
                    jtb_permisos.getColumnModel().getColumn(2).setCellEditor(defaultcelleditor);
                    jtb_permisos.setDefaultRenderer(jtb_permisos.getColumnClass(2), classrender);
                }       
            }
        } catch (SQLException ex) {
            Logger.getLogger(frm_doc_falt_x_alu.class.getName()).log(Level.SEVERE, null, ex);
        }


    }
    

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_bus_rol;
    private javax.swing.JButton btn_parrio_salir;
    private javax.swing.JButton btn_prm_guardar;
    private javax.swing.JButton btn_prm_mod;
    private javax.swing.JButton btn_prm_nue;
    private javax.swing.JCheckBox chb_todos;
    private javax.swing.JComboBox<String> cmb_rol;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JPanel jpn_doc;
    private javax.swing.JToolBar jtb_est_opc;
    private javax.swing.JTable jtb_permisos;
    private javax.swing.JLabel lbl_3;
    // End of variables declaration//GEN-END:variables
}
