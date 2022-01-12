/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_co_orden_compra;
import ec.com.cp.model.Fila;
import ec.com.cp.model.model_co_cabecera_compra;
import ec.com.cp.model.model_co_detalle_compra;
import ec.com.cp.model.model_inv_detalle_tarifario;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class ctr_co_orden_compra {

    Connection con = null;
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    
    public ArrayList<model_co_cabecera_compra> ListaOrdenCompraJoinTodo(int op) {
        model_co_cabecera_compra model = null;
        ArrayList<model_co_cabecera_compra> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call co_orden_compra_cabecera_select_all(?) }");
            pro.setInt(1, op);
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_co_orden_compra.GetOrdenCompraFromResultSet(rs);
                persona.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return persona;
    }
    
    public ArrayList<model_co_detalle_compra> ListaOrdenCompraDetalleJoinTodo(model_co_detalle_compra oc) {
        model_co_detalle_compra model = null;
        ArrayList<model_co_detalle_compra> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call co_orden_compra_detatlle_select(?) }");
            pro.setLong(1, oc.getId_cabecera());
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_co_orden_compra.GetOrdenCompraDetalleFromResultSet(rs);
                persona.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return persona;
    }
    
    public String insertarCabeceraVenta(model_co_cabecera_compra obj, int op) {
        String valor = "";
        try {
//            IN op INT, IN `id_cliente1`INT,IN `id_sucursal1` INT,
//               IN `estado1` CHAR(1), IN `forma_pago1` VARCHAR(20),
//                   IN `total_subtotal1` DOUBLE,IN `total_iva1` DOUBLE,
//                        IN `total_descuento1` DOUBLE,IN `total_facturado1` DOUBLE,
//                      IN `usuario_creacion1` VARCHAR(80)
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_orden_compra_cabecera_insert(?,?,?,?,?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, obj.getId_proveedor());
            prodProAlm.setLong(3, obj.getId_sucursal());
            prodProAlm.setString(4, "" + obj.getEstado());
            prodProAlm.setString(5, obj.getForma_pago());
            prodProAlm.setDouble(6, obj.getTotal_subtotal());
            prodProAlm.setDouble(7, obj.getTotal_iva());
            prodProAlm.setDouble(8, obj.getTotal_descuento());
            prodProAlm.setDouble(9, obj.getTotal_facturado());
            prodProAlm.setString(10, obj.getUsuario_creacion());
            prodProAlm.setString(11, obj.getF_creacion().toString());
//            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
//            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }

    public String insertarDetalleCompra(model_co_detalle_compra obj, Long id_proveedor, Long id_sucursal,
            double Tfacturado, String fecha) {
        String valor = "";
        try {/*N `id_cliente1` INT,IN `id_sucursal1` INT,
              IN `total_facturado1` DOUBLE(15,7), IN `f_creacion1` DATETIME,
            
            
            IN `linea_detalle1` INT,IN `id_producto1` INT,IN `cantidad1` INT,
            IN `descripcion1` VARCHAR(200),IN `precio_unitario1` DOUBLE(15,7),
            IN `sub_total1` DOUBLE(15,7),IN `iva1` DOUBLE(15,7),
            IN `decuento1` DOUBLE(15,7), IN `total1` DOUBLE(15,7),
            OUT valor TEXT*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_orden_compra_detalle_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?) }");
            prodProAlm.setLong(1, id_proveedor);
            prodProAlm.setLong(2, id_sucursal);
            prodProAlm.setDouble(3, Tfacturado);
            prodProAlm.setString(4, fecha);
            //////////////////detalle
            prodProAlm.setInt(5, obj.getLinea_detalle());
            prodProAlm.setLong(6, obj.getId_producto());
            prodProAlm.setInt(7, obj.getCantidad());
            prodProAlm.setString(8, obj.getDescripcion());
            prodProAlm.setDouble(9, obj.getPrecio_unitario());
            prodProAlm.setDouble(10, obj.getSub_total());
            prodProAlm.setDouble(11, obj.getIva());
            prodProAlm.setDouble(12, obj.getDecuento());
            prodProAlm.setDouble(13, obj.getTotal());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String AprobarOrdenCompra(model_co_cabecera_compra obj) {
        String valor = "";
        try {/*id_cab BIGINT, tot_subt DOUBLE, t_iva DOUBLE, t_facturado DOUBLE, u_act TEXT, 
    reci TEXT, veri TEXT, OUT valor TEXT*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_orden_compra_cabecera_update(?,?,?,?,?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_cabecera());
            prodProAlm.setDouble(2, obj.getTotal_subtotal());
            prodProAlm.setDouble(3, obj.getTotal_iva());
            prodProAlm.setDouble(4, obj.getTotal_facturado());
            prodProAlm.setString(5, obj.getUsuario_actulizacion());
            prodProAlm.setString(6, obj.getRecibido());
            prodProAlm.setString(7, obj.getVerificado());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String AprobarOrdenCompraDetalle(model_co_detalle_compra obj) {
        String valor = "";
        try {/*id_cab BIGINT, id_pro INT, cant INT, pre_unit DOUBLE, sub_tot DOUBLE, 
    iv DOUBLE, tot DOUBLE, OUT valor TEXT*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_orden_compra_detalle_update(?,?,?,?,?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_cabecera());
            prodProAlm.setLong(2, obj.getId_producto());
            prodProAlm.setLong(3, obj.getCantidad());
            prodProAlm.setDouble(4, obj.getPrecio_unitario());
            prodProAlm.setDouble(5, obj.getSub_total());
            prodProAlm.setDouble(6, obj.getIva());
            prodProAlm.setDouble(7, obj.getTotal());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String GuardarDetalleInventarioTarifario(model_inv_detalle_tarifario obj) {
        String valor = "";
        try {/* IN id_producto1 INT,IN valor_costo1 DOUBLE,IN valor_venta1 DOUBLE,
                IN valor_descuento1 DOUBLE,IN aplica_iva1 VARCHAR(5))*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_detalle_tarifario_insert_and_update(?,?,?) }");
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setDouble(2, obj.getValor_costo());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
}
