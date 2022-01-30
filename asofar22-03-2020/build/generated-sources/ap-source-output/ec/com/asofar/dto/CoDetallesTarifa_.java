package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetallesTarifaPK;
import ec.com.asofar.dto.InPrestacionesPorServicios;
import ec.com.asofar.dto.PrTarifario;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:16")
@StaticMetamodel(CoDetallesTarifa.class)
public class CoDetallesTarifa_ { 

    public static volatile SingularAttribute<CoDetallesTarifa, PrTarifario> prTarifario;
    public static volatile SingularAttribute<CoDetallesTarifa, BigInteger> valorVentaMayorista;
    public static volatile SingularAttribute<CoDetallesTarifa, Date> fechaIngreso;
    public static volatile SingularAttribute<CoDetallesTarifa, InPrestacionesPorServicios> inPrestacionesPorServicios;
    public static volatile SingularAttribute<CoDetallesTarifa, Date> fechaModificacion;
    public static volatile SingularAttribute<CoDetallesTarifa, String> usuarioIngreso;
    public static volatile SingularAttribute<CoDetallesTarifa, BigInteger> valorVenta;
    public static volatile SingularAttribute<CoDetallesTarifa, CoDetallesTarifaPK> coDetallesTarifaPK;
    public static volatile SingularAttribute<CoDetallesTarifa, String> esActivo;
    public static volatile SingularAttribute<CoDetallesTarifa, BigInteger> valorCosto;
    public static volatile SingularAttribute<CoDetallesTarifa, String> usuarioModificacion;
    public static volatile SingularAttribute<CoDetallesTarifa, BigInteger> valorMinimoVenta;

}