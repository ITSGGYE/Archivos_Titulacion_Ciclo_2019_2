package ec.com.asofar.dto;

import ec.com.asofar.dto.VeDetalleCaja;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(VeCaja.class)
public class VeCaja_ { 

    public static volatile SingularAttribute<VeCaja, String> estado;
    public static volatile ListAttribute<VeCaja, VeDetalleCaja> veDetalleCajaList;
    public static volatile SingularAttribute<VeCaja, BigInteger> idUsuario;
    public static volatile SingularAttribute<VeCaja, String> usuarioActualizacion;
    public static volatile SingularAttribute<VeCaja, Date> fechaCreacion;
    public static volatile SingularAttribute<VeCaja, Date> fechaActualizacion;
    public static volatile SingularAttribute<VeCaja, Long> idCaja;
    public static volatile SingularAttribute<VeCaja, String> nombre;
    public static volatile SingularAttribute<VeCaja, String> usuarioCreacion;

}