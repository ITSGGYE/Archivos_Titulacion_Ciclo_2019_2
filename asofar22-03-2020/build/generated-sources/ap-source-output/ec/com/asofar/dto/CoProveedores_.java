package ec.com.asofar.dto;

import ec.com.asofar.dto.InMovimientos;
import ec.com.asofar.dto.PrProductos;
import ec.com.asofar.dto.SePais;
import ec.com.asofar.dto.SeTipoPersona;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(CoProveedores.class)
public class CoProveedores_ { 

    public static volatile SingularAttribute<CoProveedores, String> paginaWeb;
    public static volatile SingularAttribute<CoProveedores, Character> estado;
    public static volatile SingularAttribute<CoProveedores, SeTipoPersona> tipoPersona;
    public static volatile SingularAttribute<CoProveedores, String> codigoContribuyente;
    public static volatile SingularAttribute<CoProveedores, String> numeroIdentificacion;
    public static volatile SingularAttribute<CoProveedores, SePais> idPais;
    public static volatile SingularAttribute<CoProveedores, String> direccion;
    public static volatile SingularAttribute<CoProveedores, String> contribuyenteEspecial;
    public static volatile SingularAttribute<CoProveedores, String> nombre;
    public static volatile ListAttribute<CoProveedores, InMovimientos> inMovimientosList;
    public static volatile SingularAttribute<CoProveedores, String> usuarioCreacion;
    public static volatile ListAttribute<CoProveedores, PrProductos> prProductosList;
    public static volatile SingularAttribute<CoProveedores, Long> idProveedor;
    public static volatile SingularAttribute<CoProveedores, String> observaciones;
    public static volatile SingularAttribute<CoProveedores, String> usuarioActualizacion;
    public static volatile SingularAttribute<CoProveedores, String> telefono1;
    public static volatile SingularAttribute<CoProveedores, String> nombreComercial;
    public static volatile SingularAttribute<CoProveedores, Date> fechaCreacion;
    public static volatile SingularAttribute<CoProveedores, Date> fechaActualizacion;
    public static volatile SingularAttribute<CoProveedores, String> telefono2;
    public static volatile SingularAttribute<CoProveedores, String> email;

}