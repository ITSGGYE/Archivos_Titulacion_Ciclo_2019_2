
-- ----------------------------
-- Procedure structure for actualizar_actividades_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_actividades_cursos`;
delimiter ;;
CREATE PROCEDURE `actualizar_actividades_cursos`(IN `ids` INT, IN `descripcioness` VARCHAR(255))
BEGIN

			UPDATE dre set 
			
				descripcion= upper(descripcioness)
	
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `actualizar_anos_lectivos`(IN `ids` INT, IN `nombress` varchar(255))
BEGIN
			UPDATE anos_lectivos set 
				nombre=  nombress
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_aulas`;
delimiter ;;
CREATE PROCEDURE `actualizar_aulas`(IN `ids` INT, IN `aulass` VARCHAR(255))
BEGIN


			UPDATE aulas set 
				nombre= UPPER(aulass)
			where id=ids ;
			
			

			/*UPDATE aulas_jornadas set 
				id_jornadas= jornadass
			where id_aulas=ids ;*/


SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_cursos`;
delimiter ;;
CREATE PROCEDURE `actualizar_cursos`(IN `ids` INT, IN `id_ctlg_cursoss` INT)
BEGIN
			UPDATE cursos set 
				id_ctlg_cursos=  id_ctlg_cursoss
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_cursos_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_cursos_materias`;
delimiter ;;
CREATE PROCEDURE `actualizar_cursos_materias`(IN `ids` INT, IN `materiass` INT)
BEGIN
			UPDATE cursos_materias set 
				id_materias=  materiass
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_cursos_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_cursos_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `actualizar_cursos_paralelos_aulas`(IN `ids` INT, IN `aulass`int)
BEGIN
			UPDATE cursos_paralelos_aulas set 
				id_aulas=  aulass
			
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_docentes
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_docentes`;
delimiter ;;
CREATE PROCEDURE `actualizar_docentes`(in ids int,IN `nombress` VARCHAR(255), IN `apellidoss` VARCHAR(255), IN `numero_documentoss` VARCHAR(255), IN `id_ctlg_profesioness` INT, IN `correoss` VARCHAR(255), IN `direccionss` VARCHAR(255), IN `telefonoss` VARCHAR(255))
BEGIN
declare _id_usuarios int;
			UPDATE docentes set 
			nombres= UPPER(nombress),
			apellidos = UPPER(apellidoss),
			numero_documento = numero_documentoss,
			id_ctlg_profesiones = id_ctlg_profesioness,
			correo = correoss,
			direccion= direccionss,
			telefonos= telefonoss
where id=ids ;	

	SET _id_usuarios= 	(	
				select id_usuarios 
				from docentes	
				where id = ids
							);
							
			UPDATE usuarios set
			nombres= UPPER(nombress),
			apellidos = UPPER(apellidoss),
			correo = correoss
where id=_id_usuarios ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_docentes_asignar_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_docentes_asignar_cursos`;
delimiter ;;
CREATE PROCEDURE `actualizar_docentes_asignar_cursos`(IN `ids` INT , in `docentess` INT)
BEGIN


			UPDATE docentes_asignar_curso set 
			
				id_docentes_jornadas_materias= docentess 
				
	
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_docentes_jornadas_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_docentes_jornadas_materias`;
delimiter ;;
CREATE PROCEDURE `actualizar_docentes_jornadas_materias`(IN `ids` INT, IN `jornadass` INT, IN `materiass` INT)
BEGIN
			UPDATE docentes_jornadas_materias set 
			
			id_jornadas= jornadass,
			id_materias= materiass
where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_edificios
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_edificios`;
delimiter ;;
CREATE PROCEDURE `actualizar_edificios`(IN `ids` INT, IN `nombress` VARCHAR(255))
BEGIN
			UPDATE edificios set 
				nombre= UPPER( nombress)
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_estudiantes`;
delimiter ;;
CREATE PROCEDURE `actualizar_estudiantes`(IN `ids` INT,IN `nombress` VARCHAR(255), IN `apellidoss` VARCHAR(255), IN `numero_documentoss` VARCHAR(255), IN `correoss` VARCHAR(255), IN `direccionss` VARCHAR(255), IN `telefonoss` VARCHAR(255), IN `celularss` VARCHAR(255), IN `observacionss` VARCHAR(255))
BEGIN

declare _id_usuarios int;

			UPDATE estudiantes set 
			nombres= UPPER(nombress),
			apellidos = UPPER(apellidoss),
			numero_documento = numero_documentoss,
			correo = correoss,
			direccion= direccionss,
			telefono= telefonoss,
			celular= celularss,
			observacion= observacionss
			
			
			
where id=ids ;


SET _id_usuarios= 	(	
				select id_usuarios 
				from docentes	
				where id = ids
							);
							
			UPDATE usuarios set
			nombres= UPPER(nombress),
			apellidos = UPPER(apellidoss),
			correo = correoss
where id=_id_usuarios ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_familiares`;
delimiter ;;
CREATE PROCEDURE `actualizar_familiares`(IN ids INT,IN `nombress` VARCHAR(255), IN `apellidoss` VARCHAR(255), IN `numero_documentoss` VARCHAR(255), IN `id_ctlg_profesioness` INT, IN `correoss` VARCHAR(255), IN `id_ctlg_parentescoss` INT, IN `direccionss` VARCHAR(255), IN `telefonoss` VARCHAR(255), IN `celularss` VARCHAR(255), IN `id_ctlg_estados_civilss` INT, IN `lugar_trabajoss` VARCHAR(255), IN `direccion_trabajoss` VARCHAR(255), IN `id_ctlg_cantoness` INT, IN `telefono_trabajoss` VARCHAR(255), IN `cargoss` VARCHAR(255))
BEGIN




			UPDATE familiares set 
				nombres= UPPER(nombress),
				apellidos=	UPPER(apellidoss),
				numero_documento= numero_documentoss,
				id_ctlg_profesiones=id_ctlg_profesioness,
				correo=correoss,
				id_ctlg_parentescos=id_ctlg_parentescoss,
				direccion_domicilio=direccionss,
				telefono_domicilio=	telefonoss,
				celular=celularss,
				id_ctlg_estados_civil=id_ctlg_estados_civilss,
				lugar_trabajo=lugar_trabajoss,
				direccion_trabajo=direccion_trabajoss ,
				id_ctlg_cantones=id_ctlg_cantoness,
				telefono_trabajo=telefono_trabajoss ,
				cargo=cargoss
			
			where id=ids ;
			
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_inscripciones`;
delimiter ;;
CREATE PROCEDURE `actualizar_inscripciones`(IN `ids` INT, IN `id_jornadass` INT)
BEGIN

			UPDATE inscripciones set 
			
				id_jornadas= id_jornadass 
				
	
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_insumos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_insumos`;
delimiter ;;
CREATE PROCEDURE `actualizar_insumos`(IN `ids` INT, IN `id_ctlg_insumoss` int)
BEGIN
			UPDATE insumos set 
				id_ctlg_insumos=  id_ctlg_insumoss
				where id= ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_jornadas`;
delimiter ;;
CREATE PROCEDURE `actualizar_jornadas`(IN `ids` INT, IN `id_ctlg_jornadass` int)
BEGIN
			UPDATE jornadas set 
				id_ctlg_jornadas=  id_ctlg_jornadass
				where id= ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_materias`;
delimiter ;;
CREATE PROCEDURE `actualizar_materias`(IN `ids` INT, IN `id_ctlg_materiass` int)
BEGIN
			UPDATE materias set 
				id_ctlg_materias=  id_ctlg_materiass
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_matriculaciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_matriculaciones`;
delimiter ;;
CREATE PROCEDURE `actualizar_matriculaciones`(IN `ids` INT,IN `id_paralelos_aulass` INT)
BEGIN

			UPDATE matriculas set 
			id_cursos_paralelos_aulas= id_paralelos_aulass
			
where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_notas
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_notas`;
delimiter ;;
CREATE PROCEDURE `actualizar_notas`(IN `ids` INT, IN `valorss` double)
BEGIN
			UPDATE nota1 set 
				valor=  valorss
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_paralelos`;
delimiter ;;
CREATE PROCEDURE `actualizar_paralelos`(IN `ids` INT, IN `nombress` VARCHAR(255))
BEGIN
			UPDATE paralelos set 
				nombre= UPPER(nombress )
			where id=ids ;
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_parciales`;
delimiter ;;
CREATE PROCEDURE `actualizar_parciales`(IN `ids` INT, IN `id_ctlg_parcialess` int)
BEGIN
			UPDATE parciales set 
				id_ctlg_parciales=  id_ctlg_parcialess
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_periodos`;
delimiter ;;
CREATE PROCEDURE `actualizar_periodos`(IN `ids` INT, IN `id_ctlg_periodoss` int)
BEGIN
			UPDATE periodos set 
				id_ctlg_periodos=  id_ctlg_periodoss
				where id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for actualizar_usuarios
-- ----------------------------
DROP PROCEDURE IF EXISTS `actualizar_usuarios`;
delimiter ;;
CREATE PROCEDURE `actualizar_usuarios`(`_nombres` VARCHAR(255), `_apellidos` VARCHAR(255), `_correo` VARCHAR(255), `_contrasena` VARCHAR(255), `_id_perfiles` INT, `_id_ctlg_estados` INT)
BEGIN
			UPDATE usuarios set 
				nombres= UPPER( _nombres),
				apellidos = UPPER(_apellidos) ,
				correo = _correo ,
				contrasena = _contrasena ,	
				id_ctlg_estados = 	_id_ctlg_estados ,
				id_perfiles = _id_perfiles 

;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for baja_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `baja_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `baja_anos_lectivos`(IN `ids` INT, IN `id_ctlg_estadoss`int)
BEGIN
			UPDATE anos_lectivos as ano
			
			INNER JOIN ctlg_estados as estados ON estados.id = ano.id_ctlg_estados 
			INNER JOIN dre as dre on dre.id_ctlg_estados=estados.id 
			
			inner JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso and dac.id_ctlg_estados=estados.id 

		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas and cpa.id_ctlg_estados=estados.id 

		inner join cursos as c on c.id= cpa.id_cursos and  c.id_anos_lectivos=ano.id and c.id_ctlg_estados=estados.id 

		inner JOIN inscripciones as i on i.id_cursos=c.id and i.id_anos_lectivos=ano.id  and i.id_ctlg_estados=estados.id 

		inner JOIN matriculas as matri on i.id=matri.id_inscripciones   and matri.id_ctlg_estados=estados.id 

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id and cj.id_ctlg_estados=estados.id 

		INNER JOIN jornadas as j on j.id = cj.id_jornadas and j.id_anos_lectivos=ano.id and j.id_ctlg_estados=estados.id 
 

		inner JOIN aulas as a ON a.id = cpa.id_aulas and a.id_ctlg_estados=estados.id    
		inner JOIN edificios as e ON e.id = a.id_edificios and e.id_ctlg_estados=estados.id 
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= ano.id and eano.id_edificios = e.id and eano.id_ctlg_estados=estados.id 
		 
 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id and aj.id_ctlg_estados=estados.id 


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= ano.id and p.id_ctlg_estados=estados.id 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas=j.id   and pj.id_ctlg_estados=estados.id 

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id and cm.id_ctlg_estados=estados.id 
		inner JOIN materias as m ON m.id = cm.id_materias and m.id_anos_lectivos= ano.id  and m.id_ctlg_estados=estados.id 
	
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_ctlg_estados=estados.id 
	
	
	inner JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas and n.id_ctlg_estados=estados.id
	
	
	
			INNER join periodos as peri on peri.id_anos_lectivos= ano.id and peri.id_ctlg_estados=estados.id
			inner join parciales as parc on  parc.id_periodos=peri.id and parc.id_ctlg_estados=estados.id
			inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos and iso.id_ctlg_estados=estados.id

 
 set 
 
 ano.id_ctlg_estados= id_ctlg_estadoss , 
 dre.id_ctlg_estados = id_ctlg_estadoss  , 
 dac.id_ctlg_estados = id_ctlg_estadoss, 
 cpa.id_ctlg_estados = id_ctlg_estadoss, 
 c.id_ctlg_estados = id_ctlg_estadoss,
 i.id_ctlg_estados = id_ctlg_estadoss,
 matri.id_ctlg_estados = id_ctlg_estadoss,
 cj.id_ctlg_estados = id_ctlg_estadoss,
 j.id_ctlg_estados = id_ctlg_estadoss,
 eano.id_ctlg_estados = id_ctlg_estadoss,
 aj.id_ctlg_estados = id_ctlg_estadoss,
 p.id_ctlg_estados = id_ctlg_estadoss,
 pj.id_ctlg_estados = id_ctlg_estadoss,
cm.id_ctlg_estados = id_ctlg_estadoss,
m.id_ctlg_estados = id_ctlg_estadoss,
djm.id_ctlg_estados = id_ctlg_estadoss,
peri.id_ctlg_estados = id_ctlg_estadoss,
parc.id_ctlg_estados = id_ctlg_estadoss,
iso.id_ctlg_estados = id_ctlg_estadoss,
 n.id_ctlg_estados = id_ctlg_estadoss

				where ano.id=ids ;
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for buscar_actividad_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `buscar_actividad_curso`;
delimiter ;;
CREATE PROCEDURE `buscar_actividad_curso`(IN `_id_anos_lectivos` INT, IN `_id_jornadas` INT, IN `_id_cursos` INT, IN `_id_paralelos` INT, IN `_id_docentes` INT, IN `_id_materias` INT, IN `_id_aulas` INT, IN `_id_insumos` INT)
BEGIN

	SELECT * from insumos where id=_id_insumos;

/*
declare _id_docentes_jornadas_materias int;
declare _id_cursos_paralelos_aulas int ;
declare _id_docentes_asignar_cursos int ;


		SET _id_docentes_jornadas_materias= 	(	
				select id 
				from docentes_jornadas_materias	
				where _id_docentes = id_docentes 
							AND  _id_jornadas= id_jornadas  
							AND _id_materias =id_materias  
							AND _id_anos_lectivos = id_anos_lectivos
							);

		SET _id_cursos_paralelos_aulas= (
				select id 
				from cursos_paralelos_aulas 
				where _id_cursos = id_cursos 
							AND _id_aulas= id_aulas 
							AND _id_paralelos =id_paralelos
							);	
							
							
		SET _id_docentes_asignar_cursos= (
				select
					id 
				from
					docentes_asignar_curso 
				where
					_id_docentes_jornadas_materias = id_docentes_jornadas_materias 
					AND _id_cursos_paralelos_aulas= id_cursos_paralelos_aulas
		);	
							
							


 INSERT INTO dre(
	id_docentes_asignar_curso,
	id_insumos,
	descripcion
	
)

	VALUES (  
			_id_docentes_asignar_cursos ,
			_id_insumos,
			_descripciones
			
  );*/

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_anio
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_anio`;
delimiter ;;
CREATE PROCEDURE `catalogo_anio`(IN `_id_docentes` INT)
BEGIN
  		SELECT
	ano.id as value,
	ano.nombre as label
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		left JOIN inscripciones as i on i.id_cursos=c.id 
		left JOIN matriculas as matri on i.id=matri.id_inscripciones  
	
		left JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas 
		
		
		inner JOIN edificios as e ON e.id = a.id_edificios
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= eano.id_edificios
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and matri.id_paralelos = p.id
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos


where
			
			
		d.id= _id_docentes
			and	dac.deleted_at is null GROUP BY ano.id  ORDER BY ano.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `catalogo_anos_lectivos`()
BEGIN


			select
				anos_lectivos.id as value,
			anos_lectivos.nombre as label

			FROM

					anos_lectivos
				INNER JOIN ctlg_estados ON anos_lectivos.id_ctlg_estados = ctlg_estados.id 	
					
		
			where 
			
			anos_lectivos.id_ctlg_estados = 1 AND	anos_lectivos.deleted_at is null ; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_anos_lectivosreport
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_anos_lectivosreport`;
delimiter ;;
CREATE PROCEDURE `catalogo_anos_lectivosreport`()
BEGIN


			select
				id as value,
			nombre as label

			FROM

					anos_lectivos
				
					
		
			where 
			
				deleted_at is null ; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_aulas`;
delimiter ;;
CREATE PROCEDURE `catalogo_aulas`()
BEGIN


		SELECT
				nombre as label ,
				id as value
			FROM
				aulas
				

				
				
			
			where 
			deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_aulas_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_aulas_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `catalogo_aulas_anos_lectivos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				a.nombre as label,
				a.id as value
				FROM
					
					aulas as a 
					
					INNER JOIN edificios as e ON e.id = a.id_edificios
					INNER JOIN organizaciones as o on o.id = a.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= a.id_ctlg_estados
					inner JOIN edificios_anos_lectivos as eano on eano.id_edificios= e.id
					inner join anos_lectivos as ano on ano.id=eano.id_anos_lectivos
					
					
			where 
			eano.id_anos_lectivos= _id_anos_lectivos
			and	a.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_aulas_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_aulas_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_aulas_jornadas`(IN `_id_jornadas` INT)
BEGIN


		SELECT
				a.nombre as label,
				a.id as value
			FROM
				aulas as a
				left JOIN aulas_jornadas as ea on ea.id_aulas = a.id
				left JOIN jornadas as j on ea.id_jornadas = j.id
				

				
				
			
			where 
			ea.id_jornadas= _id_jornadas
			and	ea.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_aulas_por_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_aulas_por_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_aulas_por_jornadas`(IN `jornadass` VARCHAR(255))
