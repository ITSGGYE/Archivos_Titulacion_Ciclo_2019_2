
package edumac_2;
import java.awt.Color;
import java.awt.event.KeyEvent;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import javax.imageio.ImageIO;
import javax.swing.Icon;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JDesktopPane;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JInternalFrame;
import javax.swing.JTable;
import javax.swing.JTextArea;
import javax.swing.JTextField;
import javax.swing.table.DefaultTableModel;

public class Validaciones {
    public int red_ori = 240,   green_ori  = 240 ,   blue_ori  = 240  ;
    public int red = 255    ,   green = 255     ,   blue = 170      ;
    public int red_e= 0     ,   green_e=153      ,   blue_e = 153    ;
    public Color ama= new Color(red,green,blue);
    public Color orig= new Color(red_ori ,green_ori ,blue_ori );
    
    public int est_reg = 1;
    public Icon ima_pre = new ImageIcon(getClass().getResource("/Imagenes/msn_Validar.png"));
    public Icon ima_conf= new ImageIcon(getClass().getResource("/Imagenes/msn_Confirmado.png"));
    public Icon ima_int = new ImageIcon(getClass().getResource("/Imagenes/Logo_Edummac.png"));
    public Icon ima_10 = new ImageIcon(getClass().getResource("/Iconos/M_Caja_Ingreso.png"));
    public String ruta="";
    
    public void Solo_Letras(KeyEvent evt){
        char car= evt.getKeyChar();
        if(!Character.isLetter(car) && evt.getKeyChar()!= KeyEvent.VK_SPACE && evt.getKeyChar()!= KeyEvent.VK_BACK_SPACE) 
            evt.consume();
    }
    public void Solo_Numeros(KeyEvent evt){
        char car= evt.getKeyChar();
        if(!Character.isDigit(car) && evt.getKeyChar()!= KeyEvent.VK_SPACE && evt.getKeyChar()!= KeyEvent.VK_BACK_SPACE) 
            evt.consume();
    }
    public void Solo_Numeros_Letras(KeyEvent evt){
        char car= evt.getKeyChar();
        if(!Character.isLetter(car) && !Character.isDigit(car) && evt.getKeyChar()!= KeyEvent.VK_SPACE && evt.getKeyChar()!= KeyEvent.VK_BACK_SPACE) 
            evt.consume();
    }
    
    public void Solo_Decimales(KeyEvent evt){
        char car= evt.getKeyChar();
        if((car<'0' || car>'9') && (car<',' || car>'.') && evt.getKeyChar()!= KeyEvent.VK_SPACE && evt.getKeyChar()!= KeyEvent.VK_BACK_SPACE) evt.consume();
    }
    
    public void col_orig5(JButton bt1,JButton bt2,JButton bt3,JButton bt4,JButton bt5){
        bt1.setBackground(orig);
        bt2.setBackground(orig);
        bt3.setBackground(orig); 
        bt4.setBackground(orig);
        bt5.setBackground(orig);      
    }
    public void col_orig4(JButton bt1,JButton bt2,JButton bt3,JButton bt4){
        bt1.setBackground(orig);
        bt2.setBackground(orig);
        bt3.setBackground(orig); 
        bt4.setBackground(orig);    
    }
    
