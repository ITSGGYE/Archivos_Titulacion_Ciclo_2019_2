package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetItemsCotizacionPK;
import ec.com.asofar.dto.CoItemsCotizacion;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoDetItemsCotizacion.class)
public class CoDetItemsCotizacion_ { 

    public static volatile SingularAttribute<CoDetItemsCotizacion, String> descripcion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, Double> valorMinRef;
    public static volatile SingularAttribute<CoDetItemsCotizacion, String> estado;
    public static volatile SingularAttribute<CoDetItemsCotizacion, CoItemsCotizacion> coItemsCotizacion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, BigInteger> cantidadPedida;
    public static volatile SingularAttribute<CoDetItemsCotizacion, Double> cantidadFaltante;
    public static volatile SingularAttribute<CoDetItemsCotizacion, Double> cantidadCotizada;
    public static volatile SingularAttribute<CoDetItemsCotizacion, Double> valorMaxRef;
    public static volatile SingularAttribute<CoDetItemsCotizacion, String> usuarioCreacion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, CoDetItemsCotizacionPK> coDetItemsCotizacionPK;
    public static volatile SingularAttribute<CoDetItemsCotizacion, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, Date> fechaCreacion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, String> fechaActualizacion;
    public static volatile SingularAttribute<CoDetItemsCotizacion, BigInteger> idProducto;

}