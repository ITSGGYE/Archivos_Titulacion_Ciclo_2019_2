<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Aula</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<!--	<q-input
						v-model.number="form._nombre"
						type="number"
						label="Nombre"
						:rules="[(val) => !!val || '* Requerido']"
					></q-input>-->
					<!--<q-input
						v-model="form._capacidad"
						label="Capacidad"
						type="number"
						:min="0"
					></q-input>-->
					<q-select
						v-model="form._id_ctlg_aulas"
						:options="options.aulas"
						label="Aulas"
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
					<!--<q-select
						v-model="form._id_ctlg_aulas"
						:options="options.aulas"
						label="Aulas"
						emit-value
						map-options
					></q-select>-->
					<q-select
						v-model="form._id_anos_lectivos"
						@input="edificios()"
						:options="options.anos_lectivos"
						label="Año lectivo"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_edificios"
						:options="options.edificios"
						label="Edificio"
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
					//_nombre: "",
					//_capacidad: "",
					_id_anos_lectivos: "",
					_id_edificios: "",
					_id_ctlg_aulas: null,

					//id_ctlg_estados:1
				},

				options: {
					anos_lectivos: [],
					edificios: [],
					aulas: [],

					//	estados:[]
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.estados(),
				this.aulas(),
				this.anos_lectivos(),
				//this.estados()
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			estados() {
				return _.rget("aulas/estados").then((r) => {
					this.options.estados = r.data;
				});
			},

			aulas() {
				return _.rget("aulas/ctlg_aulas").then((r) => {
					this.options.aulas = r.data;
				});
			},

			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},

			edificios() {
				this.form._id_edificios = "";
				return _.rget(
					`edificios/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.edificios = r.data;
				});
			},
			guardar() {
				if (
					this.form._id_edificios !== null &&
					this.form._id_edificios !== "" &&
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== "" &&
					//this.form._nombre !== null &&
					//this.form._nombre !== "" &&
					this.form._id_ctlg_aulas !== null &&
					this.form._id_ctlg_aulas !== ""
					//this.form._capacidad !== null &&
				) {
					this.$q.loading.show();
					_.rpost("aulas", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaAulas();
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
