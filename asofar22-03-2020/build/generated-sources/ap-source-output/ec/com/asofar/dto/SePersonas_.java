package ec.com.asofar.dto;

import ec.com.asofar.dto.SeTipoPersona;
import ec.com.asofar.dto.SeUsuarios;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(SePersonas.class)
public class SePersonas_ { 

    public static volatile SingularAttribute<SePersonas, String> apellidos;
    public static volatile SingularAttribute<SePersonas, String> estado;
    public static volatile SingularAttribute<SePersonas, Date> fechaNacimiento;
    public static volatile SingularAttribute<SePersonas, String> cedula;
    public static volatile SingularAttribute<SePersonas, String> direccion;
    public static volatile SingularAttribute<SePersonas, String> nombres;
    public static volatile SingularAttribute<SePersonas, String> usuarioCreacion;
    public static volatile ListAttribute<SePersonas, SeUsuarios> seUsuariosList;
    public static volatile SingularAttribute<SePersonas, String> correo;
    public static volatile SingularAttribute<SePersonas, String> usuarioActualizacion;
    public static volatile SingularAttribute<SePersonas, Date> fechaCreacion;
    public static volatile SingularAttribute<SePersonas, Date> fechaActualizacion;
    public static volatile SingularAttribute<SePersonas, String> telefono2;
    public static volatile SingularAttribute<SePersonas, SeTipoPersona> idTipoPersona;
    public static volatile SingularAttribute<SePersonas, String> telefono;
    public static volatile SingularAttribute<SePersonas, Long> idPersona;

}