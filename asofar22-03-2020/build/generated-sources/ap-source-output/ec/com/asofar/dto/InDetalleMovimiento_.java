package ec.com.asofar.dto;

import ec.com.asofar.dto.InDetalleMovimientoPK;
import ec.com.asofar.dto.InMovimientos;
import java.math.BigDecimal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InDetalleMovimiento.class)
public class InDetalleMovimiento_ { 

    public static volatile SingularAttribute<InDetalleMovimiento, String> descripcion;
    public static volatile SingularAttribute<InDetalleMovimiento, BigInteger> idBodegaDestino;
    public static volatile SingularAttribute<InDetalleMovimiento, String> estado;
    public static volatile SingularAttribute<InDetalleMovimiento, BigDecimal> precioUnitario;
    public static volatile SingularAttribute<InDetalleMovimiento, BigInteger> idBodegaOrigen;
    public static volatile SingularAttribute<InDetalleMovimiento, InMovimientos> inMovimientos;
    public static volatile SingularAttribute<InDetalleMovimiento, Date> anioDocumento;
    public static volatile SingularAttribute<InDetalleMovimiento, String> usuarioCreacion;
    public static volatile SingularAttribute<InDetalleMovimiento, String> usuarioActualizacion;
    public static volatile SingularAttribute<InDetalleMovimiento, Date> fechaCreacion;
    public static volatile SingularAttribute<InDetalleMovimiento, Date> fechaActualizacion;
    public static volatile SingularAttribute<InDetalleMovimiento, InDetalleMovimientoPK> inDetalleMovimientoPK;
    public static volatile SingularAttribute<InDetalleMovimiento, BigInteger> cantidad;
    public static volatile SingularAttribute<InDetalleMovimiento, BigInteger> idSucursalDestino;
    public static volatile SingularAttribute<InDetalleMovimiento, String> despachado;

}