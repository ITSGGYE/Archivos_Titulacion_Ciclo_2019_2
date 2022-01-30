package ec.com.academico.dto;

import ec.com.academico.dto.Estudiantes;
import java.math.BigInteger;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Representante.class)
public class Representante_ { 

    public static volatile SingularAttribute<Representante, String> apellidos;
    public static volatile SingularAttribute<Representante, Character> estado;
    public static volatile ListAttribute<Representante, Estudiantes> estudiantesList;
    public static volatile SingularAttribute<Representante, BigInteger> idTipoIdentificacion;
    public static volatile SingularAttribute<Representante, String> rutaImagenCarnet;
    public static volatile SingularAttribute<Representante, String> correo;
    public static volatile SingularAttribute<Representante, String> direccion;
    public static volatile SingularAttribute<Representante, String> celular;
    public static volatile SingularAttribute<Representante, String> identificacion;
    public static volatile SingularAttribute<Representante, String> telefono;
    public static volatile SingularAttribute<Representante, String> nombres;
    public static volatile SingularAttribute<Representante, Long> idRepresentante;

}