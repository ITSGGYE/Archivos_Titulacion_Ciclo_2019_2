package ec.com.asofar.dto;

import ec.com.asofar.dto.SeOpcionesMenu;
import ec.com.asofar.dto.SeOpcionesRolesPK;
import ec.com.asofar.dto.SeRoles;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(SeOpcionesRoles.class)
public class SeOpcionesRoles_ { 

    public static volatile SingularAttribute<SeOpcionesRoles, String> estado;
    public static volatile SingularAttribute<SeOpcionesRoles, SeRoles> seRoles;
    public static volatile SingularAttribute<SeOpcionesRoles, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeOpcionesRoles, SeOpcionesRolesPK> seOpcionesRolesPK;
    public static volatile SingularAttribute<SeOpcionesRoles, Date> fechaCreacion;
    public static volatile SingularAttribute<SeOpcionesRoles, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeOpcionesRoles, SeOpcionesMenu> seOpcionesMenu;
    public static volatile SingularAttribute<SeOpcionesRoles, String> usuarioCreacion;

}