package ec.com.academico.dto;

import ec.com.academico.dto.CursoProfesor;
import ec.com.academico.dto.Cursos;
import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.Paralelos;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(RelCursoParalelo.class)
public class RelCursoParalelo_ { 

    public static volatile SingularAttribute<RelCursoParalelo, Paralelos> idParalelo;
    public static volatile SingularAttribute<RelCursoParalelo, Character> estado;
    public static volatile SingularAttribute<RelCursoParalelo, Integer> minino;
    public static volatile ListAttribute<RelCursoParalelo, CursoProfesor> cursoProfesorList;
    public static volatile SingularAttribute<RelCursoParalelo, Integer> maximo;
    public static volatile ListAttribute<RelCursoParalelo, Matricula> matriculaList;
    public static volatile SingularAttribute<RelCursoParalelo, Cursos> idCurso;
    public static volatile SingularAttribute<RelCursoParalelo, Long> idRelCursoParalelo;

}