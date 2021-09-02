const passwordHash = require('password-hash');
const _ = require('lodash');

const {helpers,db} = require('../../utils');


const {
	wrapperValidations,
	exec,
	execTrx
} = helpers;

const validations = wrapperValidations(require('./validations'));


module.exports.ctlg_cantones = async () => {
	return exec(db, 'catalogo_ctlg_cantones');
	
}

module.exports.ctlg_estados_civil = async () => {
	return exec(db, 'catalogo_ctlg_estados_civil');
	
}

module.exports.ctlg_generos = async () => {
	return exec(db, 'catalogo_ctlg_generos');
	
}

module.exports.ctlg_paises = async () => {
	return exec(db, 'catalogo_ctlg_paises');
	
}

module.exports.ctlg_parentescos = async () => {
	return exec(db, 'catalogo_ctlg_parentescos');
	
}

module.exports.ctlg_parroquias = async () => {
	return exec(db, 'catalogo_ctlg_parroquias');
	
}

module.exports.ctlg_profesiones = async () => {
	return exec(db, 'catalogo_ctlg_profesiones');
	
}

module.exports.ctlg_provincias = async () => {
	return exec(db, 'catalogo_ctlg_provincias');
	
}


module.exports.ctlg_tipos_documentos = async () => {
	return exec(db, 'catalogo_ctlg_tipos_documentos');
	
}


module.exports.ctlg_tipos_sangre = async () => {
	return exec(db, 'catalogo_ctlg_tipos_sangre');
	
}

module.exports.cursos_jornadas = async (id) => {
	return exec(db, 'catalogo_cursos_jornadas',id);
	
}


module.exports.provincias_cantones = async (id) => {
	return exec(db, 'catalogo_provincias_cantones',id);
	
}
module.exports.provincias_parroquias = async (id) => {
	return exec(db, 'catalogo_provincias_parroquias',id);
	
}

module.exports.catalogar = async (id) => {
	return exec(db, 'catalogo_cursos',id);
	
}

module.exports.ctlg_catalogar = async () => {
	return exec(db, 'catalogo_ctlg_cursos');
	
}








