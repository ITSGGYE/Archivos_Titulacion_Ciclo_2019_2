package ec.com.asofar.dto;

import ec.com.asofar.dto.CoOrdenCompras;
import ec.com.asofar.dto.CoOrdenPedido;
import ec.com.asofar.dto.InBodega;
import ec.com.asofar.dto.InKardex;
import ec.com.asofar.dto.InMovimientos;
import ec.com.asofar.dto.PrTarifario;
import ec.com.asofar.dto.SeEmpresa;
import ec.com.asofar.dto.SeSucursalPK;
import ec.com.asofar.dto.SeUsuarioSucurRol;
import ec.com.asofar.dto.VeFactura;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeSucursal.class)
public class SeSucursal_ { 

    public static volatile SingularAttribute<SeSucursal, String> ruc;
    public static volatile SingularAttribute<SeSucursal, String> estado;
    public static volatile ListAttribute<SeSucursal, PrTarifario> prTarifarioList;
    public static volatile ListAttribute<SeSucursal, CoOrdenCompras> coOrdenComprasList;
    public static volatile SingularAttribute<SeSucursal, String> direccion;
    public static volatile ListAttribute<SeSucursal, InBodega> inBodegaList;
    public static volatile ListAttribute<SeSucursal, InMovimientos> inMovimientosList;
    public static volatile ListAttribute<SeSucursal, CoOrdenPedido> coOrdenPedidoList;
    public static volatile SingularAttribute<SeSucursal, String> usuarioCreacion;
    public static volatile ListAttribute<SeSucursal, VeFactura> veFacturaList;
    public static volatile ListAttribute<SeSucursal, SeUsuarioSucurRol> seUsuarioSucurRolList;
    public static volatile SingularAttribute<SeSucursal, SeEmpresa> seEmpresa;
    public static volatile SingularAttribute<SeSucursal, String> correo;
    public static volatile SingularAttribute<SeSucursal, String> usuarioActualizacion;
    public static volatile SingularAttribute<SeSucursal, String> nombreComercial;
    public static volatile SingularAttribute<SeSucursal, Date> fechaCreacion;
    public static volatile SingularAttribute<SeSucursal, Date> fechaActualizacion;
    public static volatile SingularAttribute<SeSucursal, SeSucursalPK> seSucursalPK;
    public static volatile SingularAttribute<SeSucursal, String> telefono;
    public static volatile ListAttribute<SeSucursal, InKardex> inKardexList;

}