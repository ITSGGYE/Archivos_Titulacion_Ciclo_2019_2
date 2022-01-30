package ec.com.academico.dto;

import ec.com.academico.dto.CursoProfesor;
import java.math.BigInteger;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Docente.class)
public class Docente_ { 

    public static volatile SingularAttribute<Docente, String> apellidos;
    public static volatile SingularAttribute<Docente, Character> estado;
    public static volatile SingularAttribute<Docente, BigInteger> tipoIdentificacion;
    public static volatile ListAttribute<Docente, CursoProfesor> cursoProfesorList;
    public static volatile SingularAttribute<Docente, String> rutaImagenCarnet;
    public static volatile SingularAttribute<Docente, String> identificacion;
    public static volatile SingularAttribute<Docente, Long> idDocente;
    public static volatile SingularAttribute<Docente, String> nombres;

}