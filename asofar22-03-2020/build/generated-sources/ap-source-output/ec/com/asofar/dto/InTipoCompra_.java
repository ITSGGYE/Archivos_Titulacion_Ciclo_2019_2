package ec.com.asofar.dto;

import ec.com.asofar.dto.CoItemsCotizacion;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InTipoCompra.class)
public class InTipoCompra_ { 

    public static volatile SingularAttribute<InTipoCompra, String> estado;
    public static volatile ListAttribute<InTipoCompra, CoItemsCotizacion> coItemsCotizacionList;
    public static volatile SingularAttribute<InTipoCompra, String> usuarioActualizacion;
    public static volatile SingularAttribute<InTipoCompra, Date> fechaCreacion;
    public static volatile SingularAttribute<InTipoCompra, String> fechaActualizacion;
    public static volatile SingularAttribute<InTipoCompra, Long> idInTipoCompra;
    public static volatile SingularAttribute<InTipoCompra, String> nombre;
    public static volatile SingularAttribute<InTipoCompra, String> usuarioCreacion;

}