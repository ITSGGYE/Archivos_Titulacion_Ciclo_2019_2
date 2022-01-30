package ec.com.academico.dto;

import ec.com.academico.dto.RelSucUsu;
import ec.com.academico.dto.RelUsuarioRoles;
import java.math.BigInteger;
import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2021-03-26T10:42:38")
@StaticMetamodel(Usuarios.class)
public class Usuarios_ { 

    public static volatile SingularAttribute<Usuarios, String> apellidos;
    public static volatile SingularAttribute<Usuarios, Character> estado;
    public static volatile ListAttribute<Usuarios, RelSucUsu> relSucUsuList;
    public static volatile SingularAttribute<Usuarios, Long> idUsuario;
    public static volatile SingularAttribute<Usuarios, BigInteger> idTipoIdentificacion;
    public static volatile SingularAttribute<Usuarios, String> rutaImagenCarnet;
    public static volatile SingularAttribute<Usuarios, String> correo;
    public static volatile SingularAttribute<Usuarios, String> celular;
    public static volatile SingularAttribute<Usuarios, String> identificacion;
    public static volatile SingularAttribute<Usuarios, String> telefono;
    public static volatile ListAttribute<Usuarios, RelUsuarioRoles> relUsuarioRolesList;
    public static volatile SingularAttribute<Usuarios, String> nombres;

}