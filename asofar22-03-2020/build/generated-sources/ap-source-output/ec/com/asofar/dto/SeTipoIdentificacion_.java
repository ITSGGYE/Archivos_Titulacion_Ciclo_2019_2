package ec.com.asofar.dto;

import ec.com.asofar.dto.SeClientes;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeTipoIdentificacion.class)
public class SeTipoIdentificacion_ { 

    public static volatile SingularAttribute<SeTipoIdentificacion, String> estado;
    public static volatile SingularAttribute<SeTipoIdentificacion, Long> idTipoIdentificacion;
    public static volatile SingularAttribute<SeTipoIdentificacion, String> nombreIdentificacion;
    public static volatile SingularAttribute<SeTipoIdentificacion, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeTipoIdentificacion, Date> fechaCreacion;
    public static volatile SingularAttribute<SeTipoIdentificacion, Date> fechaActualizacion;
    public static volatile ListAttribute<SeTipoIdentificacion, SeClientes> seClientesList;
    public static volatile SingularAttribute<SeTipoIdentificacion, String> usuarioCreacion;

}