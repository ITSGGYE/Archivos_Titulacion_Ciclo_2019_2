package ec.com.asofar.dto;

import ec.com.asofar.dto.PrArticuloPK;
import ec.com.asofar.dto.PrMedidas;
import ec.com.asofar.dto.PrSubgrupos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrArticulo.class)
public class PrArticulo_ { 

    public static volatile SingularAttribute<PrArticulo, PrArticuloPK> prArticuloPK;
    public static volatile SingularAttribute<PrArticulo, String> estado;
    public static volatile ListAttribute<PrArticulo, PrMedidas> prMedidasList;
    public static volatile SingularAttribute<PrArticulo, PrSubgrupos> prSubgrupos;
    public static volatile SingularAttribute<PrArticulo, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrArticulo, Date> fechaCreacion;
    public static volatile SingularAttribute<PrArticulo, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrArticulo, String> nombreArticulo;
    public static volatile SingularAttribute<PrArticulo, String> usuarioCreacion;

}