
package edumac_2;
import java.awt.Color;
import java.awt.Font;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

public class Formato_General {
    public int red_rdb = 240,   green_rdb = 240 ,   blue_rdb = 240  ;
    public int red = 255    ,   green = 255     ,   blue = 170      ;
    public int red_e= 0     ,   green_e=153      ,   blue_e = 153    ;
    public Color col= new Color(red,green,blue);
//Para cambiar las letras de los objetos    
    public Font letra_etiqueta  = new Font("Arial",Font.BOLD ,12);
    public Font letra_texto     = new Font("Arial",Font.BOLD ,14);
    public Font letra_combo     = new Font("Arial",Font.BOLD ,14);
     public Font letra_pass     = new Font("Arial",Font.BOLD ,18);
    
     public void form_etiq1(JLabel lbl1){
        Color col= new Color(red_e,green_e,blue_e);
        lbl1.setFont(letra_etiqueta); 
        lbl1.setForeground(col);
    }
    public void form_etiq2(JLabel lbl1,JLabel lbl2){
        Color col= new Color(red_e,green_e,blue_e);
        lbl1.setFont(letra_etiqueta); 
        lbl1.setForeground(col);
        lbl2.setFont(letra_etiqueta); 
        lbl2.setForeground(col);
    }
   public void form_etiq3(JLabel lbl1,JLabel lbl2,JLabel lbl3){
        Color col= new Color(red_e,green_e,blue_e);
        lbl1.setFont(letra_etiqueta); 
        lbl1.setForeground(col);
        lbl2.setFont(letra_etiqueta); 
        lbl2.setForeground(col);
        lbl3.setFont(letra_etiqueta); 
        lbl3.setForeground(col);
    }
    public void form_etiq4(JLabel lbl1,JLabel lbl2,JLabel lbl3,JLabel lbl4){
        Color col= new Color(red_e,green_e,blue_e);
        lbl1.setFont(letra_etiqueta); 
        lbl1.setForeground(col);
        lbl2.setFont(letra_etiqueta); 
        lbl2.setForeground(col);
        lbl3.setFont(letra_etiqueta); 
        lbl3.setForeground(col);
        lbl4.setFont(letra_etiqueta); 
        lbl4.setForeground(col);
    }
    public void form_etiq5(JLabel lbl1,JLabel lbl2,JLabel lbl3,JLabel lbl4,JLabel lbl5){
        Color col= new Color(red_e,green_e,blue_e);
        lbl1.setFont(letra_etiqueta); 
        lbl1.setForeground(col);
        lbl2.setFont(letra_etiqueta); 
        lbl2.setForeground(col);
        lbl3.setFont(letra_etiqueta); 
        lbl3.setForeground(col);
        lbl4.setFont(letra_etiqueta); 
        lbl4.setForeground(col);
        lbl5.setFont(letra_etiqueta); 
        lbl5.setForeground(col);
    }
    
    public void formato_texto1(JTextField txt1){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        txt1.setFont(letra_texto);         
    }
    public void formato_texto2(JTextField txt1,JTextField txt2){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        txt1.setFont(letra_texto);  
        txt2.setFont(letra_texto); 
    }
    public void formato_texto3(JTextField txt1,JTextField txt2,JTextField txt3){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        txt1.setFont(letra_texto);  
        txt2.setFont(letra_texto); 
        txt3.setFont(letra_texto);  
    }
    public void formato_texto4(JTextField txt1,JTextField txt2,JTextField txt3,JTextField txt4){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        txt1.setFont(letra_texto);  
        txt2.setFont(letra_texto); 
        txt3.setFont(letra_texto);  
        txt4.setFont(letra_texto); 
    }
        public void formato_texto5(JTextField txt1,JTextField txt2,JTextField txt3,JTextField txt4,JTextField txt5){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        txt1.setFont(letra_texto);  
        txt2.setFont(letra_texto); 
        txt3.setFont(letra_texto);  
        txt4.setFont(letra_texto); 
        txt5.setFont(letra_texto);
    }
              
    public void formato_combo1(JComboBox cmb1){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        cmb1.setFont(letra_combo);         
    }
    public void formato_combo2(JComboBox cmb1,JComboBox cmb2){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        cmb1.setFont(letra_combo);  
        cmb2.setFont(letra_combo); 
    }
    public void formato_combo3(JComboBox cmb1,JComboBox cmb2,JComboBox cmb3){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        cmb1.setFont(letra_combo);  
        cmb3.setFont(letra_combo); 
        cmb3.setFont(letra_combo);  
    }
    public void formato_combo4(JComboBox cmb1,JComboBox cmb2,JComboBox cmb3,JComboBox cmb4){
        //Font letra_etiqueta = new Font("Calibri",Font.BOLD ,12);
        cmb1.setFont(letra_combo);  
        cmb2.setFont(letra_combo); 
        cmb3.setFont(letra_combo);  
        cmb4.setFont(letra_combo); 
    }    

    public void formato_contras1(JPasswordField pss1){
        //Font letra_pass = new Font("Calibri",Font.BOLD ,12);
        pss1.setFont(letra_pass);  
    }
    
    public void formato_contras3(JPasswordField pss1,JPasswordField pss2,JPasswordField pss3){
        //Font letra_pass = new Font("Calibri",Font.BOLD ,12);
        pss1.setFont(letra_pass);  
        pss2.setFont(letra_pass); 
        pss3.setFont(letra_pass);  
    }                 
}
