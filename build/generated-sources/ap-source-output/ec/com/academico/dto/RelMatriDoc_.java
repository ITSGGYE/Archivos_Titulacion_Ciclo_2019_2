package ec.com.academico.dto;

import ec.com.academico.dto.Documentos;
import ec.com.academico.dto.Matricula;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(RelMatriDoc.class)
public class RelMatriDoc_ { 

    public static volatile SingularAttribute<RelMatriDoc, Character> estado;
    public static volatile SingularAttribute<RelMatriDoc, Long> idRelMatriDoc;
    public static volatile SingularAttribute<RelMatriDoc, Documentos> idDocumento;
    public static volatile SingularAttribute<RelMatriDoc, Matricula> idMatricula;
    public static volatile SingularAttribute<RelMatriDoc, Date> fechaCreacion;

}