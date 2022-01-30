package ec.com.academico.dto;

import ec.com.academico.dto.Estudiantes;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Parentesco.class)
public class Parentesco_ { 

    public static volatile SingularAttribute<Parentesco, Character> estado;
    public static volatile ListAttribute<Parentesco, Estudiantes> estudiantesList;
    public static volatile SingularAttribute<Parentesco, Long> idParentesco;
    public static volatile SingularAttribute<Parentesco, String> nombre;

}