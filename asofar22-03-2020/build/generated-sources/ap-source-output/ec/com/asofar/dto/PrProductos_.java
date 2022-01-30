package ec.com.asofar.dto;

import ec.com.asofar.dto.CoProveedores;
import ec.com.asofar.dto.PrEmpaque;
import ec.com.asofar.dto.PrFabricante;
import ec.com.asofar.dto.PrMedidas;
import ec.com.asofar.dto.PrProductosPK;
import ec.com.asofar.dto.SeEmpresa;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrProductos.class)
public class PrProductos_ { 

    public static volatile SingularAttribute<PrProductos, String> estado;
    public static volatile SingularAttribute<PrProductos, String> receta;
    public static volatile SingularAttribute<PrProductos, Double> unidadEmpaqueVenta;
    public static volatile SingularAttribute<PrProductos, Double> unidadEmpaqueCompra;
    public static volatile SingularAttribute<PrProductos, PrFabricante> codFabricante;
    public static volatile SingularAttribute<PrProductos, PrEmpaque> medidaEmpaqueVenta;
    public static volatile SingularAttribute<PrProductos, PrEmpaque> medidaPorEmpaqueCompra;
    public static volatile SingularAttribute<PrProductos, String> nombreProducto;
    public static volatile SingularAttribute<PrProductos, String> usuarioCreacion;
    public static volatile SingularAttribute<PrProductos, PrProductosPK> prProductosPK;
    public static volatile SingularAttribute<PrProductos, Double> cantidadPorEmpaqueCompra;
    public static volatile SingularAttribute<PrProductos, String> codigoBarra;
    public static volatile SingularAttribute<PrProductos, Double> cantidadPorEmpaqueVenta;
    public static volatile SingularAttribute<PrProductos, SeEmpresa> seEmpresa;
    public static volatile SingularAttribute<PrProductos, PrMedidas> prMedidas;
    public static volatile SingularAttribute<PrProductos, String> registroSanitarioExtranjero;
    public static volatile SingularAttribute<PrProductos, CoProveedores> idProveedor;
    public static volatile SingularAttribute<PrProductos, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrProductos, String> descontinuado;
    public static volatile SingularAttribute<PrProductos, String> registroSanitarioLocal;
    public static volatile SingularAttribute<PrProductos, PrEmpaque> medidaEmpaqueCompra;
    public static volatile SingularAttribute<PrProductos, Date> fechaCreacion;
    public static volatile SingularAttribute<PrProductos, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrProductos, PrEmpaque> medidaPorEmpaqueVenta;

}