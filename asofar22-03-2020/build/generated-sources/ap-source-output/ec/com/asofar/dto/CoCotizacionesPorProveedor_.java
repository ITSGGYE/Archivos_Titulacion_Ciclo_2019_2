package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetalleCotizacionPorProveedor;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoCotizacionesPorProveedor.class)
public class CoCotizacionesPorProveedor_ { 

    public static volatile SingularAttribute<CoCotizacionesPorProveedor, String> estado;
    public static volatile ListAttribute<CoCotizacionesPorProveedor, CoDetalleCotizacionPorProveedor> coDetalleCotizacionPorProveedorList;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, BigInteger> idCotizacion;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, BigInteger> idSucursal;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, Date> fechaIngreso;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, Date> fechaEnvioCotizacion;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, BigInteger> idTipoCompra;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, String> usuarioIngreso;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, Long> idCotizacionesPorPorveedor;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, BigInteger> idProveedor;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, String> mailContacto;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, BigInteger> idEmpresa;
    public static volatile SingularAttribute<CoCotizacionesPorProveedor, String> telefonoContacto;

}