const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	_id_matriculas,
	_id_actividades_cursos,
	_valor,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_notas",
			_id_matriculas,
			_id_actividades_cursos,
			_valor
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { valorss }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_notas", ids, valorss)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_docentes_asignar_cursos");
};

module.exports.dac = async (id) => {
	return exec(db, "catalogo_dac", id);
};
module.exports.dac_ano = async ({ _id_docente, _id_anos_lectivo }) => {
	return exec(db, "catalogo_dac_ano", _id_docente, _id_anos_lectivo);
};

module.exports.estu = async ({
	_id_docentes_asignar_cursos,
	_id_actividades_cursos,
}) => {
	return exec(
		db,
		"catalogo_estu",
		_id_docentes_asignar_cursos,
		_id_actividades_cursos
	);
};

module.exports.notas_finales_parcial_periodo_curso = async ({
	_id_anos_lectivoss,
	_id_docentess,
	_id_dacss,
	_id_periodoss,
	_id_parcialess,
}) => {
	return exec(
		db,
		"lista_notas_finales_parcial_periodo_curso",
		_id_anos_lectivoss,
		_id_docentess,
		_id_dacss,
		_id_periodoss,
		_id_parcialess
	);
};
module.exports.notas_finales_estudiante = async ({
	_id_estudiantess,
	_id_anos_lectivoss,
	_id_periodoss,
	_id_parcialess,
}) => {
	return exec(
		db,
		"lista_notas_finales_estudiante",
		_id_estudiantess,
		_id_anos_lectivoss,
		_id_periodoss,
		_id_parcialess
	);
};
module.exports.notas_actividades = async ({
	_id_estudiantess,
	_id_anos_lectivoss,
	_id_periodoss,
	_id_parcialess,
}) => {
	return exec(
		db,
		"lista_notas_actividades",
		_id_estudiantess,
		_id_anos_lectivoss,
		_id_periodoss,
		_id_parcialess
	);
};
module.exports.notas_quimestrales_estudiante = async ({
	_id_estudiantess,
	_id_anos_lectivoss,
	_id_periodoss,
}) =>
	exec(
		db,
		"lista_notas_quimestrales_estudiante",
		_id_estudiantess,
		_id_anos_lectivoss,
		_id_periodoss
	);

module.exports.notas_finales_quimestral = async ({
	_id_anos_lectivoss,
	_id_docentess,
	_id_dacss,
	_id_periodoss,
}) =>
	exec(
		db,
		"lista_notas_finales_quimestral",
		_id_anos_lectivoss,
		_id_docentess,
		_id_dacss,
		_id_periodoss
	);

module.exports.estudiantes_periodo_libreta = async ({
	_id_estudiantess,
	_id_anos_lectivoss,

	_id_periodoss,
}) =>
	exec(
		db,
		"consultar_estudiantes_periodo_libreta",
		_id_estudiantess,
		_id_anos_lectivoss,

		_id_periodoss
	);

module.exports.estudiantes_parcial_libreta = async ({
	_id_estudiantess,
	_id_anos_lectivoss,
	_id_periodoss,
	_id_parcialess,
}) =>
	exec(
		db,
		"consultar_estudiantes_parcial_libreta",
		_id_estudiantess,
		_id_anos_lectivoss,
		_id_periodoss,
		_id_parcialess
	);

module.exports.dre = async (id) => {
	return exec(db, "catalogo_dre", id);
};

module.exports.dac_etiqueta = async (_id_dac) => {
	return exec(db, "consultar_dac_etiqueta", _id_dac);
};

module.exports.docentes_anos = async (id) => {
	return exec(db, "catalogo_docentes_anos", id);
};
module.exports.estu_ano = async (id) => {
	return exec(db, "catalogo_estu_ano", id);
};
/*
module.exports.docentes= async () => {
	return exec(db, 'catalogo_docentes');
	
}*/
module.exports.periodos = async (id) => {
	return exec(db, "catalogo_dre_periodo", id);
};

module.exports.parciales = async (id) => {
	return exec(db, "catalogo_dre_parcial", id);
};

module.exports.ano_estud = async (id) => {
	return exec(db, "catalogo_ano_estud", id);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_docente_asignar_cursos", id);
};
