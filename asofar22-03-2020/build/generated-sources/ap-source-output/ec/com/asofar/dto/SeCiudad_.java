package ec.com.asofar.dto;

import ec.com.asofar.dto.SeLocalidadCliente;
import ec.com.asofar.dto.SeProvincia;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SeCiudad.class)
public class SeCiudad_ { 

    public static volatile SingularAttribute<SeCiudad, String> estado;
    public static volatile SingularAttribute<SeCiudad, SeProvincia> idProvincia;
    public static volatile ListAttribute<SeCiudad, SeLocalidadCliente> seLocalidadClienteList;
    public static volatile SingularAttribute<SeCiudad, String> nombre;
    public static volatile SingularAttribute<SeCiudad, Long> idCiudad;

}