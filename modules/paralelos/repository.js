const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crearr = async ({ _id_paralelos, _id_jornadas }) => {
	return db.transaction((trx) => {
		var id_paralelos = [];
		var id_jornadas = [];
		_.forEach(_id_paralelos, (id_paralelo) => {
			_.forEach(_id_jornadas, (id_jornada) => {
				(id_paralelos, id_jornadas).push(
					execTrx(
						trx,
						"crear_paralelos_jornadas",
						id_paralelo,
						id_jornada
					)
				);
			});
		});

		return Promise.all(id_paralelos, id_jornadas)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.crear = async ({ _nombre, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		execTrx(trx, "crear_paralelos", _nombre, _id_anos_lectivos)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { nombress }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_paralelos", ids, nombress)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_paralelos");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_paralelos_jornadas", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_paralelos");
};

module.exports.ano = async (id) => {
	return exec(db, "catalogo_paralelos_anos", id);
};

module.exports.elim = async (ida) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_paralelos", ida)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_paralelo", id);
};
