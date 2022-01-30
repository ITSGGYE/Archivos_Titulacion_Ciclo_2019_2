package ec.com.asofar.dto;

import ec.com.asofar.dto.InBodega;
import ec.com.asofar.dto.PrProductoBodegaPK;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrProductoBodega.class)
public class PrProductoBodega_ { 

    public static volatile SingularAttribute<PrProductoBodega, PrProductoBodegaPK> prProductoBodegaPK;
    public static volatile SingularAttribute<PrProductoBodega, BigInteger> stockMinimo;
    public static volatile SingularAttribute<PrProductoBodega, String> estado;
    public static volatile SingularAttribute<PrProductoBodega, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrProductoBodega, Date> fechaCreacion;
    public static volatile SingularAttribute<PrProductoBodega, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrProductoBodega, BigInteger> stockMaximo;
    public static volatile SingularAttribute<PrProductoBodega, InBodega> inBodega;
    public static volatile SingularAttribute<PrProductoBodega, String> usuarioCreacion;

}