package ec.com.academico.dto;

import ec.com.academico.dto.Empresa;
import ec.com.academico.dto.RelSucUsu;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Sucursal.class)
public class Sucursal_ { 

    public static volatile SingularAttribute<Sucursal, Long> idSucursal;
    public static volatile ListAttribute<Sucursal, RelSucUsu> relSucUsuList;
    public static volatile SingularAttribute<Sucursal, Empresa> idEmpresa;
    public static volatile SingularAttribute<Sucursal, String> nombre;

}