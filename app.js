const dotenv = require("dotenv").config();
const env = process.env;
const path = require("path");
const express = require("express");
const bodyParser = require("body-parser");
const passwordHash = require("password-hash");
const cors = require("cors");
const _ = require("lodash");
const exphbs = require("express-handlebars");
const response = require("./utils/response");

const seguridad = require("./modules/seguridad");

var app = express();

app.use(cors());
app.use(express.json());
app.use(
	express.urlencoded({
		extended: true,
	})
);

app.use(express.static(path.join(__dirname, "public")));
app.engine(
	".hbs",
	exphbs({
		extname: ".hbs",
	})
);
app.set("view engine", ".hbs");
app.use((req, res, next) => {
	res.done = _.bind(response.done, {}, res);
	res.fail = _.bind(response.fail, {}, res);
	res.rawRes = _.bind(response.raw, {}, res);
	next();
});

app.post("/login", async (req, res) => {
	try {
		var r = await seguridad.repository.iniciar_sesion(req.body);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.use("/api", require("./routes/api"));

app.get("/", async (req, res, next) => {
	res.render("index", {
		layout: false,
		APP_NAME: env.APP_NAME,
		APP_LANG: env.APP_LANG,
	});
});

app.use((req, res, next) => {
	res.fail(404, new Error("Ups, lo que buscas no existe"));
});

app.use((err, req, res, next) => {
	res.fail(500, err);
	console.error(err.stack);
});

app.listen(env.APP_PORT, () => {
	console.log(`open http://localhost:${env.APP_PORT}`);
});

module.exports = app;
