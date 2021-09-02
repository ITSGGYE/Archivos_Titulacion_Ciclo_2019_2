<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Curso-Paralelo</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="cursos(), jornadas()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_jornadas"
						@input="aulas(), paralelos()"
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
					<q-select
						v-model="form._id_paralelos"
						:options="options.paralelos"
						label="Paralelos"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_aulas"
						:options="options.aulas"
						label="Aulas"
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
					_id_cursos: "",
					_id_paralelos: "",
					_id_aulas: "",
					_id_jornadas: "",
				},

				options: {
					anos_lectivos: [],
					cursos: [],
					paralelos: [],
					aulas: [],
					jornadas: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([this.anos_lectivos()]).then((v) => {
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
				this.form._id_aulas = "";
				this.form._id_paralelos = "";

				return _.rget(
					`jornadas/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.jornadas = r.data;
				});
			},
			cursos() {
				return _.rget(
					`cursos/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.cursos = r.data;
				});
			},
			paralelos() {
				this.form._id_paralelos = "";

				return _.rget(`paralelos/ctlg/${this.form._id_jornadas}`).then(
					(r) => {
						this.options.paralelos = r.data;
					}
				);
			},

			aulas() {
				this.form._id_aulas = "";

				return _.rget(`aulas/ctlg/${this.form._id_jornadas}`).then(
					(r) => {
						this.options.aulas = r.data;
					}
				);
			},

			guardar() {
				this.$q.loading.show();
				_.rpost("cursos_paralelos_aulas", null, this.form)
					.then((r) => {
						this.close();
						this.$parent.listaCursosParalelos();
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
