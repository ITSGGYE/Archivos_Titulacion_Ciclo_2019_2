/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.view.marca;

import ec.com.cp.controler.ctr_pdt_articulo;
import ec.com.cp.controler.ctr_pdt_categoria;
import ec.com.cp.controler.ctr_pdt_marca;
import ec.com.cp.controler.ctr_pdt_producto;
import ec.com.cp.controler.ctr_pdt_subcategoria;
import ec.com.cp.model.model_pdt_categoria;
import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
import ec.com.cp.model.model_pdt_articulo_dos;
import ec.com.cp.model.model_pdt_marca_dos;
import ec.com.cp.model.model_pdt_producto;
import ec.com.cp.modelEXT.ObtenerModel;
import ec.com.cp.view.categoria.agregarCategoria;
import ec.com.cp.view.subcategoria.agregarSubCategorias;
import java.awt.HeadlessException;
import java.awt.MouseInfo;
import java.awt.Point;
import java.util.ArrayList;
import java.util.Objects;
import javax.swing.JOptionPane;

/**
 *
 * @author Usuario
 */
public class FrmEditarMarca extends javax.swing.JDialog {

    /**
     * Creates new form agregarArticulo
     */
    int x, y;
    String estado = "";
    ctr_pdt_categoria crud = new ctr_pdt_categoria();
    ArrayList<model_pdt_categoria> listCategoria;
    int idCategoria = 0;
    /**/
    ctr_pdt_subcategoria crudsub = new ctr_pdt_subcategoria();
    ArrayList<model_pdt_subcategoria_join_subcategoria> listSubCategoria;
    
    ctr_pdt_marca crudart = new ctr_pdt_marca();

    ctr_pdt_marca ctrMarca = new ctr_pdt_marca();
    ctr_pdt_articulo ctrArt = new ctr_pdt_articulo();
    ctr_pdt_producto ctrPro = new ctr_pdt_producto();

    model_pdt_marca_dos marca = new model_pdt_marca_dos();
    model_pdt_articulo_dos articulo = new model_pdt_articulo_dos();
    model_pdt_producto producto = new model_pdt_producto();

    model_pdt_marca_dos art;

