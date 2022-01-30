package ec.com.asofar.dto;

import ec.com.asofar.dto.SeRoles;
import ec.com.asofar.dto.SeSucursal;
import ec.com.asofar.dto.SeUsuarioSucurRolPK;
import ec.com.asofar.dto.SeUsuarios;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(SeUsuarioSucurRol.class)
public class SeUsuarioSucurRol_ { 

    public static volatile SingularAttribute<SeUsuarioSucurRol, SeUsuarioSucurRolPK> seUsuarioSucurRolPK;
    public static volatile SingularAttribute<SeUsuarioSucurRol, Character> estado;
    public static volatile SingularAttribute<SeUsuarioSucurRol, SeUsuarios> idUsuario;
    public static volatile SingularAttribute<SeUsuarioSucurRol, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeUsuarioSucurRol, SeRoles> idRoles;
    public static volatile SingularAttribute<SeUsuarioSucurRol, Date> fechaCreacion;
    public static volatile SingularAttribute<SeUsuarioSucurRol, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeUsuarioSucurRol, SeSucursal> seSucursal;
    public static volatile SingularAttribute<SeUsuarioSucurRol, String> usuarioCreacion;

}