package ec.com.asofar.dto;

import ec.com.asofar.dto.SeCiudad;
import ec.com.asofar.dto.SeLocalidadCliente;
import ec.com.asofar.dto.SePais;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeProvincia.class)
public class SeProvincia_ { 

    public static volatile SingularAttribute<SeProvincia, Long> idProvincia;
    public static volatile SingularAttribute<SeProvincia, String> estado;
    public static volatile SingularAttribute<SeProvincia, SePais> idPais;
    public static volatile ListAttribute<SeProvincia, SeLocalidadCliente> seLocalidadClienteList;
    public static volatile SingularAttribute<SeProvincia, String> nombre;
    public static volatile ListAttribute<SeProvincia, SeCiudad> seCiudadList;

}