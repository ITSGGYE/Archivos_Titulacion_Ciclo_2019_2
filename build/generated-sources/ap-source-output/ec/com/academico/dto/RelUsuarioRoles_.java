package ec.com.academico.dto;

import ec.com.academico.dto.Roles;
import ec.com.academico.dto.Usuarios;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(RelUsuarioRoles.class)
public class RelUsuarioRoles_ { 

    public static volatile SingularAttribute<RelUsuarioRoles, Long> idUsuRol;
    public static volatile SingularAttribute<RelUsuarioRoles, Character> estado;
    public static volatile SingularAttribute<RelUsuarioRoles, Roles> idRol;
    public static volatile SingularAttribute<RelUsuarioRoles, Usuarios> idUsuario;
    public static volatile SingularAttribute<RelUsuarioRoles, Date> fechaCreacion;
    public static volatile SingularAttribute<RelUsuarioRoles, String> usuario;
    public static volatile SingularAttribute<RelUsuarioRoles, String> contraseña;

}