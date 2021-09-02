<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Asignar docente al curso</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="jornadas()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_jornadas"
						@input="cursos(), docentes()"
						:options="options.jornadas"
						label="Jornadas"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_cursos"
						@input="materias(), paralelos_aulas()"
						:options="options.cursos"
						label="Cursos"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_materias"
						@input="docentes()"
						:options="options.materias"
						label="Materias"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_docentes"
						:options="options.docentes"
						label="Docentes"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_paralelos_aulas"
						:options="options.paralelos_aulas"
						label="Paralelos - Aulas"
						use-input
						use-input
						multiple
						map-options
						emit-value
						option-value="value"
						option-label="label"
						use-chips
						stack-label
						input-debounce="0"
						:rules="[(val) => !!val || '* Requerido']"
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
					_id_materias: "",
					_id_cursos: "",
					_id_docentes: "",
					_id_paralelos_aulas: null,
				},

				options: {
					anos_lectivos: [],
					jornadas: [],
					materias: [],
					docentes: [],
					cursos: [],

					paralelos_aulas: [],
				},
			};
		},
		created() {
			//_.merge(this.form,_.get(this,'formOld',{}));

			Promise.all([
				this.anos_lectivos(),
				//this.jornadas(),
				//this.materias(),
				//this.docentes(),
				//	this.cursos(),
				//this.aulas(),
				//this.paralelos()
			]).then((v) => {
				this.init();
			});
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
			materias() {
				this.form._id_materias = "";

				return _.rget(
					`cursos_materias/ctlg/${this.form._id_cursos}`
				).then((r) => {
					this.options.materias = r.data;
				});
			},
			docentes() {
				this.form._id_docentes = "";

				return _.rget("docentes_asignar_cursos/doc_jornadas_materias", {
					jornadass: this.form._id_jornadas,
					materiass: this.form._id_materias,
				}).then((r) => {
					this.options.docentes = r.data;
				});
			},
			paralelos_aulas() {
				this.form._id_paralelos_aulas = null;
				return _.rget(
					`docentes_asignar_cursos/cur_paralelos_aulas/${this.form._id_cursos}`
				).then((r) => {
					this.options.paralelos_aulas = r.data;
				});
			},

			guardar() {
				if (
					///faltakfgerlhglryrt.-
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					this.form._id_jornadas !== null &&
					this.form._id_jornadas !== "" &&
					this.form._id_materias !== null &&
					this.form._id_materias !== "" &&
					this.form._id_cursos !== null &&
					this.form._id_cursos !== "" &&
					this.form._id_docentes !== null &&
					this.form._id_docentes !== "" &&
					this.form._id_paralelos_aulas !== null &&
					this.form._id_paralelos_aulas !== ""
				) {
					this.$q.loading.show();
					_.rpost("docentes_asignar_cursos", null, {
						_id_docentes: this.form._id_docentes,
						_id_paralelos_aulas: this.form._id_paralelos_aulas,
					})
						.then((r) => {
							this.close();
							this.$parent.listaDocentesCursos();
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
						message: r.message || "Llene todos los campos",
					});
				}
			},
		},
	};
</script>
