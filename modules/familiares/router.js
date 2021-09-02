const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/ctlg/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.catalogar(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/familiares_estudiantes/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.familiares_estudiantes(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/ctlg", async (req, res) => {
	try {
		var r = await repository.catalogar();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.get("/familiarescedula", async (req, res) => {
	try {
		//await validations.body(req.body);
		var r = await repository.familiarescedula(req.query);
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
app.post("/prueba", async (req, res) => {
	try {
		var r = await repository.prueba(req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});
app.post("/crearr", async (req, res) => {
	try {
		var r = await repository.crearr(req.body);
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

app.put('/elim/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.elim(req.params.id,req.body);
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
