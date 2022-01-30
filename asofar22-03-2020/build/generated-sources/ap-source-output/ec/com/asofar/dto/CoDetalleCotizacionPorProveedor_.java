package ec.com.asofar.dto;

import ec.com.asofar.dto.CoCotizacionesPorProveedor;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoDetalleCotizacionPorProveedor.class)
public class CoDetalleCotizacionPorProveedor_ { 

    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, String> descripcion;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, String> estado;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Double> valorMaximoReferencial;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, CoCotizacionesPorProveedor> idCotizacion;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, BigInteger> idSucursal;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Date> fecha;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Long> idCotizacionesPorPorveedor;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Double> valorMinimoReferencial;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Integer> cantidadPedido;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, BigInteger> idEmpresa;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, BigInteger> idProducto;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, BigInteger> lineaDetalle;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Double> cantidadCotizado;
    public static volatile SingularAttribute<CoDetalleCotizacionPorProveedor, Double> precioUnitarioNeto;

}