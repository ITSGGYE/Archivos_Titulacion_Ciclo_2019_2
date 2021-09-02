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
	_id_paralelos_aulas,
}) => {
	return db.transaction((trx) =>
		execTrx(
			trx,
			"crear_matriculaciones",
			_id_estudiantes,
			_id_cursos,
			_id_anos_lectivos,
			_id_jornadas,
			_id_paralelos_aulas
		)
			.then(trx.commit)
			.catch(trx.rollback)
	);
};

module.exports.actualizar = async (ids, { id_paralelos_aulass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_matriculaciones", ids, id_paralelos_aulass)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_matriculaciones");
};

module.exports.matri_paralelos_aulas = async ({ anoss, cursoss }) => {
	return exec(db, "catalogo_matri_paralelos_aulas", anoss, cursoss);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_matriculas", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
/*
module.exports.matriculados_estudiantes = async ({
	id_paralelos_aulasss,
	id_anos_lectivosss,
	id_jornadasss,
	id_cursosss,
}) => {
	return db.transaction((trx) => {
		var paralelos_aulasss = [];
		_.forEach(id_paralelos_aulasss, (paralelos_aulass) => {
			paralelos_aulasss.push(
				execTrx(
					trx,
					"lista_matriculados_estudiantes",
					paralelos_aulass,
					id_anos_lectivosss,
					id_jornadasss,
					id_cursosss
				)
			);
		});

		return Promise.all(paralelos_aulasss)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};*/

module.exports.matriculados_estudiantes = async ({
	id_anos_lectivosss,
	id_jornadasss,
	id_cursosss,
	id_paralelos_aulasss,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"lista_matriculados_estudiantes",
			id_anos_lectivosss,
			id_jornadasss,
			id_cursosss,
			id_paralelos_aulasss
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
/*
module.exports.catalogar = async (id) => {
	return exec(db, 'catalogo_matriculaciones',id);
	
}*/
/*
module.exports.inscripciones_jornadas = async (id) => {
	return exec(db, 'catalogo_inscripciones_jornadas',id);
	
}

module.exports.inscripciones_cursos = async (id) => {
	return exec(db, 'catalogo_inscripciones_cursos',id);
	
}


module.exports.jornadas_inscripciones = async (id) => {
	return exec(db, 'catalogo_jornadas_inscripciones',id);
	
}


module.exports.cursos_inscripciones = async (id) => {
	return exec(db, 'catalogo_cursos_inscripciones',id);
	
}*/

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_matricula", id);
};

module.exports.ctlg_catal = async (id_paralelos_aulasss) => {
	return exec(db, "catalogo_cur_paralelos_aulas_copy1", id_paralelos_aulasss);
};
