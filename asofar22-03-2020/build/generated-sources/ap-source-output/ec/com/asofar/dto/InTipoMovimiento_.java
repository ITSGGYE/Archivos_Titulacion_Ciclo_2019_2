package ec.com.asofar.dto;

import ec.com.asofar.dto.InMovimientos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InTipoMovimiento.class)
public class InTipoMovimiento_ { 

    public static volatile SingularAttribute<InTipoMovimiento, String> estado;
    public static volatile SingularAttribute<InTipoMovimiento, String> usuarioActuliazacion;
    public static volatile SingularAttribute<InTipoMovimiento, Long> idTipoMovimiento;
    public static volatile SingularAttribute<InTipoMovimiento, Date> fechaCreacion;
    public static volatile SingularAttribute<InTipoMovimiento, Date> fechaActualizacion;
    public static volatile ListAttribute<InTipoMovimiento, InMovimientos> inMovimientosList;
    public static volatile SingularAttribute<InTipoMovimiento, String> nombreMovimiento;
    public static volatile SingularAttribute<InTipoMovimiento, String> usuarioCreacion;

}