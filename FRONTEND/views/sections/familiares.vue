<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Representante"
			:data="familiares.data"
			:columns="familiares.columns"
			row-key="id"
			:filter="filter"
			:loading="familiares.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Representante"
						no-caps
						@click="nuevoFamiliar"
					></q-btn>
					<q-btn
						color="primary"
						icon-right="add"
						label="Representante - Estudiante"
						no-caps
						@click="nuevoEstudianteFamiliar"
					></q-btn>
					<q-btn color="teal" icon="save_alt" @click="excel">
						<q-tooltip> Exportar a Excel </q-tooltip>
					</q-btn>
					<q-input
						filled
						borderless
						dense
						debounce="300"
						v-model="filter"
						placeholder="Buscar"
					>
						<template v-slot:append>
							<q-icon name="search" />
						</template>
					</q-input>
				</div>
			</template>

			<template v-slot:header="props">
				<q-tr text-align: center bgcolor="orange" :props="props">
					<q-th
						auto-width
						style="text-align: center"
						v-for="col in props.cols"
						:key="col.name"
						:props="props"
					>
						{{ col.label }}
					</q-th>
					<q-th auto-width>Acción</q-th>
				</q-tr>
			</template>

			<template v-slot:body="props">
				<q-tr :props="props">
					<q-td
						style="text-align: center"
						v-for="col in props.cols"
						:key="col.name"
						:props="props"
					>
						{{ col.value | upper }}
					</q-td>
					<q-td auto-width style="text-align: center">
						<template>
							<div class="q-gutter-sm">
								<q-btn
									color="primary"
									round
									dense
									icon="edit"
									@click="editarFamiliar(props.row)"
								></q-btn>
								<q-dialog
									v-model="formActualizar"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 310px">
										<q-card-section>
											<div class="text-h6">
												Representante
											</div>
										</q-card-section>
										<q-card-section
											style="max-height: 50vh"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-select
													v-model="estudiantess"
													:options="
														options.estudiantes
													"
													label="Estudiante"
													emit-value
													map-options
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-select>
												<q-input
													v-model.trim="nombress"
													label="Nombres"
													lazy-rules
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-input
													v-model.trim="apellidoss"
													label="Apellidos"
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-select
													disable
													v-model="
														id_ctlg_tipos_documentoss
													"
													:options="
														options.tipos_documentos
													"
													label="Tipo de documento"
													emit-value
													map-options
												></q-select>
												<q-input
													v-model="numero_documentoss"
													label="Número de documento"
													type="number"
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-select
													v-model="
														id_ctlg_profesioness
													"
													:options="
														options.profesiones
													"
													label="Profesión"
													emit-value
													map-options
												></q-select>

												<q-select
													v-model="
														id_ctlg_parentescoss
													"
													:options="
														options.parentescos
													"
													label="Parentesco"
													emit-value
													map-options
												></q-select>

												<q-input
													v-model="correoss"
													label="Correo"
													type="email"
												></q-input>
												<q-input
													v-model.trim="direccionss"
													label="Dirección"
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-input
													v-model.trim="telefonoss"
													label="Telefono"
													mask=" ### - ####"
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-input
													v-model.trim="celularss"
													label="Celular"
													type="tel"
													mask=" ##-########"
													:rules="[
														(val) =>
															!!val ||
															'* Requerido',
													]"
												></q-input>
												<q-select
													v-model="
														id_ctlg_estados_civilss
													"
													:options="
														options.estados_civil
													"
													label="Estados Civil"
													emit-value
													map-options
												></q-select>
												<q-input
													v-model.trim="
														lugar_trabajoss
													"
													label="Empresa que labora"
												></q-input>
												<q-input
													v-model="
														direccion_trabajoss
													"
													label="Direccion Trabajo"
												></q-input>
												<q-select
													v-model="id_ctlg_cantoness"
													:options="options.cantones"
													label="Cantón de Trabajo"
													emit-value
													map-options
												></q-select>
												<q-input
													v-model="telefono_trabajoss"
													label="Telefono Trabajo"
													mask=" ### - ####"
												></q-input>
												<q-input
													v-model="cargoss"
													label="Cargo que ocupa"
												></q-input>
											</q-form>
										</q-card-section>
										<q-card-actions align="right">
											<q-btn
												@click="guardar"
												color="primary"
												>Guardar</q-btn
											>
											<q-btn flat v-close-popup
												>cancelar</q-btn
											>
										</q-card-actions>
									</q-card>
								</q-dialog>
								<q-btn
									color="negative"
									round
									dense
									icon="delete"
									@click="eliminar(props.row)"
								></q-btn>
								<!--<q-dialog v-model="confirm" persistent>
										<q-card>
											<q-card-section class="row items-center">
											
											<span class="q-ml-sm">Seguro que deseas eliminarlo.</span>
											</q-card-section>

											<q-card-actions align="right">
												<q-btn @click="eliminar " color="primary"  >Eliminar</q-btn>
												<q-btn flat v-close-popup >Cancelar</q-btn>
											</q-card-actions>
										</q-card>
									</q-dialog>-->
							</div>
						</template>
					</q-td>
				</q-tr>
			</template>

			<template v-slot:loading>
				<q-inner-loading showing color="primary"></q-inner-loading>
			</template>
		</q-table>
	</q-page>