    public void max_carateres_txt (JTextField txt, int cant,java.awt.event.KeyEvent evt){
        if (txt.getText().length()>=cant) { 
            txt.getToolkit().beep();
            evt.consume(); 
        }        
    }
    public void max_carateres_caj (JTextArea caja, int cant,java.awt.event.KeyEvent evt){
        if (caja.getText().length()>=cant) { 
            caja.getToolkit().beep(); 
            evt.consume(); 
        }        
    }
    public void logo_jif(JInternalFrame frm, int icno){           
        if (icno==1)  ruta = "/Iconos/M_Caja_Ingreso.png" ;
        if (icno==2)  ruta = "/Iconos/M_Cambiar_Clave.png" ;
        if (icno==3)  ruta = "/Iconos/M_Usuario.png" ;
        if (icno==4)  ruta = "/Iconos/M_Empleados.png" ;
        if (icno==5)  ruta = "/Iconos/M_Documentos.png" ;
        if (icno==6)  ruta = "/Iconos/M_F_Pago.png" ;
        if (icno==7)  ruta = "/Iconos/M_Institucion.png" ;
        if (icno==8)  ruta = "/Iconos/M_Paralelo.png" ;
        if (icno==9)  ruta = "/Iconos/M_Parentesco.png" ;
        if (icno==10) ruta = "/Iconos/M_Periodo.png" ;
        if (icno==11) ruta = "/Iconos/M_Roles.png" ;
        if (icno==12) ruta = "/Iconos/M_Estudiante.png" ;
        if (icno==13) ruta = "/Iconos/M_Familiar.png" ;
        if (icno==14) ruta = "/Iconos/M_Ini_Lect.png" ;
        if (icno==15) ruta = "/Iconos/M_Matricula.png" ;
        if (icno==16) ruta = "/Iconos/M_Doc_Entreg.png" ;
        if (icno==17) ruta = "/Iconos/M_Caja_Ingreso.png" ;
        if (icno==18) ruta = "/Iconos/M_Caja_Reverso.png" ;
        if (icno==19) ruta = "/Iconos/M_Rep_Doc_Falt.png" ;
        if (icno==20) ruta = "/Iconos/M_Mat_x_Paral.png" ;
        if (icno==21) ruta = "/Iconos/M_Mens_x_Cobrar.png" ;
        if (icno==22) ruta = "/Iconos/M_Cobro_x_Dia.png" ;
        if (icno==23) ruta = "/Iconos/M_Cobro_x_Fecha.png" ;
        if (icno==24) ruta = "/Iconos/M_Caja_Ingreso.png" ; 
        if (icno==25) ruta = "/Iconos/M_Permiso.png" ;
        if (icno==26) ruta = "/Iconos/M_Rel_Fam.png" ;              
        Icon ima_jif = new ImageIcon(getClass().getResource(ruta));
        frm.setFrameIcon(ima_jif);
    }    
    
    public void logo_p(JFrame frm){
        BufferedImage image = null;
        try {
            image = ImageIO.read(new File("src/Imagenes/Logo_Edummac.png"));
        } catch (IOException ex) {
            Logger.getLogger(Validaciones.class.getName()).log(Level.SEVERE, null, ex);
        }
            frm.setIconImage(image);
    }
    
    public void logo(JDialog frm){
        BufferedImage image = null;
        try {
            image = ImageIO.read(new File("src/Imagenes/Logo_Edummac.png"));
        } catch (IOException ex) {
            Logger.getLogger(Validaciones.class.getName()).log(Level.SEVERE, null, ex);
        }
            frm.setIconImage(image);
    } 

    
    public int verif_cedula(String cdl,JTextField caja){
        est_reg=1;
        char [] acedu = cdl.toCharArray();
        int acum = 0    ,   res =0  ,   sum=0;
        int n_ver= Integer.parseInt(String.valueOf(acedu[9]));
        for(int i=1;i<9;i=i+2){
            acum =acum+ Integer.parseInt(String.valueOf(acedu[i]));
        }
        for(int i=0;i<9;i=i+2){
            sum=0;
            sum =Integer.parseInt(String.valueOf(acedu[i]))*2;
            if (sum>9) sum = sum-9;
            acum = acum+sum;
        }
        res =acum%10;
        if(res == 0){           
            if(res != n_ver){ 
                est_reg=0;
                caja.requestFocus();            
            }           
        }else{
            res = 10-(acum%10);
            if(res != n_ver){
                est_reg=0;
                caja.requestFocus();            
            }
        }
        return est_reg;
    }
    public void ver_pantalla(JDesktopPane escritotio, JInternalFrame frame){
        if(frame.isShowing()==false){
            frm_principal.jdp_escritorio.add(frame);
            frame.show();
            frame.setLocation((escritotio.getWidth()- frame.getWidth())/2  , (escritotio.getHeight()-frame.getHeight())/2);
        }
    }
    
    public void limpiar_tabla(JTable tabla, DefaultTableModel tablamodel){
        int fl= tabla.getRowCount();
        if (fl>0) for(int i=0;i< fl;i++) tablamodel.removeRow(0);           
    }
    
//metodo para validar correo electronio
    public boolean isEmail(String correo) {
        Pattern pat = null;
        Matcher mat = null;
        pat = Pattern.compile("^([0-9a-zA-Z]([_.w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-w]*[0-9a-zA-Z].)+([a-zA-Z]{2,9}.)+[a-zA-Z]{2,3})$");
        mat = pat.matcher(correo);
        if (mat.find()) {
            //System.out.println("[" + mat.group() + "]");
            return true;
        }else{
            return false;
        }
    }   
}
