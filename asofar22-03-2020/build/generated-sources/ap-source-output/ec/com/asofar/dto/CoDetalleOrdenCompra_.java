package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetalleOrdenCompraPK;
import ec.com.asofar.dto.CoOrdenCompras;
import java.math.BigDecimal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(CoDetalleOrdenCompra.class)
public class CoDetalleOrdenCompra_ { 

    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> descripcion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, Date> fechaCaducidad;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> estado;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> precioUnitario;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> loteFabricacion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> descuento;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> ice;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigInteger> cantidadRecibida;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, CoDetalleOrdenCompraPK> coDetalleOrdenCompraPK;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> usuarioCreacion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> total;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> iva;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, BigDecimal> subtotal;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, CoOrdenCompras> coOrdenCompras;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, Date> fechaCreacion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoDetalleOrdenCompra, String> formaPago;

}