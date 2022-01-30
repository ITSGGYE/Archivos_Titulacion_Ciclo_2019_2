package ec.com.asofar.dto;

import ec.com.asofar.dto.PrSubgrupos;
import ec.com.asofar.dto.SeEmpresa;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrGrupos.class)
public class PrGrupos_ { 

    public static volatile ListAttribute<PrGrupos, PrSubgrupos> prSubgruposList;
    public static volatile SingularAttribute<PrGrupos, String> estado;
    public static volatile SingularAttribute<PrGrupos, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrGrupos, Date> fechaCreacion;
    public static volatile SingularAttribute<PrGrupos, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrGrupos, SeEmpresa> idEmpresa;
    public static volatile SingularAttribute<PrGrupos, String> nombre;
    public static volatile SingularAttribute<PrGrupos, Long> idGrupo;
    public static volatile SingularAttribute<PrGrupos, String> usuarioCreacion;

}