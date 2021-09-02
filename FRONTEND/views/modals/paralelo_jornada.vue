<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Paralelo-Jornada</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="paralelos(), jornadas()"
						:options="options.anos_lectivos"
						label="Año lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_paralelos"
						:options="options.paralelos"
						label="Paralelos"
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
						v-model="form._id_jornadas"
						:options="options.jornadas"
						label="jornadas"
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
					<!--<q-select disable v-model="form.id_ctlg_estados" :options="options.estados" label="Estado" emit-value map-options></q-select>
					-->
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
					_id_paralelos: null,
					_id_jornadas: null,
				},
				options: {
					anos_lectivos: [],
					paralelos: [],
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
			estados() {
				return _.rget("paralelos/estados").then((r) => {
					this.options.estados = r.data;
				});
			},

			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},
			paralelos() {
				this.form._id_paralelos = null;
				return _.rget(
					`paralelos/ano/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.paralelos = r.data;
				});
			},
			jornadas() {
				this.form._id_jornadas = null;
				return _.rget(
					`jornadas/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.jornadas = r.data;
				});
			},
			guardar() {
				if (
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					this.form._id_paralelos !== null &&
					this.form._id_paralelos !== "" &&
					this.form._id_jornadas !== null &&
					this.form._id_jornadas !== ""
				) {
					this.$q.loading.show();
					_.rpost(`paralelos/crearr`, null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaParalelos();
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