BEGIN


		SELECT
				a.nombre as label,
				a.id as value
			FROM
				aulas as a
				inner	JOIN aulas_jornadas as ea on ea.id_aulas = a.id
				inner JOIN jornadas as j on ea.id_jornadas = j.id
				inner JOIN ctlg_jornadas as ctlg_j on ctlg_j.id = j.id_ctlg_jornadas
				

				
				
			
			where 
			ctlg_j.nombre= jornadass
			and	ea.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_cantones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_cantones`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_cantones`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_cantones 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_cursos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_cursos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_cursos 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_estados_civil
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_estados_civil`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_estados_civil`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_estados_civil
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_generos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_generos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_generos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_generos
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_insumos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_insumos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_insumos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_insumos 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_jornadas`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_jornadas 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_materias`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_materias`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_materias 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_paises
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_paises`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_paises`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_paises
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_parciales`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_parciales`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_parciales 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_parentescos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_parentescos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_parentescos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_parentescos
			
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_parroquias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_parroquias`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_parroquias`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_parroquias
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_periodos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_periodos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_periodos 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_profesiones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_profesiones`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_profesiones`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_profesiones
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_provincias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_provincias`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_provincias`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_provincias
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_tipos_documentos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_tipos_documentos`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_tipos_documentos`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_tipos_documentos 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_ctlg_tipos_sangre
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_ctlg_tipos_sangre`;
delimiter ;;
CREATE PROCEDURE `catalogo_ctlg_tipos_sangre`()
BEGIN


	

			SELECT
			id as value,
			nombre as label
			FROM 
			ctlg_tipos_sangre 
				
			where 
				deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				ctlg_c.nombre as label,
				c.id as value
			FROM
				cursos as c
				INNER JOIN ctlg_cursos as ctlg_c on ctlg_c.id=c.id_ctlg_cursos


				
				
			
			where 
			c.id_anos_lectivos= _id_anos_lectivos
			and	c.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_aulas`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_aulas`(IN `_id_curso` INT)
BEGIN


		SELECT
		a.nombre as label,
		a.id as value
		
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

				
				
			
			where 
			cj.id_cursos= _id_curso
			and	cj.deleted_at is null GROUP BY a.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_inscripcion
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_inscripcion`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_inscripcion`(IN `_id_estudiante` INT, in _id_anos_lectivo int)
BEGIN


		SELECT
		ctlg_c.nombre as label,
		c.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ano.id=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos and ins.id_jornadas=j.id
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_estudiantes= _id_estudiante and ins.id_anos_lectivos= _id_anos_lectivo
			and	ins.deleted_at is null GROUP BY  ins.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_inscripciones`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_inscripciones`(IN `_id_estudiante` INT)
BEGIN


		SELECT
		ctlg_c.nombre as label,
		c.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_estudiantes= _id_estudiante
			and	ins.deleted_at is null GROUP BY  est.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_jornadas`(IN `_id_jornadas` INT)
BEGIN

SELECT
				cl.nombre as label,
				c.id as value
			FROM
				cursos as c
				INNER JOIN ctlg_cursos as cl on cl.id=c.id_ctlg_cursos
				left JOIN cursos_jornadas as cm on cm.id_cursos = c.id
				left JOIN jornadas as m on cm.id_jornadas = m.id
				INNER JOIN ctlg_jornadas as cl_m on cl_m.id=m.id_ctlg_jornadas
				

				
				
			
			where 
			cm.id_jornadas= _id_jornadas
			and	cm.deleted_at is null GROUP BY c.id ;	
		
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_materias`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_materias`(IN `_id_curso` INT)
BEGIN


		SELECT
				cl_m.nombre as label,
				m.id as value
			FROM
				cursos as c
				INNER JOIN ctlg_cursos as cl on cl.id=c.id_ctlg_cursos
				left JOIN cursos_materias as cm on cm.id_cursos = c.id
				left JOIN materias as m on cm.id_materias = m.id
				INNER JOIN ctlg_materias as cl_m on cl_m.id=m.id_ctlg_materias
				

				
				
			
			where 
			cm.id_cursos= _id_curso
			and	cm.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_paralelos`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_paralelos`(IN `_id_curso` INT)
BEGIN


		SELECT
		p.nombre as label,
		p.id as value
		
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

				
				
			
			where 
			cj.id_cursos= _id_curso
			and	cj.deleted_at is null GROUP BY p.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cursos_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cursos_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `catalogo_cursos_paralelos_aulas`(IN `_id_jornada` INT)
BEGIN


		SELECT
		ctlg_c.nombre as label,
		c.id as value
		
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

				
				
			
			where 
			cj.id_jornadas= _id_jornada
			and	cj.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_cur_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_cur_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `catalogo_cur_paralelos_aulas`(IN `_id_curso` INT)
BEGIN


		SELECT
		CONCAT('Paralelo: ',p.nombre,' - ','Aula: ',a.nombre) as label,
		cpa.id as value
		
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

				
				
			
			where 
			cpa.id_cursos= _id_curso
			and	cj.deleted_at is null GROUP BY cpa.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dac
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dac`;
delimiter ;;
CREATE PROCEDURE `catalogo_dac`(IN `_id_docente` INT)
BEGIN


		SELECT
		concat(ctlg_c.nombre,' - ',p.nombre,' - ' ,ctlg_as.nombre )  as label,
		dac.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 


				
				where
			
			djm.id_docentes= _id_docente
			and	dac.deleted_at is null GROUP BY dac.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dac_actividad_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dac_actividad_curso`;
delimiter ;;
CREATE PROCEDURE `catalogo_dac_actividad_curso`(IN `_id_docente` INT, in _id_anos_lectivo int , in _id_jornada int)
BEGIN


		SELECT
		concat(ctlg_c.nombre,' - ',p.nombre,' - ' ,ctlg_as.nombre )  as label,
		dac.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id= j.id_anos_lectivos 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id= p.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas=j.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias and ano.id= m.id_anos_lectivos 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 


				
				where
			
			djm.id_docentes= _id_docente and djm.id_anos_lectivos= _id_anos_lectivo and djm.id_jornadas= _id_jornada
			and	dac.deleted_at is null GROUP BY dac.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dac_ano
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dac_ano`;
delimiter ;;
CREATE PROCEDURE `catalogo_dac_ano`(IN `_id_docente` INT, in _id_anos_lectivo int)
BEGIN


		SELECT
		concat(ctlg_c.nombre,' - ',p.nombre,' - ' ,ctlg_as.nombre )  as label,
		dac.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 


				
				where
			
			djm.id_docentes= _id_docente and djm.id_anos_lectivos= _id_anos_lectivo
			and	dac.deleted_at is null GROUP BY dac.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes`()
BEGIN


			select
				id as value,
			concat(nombres,' ',apellidos) as label

			FROM

					docentes 
					
		
			where 
			
				deleted_at is null; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_anos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_anos`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_anos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				concat(d.nombres,' ',d.apellidos) as label,
				d.id as value
			FROM
				docentes as d
				INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
				INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
				INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= ano.id
				INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
				INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos=ano.id
			
			where 
			djm.id_anos_lectivos= _id_anos_lectivos
			and	djm.deleted_at is null GROUP BY d.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_ano
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_ano`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_ano`(IN `_id_docente` INT)
BEGIN


		SELECT
		ano.nombre as label,
		ano.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			djm.id_docentes= _id_docente and ano.id_ctlg_estados=1
			and	dac.deleted_at is null GROUP BY ano.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_anoreporte
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_anoreporte`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_anoreporte`(IN `_id_docente` INT)
BEGIN


		SELECT
		ano.nombre as label,
		ano.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			djm.id_docentes= _id_docente 
			and	dac.deleted_at is null GROUP BY ano.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_aula
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_aula`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_aula`(IN `_id_curso` INT)
BEGIN


		SELECT
		a.nombre as label,
		a.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			cpa.id_cursos= _id_curso
			and	dac.deleted_at is null GROUP BY a.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_curso`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_curso`(IN `_id_jornada` INT)
BEGIN


		SELECT
		ctlg_c.nombre as label,
		c.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			cj.id_jornadas= _id_jornada
			and	dac.deleted_at is null GROUP BY c.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_jornada
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_jornada`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_jornada`(IN `_id_docente` INT, in _id_anos_lectivo int)
BEGIN


		SELECT
		ctlg_j.nombre as label,
		j.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id=p.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and j.id=pj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias and ano.id=m.id_anos_lectivos
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 
				
				
			
			where 
			djm.id_docentes= _id_docente and djm.id_anos_lectivos=_id_anos_lectivo
			and	dac.deleted_at is null GROUP BY j.id  ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_materia`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_materia`(IN `_id_docente` INT)
BEGIN


		SELECT
		ctlg_as.nombre as label,
		m.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			djm.id_docentes= _id_docente
			and	dac.deleted_at is null GROUP BY m.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_asignar_paralelo
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_asignar_paralelo`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_asignar_paralelo`(IN `_id_curso` INT)
BEGIN


		SELECT
		p.nombre as label,
		p.id as value
		
FROM

	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias and djm.id_anos_lectivos= ano.id
	INNER JOIN  docentes as d on d.id= djm.id_docentes 

				
				
			
			where 
			cpa.id_cursos= _id_curso
			and	dac.deleted_at is null GROUP BY p.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_jornadas_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_jornadas_materias`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_jornadas_materias`(IN `_id_jornadas` INT)
BEGIN


		SELECT
				concat(d.nombres,' ',d.apellidos) as label,
				d.id as value
			FROM
				docentes as d
				INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
				INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
				INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
				INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
				INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
				INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
			
			where 
			djm.id_jornadas= _id_jornadas
			and	djm.deleted_at is null GROUP BY d.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_docentes_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_docentes_materias`;
delimiter ;;
CREATE PROCEDURE `catalogo_docentes_materias`(IN `_id_materia` INT)
BEGIN


		SELECT
				concat(d.nombres,' ',d.apellidos) as label,
				d.id as value
			FROM
				docentes as d
				INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
				INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
				INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
				INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
				INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
				INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
			
			where 
			djm.id_materias= _id_materia
			and	djm.deleted_at is null GROUP BY d.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_doc_jornada_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_doc_jornada_materia`;
delimiter ;;
CREATE PROCEDURE `catalogo_doc_jornada_materia`(IN `_id_jornadas` INT, IN `_id_materias` INT)
BEGIN
					select
						
						CONCAT(d.nombres," ",d.apellidos)as label,
						djm.id as value
						
					FROM

					docentes as d

						INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
						INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
						INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
						INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
								
								
								where 
		
				djm.id_jornadas=_id_jornadas and djm.id_materias = _id_materias 
				and djm.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_doc_jorna_mate
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_doc_jorna_mate`;
delimiter ;;
CREATE PROCEDURE `catalogo_doc_jorna_mate`(IN `_id_jornadas` varchar(255), IN `_id_materias` varchar(255))
BEGIN
					select
						
						CONCAT(d.nombres," ",d.apellidos)as label,
						djm.id as value
						
					FROM

					docentes as d

						INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
						INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
						INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
						INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
								
								
								where 
		
				ctlg_j.nombre=_id_jornadas and ctlg_as.nombre = _id_materias 
				and djm.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dre
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dre`;
delimiter ;;
CREATE PROCEDURE `catalogo_dre`(IN `_id_docentes_asignar_curso` INT)
BEGIN


		SELECT
		concat(ctlg_peri.nombre,' - ',ctlg_parc.nombre,' - ',ins.nombre,' - ' ,dre.descripcion )  as label,
		dre.id as value
		
FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso

		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	

				
				where
			
			dre.id_docentes_asignar_curso= _id_docentes_asignar_curso
			and	dre.deleted_at is null GROUP BY dre.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dre_parcial
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dre_parcial`;
delimiter ;;
CREATE PROCEDURE `catalogo_dre_parcial`(IN `_id_docentes_asignar_curso` INT)
BEGIN


		SELECT
		concat(ctlg_parc.nombre )  as label,
		parc.id as value
		
FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso

		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	

				
				where
			
			peri.id= _id_docentes_asignar_curso
			and	peri.deleted_at is null GROUP BY parc.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_dre_periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_dre_periodo`;
delimiter ;;
CREATE PROCEDURE `catalogo_dre_periodo`(IN `_id_docentes_asignar_curso` INT)
BEGIN


		SELECT
		concat(ctlg_peri.nombre )  as label,
		peri.id as value
		
FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso

		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	

				
				where
			
			dre.id_docentes_asignar_curso= _id_docentes_asignar_curso
			and	peri.deleted_at is null GROUP BY peri.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_edificios
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_edificios`;
delimiter ;;
CREATE PROCEDURE `catalogo_edificios`()
BEGIN


		SELECT
				nombre as label ,
				id as value
			FROM
				edificios as e
				

				
				
			
			where 
			deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_edificios_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_edificios_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `catalogo_edificios_anos_lectivos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				e.nombre as label,
				e.id as value
			FROM
				edificios as e
				left JOIN edificios_anos_lectivos as ea on ea.id_edificios = e.id
				left JOIN anos_lectivos as a on ea.id_edificios = a.id
				

				
				
			
			where 
			ea.id_anos_lectivos= _id_anos_lectivos
			and	ea.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_estu
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_estu`;
delimiter ;;
CREATE PROCEDURE `catalogo_estu`(IN `_id_docentes_asignar_cursos` INT, IN `_id_actividades_cursos` INT)
BEGIN
  		SELECT
		n.id as id,	
	matri.id as id_matriculas,
	CONCAT(est.apellidos," ",est.nombres)as nombre,
	dre.id as id_actividades_cursos,
	IFNULL(n.valor, 0) as valor,
	(
	case when n.valor is null then 1
	else 0 end
	) as spa
	
	FROM
	dre as dre
	inner JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		inner join cursos as c on c.id= cpa.id_cursos
		inner JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		inner JOIN inscripciones as i on i.id_cursos=c.id and ano.id= i.id_anos_lectivos 
		inner JOIN matriculas as matri on i.id=matri.id_inscripciones and matri.id_cursos_paralelos_aulas = cpa.id 
	
		inner JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id= j.id_anos_lectivos and j.id= i.id_jornadas
		inner JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas



		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id= p.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id  and j.id= pj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		inner JOIN materias as m ON m.id = cm.id_materias and ano.id= m.id_anos_lectivos
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias  and ano.id= djm.id_anos_lectivos
	inner JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas and n.id_actividades_cursos= _id_actividades_cursos
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos


where
			
			
		dac.id= _id_docentes_asignar_cursos 
			and	dac.deleted_at is null
			and dre.id = _id_actividades_cursos
			GROUP BY est.id  
			
			ORDER BY est.apellidos;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_estudiantes`;
delimiter ;;
CREATE PROCEDURE `catalogo_estudiantes`()
BEGIN


			select
				id as value,
			concat(nombres,' ',apellidos) as label

			FROM

					estudiantes 
					
		
			where 
			
				deleted_at is null; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_estu_ano
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_estu_ano`;
delimiter ;;
CREATE PROCEDURE `catalogo_estu_ano`(IN `id_estudiantes` INT)
BEGIN
  		SELECT
			ano.nombre as label,
		ano.id as value
	
	
	FROM
matriculas as matri
	
	INNER JOIN inscripciones as ins on ins.id=matri.id_inscripciones
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=matri.id_cursos_paralelos_aulas
	INNER JOIN cursos as c on  cpa.id_cursos=c.id and c.id=ins.id_cursos and ano.id=c.id_anos_lectivos 
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos and ins.id_jornadas=j.id
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	
	INNER JOIN paralelos as p on p.id=cpa.id_paralelos and ano.id=p.id_anos_lectivos 
	INNER JOIN aulas as a on a.id = cpa.id_aulas

where
			
			
		ins.id_estudiantes= id_estudiantes 
			and	matri.deleted_at is null ;
			
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_estu_secre
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_estu_secre`;
delimiter ;;
CREATE PROCEDURE `catalogo_estu_secre`(IN `_id_docentes_asignar_cursos` INT, IN `_id_actividades_cursos` INT)
BEGIN
  		SELECT
			
	matri.id as id_matriculas,
	CONCAT(est.apellidos," ",est.nombres)as nombre,
	dre.id as id_actividades_cursos,
	IFNULL(n.valor, 0) as valor
	/*(
	case when n.valor is null then 1
	else 0 end
	) as spa*/
	
	FROM
	dre as dre
	inner JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		inner join cursos as c on c.id= cpa.id_cursos
		inner JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		inner JOIN inscripciones as i on i.id_cursos=c.id and ano.id= i.id_anos_lectivos 
		inner JOIN matriculas as matri on i.id=matri.id_inscripciones and matri.id_cursos_paralelos_aulas = cpa.id 
	
		inner JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id= j.id_anos_lectivos and j.id= i.id_jornadas
		inner JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas



		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id= p.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id  and j.id= pj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		inner JOIN materias as m ON m.id = cm.id_materias and ano.id= m.id_anos_lectivos
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias  and ano.id= djm.id_anos_lectivos
	inner JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas and n.id_actividades_cursos= _id_actividades_cursos
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos


where
			
			
		dac.id= _id_docentes_asignar_cursos 
			and	dac.deleted_at is null
			and dre.id = _id_actividades_cursos
			GROUP BY est.id  
			
			ORDER BY est.apellidos;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_familiares`;
delimiter ;;
CREATE PROCEDURE `catalogo_familiares`()
BEGIN


			select
				id as value,
			concat(nombres,' ',apellidos) as label

			FROM

					familiares 
					
		
			where 
			
				deleted_at is null; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_inscripciones`;
delimiter ;;
CREATE PROCEDURE `catalogo_inscripciones`(IN `_id_ano` INT)
BEGIN


		SELECT
		CONCAT(est.nombres," ",est.apellidos) as label,
		est.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_anos_lectivos= _id_ano
			and	ins.deleted_at is null GROUP BY  est.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_inscripciones_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_inscripciones_cursos`;
delimiter ;;
CREATE PROCEDURE `catalogo_inscripciones_cursos`(IN `_id_curso` INT)
BEGIN


		SELECT
		CONCAT(est.nombres," ",est.apellidos) as label,
		est.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_cursos= _id_curso
			and	ins.deleted_at is null GROUP BY  est.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_inscripciones_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_inscripciones_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_inscripciones_jornadas`(IN `_id_jornada` INT)
