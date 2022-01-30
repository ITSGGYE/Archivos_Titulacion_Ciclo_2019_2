package ec.com.academico.dto;

import ec.com.academico.dto.Matricula;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(PeriodoLectivo.class)
public class PeriodoLectivo_ { 

    public static volatile SingularAttribute<PeriodoLectivo, Long> idPeriodoLectivo;
    public static volatile SingularAttribute<PeriodoLectivo, Character> estado;
    public static volatile SingularAttribute<PeriodoLectivo, String> periodo;
    public static volatile ListAttribute<PeriodoLectivo, Matricula> matriculaList;

}