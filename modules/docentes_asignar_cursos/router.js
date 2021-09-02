const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/docentes_asignar_jornada", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.docentes_asignar_jornada(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/doc_jornadas_materias", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.doc_jornadas_materias(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/doc_jorna_mate", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.doc_jorna_mate(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/docentes_asignar_curso/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_curso(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/cur_paralelos_aulas/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.cur_paralelos_aulas(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/docentes_asignar_ano/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_ano(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/docentes_asignar_anoreporte/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_anoreporte(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/docentes_asignar_aula/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_aula(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

/*
app.get('/docentes_asignar_jornada/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_jornada(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});*/
app.get("/docentes_asignar_paralelo/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_paralelo(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/docentes_asignar_materia/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_asignar_materia(req.params.id);
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
}); /*
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

module.exports = app;
