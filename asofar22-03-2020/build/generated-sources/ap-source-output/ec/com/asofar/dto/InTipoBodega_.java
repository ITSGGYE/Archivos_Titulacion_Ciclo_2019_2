package ec.com.asofar.dto;

import ec.com.asofar.dto.InBodega;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InTipoBodega.class)
public class InTipoBodega_ { 

    public static volatile SingularAttribute<InTipoBodega, String> estado;
    public static volatile SingularAttribute<InTipoBodega, Long> idTipoBodega;
    public static volatile SingularAttribute<InTipoBodega, String> usuarioActualizacion;
    public static volatile SingularAttribute<InTipoBodega, Date> fechaCreacion;
    public static volatile SingularAttribute<InTipoBodega, Date> fechaActualizacion;
    public static volatile SingularAttribute<InTipoBodega, String> nombre;
    public static volatile ListAttribute<InTipoBodega, InBodega> inBodegaList;
    public static volatile SingularAttribute<InTipoBodega, String> usuarioCreacion;

}