    public FrmEditarMarca(java.awt.Frame parent, boolean modal, model_pdt_marca_dos marca /*model_pdt_articulo articulo*/) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
        art = marca;
        cargarCbxCategoria();
        form();
    }

    public FrmEditarMarca(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
    }

    public void form() {
        cbx_categoria.setSelectedItem(art.getNombre_categoria());
        cbx_subcategoria.setSelectedItem(art.getNombre_subcategoria());
        txt_nombre.setText(art.getNombre_marca());
        btn();
    }

    public void cargarCbxCategoria() {
        listCategoria = crud.listarCategorias(1);
        for (int i = 0; i < listCategoria.size(); i++) {
            cbx_categoria.addItem(listCategoria.get(i).getNombre());
        }
    }

    public void cagarCbxSubcategoria(int id) {

        cbx_subcategoria.removeAllItems();
        listSubCategoria = crudsub.listarSubCategoriasIdcategoria(id);
        for (int i = 0; i < listSubCategoria.size(); i++) {
            cbx_subcategoria.addItem(listSubCategoria.get(i).getNombre());
        }
    }

    public void btn() {
        estado = "" + art.getEstado();
        if ("A".equals(estado)) {
            btnBoton.setText("INACTIVAR");
        }
        if ("I".equals(estado)) {
            btnBoton.setText("ACTIVAR");
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();
        txt_nombre = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        cbx_categoria = new javax.swing.JComboBox<>();
        jLabel4 = new javax.swing.JLabel();
        cbx_subcategoria = new javax.swing.JComboBox<>();
        jButton3 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();
        btnBoton = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jPanel1.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(0, 0, 0), 2, true));

        jLabel1.setBackground(new java.awt.Color(0, 51, 204));
        jLabel1.setFont(new java.awt.Font("Ubuntu", 1, 24)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("MARCA");
        jLabel1.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        jLabel1.setOpaque(true);
        jLabel1.addMouseMotionListener(new java.awt.event.MouseMotionAdapter() {
            public void mouseDragged(java.awt.event.MouseEvent evt) {
                jLabel1MouseDragged(evt);
            }
        });
        jLabel1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                jLabel1MousePressed(evt);
            }
        });

        jButton1.setBackground(new java.awt.Color(254, 254, 254));
        jButton1.setFont(new java.awt.Font("Ubuntu", 1, 12)); // NOI18N
        jButton1.setForeground(new java.awt.Color(1, 1, 1));
        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/cancelar32.png"))); // NOI18N
        jButton1.setText("SALIR");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setBackground(new java.awt.Color(254, 254, 254));
        jButton2.setFont(new java.awt.Font("Ubuntu", 1, 12)); // NOI18N
        jButton2.setForeground(new java.awt.Color(1, 1, 1));
        jButton2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/disquete guardar 32.png"))); // NOI18N
        jButton2.setText("GUARDAR");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        jLabel2.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel2.setText("NOMBRE:");

        txt_nombre.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        txt_nombre.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusLost(java.awt.event.FocusEvent evt) {
                txt_nombreFocusLost(evt);
            }
        });

        jLabel3.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel3.setText("CATEGORIA:");

        cbx_categoria.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_categoriaActionPerformed(evt);
            }
        });

        jLabel4.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel4.setText("SUBCATEGORIA:");

        jButton3.setForeground(new java.awt.Color(0, 204, 204));
        jButton3.setText("+");
        jButton3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton3ActionPerformed(evt);
            }
        });

        jButton4.setForeground(new java.awt.Color(0, 204, 204));
        jButton4.setText("+");
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });

        btnBoton.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/inactivar 32.png"))); // NOI18N
        btnBoton.setText("INACTIVAR");
        btnBoton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnBotonActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel2)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGap(34, 34, 34)
                                .addComponent(jButton1)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txt_nombre)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 47, Short.MAX_VALUE)
                                .addComponent(btnBoton)
                                .addGap(39, 39, 39)
                                .addComponent(jButton2)
                                .addGap(16, 16, 16))))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel3)
                            .addComponent(jLabel4))
                        .addGap(19, 19, 19)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(cbx_categoria, 0, 283, Short.MAX_VALUE)
                            .addComponent(cbx_subcategoria, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jButton4)
                            .addComponent(jButton3))))
                .addGap(23, 23, 23))
            .addComponent(jLabel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(cbx_categoria, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(11, 11, 11)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(cbx_subcategoria, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jButton3)
                        .addGap(11, 11, 11)
                        .addComponent(jButton4)))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_nombre, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jButton2, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(jButton1)
                        .addComponent(btnBoton)))
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jLabel1MouseDragged(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MouseDragged
        Point point = MouseInfo.getPointerInfo().getLocation();
        setLocation(point.x - x, point.y - y);
    }//GEN-LAST:event_jLabel1MouseDragged

    private void jLabel1MousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MousePressed
        x = evt.getX();
        y = evt.getY();
    }//GEN-LAST:event_jLabel1MousePressed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        setVisible(false);
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed

        try {
            art.setNombre_subcategoria(cbx_subcategoria.getSelectedItem().toString());
            art.setNombre_marca(txt_nombre.getText());
            art.setId_marca(art.getId_marca());
            System.out.println("id articulo: " + art.getId_marca());
            art.setU_actualizacion("YO");

            String o = crudart.actualizarMarca(art, 1);
            JOptionPane.showMessageDialog(null, o);
            setVisible(false);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }

    }//GEN-LAST:event_jButton2ActionPerformed

    private void txt_nombreFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_txt_nombreFocusLost
        txt_nombre.setText(txt_nombre.getText().toUpperCase());
    }//GEN-LAST:event_txt_nombreFocusLost

    private void cbx_categoriaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_categoriaActionPerformed
        model_pdt_categoria id = ObtenerModel.ObtenerCategoria(cbx_categoria.getSelectedItem().toString());
        idCategoria = id.getId_categoria().intValue();
        cagarCbxSubcategoria(idCategoria);
    }//GEN-LAST:event_cbx_categoriaActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton3ActionPerformed
        agregarCategoria ga = new agregarCategoria(new javax.swing.JFrame(), true);
        ga.setVisible(true);

    }//GEN-LAST:event_jButton3ActionPerformed
    public void proceso() {

        ArrayList<model_pdt_articulo_dos> listArticulo = ctrArt.listarArticulos(1);
        Long idArt;
        ArrayList<model_pdt_producto> listPro = ctrPro.listarProducto(1);
        Long idPro;
        for (int a = 0; a < listArticulo.size(); a++) {
            if (Objects.equals(listArticulo.get(a).getId_marca(), art.getId_marca())) {

                System.out.println("1");
                idArt = listArticulo.get(a).getId_articulo();
                articulo.setId_articulo(idArt);
                articulo.setEstado(estado.charAt(0));
                articulo.setUsuario_actulizacion("YO");

                String msgArt = ctrArt.activarInactivarArticulo(articulo);
                System.out.println("id articulo: " + listArticulo.get(a).getId_articulo());
                for (int p = 0; p < listPro.size(); p++) {
                    if (Objects.equals(listPro.get(p).getId_articulo(), idArt)) {

                        idPro = listPro.get(p).getId_producto();
                        producto.setId_producto(idPro);
                        producto.setEstado(estado.charAt(0));
                        producto.setUsuario_actulizacion("YO");

                        String msgPro = ctrPro.activarInactivarProducto(producto);
                        System.out.println("id producto: " + idPro);
                    }
                }
            }
        }
    }
    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
        agregarSubCategorias ga = new agregarSubCategorias(new javax.swing.JFrame(), true);
        ga.setVisible(true);
    }//GEN-LAST:event_jButton4ActionPerformed
    public void activaInactivar() {
        String boton = btnBoton.getText();
        int r = JOptionPane.showConfirmDialog(null, "¿ESTA SEGURO DE " + boton + " A: " + art.getNombre_marca() + "?", "", JOptionPane.YES_NO_OPTION);
        if (r == JOptionPane.YES_OPTION) {

            if ("INACTIVAR".equals(boton)) {
                estado = "I";
            }
            if ("ACTIVAR".equals(boton)) {
                estado = "A";
            }
            art.setId_marca(art.getId_marca());
            art.setEstado(estado.charAt(0));
            art.setU_actualizacion("YO");
            try {
                String msg = crudart.activarInactivarMarca(art);
                proceso();
                JOptionPane.showMessageDialog(this, msg);

            } catch (HeadlessException e) {
                JOptionPane.showMessageDialog(this, e);
            }
            setVisible(false);
        } else {
        }

    }
    private void btnBotonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnBotonActionPerformed
        activaInactivar();
    }//GEN-LAST:event_btnBotonActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(FrmEditarMarca.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(FrmEditarMarca.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(FrmEditarMarca.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(FrmEditarMarca.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                FrmEditarMarca dialog = new FrmEditarMarca(new javax.swing.JFrame(), true);
                dialog.addWindowListener(new java.awt.event.WindowAdapter() {
                    @Override
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnBoton;
    private javax.swing.JComboBox<String> cbx_categoria;
    private javax.swing.JComboBox<String> cbx_subcategoria;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton3;
    private javax.swing.JButton jButton4;
    private javax.swing.JLabel jLabel1;
    public static javax.swing.JLabel jLabel2;
    public static javax.swing.JLabel jLabel3;
    public static javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JTextField txt_nombre;
    // End of variables declaration//GEN-END:variables
}