</template>

<script>
	export default {
		data() {
			return {
				filter: "",
				step: 1,
				formActualizar: false,
				//confirm:false,
				ids: -1,
				idef: -1,
				id_estudiantes: "",
				estudiantess: " ",
				nombress: "",
				apellidoss: "",
				id_ctlg_tipos_documentoss: "",
				numero_documentoss: "",
				correoss: "",
				direccionss: "",
				telefonoss: "",
				celularss: "",
				id_ctlg_profesioness: "",
				id_ctlg_estados_civilss: "",
				id_ctlg_cantoness: "",
				id_ctlg_parentescoss: "",
				lugar_trabajoss: "",
				direccion_trabajoss: "",
				telefono_trabajoss: "",
				cargoss: "",

				options: {
					tipos_documentos: [],
					profesiones: [],
					estados_civil: [],
					estudiantes: [],
					cantones: [],
					parentescos: [],
				},

				familiares: {
					loading: false,
					columns: [
						{
							name: "numero_documento",
							field: "numero_documento",
							label: "Número Documento",
						},
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Familiares",
						},
						{
							name: "estudiante",
							field: "estudiante",
							label: "Estudiante",
						},

						{
							name: "parentesco",
							field: "parentesco",
							label: "Parentesco",
						},
						{
							name: "telefono",
							field: "telefono",
							label: "Teléfono",
						},
						{
							name: "celular",
							field: "celular",
							label: "Celular",
						},
						{
							name: "lugar_trabajo",
							field: "lugar_trabajo",
							label: "Lugar de Trabajo",
						},
						{
							name: "telefono_trabajo",
							field: "telefono_trabajo",
							label: "Teléfono de Trabajo",
						},
					],
					data: [],
				},
			};
		},
		filters: {
			capitalize: function (value) {
				if (!value) return "";
				value = value.toString();
				return value.charAt(0).toUpperCase() + value.slice(1);
			},

			upper: function (value) {
				if (!value) return "";
				value = value.toString();
				return value.toUpperCase();
			},
		},
		created() {
			this.listaFamiliares();
			Promise.all([
				this.tipos_documentos(),
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
			excel() {
				this.report(
					"Reporte Representante-Estudiante",
					this.familiares.columns,
					this.familiares.data
				);
			},
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
			validEmail: function (correoss) {
				var re =
					/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(correoss);
			},

			editarFamiliar(row) {
				this.ids = row.id;

				this.idef = row.id_fami;
				this.nombress = row.nombres;
				this.apellidoss = row.apellidos;
				this.id_ctlg_tipos_documentoss = row.id_ctlg_tipos_documentos;
				this.numero_documentoss = row.numero_documento;
				this.correoss = row.correo;
				this.direccionss = row.direccion_domicilio;
				this.telefonoss = row.telefono;
				this.celularss = row.celular;
				this.id_ctlg_profesioness = row.id_ctlg_profesiones;
				this.id_ctlg_estados_civilss = row.id_ctlg_estados_civil;
				this.id_ctlg_cantoness = row.id_ctlg_cantones;
				this.id_ctlg_parentescoss = row.id_ctlg_parentescos;
				this.lugar_trabajoss = row.lugar_trabajo;
				this.direccion_trabajoss = row.direccion_trabajo;
				this.telefono_trabajoss = row.telefono_trabajo;
				this.cargoss = row.cargo;
				this.estudiantess = row.estudiante;

				this.formActualizar = true;
			},

			guardar(row) {
				if (this.correoss !== null && this.correoss !== "") {
					if (this.validEmail(this.correoss)) {
						if (
							this.nombress !== null &&
							this.nombress !== "" &&
							this.apellidoss !== null &&
							this.apellidoss !== "" &&
							this.celularss !== null &&
							this.celularss !== "" &&
							this.id_ctlg_profesioness !== null &&
							this.id_ctlg_profesioness !== "" &&
							this.id_ctlg_estados_civilss !== null &&
							this.id_ctlg_estados_civilss !== "" &&
							this.id_ctlg_parentescoss !== null &&
							this.id_ctlg_parentescoss !== "" &&
							this.numero_documentoss !== null &&
							this.numero_documentoss !== ""
						) {
							if (this.id_ctlg_tipos_documentoss == 1) {
								var cedula = this.numero_documentoss;

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
											_.rput(
												`familiares/${this.ids}`,
												null,
												{
													ids: row.id,

													nombress: this.nombress,
													apellidoss: this.apellidoss,
													numero_documentoss:
														this.numero_documentoss,
													correoss: this.correoss,
													direccionss:
														this.direccionss,
													telefonoss: this.telefonoss,
													celularss: this.celularss,
													id_ctlg_profesioness:
														this
															.id_ctlg_profesioness,
													id_ctlg_estados_civilss:
														this
															.id_ctlg_estados_civilss,
													id_ctlg_cantoness:
														this.id_ctlg_cantoness,
													id_ctlg_parentescoss:
														this
															.id_ctlg_parentescoss,
													lugar_trabajoss:
														this.lugar_trabajoss,
													direccion_trabajoss:
														this
															.direccion_trabajoss,
													telefono_trabajoss:
														this.telefono_trabajoss,
													cargoss: this.cargoss,
													estudiantess:
														this.estudiantess,
													idef: this.idef,
												}
											)
												.then((r) => {
													this.$refs.stepper.next();
													this.listaFamiliares();
													this.$q.notify({
														type: "positive",
														message:
															"Actualizar con exito",
														timeout: 500,
													});
												})
												.catch((r) => {
													this.$q.notify({
														type: "negative",
														message:
															r.message ||
															"Hubo un error al actualizar",
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
								_.rput(`familiares/${this.ids}`, null, {
									ids: row.id,
									nombress: this.nombress,
									apellidoss: this.apellidoss,
									numero_documentoss: this.numero_documentoss,
									correoss: this.correoss,
									direccionss: this.direccionss,
									telefonoss: this.telefonoss,
									celularss: this.celularss,
									id_ctlg_profesioness:
										this.id_ctlg_profesioness,
									id_ctlg_estados_civilss:
										this.id_ctlg_estados_civilss,
									id_ctlg_cantoness: this.id_ctlg_cantoness,
									id_ctlg_parentescoss:
										this.id_ctlg_parentescoss,
									lugar_trabajoss: this.lugar_trabajoss,
									direccion_trabajoss:
										this.direccion_trabajoss,
									telefono_trabajoss: this.telefono_trabajoss,
									cargoss: this.cargoss,
									estudiantess: this.estudiantess,
									idef: this.idef,
								})
									.then((r) => {
										//this.close();
										this.formActualizar = false;
										this.listaFamiliares();
										this.$q.notify({
											type: "positive",
											message: "Actualizado con exito",
											timeout: 500,
										});
									})
									.catch((r) => {
										this.$q.notify({
											type: "negative",
											message:
												r.message ||
												"Hubo un error al actualizar",
										});
									})
									.finally(() => {
										this.$q.loading.hide();
									});
							}
						} else {
							this.$q.notify({
								type: "negative",
								message: "No se puedetrytytr actualizar",
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
						this.nombress !== null &&
						this.nombress !== "" &&
						this.apellidoss !== null &&
						this.apellidoss !== "" &&
						this.celularss !== null &&
						this.celularss !== "" &&
						this.id_ctlg_profesioness !== null &&
						this.id_ctlg_profesioness !== "" &&
						this.id_ctlg_estados_civilss !== null &&
						this.id_ctlg_estados_civilss !== "" &&
						this.id_ctlg_parentescoss !== null &&
						this.id_ctlg_parentescoss !== "" &&
						this.numero_documentoss !== null &&
						this.numero_documentoss !== ""
					) {
						if (this.id_ctlg_tipos_documentoss == 1) {
							var cedula = this.numero_documentoss;

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
										_.rput(`familiares/${this.ids}`, null, {
											ids: row.id,
											nombress: this.nombress,
											apellidoss: this.apellidoss,
											numero_documentoss:
												this.numero_documentoss,
											correoss: this.correoss,
											direccionss: this.direccionss,
											telefonoss: this.telefonoss,
											celularss: this.celularss,
											id_ctlg_profesioness:
												this.id_ctlg_profesioness,
											id_ctlg_estados_civilss:
												this.id_ctlg_estados_civilss,
											id_ctlg_cantoness:
												this.id_ctlg_cantoness,
											id_ctlg_parentescoss:
												this.id_ctlg_parentescoss,
											lugar_trabajoss:
												this.lugar_trabajoss,
											direccion_trabajoss:
												this.direccion_trabajoss,
											telefono_trabajoss:
												this.telefono_trabajoss,
											cargoss: this.cargoss,
											estudiantess: this.estudiantess,
											idef: this.idef,
										})
											.then((r) => {
												this.$refs.stepper.next();
												this.listaFamiliares();
												this.$q.notify({
													type: "positive",
													message:
														"Actualizar con exito",
													timeout: 500,
												});
											})
											.catch((r) => {
												this.$q.notify({
													type: "negative",
													message:
														r.message ||
														"Hubo un error al actualizar",
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
							_.rput(`familiares/${this.ids}`, null, {
								ids: row.id,
								nombress: this.nombress,
								apellidoss: this.apellidoss,
								numero_documentoss: this.numero_documentoss,
								correoss: this.correoss,
								direccionss: this.direccionss,
								telefonoss: this.telefonoss,
								celularss: this.celularss,
								id_ctlg_profesioness: this.id_ctlg_profesioness,
								id_ctlg_estados_civilss:
									this.id_ctlg_estados_civilss,
								id_ctlg_cantoness: this.id_ctlg_cantoness,
								id_ctlg_parentescoss: this.id_ctlg_parentescoss,
								lugar_trabajoss: this.lugar_trabajoss,
								direccion_trabajoss: this.direccion_trabajoss,
								telefono_trabajoss: this.telefono_trabajoss,
								cargoss: this.cargoss,
								estudiantess: this.estudiantess,
								idef: this.idef,
							})
								.then((r) => {
									//this.close();
									this.formActualizar = false;
									this.listaFamiliares();
									this.$q.notify({
										type: "positive",
										message: "Actualizado con exito",
										timeout: 500,
									});
								})
								.catch((r) => {
									this.$q.notify({
										type: "negative",
										message:
											r.message ||
											"Hubo un error al actualizar",
									});
								})
								.finally(() => {
									this.$q.loading.hide();
								});
						}
					} else {
						this.$q.notify({
							type: "negative",
							message: "Nffo se puede actualizar",
						});
					}
				}
			},
			/*terminar(row){
					this.$q.loading.show();
						_.rput(`familiares/crearr`,null,{
							id_estudiantesss:this.id_estudiantesss
						//	_id_familiares:this.id_familiares
						}).then((r)=>{
							this.formActualizar = false;
							this.listaFamiliares();
						}).catch((r)=>{
							this.$q.notify({
								type: 'negative',
								message: r.message || 'Hubo un error al guardar'
							});
						}).finally(()=>{
							this.$q.loading.hide();
						});

				},
	*/

			/*	eliminarFamiliar(row) {
					this.ids = row.id_fami;
					this.confirm=true;


				},*/

			eliminar(row) {
				this.ids = row.id_fami;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`familiares/elim/${this.ids}`, null, {
					ids: row.id_fami,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaFamiliares();
						this.$q.notify({
							type: "positive",
							message: "Eliminado con exito",
							timeout: 500,
						});
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al eliminar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},

			nuevoFamiliar() {
				this.modal("familiar", {});
			},
			nuevoEstudianteFamiliar() {
				this.modal("estudiante_familiar", {});
			},

			listaFamiliares() {
				this.familiares.loading = true;
				_.rget("familiares")
					.then((r) => {
						this.familiares.data = r.data;
					})
					.finally(() => {
						this.familiares.loading = false;
					});
			},
		},
	};
</script>
