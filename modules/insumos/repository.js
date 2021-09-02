const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_ctlg_insumos, _id_parciales }) => {
	return db.transaction((trx) => {
		var id_ctlg_insumos = [];
		var id_parciales = [];
		_.forEach(_id_parciales, (id_parcial) => {
			_.forEach(_id_ctlg_insumos, (id_ctlg_insumo) => {
				(id_ctlg_insumos, id_parciales).push(
					execTrx(trx, "insumos", id_ctlg_insumo, id_parcial)
				);
			});
		});

		return Promise.all(id_ctlg_insumos, id_parciales)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

/*
module.exports.crear = async ({_id_ctlg_insumos ,_id_parciales}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'insumos', _id_ctlg_insumos,_id_parciales)*/
/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
/*.then(trx.commit)
		.catch(trx.rollback)
	});
}
*/
module.exports.actualizar = async (ids, { id_ctlg_insumoss }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_insumos", ids, id_ctlg_insumoss)
			/*.then((r)=>{
			console.log(r[0].id_jornadas)
			return execTrx(trx,'consultar_usuario',1)
		})*/
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_insumos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_insumos");
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_insumos", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_insumos");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_insumo", id);
};
