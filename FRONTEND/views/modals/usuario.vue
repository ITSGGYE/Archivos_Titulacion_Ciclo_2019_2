<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Usuario</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model="form.nombres"
						label="Nombres"
						lazy-rules
						:rules="[
							(val) =>
								(val && val.length > 0) || 'Ingrese nombres',
						]"
					></q-input>
					<q-input
						v-model="form.apellidos"
						label="Apellidos"
						lazy-rules
						:rules="[
							(val) =>
								(val && val.length > 0) || 'Ingrese apellidos',
						]"
					></q-input>
					<q-input
						v-model="form.correo"
						label="Correo"
						lazy-rules
						:rules="[
							(val) =>
								(val && val.length > 0) || 'Ingrese correo',
						]"
					></q-input>

					<!--<q-select v-model="form.id_ctlg_estados" :options="options.estados" label="Estados" emit-value map-options></q-select>
										-->

					<q-select
						v-model="form.id_perfiles"
						:options="options.perfiles"
						label="Perfil"
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
					nombres: "",
					apellidos: "",
					correo: "",

					//id_ctlg_estados:1,
					id_perfiles: "",
					_contrasena: "",
				},

				options: {
					//estados:[],
					perfiles: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.estados(),
				this.perfiles(),
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
			perfiles() {
				return _.rget("usuarios/perfiles").then((r) => {
					this.options.perfiles = r.data;
				});
			},

			validEmail: function (correo) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(correo);
			},

			guardar() {
				this.form._contrasena =
					"$2a$10$lEriprPBGkW/BBEksEaWuOdXY4moVgngZ7S.OFbCr3T1hm7UuzwGO";
				if (this.validEmail(this.form.correo)) {
					this.$q.loading.show();
					_.rpost("usuarios", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaUsuarios();
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
						message: "correo invalido",
					});
				}
			},
		},
	};
</script>
