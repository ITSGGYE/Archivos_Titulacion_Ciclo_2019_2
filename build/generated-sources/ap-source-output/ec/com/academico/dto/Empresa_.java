package ec.com.academico.dto;

import ec.com.academico.dto.Sucursal;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Empresa.class)
public class Empresa_ { 

    public static volatile SingularAttribute<Empresa, String> ruc;
    public static volatile ListAttribute<Empresa, Sucursal> sucursalList;
    public static volatile SingularAttribute<Empresa, Character> estado;
    public static volatile SingularAttribute<Empresa, Long> idEmpresa;
    public static volatile SingularAttribute<Empresa, String> nombre;

}