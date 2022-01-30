package ec.com.academico.dto;

import ec.com.academico.dto.RelCursoParalelo;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Cursos.class)
public class Cursos_ { 

    public static volatile SingularAttribute<Cursos, Character> estado;
    public static volatile ListAttribute<Cursos, RelCursoParalelo> relCursoParaleloList;
    public static volatile SingularAttribute<Cursos, Long> idCursos;
    public static volatile SingularAttribute<Cursos, String> nombre;

}