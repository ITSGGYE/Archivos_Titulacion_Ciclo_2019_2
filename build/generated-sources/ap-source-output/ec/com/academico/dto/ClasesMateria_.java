package ec.com.academico.dto;

import ec.com.academico.dto.Asistencias;
import ec.com.academico.dto.CursoProfesor;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(ClasesMateria.class)
public class ClasesMateria_ { 

    public static volatile SingularAttribute<ClasesMateria, Character> estado;
    public static volatile SingularAttribute<ClasesMateria, CursoProfesor> idCursoProfesor;
    public static volatile ListAttribute<ClasesMateria, Asistencias> asistenciasList;
    public static volatile SingularAttribute<ClasesMateria, Long> idClaseMateria;
    public static volatile SingularAttribute<ClasesMateria, String> clase;

}