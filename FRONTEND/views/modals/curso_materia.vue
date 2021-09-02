<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Asignar materia a un curso</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="materias(), cursos()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_cursos"
						:options="options.cursos"
						label="Cursos"
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
					></q-select>
					<q-select
						v-model="form._id_materias"
						:options="options.materias"
						label="Materias"
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
					_id_cursos: null,
					_id_materias: null,
				},

				options: {
					anos_lectivos: [],
					cursos: [],
					materias: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				this.anos_lectivos(),
				this.cursos(),
				this.materias(),
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
			cursos() {
				this.form._id_cursos = null;
				this.form._id_materias = null;
				return _.rget(
					`cursos/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.cursos = r.data;
				});
			},
			materias() {
				this.form._id_cursos = null;
				this.form._id_materias = null;
				return _.rget(
					`materias/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.materias = r.data;
				});
			},

			guardar() {
				if (
					this.form._id_cursos !== null &&
					this.form._id_cursos !== "" &&
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					this.form._id_materias !== null &&
					this.form._id_materias !== ""
				) {
					this.$q.loading.show();
					_.rpost("cursos_materias", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaCursosMaterias();
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
