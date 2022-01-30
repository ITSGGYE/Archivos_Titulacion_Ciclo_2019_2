package ec.com.asofar.dto;

import ec.com.asofar.dto.PrTarifario;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrDetalleTarifario.class)
public class PrDetalleTarifario_ { 

    public static volatile SingularAttribute<PrDetalleTarifario, String> estado;
    public static volatile SingularAttribute<PrDetalleTarifario, BigInteger> idUnidadServicio;
    public static volatile SingularAttribute<PrDetalleTarifario, Double> valorVenta;
    public static volatile SingularAttribute<PrDetalleTarifario, BigInteger> idPrestacion;
    public static volatile SingularAttribute<PrDetalleTarifario, Long> idDetalleTarifario;
    public static volatile SingularAttribute<PrDetalleTarifario, String> usuarioCreacion;
    public static volatile SingularAttribute<PrDetalleTarifario, PrTarifario> prTarifario;
    public static volatile SingularAttribute<PrDetalleTarifario, Double> valorMinVenta;
    public static volatile SingularAttribute<PrDetalleTarifario, Double> valorDescuento;
    public static volatile SingularAttribute<PrDetalleTarifario, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrDetalleTarifario, Double> valorCosto;
    public static volatile SingularAttribute<PrDetalleTarifario, Date> fechaCreacion;
    public static volatile SingularAttribute<PrDetalleTarifario, Date> fechaActualizacion;

}