const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_ctlg_jornadas, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		var id_ctlg_jornadas = [];
		_.forEach(_id_ctlg_jornadas, (id_ctlg_jornada) => {
			id_ctlg_jornadas.push(
				execTrx(trx, "jornadas", id_ctlg_jornada, _id_anos_lectivos)
			);
		});

		return Promise.all(id_ctlg_jornadas)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_jornadas", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*
module.exports.crear = async ({_id_ctlg_jornadas, _id_anos_lectivos}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'jornadas', _id_ctlg_jornadas, _id_anos_lectivos)*/
/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
/*.then(trx.commit)
		.catch(trx.rollback)
	});
}*/
/*
module.exports.crear = async ({_nombre}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_jornadas', _nombre)*/
/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
/*	.then(trx.commit)
		.catch(trx.rollback)
	});
}*/

module.exports.actualizar = async (ids, { id_ctlg_jornadass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_jornadas", ids, id_ctlg_jornadass)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_jornadas");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_jornadas", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_jornadas");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_jornada", id);
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
