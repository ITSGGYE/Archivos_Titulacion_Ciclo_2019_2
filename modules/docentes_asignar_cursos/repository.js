const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_docentes, _id_paralelos_aulas }) => {
	return db.transaction((trx) => {
		var id_paralelos_aulas = [];
		_.forEach(_id_paralelos_aulas, (id_paralelos_aula) => {
			id_paralelos_aulas.push(
				execTrx(
					trx,
					"crear_docentes_asignar_cursos",
					_id_docentes,
					id_paralelos_aula
				)
			);
		});
		return Promise.all(id_paralelos_aulas)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*module.exports.crear = async ({ _id_docentes  , 
		 
		_id_paralelos_aulas 
	}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_docentes_asignar_cursos', _id_docentes  , 
			
			_id_paralelos_aulas 
		)
		.then(trx.commit)
		.catch(trx.rollback)
	});
}
*/
module.exports.actualizar = async (ids, { docentess }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_docentes_asignar_cursos", ids, docentess)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_docentes_asignar_cursos");
};

module.exports.docentes_asignar_curso = async (id) => {
	return exec(db, "catalogo_docentes_asignar_curso", id);
};

module.exports.docentes_asignar_ano = async (id) => {
	return exec(db, "catalogo_docentes_asignar_ano", id);
};

module.exports.docentes_asignar_anoreporte = async (id) => {
	return exec(db, "catalogo_docentes_asignar_anoreporte", id);
};

module.exports.docentes_asignar_materia = async (id) => {
	return exec(db, "catalogo_docentes_asignar_materia", id);
};

module.exports.docentes_asignar_aula = async (id) => {
	return exec(db, "catalogo_docentes_asignar_aula", id);
};

module.exports.docentes_asignar_paralelo = async (id) => {
	return exec(db, "catalogo_docentes_asignar_paralelo", id);
};

module.exports.docentes_asignar_jornada = async ({
	_id_docente,
	_id_anos_lectivo,
}) => {
	return exec(
		db,
		"catalogo_docentes_asignar_jornada",
		_id_docente,
		_id_anos_lectivo
	);
};

/*
module.exports.docentes_asignar_jornada = async (id) => {
	return exec(db, 'catalogo_docentes_asignar_jornada',id);
	
}
*/
module.exports.cur_paralelos_aulas = async (id) => {
	return exec(db, "catalogo_cur_paralelos_aulas", id);
};

module.exports.doc_jornadas_materias = async ({ jornadass, materiass }) => {
	return exec(db, "catalogo_doc_jornada_materia", jornadass, materiass);
};

module.exports.doc_jorna_mate = async ({
	jornadass,
	materiass,
	ano_lectivossss,
}) => {
	return exec(
		db,
		"catalogo_doc_jorna_mate",
		jornadass,
		materiass,
		ano_lectivossss
	);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_docente_asignar_cursos", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_docentes_asignar_cursos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
