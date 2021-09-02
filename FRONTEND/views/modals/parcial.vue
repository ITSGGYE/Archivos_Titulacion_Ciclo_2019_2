<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Parcial</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-select
						v-model="form._id_anos_lectivos"
						@input="periodos()"
						:options="options.anos_lectivos"
						label="Año Lectivo"
						emit-value
						map-options
					>
					</q-select>

					<q-select
						v-model="form._id_periodos"
						:options="options.periodos"
						label="Periodos"
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
						v-model="form._id_ctlg_parciales"
						:options="options.parciales"
						label="Parciales"
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
					_id_periodos: null,
					_id_ctlg_parciales: null,

					/*_id_anos_lectivos:1*/
				},

				options: {
					anos_lectivos: [],
					periodos: [],
					parciales: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.estados(),
				this.anos_lectivos(),

				this.parciales(),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			/*estados(){
				return _.rget("usuarios/estados").then((r)=>{
					this.options.estados = r.data;
				});
			},*/

			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},
			periodos() {
				return _.rget(
					`periodos/ctlg/${this.form._id_anos_lectivos}`
				).then((r) => {
					this.options.periodos = r.data;
				});
			},

			parciales() {
				return _.rget("parciales/ctlg").then((r) => {
					this.options.parciales = r.data;
				});
			},
			guardar() {
				if (
					this.form._id_ctlg_parciales !== null &&
					this.form._id_ctlg_parciales !== "" &&
					this.form._id_periodos !== null &&
					this.form._id_periodos !== "" &&
					this.form._id_anos_lectivos !== null &&
					this.form._id_anos_lectivos !== ""
				) {
					this.$q.loading.show();
					_.rpost("parciales", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaParciales();
							this.$q.notify({
								type: "positive",
								message: "Guardado con exito",
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
