package ec.com.academico.dto;

import ec.com.academico.dto.ClasesMateria;
import ec.com.academico.dto.Docente;
import ec.com.academico.dto.RelCursoParalelo;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(CursoProfesor.class)
public class CursoProfesor_ { 

    public static volatile SingularAttribute<CursoProfesor, Long> idCursoProfesor;
    public static volatile SingularAttribute<CursoProfesor, Character> estado;
    public static volatile SingularAttribute<CursoProfesor, RelCursoParalelo> idCurso;
    public static volatile ListAttribute<CursoProfesor, ClasesMateria> clasesMateriaList;
    public static volatile SingularAttribute<CursoProfesor, Docente> idDocente;

}