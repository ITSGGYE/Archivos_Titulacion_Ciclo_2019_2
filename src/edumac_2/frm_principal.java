
package edumac_2;

import java.awt.Desktop;
import static java.awt.Frame.MAXIMIZED_BOTH;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.beans.PropertyVetoException;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.imageio.ImageIO;
import javax.swing.JDesktopPane;
import javax.swing.JOptionPane;
import javax.swing.Timer;

public class frm_principal extends javax.swing.JFrame {

    public String sql="" ;         
    public InputStream foto1=this.getClass().getResourceAsStream("/Imagenes/Fondo.jpg");
    public String   p_est="'A'";
    Validaciones vl = new Validaciones();

//Menu Usuario    
    public static frm_cambiar_claves        v_camb_cla      ;
    public static frm_usuarios              v_usua          ;
    public static frm_empleados             v_empl          ;
    public static frm_permiso               v_permiso       ;
    public static frm_val_salida_sist       v_sal_sist      ;
    
//Menu Mantenimienmto    
    public static frm_documentos            v_doc           ;
    public static frm_formas_d_pago         v_fdp           ;
    public static frm_instituciones         v_inst          ;
    public static frm_paralelos             v_paralel       ;       
    public static frm_parentescos           v_parent        ;
    public static frm_periodo               v_perio         ;       
    public static frm_roles                 v_rol           ;
//Menu Estudiante    
    public static frm_estudiantes           v_estud         ;
    public static frm_familiar              v_famil         ;
    public static frm_rel_alu_fam           v_rel_alu_fam   ;
//Menu Matriculación    
    public static frm_inicio_lectivo        v_ini_lect      ;        
    public static frm_matriculas            v_matric        ;
    public static frm_doc_falt_x_alu        v_doc_fal_x_alu ;      
//Menu Caja    
    public static frm_caja_ingreso          v_caja_ingreso  ;
    public static frm_caja_reverso          v_caja_reverso  ;
    
//Menu Reportes    
    public static frm_rep_doc_falt_paral    v_rep_doc_falt  ;
    public static frm_rep_mat_paralelo      v_rep_mat_para  ;
    public static frm_rep_pens_x_cobrar     v_rep_pens_x_cob;
    public static frm_rep_cob_x_dia         v_rep_cob_x_dia ;
    public static frm_rep_cob_x_fechas      v_rep_cob_x_fec ; 
//Menu Ayuda    
    public static frm_acerca_d              v_acerca_de     ;      
    public static frm_creditos_sist         v_credit        ;      
//Formularios de apoyo    
    public static frm_buscar_empleado       v_busc_emple    ;    
    public static frm_buscar_estudiante     v_busc_estud    ; 
    public static frm_buscar_persona        v_busc_person   ; 
    
           
    public frm_principal(){
        initComponents();       
        cargarImagen(jdp_escritorio,foto1);
        this.setExtendedState(MAXIMIZED_BOTH);
        this.setResizable(true);
        vl.logo_p(this);
        setTitle("EDUMMAC - Ventana Principal");
        Date fecha_sist = new Date();
        SimpleDateFormat formato = new SimpleDateFormat("dd-MMM-YYYY");
        txt_fecha.setText(formato.format(fecha_sist));
        Timer tiempo = new Timer(100,new frm_principal.hora());
        tiempo.start(); 
    }

    public class hora implements ActionListener {
        
        public void actionPerformed(ActionEvent e) {
            Date hora_sist = new Date();
            String pmam = "hh:mm:ss a";
            SimpleDateFormat format = new SimpleDateFormat(pmam);
            Calendar hoy = Calendar.getInstance();
            horas.setText(String.format(format.format(hora_sist),hoy));                  
        }
    }
    
