package ec.com.asofar.dto;

import ec.com.asofar.dto.SeCiudad;
import ec.com.asofar.dto.SeClientes;
import ec.com.asofar.dto.SeContactosClientes;
import ec.com.asofar.dto.SePais;
import ec.com.asofar.dto.SeProvincia;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeLocalidadCliente.class)
public class SeLocalidadCliente_ { 

    public static volatile SingularAttribute<SeLocalidadCliente, String> estado;
    public static volatile SingularAttribute<SeLocalidadCliente, SeProvincia> idProvincia;
    public static volatile SingularAttribute<SeLocalidadCliente, SePais> idPais;
    public static volatile SingularAttribute<SeLocalidadCliente, Long> idLocalidadCliente;
    public static volatile SingularAttribute<SeLocalidadCliente, SeCiudad> idCiudad;
    public static volatile SingularAttribute<SeLocalidadCliente, String> usuarioCreacion;
    public static volatile ListAttribute<SeLocalidadCliente, SeContactosClientes> seContactosClientesList;
    public static volatile SingularAttribute<SeLocalidadCliente, SeClientes> idCliente;
    public static volatile SingularAttribute<SeLocalidadCliente, String> dirreccionEntrega;
    public static volatile SingularAttribute<SeLocalidadCliente, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeLocalidadCliente, String> celular;
    public static volatile SingularAttribute<SeLocalidadCliente, Date> fechaCreacion;
    public static volatile SingularAttribute<SeLocalidadCliente, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeLocalidadCliente, String> telefono;
    public static volatile SingularAttribute<SeLocalidadCliente, String> dirreccionCliente;
    public static volatile SingularAttribute<SeLocalidadCliente, String> email;

}