const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_ctlg_materias, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		var id_ctlg_materias = [];
		_.forEach(_id_ctlg_materias, (id_ctlg_materia) => {
			id_ctlg_materias.push(
				execTrx(
					trx,
					"crear_materias",
					id_ctlg_materia,
					_id_anos_lectivos
				)
			);
		});

		return Promise.all(id_ctlg_materias)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.crear_ctlg_materias = async ({ _materias }) => {
	return db.transaction((trx) => {
		execTrx(trx, "crear_ctlg_materias", _materias)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.actualizar_ctlg_materias = async (ids, { nombress }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_ctlg_materias", ids, nombress)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*module.exports.crear = async ({_id_ctlg_materias, _id_anos_lectivos}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_materias', _id_ctlg_materias, _id_anos_lectivos)*/
/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
/*.then(trx.commit)
		.catch(trx.rollback)
	});
}*/

module.exports.actualizar = async (ids, { id_ctlg_materiass }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_materias", ids, id_ctlg_materiass)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_materias", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_materias");
};

module.exports.lista_ctlg_materias = async () => {
	return exec(db, "lista_ctlg_materias");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_materias", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_materias");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_materia", id);
};

module.exports.eliminar_ctlg_materias = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_ctlg_materias", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};
