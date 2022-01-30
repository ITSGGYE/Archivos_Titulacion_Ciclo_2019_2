package ec.com.asofar.dto;

import ec.com.asofar.dto.InMovimientos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InMotivos.class)
public class InMotivos_ { 

    public static volatile SingularAttribute<InMotivos, String> estado;
    public static volatile SingularAttribute<InMotivos, String> usuarioActualizacion;
    public static volatile SingularAttribute<InMotivos, Long> idMotivo;
    public static volatile SingularAttribute<InMotivos, Date> fechaCreacion;
    public static volatile SingularAttribute<InMotivos, Date> fechaActualizacion;
    public static volatile SingularAttribute<InMotivos, String> nombre;
    public static volatile ListAttribute<InMotivos, InMovimientos> inMovimientosList;
    public static volatile SingularAttribute<InMotivos, String> usuarioCreacion;

}