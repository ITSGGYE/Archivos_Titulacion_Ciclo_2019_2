package ec.com.asofar.dto;

import ec.com.asofar.dto.CoDetallesTarifa;
import ec.com.asofar.dto.PrDetalleTarifario;
import ec.com.asofar.dto.PrTarifarioPK;
import ec.com.asofar.dto.SeSucursal;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrTarifario.class)
public class PrTarifario_ { 

    public static volatile SingularAttribute<PrTarifario, String> descripcion;
    public static volatile ListAttribute<PrTarifario, CoDetallesTarifa> coDetallesTarifaList;
    public static volatile SingularAttribute<PrTarifario, String> estado;
    public static volatile SingularAttribute<PrTarifario, Date> fechaFinVigente;
    public static volatile ListAttribute<PrTarifario, PrDetalleTarifario> prDetalleTarifarioList;
    public static volatile SingularAttribute<PrTarifario, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrTarifario, PrTarifarioPK> prTarifarioPK;
    public static volatile SingularAttribute<PrTarifario, Date> fechaCreacion;
    public static volatile SingularAttribute<PrTarifario, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrTarifario, SeSucursal> seSucursal;
    public static volatile SingularAttribute<PrTarifario, String> usuarioCreacion;
    public static volatile SingularAttribute<PrTarifario, Date> fechaInicioVigente;

}