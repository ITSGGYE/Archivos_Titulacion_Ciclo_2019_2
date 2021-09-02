const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	_id_docentes,
	_id_jornadas,
	_id_materias,
	_id_anos_lectivos,
}) => {
	return db.transaction((trx) => {
		var id_docentes = [];
		var id_jornadas = [];
		var id_materias = [];

		_.forEach(_id_docentes, (id_docente) => {
			_.forEach(_id_jornadas, (id_jornada) => {
				_.forEach(_id_materias, (id_materia) => {
					(id_docentes, id_jornadas, id_materias).push(
						execTrx(
							trx,
							"crear_docentes_jornadas_materias",
							id_docente,
							id_jornada,
							id_materia,
							_id_anos_lectivos
						)
					);
				});
			});
		});

		return Promise.all(id_docentes, id_jornadas, id_materias)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*module.exports.crear = async ({_id_docentes ,
		_id_jornadas ,
		_id_materias ,
		_id_anos_lectivos 
	}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_docentes_jornadas_materias',_id_docentes ,
			_id_jornadas ,
			_id_materias ,
			_id_anos_lectivos 
		)
		.then(trx.commit)
		.catch(trx.rollback)
	});
}*/

module.exports.actualizar = async (ids, { jornadass, materiass }) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_docentes_jornadas_materias",
			ids,
			jornadass,
			materiass
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_docentes_jornadas_materias");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_docentes_jornadas_materias", id);
};

module.exports.docentes_materias = async (id) => {
	return exec(db, "catalogo_docentes_materias", id);
};

module.exports.materias_anos = async ({ materiasss }) => {
	return exec(db, "catalogo_materias_anos", materiasss);
};

module.exports.jornadas_anos = async ({ jornadasss }) => {
	return exec(db, "catalogo_jornadas_de", jornadasss);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_docente_jornada_materia", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_docentes_jornadas_materias", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
