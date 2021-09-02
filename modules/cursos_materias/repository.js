const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_cursos, _id_materias }) => {
	return db.transaction((trx) => {
		var id_cursos = [];
		var id_materias = [];
		_.forEach(_id_cursos, (id_curso) => {
			_.forEach(_id_materias, (id_materia) => {
				(id_cursos, id_materias).push(
					execTrx(trx, "crear_cursos_materias", id_curso, id_materia)
				);
			});
		});

		return Promise.all(id_cursos, id_materias)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*
module.exports.crear = async ({_id_cursos ,_id_materias}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_cursos_materias', _id_cursos,_id_materias)
		.then(trx.commit)
		.catch(trx.rollback)
	});
}*/

module.exports.actualizar = async (ids, { materiass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_cursos_materias", ids, materiass)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_cursos_materias", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
module.exports.listar = async () => {
	return exec(db, "lista_cursos_materias");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_cursos_materias", id);
};

module.exports.materias_anos = async ({ ano_lectivo }) => {
	return exec(db, "catalogo_materias_anos", ano_lectivo);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_curso_materia", id);
};
