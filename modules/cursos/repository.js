const passwordHash = require("password-hash");
const _ = require("lodash");

const { helpers, db } = require("../../utils");

const { wrapperValidations, exec, execTrx } = helpers;

const validations = wrapperValidations(require("./validations"));

module.exports.crear = async ({ _id_ctlg_cursos, _id_anos_lectivos }) => {
	return db.transaction((trx) => {
		var id_ctlg_cursos = [];
		_.forEach(_id_ctlg_cursos, (id_ctlg_curso) => {
			id_ctlg_cursos.push(
				execTrx(trx, "crear_cursos", id_ctlg_curso, _id_anos_lectivos)
			);
		});

		return Promise.all(id_ctlg_cursos).then(trx.commit).catch(trx.rollback);
	});
};

/*

module.exports.crear = async ({_id_ctlg_cursos,_id_anos_lectivos}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_cursos', _id_ctlg_cursos,_id_anos_lectivos)
		.then(trx.commit)
		.catch(trx.rollback)
	});
}*/

module.exports.actualizar = async (ids, { id_ctlg_cursoss }) => {
	return db.transaction((trx) => {
		execTrx(trx, "actualizar_cursos", ids, id_ctlg_cursoss)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.listar = async () => {
	return exec(db, "lista_cursos");
};

module.exports.elim = async (ids) => {
	return db.transaction((trx) => {
		execTrx(trx, "eliminar_cursos", ids)
			.then(trx.commit)
			.catch(trx.rollback);
	});
};

module.exports.catalogar = async (id) => {
	return exec(db, "catalogo_cursos", id);
};

module.exports.ctlg_catalogar = async () => {
	return exec(db, "catalogo_ctlg_cursos");
};

module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, "consultar_curso", id);
};
