<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Asignar Actividad al curso</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<!--<q-select v-model="form._id_docentes" @input="anos_lectivos(),materias(),jornadas()" :options="options.docentes" label="Docentes" emit-value map-options></q-select>
					-->
					<q-select
						v-model="form._id_anos_lectivos"
						@input="jornadas(), insumos()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					></q-select>

					<q-select
						v-model="form._id_jornadas"
						@input="dac()"
						:options="options.jornadas"
						label="Jornadas"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_dac"
						:options="options.dac"
						label="Cursos - Aula/Paralelo - Materia"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_insumos"
						:options="options.insumos"
						label="Periodo - Parciales - Insumos"
						emit-value
						map-options
					></q-select>

					<q-input
						v-model="form._descripciones"
						label="Descripción"
						lazy-rules
						:rules="[
							(val) =>
								(val && val.length > 0) ||
								'Please type something',
						]"
					></q-input>
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
					_id_dac: "",
					_id_docentes: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_insumos: "",
					_descripciones: "",
				},

				options: {
					anos_lectivos: [],
					jornadas: [],
					dac: [],
					docentes: [],
					insumos: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.docentes(),
				this.anos_lectivos(
					this.$root.currentPage.app.informacion.id_docentes
				),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			docentes() {
				return _.rget("docentes/ctlg").then((r) => {
					this.options.docentes = r.data;
				});
			},

			anos_lectivos(id_docentes) {
				return _.rget(
					`docentes_asignar_cursos/docentes_asignar_ano/${id_docentes}`
				).then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},

			jornadas() {
				this.form._id_jornadas = "";
				return _.rget(`actividades_cursos/docentes_asignar_jornada`, {
					_id_docente: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_anos_lectivo: this.form._id_anos_lectivos,
				}).then((r) => {
					this.options.jornadas = r.data;
				});
			},

			dac() {
				this.form._id_dac = "";
				return _.rget(`actividades_cursos/dac_actividad_curso`, {
					_id_docente: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_anos_lectivo: this.form._id_anos_lectivos,
					_id_jornada: this.form._id_jornadas,
				}).then((r) => {
					this.options.dac = r.data;
				});
			},

			/*
			jornadas(id_docentes){
				return _.rget(`docentes_asignar_cursos/docentes_asignar_jornada/${id_docentes}`).then((r)=>{
					this.options.jornadas = r.data;				});
			},

			dac(id_docentes){
					this.form._id_dac="";
	
				return _.rget(`actividades_cursos/dac/${id_docentes}`).then((r)=>{//13
					this.options.dac = r.data;
				});
			},*/
			insumos() {
				this.form._id_insumos = "";
				return _.rget(
					`actividades_cursos/insumos_dac/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.insumos = r.data;
				});
			},

			guardar() {
				this.$q.loading.show();
				_.rpost("actividades_cursos", null, {
					_id_dac: this.form._id_dac,
					_id_insumos: this.form._id_insumos,
					_descripciones: this.form._descripciones,
				})
					.then((r) => {
						this.close();
						this.$parent.listaActividadesCursos(
							this.$root.currentPage.app.informacion.id_docentes
						);
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
