const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const validations = helpers.wrapperValidations(require("./validations"));

app.get("/", async (req, res) => {
	res.send("seguridad");
});

app.put("/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.guardar_contrasena(req.params.id, req.body);
		res.done(r, "Contraseña actualizada con exito");
	} catch (err) {
		res.fail(400, err);
	}
});

module.exports = app;
