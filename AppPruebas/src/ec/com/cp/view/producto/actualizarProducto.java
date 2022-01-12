/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.view.producto;

import ec.com.cp.controler.ctr_gen_iva;
import ec.com.cp.controler.ctr_inv_bodega;
import ec.com.cp.controler.ctr_inv_inventario;
import ec.com.cp.controler.ctr_pdt_articulo;
import ec.com.cp.controler.ctr_pdt_categoria;
import ec.com.cp.controler.ctr_pdt_producto;
import ec.com.cp.controler.ctr_pdt_subcategoria;
import ec.com.cp.model.join.model_pdt_presentacion_join;
import ec.com.cp.model.join.model_pdt_producto_join;
import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
import ec.com.cp.model.model_gen_bodega;
import ec.com.cp.model.model_gen_iva;
import ec.com.cp.model.model_pdt_articulo;
import ec.com.cp.model.model_pdt_articulo_dos;
import ec.com.cp.model.model_pdt_categoria;
import ec.com.cp.model.model_pdt_envase;
import ec.com.cp.model.model_pdt_marca;
import ec.com.cp.model.model_pdt_marca_dos;
import ec.com.cp.model.model_pdt_medida;
import ec.com.cp.model.model_pdt_producto;
import ec.com.cp.modelEXT.ObtenerModel;
import ec.com.cp.view.presentacion.ConsultaEnvaseEscoger;
import ec.com.cp.view.presentacion.consultaMedidaEscoger;
import ec.com.cp.view.producto.escojer.pdtConsultaArticuloEscojer;
import ec.com.cp.view.producto.escojer.pdtConsultaMarcaEscojer;
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
public class actualizarProducto extends javax.swing.JDialog {

    int x, y;
    ctr_pdt_categoria crud = new ctr_pdt_categoria();
    ArrayList<model_pdt_categoria> listCategoria;
    int idCategoria = 0;
    /**/
    ctr_pdt_subcategoria crudsub = new ctr_pdt_subcategoria();
    ArrayList<model_pdt_subcategoria_join_subcategoria> listSubCategoria;
    int idSubCategoria = 0;
    /**/
    model_pdt_articulo articulo = new model_pdt_articulo();
    ctr_pdt_articulo crudart = new ctr_pdt_articulo();
    model_pdt_articulo objArticulo;
    int idArticulo = 0;
    model_pdt_marca objMarca = new model_pdt_marca();
    int idMarca = 0;
    /**/
    model_pdt_producto producto = new model_pdt_producto();
    model_pdt_presentacion_join objPresentacion;
    ctr_pdt_producto crudProd = new ctr_pdt_producto();
    /**/
    ctr_gen_iva crudIva = new ctr_gen_iva();
    ArrayList<model_gen_iva> listIva;
    /**/

    ctr_inv_inventario crudInv = new ctr_inv_inventario();
    model_pdt_medida objmedida = new model_pdt_medida();

    ArrayList<model_gen_bodega> listBodega;
    ctr_inv_bodega crudBodega = new ctr_inv_bodega();

    model_pdt_producto pro;
    Long id;

