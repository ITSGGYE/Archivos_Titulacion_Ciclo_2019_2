const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_dac, _id_insumos, _descripciones }) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_actividades_cursos",
			_id_dac,
			_id_insumos,
			_descripciones
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { descripcioness }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_actividades_cursos", ids, descripcioness)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async (id) => {
	return exec(db, "lista_actividades_cursos_por_docente", id);
};

module.exports.listarr = async () => {
	return exec(db, "lista_actividades_cursos");
};

module.exports.dac = async (id) => {
	return exec(db, "catalogo_dac", id);
};

module.exports.insumos_dac = async (id) => {
	return exec(db, "catalogo_insumos_dac", id);
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

module.exports.dac_actividad_curso = async ({
	_id_docente,
	_id_anos_lectivo,
	_id_jornada,
}) => {
	return exec(
		db,
		"catalogo_dac_actividad_curso",
		_id_docente,
		_id_anos_lectivo,
		_id_jornada
	);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_actividades_cursos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_docente_asignar_cursos", id);
};
