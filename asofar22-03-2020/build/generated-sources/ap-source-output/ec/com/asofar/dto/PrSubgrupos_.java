package ec.com.asofar.dto;

import ec.com.asofar.dto.PrArticulo;
import ec.com.asofar.dto.PrGrupos;
import ec.com.asofar.dto.PrSubgruposPK;
import ec.com.asofar.dto.SeEmpresa;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(PrSubgrupos.class)
public class PrSubgrupos_ { 

    public static volatile SingularAttribute<PrSubgrupos, String> estado;
    public static volatile SingularAttribute<PrSubgrupos, PrGrupos> prGrupos;
    public static volatile SingularAttribute<PrSubgrupos, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrSubgrupos, Date> fechaCreacion;
    public static volatile SingularAttribute<PrSubgrupos, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrSubgrupos, SeEmpresa> idEmpresa;
    public static volatile SingularAttribute<PrSubgrupos, String> nombre;
    public static volatile ListAttribute<PrSubgrupos, PrArticulo> prArticuloList;
    public static volatile SingularAttribute<PrSubgrupos, PrSubgruposPK> prSubgruposPK;
    public static volatile SingularAttribute<PrSubgrupos, String> usuarioCreacion;

}