    public actualizarProducto(java.awt.Frame parent, boolean modal, model_pdt_producto produc) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
        pro = produc;
//        cbx_categoria.addItem("SELECCIONE...");
        cargarCbxCategoria();
        cagarCbxBodega();
        form();
        btn();
    }

    public actualizarProducto(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        setUndecorated(true);
        initComponents();
        setLocationRelativeTo(null);
    }

    public void form() {
//        btn_nombre.setEnabled(false);
//        txt_nombre_productoConcadenado.setEditable(false);
        cbx_categoria11.setSelectedItem(pro.getNombre_categoria());
        cbx_categoria11.setEnabled(false);
        cbx_subcategoria.setSelectedItem(pro.getNombre_subcategoria());
        cbx_subcategoria.setEnabled(false);
        cbx_Iva.setSelectedItem(pro.getIva());

        id = pro.getId_bodega();
        model_gen_bodega bod = ObtenerModel.ObtenerBodega(id);
        System.out.println("id: " + id);
        System.out.println("nombre bodega: " + bod.getNombre_bodega());
        cbx_bodega.setSelectedItem(bod.getNombre_bodega());

        txt_marca.setText(pro.getNombre_marca());
        txt_marca.setEnabled(false);
        txt_articulo.setText(pro.getArticulo());
        txt_articulo.setEnabled(false);

        txt_medida.setText(pro.getNombre_medida());
        txt_envase.setText(pro.getNombre_envase());

        txt_nombre_productoConcadenado.setText(pro.getNombre_producto1());
        txt_codigo_barra.setText(pro.getCodigo_barra());
//        txtPrecio.setText("" + pro.getPrecio());
        txt_minimo.setText("" + pro.getMinimo());
        txt_maximo.setText("" + pro.getMaximo());
        txta_descripcion.setText(pro.getDescrpcion());
    }

    public void cargarCbxCategoria() {
        listCategoria = crud.listarCategorias(1);
        for (int i = 0; i < listCategoria.size(); i++) {
            cbx_categoria11.addItem(listCategoria.get(i).getNombre());
        }
    }

    public void cagarCbxSubcategoria(int id) {

        cbx_subcategoria.removeAllItems();
        listSubCategoria = crudsub.listarSubCategoriasIdcategoria(id);
        for (int i = 0; i < listSubCategoria.size(); i++) {
            cbx_subcategoria.addItem(listSubCategoria.get(i).getNombre());
        }
    }

    public void cagarCbxBodega() {

        listBodega = crudBodega.ListarBodega();
        for (int i = 0; i < listBodega.size(); i++) {
            cbx_bodega.addItem(listBodega.get(i).getNombre_bodega());
            id = listBodega.get(i).getId_bodega();

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

        jPanel3 = new javax.swing.JPanel();
        jLabel8 = new javax.swing.JLabel();
        jButton5 = new javax.swing.JButton();
        jButton6 = new javax.swing.JButton();
        jTabbedPane2 = new javax.swing.JTabbedPane();
        jPanel1 = new javax.swing.JPanel();
        jLabel10 = new javax.swing.JLabel();
        cbx_categoria11 = new javax.swing.JComboBox<>();
        jLabel11 = new javax.swing.JLabel();
        cbx_subcategoria = new javax.swing.JComboBox<>();
        jLabel9 = new javax.swing.JLabel();
        txt_articulo = new javax.swing.JTextField();
        txt_marca = new javax.swing.JTextField();
        jLabel14 = new javax.swing.JLabel();
        txt_medida = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        txt_envase = new javax.swing.JTextField();
        jPanel4 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        txta_descripcion = new javax.swing.JTextArea();
        jLabel16 = new javax.swing.JLabel();
        txt_nombre_productoConcadenado = new javax.swing.JTextField();
        jLabel17 = new javax.swing.JLabel();
        jLabel18 = new javax.swing.JLabel();
        txt_minimo = new javax.swing.JTextField();
        txt_maximo = new javax.swing.JTextField();
        jLabel21 = new javax.swing.JLabel();
        txt_codigo_barra = new javax.swing.JTextField();
        jLabel20 = new javax.swing.JLabel();
        cbx_Iva = new javax.swing.JComboBox<>();
        btn_nombre = new javax.swing.JButton();
        cbx_bodega = new javax.swing.JComboBox<>();
        jLabel23 = new javax.swing.JLabel();
        btnBoton = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jPanel3.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(0, 0, 0), 2, true));

        jLabel8.setBackground(new java.awt.Color(0, 51, 204));
        jLabel8.setFont(new java.awt.Font("Ubuntu", 1, 24)); // NOI18N
        jLabel8.setForeground(new java.awt.Color(255, 255, 255));
        jLabel8.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel8.setText("PRODUCTO ");
        jLabel8.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        jLabel8.setOpaque(true);
        jLabel8.addMouseMotionListener(new java.awt.event.MouseMotionAdapter() {
            public void mouseDragged(java.awt.event.MouseEvent evt) {
                jLabel8MouseDragged(evt);
            }
        });
        jLabel8.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                jLabel8MousePressed(evt);
            }
        });

        jButton5.setBackground(new java.awt.Color(254, 254, 254));
        jButton5.setFont(new java.awt.Font("Ubuntu", 1, 12)); // NOI18N
        jButton5.setForeground(new java.awt.Color(1, 1, 1));
        jButton5.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/cancelar32.png"))); // NOI18N
        jButton5.setText("SALIR");
        jButton5.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton5ActionPerformed(evt);
            }
        });

        jButton6.setBackground(new java.awt.Color(254, 254, 254));
        jButton6.setFont(new java.awt.Font("Ubuntu", 1, 12)); // NOI18N
        jButton6.setForeground(new java.awt.Color(1, 1, 1));
        jButton6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/disquete guardar 32.png"))); // NOI18N
        jButton6.setText("GUARDAR");
        jButton6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton6ActionPerformed(evt);
            }
        });

        jTabbedPane2.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
        jTabbedPane2.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N

        jPanel1.setBorder(javax.swing.BorderFactory.createEtchedBorder());

        jLabel10.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel10.setText("CATEGORIA:");

        cbx_categoria11.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_categoria11ActionPerformed(evt);
            }
        });

        jLabel11.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel11.setText("SUBCATEGORIA:");

        cbx_subcategoria.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_subcategoriaActionPerformed(evt);
            }
        });

        jLabel9.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel9.setText("ARTICULO:");

        txt_articulo.setText("SELECCIONE...");
        txt_articulo.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                txt_articuloMousePressed(evt);
            }
        });
        txt_articulo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_articuloActionPerformed(evt);
            }
        });

        txt_marca.setText("SELECCIONE...");
        txt_marca.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                txt_marcaMousePressed(evt);
            }
        });
        txt_marca.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_marcaActionPerformed(evt);
            }
        });

        jLabel14.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel14.setText("MARCA:");

        txt_medida.setText("SELECCIONE...");
        txt_medida.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                txt_medidaMousePressed(evt);
            }
        });
        txt_medida.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_medidaActionPerformed(evt);
            }
        });

        jLabel6.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel6.setText("MEDIDA:");

        jLabel7.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel7.setText("ENVASE:");

        txt_envase.setText("SELECCIONE...");
        txt_envase.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mousePressed(java.awt.event.MouseEvent evt) {
                txt_envaseMousePressed(evt);
            }
        });
        txt_envase.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_envaseActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(21, 21, 21)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel6)
                        .addGap(113, 113, 113)
                        .addComponent(txt_medida))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel10)
                                    .addComponent(jLabel11)
                                    .addComponent(jLabel9)
                                    .addComponent(jLabel14))
                                .addGap(56, 56, 56)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(txt_marca)
                                    .addComponent(txt_articulo)
                                    .addComponent(cbx_subcategoria, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(cbx_categoria11, javax.swing.GroupLayout.PREFERRED_SIZE, 213, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel7)
                                .addGap(113, 113, 113)
                                .addComponent(txt_envase, javax.swing.GroupLayout.PREFERRED_SIZE, 213, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addGap(403, 403, 403))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(38, 38, 38)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel10, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbx_categoria11, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(cbx_subcategoria, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel11, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel14, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_marca, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel9, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_articulo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_medida, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel7, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_envase, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(53, Short.MAX_VALUE))
        );

        jTabbedPane2.addTab("SECCION 1", jPanel1);

        jPanel4.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));

        txta_descripcion.setColumns(20);
        txta_descripcion.setRows(5);
        txta_descripcion.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "DESCRIPCION", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("Tahoma", 1, 11))); // NOI18N
        jScrollPane1.setViewportView(txta_descripcion);

        jLabel16.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel16.setText("NOMBRE DEL PRODUCTO :");

        jLabel17.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel17.setText("MINIMO :");

        jLabel18.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel18.setText("MAXIMO :");

        txt_minimo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_minimoKeyTyped(evt);
            }
        });

        txt_maximo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                txt_maximoKeyTyped(evt);
            }
        });

        jLabel21.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel21.setText("CODIGO DE BARRA:");

        jLabel20.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel20.setText("IVA:");

        cbx_Iva.setEditable(true);
        cbx_Iva.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        cbx_Iva.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "SI", "NO" }));
        cbx_Iva.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cbx_IvaActionPerformed(evt);
            }
        });

        btn_nombre.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btn_nombre.setText("GENERAR NOMBRE");
        btn_nombre.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_nombreActionPerformed(evt);
            }
        });

        jLabel23.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        jLabel23.setText("BODEGA:");

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(jLabel16)
                        .addGap(63, 63, 63)
                        .addComponent(btn_nombre))
                    .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(txt_nombre_productoConcadenado)
                        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                            .addGap(0, 2, Short.MAX_VALUE)
                            .addComponent(jLabel21)
                            .addGap(18, 18, 18)
                            .addComponent(txt_codigo_barra, javax.swing.GroupLayout.PREFERRED_SIZE, 289, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(2, 2, 2))
                        .addGroup(jPanel4Layout.createSequentialGroup()
                            .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                .addGroup(jPanel4Layout.createSequentialGroup()
                                    .addComponent(jLabel23)
                                    .addGap(18, 18, 18)
                                    .addComponent(cbx_bodega, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 274, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGap(18, 18, 18)
                            .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(jLabel17)
                                .addGroup(jPanel4Layout.createSequentialGroup()
                                    .addGap(10, 10, 10)
                                    .addComponent(jLabel20))
                                .addComponent(jLabel18))
                            .addGap(18, 18, 18)
                            .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addComponent(cbx_Iva, javax.swing.GroupLayout.Alignment.LEADING, 0, 1, Short.MAX_VALUE)
                                .addComponent(txt_maximo, javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(txt_minimo, javax.swing.GroupLayout.Alignment.LEADING)))))
                .addContainerGap(32, Short.MAX_VALUE))
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addGap(21, 21, 21)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel16, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(btn_nombre))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(txt_nombre_productoConcadenado, javax.swing.GroupLayout.PREFERRED_SIZE, 26, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel21, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_codigo_barra, javax.swing.GroupLayout.PREFERRED_SIZE, 26, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGap(95, 95, 95)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txt_minimo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel17, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel18, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txt_maximo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel4Layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(cbx_bodega, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel23, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 14, Short.MAX_VALUE)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(jLabel20, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(cbx_Iva, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 121, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(26, Short.MAX_VALUE))
        );

        jTabbedPane2.addTab("SECCION 2", jPanel4);

        btnBoton.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/inactivar 32.png"))); // NOI18N
        btnBoton.setText("INACTIVAR");
        btnBoton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnBotonActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jTabbedPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 507, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addComponent(jLabel8, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGap(34, 34, 34)
                .addComponent(jButton5)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btnBoton)
                .addGap(38, 38, 38)
                .addComponent(jButton6)
                .addGap(45, 45, 45))
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addComponent(jLabel8, javax.swing.GroupLayout.PREFERRED_SIZE, 57, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jTabbedPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 365, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton6)
                    .addComponent(jButton5)
                    .addComponent(btnBoton))
                .addContainerGap(29, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jLabel8MouseDragged(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel8MouseDragged
        Point point = MouseInfo.getPointerInfo().getLocation();
        setLocation(point.x - x, point.y - y);
    }//GEN-LAST:event_jLabel8MouseDragged

    private void jLabel8MousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel8MousePressed
        x = evt.getX();
        y = evt.getY();
    }//GEN-LAST:event_jLabel8MousePressed

    private void jButton5ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton5ActionPerformed
