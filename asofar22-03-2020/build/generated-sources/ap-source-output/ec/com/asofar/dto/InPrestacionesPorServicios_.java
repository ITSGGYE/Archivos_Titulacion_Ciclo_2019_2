package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetallesTarifa;
import ec.com.asofar.dto.InPrestacionesPorServiciosPK;
import ec.com.asofar.dto.PrPrestaciones;
import ec.com.asofar.dto.VeUnidadServicio;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(InPrestacionesPorServicios.class)
public class InPrestacionesPorServicios_ { 

    public static volatile ListAttribute<InPrestacionesPorServicios, CoDetallesTarifa> coDetallesTarifaList;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> estado;
    public static volatile SingularAttribute<InPrestacionesPorServicios, InPrestacionesPorServiciosPK> inPrestacionesPorServiciosPK;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> esFacturable;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> aplicaDescuento;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> usuarioCreacion;
    public static volatile SingularAttribute<InPrestacionesPorServicios, VeUnidadServicio> veUnidadServicio;
    public static volatile SingularAttribute<InPrestacionesPorServicios, PrPrestaciones> prPrestaciones;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> aplicaTarifario;
    public static volatile SingularAttribute<InPrestacionesPorServicios, String> usuarioActualizacion;
    public static volatile SingularAttribute<InPrestacionesPorServicios, Date> fechaCreacion;
    public static volatile SingularAttribute<InPrestacionesPorServicios, Date> fechaActualizacion;
    public static volatile SingularAttribute<InPrestacionesPorServicios, BigInteger> idEmpresa;

}