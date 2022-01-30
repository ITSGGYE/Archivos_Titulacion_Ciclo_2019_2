package ec.com.academico.dto;

import ec.com.academico.dto.Estudiantes;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(SeContactoEstudiante.class)
public class SeContactoEstudiante_ { 

    public static volatile SingularAttribute<SeContactoEstudiante, String> relacion;
    public static volatile SingularAttribute<SeContactoEstudiante, String> direccionDomiciliaria;
    public static volatile SingularAttribute<SeContactoEstudiante, Character> estado;
    public static volatile SingularAttribute<SeContactoEstudiante, String> celular;
    public static volatile SingularAttribute<SeContactoEstudiante, Estudiantes> idEstudiante;
    public static volatile SingularAttribute<SeContactoEstudiante, Long> idContactoEstudiante;
    public static volatile SingularAttribute<SeContactoEstudiante, String> nombreCompleto;
    public static volatile SingularAttribute<SeContactoEstudiante, String> telefono;
    public static volatile SingularAttribute<SeContactoEstudiante, String> email;

}