<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Inscripción</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model="form._cedulas"
						label="Nùmero de Documento"
						@input="cedula()"
						autofocus
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>

					<q-input
						v-show="form.nombre_estudiante != ''"
						v-model="form.nombre_estudiante"
						label="Estudiante"
						readonly
					></q-input>

					<q-select
						v-show="form.nombre_estudiante != ''"
						v-model="form._id_familiares"
						:options="options.familiares"
						label="Representante"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_anos_lectivos"
						@input="jornadas()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_jornadas"
						@input="cursos()"
						:options="options.jornadas"
						label="Jornadas"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_cursos"
						:options="options.cursos"
						label="Cursos"
						emit-value
						map-options
					></q-select>
				</q-form>
			</q-card-section>

			<q-card-actions align="right">
				<q-btn color="primary" @click="guardar">Guardar</q-btn>
				<q-btn flat v-close-popup>cancelar</q-btn>
			</q-card-actions>
		</q-card>
	</q-dialog>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					_id_anos_lectivos: "",
					_id_jornadas: "",
					_id_cursos: "",
					_id_estudiantes: "",
					_id_familiares: "",
					nombre_estudiante: "",
					_cedulas: "",
				},

				options: {
					anos_lectivos: [],
					jornadas: [],
					estudiantes: [],
					cursos: [],
					familiares: [],
					cedula: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([this.anos_lectivos(), this.estudiantes()]).then(
				(v) => {
					this.init();
				}
			);
		},
		methods: {
			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},
			jornadas() {
				this.form._id_jornadas = "";
				return _.rget(
					`jornadas/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.jornadas = r.data;
				});
			},
			cursos() {
				this.form._id_cursos = "";
				return _.rget(
					`catalogos/cursos_jornadas/${this.form._id_jornadas}`
				).then((r) => {
					this.options.cursos = r.data;
				});
			},
			estudiantes() {
				return _.rget("estudiantes/ctlg").then((r) => {
					this.options.estudiantes = r.data;
				});
			},

			cedula() {
				this.form.nombre_estudiante = "";
				return _.rget("estudiantes/estudiantecedula", {
					_cedula: this.form._cedulas,
				}).then((r) => {
					//this.options.cedula = r.data;
					if (r.data.length > 0) {
						this.form.nombre_estudiante = r.data[0].label;
						this.form._id_estudiantes = r.data[0].value;
						return this.familiares();
					}
				});
			},

			familiares() {
				this.form._id_familiares = "";
				return _.rget(
					`familiares/familiares_estudiantes/${this.form._id_estudiantes}`
				).then((r) => {
					this.options.familiares = r.data;
				});
			},

			guardar() {
				if (
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					this.form._id_jornadas !== null &&
					this.form._id_jornadas !== "" &&
					this.form._id_cursos !== null &&
					this.form._id_cursos !== "" &&
					this.form._id_estudiantes !== null &&
					this.form._id_estudiantes !== "" &&
					this.form._id_familiares !== null &&
					this.form._id_familiares !== ""
				) {
					this.$q.loading.show();
					_.rpost(
						"inscripciones",
						null,
						_.omit(this.form, ["nombre_estudiante"])
					)
						.then((r) => {
							this.close();
							this.$parent.listaInscripciones();
							this.$q.notify({
								type: "positive",
								message: "Guardada con exito",
							});
						})
						.catch((r) => {
							this.$q.notify({
								type: "negative",
								message:
									r.message || "Hubo un error al guardar",
							});
						})
						.finally(() => {
							this.$q.loading.hide();
						});
				} else {
					this.$q.notify({
						type: "negative",
						message: "no se puede guardar",
					});
				}
			},
		},
	};
</script>
