package ec.com.asofar.dto;

import ec.com.asofar.dto.PrGrupos;
import ec.com.asofar.dto.PrPrestaciones;
import ec.com.asofar.dto.PrProductos;
import ec.com.asofar.dto.PrSubgrupos;
import ec.com.asofar.dto.PrTipoMedidas;
import ec.com.asofar.dto.SeSucursal;
import ec.com.asofar.dto.VeUnidadServicio;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeEmpresa.class)
public class SeEmpresa_ { 

    public static volatile ListAttribute<SeEmpresa, PrSubgrupos> prSubgruposList;
    public static volatile SingularAttribute<SeEmpresa, String> ruc;
    public static volatile SingularAttribute<SeEmpresa, String> estado;
    public static volatile ListAttribute<SeEmpresa, PrGrupos> prGruposList;
    public static volatile SingularAttribute<SeEmpresa, String> direccion;
    public static volatile SingularAttribute<SeEmpresa, String> usuarioCreacion;
    public static volatile ListAttribute<SeEmpresa, PrPrestaciones> prPrestacionesList;
    public static volatile ListAttribute<SeEmpresa, PrProductos> prProductosList;
    public static volatile SingularAttribute<SeEmpresa, String> correo;
    public static volatile SingularAttribute<SeEmpresa, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeEmpresa, String> nombreComercial;
    public static volatile SingularAttribute<SeEmpresa, Date> fechaCreacion;
    public static volatile SingularAttribute<SeEmpresa, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeEmpresa, Long> idEmpresa;
    public static volatile SingularAttribute<SeEmpresa, String> telefono;
    public static volatile ListAttribute<SeEmpresa, SeSucursal> seSucursalList;
    public static volatile ListAttribute<SeEmpresa, VeUnidadServicio> veUnidadServicioList;
    public static volatile ListAttribute<SeEmpresa, PrTipoMedidas> prTipoMedidasList;

}