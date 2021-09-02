<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Estudiantes"
			:data="estudiantes.data"
			:columns="estudiantes.columns"
			row-key="id"
			:filter="filter"
			:loading="estudiantes.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Estudiante"
						no-caps
						@click="nuevoEstudiante"
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
				<br />
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
						<!--{{ col.value | upper }}-->
						{{ col.value }}
					</q-td>
					<q-td auto-width style="text-align: center">
						<template>
							<div class="q-gutter-sm">
								<q-btn
									color="primary"
									round
									dense
									icon="edit"
									@click="editarEstudiante(props.row)"
								></q-btn>
								<q-dialog
									v-model="formActualizar"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 300px">
										<q-card-section>
											<div class="text-h6">
												Estudiante
											</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-input
													v-model="nombress"
													label="Nombres"
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Please type something',
													]"
												></q-input>
												<q-input
													v-model="apellidoss"
													label="Apellidos"
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Please type something',
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
												></q-input>
												<q-input
													v-model="correoss"
													label="Correo"
													type="email"
												></q-input>
												<q-input
													v-model="direccionss"
													label="Dirección"
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Please type something',
													]"
												></q-input>
												<q-input
													v-model="telefonoss"
													label="Telefono"
													type="tel"
													mask=" ### - ####"
												></q-input>
												<q-input
													v-model="celularss"
													label="Celular"
													type="tel"
													mask=" ##-########"
												></q-input>
												<q-input
													v-model="observacionss"
													label="Observación"
													type="textarea"
												></q-input>
											</q-form>
										</q-card-section>

										<q-card-actions align="right">
											<q-btn
												color="primary"
												@click="guardar"
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
				formActualizar: false,
				ids: -1,
				nombress: "",
				apellidoss: "",
				id_ctlg_tipos_documentoss: "",
				numero_documentoss: "",
				correoss: "",
				direccionss: "",
				telefonoss: "",
				celularss: "",
				observacionss: "",

				options: {
					tipos_documentos: [],
				},
				estudiantes: {
					loading: false,
					data: [],
					columns: [
						{
							name: "numero_documento",
							field: "numero_documento",
							label: "Número Documento",
						},
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Nombres",
						},
						{
							name: "direccion",
							field: "direccion",
							label: "Dirección",
						},
						{
							name: "correo",
							field: "correo",
							label: "Correo",
						},
						{
							name: "telefono",
							field: "telefono",
							label: "Teléfono",
						},
						{
							name: "observacion",
							field: "observacion",
							label: "Observación",
						},
					],
					pres: [
						{
							name: "numero_documento",
							field: "numero_documento",
							label: "Número Documento",
						},
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Nombres",
						},
						{
							name: "direccion",
							field: "direccion",
							label: "Dirección",
						},
						{
							name: "correo",
							field: "correo",
							label: "Correo",
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
							name: "sangre",
							field: "sangre",
							label: "Tipo de Sangre",
						},
						{
							name: "genero",
							field: "genero",
							label: "Género",
						},
						{
							name: "nacimiento",
							field: "nacimiento",
							label: "País de Nacimiento",
						},
						{
							name: "fecha_nacimiento",
							field: "fecha_nacimiento",
							label: "Fecha de Nacimiento",
						},

						{
							name: "vive",
							field: "vive",
							label: "Lugar Dónde Residen",
						},

						{
							name: "parentesco",
							field: "parentesco",
							label: "Con quién vive",
						},

						{
							name: "observacion",
							field: "observacion",
							label: "Observación",
						},
					],
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
			this.listaEstudiantes();
			Promise.all([this.tipos_documentos()]).then((v) => {
				this.init();
			});
		},
		methods: {
			excel() {
				this.report(
					"Reporte Estudiantes ",
					this.estudiantes.pres,
					this.estudiantes.data
				);
			},
			tipos_documentos() {
				return _.rget("catalogos/tipos_documentos").then((r) => {
					this.options.tipos_documentos = r.data;
				});
			},
			validEmail: function (correoss) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(correoss);
			},

			editarEstudiante(row) {
				this.ids = row.id;
				this.nombress = row.nombres;
				this.apellidoss = row.apellidos;
				this.id_ctlg_tipos_documentoss = row.id_ctlg_tipos_documentos;
				this.numero_documentoss = row.numero_documento;
				this.correoss = row.correo;
				this.direccionss = row.direccion;
				this.telefonoss = row.telefono;
				this.celularss = row.celular;
				this.observacionss = row.observacion;
				this.formActualizar = true;
			},
			guardar(row) {
				if (this.validEmail(this.correoss)) {
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
									_.rput(`estudiantes/${this.ids}`, null, {
										ids: row.id,
										nombress: this.nombress,
										apellidoss: this.apellidoss,
										numero_documentoss: this
											.numero_documentoss,
										correoss: this.correoss,
										direccionss: this.direccionss,
										telefonoss: this.telefonoss,
										celularss: this.celularss,
										observacionss: this.observacionss,
									})
										.then((r) => {
											this.formActualizar = false;
											this.listaEstudiantes();
											this.$q.notify({
												type: "positive",
												message: "Eliminado con exito",
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
						_.rput(`estudiantes/${this.ids}`, null, {
							ids: row.id,
							nombress: this.nombress,
							apellidoss: this.apellidoss,
							numero_documentoss: this.numero_documentoss,
							correoss: this.correoss,
							direccionss: this.direccionss,
							telefonoss: this.telefonoss,
							celularss: this.celularss,
							observacionss: this.observacionss,
						})
							.then((r) => {
								this.formActualizar = false;
								this.listaEstudiantes();
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
						message: "correo invalido",
					});
				}
			},

			eliminar(row) {
				this.ids = row.id;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`estudiantes/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaEstudiantes();
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
			nuevoEstudiante() {
				this.modal("estudiante", {});
			},
			listaEstudiantes() {
				this.estudiantes.loading = true;
				_.rget("estudiantes")
					.then((r) => {
						this.estudiantes.data = r.data;
					})
					.finally(() => {
						this.estudiantes.loading = false;
					});
			},
		},
	};
</script>
