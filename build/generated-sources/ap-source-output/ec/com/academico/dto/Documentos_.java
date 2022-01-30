package ec.com.academico.dto;

import ec.com.academico.dto.RelMatriDoc;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Documentos.class)
public class Documentos_ { 

    public static volatile ListAttribute<Documentos, RelMatriDoc> relMatriDocList;
    public static volatile SingularAttribute<Documentos, Character> estado;
    public static volatile SingularAttribute<Documentos, String> documento;
    public static volatile SingularAttribute<Documentos, Long> idDocumentos;

}