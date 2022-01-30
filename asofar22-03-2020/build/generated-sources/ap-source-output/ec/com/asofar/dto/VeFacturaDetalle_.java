package ec.com.asofar.dto;

import ec.com.asofar.dto.VeFactura;
import ec.com.asofar.dto.VeFacturaDetallePK;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(VeFacturaDetalle.class)
public class VeFacturaDetalle_ { 

    public static volatile SingularAttribute<VeFacturaDetalle, String> descripcion;
    public static volatile SingularAttribute<VeFacturaDetalle, String> estado;
    public static volatile SingularAttribute<VeFacturaDetalle, VeFacturaDetallePK> veFacturaDetallePK;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> valorIce;
    public static volatile SingularAttribute<VeFacturaDetalle, VeFactura> veFactura;
    public static volatile SingularAttribute<VeFacturaDetalle, String> usuarioCreacion;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> precioUnitarioVenta;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> valorIva;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> valorDescuento;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> subtotal;
    public static volatile SingularAttribute<VeFacturaDetalle, Double> valorTotal;
    public static volatile SingularAttribute<VeFacturaDetalle, String> usuarioActualizacion;
    public static volatile SingularAttribute<VeFacturaDetalle, Date> fechaCreacion;
    public static volatile SingularAttribute<VeFacturaDetalle, Date> fechaActualizacion;
    public static volatile SingularAttribute<VeFacturaDetalle, BigInteger> cantidad;

}