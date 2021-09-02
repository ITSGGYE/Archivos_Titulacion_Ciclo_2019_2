<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Asignar Docente-Jornada-Materia"
			:data="docentes_jornadas_materias.data"
			:columns="docentes_jornadas_materias.columns"
			row-key="id"
			:filter="filter"
			:loading="docentes_jornadas_materias.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Asignación"
						no-caps
						@click="nuevoDocenteJornada"
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
									@click="editarDocenteJornada(props.row)"
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
												Asignar materias al docente
											</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-select
													v-model="jornadass"
													:options="options.jornadas"
													label="Jornadas"
													map-options
													emit-value
												></q-select>
												<q-select
													v-model="materiass"
													:options="options.materias"
													label="Materias"
													map-options
													emit-value
												></q-select>
												<q-select
													disable
													v-model="docentess"
													label="Docentes"
													map-options
													emit-value
												></q-select>
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
				docentess: "",
				jornadass: "",
				jornadasss: "",
				materiass: "",
				anos_lectivoss: "",

				options: {
					jornadas: [],
					materias: [],
				},

				docentes_jornadas_materias: {
					loading: false,
					columns: [
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Docente",
						},
						{
							name: "materia",
							field: "materia",
							label: "Materia",
						},
						{
							name: "jornada",
							field: "jornada",
							label: "Jornada",
						},
						{
							name: "ano_lectivo",
							field: "ano_lectivo",
							label: "Año Lectivo",
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
			this.listaDocentesJornadas();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Docentes-Materias ",
					this.docentes_jornadas_materias.columns,
					this.docentes_jornadas_materias.data
				);
			},

			editarDocenteJornada(row) {
				this.ids = row.id;
				this.docentess = row.nombre_completo;
				this.jornadass = row.jornada;
				this.materiass = row.materia;
				this.anos_lectivoss = row.ano_lectivo;
				this.jornadas();
				this.materias();
				this.formActualizar = true;
			},
			jornadas() {
				return _.rget("docentes_jornadas_materias/jornadas_anos", {
					jornadasss: this.anos_lectivoss,
				}).then((r) => {
					this.options.jornadas = r.data;
				});
			},
			materias() {
				return _.rget("docentes_jornadas_materias/materias_anos", {
					materiasss: this.anos_lectivoss,
				}).then((r) => {
					this.options.materias = r.data;
				});
			},

			guardar(row) {
				if (
					this.jornadass !== null &&
					this.jornadass !== "" &&
					this.materiass !== null &&
					this.materiass !== ""
				) {
					this.$q.loading.show();
					_.rput(`docentes_jornadas_materias/${this.ids}`, null, {
						ids: row.id,
						jornadass: this.jornadass,
						materiass: this.materiass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaDocentesJornadas();
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
				_.rdelete(`docentes_jornadas_materias/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaDocentesJornadas();
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
			nuevoDocenteJornada() {
				this.modal("docente_jornada_materia", {});
			},
			listaDocentesJornadas() {
				this.docentes_jornadas_materias.loading = true;
				_.rget("docentes_jornadas_materias")
					.then((r) => {
						this.docentes_jornadas_materias.data = r.data;
					})
					.finally(() => {
						this.docentes_jornadas_materias.loading = false;
					});
			},
		},
	};
</script>