//        setVisible(false);
        this.dispose();
    }//GEN-LAST:event_jButton5ActionPerformed
    public Long IdBodega(String cbx) {
        Long id = null;
        for (int i = 0; i < listBodega.size(); i++) {
            if (listBodega.get(i).getNombre_bodega().equals(cbx)) {
                id = listBodega.get(i).getId_bodega();
            }
        }
        return id;
    }
    private void jButton6ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton6ActionPerformed
        try {
            Long idIva = null;
//            if (cbx_Iva.getSelectedItem().toString().equals("SI")) {
////                producto 
            listIva = crudIva.listarIvaActivo(1);
            for (int i = 0; i < listIva.size(); i++) {
                idIva = listIva.get(i).getId_iva();
            }
//            }
            java.util.Date date = new java.util.Date();

            java.sql.Date sqlDate = new java.sql.Date(date.getTime());
            java.sql.Timestamp sqlTime = new java.sql.Timestamp(date.getTime());
            System.out.println("iva " + idIva);
            model_pdt_subcategoria_join_subcategoria sub
                    = ObtenerModel.ObtenerSubcategoria(cbx_subcategoria.getSelectedItem().toString());

            idSubCategoria = sub.getId_subcategoria().intValue();
            Long id_bodega = IdBodega(cbx_bodega.getSelectedItem().toString());
            producto.setId_bodega(id_bodega);
            producto.setId_iva(idIva);
            producto.setNombre_producto1(txt_nombre_productoConcadenado.getText());
            producto.setCodigo_barra(txt_codigo_barra.getText());
            producto.setUsuario_actulizacion("YO");
            producto.setDescrpcion(txta_descripcion.getText());
//            producto.setPrecio(Double.valueOf(txtPrecio.getText()));
            producto.setIva(cbx_Iva.getSelectedItem().toString());
            producto.setMinimo(Long.valueOf(txt_minimo.getText()));
            producto.setMaximo(Long.valueOf(txt_maximo.getText()));
            producto.setNombre_envase(txt_envase.getText());
            producto.setNombre_medida(txt_medida.getText());

//            System.out.println("articulo: " + txt_articulo.getText());
//            System.out.println("marca: " + txt_marca.getText());
//            System.out.println("id subcategoria: " + idSubCategoria);
//            System.out.println("subcategotia: " + cbx_subcategoria.getSelectedItem().toString());
//            System.out.println("medida: " + txt_medida.getText());
            producto.setId_producto(pro.getId_producto());
            String o = crudProd.actualizarProducto(producto);
            JOptionPane.showMessageDialog(null, o);
            setVisible(false);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }//GEN-LAST:event_jButton6ActionPerformed

    private void cbx_categoria11ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_categoria11ActionPerformed
        try {
            model_pdt_categoria id = ObtenerModel.ObtenerCategoria(cbx_categoria11.getSelectedItem().toString());
            idCategoria = id.getId_categoria().intValue();
            cagarCbxSubcategoria(idCategoria);
        } catch (Exception e) {
        }
    }//GEN-LAST:event_cbx_categoria11ActionPerformed

    private void cbx_subcategoriaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_subcategoriaActionPerformed
        try {
            if (!cbx_subcategoria.getSelectedItem().toString().equals("")) {
                txt_articulo.setEnabled(true);

                txt_articulo.setText("SELECCIONE...");
                txt_marca.setText("SELECCIONE...");
            }
        } catch (Exception e) {
        }
    }//GEN-LAST:event_cbx_subcategoriaActionPerformed

    private void txt_articuloMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_txt_articuloMousePressed
