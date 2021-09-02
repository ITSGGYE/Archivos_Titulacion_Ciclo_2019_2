const passwordHash = require("password-hash");
const bcrypt = require("bcryptjs");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	nombres,
	apellidos,
	correo,
	id_perfiles,
	_contrasena,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_usuarios",
			nombres,
			apellidos,
			correo,
			id_perfiles,
			_contrasena
		)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (
	ids,
	{ nombress, apellidoss, correoss, id_perfiless }
) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_usuarios",
			ids,
			nombress,
			apellidoss,
			correoss,
			id_perfiless
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*

module.exports.actualizar = async (id, { nombres }) => {
	return db.transaction((trx) => {
		execTrx(trx, "crear_usuarios", id, nombres)*/
/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
/*.then(trx.commit)
			.catch(trx.rollback);
	});
};*/

module.exports.zorro = async (ids, { _deleted_at }) => {
	return db.transaction((trx) => {
		execTrx(trx, "baja_usuarios", ids, _deleted_at)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_de_usuarios");
};

module.exports.perfiles = async () => {
	return exec(db, "catalogo_perfiles");
};

module.exports.todosperfiles = async () => {
	return exec(db, "catalogo_todos_perfiles");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_usuario", id);
};

module.exports.validar = async (correo, contrasena) => {
	//await validations.correo(correo);
	//await validations.contrasena(contrasena);

	var usuario = await db("usuarios as u")
		.where({
			"u.correo": _.trim(_.toLower(correo)),
		})
		.leftJoin("docentes as d", "d.id_usuarios", "u.id")
		.leftJoin("estudiantes as est", "est.id_usuarios", "u.id")
		.whereNull("u.deleted_at")
		.first()
		.select(
			"u.*",
			"d.id as id_docentes",
			"est.id as id_estudiantes",
			db.raw("CONCAT(u.nombres,' ', u.apellidos) as 'nombre_completo'")
		);

	if (_.isUndefined(usuario))
		throw new Error("Error de correo y/o contraseña");

	//if (!passwordHash.verify(contrasena, usuario.contrasena))
	//throw new Error("Error de correo y/o contraseña");

	//validar contrasena
	const contrasena_correcta = await bcrypt.compare(
		contrasena,
		usuario.contrasena
	);
	if (!contrasena_correcta) throw new Error("Error de correo y/o contraseña");

	return _.omit(usuario, ["contrasena"]);
};
