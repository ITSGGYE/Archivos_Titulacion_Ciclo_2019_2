package ec.com.asofar.dto;

import ec.com.asofar.dto.SeSucursal;
import ec.com.asofar.dto.VeFacturaDetalle;
import ec.com.asofar.dto.VeFacturaPK;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(VeFactura.class)
public class VeFactura_ { 

    public static volatile SingularAttribute<VeFactura, Date> fechaFacturacion;
    public static volatile SingularAttribute<VeFactura, String> secuenciaSri;
    public static volatile SingularAttribute<VeFactura, String> estado;
    public static volatile SingularAttribute<VeFactura, String> numeroEstablecimientoSri;
    public static volatile SingularAttribute<VeFactura, Double> totalFacturado;
    public static volatile SingularAttribute<VeFactura, BigInteger> idUsuario;
    public static volatile SingularAttribute<VeFactura, Double> totalIva;
    public static volatile SingularAttribute<VeFactura, VeFacturaPK> veFacturaPK;
    public static volatile SingularAttribute<VeFactura, String> usuarioCreacion;
    public static volatile SingularAttribute<VeFactura, Double> totalIce;
    public static volatile SingularAttribute<VeFactura, Double> totalBaseNoIva;
    public static volatile SingularAttribute<VeFactura, BigInteger> idCliente;
    public static volatile SingularAttribute<VeFactura, Double> subtotal;
    public static volatile SingularAttribute<VeFactura, Double> totalDescuento;
    public static volatile ListAttribute<VeFactura, VeFacturaDetalle> veFacturaDetalleList;
    public static volatile SingularAttribute<VeFactura, String> usuarioActualizacion;
    public static volatile SingularAttribute<VeFactura, Date> fechaCreacion;
    public static volatile SingularAttribute<VeFactura, Date> fechaActualizacion;
    public static volatile SingularAttribute<VeFactura, String> puntoEmisionSri;
    public static volatile SingularAttribute<VeFactura, String> formaPago;
    public static volatile SingularAttribute<VeFactura, SeSucursal> seSucursal;
    public static volatile SingularAttribute<VeFactura, BigInteger> idCaja;
    public static volatile SingularAttribute<VeFactura, Double> totalBaseIva;
    public static volatile SingularAttribute<VeFactura, String> despachado;

}