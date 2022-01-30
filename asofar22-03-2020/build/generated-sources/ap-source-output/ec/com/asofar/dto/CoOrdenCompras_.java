package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetalleOrdenCompra;
import ec.com.asofar.dto.CoOrdenComprasPK;
import ec.com.asofar.dto.SeSucursal;
import java.math.BigDecimal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoOrdenCompras.class)
public class CoOrdenCompras_ { 

    public static volatile SingularAttribute<CoOrdenCompras, String> estado;
    public static volatile SingularAttribute<CoOrdenCompras, BigDecimal> totalIva;
    public static volatile SingularAttribute<CoOrdenCompras, BigDecimal> totalSubtotal;
    public static volatile SingularAttribute<CoOrdenCompras, String> usuarioCreacion;
    public static volatile SingularAttribute<CoOrdenCompras, BigDecimal> totalIce;
    public static volatile SingularAttribute<CoOrdenCompras, BigDecimal> totalCompra;
    public static volatile SingularAttribute<CoOrdenCompras, BigDecimal> totalDescuento;
    public static volatile SingularAttribute<CoOrdenCompras, Date> fechaAprobacion;
    public static volatile SingularAttribute<CoOrdenCompras, BigInteger> idProveedor;
    public static volatile SingularAttribute<CoOrdenCompras, BigInteger> idTipoDocumento;
    public static volatile SingularAttribute<CoOrdenCompras, Date> fechaEntrega;
    public static volatile SingularAttribute<CoOrdenCompras, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoOrdenCompras, Date> fechaCreacion;
    public static volatile SingularAttribute<CoOrdenCompras, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoOrdenCompras, CoOrdenComprasPK> coOrdenComprasPK;
    public static volatile SingularAttribute<CoOrdenCompras, String> formaPago;
    public static volatile SingularAttribute<CoOrdenCompras, SeSucursal> seSucursal;
    public static volatile SingularAttribute<CoOrdenCompras, String> observacion;
    public static volatile ListAttribute<CoOrdenCompras, CoDetalleOrdenCompra> coDetalleOrdenCompraList;

}