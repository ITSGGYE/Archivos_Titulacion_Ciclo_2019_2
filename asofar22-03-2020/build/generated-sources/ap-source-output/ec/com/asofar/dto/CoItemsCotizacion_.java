package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetItemsCotizacion;
import ec.com.asofar.dto.CoItemsCotizacionPK;
import ec.com.asofar.dto.InTipoCompra;
import ec.com.asofar.dto.InTipoDepartamento;
import ec.com.asofar.dto.InTipoDocumento;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoItemsCotizacion.class)
public class CoItemsCotizacion_ { 

    public static volatile ListAttribute<CoItemsCotizacion, CoDetItemsCotizacion> coDetItemsCotizacionList;
    public static volatile SingularAttribute<CoItemsCotizacion, String> estado;
    public static volatile SingularAttribute<CoItemsCotizacion, Date> fechaEmision;
    public static volatile SingularAttribute<CoItemsCotizacion, String> usuarioCreacion;
    public static volatile SingularAttribute<CoItemsCotizacion, InTipoDepartamento> idDepartamento;
    public static volatile SingularAttribute<CoItemsCotizacion, BigInteger> idEstado;
    public static volatile SingularAttribute<CoItemsCotizacion, InTipoCompra> idTipoCompra;
    public static volatile SingularAttribute<CoItemsCotizacion, String> procesado;
    public static volatile SingularAttribute<CoItemsCotizacion, InTipoDocumento> idTipoDocumento;
    public static volatile SingularAttribute<CoItemsCotizacion, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoItemsCotizacion, Date> fechaCreacion;
    public static volatile SingularAttribute<CoItemsCotizacion, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoItemsCotizacion, CoItemsCotizacionPK> coItemsCotizacionPK;

}