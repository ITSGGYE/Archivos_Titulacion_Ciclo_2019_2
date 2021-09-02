const app = require("express").Router();
const { helpers } = require("../../utils");
const repository = require("./repository");
const path = require("path");
const validations = helpers.wrapperValidations(require("./validations"));
var xl = require("excel4node");
var _ = require("lodash");
var moment = require("moment");

app.get("/ctlg/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.catalogar(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/cursos_jornadas/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.cursos_jornadas(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/cantones", async (req, res) => {
	try {
		var r = await repository.ctlg_cantones();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/provincias_cantones/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.provincias_cantones(req.params.id);
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/parroquias", async (req, res) => {
	try {
		var r = await repository.ctlg_parroquias();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/provincias_parroquias/:id", async (req, res) => {
	try {
		await validations.id(req.params.id);
		var r = await repository.provincias_parroquias(req.params.id);
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

app.get("/estados_civil", async (req, res) => {
	try {
		var r = await repository.ctlg_estados_civil();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/generos", async (req, res) => {
	try {
		var r = await repository.ctlg_generos();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/paises", async (req, res) => {
	try {
		var r = await repository.ctlg_paises();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/parentescos", async (req, res) => {
	try {
		var r = await repository.ctlg_parentescos();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/profesiones", async (req, res) => {
	try {
		var r = await repository.ctlg_profesiones();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/provincias", async (req, res) => {
	try {
		var r = await repository.ctlg_provincias();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/tipos_documentos", async (req, res) => {
	try {
		var r = await repository.ctlg_tipos_documentos();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.get("/tipos_sangre", async (req, res) => {
	try {
		var r = await repository.ctlg_tipos_sangre();
		res.done(r);
	} catch (err) {
		res.fail(400, err);
	}
});

app.post("/report", async (req, res) => {
	var s = req.body;
	var wb = new xl.Workbook({
		workbookView: { showSheetTabs: false },
		author: "Stefania Antepara",
	});
	var ws = wb.addWorksheet(s.name, {
		sheetProtection: {
			//password: "666",
		},
		sheetView: {
			showGridLines: false,
		},
		sheetFormat: {
			baseColWidth: 27, // Defaults to 10. Specifies the number of characters of the maximum digit width of the normal style's font. This value does not include margin padding or extra padding for gridlines. It is only the number of characters.,
			defaultColWidth: 27,
		},
	});

	var titleStyle = wb.createStyle({
		font: {
			color: "#000000",
			size: 13,
			bold: true,
		},
		alignment: {
			wrapText: true,
			horizontal: "center",
		},
		fill: {
			type: "pattern",
			patternType: "solid",
			fgColor: "f4f4f4",
		},
	});

	var thStyle = wb.createStyle({
		font: {
			color: "#000000",
			size: 12,
			bold: true,
		},
		alignment: {
			wrapText: true,
			horizontal: "center",
			shrinkToFit: true,
		},
		fill: {
			type: "pattern",
			patternType: "solid",
			fgColor: "f4f4f4",
		},
		border: {
			left: {
				style: "thin",
				color: "eaeaea",
			},
			right: {
				style: "thin",
				color: "eaeaea",
			},
			top: {
				style: "thin",
				color: "eaeaea",
			},
			bottom: {
				style: "thin",
				color: "eaeaea",
			},
			outline: false,
		},
	});
	var style = wb.createStyle({
		alignment: {
			horizontal: "center",
		},
		font: {
			color: "#000000",
			size: 13,
			bold: true,
		},
		numberFormat: "$#,##0.00; ($#,##0.00); -",
		dateFormat: "m/d/yy hh:mm:ss",
	});

	var y = 1;
	/*ws.cell(y, 1, y, s.cols.length, true).string(s.title).style(titleStyle);
	y++;
	y++;
	ws.cell(y, 1, y, s.cols.length, true)
		.string(s.subtitle)
		.style(titleStyle)
		.style({
			font: {
				size: 12,
			},
			alignment: {
				horizontal: "left",
			},
		});

	y++;
	y++;*/

	ws.row(y + 3).freeze();

	_.forEach(s.cols, (v, x) => {
		ws.cell(y + 3, x + 1)
			.string(v[1])
			.style(thStyle);
	});

	var tdStyle = wb.createStyle({
		alignment: {
			horizontal: "center",
			wrapText: true,
		},
		font: {
			color: "#000000",
			size: 12,
		},
		fill: {
			type: "pattern",
			patternType: "solid",
			fgColor: "f4f4f4",
		},
		border: {
			left: {
				style: "thin",
				color: "eaeaea",
			},
			right: {
				style: "thin",
				color: "eaeaea",
			},
			top: {
				style: "thin",
				color: "eaeaea",
			},
			bottom: {
				style: "thin",
				color: "eaeaea",
			},
			outline: false,
		},
	});
	var tdStyle1 = wb.createStyle({
		alignment: {
			horizontal: "center",
			wrapText: true,
		},
		font: {
			color: "#000000",
			size: 12,
		},
		border: {
			left: {
				style: "thin",
				color: "eaeaea",
			},
			right: {
				style: "thin",
				color: "eaeaea",
			},
			top: {
				style: "thin",
				color: "eaeaea",
			},
			bottom: {
				style: "thin",
				color: "eaeaea",
			},
			outline: false,
		},
	});
	ws.cell(2, 1, 2, 6, true)
		.string("UNIDAD EDUCATIVA INTERAMERICANA # 385")
		.style(style);

	ws.cell(1, 1).string(moment().format("DD/MM/YYYY hh:mm:ss a"));

	_.forEach(s.data, (v, xx) => {
		y++;
		_.forEach(s.cols, (k, x) => {
			if (xx % 2 == 0) {
				ws.cell(y + 3, x + 1)
					.string(String(v[k[0]]))
					.style(tdStyle1);
			} else {
				ws.cell(y + 3, x + 1)
					.string(String(v[k[0]]))
					.style(tdStyle);
			}
		});
	});

	wb.write(`${s.name}.xlsx`, res);

	/*var s = req.body;

	var dd = s.data[0];

	var cols = _.map(s.cols, (i) => {
		return {
			caption: i[1],
			type: typeof dd[i[0]],
		};
	});

	var rows = _.map(s.data, (i) => {
		return _.transform(
			s.cols,
			(a, d) => {
				a.push(i[d[0]]);
			},
			[]
		);
	});

	var conf = {};
	conf.stylesXmlFile = "./styles.xml";
	conf.name = "Hoja1";
	conf.cols = cols;
	conf.rows = rows;
	var result = nodeExcel.execute(conf);
	res.setHeader("Content-Type", "application/vnd.openxmlformats");
	res.setHeader(
		"Content-Disposition",
		`attachment; filename= ${s.name}.xlsx`
	);
	res.end(result, "binary");*/
});

module.exports = app;
