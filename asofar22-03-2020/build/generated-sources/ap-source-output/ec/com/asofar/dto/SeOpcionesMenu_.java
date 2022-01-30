package ec.com.asofar.dto;

import ec.com.asofar.dto.SeOpcionesMenu;
import ec.com.asofar.dto.SeOpcionesRoles;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeOpcionesMenu.class)
public class SeOpcionesMenu_ { 

    public static volatile SingularAttribute<SeOpcionesMenu, String> descripcion;
    public static volatile SingularAttribute<SeOpcionesMenu, String> estado;
    public static volatile SingularAttribute<SeOpcionesMenu, String> ruta;
    public static volatile SingularAttribute<SeOpcionesMenu, String> rutaIcono;
    public static volatile SingularAttribute<SeOpcionesMenu, SeOpcionesMenu> idPadre;
    public static volatile SingularAttribute<SeOpcionesMenu, String> nombre;
    public static volatile ListAttribute<SeOpcionesMenu, SeOpcionesMenu> seOpcionesMenuList;
    public static volatile SingularAttribute<SeOpcionesMenu, Long> idOpcionesMenu;
    public static volatile SingularAttribute<SeOpcionesMenu, String> usuarioCreacion;
    public static volatile ListAttribute<SeOpcionesMenu, SeOpcionesRoles> seOpcionesRolesList;
    public static volatile SingularAttribute<SeOpcionesMenu, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeOpcionesMenu, Date> fechaCreacion;
    public static volatile SingularAttribute<SeOpcionesMenu, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeOpcionesMenu, BigInteger> orden;

}