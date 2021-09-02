<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Materia</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_ctlg_materias"
						:options="options.materias"
						label="Asignaturas"
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
					>
					</q-select>
					<q-select
						v-model="form._id_anos_lectivos"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					>
					</q-select>
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
					_id_ctlg_materias: null,
					_id_anos_lectivos: "",
				},

				options: {
					materias: [],
					anos_lectivos: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([this.materias(), this.anos_lectivos()]).then((v) => {
				this.init();
			});
		},
		methods: {
			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},
			materias() {
				return _.rget("materias/ctlg").then((r) => {
					this.options.materias = r.data;
				});
			},

			guardar() {
				if (
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					this.form._id_ctlg_materias !== null &&
					this.form._id_ctlg_materias !== ""
				) {
					this.$q.loading.show();
					_.rpost("materias", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaMaterias();
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
