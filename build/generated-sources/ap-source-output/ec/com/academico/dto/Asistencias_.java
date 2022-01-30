package ec.com.academico.dto;

import ec.com.academico.dto.ClasesMateria;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Asistencias.class)
public class Asistencias_ { 

    public static volatile SingularAttribute<Asistencias, Date> fecha;
    public static volatile SingularAttribute<Asistencias, String> asistencia;
    public static volatile SingularAttribute<Asistencias, Long> idAsistencia;
    public static volatile SingularAttribute<Asistencias, BigInteger> idEstudiante;
    public static volatile SingularAttribute<Asistencias, ClasesMateria> idClase;

}