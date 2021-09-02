<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Representante - Estudiante</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model="form._cedulas"
						label="Nùmero de Documento del Representante"
						@input="cedula_representado()"
						autofocus
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>

					<q-input
						v-show="form.nombre_representante != ''"
						v-model="form.nombre_representante"
						label="Representante"
						readonly
					></q-input>

					<q-input
						v-model="form._cedulass"
						label="Nùmero de Documento del Estudiante"
						@input="cedula_estudiante()"
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
					_id_estudiantes: "",
					_id_familiares: "",
					nombre_representante: "",
					nombre_estudiante: "",
					_cedulas: "",
					_cedulass: "",
				},

				options: {
					estudiantes: [],

					familiares: [],
					cedula_estudiante: [],
					cedula_representado: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([this.estudiantes()]).then((v) => {
				this.init();
			});
		},
		methods: {
			estudiantes() {
				return _.rget("estudiantes/ctlg").then((r) => {
					this.options.estudiantes = r.data;
				});
			},

			cedula_representado() {
				this.form.nombre_representante = "";
				return _.rget("familiares/familiarescedula", {
					_cedula: this.form._cedulas,
				}).then((r) => {
					//this.options.cedula = r.data;
					if (r.data.length > 0) {
						this.form.nombre_representante = r.data[0].label;
						this.form._id_familiares = r.data[0].value;
					}
				});
			},

			cedula_estudiante() {
				this.form.nombre_estudiante = "";
				return _.rget("estudiantes/estudiantecedula", {
					_cedula: this.form._cedulass,
				}).then((r) => {
					//this.options.cedula = r.data;
					if (r.data.length > 0) {
						this.form.nombre_estudiante = r.data[0].label;
						this.form._id_estudiantes = r.data[0].value;
					}
				});
			},

			guardar() {
				if (
					this.form._id_estudiantes !== null &&
					this.form._id_estudiantes !== "" &&
					this.form._id_familiares !== null &&
					this.form._id_familiares !== ""
				) {
					this.$q.loading.show();
					_.rpost(
						`familiares/crearr`,
						null,
						_.omit(this.form, [
							"nombre_estudiante, nombre_representante",
						])
					)
						.then((r) => {
							this.close();
							this.$parent.listaFamiliares();
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
