const app = require("express").Router();

app.use("/seguridad", require("../modules/seguridad").router);
app.use("/usuarios", require("../modules/usuarios").router);
app.use("/anos_lectivos", require("../modules/anos_lectivos").router);
app.use("/anos_lectivos_dir", require("../modules/anos_lectivos").router);
app.use("/jornadas", require("../modules/jornadas").router);
app.use("/periodos", require("../modules/periodos").router);
app.use("/parciales", require("../modules/parciales").router);
app.use("/insumos", require("../modules/insumos").router);
app.use("/edificios", require("../modules/edificios").router);
app.use("/aulas", require("../modules/aulas").router);
app.use("/paralelos", require("../modules/paralelos").router);
app.use("/materias", require("../modules/materias").router);
app.use("/ctlg_materias", require("../modules/materias").router);
app.use("/cursos", require("../modules/cursos").router);
app.use("/cursos_materias", require("../modules/cursos_materias").router);
app.use(
	"/cursos_paralelos_aulas",
	require("../modules/cursos_paralelos_aulas").router
);
app.use("/catalogos", require("../modules/catalogos").router);
app.use("/docentes", require("../modules/docentes").router);
app.use(
	"/docentes_jornadas_materias",
	require("../modules/docentes_jornadas_materias").router
);
app.use(
	"/docentes_asignar_cursos",
	require("../modules/docentes_asignar_cursos").router
);
app.use("/estudiantes", require("../modules/estudiantes").router);
app.use("/est_information", require("../modules/estudiantes").router);
app.use("/familiares", require("../modules/familiares").router);
//app.use("/rr", require("../modules/familiares").router);
app.use("/inscripciones", require("../modules/inscripciones").router);
app.use("/matriculaciones", require("../modules/matriculaciones").router);
app.use("/actividades_cursos", require("../modules/actividades_cursos").router);
app.use(
	"/actividades_cursos_est",
	require("../modules/actividades_cursos").router
);
app.use("/notas", require("../modules/notas").router);
app.use("/reportes", require("../modules/reportes").router);
app.use("/notas_secretarias", require("../modules/notas").router);
app.use("/libretas", require("../modules/notas").router);
app.use("/libretas_doc", require("../modules/notas").router);
app.use("/libretas_est", require("../modules/notas").router);

module.exports = app;
