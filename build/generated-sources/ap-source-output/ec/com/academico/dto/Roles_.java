package ec.com.academico.dto;

import ec.com.academico.dto.RelUsuarioRoles;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Roles.class)
public class Roles_ { 

    public static volatile SingularAttribute<Roles, Character> estado;
    public static volatile SingularAttribute<Roles, Long> idRoles;
    public static volatile SingularAttribute<Roles, String> nombre;
    public static volatile ListAttribute<Roles, RelUsuarioRoles> relUsuarioRolesList;

}