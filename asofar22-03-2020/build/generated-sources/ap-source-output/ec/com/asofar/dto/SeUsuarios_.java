package ec.com.asofar.dto;

import ec.com.asofar.dto.SePersonas;
import ec.com.asofar.dto.SeUsuarioSucurRol;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeUsuarios.class)
public class SeUsuarios_ { 

    public static volatile SingularAttribute<SeUsuarios, String> estado;
    public static volatile SingularAttribute<SeUsuarios, String> password;
    public static volatile ListAttribute<SeUsuarios, SeUsuarioSucurRol> seUsuarioSucurRolList;
    public static volatile SingularAttribute<SeUsuarios, Long> idUsuario;
    public static volatile SingularAttribute<SeUsuarios, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeUsuarios, Date> fechaCreacion;
    public static volatile SingularAttribute<SeUsuarios, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeUsuarios, String> usuario;
    public static volatile SingularAttribute<SeUsuarios, SePersonas> idPersona;
    public static volatile SingularAttribute<SeUsuarios, String> usuarioCreacion;

}