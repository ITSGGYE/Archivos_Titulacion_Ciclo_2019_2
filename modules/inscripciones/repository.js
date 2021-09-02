const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	_id_estudiantes,
	_id_cursos,
	_id_anos_lectivos,
	_id_jornadas,
	_id_familiares,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_inscripciones",
			_id_estudiantes,
			_id_cursos,
			_id_anos_lectivos,
			_id_jornadas,
			_id_familiares
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (
	ids,
	{ id_jornadass, id_representantess }
) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_inscripciones",
			ids,
			id_jornadass,
			id_representantess
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_inscripciones");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_inscripciones", id);
};

module.exports.inscripciones_cedula = async ({ _id_ano, _cedula }) => {
	return exec(db, "catalogo_inscripciones_cedula", _id_ano, _cedula);
};

module.exports.inscripciones_jornadas = async (id) => {
	return exec(db, "catalogo_inscripciones_jornadas", id);
};

module.exports.jornadas_inscripciones = async ({
	_id_estudiante,
	_id_anos_lectivos,
}) => {
	return exec(
		db,
		"catalogo_jornadas_inscripciones",
		_id_estudiante,
		_id_anos_lectivos
	);
};

module.exports.cursos_inscripcion = async ({
	_id_estudiante,
	_id_anos_lectivos,
}) => {
	return exec(
		db,
		"catalogo_cursos_inscripcion",
		_id_estudiante,
		_id_anos_lectivos
	);
};

module.exports.inscripciones_cursos = async (id) => {
	return exec(db, "catalogo_inscripciones_cursos", id);
};

module.exports.jornadas_anos_cursos = async ({ anoss, cursoss }) => {
	return exec(db, "catalogo_jornadas_anos_cursos", anoss, cursoss);
};
/*
module.exports.jornadas_inscripciones = async (id) => {
	return exec(db, 'catalogo_jornadas_inscripciones',id);
	
}*/

module.exports.cursos_inscripciones = async (id) => {
	return exec(db, "catalogo_cursos_inscripciones", id);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_inscripcion", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_inscripciones", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
