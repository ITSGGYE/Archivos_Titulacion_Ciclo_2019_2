const _ = require("lodash");
const passwordHash = require("password-hash");
const bcrypt = require("bcryptjs");
const { helpers, db } = require("../../utils");
const validations = helpers.wrapperValidations(require("./validations"));
const { wrapperValidations, exec, execTrx } = helpers;
const usuarios = require("../usuarios");

module.exports.iniciar_sesion = async ({ correo, contrasena }) => {
	//await validations.correo(correo);
	await validations.contrasena(contrasena);

	var usuario = await usuarios.repository.validar(correo, contrasena);
	var menu = await this.menu(usuario.id_perfiles);

	return Promise.resolve({
		informacion: usuario,
		menu,
		autorizacion: helpers.makeToken(usuario, 60 * 60 * 24 * 360),
		//mesa: passwordHash.generate(),
	});
};

/*module.exports.guardar_contrasena = async (contrasena) => {
	const salt = bcrypt.genSalt(10);
	const generar_contrasena = bcrypt.hash(contrasena, salt);

	return generar_contrasena;
};
*/

module.exports.guardar_contrasena = async (ids, { contrasenass }) => {
	if (!/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contrasenass))
		throw new Error(`La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
	NO puede tener otros símbolos.`);
	const ddd = async (con) => {
		const salt = await bcrypt.genSalt(10);
		const generar_contrasena = await bcrypt.hash(con, salt);
		return generar_contrasena;
	};

	const nueva = await ddd(contrasenass);
	return exec(db, "actualizar_contrasena", ids, nueva);
};

module.exports.menu = async (id_perfil) => {
	await validations.id(id_perfil);
	return db("perfiles_opciones as po")
		.innerJoin3("perfiles", "p", "po.id_perfiles")
		.innerJoin3("opciones", "o", "po.id_opciones")
		.innerJoin3("organizaciones", "orz", "p.id_organizaciones")
		.innerJoin3("modulos", "m", "o.id_modulos")
		.select(
			"m.orden as orden_modulo",
			"o.nombre as opcion",
			"p.id as id_perfil",
			db.raw("? as opcion_activo", 0),
			"o.icono as icono_opcion",
			db.raw("? as modulo_activo", 0),
			"p.nombre as perfil",
			"o.id as id_opcion",
			"orz.id as id_organizacion",
			"m.icono as icono_modulo",
			"m.id as id_modulo",
			"orz.nombre as organizacion",
			"o.orden as orden_opcion",
			"m.nombre as modulo",
			"o.vista as vista"
		)
		.where("p.id", id_perfil)
		.whereNull("po.deleted_at");
};
