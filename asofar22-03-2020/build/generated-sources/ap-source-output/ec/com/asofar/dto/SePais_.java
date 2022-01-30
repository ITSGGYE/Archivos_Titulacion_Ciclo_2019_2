package ec.com.asofar.dto;

import ec.com.asofar.dto.CoProveedores;
import ec.com.asofar.dto.SeLocalidadCliente;
import ec.com.asofar.dto.SeProvincia;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2020-11-13T11:38:15")
@StaticMetamodel(SePais.class)
public class SePais_ { 

    public static volatile SingularAttribute<SePais, String> estado;
    public static volatile SingularAttribute<SePais, Long> idPais;
    public static volatile ListAttribute<SePais, SeLocalidadCliente> seLocalidadClienteList;
    public static volatile SingularAttribute<SePais, String> nombre;
    public static volatile ListAttribute<SePais, CoProveedores> coProveedoresList;
    public static volatile ListAttribute<SePais, SeProvincia> seProvinciaList;

}