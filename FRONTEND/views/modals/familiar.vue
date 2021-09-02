<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Representante</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<!--<q-select
						v-model="form._id_estudiantes"
						:options="options.estudiantes"
						label="Estudiante"
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
					></q-select>-->

					<q-input
						v-model="form._nombres"
						label="Nombres"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>
					<q-input
						v-model="form._apellidos"
						label="Apellidos"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>
					<q-select
						v-model="form._id_ctlg_tipos_documentos"
						:options="options.tipos_documentos"
						label="Tipo de documento"
						emit-value
						map-options
					></q-select>
					<q-input
						v-model="form._numero_documento"
						label="Número de documento"
						type="number"
					></q-input>
					<q-select
						v-model="form._id_ctlg_profesiones"
						:options="options.profesiones"
						label="Profesión"
						emit-value
						map-options
					></q-select>

					<q-select
						v-model="form._id_ctlg_generos"
						:options="options.generos"
						label="Genero"
						emit-value
						map-options
					></q-select>
					<q-select
						v-model="form._id_ctlg_parentescos"
						:options="options.parentescos"
						label="Parentesco"
						emit-value
						map-options
					></q-select>
					<q-input
						v-model="form._direccion"
						label="Dirección"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || 'Requerido',
						]"
					></q-input>

					<q-input
						v-model="form._telefono"
						label="Telefono"
						type="tel"
						mask=" ### - ####"
					></q-input>
					<q-input
						v-model="form._celular"
						label="Celular "
						type="tel"
						mask=" ##-########"
						lazy-rules
						:rules="[
							(val) => (val && val.length > 0) || '*Requerido',
						]"
					></q-input>
					<q-select
						v-model="form._id_ctlg_estados_civil"
						:options="options.estados_civil"
						label="Estados Civil"
						emit-value
						map-options
					></q-select>
					<q-input v-model="form._correo" label="Correo"></q-input>
					<q-input
						v-model="form._lugar_trabajo"
						label="Empresa que labora"
					></q-input>
					<q-input
						v-model="form._direccion_trabajo"
						label="Direccion Trabajo"
					></q-input>
					<q-select
						v-model="form._id_ctlg_cantones"
						:options="options.cantones"
						label="Cantón de Trabajo"
						emit-value
						map-options
					></q-select>
					<q-input
						v-model="form._telefono_trabajo"
						label="Telefono Trabajo"
						mask=" ### - ####"
					></q-input>
					<q-input
						v-model="form._cargo"
						label="Cargo que ocupa"
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
					_id_estudiantes: null,
					_nombres: "",
					_apellidos: "",
					_id_ctlg_tipos_documentos: "",
					_numero_documento: "",
					_id_ctlg_genero: "",
					_correo: "",
					_direccion: "",
					_telefono: "",
					_celular: "",
					_id_ctlg_profesiones: "",
					_id_ctlg_estados_civil: "",
					_id_ctlg_cantones: 225,
					_id_ctlg_parentescos: "",
					_lugar_trabajo: "",
					_direccion_trabajo: "",
					_telefono_trabajo: "",
					_cargo: "",
				},

				options: {
					tipos_documentos: [],
					generos: [],
					profesiones: [],
					estados_civil: [],
					estudiantes: [],
					cantones: [],
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
				this.profesiones(),
				this.estados_civil(),
				this.estudiantes(),
				this.cantones(),
				this.parentescos(),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			profesiones() {
				return _.rget("catalogos/profesiones").then((r) => {
					this.options.profesiones = r.data;
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
			estados_civil() {
				return _.rget("catalogos/estados_civil").then((r) => {
					this.options.estados_civil = r.data;
				});
			},
			estudiantes() {
				return _.rget("estudiantes/ctlg").then((r) => {
					this.options.estudiantes = r.data;
				});
			},
			cantones() {
				return _.rget("catalogos/cantones").then((r) => {
					this.options.cantones = r.data;
				});
			},

			parentescos() {
				return _.rget("catalogos/parentescos").then((r) => {
					this.options.parentescos = r.data;
				});
			},
			validEmail: function (_correo) {
				var re =
					/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(_correo);
			},
			guardar() {
				if (this.form._correo !== null && this.form._correo !== "") {
					if (this.validEmail(this.form._correo)) {
						if (
							this.form._nombres !== null &&
							this.form._nombres !== "" &&
							this.form._apellidos !== null &&
							this.form._apellidos !== "" &&
							this.form._celular !== null &&
							this.form._celular !== "" &&
							this.form._id_ctlg_profesiones !== null &&
							this.form._id_ctlg_profesiones !== "" &&
							this.form._id_ctlg_estados_civil !== null &&
							this.form._id_ctlg_estados_civil !== "" &&
							this.form._id_ctlg_parentescos !== null &&
							this.form._id_ctlg_parentescos !== "" &&
							this.form._id_ctlg_tipos_documentos !== null &&
							this.form._id_ctlg_tipos_documentos !== "" &&
							this.form._numero_documento !== null &&
							this.form._numero_documento !== ""
						) {
							if (this.form._id_ctlg_tipos_documentos == 1) {
								var cedula = this.form._numero_documento;

								if (cedula.length == 10) {
									var digito_region = cedula.substring(0, 2);

									if (
										digito_region >= 1 &&
										digito_region <= 24
									) {
										var ultimo_digito = cedula.substring(
											9,
											10
										);
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
											(parseInt(primer_digito_suma) + 1) *
											10;
										var digito_validador =
											decena - suma_total;

										if (digito_validador == 10)
											var digito_validador = 0;

										if (digito_validador == ultimo_digito) {
											this.$q.loading.show();
											_.rpost(
												"familiares",
												null,
												this.form
											)
												.then((r) => {
													//this.close();
													this.close();

													this.$parent.listaFamiliares();
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
												message:
													"la cedula es incorrecta",
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
								_.rpost("familiares", null, this.form)
									.then((r) => {
										//this.close();
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
								message: "no se puede guardar",
							});
						}
					} else {
						this.$q.notify({
							type: "negative",
							message: "correo invalido",
						});
					}
				} else {
					if (
						this.form._nombres !== null &&
						this.form._nombres !== "" &&
						this.form._apellidos !== null &&
						this.form._apellidos !== "" &&
						this.form._celular !== null &&
						this.form._celular !== "" &&
						this.form._id_ctlg_profesiones !== null &&
						this.form._id_ctlg_profesiones !== "" &&
						this.form._id_ctlg_estados_civil !== null &&
						this.form._id_ctlg_estados_civil !== "" &&
						this.form._id_ctlg_parentescos !== null &&
						this.form._id_ctlg_parentescos !== "" &&
						this.form._id_ctlg_tipos_documentos !== null &&
						this.form._id_ctlg_tipos_documentos !== "" &&
						this.form._numero_documento !== null &&
						this.form._numero_documento !== ""
					) {
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
										_.rpost("familiares", null, this.form)
											.then((r) => {
												//this.close();
												this.close();

												this.$parent.listaFamiliares();
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
							_.rpost("familiares", null, this.form)
								.then((r) => {
									//this.close();
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
							message: "no se puede guardar",
						});
					}
				}
			},
		},
	};
</script>
