package ec.com.asofar.dto;

import ec.com.asofar.dto.PrPrestaciones;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(PrTipoPrestacion.class)
public class PrTipoPrestacion_ { 

    public static volatile SingularAttribute<PrTipoPrestacion, Character> estado;
    public static volatile SingularAttribute<PrTipoPrestacion, Long> idTipoPrestacion;
    public static volatile SingularAttribute<PrTipoPrestacion, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrTipoPrestacion, Date> fechaCreacion;
    public static volatile SingularAttribute<PrTipoPrestacion, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrTipoPrestacion, String> nombre;
    public static volatile SingularAttribute<PrTipoPrestacion, String> usuarioCreacion;
    public static volatile ListAttribute<PrTipoPrestacion, PrPrestaciones> prPrestacionesList;

}