package ec.com.asofar.dto;

import ec.com.asofar.dto.CoItemsCotizacion;
import ec.com.asofar.dto.InKardex;
import ec.com.asofar.dto.InMovimientos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(InTipoDocumento.class)
public class InTipoDocumento_ { 

    public static volatile SingularAttribute<InTipoDocumento, String> estado;
    public static volatile SingularAttribute<InTipoDocumento, String> nombreDocumento;
    public static volatile SingularAttribute<InTipoDocumento, Long> idTipoDocumento;
    public static volatile ListAttribute<InTipoDocumento, CoItemsCotizacion> coItemsCotizacionList;
    public static volatile SingularAttribute<InTipoDocumento, String> usuarioActualizacion;
    public static volatile SingularAttribute<InTipoDocumento, Date> fechaCreacion;
    public static volatile SingularAttribute<InTipoDocumento, Date> fechaActualizacion;
    public static volatile ListAttribute<InTipoDocumento, InMovimientos> inMovimientosList;
    public static volatile SingularAttribute<InTipoDocumento, String> usuarioCreacion;
    public static volatile ListAttribute<InTipoDocumento, InKardex> inKardexList;

}