<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Matriculación</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="estudiantes()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_estudiantes"
						@input="cursos(), jornadas()"
						:options="options.estudiantes"
						label="Estudiante"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_jornadas"
						:options="options.jornadas"
						label="Jornadas"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_cursos"
						@input="paralelos_aulas()"
						:options="options.cursos"
						label="Cursos"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_paralelos_aulas"
						:options="options.paralelos_aulas"
						label="Paralelo - Aula"
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
					_id_paralelos_aulas: "",
				},

				options: {
					anos_lectivos: [],
					jornadas: [],
					estudiantes: [],
					cursos: [],
					paralelos_aulas: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				this.anos_lectivos(),
				//this.estudiantes()
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
			estudiantes() {
				this.form._id_estudiantes = "";

				return _.rget(
					`inscripciones/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.estudiantes = r.data;
				});
			},

			/*jornadas(){
				this.form._id_jornadas="";
				return _.rget(`inscripciones/jornadas_inscripciones/${this.form._id_estudiantes}`).then((r)=>{
					this.options.jornadas = r.data;
				});
			},*/

			jornadas() {
				return _.rget(`inscripciones/jornadas_inscripciones`, {
					_id_estudiante: this.form._id_estudiantes,
					_id_anos_lectivos: this.form._id_anos_lectivos,
				}).then((r) => {
					this.options.jornadas = r.data;
				});
			},

			cursos() {
				return _.rget(`inscripciones/cursos_inscripcion`, {
					_id_estudiante: this.form._id_estudiantes,
					_id_anos_lectivos: this.form._id_anos_lectivos,
				}).then((r) => {
					this.options.cursos = r.data;
				});
			},

			/*
			cursos(){
				this.form._id_cursos="";
					return _.rget(`inscripciones/cursos_inscripciones/${this.form._id_estudiantes}`).then((r)=>{
					this.options.cursos = r.data;
				});
			},*/
			paralelos_aulas() {
				this.form._id_paralelos_aulas = "";
				return _.rget(
					`docentes_asignar_cursos/cur_paralelos_aulas/${this.form._id_cursos}`
				).then((r) => {
					this.options.paralelos_aulas = r.data;
				});
			},

			guardar() {
				this.$q.loading.show();
				_.rpost("matriculaciones", null, this.form)
					.then((r) => {
						this.close();
						this.$parent.listaMatriculaciones();
						this.$q.notify({
							type: "positive",
							message: "Guardada con exito",
						});
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al guardar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},
		},
	};
</script>
