package ec.com.asofar.dto;

import ec.com.asofar.dto.PrMedidas;
import ec.com.asofar.dto.SeEmpresa;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(PrTipoMedidas.class)
public class PrTipoMedidas_ { 

    public static volatile SingularAttribute<PrTipoMedidas, Long> idTipoMedidas;
    public static volatile SingularAttribute<PrTipoMedidas, String> estado;
    public static volatile ListAttribute<PrTipoMedidas, PrMedidas> prMedidasList;
    public static volatile SingularAttribute<PrTipoMedidas, String> nombreTipoMedida;
    public static volatile SingularAttribute<PrTipoMedidas, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrTipoMedidas, Date> fechaCreacion;
    public static volatile SingularAttribute<PrTipoMedidas, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrTipoMedidas, SeEmpresa> idEmpresa;
    public static volatile SingularAttribute<PrTipoMedidas, String> usuarioCreacion;

}