BEGIN


		SELECT
		CONCAT(est.nombres," ",est.apellidos) as label,
		est.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_jornadas= _id_jornada
			and	ins.deleted_at is null GROUP BY  est.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_insumos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_insumos`;
delimiter ;;
CREATE PROCEDURE `catalogo_insumos`(IN `_id_parcial` INT)
BEGIN


		SELECT
				ctlg_iso.nombre as label,
				iso.id as value
			FROM
				insumos as iso
				INNER JOIN ctlg_insumos as ctlg_iso on ctlg_iso.id=iso.id_ctlg_insumos
				inner join parciales as p on p.id=iso.id_parciales


				
				
			
			where 
			iso.id_parciales= _id_parcial
			and	iso.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_insumos_dac
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_insumos_dac`;
delimiter ;;
CREATE PROCEDURE `catalogo_insumos_dac`(IN _id_anos_lectivos INT)
BEGIN


		SELECT
				CONCAT(c.nombre," - ",pare.nombre," - ", ins.nombre) as label,
				i.id as value
			FROM
				periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					INNER JOIN parciales as par on par.id_periodos=p.id
					INNER JOIN ctlg_parciales as pare on pare.id = par.id_ctlg_parciales

					INNER JOIN insumos as i on i.id_parciales = par.id
					INNER JOIN ctlg_insumos as ins on ins.id = i.id_ctlg_insumos
		


				
				
			
			where 
			p.id_anos_lectivos= _id_anos_lectivos
			and	i.deleted_at is null GROUP BY p.id,par.id,i.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_jornadas`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				ctlg_j.nombre as label,
				j.id as value
			FROM
				jornadas as j
				INNER JOIN ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas


				
				
			
			where 
			j.id_anos_lectivos= _id_anos_lectivos
			and	j.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_jornadas_anos_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_jornadas_anos_cursos`;
delimiter ;;
CREATE PROCEDURE `catalogo_jornadas_anos_cursos`(IN `id_anos_lectivoss` varchar(255), in id_cursoss varchar(255))
BEGIN

SELECT
				cl_m.nombre as label,
				m.id as value
			FROM
				cursos as c
				INNER JOIN anos_lectivos as ano on ano.id=c.id_anos_lectivos
				INNER JOIN ctlg_cursos as cl on cl.id=c.id_ctlg_cursos
				INNER JOIN cursos_jornadas as cm on cm.id_cursos = c.id
				INNER JOIN jornadas as m on cm.id_jornadas = m.id and ano.id=m.id_anos_lectivos
				INNER JOIN ctlg_jornadas as cl_m on cl_m.id=m.id_ctlg_jornadas
				

				
				
			
			where  
			 ano.nombre=id_anos_lectivoss and cl.nombre= id_cursoss 
			and	cm.deleted_at is null GROUP BY m.id  ;	
		
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_jornadas_de
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_jornadas_de`;
delimiter ;;
CREATE PROCEDURE `catalogo_jornadas_de`(IN `_id_anos_lectivos` varchar(255))
BEGIN


		SELECT
				ctlg_j.nombre as label,
				j.id as value
			FROM
				jornadas as j
				INNER JOIN ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
				INNER JOIN anos_lectivos as ano on ano.id=j.id_anos_lectivos


				
				
			
			where 
			ano.nombre= _id_anos_lectivos
			and	j.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_jornadas_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_jornadas_inscripciones`;
delimiter ;;
CREATE PROCEDURE `catalogo_jornadas_inscripciones`(IN `_id_estudiante` INT, in _id_anos_lectivo int)
BEGIN


		SELECT
		ctlg_j.nombre as label,
		j.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ano.id=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos and ins.id_jornadas=j.id
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_estudiantes= _id_estudiante and ins.id_anos_lectivos= _id_anos_lectivo
			and	ins.deleted_at is null GROUP BY ins.id  ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_materias`;
delimiter ;;
CREATE PROCEDURE `catalogo_materias`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				ctlg_m.nombre as label,
				m.id as value
			FROM
				materias as m
				INNER JOIN ctlg_materias as ctlg_m on ctlg_m.id=m.id_ctlg_materias


				
				
			
			where 
			m.id_anos_lectivos= _id_anos_lectivos
			and	m.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_materias_anos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_materias_anos`;
delimiter ;;
CREATE PROCEDURE `catalogo_materias_anos`(IN `tw` varchar(255))
BEGIN


		SELECT
				ctlg_m.nombre as label,
				m.id as value
			FROM
				materias as m
				INNER JOIN ctlg_materias as c on c.id = m.id_ctlg_materias
				INNER JOIN anos_lectivos as ano ON ano.id=m.id_anos_lectivos
				INNER JOIN organizaciones as o on o.id = m.id_organizaciones
				INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= m.id_ctlg_estados
				INNER JOIN ctlg_materias as ctlg_m on ctlg_m.id=m.id_ctlg_materias


				
				
			
			where 
			ano.nombre= tw
			and	m.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_matriculaciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_matriculaciones`;
delimiter ;;
CREATE PROCEDURE `catalogo_matriculaciones`(IN `_id_estudiante` INT)
BEGIN


		SELECT
		ctlg_c.nombre as label,
		c.id as value
		
FROM

	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	

				
				
			
			where 
			ins.id_estudiantes= _id_estudiante
			and	ins.deleted_at is null GROUP BY  est.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_matri_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_matri_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `catalogo_matri_paralelos_aulas`(IN `id_anos_lectivoss` varchar(255), in id_cursoss varchar(255))
BEGIN

SELECT
			CONCAT('Paralelo: ',p.nombre,' - ','Aula: ',a.nombre) as label,
		cpa.id as value
		
			FROM
			
				cursos as c
			
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

				
				
			
			where  
			 ano.nombre=id_anos_lectivoss and ctlg_c.nombre= id_cursoss 
			and	cpa.deleted_at is null GROUP BY cpa.id  ;	
		
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_paralelos`;
delimiter ;;
CREATE PROCEDURE `catalogo_paralelos`()
BEGIN


		SELECT
				nombre as label ,
				id as value
			FROM
				paralelos
				
				

				
				
			
			where 
			deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_paralelos_anos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_paralelos_anos`;
delimiter ;;
CREATE PROCEDURE `catalogo_paralelos_anos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
		p.*,
				p.nombre as label,
				p.id as value
			FROM
				paralelos as p
				INNER JOIN anos_lectivos as a on a.id=p.id_anos_lectivos
	
			
			where 
		 p.id_anos_lectivos=  _id_anos_lectivos
			and	p.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_paralelos_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_paralelos_jornadas`;
delimiter ;;
CREATE PROCEDURE `catalogo_paralelos_jornadas`(IN `_id_jornadas` INT)
BEGIN


		SELECT
		p.*,
				p.nombre as label,
				p.id as value
			FROM
				paralelos as p
				INNER JOIN anos_lectivos as a on a.id=p.id_anos_lectivos
				left JOIN paralelos_jornadas as pj on pj.id_paralelos = p.id
				left JOIN jornadas as j on pj.id_jornadas = j.id and j.id_anos_lectivos=p.id_anos_lectivos
				

				
				
			
			where 
		 pj.id_jornadas=  _id_jornadas
			and	p.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_parciales`;
delimiter ;;
CREATE PROCEDURE `catalogo_parciales`(IN `_id_periodo` INT)
BEGIN


		SELECT
				ctlg_par.nombre as label,
				par.id as value
			FROM
				parciales as par
				INNER JOIN ctlg_parciales as ctlg_par on ctlg_par.id=par.id_ctlg_parciales
				inner join periodos as p on p.id=par.id_periodos


				
				
			
			where 
			par.id_periodos= _id_periodo
			and	par.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_perfiles
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_perfiles`;
delimiter ;;
CREATE PROCEDURE `catalogo_perfiles`()
BEGIN


		SELECT
				nombre as label,
			  id as value
			FROM
				perfiles 
				

				
				
			
			where 
			
			deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_periodos`;
delimiter ;;
CREATE PROCEDURE `catalogo_periodos`(IN `_id_anos_lectivos` INT)
BEGIN


		SELECT
				ctlg_p.nombre as label,
				p.id as value
			FROM
				periodos as p
				INNER JOIN ctlg_periodos as ctlg_p on ctlg_p.id=p.id_ctlg_periodos


				
				
			
			where 
			p.id_anos_lectivos= _id_anos_lectivos
			and	p.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_practica
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_practica`;
delimiter ;;
CREATE PROCEDURE `catalogo_practica`(IN `_id_docentes_asignar_curso` INT)
BEGIN


		SELECT
		concat(ctlg_peri.nombre,' - ',ctlg_parc.nombre,' - ',ins.nombre )  as label,
		iso.id as value
		
FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas 
		
		
		inner JOIN edificios as e ON e.id = a.id_edificios
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= eano.id_edificios
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	

				
				where
			
			dre.id_docentes_asignar_curso= _id_docentes_asignar_curso
			and	dre.deleted_at is null GROUP BY peri.id,parc.id,iso.id ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_provincias_cantones
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_provincias_cantones`;
delimiter ;;
CREATE PROCEDURE `catalogo_provincias_cantones`(IN `_id_provincia` INT)
BEGIN


		SELECT
		pc.nombre as label,
		pc.id as value
		
FROM

	provincias_cantones_parroquias as ppp
	
	INNER JOIN ctlg_cantones as pc on pc.id=ppp.id_ctlg_cantones
	INNER JOIN ctlg_provincias as pp on pp.id=ppp.id_ctlg_provincias
	INNER JOIN ctlg_parroquias as pa on pa.id=ppp.id_ctlg_parroquias
	
	
		
				
			
			where 
			ppp.id_ctlg_provincias= _id_provincia
			and	ppp.deleted_at is null  GROUP BY pc.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_provincias_parroquias
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_provincias_parroquias`;
delimiter ;;
CREATE PROCEDURE `catalogo_provincias_parroquias`(IN `_id_canton` INT)
BEGIN


		SELECT
		pa.nombre as label,
		pa.id as value
		
FROM

	provincias_cantones_parroquias as ppp
	
	INNER JOIN ctlg_cantones as pc on pc.id=ppp.id_ctlg_cantones
	INNER JOIN ctlg_provincias as pp on pp.id=ppp.id_ctlg_provincias
	INNER JOIN ctlg_parroquias as pa on pa.id=ppp.id_ctlg_parroquias
	
	
		
				
			
			where 
			ppp.id_ctlg_cantones= _id_canton
			and	ppp.deleted_at is null  GROUP BY pa.id;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_repot
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_repot`;
delimiter ;;
CREATE PROCEDURE `catalogo_repot`(IN `_id_docentes_asignar_cursos` INT, IN `_insumos` INT)
BEGIN
  		SELECT
	matri.id as id_matriculas,
	CONCAT(est.apellidos," ",est.nombres)as nombre,
	
	ROUND(AVG(IF( iso.id = _insumos , IFNULL(n.valor, 0),0)),2) nota_final
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		left JOIN inscripciones as i on i.id_cursos=c.id 
		left JOIN matriculas as matri on i.id=matri.id_inscripciones  
	
		left JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas 
		
		
		inner JOIN edificios as e ON e.id = a.id_edificios
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= eano.id_edificios
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and matri.id_paralelos = p.id
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas 
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos


where
			
			
			dac.id= _id_docentes_asignar_cursos 
			and	dac.deleted_at is null GROUP BY est.id  ORDER BY est.apellidos;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for catalogo_zorro
-- ----------------------------
DROP PROCEDURE IF EXISTS `catalogo_zorro`;
delimiter ;;
CREATE PROCEDURE `catalogo_zorro`(in ids int, in _id_ctlg_estados  int)
BEGIN
  	UPDATE 
anos_lectivos

/*inner JOIN cursos ON  cursos.id_anos_lectivos = anos_lectivos.id
INNER JOIN materias ON  materias.id_anos_lectivos = anos_lectivos.id

left JOIN cursos_materias ON  cursos_materias.id_cursos = cursos.id AND  cursos_materias.id_materias = materias.id
INNER JOIN periodos ON  periodos.id_anos_lectivos = anos_lectivos.id

INNER JOIN parciales ON  parciales.id_periodos = periodos.id

INNER JOIN insumos ON  insumos.id_parciales = parciales.id

INNER JOIN jornadas ON  jornadas.id_anos_lectivos = anos_lectivos.id
INNER JOIN edificios_anos_lectivos ON edificios_anos_lectivos.id_anos_lectivos=anos_lectivos.id
INNER JOIN edificios on edificios.id=edificios_anos_lectivos.id_edificios
left JOIN cursos_jornadas ON  cursos_jornadas.id_cursos = cursos.id AND  cursos_jornadas.id_jornadas = jornadas.id
INNER JOIN cursos_paralelos_aulas ON  cursos_paralelos_aulas.id_cursos = cursos.id
INNER JOIN aulas ON  cursos_paralelos_aulas.id_aulas = aulas.id and edificios.id=aulas.id_edificios
INNER JOIN paralelos ON  paralelos.id_anos_lectivos = anos_lectivos.id AND  cursos_paralelos_aulas.id_paralelos = paralelos.id
left JOIN aulas_jornadas ON  aulas_jornadas.id_jornadas = jornadas.id AND  aulas_jornadas.id_aulas = aulas.id
left JOIN paralelos_jornadas ON  paralelos_jornadas.id_paralelos = paralelos.id AND  paralelos_jornadas.id_jornadas = jornadas.id
INNER JOIN inscripciones ON  inscripciones.id_anos_lectivos = anos_lectivos.id AND  inscripciones.id_cursos = cursos.id AND  inscripciones.id_jornadas = jornadas.id

INNER JOIN matriculas ON  matriculas.id_inscripciones = inscripciones.id AND  matriculas.id_cursos_paralelos_aulas = cursos_paralelos_aulas.id
left JOIN docentes_jornadas_materias ON  docentes_jornadas_materias.id_jornadas = jornadas.id AND  docentes_jornadas_materias.id_materias = materias.id AND  docentes_jornadas_materias.id_anos_lectivos = anos_lectivos.id
left JOIN docentes_asignar_curso ON  docentes_asignar_curso.id_docentes_jornadas_materias = docentes_jornadas_materias.id AND  docentes_asignar_curso.id_cursos_paralelos_aulas = cursos_paralelos_aulas.id
left JOIN dre ON dre.id_insumos = insumos.id 
					AND dre.id_docentes_asignar_curso = docentes_asignar_curso.id 
					AND dre.id_docentes_asignar_curso = docentes_asignar_curso.id */
		
/*	left	JOIN nota1 ON nota1.id_matriculas = matriculas.id  AND nota1.id_actividades_cursos = dre.id */
INNER JOIN ctlg_estados ON anos_lectivos.id_ctlg_estados = ctlg_estados.id 
/*AND cursos.id_ctlg_estados = anos_lectivos.id_ctlg_estados
AND materias.id_ctlg_estados = anos_lectivos.id_ctlg_estados

AND cursos_materias.id_ctlg_estados = materias.id_ctlg_estados 
#AND cursos_materias.id_ctlg_estados = cursos.id_ctlg_estados


AND periodos.id_ctlg_estados = anos_lectivos.id_ctlg_estados

AND parciales.id_ctlg_estados = periodos.id_ctlg_estados




AND insumos.id_ctlg_estados = parciales.id_ctlg_estados


AND jornadas.id_ctlg_estados = anos_lectivos.id_ctlg_estados 

AND paralelos.id_ctlg_estados = anos_lectivos.id_ctlg_estados




#AND cursos_paralelos_aulas.id_ctlg_estados = aulas.id_ctlg_estados  
AND cursos_paralelos_aulas.id_ctlg_estados = cursos.id_ctlg_estados
#AND cursos_paralelos_aulas.id_ctlg_estados = paralelos.id_ctlg_estados








#AND aulas_jornadas.id_ctlg_estados = aulas.id_ctlg_estados 
AND aulas_jornadas.id_ctlg_estados = jornadas.id_ctlg_estados 


AND paralelos_jornadas.id_ctlg_estados = jornadas.id_ctlg_estados 
#AND paralelos_jornadas.id_ctlg_estados = paralelos.id_ctlg_estados






AND inscripciones.id_ctlg_estados = anos_lectivos.id_ctlg_estados


AND matriculas.id_ctlg_estados = inscripciones.id_ctlg_estados

AND docentes_jornadas_materias.id_ctlg_estados = anos_lectivos.id_ctlg_estados 

#AND docentes_asignar_curso.id_ctlg_estados = cursos_paralelos_aulas.id_ctlg_estados
AND docentes_asignar_curso.id_ctlg_estados = docentes_jornadas_materias.id_ctlg_estados*/


set

anos_lectivos.id_ctlg_estados =  _id_ctlg_estados
/*,cursos.id_ctlg_estados = _id_ctlg_estados 
 ,edificios_anos_lectivos.id_ctlg_estados= _id_ctlg_estados
,materias.id_ctlg_estados = _id_ctlg_estados
, cursos_materias.id_ctlg_estados = _id_ctlg_estados 
,periodos.id_ctlg_estados = _id_ctlg_estados 
, parciales.id_ctlg_estados = _id_ctlg_estados 
, insumos.id_ctlg_estados = _id_ctlg_estados 
, jornadas.id_ctlg_estados = _id_ctlg_estados 

, cursos_paralelos_aulas.id_ctlg_estados = _id_ctlg_estados 
, aulas.id_ctlg_estados = _id_ctlg_estados 
, paralelos.id_ctlg_estados = _id_ctlg_estados 
, aulas_jornadas.id_ctlg_estados = _id_ctlg_estados 
, paralelos_jornadas.id_ctlg_estados = _id_ctlg_estados 
, inscripciones.id_ctlg_estados = _id_ctlg_estados 

, matriculas.id_ctlg_estados = _id_ctlg_estados 
, docentes_jornadas_materias.id_ctlg_estados = _id_ctlg_estados 
, docentes_asignar_curso.id_ctlg_estados = _id_ctlg_estados */

where

anos_lectivos.id=  ids  ;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_ano_lectivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_ano_lectivo`;
delimiter ;;
CREATE PROCEDURE `consultar_ano_lectivo`(IN `_ano_lectivo` INT)
BEGIN

  			select
					ano.id,
					ano.nombre

			FROM

					anos_lectivos as ano
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= ano.id_ctlg_estados
					
			where 
		
				ano.id=_ano_lectivo and ano.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_aula
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_aula`;
delimiter ;;
CREATE PROCEDURE `consultar_aula`(IN `_aula` INT)
BEGIN

  				select
					a.*,
					
					a.nombre as aulas,
					a.capacidad as capacidad,
					
					e.nombre as edificios,
					cj.nombre as jornadas,
					ano.nombre as ano_lectivo
					
					

			FROM
					
					aulas as a 
					
					INNER JOIN edificios as e ON e.id = a.id_edificios
					INNER JOIN organizaciones as o on o.id = a.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= a.id_ctlg_estados
					INNER JOIN aulas_jornadas as aj on aj.id_aulas=a.id
					INNER JOIN jornadas as j on j.id = aj.id_jornadas
					INNER JOIN ctlg_jornadas as cj on cj.id=j.id_ctlg_jornadas
					inner join anos_lectivos as ano on ano.id=j.id_anos_lectivos
					inner JOIN edificios_anos_lectivos as eano on eano.id_anos_lectivos= j.id_anos_lectivos
					
			where 
		
				a.id=_aula and a.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_curso`;
delimiter ;;
CREATE PROCEDURE `consultar_curso`(IN `_curso` INT)
BEGIN
				select

  				c.*,
					cu.nombre as cursos,
					ano.nombre as ano_lectivo

			FROM
					
					cursos as c

					
					INNER JOIN ctlg_cursos as cu on cu.id = c.id_ctlg_cursos
					INNER JOIN anos_lectivos as ano ON ano.id=c.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = c.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= c.id_ctlg_estados
					
			where 
		
				c.id=_curso and c.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_curso_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_curso_materia`;
