package ec.com.asofar.dto;

import ec.com.asofar.dto.PrProductos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(PrEmpaque.class)
public class PrEmpaque_ { 

    public static volatile SingularAttribute<PrEmpaque, String> estado;
    public static volatile ListAttribute<PrEmpaque, PrProductos> prProductosList;
    public static volatile SingularAttribute<PrEmpaque, String> nombreEmpaque;
    public static volatile SingularAttribute<PrEmpaque, String> usuarioActualizacion;
    public static volatile ListAttribute<PrEmpaque, PrProductos> prProductosList3;
    public static volatile SingularAttribute<PrEmpaque, Date> fechaCreacion;
    public static volatile SingularAttribute<PrEmpaque, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrEmpaque, Long> id;
    public static volatile ListAttribute<PrEmpaque, PrProductos> prProductosList1;
    public static volatile SingularAttribute<PrEmpaque, String> usuarioCreacion;
    public static volatile ListAttribute<PrEmpaque, PrProductos> prProductosList2;

}