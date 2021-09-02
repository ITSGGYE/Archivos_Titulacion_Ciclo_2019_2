const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/perfiles", async (req, res) => {
	try {
		var r = await repository.perfiles();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/todosperfiles", async (req, res) => {
	try {
		var r = await repository.todosperfiles();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.put("/zorro/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.zorro(req.params.id, req.body);
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
});

app.put("/elim/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.elim(req.params.id, req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

module.exports = app;