delimiter ;;
CREATE PROCEDURE `consultar_curso_materia`(IN `_curso` INT)
BEGIN
					select
					cm.*,
					cu.nombre as cursos,
					ctlg_m.nombre as materias,
					ano.nombre as ano_lectivo

			FROM
					
					cursos as c

					
					INNER JOIN ctlg_cursos as cu on cu.id = c.id_ctlg_cursos
					INNER JOIN anos_lectivos as ano ON ano.id=c.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = c.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= c.id_ctlg_estados
					
					INNER JOIN cursos_materias as cm on cm.id_cursos=c.id
					inner join materias as m on m.id=cm.id_materias
					INNER JOIN ctlg_materias as ctlg_m on ctlg_m.id=m.id_ctlg_materias
					
			where 
		
				cm.id=_curso and c.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_curso_paralelo_aula
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_curso_paralelo_aula`;
delimiter ;;
CREATE PROCEDURE `consultar_curso_paralelo_aula`(IN `_curso` INT)
BEGIN
				SELECT
		cpa.*,
			cpa.id,
		ctlg_c.nombre as cursos,
		a.nombre as aula,
		p.nombre as paralelos,
		ano.nombre as año_lectivo
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
		
				  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
			INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas
					
			where 
		
				cpa.id=_curso and cpa.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_docente
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_docente`;
delimiter ;;
CREATE PROCEDURE `consultar_docente`(IN `_docente` INT)
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				u.telefonos as telefono
				
			FROM
				docentes as u
				INNER JOIN organizaciones as o on o.id=u.id_organizaciones
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
				
			where 
				u.id=_docente and u.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_docente_jornada_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_docente_jornada_materia`;
delimiter ;;
CREATE PROCEDURE `consultar_docente_jornada_materia`(IN `_id` INT)
BEGIN
					select
						djm.*,
						CONCAT(d.nombres," ",d.apellidos)as nombre_completo,
						ctlg_j.nombre as jornada,
						ctlg_as.nombre as materias,
						ano.nombre as ano_lectivo
						
					FROM

					docentes as d

						INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
						INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
						INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
						INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
						INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
								
								
								where 
		
				djm.id=_id and djm.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_edificio
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_edificio`;
delimiter ;;
CREATE PROCEDURE `consultar_edificio`(IN `_edificio` INT)
BEGIN

  		SELECT
				e.*,
					e.nombre as nombre,
					e.direccion as direccion
			FROM
				edificios as e

					
					INNER JOIN organizaciones as o on o.id = e.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= e.id_ctlg_estados
					INNER JOIN edificios_anos_lectivos as eano on eano.id_edificios = e.id
					INNER JOIN anos_lectivos as ano on ano.id = eano.id_anos_lectivos
			where 
				e.id=_edificio and e.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_estudiante
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_estudiante`;
delimiter ;;
CREATE PROCEDURE `consultar_estudiante`(IN `_estudiante` INT)
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				u.telefono as telefono
				
			FROM
				estudiantes as u
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
				
			where 
				u.id=_estudiante and u.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_familiar
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_familiar`;
delimiter ;;
CREATE PROCEDURE `consultar_familiar`(IN `_estudiante` INT)
BEGIN

  		SELECT
			u.*,
				e.numero_documento as numero_documento,
				concat(e.nombres,' ',e.apellidos) as nombre,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				p.nombre as parentesco
			FROM
				familiares as u
				INNER JOIN ctlg_parentescos as p on p.id= u.id_ctlg_parentescos
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
				INNER JOIN estudiantes_familiares as ef on ef.id_familiares=u.id
				INNER JOIN estudiantes as e on e.id = ef.id_estudiantes
				
			where 
				ef.id_estudiantes=_estudiante and ef.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_inscripcion
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_inscripcion`;
delimiter ;;
CREATE PROCEDURE `consultar_inscripcion`(IN `_id` INT)
BEGIN
					SELECT
	ins.*,
	est.numero_documento as numero_documento,
	CONCAT(est.nombres," ",est.apellidos)as nombre_completo,
	ctlg_c.nombre as curso,
	ctlg_j.nombre as jornada,
	ano.nombre as ano_lectivo
	
	FROM
	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	
								
								where 
		
				ins.id=_id and ins.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_insumo
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_insumo`;
delimiter ;;
CREATE PROCEDURE `consultar_insumo`(IN `_insumo` INT)
BEGIN

  				select
					i.*,
					ins.nombre as insumos,
					pare.nombre as parciales,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					INNER JOIN parciales as par on par.id_periodos=p.id
					INNER JOIN ctlg_parciales as pare on pare.id = par.id_ctlg_parciales

					INNER JOIN insumos as i on i.id_parciales = par.id
					INNER JOIN ctlg_insumos as ins on ins.id = i.id_ctlg_insumos
					
			where 
		
				i.id=_insumo and i.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_jornada
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_jornada`;
delimiter ;;
CREATE PROCEDURE `consultar_jornada`(IN `_jornada` INT)
BEGIN

  				SELECT
				j.*,
				ctlg_j.nombre as nombre,
				ano.nombre as ano_lectivo
			FROM
				jornadas as j
				INNER JOIN ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
				INNER JOIN anos_lectivos as ano on ano.id=j.id_anos_lectivos
				INNER JOIN organizaciones as o on o.id=j.id_organizaciones
				INNER JOIN ctlg_estados as ctlg_es on ctlg_es.id=j.id_ctlg_estados
					
			where 
		
				j.id=_jornada and j.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_materia`;
delimiter ;;
CREATE PROCEDURE `consultar_materia`(IN `_materia` INT)
BEGIN

  				select
					m.*,
					c.nombre as materias,
					ano.nombre as ano_lectivo

			FROM
					
				materias as m

					
					INNER JOIN ctlg_materias as c on c.id = m.id_ctlg_materias
					INNER JOIN anos_lectivos as ano ON ano.id=m.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = m.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= m.id_ctlg_estados
					
					
					
			where 
		
				m.id=_materia and m.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_matricula
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_matricula`;
delimiter ;;
CREATE PROCEDURE `consultar_matricula`(IN `_id` INT)
BEGIN

select
			matri.*,
	est.numero_documento as numero_documento,
	CONCAT(est.nombres," ",est.apellidos)as nombre_completo,
	ctlg_c.nombre as curso,
	ctlg_j.nombre as jornada,
	p.nombre as paralelo,
	ano.nombre as ano_lectivo
	
	FROM
		matriculas as matri
	
	INNER JOIN inscripciones as ins on ins.id=matri.id_inscripciones
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ins.id_anos_lectivos=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ins.id_anos_lectivos=j.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	
	INNER JOIN paralelos as p on p.id=matri.id_paralelos
					
			where 
		
				matri.id= _id and matri.deleted_at is null  group by matri.id;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_paralelo
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_paralelo`;
delimiter ;;
CREATE PROCEDURE `consultar_paralelo`(IN `_paralelo` INT)
BEGIN

  					select
					p.*,
					
					p.nombre as paralelos,
					cj.nombre as jornada,
					ano.nombre as ano_lectivo
					
					

			FROM
					
					paralelos as p
					
					INNER JOIN organizaciones as o on o.id = p.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					INNER JOIN paralelos_jornadas as pj on pj.id_paralelos=p.id
					INNER JOIN jornadas as j on j.id = pj.id_jornadas
					INNER JOIN ctlg_jornadas as cj on cj.id=j.id_ctlg_jornadas
					inner join anos_lectivos as ano on ano.id=p.id_anos_lectivos and p.id_anos_lectivos=j.id_anos_lectivos
					
			where 
		
				p.id=_paralelo and p.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_parcial
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_parcial`;
delimiter ;;
CREATE PROCEDURE `consultar_parcial`(IN `_parcial` INT)
BEGIN

  			select
					par.*,
					pare.nombre as parciales,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					INNER JOIN parciales as par on par.id_periodos=p.id
					INNER JOIN ctlg_parciales as pare on pare.id = par.id_ctlg_parciales
					
			where 
		
				par.id=_parcial and par.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_periodo`;
delimiter ;;
CREATE PROCEDURE `consultar_periodo`(IN `_periodo` INT)
BEGIN

  			select
					p.*,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
			where 
		
				p.id=_periodo and p.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for consultar_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `consultar_usuario`;
delimiter ;;
CREATE PROCEDURE `consultar_usuario`(IN `_usuario` INT)
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				o.nombre as organizacion,
				p.nombre as perfiles
			FROM
				usuarios as u
				INNER JOIN organizaciones as o on o.id=u.id_organizaciones
				INNER JOIN perfiles as p on p.id=u.id_perfiles
			where 
				u.id=_usuario and u.deleted_at is null ;

	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for coso
-- ----------------------------
DROP PROCEDURE IF EXISTS `coso`;
delimiter ;;
CREATE PROCEDURE `coso`(in ids int, in _id_ctlg_estados int)
BEGIN

	
DECLARE _id_anos_lectivos int	;
DECLARE _id_cursos int;
DECLARE _id_materias int;
DECLARE _id_periodos int;
DECLARE _id_parciales int;
DECLARE _id_insumos int;
DECLARE _id_jornadas int;
declare _id_paralelos int;
DECLARE _id_aulas int;
DECLARE _id_cursos_paralelos_aulas int;
DECLARE _id_inscripciones int ;
DECLARE _id_matriculas int;
DECLARE _id_docentes_jornadas_materias int;
DECLARE _id_docentes_asignar_curso int;
DECLARE _id_dre int;



  		UPDATE anos_lectivos set 
				id_ctlg_estados=_id_ctlg_estados
			where anos_lectivos.id=ids ;	
			
			SET _id_anos_lectivos= 	(	
				select 
					id 
				from anos_lectivos
				where anos_lectivos.id=ids
							);
			
			

			UPDATE cursos set 
				id_ctlg_estados=_id_ctlg_estados
			where cursos.id_anos_lectivos=ids ;	

		
SET _id_cursos= 	(	
				select 
					id 
				from cursos
				where cursos.id_anos_lectivos=ids
							);
			

				
				
							UPDATE materias set 
								id_ctlg_estados=_id_ctlg_estados
							where materias.id_anos_lectivos=_id_anos_lectivos;	
							
							SET _id_materias= 	(	
								select id 
								from materias	
								where materias.id_anos_lectivos= _id_anos_lectivos
											);
							
						

									UPDATE cursos_materias set 
										id_ctlg_estados=_id_ctlg_estados
									where cursos_materias.id_cursos =_id_cursos 
												and cursos_materias.id_materias= _id_materias;
		
		UPDATE periodos set 
				id_ctlg_estados=_id_ctlg_estados
			where periodos.id_anos_lectivos=_id_anos_lectivos ;		
			
			SET _id_periodos= 	(	
				select id 
				from periodos
				where periodos.id_anos_lectivos= _id_anos_lectivos
							);
							
			UPDATE parciales set 
				id_ctlg_estados=_id_ctlg_estados
			where parciales.id_periodos=_id_periodos ;		
			
			SET _id_parciales= 	(	
				select id 
				from parciales
				where parciales.id_periodos=_id_periodos
							);
							
							
				UPDATE insumos set 
				id_ctlg_estados=_id_ctlg_estados
			where insumos.id_parciales=_id_parciales ;		
			
			SET _id_insumos= 	(	
				select id 
				from insumos
				where insumos.id_parciales=_id_parciales
							);


	UPDATE jornadas set 
				id_ctlg_estados=_id_ctlg_estados
			where jornadas.id_anos_lectivos=_id_anos_lectivos ;		
			
			SET _id_jornadas= 	(	
				select id 
				from jornadas
				where jornadas.id_anos_lectivos= _id_anos_lectivos
							);
							
							
							UPDATE edificios_anos_lectivos set 
				id_ctlg_estados=_id_ctlg_estados
			where edificios_anos_lectivos.id_anos_lectivos = _id_anos_lectivos ;		
			
				UPDATE paralelos set 
				id_ctlg_estados=_id_ctlg_estados
			where paralelos.id_anos_lectivos= _id_anos_lectivos;	
			
			SET _id_paralelos= 	(	
				select id 
				from paralelos
				where paralelos.id_anos_lectivos= _id_anos_lectivos
							);
							
			UPDATE paralelos_jornadas set 
				id_ctlg_estados=_id_ctlg_estados
			where paralelos_jornadas.id_paralelos= _id_paralelos and paralelos_jornadas.id_jornadas=_id_jornadas;	
			
			
			UPDATE aulas_jornadas set 
				id_ctlg_estados=_id_ctlg_estados
			where aulas_jornadas.id_jornadas= _id_jornadas;	
			
			SET _id_aulas= 	(	
				select id_aulas 
				from aulas_jornadas
				where aulas_jornadas.id_jornadas= _id_jornadas
							);
	
		UPDATE cursos_paralelos_aulas set 
				id_ctlg_estados=_id_ctlg_estados
			where cursos_paralelos_aulas.id_cursos=_id_cursos and cursos_paralelos_aulas.id_paralelos= _id_paralelos and cursos_paralelos_aulas.id_aulas= _id_aulas;	
			
				SET _id_cursos_paralelos_aulas= 	(	
				select id
				from cursos_paralelos_aulas
				where cursos_paralelos_aulas.id_cursos=_id_cursos and cursos_paralelos_aulas.id_paralelos= _id_paralelos and cursos_paralelos_aulas.id_aulas= _id_aulas
							);
			
			UPDATE inscripciones set 
				id_ctlg_estados=_id_ctlg_estados
			where inscripciones.id_anos_lectivos= _id_anos_lectivos;	
			
			SET _id_inscripciones= 	(	
				select id
				from inscripciones
				where inscripciones.id_anos_lectivos= _id_anos_lectivos
							);
							
			UPDATE matriculas set 
				id_ctlg_estados=_id_ctlg_estados
			where matriculas.id_inscripciones= _id_inscripciones;	
			
			SET _id_matriculas= 	(	
				select id
				from matriculas
				where matriculas.id_inscripciones= _id_inscripciones
							);
							
			UPDATE docentes_jornadas_materias set 
				id_ctlg_estados=_id_ctlg_estados
			where docentes_jornadas_materias.id_anos_lectivos= _id_anos_lectivos;
	
			SET _id_docentes_jornadas_materias= 	(	
					select id
					from docentes_jornadas_materias
					where docentes_jornadas_materias.id_anos_lectivos= _id_anos_lectivos
								);
								
								
								UPDATE docentes_asignar_curso set 
				id_ctlg_estados=_id_ctlg_estados
			where docentes_asignar_curso.id_cursos_paralelos_aulas= _id_cursos_paralelos_aulas and docentes_asignar_curso.id_docentes_jornadas_materias= _id_docentes_jornadas_materias;
	
			SET _id_docentes_asignar_curso= 	(	
					select id
					from docentes_asignar_curso
					where docentes_asignar_curso.id_cursos_paralelos_aulas= _id_cursos_paralelos_aulas and docentes_asignar_curso.id_docentes_jornadas_materias= _id_docentes_jornadas_materias
								);
								
									UPDATE dre set 
				id_ctlg_estados=_id_ctlg_estados
			where dre.id_insumos= _id_insumos and dre.id_docentes_asignar_curso= _id_docentes_asignar_curso;
	
			SET _id_dre= 	(	
					select id
					from dre
					where dre.id_insumos= _id_insumos and dre.id_docentes_asignar_curso= _id_docentes_asignar_curso
								);
								
										UPDATE nota1 set 
				id_ctlg_estados=_id_ctlg_estados
			where nota1.id_matriculas= _id_matriculas and nota1.id_actividades_cursos= _id_dre;
			
		
			

			
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_actividades_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_actividades_cursos`;
delimiter ;;
CREATE PROCEDURE `crear_actividades_cursos`(in _id_dac int , IN `_id_insumos` INT, IN `_descripciones` VARCHAR(255))
BEGIN
/*declare _id_docentes_jornadas_materias int;
declare _id_cursos_paralelos_aulas int ;
declare _id_docentes_asignar_cursos int ;


		SET _id_docentes_jornadas_materias= 	(	
				select id 
				from docentes_jornadas_materias	
				where _id_docentes = id_docentes 
							AND  _id_jornadas= id_jornadas  
							AND _id_materias =id_materias  
							AND _id_anos_lectivos = id_anos_lectivos
							);

		SET _id_cursos_paralelos_aulas= (
				select id 
				from cursos_paralelos_aulas 
				where _id_cursos = id_cursos 
							AND _id_aulas= id_aulas 
							AND _id_paralelos =id_paralelos
							);	
							
							
		SET _id_docentes_asignar_cursos= (
				select id 
				from docentes_asignar_curso 
				where _id_docentes_jornadas_materias = id_docentes_jornadas_materias 
							AND _id_cursos_paralelos_aulas= id_cursos_paralelos_aulas
							);	*/
							
							


 INSERT INTO dre(
	id_docentes_asignar_curso,
	id_insumos,
	descripcion
	
)

	VALUES (  
			_id_dac ,
			_id_insumos,
			UPPER(_descripciones)
			
  );

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_ano_lectivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_ano_lectivo`;
delimiter ;;
CREATE PROCEDURE `crear_ano_lectivo`(IN `_nombre` VARCHAR(255))
BEGIN
 
 #DECLARE isa INT ;
 
	INSERT INTO anos_lectivos(nombre
 ) 

	VALUES ( _nombre);

	/*SET _id_anos_lectivos = LAST_INSERT_ID();
	
			IF _id_anos_lectivos > 0 THEN
						INSERT INTO jornadas ( 
						id_ctlg_jornadas,
						id_anos_lectivos, 
						id_organizaciones
					)
						VALUES ( _id_ctlg_jornadas, _id_anos_lectivos,  _id_organizaciones );
						
	
						INSERT INTO periodos ( 
						id_anos_lectivos, 
						id_ctlg_periodos 
					
						)
						VALUES (  _id_anos_lectivos,  _id_ctlg_periodos);
						
						SET _id_periodos = LAST_INSERT_ID();
						

								IF _id_periodos > 0 THEN				
										INSERT INTO parciales(
										id_periodos,
										id_ctlg_parciales
										
										) 
										VALUES(_id_periodos ,_id_ctlg_parciales);

										SET _id_parciales = LAST_INSERT_ID();

											IF _id_parciales > 0 THEN						
												INSERT INTO insumos(
												id_parciales,
												id_ctlg_insumos
												
												) 
												VALUES(_id_parciales ,_id_ctlg_insumos);
												
												COMMIT;
												ELSE
												ROLLBACK;
											END IF;
											
										COMMIT;
										ELSE
										ROLLBACK;
									END IF;
									
								COMMIT;
								ELSE
								ROLLBACK;
							END IF;*/

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_aulas`;
delimiter ;;
CREATE PROCEDURE `crear_aulas`(IN `_nombre` VARCHAR(255), IN `_capacidad` INT, IN `_id_edificios` INT)
BEGIN

INSERT INTO  aulas (
	nombre, 
	capacidad,
	id_edificios


)
	
	VALUES ( UPPER( _nombre ), 
	upper(_capacidad) ,
	upper(_id_edificios)

	  );

select LAST_INSERT_ID() as _id_aulas;



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_aulas_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_aulas_jornadas`;
delimiter ;;
CREATE PROCEDURE `crear_aulas_jornadas`(IN _id_aulas int ,
	in _id_jornadas int)
