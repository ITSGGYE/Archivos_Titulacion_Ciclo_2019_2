package ec.com.asofar.dto;

import ec.com.asofar.dto.SeOpcionesRoles;
import ec.com.asofar.dto.SeUsuarioSucurRol;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeRoles.class)
public class SeRoles_ { 

    public static volatile ListAttribute<SeRoles, SeOpcionesRoles> seOpcionesRolesList;
    public static volatile SingularAttribute<SeRoles, String> estado;
    public static volatile ListAttribute<SeRoles, SeUsuarioSucurRol> seUsuarioSucurRolList;
    public static volatile SingularAttribute<SeRoles, Long> idRoles;
    public static volatile SingularAttribute<SeRoles, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeRoles, Date> fechaCreacion;
    public static volatile SingularAttribute<SeRoles, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeRoles, String> nombre;
    public static volatile SingularAttribute<SeRoles, String> usuarioCreacion;

}