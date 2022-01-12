package ec.com.cp.util;

import java.awt.Dimension;
import java.awt.Graphics;
import javax.swing.ImageIcon;

public class util_fondo extends javax.swing.JPanel {

    public util_fondo(int w, int h) {
        this.setSize(w, h);
    }

    @Override
    public void paintComponent(Graphics g) {
        Dimension dim = getSize();
        ImageIcon imagenFondo = new ImageIcon(getClass().getResource("/imagenes/venta.jpg"));
//        ImageIcon imagenFondo = new ImageIcon(getClass().getResource("/imagenes/crm.jpg"));
        g.drawImage(imagenFondo.getImage(), 0, 0, dim.width, dim.height, null);
        setOpaque(false);
        super.paintComponent(g);
    }

}