BEGIN
 
 INSERT INTO aulas_jornadas(
	id_aulas,
	id_jornadas

)
	
	VALUES (  _id_aulas ,
	_id_jornadas 
	 );
	 
	 
	 
	 SELECT LAST_INSERT_ID()=id_aulas_jornadas;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_cursos`;
delimiter ;;
CREATE PROCEDURE `crear_cursos`(IN `_id_ctlg_cursos` INT, IN `_id_anos_lectivos` INT)
BEGIN
 
 
INSERT INTO cursos (
	id_ctlg_cursos,
	id_anos_lectivos
	
) 

	VALUES (  _id_ctlg_cursos ,
	_id_anos_lectivos 
	  );

SELECT LAST_INSERT_ID() as _id_cursos;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_cursos_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_cursos_jornadas`;
delimiter ;;
CREATE PROCEDURE `crear_cursos_jornadas`(IN `_id_cursos` INT, IN `_id_jornadas` INT)
BEGIN


			INSERT INTO cursos_jornadas(
				id_cursos,
				id_jornadas

			) 
			VALUES(_id_cursos ,_id_jornadas);

 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_cursos_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_cursos_materias`;
delimiter ;;
CREATE PROCEDURE `crear_cursos_materias`(IN `_id_cursos` INT, IN `_id_materias` INT)
BEGIN
 
 
INSERT INTO cursos_materias (
	id_cursos,
	id_materias
	
) 

	VALUES (  _id_cursos ,
	_id_materias
	  );



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_cursos_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_cursos_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `crear_cursos_paralelos_aulas`(IN `_id_cursos` INT, IN `_id_aulas` INT,IN `_id_paralelos` INT, IN `_id_jornadas` INT)
BEGIN

 

			INSERT INTO cursos_paralelos_aulas(
				id_cursos,
				id_aulas,
				id_paralelos
				
			) 
			VALUES(_id_cursos,_id_aulas ,_id_paralelos);
			
			
			INSERT INTO cursos_jornadas(
				id_cursos,
				id_jornadas

			) 
			VALUES(_id_cursos ,_id_jornadas);
			
			select LAST_INSERT_ID() as _id_cursos_paralelos_aulas;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_docentes
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_docentes`;
delimiter ;;
CREATE PROCEDURE `crear_docentes`(IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_id_ctlg_tipos_documentos` INT, IN `_numero_documento` VARCHAR(255), IN `_id_ctlg_profesiones` INT, IN `_id_ctlg_generos` INT, IN `_correo` VARCHAR(255), IN `_direccion` VARCHAR(255), IN `_telefonos` VARCHAR(255), IN `_id_perfiles` INT)
BEGIN

declare _id_usuarios int;

 INSERT INTO usuarios(
				nombres,
				apellidos,
				correo,
				
				id_perfiles
				
			)
			VALUES (  _nombres,
				_apellidos ,
				_correo ,
				
				_id_perfiles 
			  );
				
				set _id_usuarios=LAST_INSERT_ID();
		 
		 INSERT INTO docentes(
			nombres,
			apellidos,
			id_ctlg_tipos_documentos,
			numero_documento,
			id_ctlg_profesiones,
			id_ctlg_generos,
			correo,
			direccion,
			telefonos,
			id_usuarios
			
			
		)
		 

			VALUES ( UPPER( _nombres ),
		UPPER(	_apellidos) ,
			_id_ctlg_tipos_documentos ,
			_numero_documento ,
			_id_ctlg_profesiones ,
			_id_ctlg_generos ,
			_correo ,
			_direccion ,
			_telefonos ,
			_id_usuarios
		 );
		 
		
		 
			


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_docentes_asignar_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_docentes_asignar_cursos`;
delimiter ;;
CREATE PROCEDURE `crear_docentes_asignar_cursos`(IN `_id_docentes` INT, IN `_id_paralelos_aulas` INT)
BEGIN

 INSERT INTO docentes_asignar_curso(
	id_docentes_jornadas_materias,
	id_cursos_paralelos_aulas
	
)

	VALUES (  
			_id_docentes ,
			_id_paralelos_aulas
			
  );
	
	select LAST_INSERT_ID() as _id_docentes_asignar_curso;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_docentes_jornadas_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_docentes_jornadas_materias`;
delimiter ;;
CREATE PROCEDURE `crear_docentes_jornadas_materias`(IN `_id_docentes` INT, IN `_id_jornadas` INT, IN `_id_materias` INT, IN `_id_anos_lectivos` INT)
BEGIN
		 
		 
			
							INSERT INTO docentes_jornadas_materias(
									id_docentes,
									id_jornadas,
									id_materias,
									id_anos_lectivos
								
							)

							VALUES (  _id_docentes ,
											_id_jornadas ,
											_id_materias ,
											_id_anos_lectivos 
										
											);
											
							

select LAST_INSERT_ID() as _id_docentes_jornadas_materias;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_edificios
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_edificios`;
delimiter ;;
CREATE PROCEDURE `crear_edificios`(IN `_nombre` VARCHAR(255), IN `_direccion` VARCHAR(255))
BEGIN
 
 
INSERT INTO edificios(
	nombre,
	direccion
	
	
)
VALUES ( UPPER( _nombre ),  _direccion   );

	select LAST_INSERT_ID() as id_edificios;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_edificios_anos_lectivos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_edificios_anos_lectivos`;
delimiter ;;
CREATE PROCEDURE `crear_edificios_anos_lectivos`(IN `_id_edificios` INT,  IN `_id_anos_lectivos` INT)
BEGIN


INSERT INTO edificios_anos_lectivos(
	id_edificios,
	id_anos_lectivos

) VALUES ( _id_edificios, _id_anos_lectivos  );

select LAST_INSERT_ID() as id_edificios_anos_lectivos;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_estudiantes`;
delimiter ;;
CREATE PROCEDURE `crear_estudiantes`(IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_id_ctlg_tipos_documentos` INT, IN `_numero_documento` VARCHAR(255), IN `_id_ctlg_genero` INT, IN `_correo` VARCHAR(255), IN `_direccion` VARCHAR(255), IN `_telefono` VARCHAR(255), IN `_celular` VARCHAR(13), IN `_id_ctlg_paises` INT, IN `_id_ctlg_provincias` INT, IN `_id_ctlg_parroquias` INT, IN `_id_ctlg_cantones` INT, IN `_fecha_nacimiento` DATE, IN `_id_ctlg_tipos_sangre` INT, IN `_id_ctlg_parentescos` INT, IN `_id_perfiles` INT, IN `_observacion` VARCHAR(255))
BEGIN
 
 declare _id_usuarios int;
 
 INSERT INTO usuarios(
				nombres,
				apellidos,
				correo,
				
				id_perfiles
				
			)
			VALUES (  _nombres,
				_apellidos ,
				_correo ,
				
				_id_perfiles 
			  );
				
				set _id_usuarios=LAST_INSERT_ID();
 
		INSERT INTO estudiantes(
			nombres,
			apellidos,
			
			id_ctlg_tipos_documentos,
			numero_documento,
			id_ctlg_generos,
			correo,
			direccion,
			telefono,
			celular,
			id_ctlg_paises,
			id_ctlg_provincias,
			id_ctlg_parroquias,
			id_ctlg_cantones,
			fecha_nacimiento,
			
			id_ctlg_tipos_sangre,
			id_ctlg_parentescos,
			observacion
		
			)
			
			VALUES ( UPPER( _nombres),
			UPPER(_apellidos) ,
			
			_id_ctlg_tipos_documentos ,
			_numero_documento ,
			_id_ctlg_genero ,
			_correo ,
			_direccion ,
			_telefono ,
			_celular ,
			_id_ctlg_paises ,
			_id_ctlg_provincias ,
			_id_ctlg_parroquias ,
			_id_ctlg_cantones	,
			_fecha_nacimiento ,
			
			_id_ctlg_tipos_sangre ,
			_id_ctlg_parentescos ,
				
			_observacion ,
			_id_usuarios
			 
			);
			
			
			
			
			


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_familiares`;
delimiter ;;
CREATE PROCEDURE `crear_familiares`(IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_id_ctlg_tipos_documentos` INT, IN `_numero_documento` VARCHAR(255), IN `_id_ctlg_profesiones` INT, IN `_correo` VARCHAR(255), IN `_id_ctlg_parentescos` INT, IN `_direccion` VARCHAR(255), IN `_telefono` VARCHAR(255), IN `_celular` VARCHAR(255), IN `_id_ctlg_estados_civil` INT, IN `_lugar_trabajo` VARCHAR(255), IN `_direccion_trabajo` VARCHAR(255), IN `_id_ctlg_cantones` INT, IN `_telefono_trabajo` VARCHAR(255), IN `_cargo` VARCHAR(255))
BEGIN


  
INSERT INTO familiares(
	nombres,
	apellidos,	
	id_ctlg_tipos_documentos,
	numero_documento,
	id_ctlg_profesiones,
	correo,
	id_ctlg_parentescos,
	direccion_domicilio,
	telefono_domicilio,
	celular,
	id_ctlg_estados_civil,
	lugar_trabajo,
	direccion_trabajo,
	id_ctlg_cantones,
	telefono_trabajo,
	cargo
)


	VALUES ( UPPER(_nombres ),
	UPPER(_apellidos)	,
	
	_id_ctlg_tipos_documentos ,
	_numero_documento ,
	_id_ctlg_profesiones ,
	_correo,
	_id_ctlg_parentescos,
	_direccion,
	_telefono ,
	_celular ,
	_id_ctlg_estados_civil ,
	_lugar_trabajo ,
	_direccion_trabajo ,
	_id_ctlg_cantones ,
	_telefono_trabajo ,
	_cargo 
 );
	
	
	
	select LAST_INSERT_ID() as id_estudiantes_familiares;

    


							

										/*	 INSERT INTO estudiantes_familiares(
												id_estudiantes,
												id_familiares
											)

											 

												VALUES (  _id_estudiantes ,
												_id_familiares   );
*/


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_familiares_estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_familiares_estudiantes`;
delimiter ;;
CREATE PROCEDURE `crear_familiares_estudiantes`(IN `_id_estudiantes` INT)
BEGIN


SELECT id
    FROM familiares
		WHERE id = LAST_INSERT_ID() COLLATE utf8mb4_unicode_ci LIMIT 1
    INTO @id;
		

											 INSERT INTO estudiantes_familiares(
												id_estudiantes,
												id_familiares
											)

											 

												VALUES (  _id_estudiantes ,
												@id   );
												
												select LAST_INSERT_ID() as id_estudiantes_familiares;



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_inscripciones`;
delimiter ;;
CREATE PROCEDURE `crear_inscripciones`(IN `_id_estudiantes` INT, IN `_id_cursos` INT, IN `_id_anos_lectivos` INT, IN `_id_jornadas` INT)
BEGIN
 INSERT INTO inscripciones(
	id_estudiantes,
	id_cursos,
	id_anos_lectivos,
	
	id_jornadas

)


 

	VALUES ( 
	_id_estudiantes ,
	_id_cursos ,
	_id_anos_lectivos ,
	_id_jornadas 
	   );



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_insumo_actividades
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_insumo_actividades`;
delimiter ;;
CREATE PROCEDURE `crear_insumo_actividades`(IN `_id_insumos` INT, IN `_id_docentes` INT, IN `_descripcion` INT, IN `_id_cursos_paralelos_aulas` INT, IN `_id_materias` INT, IN `_id_ctlg_estados` INT)
BEGIN
 INSERT INTO insumo_actividades (
	id_insumos,
id_docentes,
descripcion,
id_cursos_paralelos_aulas,
id_materias,
id_ctlg_estados
)


 

	VALUES ( _id_insumos ,
 _id_docentes	,
 _descripcion ,
 _id_cursos_paralelos_aulas ,
 _id_materias ,
 _id_ctlg_estados	 );

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_jornadas`;
delimiter ;;
CREATE PROCEDURE `crear_jornadas`(IN `_nombre` VARCHAR(255))
BEGIN

	INSERT INTO ctlg_jornadas (
		nombre
		
	)
	VALUES (  _nombre);

	SELECT LAST_INSERT_ID() as id_jornadas;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_materias`;
delimiter ;;
CREATE PROCEDURE `crear_materias`(IN `_id_ctlg_materias` INT, IN `_id_anos_lectivos` INT)
BEGIN
 
INSERT INTO materias (
	id_ctlg_materias, 
	id_anos_lectivos 
)
VALUES (  _id_ctlg_materias,  _id_anos_lectivos);

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_matriculaciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_matriculaciones`;
delimiter ;;
CREATE PROCEDURE `crear_matriculaciones`(IN `_id_estudiantes` INT, IN `_id_cursos` INT, IN `_id_anos_lectivos` INT, IN `_id_jornadas` INT, IN `_id_paralelos_aulas` INT)
BEGIN
declare _id_inscripciones int;

		SET _id_inscripciones= 	(	
				select id 
				from inscripciones
				where _id_estudiantes  = id_estudiantes
							AND _id_cursos=   id_cursos
							AND _id_anos_lectivos =id_anos_lectivos  
							AND _id_jornadas  = id_jornadas
							);

 INSERT INTO matriculas(
	id_inscripciones,
	id_cursos_paralelos_aulas
	
)

	VALUES (  
			_id_inscripciones ,
			_id_paralelos_aulas
			
			
  );
	
	SELECT LAST_INSERT_ID() as _id_matricula;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_notas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_notas`;
delimiter ;;
CREATE PROCEDURE `crear_notas`(IN `_id_matriculas` INT, IN `_id_actividades_cursos` INT, IN `_valor` double)
BEGIN

	if not exists(
		Select 
			1 
		from
			nota1
		where 
				id_matriculas=_id_matriculas 
				and id_actividades_cursos = _id_actividades_cursos  
	) then
				
		INSERT INTO nota1(
			id_matriculas,
			id_actividades_cursos,
			valor
		)VALUES ( 		
			_id_matriculas , 
			_id_actividades_cursos  ,
			_valor 
		);
	end if;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_paralelos`;
delimiter ;;
CREATE PROCEDURE `crear_paralelos`(IN `_nombre` VARCHAR(25), IN `_id_anos_lectivos` INT)
BEGIN
 
 
 
 
INSERT INTO paralelos(
	nombre,
	id_anos_lectivos
) 

VALUES (  UPPER(_nombre),
	
	_id_anos_lectivos  );





 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_paralelos_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_paralelos_jornadas`;
delimiter ;;
CREATE PROCEDURE `crear_paralelos_jornadas`(IN `_id_paralelos` INT, IN `_id_jornadas` INT)
BEGIN
 


 

   INSERT INTO paralelos_jornadas(
	id_paralelos,
	id_jornadas
	
) 
        VALUES(_id_paralelos,_id_jornadas);
				

 
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_parciales`;
delimiter ;;
CREATE PROCEDURE `crear_parciales`(IN `_nombre` VARCHAR(255), IN `_codigo` VARCHAR(5))
BEGIN
 
INSERT INTO ctlg_parciales (
	nombre, 
	codigo

)
VALUES (  _nombre,  _codigo );

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_periodos`;
delimiter ;;
CREATE PROCEDURE `crear_periodos`(IN `_nombre` VARCHAR(255), IN `_codigo` VARCHAR(5))
BEGIN
 
INSERT INTO ctlg_periodos (
	nombre, 
	codigo 
	
)
VALUES (  _nombre,  _codigo );

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_usuarios
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_usuarios`;
delimiter ;;
CREATE PROCEDURE `crear_usuarios`(IN `_nombres` VARCHAR(255), `_apellidos` VARCHAR(255), `_correo` VARCHAR(255), `_id_perfiles` INT)
BEGIN
			INSERT INTO usuarios(
				nombres,
				apellidos,
				correo,
				
				id_perfiles
				
			)
			VALUES (  UPPER(_nombres),
				UPPER(_apellidos) ,
				_correo ,
				
				_id_perfiles 
			  );


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `cursos`;
delimiter ;;
CREATE PROCEDURE `cursos`(IN `_id_ctlg_cursos` INT, IN `_id_anos_lectivos` INT, IN `_id_jornadas` INT, IN `_id_materias` INT, IN `_id_paralelos` INT, IN `_id_aulas` INT)
BEGIN
 
 
 DECLARE _id INT ;
 
INSERT INTO cursos (
	id_ctlg_cursos,
	id_anos_lectivos
	
) 

	VALUES (  _id_ctlg_cursos ,
	_id_anos_lectivos 
	  );

SET _id = LAST_INSERT_ID();

IF _id > 0 THEN
  INSERT INTO cursos_jornadas(
	id_cursos,
	id_jornadas
	
) 
        VALUES(_id ,_id_jornadas);
				
				INSERT INTO cursos_materias(
	id_cursos,
	id_materias
	
) 
        VALUES(_id ,_id_materias);
				
				INSERT INTO cursos_paralelos_aulas(
	id_cursos,
	id_paralelos,
	id_aulas
	
) 
        VALUES(_id ,_id_paralelos,_id_aulas);
				
				
				COMMIT;
				
				
     ELSE
    ROLLBACK;
    END IF;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for docentes
-- ----------------------------
DROP PROCEDURE IF EXISTS `docentes`;
delimiter ;;
CREATE PROCEDURE `docentes`(IN `_nombres` VARCHAR(255), IN `_apellidos` VARCHAR(255), IN `_id_ctlg_tipos_documentos` INT, IN `_numero_documento` VARCHAR(255), IN `_id_ctlg_profesiones` INT, IN `_id_ctlg_generos` INT, IN `_correo` VARCHAR(255), IN `_direccion` VARCHAR(255), IN `_telefonos` VARCHAR(255), IN `_id_ctlg_estados` INT, IN `_id_organizaciones` INT, IN `_id_jornadas` INT, IN `_id_materias` INT, IN `_id_anos_lectivos` INT, IN `_id_perfiles` INT, IN `_contrasena` VARCHAR(255), OUT `_id_docentes` INT)
BEGIN
		 
		 INSERT INTO docentes(
			nombres,
			apellidos,
			id_ctlg_tipos_documentos,
			numero_documento,
			id_ctlg_profesiones,
			id_ctlg_generos,
			correo,
			direccion,
			telefonos,
			id_ctlg_estados,
			id_organizaciones
		)
		 

			VALUES (  _nombres ,
			_apellidos ,
			_id_ctlg_tipos_documentos ,
			_numero_documento ,
			_id_ctlg_profesiones ,
			_id_ctlg_generos ,
			_correo ,
			_direccion ,
			_telefonos ,
			_id_ctlg_estados ,
			_id_organizaciones );
			
			set _id_docentes = LAST_INSERT_ID();
			
			
					if _id_docentes>0 THEN
					
			
							INSERT INTO docentes_jornadas_materias(
									id_docentes,
									id_jornadas,
									id_materias,
									id_anos_lectivos,
									id_ctlg_estados
							)

							VALUES (  _id_docentes ,
											_id_jornadas ,
											_id_materias ,
											_id_anos_lectivos ,
											_id_ctlg_estados 
											);
											
							
											
											
							INSERT INTO usuarios(
									nombres,
									apellidos,
									id_perfiles,
									correo,
									contrasena,
									id_organizaciones
								)
								VALUES (  _nombres,
									_apellidos ,
									_id_perfiles ,
									_correo ,
									_contrasena ,
									_id_organizaciones    
									);
									
							else
							ROLLBACK;
							end if;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for docentes_cursos_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `docentes_cursos_paralelos`;
delimiter ;;
CREATE PROCEDURE `docentes_cursos_paralelos`(IN `_id_docentes` INT, `_id_cursos_paralelos_aulas` INT, `_id_ctlg_estados` INT)
BEGIN
 INSERT INTO docentes_cursos_paralelos(
	id_docentes,
	id_cursos_paralelos_aulas,
	id_ctlg_estados
)
 

	VALUES (  _id_docentes ,
	_id_cursos_paralelos_aulas,
	_id_ctlg_estados  );
/*
INSERT INTO edificios_anos_lectivos(
	id_edificios,
	id_anos_lectivos,
	id_ctlg_estados
) VALUES (  ( SELECT e.id, IF(e.id= _edificio, _edificio , 0)
FROM edificios as e), _ano_lectivo , _estado );
*/

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for docente_curso_jornada_materia
-- ----------------------------
DROP PROCEDURE IF EXISTS `docente_curso_jornada_materia`;
delimiter ;;
CREATE PROCEDURE `docente_curso_jornada_materia`(IN `_ano_lectivo` INT, IN `_estado` INT)
BEGIN
 
SELECT
	d.numero_documento,
	CONCAT(d.nombres," ",d.apellidos)as nombres,	

	d.correo as correo,
	ctlg_c.nombre as cursos,
	
	#ctlg_j.nombre as jornadas,
	p.nombre as paralelos,
	estad.nombre,
pru.id,

	ctlg_as.nombre
	
	
	
FROM

	cursos as c
		LEFT JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 


		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 

		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= ano.id
		INNER JOIN edificios as e ON e.id = eano.id_edificios and e.id = a.id_edificios and eano.id_anos_lectivos= c.id_anos_lectivos

		INNER JOIN aulas_jornadas as aj ON( aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas) 


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON (pj.id_paralelos= p.id) and pj.id_jornadas = cj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN materias as m ON m.id = cm.id_materias  and m.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_jornadas = j.id and  m.id=djm.id_materias and c.id_anos_lectivos = djm.id_anos_lectivos
	INNER JOIN docentes as d on d.id= djm.id_docentes 
	
	
	inner JOIN docentes_asignar_curso as pru on pru.id_docentes_jornadas_materias= djm.id and pru.id_cursos_paralelos_aulas=cpa.id 
	inner join ctlg_estados as estad on estad.id = pru.id_ctlg_estados
	
WHERE ano.id=_ano_lectivo  and estad.id= _estado  order by c.id;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for eliminar_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar_familiares`;
delimiter ;;
CREATE PROCEDURE `eliminar_familiares`(IN ids INT)
BEGIN




			UPDATE estudiantes_familiares set 
				deleted_at=NOW()
			
			where id=ids ;
			
			
SELECT ids as id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `estudiantes`;
delimiter ;;
CREATE PROCEDURE `estudiantes`(IN `_nombres` VARCHAR(255), `_apellidos` VARCHAR(255), `_foto` VARCHAR(255), `_id_ctlg_tipos_documentos` INT, `_numero_documento` VARCHAR(255), `_id_ctlg_genero` INT, `_correo` VARCHAR(255), `_direccion` VARCHAR(255), `_telefono` VARCHAR(255), `_celular` VARCHAR(255), `_id_ctlg_paises` INT, `_id_ctlg_provincias` INT, `_id_ctlg_parroquias` INT, `_id_ctlg_cantones` INT, `_fecha_nacimiento` DATE, `_edad` INT, `_id_ctlg_tipos_sangre` INT, `_id_ctlg_parentescos` INT, `_observacion` VARCHAR(255), `_id_ctlg_estados` INT)
BEGIN
 
 
INSERT INTO estudiantes(
	nombres,
	apellidos,
	foto,
	id_ctlg_tipos_documentos,
	numero_documento,
	id_ctlg_generos,
	correo,
	direccion,
	telefono,
	celular,
	id_ctlg_paises,
	id_ctlg_provincias,
	id_ctlg_parroquias,
	id_ctlg_cantones,
	fecha_nacimiento,
	edad,
	id_ctlg_tipos_sangre,
	id_ctlg_parentescos,
	observacion,
	id_ctlg_estados)
	
	VALUES (  _nombres,
	_apellidos ,
	_foto ,
	_id_ctlg_tipos_documentos ,
	_numero_documento ,
	_id_ctlg_genero ,
	_correo ,
	_direccion ,
	_telefono ,
	_celular ,
	_id_ctlg_paises ,
	_id_ctlg_provincias ,
	_id_ctlg_parroquias ,
	_id_ctlg_cantones	,
	_fecha_nacimiento ,
	_edad ,
	_id_ctlg_tipos_sangre ,
	_id_ctlg_parentescos ,
	_observacion ,
	_id_ctlg_estados );


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for estudiante_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `estudiante_familiares`;
delimiter ;;
CREATE PROCEDURE `estudiante_familiares`(IN `_estudiante` INT)
BEGIN
 
SELECT
	
	/*matri.id as N_matri,
	i.id as N_ins,*/
	CONCAT(est.nombres," ",est.apellidos)as estudiante,
	
/*	ctlg_c.nombre as curso,
	ano.nombre as año_lectivo,
	ctlg_j.nombre as jornadas,-
	doc.nombre as documentos,*/
	CONCAT(f.nombres," ",f.apellidos)as familiares,
	ctlg_pare.nombre as parentesco
	
	/*p.nombre as paralelo*/
	
	FROM
	matriculas as matri
	
	INNER JOIN inscripciones as i on i.id=matri.id_inscripciones
	INNER JOIN anos_lectivos as ano ON ano.id=i.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=i.id_estudiantes
/*	inner join estudiantes_documentos as estdoc on estdoc.id_estudiantes=est.id
	inner join documentos as doc on doc.id=estdoc.id_documentos*/
	INNER JOIN estudiantes_familiares as estfa on estfa.id_estudiantes=est.id
	inner join familiares as f ON f.id=estfa.id_familiares
	inner join ctlg_parentescos as ctlg_pare on ctlg_pare.id=f.id_ctlg_parentescos
	
INNER JOIN cursos as c on c.id=i.id_cursos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	
	INNER JOIN paralelos as p on p.id=matri.id_paralelos
	INNER JOIN jornadas as j ON j.id = i.id_jornadas
	INNER JOIN ctlg_jornadas as ctlg_j on ctlg_j.id = j.id_ctlg_jornadas

where est.id= _estudiante;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `familiares`;
delimiter ;;
CREATE PROCEDURE `familiares`(IN `_nombres_f` VARCHAR(255), `_apellidos_f` VARCHAR(255), `_foto_f` VARCHAR(255), `_id_ctlg_tipos_documentos_f` INT, `_numero_documento_f` VARCHAR(255), `_id_ctlg_profesiones_f` INT, `_correo_f` VARCHAR(255), `_id_ctlg_parentescos_f` INT, `_direccion_domicilio` VARCHAR(255), `_telefono_domicilio` VARCHAR(255), `_celular_f` VARCHAR(255), `_id_ctlg_estados_civil` INT, `_lugar_trabajo` VARCHAR(255), `_direccion_trabajo` VARCHAR(255), `_id_ctlg_cantones_f` INT, `_telefono_trabajo` VARCHAR(255), `_cargo` VARCHAR(255), `_flg_representante` INT, `_id_ctlg_estados` INT)
BEGIN
 INSERT INTO familiares(
	nombres,
	apellidos,
	foto,
	id_ctlg_tipos_documentos,
	numero_documento,
	id_ctlg_profesiones,
	correo,
	id_ctlg_parentescos,
	direccion_domicilio,
	telefono_domicilio,
	celular,
	id_ctlg_estados_civil,
	lugar_trabajo,
	direccion_trabajo,
	id_ctlg_cantones,
	telefono_trabajo,
	cargo,
	flg_representante,
	id_ctlg_estados
)


 

	VALUES ( _nombres_f ,
	_apellidos_f ,
	_foto_f ,
	_id_ctlg_tipos_documentos_f ,
	_numero_documento_f ,
	_id_ctlg_profesiones_f ,
	_correo_f,
	_id_ctlg_parentescos_f ,
	_direccion_domicilio ,
	_telefono_domicilio ,
	_celular_f ,
	_id_ctlg_estados_civil ,
	_lugar_trabajo ,
	_direccion_trabajo ,
	_id_ctlg_cantones_f ,
	_telefono_trabajo ,
	_cargo ,
	_flg_representante ,
	_id_ctlg_estados );


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `inscripciones`;
delimiter ;;
CREATE PROCEDURE `inscripciones`(IN `_id_estudiantes` INT, `_id_cursos` INT, `_id_anos_lectivos` INT, `_id_organizaciones` INT, `_id_jornadas` INT, `_id_ctlg_estados` INT)
BEGIN
 INSERT INTO inscripciones(
	id_estudiantes,
	id_cursos,
	id_anos_lectivos,
	id_organizaciones,
	id_jornadas,
	id_ctlg_estados
)


 

	VALUES (  _id_estudiantes ,
	_id_cursos ,
	_id_anos_lectivos ,
	_id_organizaciones ,
	_id_jornadas ,
	_id_ctlg_estados   );


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insumos
-- ----------------------------
DROP PROCEDURE IF EXISTS `insumos`;
delimiter ;;
CREATE PROCEDURE `insumos`(IN `_id_ctlg_insumos` INT, IN `_id_parciales` INT)
BEGIN
 
					
									
												INSERT INTO insumos(
												id_ctlg_insumos,
												id_parciales
												
												) 
												VALUES( _id_ctlg_insumos, _id_parciales);
												
												

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `jornadas`;
delimiter ;;
CREATE PROCEDURE `jornadas`(IN `_id_ctlg_jornadas` INT, IN `_id_anos_lectivos` INT)
BEGIN
 
 
						INSERT INTO jornadas ( 
						id_ctlg_jornadas,
						id_anos_lectivos
					
					)
						VALUES ( _id_ctlg_jornadas, _id_anos_lectivos );
						
	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_actividades_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_actividades_cursos`;
delimiter ;;
CREATE PROCEDURE `lista_actividades_cursos`()
BEGIN
 
SELECT
dre.*,
	dre.id,
	ano.nombre as ano_lectivo,
		ctlg_as.nombre as materia,
	ctlg_c.nombre as curso,
	ins.nombre as insumo,
	ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,

	dre.descripcion as descripcion
	
	
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 
	
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	


	
WHERE dre.deleted_at is null GROUP BY dre.id
;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_actividades_cursos_por_docente
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_actividades_cursos_por_docente`;
delimiter ;;
CREATE PROCEDURE `lista_actividades_cursos_por_docente`(in ids int)
BEGIN
 
SELECT
dre.*,
	dre.id,
	ano.nombre as ano_lectivo,
		ctlg_as.nombre as materia,
	ctlg_c.nombre as curso,
	ins.nombre as insumo,
	ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,

	dre.descripcion as descripcion
	
	
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 
	
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	


	
WHERE d.id=ids and dre.deleted_at is null GROUP BY dre.id
;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_ano_lectivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_ano_lectivo`;
delimiter ;;
CREATE PROCEDURE `lista_ano_lectivo`()
BEGIN

			
			select
			ano.*,
					ano.id,
					ano.nombre

			FROM

					anos_lectivos as ano
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= ano.id_ctlg_estados
					
			where 
			
				ano.deleted_at is null; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_aulas`;
delimiter ;;
CREATE PROCEDURE `lista_aulas`()
BEGIN

			
			select
					a.*,
					
					a.nombre as aulas,
					a.capacidad as capacidad,
					
					e.nombre as edificios,
					cj.nombre as jornadas,
					ano.nombre as ano_lectivo
					
					

			FROM
					
					aulas as a 
					
					INNER JOIN edificios as e ON e.id = a.id_edificios
					INNER JOIN organizaciones as o on o.id = a.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= a.id_ctlg_estados
					INNER JOIN aulas_jornadas as aj on aj.id_aulas=a.id
					INNER JOIN jornadas as j on j.id = aj.id_jornadas
					INNER JOIN ctlg_jornadas as cj on cj.id=j.id_ctlg_jornadas
					inner join anos_lectivos as ano on ano.id=j.id_anos_lectivos
					inner JOIN edificios_anos_lectivos as eano on eano.id_anos_lectivos= j.id_anos_lectivos
					
					
		
			where 
			
				a.deleted_at is null GROUP BY a.id, ano.id, j.id, e.id ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_cursos`;
delimiter ;;
CREATE PROCEDURE `lista_cursos`()
BEGIN

			
			select
					c.*,
					cu.nombre as cursos,
					ano.nombre as ano_lectivo

			FROM
					
					cursos as c

					
					INNER JOIN ctlg_cursos as cu on cu.id = c.id_ctlg_cursos
					INNER JOIN anos_lectivos as ano ON ano.id=c.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = c.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= c.id_ctlg_estados
					
					
			
		
			where 
			
				c.deleted_at is null GROUP BY ano.id , c.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_cursos_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_cursos_materias`;
delimiter ;;
CREATE PROCEDURE `lista_cursos_materias`()
BEGIN

			
			select
					cm.*,
					cm.id as id,
					cu.nombre as cursos,
					ctlg_m.nombre as materias,
					ano.nombre as ano_lectivo

			FROM
					
					cursos as c

					
					INNER JOIN ctlg_cursos as cu on cu.id = c.id_ctlg_cursos
					INNER JOIN anos_lectivos as ano ON ano.id=c.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = c.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= c.id_ctlg_estados
					
					INNER JOIN cursos_materias as cm on cm.id_cursos=c.id
					inner join materias as m on m.id=cm.id_materias
					INNER JOIN ctlg_materias as ctlg_m on ctlg_m.id=m.id_ctlg_materias
					
					
			
		
			where 
			
				cm.deleted_at is null GROUP BY ano.id , c.id ,m.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_cursos_paralelos_aulas
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_cursos_paralelos_aulas`;
delimiter ;;
CREATE PROCEDURE `lista_cursos_paralelos_aulas`()
BEGIN

			
			SELECT
		cpa.*,
			
		ctlg_c.nombre as cursos,
		a.nombre as aula,
		p.nombre as paralelos,
		ctlg_j.nombre as jornadas,
		ano.nombre as ano_lectivo
FROM

	cursos as c
	
	
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos
			  

		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= cpa.id_ctlg_estados	
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas
		

		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id and pj.id_jornadas = cj.id_jornadas

		
		
			where 
			
				cpa.deleted_at is null GROUP BY ano.id , c.id,a.id, p.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_de_notas_de_los deberes
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_de_notas_de_los deberes`;
delimiter ;;
CREATE PROCEDURE `lista_de_notas_de_los deberes`(IN `_materia` INT, `_ano_lectivo` INT, `_curso` INT, `_paralelo` INT, `_jornada` INT, IN `_periodo` INT, IN `_parcial` INT)
BEGIN
  		SELECT
	matri.id as N_matri,
	/*est.numero_documento as Cedula,*/
	CONCAT(est.apellidos," ",est.nombres)as Estudiante
	/*ctlg_c.nombre as curso,*/
	#ano.nombre as año_lectivo,
	/*ctlg_j.nombre as jornadas,
	p.nombre as paralelo,*/
	/*ins.nombre as Insumo,
	/*ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,
	ctlg_as.nombre as materia,*/
	#CONCAT(d.nombres," ",d.apellidos)as docente,
	/*dre.descripcion as Detalle,
	IFNULL(n.valor, 0) as Nota*/
	
/*SUM(n.valor) as total,
	(SUM(n.valor)/count(n.valor) )as promedio,*/
	
	
	
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		left JOIN inscripciones as i on i.id_cursos=c.id 
		left JOIN matriculas as matri on i.id=matri.id_inscripciones  
	
		left JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas 
		
		
		inner JOIN edificios as e ON e.id = a.id_edificios
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= eano.id_edificios
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_actividades_cursos and matri.id = n.id_matriculas
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	
	WHERE m.id= _materia and  ano.id=_ano_lectivo and c.id=_curso and j.id=_jornada and p.id=_paralelo and peri.id= _periodo and parc.id= _parcial GROUP BY est.id, dre.id ORDER BY dre.id; 
	/*con;*/
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_de_usuarios
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_de_usuarios`;
delimiter ;;
CREATE PROCEDURE `lista_de_usuarios`()
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				o.nombre as organizacion,
				p.nombre as perfiles
			FROM
				usuarios as u
				INNER JOIN organizaciones as o on o.id=u.id_organizaciones
				INNER JOIN perfiles as p on p.id=u.id_perfiles
			where 
				u.deleted_at is null
			;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes`;
delimiter ;;
CREATE PROCEDURE `lista_docentes`()
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				u.telefonos as telefono
			FROM
				docentes as u
				INNER JOIN organizaciones as o on o.id=u.id_organizaciones
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
			where 
				u.deleted_at is null
			;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_asignar_cursos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_asignar_cursos`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_asignar_cursos`()
BEGIN
 
SELECT
	dac.id,
	CONCAT(d.nombres," ",d.apellidos)as nombre_completo,
	ctlg_as.nombre as materia,
	ctlg_c.nombre as curso,
	p.nombre as paralelo,
	ctlg_j.nombre as jornada,
	ano.nombre as ano_lectivo
	
	FROM
	docentes_asignar_curso as dac 

	INNER JOIN ctlg_estados as estad on estad.id = dac.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		INNER JOIN  cursos as c on c.id= cpa.id_cursos
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		INNER JOIN  ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		INNER JOIN  aulas as a ON a.id = cpa.id_aulas 
		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id and aj.id_jornadas=j.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN  materias as m ON m.id = cm.id_materias 
	INNER JOIN  ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	INNER JOIN  docentes as d on d.id= djm.id_docentes 
	


	
WHERE dac.deleted_at is null GROUP BY dac.id;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_curso_jornada
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_curso_jornada`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_curso_jornada`(IN `_ano_lectivo` INT, IN `_curso` INT, IN `_paralelo` INT, IN `_jornada` INT, IN `_estado` INT)
BEGIN
 
SELECT

d.numero_documento as cedula,
	#ano.nombre as año_lectivo,
	CONCAT(d.nombres," ",d.apellidos)as nombres	,
	d.correo as correo,
	estad.nombre
FROM

	cursos as c
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		iNNER JOIN ctlg_estados as estad ON estad.id= c.id_ctlg_estados
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos


		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id 
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and j.id_ctlg_estados= c.id_ctlg_estados
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 

		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= ano.id
		INNER JOIN edificios as e ON e.id = eano.id_edificios and e.id = a.id_edificios and eano.id_anos_lectivos= c.id_anos_lectivos

		INNER JOIN aulas_jornadas as aj ON( aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas)


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos and p.id_ctlg_estados= c.id_ctlg_estados
		INNER JOIN paralelos_jornadas as pj ON (pj.id_paralelos= p.id) and pj.id_jornadas = cj.id_jornadas  

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id and estad.id= cm.id_ctlg_estados
		INNER JOIN materias as m ON m.id = cm.id_materias  and m.id_anos_lectivos= c.id_anos_lectivos and m.id_ctlg_estados= c.id_ctlg_estados
		INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
		
		
		INNER JOIN docentes_cursos_paralelos as dcp on dcp.id_cursos_paralelos_aulas = cpa.id and dcp.id_ctlg_estados= c.id_ctlg_estados
		inner join docentes as d on d.id= dcp.id_docentes and d.id_ctlg_estados= c.id_ctlg_estados
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id and j.id = djm.id_jornadas and  m.id=djm.id_materias and c.id_anos_lectivos = djm.id_anos_lectivos and dcp.id_ctlg_estados= djm.id_ctlg_estados 
WHERE ano.id=_ano_lectivo and c.id = _curso and p.id= _paralelo and j.id= _jornada  and estad.id= _estado ORDER BY d.apellidos;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_jornada
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_jornada`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_jornada`(IN `_ano_lectivo` INT, IN `_jornada` INT)
BEGIN
 
SELECT
d.numero_documento as cedula,
		
	CONCAT(d.nombres," ",d.apellidos)as nombres	,
	ctlg_j.nombre,
	ctlg_as.nombre
	
FROM

	docentes as d
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
	INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
	INNER JOIN jornadas as j on j.id = djm.id_jornadas
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
	INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
	

	
WHERE ano.id=_ano_lectivo and j.id= _jornada   ORDER BY d.apellidos;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_jornadas_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_jornadas_materias`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_jornadas_materias`()
BEGIN
 
SELECT
	djm.*,
	CONCAT(d.nombres," ",d.apellidos)as nombre_completo,
	ctlg_j.nombre as jornada,
	ctlg_as.nombre as materia,
	ano.nombre as ano_lectivo
	
FROM

docentes as d

	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
	INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
	INNER JOIN jornadas as j on j.id = djm.id_jornadas and j.id_anos_lectivos= djm.id_anos_lectivos
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
	INNER JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
	

	
WHERE djm.deleted_at is null
;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_materias_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_materias_curso`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_materias_curso`(IN `_ano_lectivo` INT)
BEGIN
 
SELECT
	d.numero_documento,
	CONCAT(d.nombres," ",d.apellidos)as nombres,	
	ctlg_as.nombre as materia,
	ctlg_c.nombre as cursos,
	a.nombre as aula,
	ctlg_j.nombre as jornadas,
	p.nombre as paralelos
		
	
	
	
FROM

	cursos as c
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos


		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 

		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= ano.id
		INNER JOIN edificios as e ON e.id = eano.id_edificios and e.id = a.id_edificios and eano.id_anos_lectivos= c.id_anos_lectivos

		INNER JOIN aulas_jornadas as aj ON( aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas)


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON (pj.id_paralelos= p.id) and pj.id_jornadas = cj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN materias as m ON m.id = cm.id_materias  and m.id_anos_lectivos= c.id_anos_lectivos
		INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
		
		
		INNER JOIN docentes_cursos_paralelos as dcp on dcp.id_cursos_paralelos_aulas = cpa.id
		inner join docentes as d on d.id= dcp.id_docentes
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id and j.id = djm.id_jornadas and  m.id=djm.id_materias and c.id_anos_lectivos = djm.id_anos_lectivos

WHERE ano.id=_ano_lectivo ORDER BY d.apellidos;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_por_ano
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_por_ano`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_por_ano`(IN `_ano_lectivo` INT, IN `_estado` INT)
BEGIN
 
SELECT
	d.numero_documento as cedula,
	#ano.nombre as año_lectivo,
	CONCAT(d.nombres," ",d.apellidos)as nombres	,
	#d.id,
	d.correo as correo
	#estad.nombre,
	#djm.id,
	#ctlg_as.nombre
	
FROM

	docentes as d
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id 
	INNER JOIN anos_lectivos as ano ON ano.id= djm.id_anos_lectivos
	INNER JOIN ctlg_estados as estad ON estad.id= djm.id_ctlg_estados
	INNER JOIN jornadas as j on j.id = djm.id_jornadas
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	INNER JOIN materias as m ON m.id = djm.id_materias  and m.id_anos_lectivos= djm.id_anos_lectivos
	INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
	

	
WHERE ano.id=_ano_lectivo  and estad.id= _estado GROUP BY d.id ORDER BY d.apellidos;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_docentes_por_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_docentes_por_curso`;
delimiter ;;
CREATE PROCEDURE `lista_docentes_por_curso`(IN `_ano_lectivo` INT, IN `_curso` INT, IN `_paralelo` INT)
BEGIN
 
SELECT
	d.numero_documento,
	CONCAT(d.nombres," ",d.apellidos)as nombres,	
	d.correo as correo
	/*ctlg_c.nombre as cursos,
	ctlg_j.nombre as jornadas,
	p.nombre as paralelos*/
		
	
	
	
FROM

	cursos as c
		INNER JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos


		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas
		INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas


		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id_cursos=c.id
		INNER JOIN aulas as a ON a.id = cpa.id_aulas 

		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= ano.id
		INNER JOIN edificios as e ON e.id = eano.id_edificios and e.id = a.id_edificios and eano.id_anos_lectivos= c.id_anos_lectivos

		INNER JOIN aulas_jornadas as aj ON( aj.id_aulas = a.id and aj.id_jornadas = cj.id_jornadas)


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and p.id_anos_lectivos= c.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON (pj.id_paralelos= p.id) and pj.id_jornadas = cj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		INNER JOIN materias as m ON m.id = cm.id_materias  and m.id_anos_lectivos= c.id_anos_lectivos
		INNER JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
		
		
		INNER JOIN docentes_cursos_paralelos as dcp on dcp.id_cursos_paralelos_aulas = cpa.id
		inner join docentes as d on d.id= dcp.id_docentes
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id_docentes = d.id and j.id = djm.id_jornadas and  m.id=djm.id_materias and c.id_anos_lectivos = djm.id_anos_lectivos

WHERE ano.id=_ano_lectivo and c.id = _curso and p.id= _paralelo GROUP By d.id ORDER BY d.apellidos;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_edificios
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_edificios`;
delimiter ;;
CREATE PROCEDURE `lista_edificios`()
BEGIN

			
			select
					e.*,
					e.nombre as nombre,
					e.direccion as direccion,
					ano.nombre as ano_lectivo
					
					

			FROM
					
					edificios as e

					
					INNER JOIN organizaciones as o on o.id = e.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= e.id_ctlg_estados
					inner JOIN edificios_anos_lectivos as eano on eano.id_edificios = e.id
					INNER JOIN anos_lectivos as ano on ano.id = eano.id_anos_lectivos
					
					
		
			where 
			
				e.deleted_at is null ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_estudiantes
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_estudiantes`;
delimiter ;;
CREATE PROCEDURE `lista_estudiantes`()
BEGIN

  		SELECT
				u.*,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				u.telefono as telefono
			FROM
				estudiantes as u
			
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
			where 
				u.deleted_at is null
			;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_familiares
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_familiares`;
delimiter ;;
CREATE PROCEDURE `lista_familiares`()
BEGIN

  		SELECT
				u.*,
				ef.id as id_fami ,
				#e.numero_documento as numero_documento,
				concat(e.nombres,' ',e.apellidos) as nombre,
				concat(u.nombres,' ',u.apellidos) as nombre_completo,
				p.nombre as parentesco,
				u.telefono_domicilio as telefono,
				u.celular as celular,
				u.lugar_trabajo as lugar_trabajo,
				u.telefono_trabajo as telefono_trabajo
			FROM
				familiares as u
				INNER JOIN ctlg_parentescos as p on p.id= u.id_ctlg_parentescos
				INNER JOIN ctlg_estados as c on c.id=u.id_ctlg_estados
				INNER JOIN estudiantes_familiares as ef on ef.id_familiares=u.id
				INNER JOIN estudiantes as e on e.id = ef.id_estudiantes
			where 
				u.deleted_at is null  and ef.deleted_at is null
			;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_inscripciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_inscripciones`;
delimiter ;;
CREATE PROCEDURE `lista_inscripciones`()
BEGIN
 
SELECT
	ins.*,
	est.numero_documento as numero_documento,
	CONCAT(est.nombres," ",est.apellidos)as nombre_completo,
	ctlg_c.nombre as curso,
	ctlg_j.nombre as jornada,
	ano.nombre as ano_lectivo
	
	FROM
	inscripciones as ins
	
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos as c on c.id=ins.id_cursos and ano.id=c.id_anos_lectivos
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos and ins.id_jornadas=j.id
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	
	


	
WHERE  ins.deleted_at is null GROUP BY ins.id 
;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_insumos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_insumos`;
delimiter ;;
CREATE PROCEDURE `lista_insumos`()
BEGIN

			
			select
					i.*,
					ins.nombre as insumos,
					pare.nombre as parciales,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					INNER JOIN parciales as par on par.id_periodos=p.id
					INNER JOIN ctlg_parciales as pare on pare.id = par.id_ctlg_parciales

					INNER JOIN insumos as i on i.id_parciales = par.id
					INNER JOIN ctlg_insumos as ins on ins.id = i.id_ctlg_insumos
		
			where 
			
				ano.deleted_at is null GROUP BY ano.id , p.id , par.id, i.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_jornadas
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_jornadas`;
delimiter ;;
CREATE PROCEDURE `lista_jornadas`()
BEGIN

  		SELECT
				j.*,
				ctlg_j.nombre as nombre,
				ano.nombre as ano_lectivo
			FROM
				jornadas as j
				INNER JOIN ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
				INNER JOIN anos_lectivos as ano on ano.id=j.id_anos_lectivos
				INNER JOIN organizaciones as o on o.id=j.id_organizaciones
				INNER JOIN ctlg_estados as ctlg_es on ctlg_es.id=j.id_ctlg_estados
				
			where 
				j.deleted_at is null ;	
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_materias
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_materias`;
delimiter ;;
CREATE PROCEDURE `lista_materias`()
BEGIN

			
			select
					m.*,
					c.nombre as materias,
					ano.nombre as ano_lectivo

			FROM
					
				materias as m

					
					INNER JOIN ctlg_materias as c on c.id = m.id_ctlg_materias
					INNER JOIN anos_lectivos as ano ON ano.id=m.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = m.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= m.id_ctlg_estados
					
					
					
					
			
		
			where 
			
				m.deleted_at is null GROUP BY ano.id , m.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_matriculaciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_matriculaciones`;
delimiter ;;
CREATE PROCEDURE `lista_matriculaciones`()
BEGIN
 
SELECT
	matri.*,
	est.numero_documento as numero_documento,
	CONCAT(est.nombres," ",est.apellidos)as nombre_completo,
	ctlg_c.nombre as curso,
	ctlg_j.nombre as jornada,
	CONCAT("Paralelo: ",p.nombre," - ","Aula: ",a.nombre) as paralelo_aula,
	ano.nombre as ano_lectivo
	
	FROM
		matriculas as matri
	
	INNER JOIN inscripciones as ins on ins.id=matri.id_inscripciones
	INNER JOIN anos_lectivos as ano ON ano.id=ins.id_anos_lectivos
	INNER JOIN estudiantes as est ON est.id=ins.id_estudiantes
	
	
	INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=matri.id_cursos_paralelos_aulas
	INNER JOIN cursos as c on  cpa.id_cursos=c.id and c.id=ins.id_cursos and ano.id=c.id_anos_lectivos 
	inner join ctlg_cursos as ctlg_c on ctlg_c.id= c.id_ctlg_cursos
	INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
	INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id=j.id_anos_lectivos and ins.id_jornadas=j.id
	INNER JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas
	
	INNER JOIN paralelos as p on p.id=cpa.id_paralelos and ano.id=p.id_anos_lectivos 
	INNER JOIN aulas as a on a.id = cpa.id_aulas
	

	
	
	


	
WHERE  matri.deleted_at is null GROUP BY matri.id
;




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_notas_finales_estudiante
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_notas_finales_estudiante`;
delimiter ;;
CREATE PROCEDURE `lista_notas_finales_estudiante`(in _id_estudiantess int, in _id_anos_lectivoss int, in _id_periodoss int , in _id_parcialess int)
BEGIN
 


	SELECT

	#`prue_copy1`.`ano` AS `ano`,
	#`prue_copy1`.`curso` AS `curso`,
	prue_copy1.id_materia as moco,
	`prue_copy1`.`materia` AS `materia`,
	#`prue_copy1`.`periodo` AS `periodo`,
	#`prue_copy1`.`parcial` AS `parcial`,
	#`prue_copy1`.`jornada` AS `jornada`,
	#`prue_copy1`.`aula` AS `aula`,
	#`prue_copy1`.`paralelo` AS `paralelo`,
	#`prue_copy1`.`estudiante` AS `estudiante`,
	`inse`.`tarea` AS `tarea`,
	`inse`.`leccion` AS `leccion`,
	`inse`.`act_individual` AS `act_individual`,
	`inse`.`act_grupal` AS `act_grupal`,
	`inse`.`evaluacion_escrita` AS `evaluacion_escrita` 
FROM
	(
		`prue_copy1`
	LEFT JOIN `inse` ON ( ( ( `inse`.`estudiantes` = `prue_copy1`.`estudiante` ) AND (`prue_copy1`.`materia`  = `inse`.`materia` ) AND ( `prue_copy1`.`periodo`  = `inse`.`periodo`)AND (`prue_copy1`.`parcial`  = `inse`.`parcial` ) AND (`prue_copy1`.`ano`   = `inse`.`ano` ) ) ) 
	)

where prue_copy1.id_estudiante=  _id_estudiantess and prue_copy1.id_ano=_id_anos_lectivoss  and prue_copy1.id_periodo= _id_periodoss and prue_copy1.id_parcial= _id_parcialess 



;













	 




END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_notas_finales_parcial_periodo_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_notas_finales_parcial_periodo_curso`;
delimiter ;;
CREATE PROCEDURE `lista_notas_finales_parcial_periodo_curso`(in _id_anos_lectivoss int ,in _id_docentess int, in _id_dacss int, in _id_periodoss int,in _id_parcialess int)
BEGIN


  
  		SELECT
		n.*,
	#matri.id as N_matri,
	est.numero_documento as cedula,
	CONCAT(est.apellidos," ",est.nombres)as estudiante,
	/*ctlg_c.nombre as curso,*/
	#ano.nombre as año_lectivo,
	/*ctlg_j.nombre as jornadas,
	p.nombre as paralelo,*/
	#ins.nombre as Insumo,
	/*ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,
	ctlg_as.nombre as materia,*/
	#CONCAT(d.nombres," ",d.apellidos)as docente,
	 
 ROUND(AVG(CASE 
				WHEN ins.id= 1 
				THEN IFNULL(n.valor, 0) 
		END),2) 
 AS tarea,
 
ROUND(AVG(CASE 
				WHEN ins.id= 2 
				THEN IFNULL(n.valor, 0.00) 
				
		END),2)
 AS leccion,
 
		
		ROUND(AVG(CASE 
				WHEN ins.id= 3 
				THEN IFNULL(n.valor, 0.00) 
				 
		END),2)
 AS act_individual,
 
 
	ROUND(AVG(CASE 
				WHEN ins.id= 4 
				THEN IFNULL(n.valor, 0.00) 
				
				
		END),2) 
 AS act_grupal,
 
 ROUND(AVG(CASE 
				WHEN ins.id= 5 
				THEN IFNULL(n.valor, 0.00) 
		END),2) 
 AS evaluacion_escrita,
	
/*
 CASE ins.id
				WHEN  4 
				THEN ROUND(AVG( IFNULL(n.valor, 0)),2) 
				else 0
		END
 AS act_grupal,
 
  CASE ins.id
				WHEN 5 
				THEN ROUND(AVG( IFNULL(n.valor, 0)),2) 
				
		END
 AS evaluacion_escrita*/
case ins.id
            when 1 then ROUND(AVG( IFNULL(n.valor, 0.00)),2)
            when 2 then ROUND(AVG( IFNULL(n.valor, 0.00)),2)
						when 3 then ROUND(AVG( IFNULL(n.valor, 0.00)),2)
						when 4 then ROUND(AVG(IFNULL(n.valor, 0.00)),2)
						when 5 then ROUND(AVG( IFNULL(n.valor, 0.00)),2)
				
 end  as nota_final
	
/*SUM(n.valor) as total,
	(SUM(n.valor)/count(n.valor) )as promedio,*/
	
	
	
	
	FROM
	dre as dre
	inner JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		inner join cursos as c on c.id= cpa.id_cursos
		inner JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		inner JOIN inscripciones as i on i.id_cursos=c.id and ano.id= i.id_anos_lectivos 
		inner JOIN matriculas as matri on i.id=matri.id_inscripciones and matri.id_cursos_paralelos_aulas = cpa.id 
	
		inner JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id= j.id_anos_lectivos and j.id= i.id_jornadas
		inner JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas



		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id= p.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id  and j.id= pj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		inner JOIN materias as m ON m.id = cm.id_materias and ano.id= m.id_anos_lectivos
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias  and ano.id= djm.id_anos_lectivos
	inner JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON n.id_actividades_cursos =dre.id and matri.id = n.id_matriculas 
		

	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
INNER join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	
	WHERE ano.id=_id_anos_lectivoss and d.id=_id_docentess and dac.id= _id_dacss and peri.id =  _id_periodoss and parc.id = _id_parcialess  and dre.deleted_at is null GROUP BY est.id ORDER BY est.apellidos; 
	 
	 /*IF ins.id=3 THEN
        SET ujy= (ROUND(AVG( IFNULL(n.valor, 0)),2));
				
				
    END IF;*/
	/*con;*/
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_notas_finales_quimestral
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_notas_finales_quimestral`;
delimiter ;;
CREATE PROCEDURE `lista_notas_finales_quimestral`(in _id_anos_lectivoss int ,in _id_docentess int, in _id_dacss int, in _id_periodoss int)
BEGIN


  
  		SELECT
			n.*,
	#matri.id as N_matri,
	est.numero_documento as cedula,
	CONCAT(est.apellidos," ",est.nombres)as estudiante,
	/*ctlg_c.nombre as curso,*/
	#ano.nombre as año_lectivo,
	/*ctlg_j.nombre as jornadas,
	p.nombre as paralelo,*/
	#ins.nombre as Insumo,
	/*ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,
	ctlg_as.nombre as materia,*/
	#CONCAT(d.nombres," ",d.apellidos)as docente,
	 
 ROUND(AVG(CASE 
	WHEN ctlg_parc.id =1 and ins.id=1 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =1 and ins.id=2 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =1 and ins.id=3 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =1 and ins.id=4 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =1 and ins.id=5 Then IFNULL(n.valor, 0)
END),2) AS parcial_1,

ROUND(AVG(CASE 
	WHEN ctlg_parc.id =2 and ins.id=1 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =2 and ins.id=2 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =2 and ins.id=3 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =2 and ins.id=4 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =2 and ins.id=5 Then IFNULL(n.valor, 0)
END),2) AS parcial_2,
	 
 ROUND(AVG(CASE 
	WHEN ctlg_parc.id =3 and ins.id=1 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =3 and ins.id=2 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =3 and ins.id=3 Then  IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =3 and ins.id=4 Then IFNULL(n.valor, 0)
	WHEN ctlg_parc.id =3 and ins.id=5 Then IFNULL(n.valor, 0)
END),2) AS parcial_3,
 
ROUND(AVG(CASE 
				WHEN ins.id= 6 
				THEN IFNULL(n.valor, 0) 
		END),2) 
 AS examen
 
 /*(ROUND(AVG(CASE 
				WHEN ins.id= 6 
				THEN IFNULL(n.valor, 0) 
		END),2) *0.80)
 AS examen*/
 /*
ROUND(AVG(CASE 
				WHEN ins.id= 2 
				THEN  when 1 then ROUND(AVG( IFNULL(n.valor, 0)),2)
            when 2 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 3 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 4 then ROUND(AVG(IFNULL(n.valor, 0)),2)
						when 5 then ROUND(AVG( IFNULL(n.valor, 0)),2)
				
		END),2)
 AS parcial_2,
 
		
		ROUND(AVG(CASE 
				WHEN ins.id= 3 
				THEN IFNULL(n.valor, 0) 
				 
		END),2)
 AS parcial_3,
 
 
*/
	
/*
 CASE ins.id
				WHEN  4 
				THEN ROUND(AVG( IFNULL(n.valor, 0)),2) 
				else 0
		END
 AS act_grupal,
 
  CASE ins.id
				WHEN 5 
				THEN ROUND(AVG( IFNULL(n.valor, 0)),2) 
				
		END
 AS evaluacion_escrita*//*
case ins.id
            when 1 then ROUND(AVG( IFNULL(n.valor, 0)),2)
            when 2 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 3 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 4 then ROUND(AVG(IFNULL(n.valor, 0)),2)
						when 5 then ROUND(AVG( IFNULL(n.valor, 0)),2)
				
 end  as Nota_final*/
	
/*SUM(n.valor) as total,
	(SUM(n.valor)/count(n.valor) )as promedio
	
	*/
	
	
	FROM
	dre as dre
	inner JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		inner join cursos as c on c.id= cpa.id_cursos
		inner JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		inner JOIN inscripciones as i on i.id_cursos=c.id and ano.id= i.id_anos_lectivos 
		inner JOIN matriculas as matri on i.id=matri.id_inscripciones and matri.id_cursos_paralelos_aulas = cpa.id 
	
		inner JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas and ano.id= j.id_anos_lectivos and j.id= i.id_jornadas
		inner JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas



		INNER JOIN paralelos as p on p.id = cpa.id_paralelos and ano.id= p.id_anos_lectivos
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id  and j.id= pj.id_jornadas

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		inner JOIN materias as m ON m.id = cm.id_materias and ano.id= m.id_anos_lectivos
	left JOIN ctlg_materias as ctlg_as ON ctlg_as.id= m.id_ctlg_materias
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias  and ano.id= djm.id_anos_lectivos
	inner JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON n.id_actividades_cursos =dre.id and matri.id = n.id_matriculas 
		

	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
INNER join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	
	WHERE ano.id=_id_anos_lectivoss and d.id=_id_docentess and dac.id= _id_dacss and peri.id =  _id_periodoss   and dre.deleted_at is null GROUP BY est.id ORDER BY est.apellidos; 
	 
	/*  if ctlg_parc.id=1 then
	 
        SET pu= case ins.id
            when 1 then ROUND(AVG( IFNULL(n.valor, 0)),2)
            when 2 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 3 then ROUND(AVG( IFNULL(n.valor, 0)),2)
						when 4 then ROUND(AVG(IFNULL(n.valor, 0)),2)
						when 5 then ROUND(AVG( IFNULL(n.valor, 0)),2)
				
 end ;
				
				 
    END IF;*/
	/*con;*/
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_notas_por_un insumo_curso
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_notas_por_un insumo_curso`;
delimiter ;;
CREATE PROCEDURE `lista_notas_por_un insumo_curso`(IN `_materia` INT, `_ano_lectivo` INT, `_curso` INT, `_paralelo` INT, `_jornada` INT, IN `_periodo` INT, IN `_parcial` INT, IN `_insumo` INT)
BEGIN
  		SELECT
	#matri.id as N_matri,
	est.numero_documento as Cedula,
	CONCAT(est.apellidos," ",est.nombres)as Estudiante,
	/*ctlg_c.nombre as curso,*/
	#ano.nombre as año_lectivo,
	/*ctlg_j.nombre as jornadas,
	p.nombre as paralelo,*/
	ins.nombre as Insumo,
	/*ctlg_parc.nombre as parcial,
	ctlg_peri.nombre as periodo,
	ctlg_as.nombre as materia,*/
	#CONCAT(d.nombres," ",d.apellidos)as docente,
ROUND(AVG(IF( iso.id = _insumo , IFNULL(n.valor, 0),0)),2) Nota_final
	
/*SUM(n.valor) as total,
	(SUM(n.valor)/count(n.valor) )as promedio,*/
	
	
	
	
	FROM
	dre as dre
	 left JOIN docentes_asignar_curso as dac on  dac.id = dre.id_docentes_asignar_curso
	 left join ctlg_estados as estad on estad.id = dre.id_ctlg_estados
		INNER JOIN cursos_paralelos_aulas as cpa ON cpa.id=dac.id_cursos_paralelos_aulas
		left join cursos as c on c.id= cpa.id_cursos
		left JOIN ctlg_cursos as ctlg_c ON ctlg_c.id = c.id_ctlg_cursos
		
		INNER JOIN organizaciones as o ON o.id = c.id_organizaciones
		INNER JOIN anos_lectivos as ano ON ano.id= c.id_anos_lectivos 

		left JOIN inscripciones as i on i.id_cursos=c.id 
		left JOIN matriculas as matri on i.id=matri.id_inscripciones  
	
		left JOIN estudiantes as est ON est.id=i.id_estudiantes   
		INNER JOIN cursos_jornadas as cj ON cj.id_cursos= c.id
		INNER JOIN jornadas as j on j.id = cj.id_jornadas 
		left JOIN ctlg_jornadas as ctlg_j ON ctlg_j.id = j.id_ctlg_jornadas

		left JOIN aulas as a ON a.id = cpa.id_aulas 
		
		
		inner JOIN edificios as e ON e.id = a.id_edificios
		INNER JOIN edificios_anos_lectivos as eano ON eano.id_anos_lectivos= eano.id_edificios
		 

		INNER JOIN aulas_jornadas as aj ON aj.id_aulas = a.id


		INNER JOIN paralelos as p on p.id = cpa.id_paralelos 
		INNER JOIN paralelos_jornadas as pj ON pj.id_paralelos= p.id

		INNER JOIN cursos_materias as cm ON cm.id_cursos= c.id
		left JOIN materias as m ON m.id = cm.id_materias 
	left JOIN ctlg_asignaturas as ctlg_as ON ctlg_as.id= m.id_ctlg_asignaturas
		
		
	INNER JOIN docentes_jornadas_materias as djm ON djm.id = dac.id_docentes_jornadas_materias and djm.id_jornadas = j.id and  m.id=djm.id_materias 
	left JOIN docentes as d on d.id= djm.id_docentes 
	

left JOIN nota1 as n ON  dre.id=n.id_descripcion_insumo and matri.id = n.id_matriculas
		
	
	INNER join periodos as peri on peri.id_anos_lectivos= ano.id
left join ctlg_periodos as ctlg_peri on ctlg_peri.id= peri.id_ctlg_periodos
 inner join parciales as parc on  parc.id_periodos=peri.id
left join ctlg_parciales as ctlg_parc on ctlg_parc.id= parc.id_ctlg_parciales
inner JOIN insumos as iso on iso.id_parciales = parc.id and  iso.id = dre.id_insumos 
left JOIN ctlg_insumos as ins on ins.id = iso.id_ctlg_insumos
	
	WHERE m.id= _materia and  ano.id=_ano_lectivo and c.id=_curso and j.id=_jornada and p.id=_paralelo and peri.id= _periodo and parc.id= _parcial and iso.id= _insumo GROUP BY est.id ORDER BY est.id; 
	/*con;*/
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_paralelos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_paralelos`;
delimiter ;;
CREATE PROCEDURE `lista_paralelos`()
BEGIN

			
			select
					p.*,
					
					p.nombre as paralelos,
					cj.nombre as jornada,
					ano.nombre as ano_lectivo
					
					

			FROM
					
					paralelos as p
					
					INNER JOIN organizaciones as o on o.id = p.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					INNER JOIN paralelos_jornadas as pj on pj.id_paralelos=p.id
					INNER JOIN jornadas as j on j.id = pj.id_jornadas
					INNER JOIN ctlg_jornadas as cj on cj.id=j.id_ctlg_jornadas
					inner join anos_lectivos as ano on ano.id=p.id_anos_lectivos and p.id_anos_lectivos=j.id_anos_lectivos
					
					
		
			where 
			
				p.deleted_at is null; # GROUP BY ano.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_parciales`;
delimiter ;;
CREATE PROCEDURE `lista_parciales`()
BEGIN

			
			select
					par.*,
					pare.nombre as parciales,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					#INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					#inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					INNER JOIN parciales as par on par.id_periodos=p.id
					INNER JOIN ctlg_parciales as pare on pare.id = par.id_ctlg_parciales
/*
					INNER JOIN insumos as i on i.id_parciales = par.id
					INNER JOIN ctlg_insumos as ins on ins.id = i.id_ctlg_insumos*/
		
			where 
			
				ano.deleted_at is null  GROUP BY ano.id , p.id , par.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for lista_periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `lista_periodos`;
delimiter ;;
CREATE PROCEDURE `lista_periodos`()
BEGIN

			
			select
					p.*,
					c.nombre as periodos,
					ano.nombre as ano_lectivo

			FROM
					
					periodos as p

					
					INNER JOIN ctlg_periodos as c on c.id = p.id_ctlg_periodos
					INNER JOIN anos_lectivos as ano ON ano.id=p.id_anos_lectivos
					INNER JOIN organizaciones as o on o.id = ano.id_organizaciones
					INNER JOIN ctlg_estados as ctlg_e on ctlg_e.id= p.id_ctlg_estados
					
					#INNER JOIN jornadas as j on j.id_anos_lectivos=ano.id
					#inner join ctlg_jornadas as ctlg_j on ctlg_j.id=j.id_ctlg_jornadas
					
					
			
		
			where 
			
				p.deleted_at is null GROUP BY ano.id , p.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for matriculacion
-- ----------------------------
DROP PROCEDURE IF EXISTS `matriculacion`;
delimiter ;;
CREATE PROCEDURE `matriculacion`(IN `_id_inscripciones` INT, `_id_paralelos` INT, `_observaciones` VARCHAR(255), `_id_ctlg_estados` INT)
BEGIN
 INSERT INTO matriculas(
	id_inscripciones,
	id_paralelos,
	observaciones,
	id_ctlg_estados
)


 

	VALUES (  _id_inscripciones ,
	_id_paralelos,
	_observaciones ,
	_id_ctlg_estados );
/*
INSERT INTO edificios_anos_lectivos(
	id_edificios,
	id_anos_lectivos,
	id_ctlg_estados
) VALUES (  ( SELECT e.id, IF(e.id= _edificio, _edificio , 0)
FROM edificios as e), _ano_lectivo , _estado );
*/

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for organizaciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `organizaciones`;
delimiter ;;
CREATE PROCEDURE `organizaciones`(IN `_nombre` VARCHAR(255), `_correo` VARCHAR(255), `_direccion` VARCHAR(255), `_id_ctlg_paises` INT)
BEGIN
INSERT INTO organizaciones(
	nombre,
	correo,
	direccion,
	id_ctlg_paises
)
	VALUES (  _nombre,
	_correo ,
	_direccion ,
	_id_ctlg_paises   );


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for parciales
-- ----------------------------
DROP PROCEDURE IF EXISTS `parciales`;
delimiter ;;
CREATE PROCEDURE `parciales`(IN `_id_periodos` INT, IN `_id_ctlg_parciales` INT)
BEGIN
 
					
										INSERT INTO parciales(
											
										id_periodos,
										id_ctlg_parciales
									
										) 
										VALUES( _id_periodos, _id_ctlg_parciales);
										
								/*		SELECT LAST_INSERT_ID() as id_parciales;*/

									

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for perfiles
-- ----------------------------
DROP PROCEDURE IF EXISTS `perfiles`;
delimiter ;;
CREATE PROCEDURE `perfiles`(IN `_nombre` VARCHAR(255), IN `_id_organizaciones` INT, IN `_id_opciones` INT, OUT `_id_perfiles` INT)
BEGIN
				INSERT INTO perfiles(
					nombre,
					id_organizaciones
				)
				VALUES (  _nombre,
					_id_organizaciones    );
					
					set _id_perfiles= LAST_INSERT_ID();
					
					
					if _id_perfiles > 0 then
					
					INSERT INTO perfiles_opciones(
					id_perfiles,
					id_opciones
				)
				VALUES (  _id_perfiles ,
					_id_opciones   );
					
					
					else 
					ROLLBACK;
					end if;
					
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `periodos`;
delimiter ;;
CREATE PROCEDURE `periodos`(IN `_id_ctlg_periodos` INT, IN `_id_anos_lectivos` INT)
BEGIN
 
	
					INSERT INTO periodos ( 
						
						id_ctlg_periodos, 
						id_anos_lectivos 
					
						)
						VALUES ( _id_ctlg_periodos , _id_anos_lectivos);
						
					select LAST_INSERT_ID() as id_periodo;



					

END
;;
delimiter ;