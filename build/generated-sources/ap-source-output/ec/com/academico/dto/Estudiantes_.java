package ec.com.academico.dto;

import ec.com.academico.dto.Matricula;
import ec.com.academico.dto.Parentesco;
import ec.com.academico.dto.Representante;
import ec.com.academico.dto.SeContactoEstudiante;
import java.math.BigInteger;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Estudiantes.class)
public class Estudiantes_ { 

    public static volatile SingularAttribute<Estudiantes, String> apellidos;
    public static volatile SingularAttribute<Estudiantes, Character> estado;
    public static volatile SingularAttribute<Estudiantes, Date> fechaNacimiento;
    public static volatile ListAttribute<Estudiantes, SeContactoEstudiante> seContactoEstudianteList;
    public static volatile SingularAttribute<Estudiantes, BigInteger> idTipoIdentificacion;
    public static volatile SingularAttribute<Estudiantes, String> rutaImagenCarnet;
    public static volatile ListAttribute<Estudiantes, Matricula> matriculaList;
    public static volatile SingularAttribute<Estudiantes, Parentesco> idParentesco;
    public static volatile SingularAttribute<Estudiantes, String> identificacion;
    public static volatile SingularAttribute<Estudiantes, String> nombres;
    public static volatile SingularAttribute<Estudiantes, Long> idEstudiantes;
    public static volatile SingularAttribute<Estudiantes, String> direccionDomiciliaria;
    public static volatile SingularAttribute<Estudiantes, String> discapacidad;
    public static volatile SingularAttribute<Estudiantes, Character> sexo;
    public static volatile SingularAttribute<Estudiantes, Representante> idRepresentante;

}