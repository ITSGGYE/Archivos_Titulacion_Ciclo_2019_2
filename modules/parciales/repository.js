const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_periodos, _id_ctlg_parciales }) => {
	return db.transaction((trx) => {
		var id_periodos = [];
		var id_ctlg_parciales = [];
		_.forEach(_id_periodos, (id_periodo) => {
			_.forEach(_id_ctlg_parciales, (id_ctlg_parcial) => {
				(id_periodos, id_ctlg_parciales).push(
					execTrx(trx, "parciales", id_periodo, id_ctlg_parcial)
				);
			});
		});

		return Promise.all(id_periodos, id_ctlg_parciales)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { id_ctlg_parcialess }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_parciales", ids, id_ctlg_parcialess)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_parciales");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_parciales", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_parciales");
};
module.exports.ctlg_par = async (id) => {
	return exec(db, "catalogo_ctlg_par", id);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_parcial", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_parciales", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*
module.exports.validar = async (correo,contrasena) => {
	await validations.correo(correo);
	await validations.contrasena(contrasena);

	var usuario = await db('usuarios as u').where({
		'u.correo': _.trim(_.toLower(correo))
	}).whereNull('u.deleted_at').first().select('*', db.raw("CONCAT(u.nombres,' ', u.apellidos) as 'nombre_completo'"));

	if (!passwordHash.verify(contrasena, usuario.contrasena)) throw new Error("Error de correo y/o contraseña");

	return _.omit(usuario, ['contrasena']);


}*/
