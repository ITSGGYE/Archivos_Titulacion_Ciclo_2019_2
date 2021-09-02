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
	_id_ctlg_profesiones,
	_id_ctlg_generos,
	_correo,
	_direccion,
	_telefonos,
	//_id_perfiles,
	_contrasena,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_docentes",
			_nombres,
			_apellidos,
			_id_ctlg_tipos_documentos,
			_numero_documento,
			_id_ctlg_profesiones,
			_id_ctlg_generos,
			_correo,
			_direccion,
			_telefonos,
			//_id_perfiles,
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
		id_ctlg_profesioness,
		correoss,
		direccionss,
		telefonoss,
	}
) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_docentes",
			ids,
			nombress,
			apellidoss,
			numero_documentoss,
			id_ctlg_profesioness,
			correoss,
			direccionss,
			telefonoss
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_docentes");
};

module.exports.catalogar = async () => {
	return exec(db, "catalogo_docentes");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_docente", id);
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_docentes", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