//
//        int i = 0;
//        String msg = null;
//        if (evt.getClickCount() == 1) {
//            String marc = txt_marca.getText();
//            model_pdt_marca_dos sub
//                    = ObtenerModel.ObtenerMarca(txt_marca.getText());
//
//            model_pdt_subcategoria_join_subcategoria subcat
//                    = ObtenerModel.ObtenerSubcategoria(cbx_subcategoria.getSelectedItem().toString());
//
//            idSubCategoria = sub.getId_subcategoria().intValue();
//
//            idMarca = sub.getId_marca().intValue();
//            System.out.println("id art " + idMarca);
//            pdtConsultaArticuloEscojer c = new pdtConsultaArticuloEscojer(new javax.swing.JFrame(), true, idMarca, marc, idSubCategoria);
//            c.setVisible(true);
//            model_pdt_articulo_dos obj = c.getObjeto();
//            try {
//                if (obj.getArticulo() != null) {
//                    txt_articulo.setText(obj.getArticulo());
//                    txt_medida.setEnabled(true);
//                }
//            } catch (Exception e) {
//            }
//
//        }
    }//GEN-LAST:event_txt_articuloMousePressed

    private void txt_articuloActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_articuloActionPerformed

    }//GEN-LAST:event_txt_articuloActionPerformed

    private void txt_marcaMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_txt_marcaMousePressed
