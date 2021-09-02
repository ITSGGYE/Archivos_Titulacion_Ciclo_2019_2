<template>
	<q-page class="q-pa-md">
		<br />
		<div class="q-pa-xs">
			<q-card style="width: 100%">
				<q-card-section class="bg-indigo-7 text-white">
					<div class="q-pa-sm row">
						<div class="col-md-6 offset-md-5" avatar>
							<q-avatar size="100px" class="q-mb-sm">
								<img src="./images/person.png" />
							</q-avatar>
						</div>
						<div
							class="col-md-6 offset-md-4 text-h6 text-capitalize"
						>
							{{
								this.$root.currentPage.app.informacion
									.nombre_completo
							}}
						</div>
						<div
							class="col-md-6 offset-md-5 text-h6 text-capitalize"
						>
							{{ this.estudiantes.data.perfil }}
						</div>
					</div>
				</q-card-section>

				<!--<q-card-actions align="center">
					<q-btn flat>General</q-btn>
					<q-btn flat>Domicilio</q-btn>
					<q-btn flat>Medica</q-btn>
				</q-card-actions>-->
				<q-tabs v-model="tab" class="text-teal" align="center">
					<q-tab label="General" name="general"></q-tab>
					<q-tab label="Domicilio" name="domicilio"></q-tab>
					<q-tab label="Medica" name="medica"></q-tab>
				</q-tabs>

				<!--<q-separator></q-separator>-->

				<q-tab-panels v-model="tab" animated>
					<q-tab-panel name="general">
						<div class="q-pa-xs">
							<div
								class="q-pa-sm column"
								style="max-width: 300px"
							>
								<q-input
									v-model="estudiantes.data.nombre_est"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder text-blue-grey-9"
											style="font-size: 15px"
										>
											Nombres :
										</div>
									</template>
								</q-input>

								<q-input
									v-model="estudiantes.data.apellido_est"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Apellidos :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.cedula"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Cedula o Pasaporte :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="fecha_nacimiento"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Fecha de Nacimiento :
										</div>
									</template>
								</q-input>

								<!--<ul>
									<li>
										{{ estudiantes.data.apellido_est }}
									</li>
								</ul>-->
							</div>
						</div>
					</q-tab-panel>

					<q-tab-panel name="domicilio">
						<div class="q-pa-md">
							<div
								class="q-pa-xs column"
								style="max-width: 300px"
							>
								<q-input
									v-model="estudiantes.data.provincias"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Provincia :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.cantones"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Ciudad :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.parroquias"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Parroquia :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.direccion"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Dirección :
										</div>
									</template>
								</q-input>

								<!--<ul>
									<li>
										{{ estudiantes.data.apellido_est }}
									</li>
								</ul>-->
							</div>
						</div>
					</q-tab-panel>

					<q-tab-panel name="medica">
						<div class="q-pa-md">
							<div
								class="q-pa-xs column"
								style="max-width: 600px"
							>
								<q-input
									v-model="estudiantes.data.sangre"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Tipo de Sangre :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.genero"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Genero :
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.telefono"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Teléfono de Emergencia:
										</div>
									</template>
								</q-input>
								<q-input
									v-model="estudiantes.data.celular"
									class="text-weight-medium text-capitalize"
									borderless
									dense
									readonly
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Celular de Emergencia :
										</div>
									</template>
								</q-input>
								<!--<q-input
									v-model="estudiantes.data.obser"
									class="text-weight-medium text-capitalize"
									type="textarea"
									borderless
									dense
									readonly
								>-->
								<q-input
									v-model="estudiantes.data.obser"
									clearable
									autogrow
									:shadow-text="textareaShadowText"
									@keydown="processTextareaFill"
									@focus="processTextareaFill"
									borderless
									dense
									disable
								>
									<template v-slot:before>
										<div
											class="text-subtitle2 text-weight-bolder"
											style="
												font-size: 15px;
												color: #37474f;
											"
										>
											Observación :
										</div>
									</template>
								</q-input>

								<!--<ul>
									<li>
										{{ estudiantes.data.apellido_est }}
									</li>
								</ul>-->
							</div>
						</div>
					</q-tab-panel>
				</q-tab-panels>
			</q-card>
		</div>
	</q-page>
</template>

<script>
	//row items-start q-gutter-md
	//text-subtitle2 flex flex-center
	export default {
		data() {
			return {
				filter: "",
				formActualizar: false,
				_id_estudiantes: this.$root.currentPage.app.informacion,
				tab: "general",
				nombress: "",
				apellidoss: "",
				cedulass: "",
				direccionss: "",
				telefonoss: "",
				observacionss: "",
				sangress: "",
				fecha_nacimiento: "",
				pais: "",
				options: {
					estudiantes: [],
					elm: [],
					//listaEstudiantes: [],
				},

				estudiantes: {
					loading: false,
					columns: [
						{
							name: "nombre_est",
							field: "nombre_est",
							label: "Nombres",
						},
						{
							name: "apellido_est",
							field: "apellido_est",
							label: "Apellidos",
						},
						{
							name: "cedula",
							field: "cedula",
							label: "Cedula",
						},
						{
							name: "telefono",
							field: "telefono",
							label: "Telefono",
						},
						{
							name: "fecha_nac",
							field: "fecha_nac",
							label: "Fecha Nacimiento",
						},
						{
							name: "direccion",
							field: "direccion",
							label: "Direccion",
						},
						{
							name: "obser",
							field: "obser",
							label: "Observacion",
						},
						{
							name: "pais",
							field: "pais",
							label: "Pais",
						},
						{
							name: "sangre",
							field: "sangre",
							label: "Sangre",
						},
						{
							name: "genero",
							field: "genero",
							label: "Genero",
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
			this.listaEstudiantes(
				this.$root.currentPage.app.informacion.id_estudiantes
			);
			/*console.log(this.$root.currentPage.app.informacion);
			this.init();*/

			//this.docentes(),

			this.init();
		},
		methods: {
			//elm() {
			//this._id_estudiantes = this.id;
			//this.nombress = this.nombre_est;
			/*this.apellidoss = row.apellidos;
				this.id_ctlg_tipos_documentoss = row.id_ctlg_tipos_documentos;
				this.numero_documentoss = row.numero_documento;
				this.correoss = row.correo;
				this.direccionss = row.direccion;
				this.telefonoss = row.telefono;
				this.celularss = row.celular;
				this.observacionss = row.observacion;*/
			//this.formActualizar = true;
			//	console.log(this.nombress);
			//	},

			listaEstudiantes() {
				_.rget(`estudiantes/info_est`, {
					_id_estudiantes: this.$root.currentPage.app.informacion
						.id_estudiantes,
				}).then((r) => {
					//5
					this.estudiantes.data = r.data[0];
					//console.log(this.estudiantes.data);
					this.fecha_nacimiento = moment(
						this.estudiantes.data.fecha_nac
					).format("YYYY-MM-DD");
					//console.log(fecha_nacimiento);
				});
			},

			/*fecha() {
				fecha_naci = moment(this.estudiantes.data.fecha_nac).format(
					"YYYY-MM-DD"
				);
				console.log(fecha_naci);
			},*/
			/*listaEstudiantes() {
				this.estudiantes.loading = true;
				_.rget(`estudiantes/info_est/${this._id_estudiantes}`)
					.then((r) => {
						this.estudiantes.data = r.data;
						console.log(this.estudiantes.data);
					})
					.finally(() => {
						this.estudiantes.loading = false;
					});
			},*/
		},
	};
</script>
