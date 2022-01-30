package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetalleOrdenPedido;
import ec.com.asofar.dto.CoOrdenPedidoPK;
import ec.com.asofar.dto.SeSucursal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(CoOrdenPedido.class)
public class CoOrdenPedido_ { 

    public static volatile SingularAttribute<CoOrdenPedido, String> estado;
    public static volatile SingularAttribute<CoOrdenPedido, Date> fechaEmision;
    public static volatile SingularAttribute<CoOrdenPedido, CoOrdenPedidoPK> coOrdenPedidoPK;
    public static volatile SingularAttribute<CoOrdenPedido, String> usuarioCreacion;
    public static volatile SingularAttribute<CoOrdenPedido, BigInteger> idDocumento;
    public static volatile SingularAttribute<CoOrdenPedido, BigInteger> idProveedor;
    public static volatile SingularAttribute<CoOrdenPedido, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoOrdenPedido, Date> fechaCreacion;
    public static volatile SingularAttribute<CoOrdenPedido, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoOrdenPedido, String> formaPago;
    public static volatile SingularAttribute<CoOrdenPedido, SeSucursal> seSucursal;
    public static volatile ListAttribute<CoOrdenPedido, CoDetalleOrdenPedido> coDetalleOrdenPedidoList;
    public static volatile SingularAttribute<CoOrdenPedido, String> observacion;

}