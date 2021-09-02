const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({
	_nombres,
	_apellidos,
	_id_ctlg_tipos_documentos,
	_numero_documento,
	_id_ctlg_genero,
	_correo,
	_direccion,
	_telefono,
	_celular,
	_id_ctlg_paises,
	_id_ctlg_provincias,
	_id_ctlg_parroquias,
	_id_ctlg_cantones,
	_fecha_nacimiento,

	_id_ctlg_tipos_sangre,
	_id_ctlg_parentescos,

	_observacion,
	_contrasena,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_estudiantes",
			_nombres,
			_apellidos,
			_id_ctlg_tipos_documentos,
			_numero_documento,
			_id_ctlg_genero,
			_correo,
			_direccion,
			_telefono,
			_celular,
			_id_ctlg_paises,
			_id_ctlg_provincias,
			_id_ctlg_parroquias,
			_id_ctlg_cantones,
			_fecha_nacimiento,

			_id_ctlg_tipos_sangre,
			_id_ctlg_parentescos,

			_observacion,
			_contrasena
		)
			.then(trx.commit)

			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (
	ids,
	{
		nombress,
		apellidoss,
		numero_documentoss,
		correoss,
		direccionss,
		telefonoss,
		celularss,
		observacionss,
	}
) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_estudiantes",
			ids,
			nombress,
			apellidoss,
			numero_documentoss,
			correoss,
			direccionss,
			telefonoss,
			celularss,
			observacionss
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_estudiantes");
};
/*
module.exports.info_est = async (_id_estudiantes) => {
	return exec(db, "catalogo_est_informacion", _id_estudiantes);
};*/

module.exports.info_est = async ({ _id_estudiantes }) => {
	return exec(db, "catalogo_est_informacion", _id_estudiantes);
};

module.exports.catalogar = async () => {
	return exec(db, "catalogo_estudiantes");
};
module.exports.estudiantecedula = async ({ _cedula }) => {
	return exec(db, "catalogo_estudiantes_cedula", _cedula);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_estudiante", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_estudiantes", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
