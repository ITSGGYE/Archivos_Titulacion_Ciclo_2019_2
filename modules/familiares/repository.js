const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

/*module.exports.crearr = async ({ _id_estudiantes }) => {
	return db.transaction((trx) => {
		var id_estudiantes = [];
		_.forEach(_id_estudiantes, (id_estudiante) => {
			id_estudiantes.push(
				execTrx(trx, "crear_familiares_estudiantes", id_estudiante)
			);
		});

		return Promise.all(id_estudiantes).then(trx.commit).catch(trx.rollback);
	});
};*/
module.exports.crearr = async ({ _id_estudiantes, _id_familiares }) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_familiares_estudiantes",
			_id_estudiantes,
			_id_familiares
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.prueba = async ({
	_nombres,
	_apellidos,
	_id_ctlg_tipos_documentos,
	_numero_documento,
	_id_ctlg_profesiones,
	_correo,
	_id_ctlg_parentescos,
	_direccion,
	_telefono,
	_celular,
	_id_ctlg_estados_civil,
	_lugar_trabajo,
	_direccion_trabajo,
	_id_ctlg_cantones,

	_telefono_trabajo,
	_cargo,
	_id_estudiantes,
}) => {
	return db.transaction((trx) => {
		var id_estudiantes = [];
		_.forEach(_id_estudiantes, (id_estudiante) => {
			id_estudiantes.push(
				execTrx(
					trx,
					"crear_fa",
					_nombres,
					_apellidos,
					_id_ctlg_tipos_documentos,
					_numero_documento,
					_id_ctlg_profesiones,
					_correo,
					_id_ctlg_parentescos,
					_direccion,
					_telefono,
					_celular,
					_id_ctlg_estados_civil,
					_lugar_trabajo,
					_direccion_trabajo,
					_id_ctlg_cantones,
					_telefono_trabajo,
					_cargo,
					id_estudiante
				)
			);
		});
		return Promise.all(id_estudiantes).then(trx.commit).catch(trx.rollback);
	});
};
module.exports.crear = async ({
	_nombres,
	_apellidos,
	_id_ctlg_tipos_documentos,
	_numero_documento,
	_id_ctlg_profesiones,
	_correo,
	_id_ctlg_parentescos,
	_direccion,
	_telefono,
	_celular,
	_id_ctlg_estados_civil,
	_lugar_trabajo,
	_direccion_trabajo,
	_id_ctlg_cantones,

	_telefono_trabajo,
	_cargo,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_familiares",
			_nombres,
			_apellidos,
			_id_ctlg_tipos_documentos,
			_numero_documento,
			_id_ctlg_profesiones,
			_correo,
			_id_ctlg_parentescos,
			_direccion,
			_telefono,
			_celular,
			_id_ctlg_estados_civil,
			_lugar_trabajo,
			_direccion_trabajo,
			_id_ctlg_cantones,
			_telefono_trabajo,
			_cargo
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
		id_ctlg_parentescoss,
		direccionss,
		telefonoss,
		celularss,
		id_ctlg_estados_civilss,
		lugar_trabajoss,
		direccion_trabajoss,
		id_ctlg_cantoness,
		telefono_trabajoss,
		cargoss,
		estudiantess,
		idef,
	}
) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"actualizar_familiares",
			ids,
			nombress,
			apellidoss,
			numero_documentoss,
			id_ctlg_profesioness,
			correoss,
			id_ctlg_parentescoss,
			direccionss,
			telefonoss,
			celularss,
			id_ctlg_estados_civilss,
			lugar_trabajoss,
			direccion_trabajoss,
			id_ctlg_cantoness,
			telefono_trabajoss,
			cargoss,
			estudiantess,
			idef
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_familiares", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_familiares");
};

module.exports.catalogar = async () => {
	return exec(db, "catalogo_familiares");
};
module.exports.familiarescedula = async ({ _cedula }) => {
	return exec(db, "catalogo_familiares_cedula", _cedula);
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_familiar", id);
};

module.exports.familiares_estudiantes = async (id_estudiantes) => {
	return exec(db, "catalogo_familiares_estudiantes", id_estudiantes);
};
