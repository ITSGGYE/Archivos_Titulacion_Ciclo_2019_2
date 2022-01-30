package ec.com.asofar.dto;

import ec.com.asofar.dto.InPrestacionesPorServicios;
import ec.com.asofar.dto.PrTipoPrestacion;
import ec.com.asofar.dto.SeEmpresa;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrPrestaciones.class)
public class PrPrestaciones_ { 

    public static volatile SingularAttribute<PrPrestaciones, String> estado;
    public static volatile SingularAttribute<PrPrestaciones, String> aplicaIva;
    public static volatile ListAttribute<PrPrestaciones, InPrestacionesPorServicios> inPrestacionesPorServiciosList;
    public static volatile SingularAttribute<PrPrestaciones, Long> idPrestacion;
    public static volatile SingularAttribute<PrPrestaciones, PrTipoPrestacion> idTipoPrestacion;
    public static volatile SingularAttribute<PrPrestaciones, BigInteger> idPoducto;
    public static volatile SingularAttribute<PrPrestaciones, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrPrestaciones, Date> fechaCreacion;
    public static volatile SingularAttribute<PrPrestaciones, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrPrestaciones, SeEmpresa> idEmpresa;
    public static volatile SingularAttribute<PrPrestaciones, String> nombrePrestacion;
    public static volatile SingularAttribute<PrPrestaciones, String> usuarioCreacion;

}