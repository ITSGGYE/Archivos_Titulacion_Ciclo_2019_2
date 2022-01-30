package ec.com.academico.dto;

import ec.com.academico.dto.RelCursoParalelo;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Paralelos.class)
public class Paralelos_ { 

    public static volatile SingularAttribute<Paralelos, Character> estado;
    public static volatile ListAttribute<Paralelos, RelCursoParalelo> relCursoParaleloList;
    public static volatile SingularAttribute<Paralelos, Long> idParalelos;
    public static volatile SingularAttribute<Paralelos, String> nombre;

}