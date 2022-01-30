package ec.com.asofar.dto;

import ec.com.asofar.dto.CoItemsCotizacion;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:14")
@StaticMetamodel(InTipoDepartamento.class)
public class InTipoDepartamento_ { 

    public static volatile SingularAttribute<InTipoDepartamento, String> estado;
    public static volatile ListAttribute<InTipoDepartamento, CoItemsCotizacion> coItemsCotizacionList;
    public static volatile SingularAttribute<InTipoDepartamento, String> usuarioActualizacion;
    public static volatile SingularAttribute<InTipoDepartamento, Date> fechaCreacion;
    public static volatile SingularAttribute<InTipoDepartamento, String> fechaActualizacion;
    public static volatile SingularAttribute<InTipoDepartamento, String> nombre;
    public static volatile SingularAttribute<InTipoDepartamento, Long> idTipoDepartamento;
    public static volatile SingularAttribute<InTipoDepartamento, String> usuarioCreacion;

}