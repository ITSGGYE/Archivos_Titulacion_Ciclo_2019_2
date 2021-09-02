const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	_id_cursos,
	_id_aulas,
	_id_paralelos,
	_id_jornadas,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_cursos_paralelos_aulas",
			_id_cursos,
			_id_aulas,
			_id_paralelos,
			_id_jornadas
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { aulass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_cursos_paralelos_aulas", ids, aulass)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_cursos_paralelos_aulas");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_cursos_paralelos_aulas", id);
};

module.exports.cursos_paralelos = async (id) => {
	return exec(db, "catalogo_cursos_paralelos", id);
};

module.exports.cursos_aulas = async (id) => {
	return exec(db, "catalogo_cursos_aulas", id);
};

module.exports.aulas_jornadas = async ({ jornadass, ano_lectivossss }) => {
	return exec(db, "catalogo_aulas_por_jornadas", jornadass, ano_lectivossss);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_cursos_paralelos_aulas", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_curso_paralelo_aula", id);
};