//
//        int i = 0;
//        String msg = null;
//        if (evt.getClickCount() == 1) {
//            String cat = cbx_categoria11.getSelectedItem().toString();
//            String subCat = cbx_subcategoria.getSelectedItem().toString();
//            model_pdt_subcategoria_join_subcategoria sub
//                    = ObtenerModel.ObtenerSubcategoria(cbx_subcategoria.getSelectedItem().toString());
//
//            idSubCategoria = sub.getId_subcategoria().intValue();
//            pdtConsultaMarcaEscojer c = new pdtConsultaMarcaEscojer(new javax.swing.JFrame(), true, idSubCategoria, cat, subCat);
//            c.setVisible(true);
//            model_pdt_marca_dos obj = c.getObjeto();
//            if (obj != null) {
//                txt_marca.setText(obj.getNombre_marca());
//                txt_articulo.setEnabled(true);
//            } else {
//
//            }
//
//        }
    }//GEN-LAST:event_txt_marcaMousePressed

    private void txt_marcaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_marcaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_marcaActionPerformed

    private void cbx_IvaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cbx_IvaActionPerformed
        //        IVA = cbxIva.getSelectedItem().toString();
        //        System.out.println("iba: " + IVA);
    }//GEN-LAST:event_cbx_IvaActionPerformed

    private void btn_nombreActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_nombreActionPerformed

        //        if (!txt_marca.getText().equals("SELECCIONE...")) {
