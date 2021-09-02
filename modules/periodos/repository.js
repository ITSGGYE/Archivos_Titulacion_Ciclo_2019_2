const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_ctlg_periodos, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		var id_ctlg_periodos = [];
		_.forEach(_id_ctlg_periodos, (id_ctlg_periodo) => {
			id_ctlg_periodos.push(
				execTrx(trx, "periodos", id_ctlg_periodo, _id_anos_lectivos)
			);
		});

		return Promise.all(id_ctlg_periodos)
			.then(trx.commit)

			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ids, { id_ctlg_periodoss }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_periodos", ids, id_ctlg_periodoss)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_periodos");
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_periodos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_periodos", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_periodos");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_periodo", id);
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
