package ec.com.academico.dto;

import ec.com.academico.dto.Estudiantes;
import ec.com.academico.dto.PeriodoLectivo;
import ec.com.academico.dto.RelCursoParalelo;
import ec.com.academico.dto.RelMatriDoc;
import ec.com.academico.dto.TipoMatricula;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Matricula.class)
public class Matricula_ { 

    public static volatile SingularAttribute<Matricula, PeriodoLectivo> idPeriodoLectivo;
    public static volatile ListAttribute<Matricula, RelMatriDoc> relMatriDocList;
    public static volatile SingularAttribute<Matricula, Character> estado;
    public static volatile SingularAttribute<Matricula, TipoMatricula> idTipoMatricula;
    public static volatile SingularAttribute<Matricula, Long> idMatricula;
    public static volatile SingularAttribute<Matricula, Date> fechaRegistro;
    public static volatile SingularAttribute<Matricula, RelCursoParalelo> idCurso;
    public static volatile SingularAttribute<Matricula, Estudiantes> idEstudiante;
    public static volatile SingularAttribute<Matricula, String> motivoEstado;

}