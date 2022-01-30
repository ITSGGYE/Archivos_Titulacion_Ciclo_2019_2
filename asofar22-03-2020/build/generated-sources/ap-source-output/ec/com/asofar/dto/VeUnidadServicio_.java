package ec.com.asofar.dto;

import ec.com.asofar.dto.InPrestacionesPorServicios;
import ec.com.asofar.dto.SeEmpresa;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(VeUnidadServicio.class)
public class VeUnidadServicio_ { 

    public static volatile SingularAttribute<VeUnidadServicio, String> nombreUnidadServicio;
    public static volatile SingularAttribute<VeUnidadServicio, String> estado;
    public static volatile SingularAttribute<VeUnidadServicio, Long> idUnidadServicio;
    public static volatile ListAttribute<VeUnidadServicio, InPrestacionesPorServicios> inPrestacionesPorServiciosList;
    public static volatile SingularAttribute<VeUnidadServicio, String> usuarioActualizacion;
    public static volatile SingularAttribute<VeUnidadServicio, Date> fechaCreacion;
    public static volatile SingularAttribute<VeUnidadServicio, Date> fechaActualizacion;
    public static volatile SingularAttribute<VeUnidadServicio, SeEmpresa> idEmpresa;
    public static volatile SingularAttribute<VeUnidadServicio, String> usuarioCreacion;

}