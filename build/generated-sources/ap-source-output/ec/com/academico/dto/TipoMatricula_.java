package ec.com.academico.dto;

import ec.com.academico.dto.Matricula;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(TipoMatricula.class)
public class TipoMatricula_ { 

    public static volatile SingularAttribute<TipoMatricula, String> tipoMatricula;
    public static volatile SingularAttribute<TipoMatricula, Character> estado;
    public static volatile SingularAttribute<TipoMatricula, Long> idTipoMatricula;
    public static volatile ListAttribute<TipoMatricula, Matricula> matriculaList;

}