<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Matriculaciones"
			:data="matriculaciones.data"
			:columns="matriculaciones.columns"
			row-key="id"
			:filter="filter"
			:loading="matriculaciones.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Matricula"
						no-caps
						@click="nuevoMatricula"
					></q-btn>
					<q-btn color="teal" icon="save_alt" @click="nuevo">
						<q-tooltip> Exportar a Excel </q-tooltip>
					</q-btn>
					<q-dialog
						v-model="formBusqueda"
						persistent
						transition-show="scale"
						transition-hide="scale"
					>
						<q-card style="width: 300px">
							<q-card-section>
								<div class="text-h6">
									Lista de Estudiantes-Curso
								</div>
							</q-card-section>

							<q-card-section
								style="max-height: 50vh"
								class="scroll"
							>
								<q-form class="q-gutter-md">
									<q-select
										v-model="id_anos_lectivosss"
										@input="jornadasss()"
										:options="options.anos_lectivosss"
										label="Año Lectivo"
										emit-value
										map-options
									></q-select>
									<q-select
										v-model="id_jornadasss"
										@input="cursosss()"
										:options="options.jornadasss"
										label="Jornadas"
										emit-value
										map-options
									></q-select>
									<q-select
										v-model="id_cursosss"
										@input="paralelos_aulasss()"
										:options="options.cursosss"
										label="Cursos"
										emit-value
										map-options
									></q-select>
									<q-select
										v-model="id_paralelos_aulasss"
										:options="options.paralelos_aulasss"
										@input="cpa()"
										label="Paralelos - Aulas"
										emit-value
										map-options
									></q-select>
								</q-form>
							</q-card-section>

							<q-card-actions align="right">
								<q-btn color="primary" @click="excel"
									>Exportar</q-btn
								>
								<q-btn flat v-close-popup>cancelar</q-btn>
							</q-card-actions>
						</q-card>
					</q-dialog>
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
						<span v-if="formActualizar && ids == props.row.id">
							<q-btn
								color="primary"
								round
								dense
								icon="check_circle"
								@click="guardar"
							>
							</q-btn>
							<q-btn
								color="negative"
								round
								dense
								icon="close"
								@click="formActualizar = false"
							></q-btn>
						</span>
						<span v-else>
							<q-btn
								color="primary"
								round
								dense
								icon="edit"
								@click="editarMatricula(props.row)"
							></q-btn>
							<q-btn
								color="negative"
								round
								dense
								icon="delete"
								@click="
									eliminar(props.row) && ida == props.row.idaj
								"
							></q-btn>
						</span>
					</q-td>
				</q-tr>

				<q-tr
					v-show="formActualizar && ids == props.row.id"
					:props="props"
				>
					<q-td colspan="100%">
						<q-select
							v-model="id_paralelos_aulass"
							:options="options.paralelos_aulas"
							label="Paralelo - Aula"
							emit-value
							map-options
						></q-select>
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

				id_anos_lectivosss: "",
				id_jornadasss: "",
				id_cursosss: "",
				id_paralelos_aulasss: "",
				formBusqueda: false,
				y: "",

				formActualizar: false,
				ids: -1,
				id_paralelos_aulass: " ",
				id_cursoss: "",
				id_anos_lectivoss: "",
				options: {
					paralelos_aulas: [],
					cpa: [],

					anos_lectivosss: [],
					jornadasss: [],

					cursosss: [],

					paralelos_aulasss: [],
				},
				matriculaciones: {
					loading: false,
					data: [],
					columns: [
						{
							name: "id",
							field: "id",
							label: "Nº Matricula",
						},
						{
							name: "numero_documento",
							field: "numero_documento",
							label: "Número Documento",
						},
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Estudiante",
						},
						{
							name: "curso",
							field: "curso",
							label: "Curso",
						},
						{
							name: "jornada",
							field: "jornada",
							label: "Jornada",
						},
						{
							name: "paralelo_aula",
							field: "paralelo_aula",
							label: "Paralelo - Aula",
						},
						{
							name: "ano_lectivo",
							field: "ano_lectivo",
							label: "Año Lectivo",
						},
					],
				},
				matru: {
					loading: false,
					data: [],
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
			this.anos_lectivosss();
			this.listaMatriculaciones();
			this.init();
		},
		methods: {
			anos_lectivosss() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivosss = r.data;
				});
			},
			jornadasss() {
				return _.rget(`jornadas/ctlg/${this.id_anos_lectivosss}`).then(
					(r) => {
						this.options.jornadasss = r.data;
					}
				);
			},
			cursosss() {
				return _.rget(
					`catalogos/cursos_jornadas/${this.id_jornadasss}`
				).then((r) => {
					this.options.cursosss = r.data;
				});
			},
			paralelos_aulasss() {
				return _.rget(
					`docentes_asignar_cursos/cur_paralelos_aulas/${this.id_cursosss}`
				).then((r) => {
					this.options.paralelos_aulasss = r.data;
				});
			},

			cpa() {
				return _.rget(
					`matriculaciones/ctlg_catal/${this.id_paralelos_aulasss}`
				).then((r) => {
					this.options.cpa = r.data[0].label;
					this.y = this.options.cpa;
				});
			},

			/*excel() {
				this.report(
					"Reporte Matriculas ",
					this.matriculaciones.columns,
					this.matriculaciones.data
				);
			},*/

			editarMatricula(row) {
				this.id_anos_lectivoss = row.ano_lectivo;
				this.id_cursoss = row.curso;
				this.paralelos_aulas();
				this.ids = row.id;
				this.id_paralelos_aulass = row.paralelo_aula;
				this.formActualizar = true;
			},

			paralelos_aulas() {
				return _.rget("matriculaciones/matri_paralelos_aulas", {
					anoss: this.id_anos_lectivoss,
					cursoss: this.id_cursoss,
				}).then((r) => {
					this.options.paralelos_aulas = r.data;
				});
			},
			nuevo() {
				this.formBusqueda = true;
			},

			excel() {
				this.$q.loading.show();
				return _.rpost("matriculaciones/docu", {
					id_anos_lectivosss: this.id_anos_lectivosss,
					id_jornadasss: this.id_jornadasss,
					id_cursosss: this.id_cursosss,
					id_paralelos_aulasss: this.id_paralelos_aulasss,
				})
					.then((r) => {
						this.matru.data = r.data;

						this.formBusqueda = false;

						this.report(
							"Lista de Estudiantes " + this.y,
							this.matru.pres,
							this.matru.data
						);
					})
					.then((r) => {
						this.id_anos_lectivosss = "";
						this.id_jornadasss = "";
						this.id_cursosss = "";
						this.id_paralelos_aulasss = "";
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al guardar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},

			guardar(row) {
				if (
					this.id_paralelos_aulass !== null &&
					this.id_paralelos_aulass !== ""
				) {
					_.rput(`matriculaciones/${this.ids}`, null, {
						ids: row.id,
						id_paralelos_aulass: this.id_paralelos_aulass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaMatriculaciones();
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
									r.message || "Hubo un error al actualizar",
							});
						})
						.finally(() => {
							this.$q.loading.hide();
						});
				} else {
					this.$q.notify({
						type: "negative",
						message: "No se puede actualizar",
					});
				}
			},

			eliminar(row) {
				this.ids = row.id;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`matriculaciones/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaMatriculaciones();
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

			nuevoMatricula() {
				this.modal("matricula", {});
			},
			listaMatriculaciones() {
				this.matriculaciones.loading = true;
				_.rget("matriculaciones")
					.then((r) => {
						this.matriculaciones.data = r.data;
					})
					.finally(() => {
						this.matriculaciones.loading = false;
					});
			},
		},
	};
</script>
