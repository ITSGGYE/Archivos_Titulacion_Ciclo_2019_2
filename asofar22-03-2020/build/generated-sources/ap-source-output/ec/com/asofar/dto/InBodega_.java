package ec.com.asofar.dto;

import ec.com.asofar.dto.InBodegaPK;
import ec.com.asofar.dto.InTipoBodega;
import ec.com.asofar.dto.PrProductoBodega;
import ec.com.asofar.dto.SeSucursal;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InBodega.class)
public class InBodega_ { 

    public static volatile SingularAttribute<InBodega, String> estado;
    public static volatile SingularAttribute<InBodega, InBodegaPK> inBodegaPK;
    public static volatile SingularAttribute<InBodega, String> usuarioActualizacion;
    public static volatile SingularAttribute<InBodega, Date> fechaCreacion;
    public static volatile SingularAttribute<InBodega, Date> fechaActualizacion;
    public static volatile ListAttribute<InBodega, PrProductoBodega> prProductoBodegaList;
    public static volatile SingularAttribute<InBodega, SeSucursal> seSucursal;
    public static volatile SingularAttribute<InBodega, String> nombreBodega;
    public static volatile SingularAttribute<InBodega, String> usuarioCreacion;
    public static volatile SingularAttribute<InBodega, InTipoBodega> inTipoBodega;

}