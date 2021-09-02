const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/jornadas_anos_cursos", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.jornadas_anos_cursos(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/jornadas_inscripciones", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.jornadas_inscripciones(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/inscripciones_cedula", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.inscripciones_cedula(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/cursos_inscripcion", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.cursos_inscripcion(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.consultar(req.params.id);
		res.done(r[0]);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/", async (req, res) => {
	try {
		var r = await repository.listar();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/ctlg/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.catalogar(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/inscripciones_jornadas/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.inscripciones_jornadas(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

/*
app.get('/jornadas_inscripciones/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.jornadas_inscripciones(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});*/

app.get("/inscripciones_cursos/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.inscripciones_cursos(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/cursos_inscripciones/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.cursos_inscripciones(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.post("/", async (req, res) => {
	try {
		var r = await repository.crear(req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.put("/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.actualizar(req.params.id, req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
/*
app.put("/elim/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.elim(req.params.id, req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});*/

app.delete("/elim/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.elim(req.params.id, req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/ctlg", async (req, res) => {
	try {
		var r = await repository.ctlg_catalogar();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

module.exports = app;
