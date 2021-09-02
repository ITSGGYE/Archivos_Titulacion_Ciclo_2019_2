const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _nombre }) => {
	return db.transaction((trx) => {
		execTrx(trx, "crear_ano_lectivo", _nombre)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { nombress }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_anos_lectivos", ids, nombress)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.zorro = async (ids, { _id_ctlg_estados }) => {
	return db.transaction((trx) => {
		execTrx(trx, "catalogo_zorro", ids, _id_ctlg_estados)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_ano_lectivo");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_ano_lectivo", id);
};

module.exports.catalogar = async () => {
	return exec(db, "catalogo_anos_lectivos");
};

module.exports.anos_lectivosreport = async () => {
	return exec(db, "catalogo_anos_lectivosreport");
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_anos_lectivos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
