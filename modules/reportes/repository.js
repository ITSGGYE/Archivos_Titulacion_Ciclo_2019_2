const passwordHash = require('password-hash');
const _ = require('lodash');

const {helpers,db} = require('../../utils');


const {
	wrapperValidations,
	exec,
	execTrx
} = helpers;

const validations = wrapperValidations(require('./validations'));

module.exports.crear = async ({ _id_matriculas ,
	_id_actividades_cursos,
	_valor 
	}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'crear_notas',_id_matriculas ,
		_id_actividades_cursos,
		_valor 
		)
		.then(trx.commit)
		.catch(trx.rollback)
	});
}

module.exports.actualizar = async (id,{ _notas   , 
		
	}) =>{
	return db.transaction((trx)=> {
		execTrx(trx,'actualizar_docentes_asignar_cursos',id, _notas  , 
		
		   
	  )
		.then(trx.commit)
		.catch(trx.rollback)
	});
}


module.exports.listar = async () => {
	return exec(db, 'lista_docentes_asignar_cursos');
}


module.exports.dac = async (id) => {
	return exec(db, 'catalogo_dac',id);
	
}

module.exports.estu = async ({_id_docentes_asignar_cursos,_id_actividades_cursos}) => {
	return exec(db, 'catalogo_estu',_id_docentes_asignar_cursos,_id_actividades_cursos);
	
}
module.exports.repot = async ({_id_docentes_asignar_cursos,_id_insumos}) => {
	return exec(db, 'catalogo_repot',_id_docentes_asignar_cursos,_id_insumos);
	
}

module.exports.dre = async (id) => {
	return exec(db, 'catalogo_dre',id);
	
}

module.exports.practica = async (id) => {
	return exec(db, 'catalogo_practica',id);
	
}
module.exports.docentes_anos = async (id) => {
	return exec(db, 'catalogo_docentes_anos',id);
	
}

module.exports.docentes= async () => {
	return exec(db, 'catalogo_docentes');
	
}



module.exports.consultar = async (id) => {
	await validations.id(id);
	return exec(db, 'consultar_docente_asignar_cursos', id);
}


