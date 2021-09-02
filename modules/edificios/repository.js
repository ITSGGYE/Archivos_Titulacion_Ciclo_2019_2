const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _nombre, _direccion }) => {
	return db.transaction((trx) => {
		execTrx(trx, "crear_edificios", _nombre, _direccion)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.crearr = async ({ _id_edificios, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		var id_edificios = [];
		_.forEach(_id_edificios, (id_edificio) => {
			id_edificios.push(
				execTrx(
					trx,
					"crear_edificios_anos_lectivos",
					id_edificio,
					_id_anos_lectivos
				)
			);
		});

		return Promise.all(id_edificios).then(trx.commit).catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { nombress }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_edificios", ids, nombress)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ida) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_edificios", ida)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_edificios");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_edificio", id);
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_edificios_anos_lectivos", id);
};

module.exports.edificios = async () => {
	return exec(db, "catalogo_edificios");
};
