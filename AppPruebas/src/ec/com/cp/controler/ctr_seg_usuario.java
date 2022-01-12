/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_seg_usuario_join;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_emp_empresa_join;
import ec.com.cp.model.join.model_seg_usuario_join;
import ec.com.cp.model.model_seg_rol;
import ec.com.cp.model.model_seg_usuario;
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
//@ViewScoped
public class ctr_seg_usuario {

    Fila conectarBD = new Fila();
    Connection con = null;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    CallableStatement pro;

    public String Iniciar_sesion(model_seg_usuario us) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_select_login(?,?,?) }");
            pro.setString(1, us.getNomb_usuario());
            pro.setString(2, us.getPassword());
//            pro.setLong(3, us.getId_sucursal());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.execute();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }

    public ArrayList<model_seg_usuario_join> ListaUsuarioJoinTodo() {
        model_seg_usuario_join model = null;
        ArrayList<model_seg_usuario_join> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_activo_select_all() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_usuario_join.GetUsuarioFromResultSet(rs);
                persona.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
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
    
    public ArrayList<model_seg_usuario_join> ListaUsuarioJoinTodoInactivo() {
        model_seg_usuario_join model = null;
        ArrayList<model_seg_usuario_join> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_inactivo_select_all() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_usuario_join.GetUsuarioFromResultSet(rs);
                persona.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
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

    public ArrayList<model_seg_usuario_join> ListaUsuarioJoindId(model_seg_usuario_join mu, model_emp_empresa_join me) throws ClassNotFoundException, SQLException {
        model_seg_usuario_join model = null;
        ArrayList<model_seg_usuario_join> usuario = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_select_id(?,?) }");
            pro.setLong(1, mu.getId_usuario());
            pro.setLong(2, me.getId_sucursal());
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_usuario_join.GetUsuarioFromResultSet(rs);
                usuario.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return usuario;
    }

    public ArrayList<model_seg_usuario_join> ListaUsuarioJoinNombre(model_seg_usuario_join uj, model_emp_empresa_join me) throws ClassNotFoundException, SQLException {
        model_seg_usuario_join model = null;
        ArrayList<model_seg_usuario_join> usuario = new ArrayList<model_seg_usuario_join>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_select_nombre(?,?) }");
            pro.setString(1, uj.getNombre());
            pro.setLong(2, me.getId_sucursal());
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_usuario_join.GetUsuarioFromResultSet(rs);
                usuario.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return usuario;
    }

    public ArrayList<model_seg_usuario_join> ListaUsuarioJoinCedula(model_seg_usuario_join uj, model_emp_empresa_join me) throws ClassNotFoundException, SQLException {
        model_seg_usuario_join model = null;
        ArrayList<model_seg_usuario_join> usuario = new ArrayList<model_seg_usuario_join>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_select_cedula(?,?) }");
            pro.setString(1, uj.getCedula());
            pro.setLong(2, me.getId_sucursal());
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_usuario_join.GetUsuarioFromResultSet(rs);
                usuario.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return usuario;
    }

    public String CrearUsuarioJoin(model_seg_usuario_join us, model_emp_empresa_join me) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_insert(?,?,?,?,?,?,?,?,?,?,?)}");
            pro.setString(1, us.getNombre());
            pro.setString(2, us.getCedula());
            pro.setString(3, us.getTelefono());
            pro.setString(4, us.getEmail());
            pro.setString(5, us.getDireccion());
            pro.setString(6, us.getObservacion());
            pro.setString(7, us.getUsuario_creacion());
            pro.setString(8, us.getFecha_nacimiento());
            pro.setLong(9, me.getId_sucursal());
            pro.setString(10, us.getRol());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String ActualizarUsuarioJoin(model_seg_usuario_join us, model_seg_usuario_join em) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_update(?,?,?,?,?,?,?,?,?,?,?,?)}");
            pro.setString(1, em.getNombre());
            pro.setString(2, em.getCedula());
            pro.setString(3, em.getTelefono());
            pro.setString(4, em.getEmail());
            pro.setString(5, em.getDireccion());
            pro.setString(6, em.getObservacion());
            pro.setString(7, us.getUsuario_actulizacion());
            pro.setString(8, em.getFecha_nacimiento());
            pro.setString(9, em.getRol());
            pro.setLong(10, em.getId_persona());
            pro.setLong(11, em.getId_usuario());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }

    public ArrayList<model_seg_rol> ComboRol() {
        ArrayList<model_seg_rol> lista = new ArrayList<>();
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_rol_select_combo() }");
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                model_seg_rol obj = mapper_seg_usuario_join.GetRolFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (ClassNotFoundException | SQLException e) {
            try {
                con.rollback();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }

    public String InactivarUsuarioJoin(model_seg_usuario_join us) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_update_inactivar(?,?,?)}");
            pro.setString(1, us.getNomb_usuario());
            pro.setLong(2, us.getId_usuario());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    

    public String ActivarUsuarioJoin(model_seg_usuario_join us) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_update_activar(?,?,?)}");
            pro.setString(1, us.getNomb_usuario());
            pro.setLong(2, us.getId_usuario());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }

    public String ConfirmarClave(model_seg_usuario_join us) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_cuenta_confirmar_clave(?,?,?)}");
            pro.setLong(1, us.getId_usuario());
            pro.setString(2, us.getPassword());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String ActualizarUsuario(model_seg_usuario_join us) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_usuario_cuenta_mantenimiento(?,?,?,?)}");
            pro.setLong(1, us.getId_usuario());
            pro.setString(2, us.getNomb_usuario());
            pro.setString(3, us.getPassword());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
}
