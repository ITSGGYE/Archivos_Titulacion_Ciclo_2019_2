package ec.com.asofar.dto;

import ec.com.asofar.dto.PrProductos;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(PrFabricante.class)
public class PrFabricante_ { 

    public static volatile SingularAttribute<PrFabricante, Long> idFabricante;
    public static volatile SingularAttribute<PrFabricante, String> estado;
    public static volatile ListAttribute<PrFabricante, PrProductos> prProductosList;
    public static volatile SingularAttribute<PrFabricante, String> usuarioActualizacion;
    public static volatile SingularAttribute<PrFabricante, Date> fechaCreacion;
    public static volatile SingularAttribute<PrFabricante, Date> fechaActualizacion;
    public static volatile SingularAttribute<PrFabricante, String> nombre;
    public static volatile SingularAttribute<PrFabricante, String> usuarioCreacion;

}