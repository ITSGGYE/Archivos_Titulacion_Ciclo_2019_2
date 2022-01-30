package ec.com.asofar.dto;

import ec.com.asofar.dto.SeLocalidadCliente;
import ec.com.asofar.dto.SeTipoIdentificacion;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeClientes.class)
public class SeClientes_ { 

    public static volatile SingularAttribute<SeClientes, String> segundoNombre;
    public static volatile SingularAttribute<SeClientes, String> estado;
    public static volatile SingularAttribute<SeClientes, String> primerNombre;
    public static volatile SingularAttribute<SeClientes, String> primerApellido;
    public static volatile SingularAttribute<SeClientes, String> numeroIdentificacion;
    public static volatile ListAttribute<SeClientes, SeLocalidadCliente> seLocalidadClienteList;
    public static volatile SingularAttribute<SeClientes, String> segundoApellido;
    public static volatile SingularAttribute<SeClientes, SeTipoIdentificacion> idTipoIndentificacion;
    public static volatile SingularAttribute<SeClientes, String> nombreCompleto;
    public static volatile SingularAttribute<SeClientes, Long> idClientes;
    public static volatile SingularAttribute<SeClientes, String> usuarioCreacion;
    public static volatile SingularAttribute<SeClientes, String> razonSocial;
    public static volatile SingularAttribute<SeClientes, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeClientes, Date> fechaCreacion;
    public static volatile SingularAttribute<SeClientes, Date> fechaActualizacion;

}