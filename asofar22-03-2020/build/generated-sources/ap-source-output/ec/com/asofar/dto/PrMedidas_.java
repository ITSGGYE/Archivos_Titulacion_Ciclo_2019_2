package ec.com.asofar.dto;

import ec.com.asofar.dto.PrArticulo;
import ec.com.asofar.dto.PrMedidasPK;
import ec.com.asofar.dto.PrProductos;
import ec.com.asofar.dto.PrTipoMedidas;
import ec.com.asofar.dto.PrTipoPresentacion;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(PrMedidas.class)
public class PrMedidas_ { 

    public static volatile SingularAttribute<PrMedidas, String> estado;
    public static volatile SingularAttribute<PrMedidas, PrTipoMedidas> prTipoMedidas;
    public static volatile ListAttribute<PrMedidas, PrProductos> prProductosList;
    public static volatile SingularAttribute<PrMedidas, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrMedidas, PrTipoPresentacion> prTipoPresentacion;
    public static volatile SingularAttribute<PrMedidas, Date> fechaCreacion;
    public static volatile SingularAttribute<PrMedidas, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrMedidas, PrMedidasPK> prMedidasPK;
    public static volatile SingularAttribute<PrMedidas, PrArticulo> prArticulo;
    public static volatile SingularAttribute<PrMedidas, String> usuarioCreacion;

}