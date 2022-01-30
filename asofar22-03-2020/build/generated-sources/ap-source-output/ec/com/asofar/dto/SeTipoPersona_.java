package ec.com.asofar.dto;

import ec.com.asofar.dto.CoProveedores;
import ec.com.asofar.dto.SePersonas;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeTipoPersona.class)
public class SeTipoPersona_ { 

    public static volatile SingularAttribute<SeTipoPersona, Character> estado;
    public static volatile ListAttribute<SeTipoPersona, SePersonas> sePersonasList;
    public static volatile SingularAttribute<SeTipoPersona, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeTipoPersona, Date> fechaCreacion;
    public static volatile SingularAttribute<SeTipoPersona, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeTipoPersona, Long> idTipoPersona;
    public static volatile SingularAttribute<SeTipoPersona, String> nombre;
    public static volatile SingularAttribute<SeTipoPersona, String> usuarioCreacion;
    public static volatile ListAttribute<SeTipoPersona, CoProveedores> coProveedoresList;

}