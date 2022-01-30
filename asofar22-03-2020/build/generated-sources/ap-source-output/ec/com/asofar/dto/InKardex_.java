package ec.com.asofar.dto;

import ec.com.asofar.dto.InKardexPK;
import ec.com.asofar.dto.InTipoDocumento;
import ec.com.asofar.dto.SeSucursal;
import java.math.BigDecimal;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InKardex.class)
public class InKardex_ { 

    public static volatile SingularAttribute<InKardex, Date> fechaSistema;
    public static volatile SingularAttribute<InKardex, InTipoDocumento> inTipoDocumento;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoActualEmpresa;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoAnteriorBodega;
    public static volatile SingularAttribute<InKardex, BigDecimal> costoActual;
    public static volatile SingularAttribute<InKardex, BigDecimal> costoAnterior;
    public static volatile SingularAttribute<InKardex, Date> fechaMovimiento;
    public static volatile SingularAttribute<InKardex, InKardexPK> inKardexPK;
    public static volatile SingularAttribute<InKardex, String> anioDocumento;
    public static volatile SingularAttribute<InKardex, String> usuarioCreacion;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoActualBodega;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoAnterior;
    public static volatile SingularAttribute<InKardex, BigDecimal> costoPromedio;
    public static volatile SingularAttribute<InKardex, String> usuarioActualizacion;
    public static volatile SingularAttribute<InKardex, Date> fechaCreacion;
    public static volatile SingularAttribute<InKardex, Date> fechaActualizacion;
    public static volatile SingularAttribute<InKardex, BigInteger> numeroDocumento;
    public static volatile SingularAttribute<InKardex, BigInteger> cantidad;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoActual;
    public static volatile SingularAttribute<InKardex, SeSucursal> seSucursal;
    public static volatile SingularAttribute<InKardex, BigInteger> saldoAnteriorEmpresa;

}