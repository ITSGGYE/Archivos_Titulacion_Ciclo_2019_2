<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Estudiante</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model.trim="form._nombres"
						label="Nombres"
						@input="crear_email()"
						:rules="[(val) => !!val || '* Requerido']"
					></q-input>

					<q-input
						v-model.trim="form._apellidos"
						label="Apellidos"
						@input="crear_email()"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<q-select
						v-model="form._id_ctlg_tipos_documentos"
						:options="options.tipos_documentos"
						label="Tipo de documento"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-input
						v-model.trim="form._numero_documento"
						label="Número de documento"
						type="number"
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<q-select
						v-model="form._id_ctlg_genero"
						:options="options.generos"
						label="Genero"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-input
						v-model="form._correo"
						label="Correo"
						type="email"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<!--<q-input v-model="form._pruebas" label="prueba"></q-input>-->
					<q-input
						v-model.trim="form._direccion"
						label="Dirección"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<q-input
						v-model="form._telefono"
						label="Telefono de Emergencia"
						type="tel"
						mask=" ### - ####"
					></q-input>
					<q-input
						v-model="form._celular"
						label="Celular de Emergencia"
						type="tel"
						mask=" ##-########"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<q-select
						v-model="form._id_ctlg_paises"
						:options="options.paises"
						label="País de Nacimiento"
						emit-value
						map-options
						lazy-rules
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-input
						v-model="form._fecha_nacimiento"
						label="Fecha de Nacimiento"
						type="date"
						stack-label
						lazy-rules
						:rules="[(val) => !!val || '* Requerido']"
					></q-input>

					<q-select
						v-model="form._id_ctlg_provincias"
						@input="cantones()"
						:options="options.provincias"
						label="Provincia de Residencia"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_ctlg_cantones"
						@input="parroquias()"
						:options="options.cantones"
						label="Cantón de Residencia"
						emit-value
						map-options
						lazy-rules
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_ctlg_parroquias"
						:options="options.parroquias"
						label="Parroquia de Residencia"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_ctlg_tipos_sangre"
						:options="options.tipos_sangre"
						label="Tipo de Sangre"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<q-select
						v-model="form._id_ctlg_parentescos"
						:options="options.parentescos"
						label="Con quién vive"
						emit-value
						map-options
						:rules="[(val) => !!val || '* Requerido']"
					></q-select>
					<!--<q-select
						v-model="form._id_perfiles"
						:options="options.perfiles"
						label="Perfil"
						emit-value
						map-options
					></q-select>-->
					<q-input
						v-model="form._observacion"
						label="Observación"
						type="textarea"
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
					_nombres: "",
					_apellidos: "",
					_id_ctlg_tipos_documentos: "",
					_numero_documento: "",
					_id_ctlg_genero: "",
					_correo: "",
					_direccion: "",
					_telefono: "",
					_celular: "",
					//_pruebas: "",
					_id_ctlg_paises: "",
					_id_ctlg_provincias: "",
					_id_ctlg_parroquias: "",
					_id_ctlg_cantones: "",
					_fecha_nacimiento: "",
					_id_ctlg_tipos_sangre: "",
					_id_ctlg_parentescos: "",
					//_id_perfiles: "",
					_observacion: "",
					_contrasena: "",
				},

				options: {
					tipos_documentos: [],
					generos: [],
					paises: [],
					provincias: [],
					parroquias: [],
					cantones: [],
					tipos_sangre: [],
					//perfiles: [],
					parentescos: [],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.estados(),
				this.tipos_documentos(),
				this.generos(),
				this.paises(),
				this.provincias(),
				this.perfiles(),
				//this.parroquias (),
				//this.cantones	(),
				this.tipos_sangre(),
				this.parentescos(),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			perfiles() {
				return _.rget("usuarios/perfiles").then((r) => {
					this.options.perfiles = r.data;
				});
			},

			paises() {
				return _.rget("catalogos/paises").then((r) => {
					this.options.paises = r.data;
				});
			},
			tipos_documentos() {
				return _.rget("catalogos/tipos_documentos").then((r) => {
					this.options.tipos_documentos = r.data;
				});
			},

			generos() {
				return _.rget("catalogos/generos").then((r) => {
					this.options.generos = r.data;
				});
			},
			provincias() {
				return _.rget("catalogos/provincias").then((r) => {
					this.options.provincias = r.data;
				});
			},
			parroquias() {
				return _.rget(
					`catalogos/provincias_parroquias/${this.form._id_ctlg_cantones}`
				).then((r) => {
					this.options.parroquias = r.data;
				});
			},
			cantones() {
				return _.rget(
					`catalogos/provincias_cantones/${this.form._id_ctlg_provincias}`
				).then((r) => {
					this.options.cantones = r.data;
				});
			},
			tipos_sangre() {
				return _.rget("catalogos/tipos_sangre").then((r) => {
					this.options.tipos_sangre = r.data;
				});
			},
			parentescos() {
				return _.rget("catalogos/parentescos").then((r) => {
					this.options.parentescos = r.data;
				});
			},

			validEmail: function (_correo) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(_correo);
			},

			crear_email() {
				no = this.form._nombres.split(" ", 3);
				ap = this.form._apellidos.split(" ", 3);
				ere = "";
				for (i = 0; i < no.length; i++) {
					ere += no[i].charAt(0);
				}
				mu = `${ere}${ap[0]}@${this.CONFIG.APP_NAME}.com`.toLocaleLowerCase();

				this.form._correo = mu;

				return this.form._correo;
			},

			guardar() {
				this.form._contrasena =
					"$2a$10$lEriprPBGkW/BBEksEaWuOdXY4moVgngZ7S.OFbCr3T1hm7UuzwGO";
				if (
					this.form._nombres !== null &&
					this.form._nombres !== "" &&
					this.form._apellidos !== null &&
					this.form._apellidos !== "" &&
					this.form._celular !== null &&
					this.form._celular !== "" &&
					this.form._id_ctlg_genero !== null &&
					this.form._id_ctlg_genero !== "" &&
					this.form._correo !== null &&
					this.form._correo !== "" &&
					this.form._id_ctlg_parentescos !== null &&
					this.form._id_ctlg_parentescos !== "" &&
					this.form._id_ctlg_tipos_documentos !== null &&
					this.form._id_ctlg_tipos_documentos !== "" &&
					this.form._numero_documento !== null &&
					this.form._numero_documento !== "" &&
					this.form._direccion !== null &&
					this.form._direccion !== "" &&
					this.form._id_ctlg_paises !== null &&
					this.form._id_ctlg_paises !== "" &&
					this.form._id_ctlg_provincias !== null &&
					this.form._id_ctlg_provincias !== "" &&
					this.form._id_ctlg_parroquias !== null &&
					this.form._id_ctlg_parroquias !== "" &&
					this.form._id_ctlg_cantones !== null &&
					this.form._id_ctlg_cantones !== "" &&
					this.form._fecha_nacimiento !== null &&
					this.form._fecha_nacimiento !== "" &&
					this.form._id_ctlg_tipos_sangre !== null &&
					this.form._id_ctlg_tipos_sangre !== ""
				) {
					if (this.validEmail(this.form._correo)) {
						if (this.form._id_ctlg_tipos_documentos == 1) {
							var cedula = this.form._numero_documento;

							if (cedula.length == 10) {
								var digito_region = cedula.substring(0, 2);

								if (digito_region >= 1 && digito_region <= 24) {
									var ultimo_digito = cedula.substring(9, 10);
									var pares =
										parseInt(cedula.substring(1, 2)) +
										parseInt(cedula.substring(3, 4)) +
										parseInt(cedula.substring(5, 6)) +
										parseInt(cedula.substring(7, 8));
									var numero1 = cedula.substring(0, 1);
									var numero1 = numero1 * 2;

									if (numero1 > 9) {
										var numero1 = numero1 - 9;
									}
									var numero3 = cedula.substring(2, 3);
									var numero3 = numero3 * 2;

									if (numero3 > 9) {
										var numero3 = numero3 - 9;
									}

									var numero5 = cedula.substring(4, 5);
									var numero5 = numero5 * 2;

									if (numero5 > 9) {
										var numero5 = numero5 - 9;
									}

									var numero7 = cedula.substring(6, 7);
									var numero7 = numero7 * 2;

									if (numero7 > 9) {
										var numero7 = numero7 - 9;
									}

									var numero9 = cedula.substring(8, 9);
									var numero9 = numero9 * 2;

									if (numero9 > 9) {
										var numero9 = numero9 - 9;
									}

									var impares =
										numero1 +
										numero3 +
										numero5 +
										numero7 +
										numero9;
									var suma_total = pares + impares;
									var primer_digito_suma = String(
										suma_total
									).substring(0, 1);
									var decena =
										(parseInt(primer_digito_suma) + 1) * 10;
									var digito_validador = decena - suma_total;

									if (digito_validador == 10)
										var digito_validador = 0;

									if (digito_validador == ultimo_digito) {
										this.$q.loading.show();
										_.rpost("estudiantes", null, this.form)
											.then((r) => {
												this.close();
												this.$parent.listaEstudiantes();
												this.$q.notify({
													type: "positive",
													message:
														"Guardada con exito",
												});
											})
											.catch((r) => {
												this.$q.notify({
													type: "negative",
													message:
														r.message ||
														"Hubo un error al guardar",
												});
											})
											.finally(() => {
												this.$q.loading.hide();
											});
									} else {
										this.$q.notify({
											type: "negative",
											message: "la cedula es incorrecta",
										});
									}
								} else {
									this.$q.notify({
										type: "negative",
										message:
											"Esta cedula no pertenece a ninguna region",
									});
								}
							} else {
								this.$q.notify({
									type: "negative",
									message:
										"Esta cedula tiene menos de 10 Digitos",
								});
							}
						} else {
							this.$q.loading.show();
							_.rpost("estudiantes", null, this.form)
								.then((r) => {
									this.close();
									this.$parent.listaEstudiantes();
									this.$q.notify({
										type: "positive",
										message: "Guardada con exito",
									});
								})
								.catch((r) => {
									this.$q.notify({
										type: "negative",
										message:
											r.message ||
											"Hubo un error al guardar",
									});
								})
								.finally(() => {
									this.$q.loading.hide();
								});
						}
					} else {
						this.$q.notify({
							type: "negative",
							message: "correo invalido",
						});
					}
				} else {
					this.$q.notify({
						type: "negative",
						message: "LLene los campos vacios",
					});
				}
			},
		},
	};
</script>