//        System.out.println("**");
        txt_nombre_productoConcadenado.setText("");
        txt_nombre_productoConcadenado.setText(txt_articulo.getText() + " DE " + txt_marca.getText() + " - ENVASE: "
                + txt_envase.getText() + " - MEDIDA: " + txt_medida.getText());
        //        }
    }//GEN-LAST:event_btn_nombreActionPerformed

    private void txt_maximoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_maximoKeyTyped
        char car = evt.getKeyChar();
        if (car < '0' || car > '9') {
            evt.consume();
        }
    }//GEN-LAST:event_txt_maximoKeyTyped

    private void txt_minimoKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_minimoKeyTyped
        char car = evt.getKeyChar();

        if (car < '0' || car > '9') {
            evt.consume();
        }
    }//GEN-LAST:event_txt_minimoKeyTyped

    private void txt_medidaMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_txt_medidaMousePressed
        int i = 0;
        String msg = null;
        if (evt.getClickCount() == 1) {

            consultaMedidaEscoger c = new consultaMedidaEscoger(new javax.swing.JFrame(), true);
            c.setVisible(true);
            try {
                objmedida = c.obtenerObj();
                if (objmedida != null) {
                    txt_medida.setText(objmedida.getNombre_medida());
                    txt_envase.setEnabled(true);
                    btn_nombre.setEnabled(true);
                    System.out.println("clic medida:" + txt_medida.getText());
                }
            } catch (Exception e) {
            }
        }
    }//GEN-LAST:event_txt_medidaMousePressed

    private void txt_medidaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_medidaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_medidaActionPerformed

    private void txt_envaseMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_txt_envaseMousePressed
        int i = 0;
        String msg = null;
        if (evt.getClickCount() == 1) {

            ConsultaEnvaseEscoger c = new ConsultaEnvaseEscoger(new javax.swing.JFrame(), true);
            c.setVisible(true);

            model_pdt_envase obj = c.obtenerObj();
            txt_envase.setText(obj.getNombre_envase());
        }
    }//GEN-LAST:event_txt_envaseMousePressed
public void btn() {
        String estado = "" + pro.getEstado();
        if ("A".equals(estado)) {
            btnBoton.setText("INACTIVAR");
        }
        if ("I".equals(estado)) {
            btnBoton.setText("ACTIVAR");
        }
    }
    private void txt_envaseActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_envaseActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_envaseActionPerformed
    public void activaInactivar() {
        String boton = btnBoton.getText();
        String estado = "";
        int r = JOptionPane.showConfirmDialog(null, "¿ESTA SEGURO DE " + boton + " A: " + pro.getNombre_producto1() + "?", "", JOptionPane.YES_NO_OPTION);
        if (r == JOptionPane.YES_OPTION) {

            if ("INACTIVAR".equals(boton)) {
                estado = "I";
            }
            if ("ACTIVAR".equals(boton)) {
                estado = "A";
            }
            pro.setId_producto(pro.getId_producto());
            pro.setEstado(estado.charAt(0));
            pro.setUsuario_actulizacion("YO");
            try {
                String msg = crudProd.activarInactivarProducto(pro);
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
            java.util.logging.Logger.getLogger(actualizarProducto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(actualizarProducto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(actualizarProducto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(actualizarProducto.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                actualizarProducto dialog = new actualizarProducto(new javax.swing.JFrame(), true);
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
    private javax.swing.JButton btn_nombre;
    private javax.swing.JComboBox<String> cbx_Iva;
    private javax.swing.JComboBox<String> cbx_bodega;
    private javax.swing.JComboBox<String> cbx_categoria11;
    private javax.swing.JComboBox<String> cbx_subcategoria;
    private javax.swing.JButton jButton5;
    private javax.swing.JButton jButton6;
    public static javax.swing.JLabel jLabel10;
    public static javax.swing.JLabel jLabel11;
    public static javax.swing.JLabel jLabel14;
    public static javax.swing.JLabel jLabel16;
    public static javax.swing.JLabel jLabel17;
    public static javax.swing.JLabel jLabel18;
    public static javax.swing.JLabel jLabel20;
    public static javax.swing.JLabel jLabel21;
    public static javax.swing.JLabel jLabel23;
    public static javax.swing.JLabel jLabel6;
    public static javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    public static javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTabbedPane jTabbedPane2;
    private javax.swing.JTextField txt_articulo;
    private javax.swing.JTextField txt_codigo_barra;
    private javax.swing.JTextField txt_envase;
    private javax.swing.JTextField txt_marca;
    private javax.swing.JTextField txt_maximo;
    private javax.swing.JTextField txt_medida;
    private javax.swing.JTextField txt_minimo;
    private javax.swing.JTextField txt_nombre_productoConcadenado;
    private javax.swing.JTextArea txta_descripcion;
    // End of variables declaration//GEN-END:variables
}
