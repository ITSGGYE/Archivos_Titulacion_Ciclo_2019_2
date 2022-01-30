package ec.com.asofar.dto;

import ec.com.asofar.dto.CoProveedores;
import ec.com.asofar.dto.InDetalleMovimiento;
import ec.com.asofar.dto.InMotivos;
import ec.com.asofar.dto.InMovimientosPK;
import ec.com.asofar.dto.InTipoDocumento;
import ec.com.asofar.dto.InTipoMovimiento;
import ec.com.asofar.dto.SeSucursal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InMovimientos.class)
public class InMovimientos_ { 

    public static volatile SingularAttribute<InMovimientos, BigInteger> idBodegaDestino;
    public static volatile SingularAttribute<InMovimientos, Date> fechaSistema;
    public static volatile SingularAttribute<InMovimientos, BigInteger> idOrdenCompra;
    public static volatile SingularAttribute<InMovimientos, InTipoDocumento> inTipoDocumento;
    public static volatile SingularAttribute<InMovimientos, String> estado;
    public static volatile SingularAttribute<InMovimientos, BigInteger> idBodegaOrigen;
    public static volatile SingularAttribute<InMovimientos, Date> fechaTransferencia;
    public static volatile SingularAttribute<InMovimientos, Date> anioDocumento;
    public static volatile SingularAttribute<InMovimientos, InMotivos> inMotivos;
    public static volatile SingularAttribute<InMovimientos, String> usuarioCreacion;
    public static volatile ListAttribute<InMovimientos, InDetalleMovimiento> inDetalleMovimientoList;
    public static volatile SingularAttribute<InMovimientos, InMovimientosPK> inMovimientosPK;
    public static volatile SingularAttribute<InMovimientos, Date> fechaFactura;
    public static volatile SingularAttribute<InMovimientos, CoProveedores> idProveedor;
    public static volatile SingularAttribute<InMovimientos, BigInteger> idFactura;
    public static volatile SingularAttribute<InMovimientos, String> usuarioActualizacion;
    public static volatile SingularAttribute<InMovimientos, Date> fechaCreacion;
    public static volatile SingularAttribute<InMovimientos, Date> fechaActualizacion;
    public static volatile SingularAttribute<InMovimientos, InTipoMovimiento> inTipoMovimiento;
    public static volatile SingularAttribute<InMovimientos, BigInteger> idSucursalDestino;
    public static volatile SingularAttribute<InMovimientos, SeSucursal> seSucursal;
    public static volatile SingularAttribute<InMovimientos, String> observacion;
    public static volatile SingularAttribute<InMovimientos, Date> fechaOrden;
    public static volatile SingularAttribute<InMovimientos, Date> fechaRecepcion;

}