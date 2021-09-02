const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/dre/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dre(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/docentes_anos/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.docentes_anos(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/estu_ano/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.estu_ano(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/ano_estud/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.ano_estud(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/parciales/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.parciales(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/dac_etiqueta/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dac_etiqueta(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/periodos/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.periodos(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/dac_ano", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.dac_ano(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/estudiantes_periodo_libreta", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.estudiantes_periodo_libreta(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/estudiantes_parcial_libreta", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.estudiantes_parcial_libreta(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

/*
app.get('/dac/:id', async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.dac(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});*/
app.get("/estu", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.estu(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/notas_finales_parcial_periodo_curso", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.notas_finales_parcial_periodo_curso(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/notas_finales_estudiante", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.notas_finales_estudiante(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/notas_actividades", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.notas_actividades(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/notas_quimestrales_estudiante", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.notas_quimestrales_estudiante(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/notas_finales_quimestral", async (req, res) => {
	try {
		//await validations.id(req.params.id);
		var r = await repository.notas_finales_quimestral(req.query);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/docentes", async (req, res) => {
	try {
		var r = await repository.docentes();
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
});
/*
app.delete("/elim/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.elim(req.params.id, req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});*/

module.exports = app;
