const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(
	require("./validations")
); /*_id_edificios,
	_id_ctlg_aulas,
}) => {
	return db.transaction((trx) => {
		execTrx(
			trx,
			"crear_aulas",
			_nombre,*/ /*_id_edificios,
			_id_ctlg_aulas
		)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};*/

/*module.exports.crear = async ({
	_nombre,/*
	/*_capacidad,*/ /*_capacidad,*/ module.exports.crear = async ({
	_id_ctlg_aulas,
	_id_edificios,
	_id_anos_lectivos,
}) => {
	return db.transaction((trx) => {
		var id_ctlg_aulas = [];
		_.forEach(_id_ctlg_aulas, (id_ctlg_aula) => {
			id_ctlg_aulas.push(
				execTrx(
					trx,
					"crear_aulas",
					id_ctlg_aula,
					_id_edificios,
					_id_anos_lectivos
				)
			);
		});

		return Promise.all(id_ctlg_aulas)
			.then(trx.commit)

			.catch(trx.rollback);
	});
};

module.exports.crearr = async ({ _id_aulas, _id_jornadas }) => {
	return db.transaction((trx) => {
		var id_aulas = [];
		var id_jornadas = [];
		_.forEach(_id_aulas, (id_aula) => {
			_.forEach(_id_jornadas, (id_jornada) => {
				(id_aulas, id_jornadas).push(
					execTrx(trx, "crear_aulas_jornadas", id_aula, id_jornada)
				);
			});
		});

		return Promise.all(id_aulas, id_jornadas)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar = async (ida, { id_ctlg_aulass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_aulas", ida, id_ctlg_aulass)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ida) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_aulas", ida)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_aulas");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_aulas_jornadas", id);
};

module.exports.catalogo_aulas_anos = async ({ _id_anos_lectivos }) => {
	return exec(db, "catalogo_aulas_anos", _id_anos_lectivos);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_aulas");
};

module.exports.ctlg_aulas = async () => {
	return exec(db, "consultar_ctlg_aulas");
};

module.exports.aulas = async (id) => {
	return exec(db, "catalogo_aulas_anos_lectivos", id);
};

/*module.exports.jornadas = async (body) => {
	return exec(db, 'catalogo_jornadas_de',body);
	
}*/

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_aula", id);
};
