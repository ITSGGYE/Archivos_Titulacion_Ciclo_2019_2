package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetalleOrdenPedidoPK;
import ec.com.asofar.dto.CoOrdenPedido;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoDetalleOrdenPedido.class)
public class CoDetalleOrdenPedido_ { 

    public static volatile SingularAttribute<CoDetalleOrdenPedido, String> descripcion;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, String> estado;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, BigInteger> cantidadSolicitada;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, CoOrdenPedido> coOrdenPedido;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, Date> fechaCreacion;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, String> formaPago;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, CoDetalleOrdenPedidoPK> coDetalleOrdenPedidoPK;
    public static volatile SingularAttribute<CoDetalleOrdenPedido, String> usuarioCreacion;

}