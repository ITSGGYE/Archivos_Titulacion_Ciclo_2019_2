package ec.com.asofar.dto;

import ec.com.asofar.dto.SeLocalidadCliente;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeContactosClientes.class)
public class SeContactosClientes_ { 

    public static volatile SingularAttribute<SeContactosClientes, String> estado;
    public static volatile SingularAttribute<SeContactosClientes, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeContactosClientes, Date> fechaCreacion;
    public static volatile SingularAttribute<SeContactosClientes, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeContactosClientes, Long> idContactosClientes;
    public static volatile SingularAttribute<SeContactosClientes, String> nombre;
    public static volatile SingularAttribute<SeContactosClientes, SeLocalidadCliente> idLocalidad;
    public static volatile SingularAttribute<SeContactosClientes, String> usuarioCreacion;

}