    public  void cargarImagen(javax.swing.JDesktopPane jDeskp,InputStream fileImagen)
    {   
        try{   
            BufferedImage image = ImageIO.read(fileImagen);        
              jDeskp.setBorder(new Fondo(image)); }
        catch (Exception e){   System.out.println("Imagen no disponible");   }        
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jdp_escritorio = new javax.swing.JDesktopPane();
        pnl_barra_estado = new javax.swing.JPanel();
        lbl_1 = new javax.swing.JTextField();
        txt_usuario = new javax.swing.JTextField();
        lbl_2 = new javax.swing.JLabel();
        txt_rol = new javax.swing.JTextField();
        lbl_3 = new javax.swing.JLabel();
        txt_fecha = new javax.swing.JTextField();
        lbl_4 = new javax.swing.JLabel();
        horas = new javax.swing.JLabel();
        jmb_menu_principal = new javax.swing.JMenuBar();
        men_usuario = new javax.swing.JMenu();
        smn_usu_cambiar_clave = new javax.swing.JMenuItem();
        smn_usu_usuario = new javax.swing.JMenuItem();
        smn_usu_empleado = new javax.swing.JMenuItem();
        smn_usu_permiso = new javax.swing.JMenuItem();
        smn_inic_salir = new javax.swing.JMenuItem();
        men_mantenimiento = new javax.swing.JMenu();
        smn_mant_documento = new javax.swing.JMenuItem();
        smn_mant_forma_pago = new javax.swing.JMenuItem();
        smn_mant_institucion = new javax.swing.JMenuItem();
        smn_mant_paralelo = new javax.swing.JMenuItem();
        smn_mant_parentesco = new javax.swing.JMenuItem();
        smn_mant_periodo = new javax.swing.JMenuItem();
        smn_mant_rol = new javax.swing.JMenuItem();
        men_estudiante = new javax.swing.JMenu();
        smn_estud_estudiante = new javax.swing.JMenuItem();
        smn_estud_familiar = new javax.swing.JMenuItem();
        smn_estud_rel_alu_fam = new javax.swing.JMenuItem();
        men_matriculacion = new javax.swing.JMenu();
        smn_matri_inici_año = new javax.swing.JMenuItem();
        smn_matri_matricula = new javax.swing.JMenuItem();
        smn_matri_doc_falt = new javax.swing.JMenuItem();
        men_caja = new javax.swing.JMenu();
        smn_caja_caja_ingreso = new javax.swing.JMenuItem();
        smn_caja_caja_reverso = new javax.swing.JMenuItem();
        men_reportes = new javax.swing.JMenu();
        smn_rep_doc_falt_gen = new javax.swing.JMenuItem();
        smn_rep_mat_para = new javax.swing.JMenuItem();
        smn_rep_mens_pend = new javax.swing.JMenuItem();
        smn_rep_cob_x_dia = new javax.swing.JMenuItem();
        smn_rep_cob_x_fechas = new javax.swing.JMenuItem();
        men_ayuda = new javax.swing.JMenu();
        smn_ayuda_ayuda = new javax.swing.JMenuItem();
        smn_ayuda_acerca_de = new javax.swing.JMenuItem();
        smn_ayuda_creditos = new javax.swing.JMenuItem();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
        });

        jdp_escritorio.setBackground(new java.awt.Color(255, 255, 255));

        javax.swing.GroupLayout jdp_escritorioLayout = new javax.swing.GroupLayout(jdp_escritorio);
        jdp_escritorio.setLayout(jdp_escritorioLayout);
        jdp_escritorioLayout.setHorizontalGroup(
            jdp_escritorioLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 1005, Short.MAX_VALUE)
        );
        jdp_escritorioLayout.setVerticalGroup(
            jdp_escritorioLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 643, Short.MAX_VALUE)
        );

        pnl_barra_estado.setBorder(javax.swing.BorderFactory.createEtchedBorder());

        lbl_1.setEditable(false);
        lbl_1.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        lbl_1.setText("Usuario:");
        lbl_1.setBorder(null);

        txt_usuario.setEditable(false);
        txt_usuario.setHorizontalAlignment(javax.swing.JTextField.LEFT);
        txt_usuario.setBorder(javax.swing.BorderFactory.createEtchedBorder());

        lbl_2.setText("Rol");

        txt_rol.setEditable(false);

        lbl_3.setText("Fecha:");

        txt_fecha.setEditable(false);

        lbl_4.setText("Hora;");

        horas.setBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED));

        javax.swing.GroupLayout pnl_barra_estadoLayout = new javax.swing.GroupLayout(pnl_barra_estado);
        pnl_barra_estado.setLayout(pnl_barra_estadoLayout);
        pnl_barra_estadoLayout.setHorizontalGroup(
            pnl_barra_estadoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_barra_estadoLayout.createSequentialGroup()
                .addComponent(lbl_1, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(24, 24, 24)
                .addComponent(txt_usuario, javax.swing.GroupLayout.PREFERRED_SIZE, 220, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(46, 46, 46)
                .addComponent(lbl_2)
                .addGap(18, 18, 18)
                .addComponent(txt_rol, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(lbl_3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(txt_fecha, javax.swing.GroupLayout.PREFERRED_SIZE, 77, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(19, 19, 19)
                .addComponent(lbl_4)
                .addGap(18, 18, 18)
                .addComponent(horas, javax.swing.GroupLayout.PREFERRED_SIZE, 95, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(191, Short.MAX_VALUE))
        );
        pnl_barra_estadoLayout.setVerticalGroup(
            pnl_barra_estadoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnl_barra_estadoLayout.createSequentialGroup()
                .addGroup(pnl_barra_estadoLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lbl_1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txt_usuario, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_2)
                    .addComponent(txt_rol, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_3)
                    .addComponent(txt_fecha, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lbl_4)
                    .addComponent(horas, javax.swing.GroupLayout.PREFERRED_SIZE, 20, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        men_usuario.setText("Seguridad");

        smn_usu_cambiar_clave.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Cambiar_Clave.png"))); // NOI18N
        smn_usu_cambiar_clave.setText("Cambiar Clave");
        smn_usu_cambiar_clave.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_usu_cambiar_claveActionPerformed(evt);
            }
        });
        men_usuario.add(smn_usu_cambiar_clave);

        smn_usu_usuario.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Usuario.png"))); // NOI18N
        smn_usu_usuario.setText("Usuario");
        smn_usu_usuario.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_usu_usuarioActionPerformed(evt);
            }
        });
        men_usuario.add(smn_usu_usuario);

        smn_usu_empleado.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Empleados.png"))); // NOI18N
        smn_usu_empleado.setText("Empleados");
        smn_usu_empleado.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_usu_empleadoActionPerformed(evt);
            }
        });
        men_usuario.add(smn_usu_empleado);

        smn_usu_permiso.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Permiso.png"))); // NOI18N
        smn_usu_permiso.setText("Permisos");
        smn_usu_permiso.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_usu_permisoActionPerformed(evt);
            }
        });
        men_usuario.add(smn_usu_permiso);

        smn_inic_salir.setText("Salir");
        smn_inic_salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_inic_salirActionPerformed(evt);
            }
        });
        men_usuario.add(smn_inic_salir);

        jmb_menu_principal.add(men_usuario);

        men_mantenimiento.setText("Mantenimiento");
        men_mantenimiento.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                men_mantenimientoActionPerformed(evt);
            }
        });

        smn_mant_documento.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Documentos.png"))); // NOI18N
        smn_mant_documento.setText("Documento");
        smn_mant_documento.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_documentoActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_documento);

        smn_mant_forma_pago.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_F_Pago.png"))); // NOI18N
        smn_mant_forma_pago.setText("Forma de Pago");
        smn_mant_forma_pago.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_forma_pagoActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_forma_pago);

        smn_mant_institucion.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Institucion.png"))); // NOI18N
        smn_mant_institucion.setText("Información Institución");
        smn_mant_institucion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_institucionActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_institucion);

        smn_mant_paralelo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Paralelo.png"))); // NOI18N
        smn_mant_paralelo.setText("Paralelo");
        smn_mant_paralelo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_paraleloActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_paralelo);

        smn_mant_parentesco.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Parentesco.png"))); // NOI18N
        smn_mant_parentesco.setText("Parentesco");
        smn_mant_parentesco.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_parentescoActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_parentesco);

        smn_mant_periodo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Periodo.png"))); // NOI18N
        smn_mant_periodo.setText("Periodo");
        smn_mant_periodo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_periodoActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_periodo);

        smn_mant_rol.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Roles.png"))); // NOI18N
        smn_mant_rol.setText("Roles");
        smn_mant_rol.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_mant_rolActionPerformed(evt);
            }
        });
        men_mantenimiento.add(smn_mant_rol);

        jmb_menu_principal.add(men_mantenimiento);

        men_estudiante.setText("Estudiante");
        men_estudiante.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                men_estudianteActionPerformed(evt);
            }
        });

        smn_estud_estudiante.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Estudiante.png"))); // NOI18N
        smn_estud_estudiante.setText("Estudiante");
        smn_estud_estudiante.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_estud_estudianteActionPerformed(evt);
            }
        });
        men_estudiante.add(smn_estud_estudiante);

        smn_estud_familiar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Familiar.png"))); // NOI18N
        smn_estud_familiar.setText("Familiares");
        smn_estud_familiar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_estud_familiarActionPerformed(evt);
            }
        });
        men_estudiante.add(smn_estud_familiar);

        smn_estud_rel_alu_fam.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Rel_Fam.png"))); // NOI18N
        smn_estud_rel_alu_fam.setText("Familiares del Estudiante");
        smn_estud_rel_alu_fam.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_estud_rel_alu_famActionPerformed(evt);
            }
        });
        men_estudiante.add(smn_estud_rel_alu_fam);

        jmb_menu_principal.add(men_estudiante);

        men_matriculacion.setText("Matriculación");
        men_matriculacion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                men_matriculacionActionPerformed(evt);
            }
        });

        smn_matri_inici_año.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Ini_Lect.png"))); // NOI18N
        smn_matri_inici_año.setText("Inicio Año Lectivo");
        smn_matri_inici_año.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_matri_inici_añoActionPerformed(evt);
            }
        });
        men_matriculacion.add(smn_matri_inici_año);

        smn_matri_matricula.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Matricula.png"))); // NOI18N
        smn_matri_matricula.setText("Matricula");
        smn_matri_matricula.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_matri_matriculaActionPerformed(evt);
            }
        });
        men_matriculacion.add(smn_matri_matricula);

        smn_matri_doc_falt.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Doc_Entreg.png"))); // NOI18N
        smn_matri_doc_falt.setText("Documentos Entregados");
        smn_matri_doc_falt.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_matri_doc_faltActionPerformed(evt);
            }
        });
        men_matriculacion.add(smn_matri_doc_falt);

        jmb_menu_principal.add(men_matriculacion);

        men_caja.setText("Caja");

        smn_caja_caja_ingreso.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Caja_Ingreso.png"))); // NOI18N
        smn_caja_caja_ingreso.setText("Ingresar Pagos");
        smn_caja_caja_ingreso.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_caja_caja_ingresoActionPerformed(evt);
            }
        });
        men_caja.add(smn_caja_caja_ingreso);

        smn_caja_caja_reverso.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Caja_Reverso.png"))); // NOI18N
        smn_caja_caja_reverso.setText("Reversar Pagos");
        smn_caja_caja_reverso.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_caja_caja_reversoActionPerformed(evt);
            }
        });
        men_caja.add(smn_caja_caja_reverso);

        jmb_menu_principal.add(men_caja);

        men_reportes.setText("Reportes");

        smn_rep_doc_falt_gen.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Rep_Doc_Falt.png"))); // NOI18N
        smn_rep_doc_falt_gen.setText("Documentos Faltantes");
        smn_rep_doc_falt_gen.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_rep_doc_falt_genActionPerformed(evt);
            }
        });
        men_reportes.add(smn_rep_doc_falt_gen);

        smn_rep_mat_para.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Mat_x_Paral.png"))); // NOI18N
        smn_rep_mat_para.setText("Matriculados por Paralelo");
        smn_rep_mat_para.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_rep_mat_paraActionPerformed(evt);
            }
        });
        men_reportes.add(smn_rep_mat_para);

        smn_rep_mens_pend.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Mens_x_Cobrar.png"))); // NOI18N
        smn_rep_mens_pend.setText("Mensualidades por Cobrar");
        smn_rep_mens_pend.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_rep_mens_pendActionPerformed(evt);
            }
        });
        men_reportes.add(smn_rep_mens_pend);

        smn_rep_cob_x_dia.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Cobro_x_Dia.png"))); // NOI18N
        smn_rep_cob_x_dia.setText("Cobros por Día");
        smn_rep_cob_x_dia.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_rep_cob_x_diaActionPerformed(evt);
            }
        });
        men_reportes.add(smn_rep_cob_x_dia);

        smn_rep_cob_x_fechas.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Iconos/M_Cobro_x_Fecha.png"))); // NOI18N
        smn_rep_cob_x_fechas.setText("Cobros por Fecha");
        smn_rep_cob_x_fechas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_rep_cob_x_fechasActionPerformed(evt);
            }
        });
        men_reportes.add(smn_rep_cob_x_fechas);

        jmb_menu_principal.add(men_reportes);

        men_ayuda.setText("Ayuda");
        men_ayuda.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                men_ayudaActionPerformed(evt);
            }
        });

        smn_ayuda_ayuda.setIcon(new javax.swing.ImageIcon(getClass().getResource("/iconos/M_Manual_Usuario.png"))); // NOI18N
        smn_ayuda_ayuda.setText("Ayuda");
        smn_ayuda_ayuda.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_ayuda_ayudaActionPerformed(evt);
            }
        });
        men_ayuda.add(smn_ayuda_ayuda);

        smn_ayuda_acerca_de.setText("Acerca De");
        smn_ayuda_acerca_de.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_ayuda_acerca_deActionPerformed(evt);
            }
        });
        men_ayuda.add(smn_ayuda_acerca_de);

        smn_ayuda_creditos.setText("Créditos");
        smn_ayuda_creditos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                smn_ayuda_creditosActionPerformed(evt);
            }
        });
        men_ayuda.add(smn_ayuda_creditos);

        jmb_menu_principal.add(men_ayuda);

        setJMenuBar(jmb_menu_principal);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(pnl_barra_estado, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jdp_escritorio)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jdp_escritorio, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(pnl_barra_estado, javax.swing.GroupLayout.PREFERRED_SIZE, 31, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(1, 1, 1))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void smn_inic_salirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_inic_salirActionPerformed
        if(v_sal_sist==null){
            v_sal_sist = new frm_val_salida_sist();
            vl.ver_pantalla(jdp_escritorio, v_sal_sist);
        }
    }//GEN-LAST:event_smn_inic_salirActionPerformed
   
    private void smn_usu_cambiar_claveActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_usu_cambiar_claveActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_camb_cla==null){
                v_camb_cla = new frm_cambiar_claves();
                vl.ver_pantalla(jdp_escritorio, v_camb_cla);
            }else{
                try {
                    v_camb_cla.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }

        }else{
            enfocar_ventana();               
        }
    }//GEN-LAST:event_smn_usu_cambiar_claveActionPerformed
    
    public  void val_menu(String rol_usua){
        boolean vsb = false;
        vsb = false;
        smn_usu_usuario.setVisible(vsb);
        smn_usu_empleado.setVisible(vsb);
        smn_usu_permiso.setVisible(vsb); 
        smn_usu_usuario.setVisible(vsb);
        smn_mant_documento.setVisible(vsb);
        smn_mant_forma_pago.setVisible(vsb);
        smn_mant_institucion.setVisible(vsb);
        smn_mant_paralelo.setVisible(vsb);
        smn_mant_parentesco.setVisible(vsb);
        smn_mant_periodo.setVisible(vsb);
        smn_mant_rol.setVisible(vsb);
        smn_estud_estudiante.setVisible(vsb);
        smn_estud_familiar.setVisible(vsb);
        smn_estud_rel_alu_fam.setVisible(vsb);
        smn_matri_inici_año.setVisible(vsb);
        smn_matri_matricula.setVisible(vsb);
        smn_matri_doc_falt.setVisible(vsb);
        smn_caja_caja_ingreso.setVisible(vsb);
        smn_caja_caja_reverso.setVisible(vsb);
        smn_rep_doc_falt_gen.setVisible(vsb);
        smn_rep_mat_para.setVisible(vsb);
        smn_rep_mens_pend.setVisible(vsb);
        smn_rep_cob_x_dia.setVisible(vsb);
        smn_rep_cob_x_fechas.setVisible(vsb);   
        
        try {
             CRUD b_men = new CRUD();
             sql="SELECT ms.menu_secu \n" +
                     " FROM perfil AS p INNER JOIN permiso AS pr ON p.id_permiso = pr.id\n" +
                     " INNER JOIN menu_secu AS ms ON pr.id_menu_secu = ms.id\n" +
                     " INNER JOIN rol AS r ON p.id_rol = r.id \n" +
                     " WHERE r.`rol` = '" + rol_usua + "' \n" +
                     " AND p.est_reg= 'A'" ;
                     //" AND (pr.nuevo ='S' OR pr.modificar ='S' OR PR.eliminar='S')";
             ResultSet rs = b_men.select(sql);
             if (rs.next()!= false){
                 vsb = true;
                 do{
                     if (smn_usu_usuario.getText().equals(rs.getString("ms.menu_secu")))  
                         smn_usu_usuario.setVisible(vsb);
                     if (smn_usu_empleado.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_usu_empleado.setVisible(vsb);
                     if (smn_usu_permiso.getText().equals(rs.getString("ms.menu_secu")))  
                         smn_usu_permiso.setVisible(vsb);
                     if (smn_mant_documento.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_mant_documento.setVisible(vsb);
                     if (smn_mant_forma_pago.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_mant_forma_pago.setVisible(vsb);
                     if (smn_mant_institucion.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_mant_institucion.setVisible(vsb);
                     if (smn_mant_paralelo.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_mant_paralelo.setVisible(vsb);
                     if (smn_mant_parentesco.getText().equals(rs.getString("ms.menu_secu")))
                         smn_mant_parentesco.setVisible(vsb);
                     if (smn_mant_periodo.getText().equals(rs.getString("ms.menu_secu")))  
                         smn_mant_periodo.setVisible(vsb);
                     if (smn_mant_rol.getText().equals(rs.getString("ms.menu_secu")))
                         smn_mant_rol.setVisible(vsb);
                     if (smn_estud_estudiante.getText().equals(rs.getString("ms.menu_secu")))
                         smn_estud_estudiante.setVisible(vsb);
                     if (smn_estud_familiar.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_estud_familiar.setVisible(vsb);
                     if (smn_estud_rel_alu_fam.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_estud_rel_alu_fam.setVisible(vsb);
                     if (smn_matri_inici_año.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_matri_inici_año.setVisible(vsb);
                     if (smn_matri_matricula.getText().equals(rs.getString("ms.menu_secu")))
                         smn_matri_matricula.setVisible(vsb);
                     if (smn_matri_doc_falt.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_matri_doc_falt.setVisible(vsb);
                     if (smn_caja_caja_ingreso.getText().equals(rs.getString("ms.menu_secu")))
                         smn_caja_caja_ingreso.setVisible(vsb);
                     if (smn_caja_caja_reverso.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_caja_caja_reverso.setVisible(vsb);
                     if (smn_rep_doc_falt_gen.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_rep_doc_falt_gen.setVisible(vsb);
                     if (smn_rep_mat_para.getText().equals(rs.getString("ms.menu_secu"))) 
                         smn_rep_mat_para.setVisible(vsb);
                     if (smn_rep_mens_pend.getText().equals(rs.getString("ms.menu_secu")))
                         smn_rep_mens_pend.setVisible(vsb);
                     if (smn_rep_cob_x_dia.getText().equals(rs.getString("ms.menu_secu")))
                         smn_rep_cob_x_dia.setVisible(vsb);
                     if (smn_rep_cob_x_fechas.getText().equals(rs.getString("ms.menu_secu")))
                         smn_rep_cob_x_fechas.setVisible(vsb);                    
                 }while(rs.next());     
             }
             
        } catch (SQLException ex) {
             Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
         }
    }
    
    private void smn_usu_usuarioActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_usu_usuarioActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_usua==null){
                v_usua = new frm_usuarios();
                vl.ver_pantalla(jdp_escritorio, v_usua);
            }else{
                try {
                    v_usua.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }
    }//GEN-LAST:event_smn_usu_usuarioActionPerformed

    private void smn_usu_empleadoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_usu_empleadoActionPerformed
         if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_empl==null){
                v_empl = new frm_empleados();
                vl.ver_pantalla(jdp_escritorio, v_empl);
            }else{
                try {
                    v_empl.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }
    }//GEN-LAST:event_smn_usu_empleadoActionPerformed

    private void smn_mant_documentoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_documentoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_doc==null){
                v_doc = new frm_documentos();
                vl.ver_pantalla(jdp_escritorio, v_doc);
            }else{
                try {
                    v_doc.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_mant_documentoActionPerformed

    private void smn_mant_forma_pagoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_forma_pagoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_fdp==null){
                v_fdp = new frm_formas_d_pago();
                vl.ver_pantalla(jdp_escritorio, v_fdp);
            }else{
                try {
                    v_fdp.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_mant_forma_pagoActionPerformed

    private void smn_mant_institucionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_institucionActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_inst==null){
                v_inst = new frm_instituciones();
                vl.ver_pantalla(jdp_escritorio, v_inst);
            }else{
                try {
                    v_inst.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_mant_institucionActionPerformed

    private void smn_mant_paraleloActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_paraleloActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_paralel==null){
                v_paralel = new frm_paralelos();
                vl.ver_pantalla(jdp_escritorio, v_paralel);
            }else{
                try {
                    v_paralel.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_mant_paraleloActionPerformed

    private void smn_mant_parentescoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_parentescoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_parent==null){
                v_parent = new frm_parentescos();
                vl.ver_pantalla(jdp_escritorio, v_parent);
            }else{
                try {
                    v_parent.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_mant_parentescoActionPerformed

    private void smn_mant_periodoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_periodoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_perio==null){
                v_perio = new frm_periodo();
                vl.ver_pantalla(jdp_escritorio, v_perio);
            }else{
                try {
                    v_perio.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }   
    }//GEN-LAST:event_smn_mant_periodoActionPerformed

    private void smn_mant_rolActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_mant_rolActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rol==null){
                v_rol = new frm_roles();
                vl.ver_pantalla(jdp_escritorio, v_rol);
            }else{
                try {
                    v_rol.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_mant_rolActionPerformed

    private void men_mantenimientoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_men_mantenimientoActionPerformed

    }//GEN-LAST:event_men_mantenimientoActionPerformed

    private void smn_estud_estudianteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_estud_estudianteActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_estud==null){
                v_estud = new frm_estudiantes();
                vl.ver_pantalla(jdp_escritorio, v_estud);
            }else{
                try {
                    v_estud.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_estud_estudianteActionPerformed

    private void smn_estud_familiarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_estud_familiarActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_famil==null){
                v_famil = new frm_familiar();
                vl.ver_pantalla(jdp_escritorio, v_famil);
            }else{
                try {
                    v_famil.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_estud_familiarActionPerformed

    private void men_estudianteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_men_estudianteActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_men_estudianteActionPerformed

    private void smn_matri_inici_añoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_matri_inici_añoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_ini_lect==null){
                v_ini_lect = new frm_inicio_lectivo();
                vl.ver_pantalla(jdp_escritorio, v_ini_lect);
            }else{
                try {
                    v_ini_lect.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_matri_inici_añoActionPerformed

    private void smn_matri_matriculaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_matri_matriculaActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_matric==null){
                v_matric = new frm_matriculas();
                vl.ver_pantalla(jdp_escritorio, v_matric);
            }else{
                try {
                    v_matric.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_matri_matriculaActionPerformed

    private void smn_matri_doc_faltActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_matri_doc_faltActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_doc_fal_x_alu==null){
                v_doc_fal_x_alu = new frm_doc_falt_x_alu();
                vl.ver_pantalla(jdp_escritorio, v_doc_fal_x_alu);
            }else{
                try {
                    v_doc_fal_x_alu.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_matri_doc_faltActionPerformed

    private void men_matriculacionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_men_matriculacionActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_men_matriculacionActionPerformed

    private void smn_caja_caja_ingresoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_caja_caja_ingresoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_caja_ingreso==null){
                v_caja_ingreso = new frm_caja_ingreso();
                vl.ver_pantalla(jdp_escritorio, v_caja_ingreso);
            }else{
                try {
                    v_caja_ingreso.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_caja_caja_ingresoActionPerformed

    private void smn_rep_doc_falt_genActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_rep_doc_falt_genActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rep_doc_falt==null){
                v_rep_doc_falt = new frm_rep_doc_falt_paral();
                vl.ver_pantalla(jdp_escritorio, v_rep_doc_falt);
            }else{
                try {
                    v_rep_doc_falt.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }else{
            enfocar_ventana();               
        }        
    }//GEN-LAST:event_smn_rep_doc_falt_genActionPerformed

    private void smn_rep_mat_paraActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_rep_mat_paraActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rep_mat_para==null){
                v_rep_mat_para = new frm_rep_mat_paralelo();
                vl.ver_pantalla(jdp_escritorio, v_rep_mat_para);
            }else{
                try {
                    v_rep_mat_para.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_rep_mat_paraActionPerformed

    private void smn_ayuda_acerca_deActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_ayuda_acerca_deActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_acerca_de==null){
                v_acerca_de = new frm_acerca_d();
                vl.ver_pantalla(jdp_escritorio, v_acerca_de);
            }else{
                try {
                    v_acerca_de.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_ayuda_acerca_deActionPerformed

    private void smn_ayuda_creditosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_ayuda_creditosActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_credit==null){
                v_credit = new frm_creditos_sist();
                vl.ver_pantalla(jdp_escritorio, v_credit);
            }else{
                try {
                    v_credit.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_ayuda_creditosActionPerformed

    private void men_ayudaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_men_ayudaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_men_ayudaActionPerformed

    private void smn_rep_cob_x_diaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_rep_cob_x_diaActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rep_cob_x_dia==null){
                v_rep_cob_x_dia = new frm_rep_cob_x_dia();
                vl.ver_pantalla(jdp_escritorio, v_rep_cob_x_dia);
            }else{
                try {
                    v_rep_cob_x_dia.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_rep_cob_x_diaActionPerformed

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_sal_sist==null){
                v_sal_sist = new frm_val_salida_sist();
                vl.ver_pantalla(jdp_escritorio, v_sal_sist);
            }else{
                try {
                    v_sal_sist.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }   
    }//GEN-LAST:event_formWindowClosed

    private void smn_rep_mens_pendActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_rep_mens_pendActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rep_pens_x_cob==null){
                v_rep_pens_x_cob = new frm_rep_pens_x_cobrar();
                vl.ver_pantalla(jdp_escritorio, v_rep_pens_x_cob);
            }else{
                try {
                    v_rep_pens_x_cob.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_rep_mens_pendActionPerformed

    private void smn_rep_cob_x_fechasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_rep_cob_x_fechasActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rep_cob_x_fec==null){
                v_rep_cob_x_fec = new frm_rep_cob_x_fechas();
                vl.ver_pantalla(jdp_escritorio, v_rep_cob_x_fec);
            }else{
                try {
                    v_rep_cob_x_fec.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_rep_cob_x_fechasActionPerformed

    private void smn_caja_caja_reversoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_caja_caja_reversoActionPerformed
        if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_caja_reverso==null){
                v_caja_reverso = new frm_caja_reverso();
                vl.ver_pantalla(jdp_escritorio, v_caja_reverso);
            }else{
                try {
                    v_caja_reverso.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        } 
    }//GEN-LAST:event_smn_caja_caja_reversoActionPerformed

    private void smn_estud_rel_alu_famActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_estud_rel_alu_famActionPerformed
       if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_rel_alu_fam==null){
                v_rel_alu_fam = new frm_rel_alu_fam();
                vl.ver_pantalla(jdp_escritorio, v_rel_alu_fam);
            }else{
                try {
                    v_rel_alu_fam.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }  
    }//GEN-LAST:event_smn_estud_rel_alu_famActionPerformed

    private void smn_usu_permisoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_usu_permisoActionPerformed
         if(v_busc_emple==null && v_busc_estud==null && v_busc_person==null){
            if(v_permiso==null){
                v_permiso = new frm_permiso();
                vl.ver_pantalla(jdp_escritorio, v_permiso);
            }else{
                try {
                    v_permiso.setSelected(true);
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }        
        }else{
            enfocar_ventana();
        }   
    }//GEN-LAST:event_smn_usu_permisoActionPerformed

    private void smn_ayuda_ayudaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_smn_ayuda_ayudaActionPerformed
        Procesos misProcesos=new Procesos();
        misProcesos.cargarArchivo();
    }//GEN-LAST:event_smn_ayuda_ayudaActionPerformed

    public class Procesos { 
        public void cargarArchivo() {
           abrir();
        }
        private void abrir() {
        String fileLocal = new String("src/reportes/Manual_de_Usuario.pdf"); 
        try{ 

           File path = new File (fileLocal);
           Desktop.getDesktop().open(path);

          }catch(IOException e){
             e.printStackTrace();
          }catch(IllegalArgumentException e){
             JOptionPane.showMessageDialog(null, "No se pudo encontrar el archivo","Error",JOptionPane.ERROR_MESSAGE);
             e.printStackTrace();
         } 
      }
    }   
    public static void enfocar_ventana(){
        if(frm_principal.v_busc_emple!=null){
                try {
                    frm_principal.v_busc_emple.setSelected(true);
                    frm_principal.v_busc_emple.getToolkit().beep();
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
            if(frm_principal.v_busc_estud!=null){
                try {
                    frm_principal.v_busc_estud.setSelected(true);
                    frm_principal.v_busc_estud.getToolkit().beep();
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
            if(frm_principal.v_busc_person!=null){
                try {
                    frm_principal.v_busc_person.setSelected(true);
                    frm_principal.v_busc_person.getToolkit().beep();
                } catch (PropertyVetoException ex) {
                    Logger.getLogger(frm_principal.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
    }
    
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
            java.util.logging.Logger.getLogger(frm_principal.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(frm_principal.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(frm_principal.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(frm_principal.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new frm_principal().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel horas;
    public static javax.swing.JDesktopPane jdp_escritorio;
    private javax.swing.JMenuBar jmb_menu_principal;
    private javax.swing.JTextField lbl_1;
    private javax.swing.JLabel lbl_2;
    private javax.swing.JLabel lbl_3;
    private javax.swing.JLabel lbl_4;
    private javax.swing.JMenu men_ayuda;
    private javax.swing.JMenu men_caja;
    private javax.swing.JMenu men_estudiante;
    private javax.swing.JMenu men_mantenimiento;
    private javax.swing.JMenu men_matriculacion;
    private javax.swing.JMenu men_reportes;
    private javax.swing.JMenu men_usuario;
    private javax.swing.JPanel pnl_barra_estado;
    private javax.swing.JMenuItem smn_ayuda_acerca_de;
    private javax.swing.JMenuItem smn_ayuda_ayuda;
    private javax.swing.JMenuItem smn_ayuda_creditos;
    private javax.swing.JMenuItem smn_caja_caja_ingreso;
    private javax.swing.JMenuItem smn_caja_caja_reverso;
    private javax.swing.JMenuItem smn_estud_estudiante;
    private javax.swing.JMenuItem smn_estud_familiar;
    private javax.swing.JMenuItem smn_estud_rel_alu_fam;
    private javax.swing.JMenuItem smn_inic_salir;
    private javax.swing.JMenuItem smn_mant_documento;
    private javax.swing.JMenuItem smn_mant_forma_pago;
    private javax.swing.JMenuItem smn_mant_institucion;
    private javax.swing.JMenuItem smn_mant_paralelo;
    private javax.swing.JMenuItem smn_mant_parentesco;
    private javax.swing.JMenuItem smn_mant_periodo;
    private javax.swing.JMenuItem smn_mant_rol;
    private javax.swing.JMenuItem smn_matri_doc_falt;
    private javax.swing.JMenuItem smn_matri_inici_año;
    private javax.swing.JMenuItem smn_matri_matricula;
    private javax.swing.JMenuItem smn_rep_cob_x_dia;
    private javax.swing.JMenuItem smn_rep_cob_x_fechas;
    private javax.swing.JMenuItem smn_rep_doc_falt_gen;
    private javax.swing.JMenuItem smn_rep_mat_para;
    private javax.swing.JMenuItem smn_rep_mens_pend;
    private javax.swing.JMenuItem smn_usu_cambiar_clave;
    private javax.swing.JMenuItem smn_usu_empleado;
    private javax.swing.JMenuItem smn_usu_permiso;
    private javax.swing.JMenuItem smn_usu_usuario;
    private javax.swing.JTextField txt_fecha;
    public static javax.swing.JTextField txt_rol;
    public static javax.swing.JTextField txt_usuario;
    // End of variables declaration//GEN-END:variables
}
