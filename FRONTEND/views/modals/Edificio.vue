<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Edificio</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model="form._nombre"
						label="Nombre"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>
					<q-input
						v-model="form._direccion"
						label="Dirección"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
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
					_nombre: "",
					_direccion: "",
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));
			this.init();
		},
		methods: {
			guardar() {
				if (
					this.form._nombre !== null &&
					this.form._nombre !== "" &&
					this.form._direccion !== null &&
					this.form._direccion !== ""
				) {
					this.$q.loading.show();
					_.rpost("edificios", null, this.form)
						.then((r) => {
							this.close();

							this.$parent.listaEdificios();
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
