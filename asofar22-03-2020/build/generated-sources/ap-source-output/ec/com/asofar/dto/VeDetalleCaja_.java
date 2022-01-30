package ec.com.asofar.dto;

import ec.com.asofar.dto.VeCaja;
import ec.com.asofar.dto.VeDetalleCajaPK;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(VeDetalleCaja.class)
public class VeDetalleCaja_ { 

    public static volatile SingularAttribute<VeDetalleCaja, Date> fechaCierre;
    public static volatile SingularAttribute<VeDetalleCaja, String> estado;
    public static volatile SingularAttribute<VeDetalleCaja, VeDetalleCajaPK> veDetalleCajaPK;
    public static volatile SingularAttribute<VeDetalleCaja, Date> fechaInicio;
    public static volatile SingularAttribute<VeDetalleCaja, Double> dineroInicio;
    public static volatile SingularAttribute<VeDetalleCaja, BigInteger> idUsuario;
    public static volatile SingularAttribute<VeDetalleCaja, Double> dineroCierre;
    public static volatile SingularAttribute<VeDetalleCaja, BigInteger> idVoucher;
    public static volatile SingularAttribute<VeDetalleCaja, Date> horaCierre;
    public static volatile SingularAttribute<VeDetalleCaja, Date> horaInicio;
    public static volatile SingularAttribute<VeDetalleCaja, VeCaja> veCaja;

}