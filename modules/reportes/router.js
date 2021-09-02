const app = require("express").Router();
const {helpers} = require('../../utils');
const repository = require('./repository');
const validations=helpers.wrapperValidations(require('./validations'));


app.get('/dre/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dre(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get('/practica/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dre(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});


app.get('/docentes_anos/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_anos(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});


app.get('/dac/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dac(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get('/estu', async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.estu(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get('/repot', async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.repot(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});



app.get('/docentes', async (req, res) => {
	try {
		var r = await repository.docentes();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});



app.get('/ctlg', async (req, res) => {
	try {
		var r = await repository.ctlg_catalogar();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});



app.get('/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.consultar(req.params.id);
		res.done(r[0]);
	} catch (err) {
		res.fail(400, err);
	}
});


app.get('/', async (req, res) => {
	try {
		var r = await repository.listar();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});


app.post('/', async (req, res) => {
	try {
		var r = await repository.crear(req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.put('/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.actualizar(req.params.id,req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});






module.exports=app;