package ec.com.asofar.dto;

import ec.com.asofar.dto.PrMedidas;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrTipoPresentacion.class)
public class PrTipoPresentacion_ { 

    public static volatile SingularAttribute<PrTipoPresentacion, String> estado;
    public static volatile ListAttribute<PrTipoPresentacion, PrMedidas> prMedidasList;
    public static volatile SingularAttribute<PrTipoPresentacion, Long> idTipoPresentacion;
    public static volatile SingularAttribute<PrTipoPresentacion, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrTipoPresentacion, Date> fechaCreacion;
    public static volatile SingularAttribute<PrTipoPresentacion, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrTipoPresentacion, String> nombre;
    public static volatile SingularAttribute<PrTipoPresentacion, String> usuarioCreacion;

}