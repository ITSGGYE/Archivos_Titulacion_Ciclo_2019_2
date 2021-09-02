<template>
	<q-page class="q-pa-md">
		<br />

		<q-table
			class="q-pa-md"
			title="Asignar Docente-Curso"
			:data="docentes_asignar_cursos.data"
			:columns="docentes_asignar_cursos.columns"
			row-key="id"
			:filter="filter"
			:loading="docentes_asignar_cursos.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Asignación"
						no-caps
						@click="nuevoDocenteCurso"
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
						{{ col.value }}
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
								@click="editarDocenteCurso(props.row)"
							></q-btn>
							<q-btn
								color="negative"
								round
								dense
								icon="delete"
								@click="eliminar(props.row)"
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
							v-model="docentess"
							:options="options.docentes"
							label="Docentes"
							emit-value
							map-options
						>
						</q-select>
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
				docentess: " ",
				_id_jornadas: "",
				_id_materias: "",
				anos_lectivosss: "",

				options: {
					docentes: [],
				},
				docentes_asignar_cursos: {
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
							name: "curso",
							field: "curso",
							label: "Curso",
						},
						{
							name: "paralelo",
							field: "paralelo",
							label: "Aula/Paralelo",
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
		created() {
			this.listaDocentesCursos();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Docentes-Curso-Paralelo",
					this.docentes_asignar_cursos.columns,
					this.docentes_asignar_cursos.data
				);
			},
			editarDocenteCurso(row) {
				this._id_jornadas = row.jornada;
				this._id_materias = row.materia;
				this.anos_lectivosss = row.ano_lectivo;
				this.docentes();
				this.ids = row.id;

				this.docentess = row.nombre_completo;
				this.formActualizar = true;
				console.log(this._id_jornadas);
				console.log(this._id_materias);
				console.log(this.anos_lectivosss);
			},

			docentes() {
				return _.rget("docentes_asignar_cursos/doc_jorna_mate", {
					jornadass: this._id_jornadas,
					materiass: this._id_materias,
					ano_lectivossss: this.anos_lectivosss,
				}).then((r) => {
					this.options.docentes = r.data;
				});
			},

			guardar(row) {
				if (this.docentess !== null && this.docentess !== "") {
					_.rput(`docentes_asignar_cursos/${this.ids}`, null, {
						ids: row.id,
						docentess: this.docentess,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaDocentesCursos();
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
				_.rdelete(`docentes_asignar_cursos/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaDocentesCursos();
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
			nuevoDocenteCurso() {
				this.modal("docente_asignar_curso", {});
			},
			listaDocentesCursos() {
				this.docentes_asignar_cursos.loading = true;
				_.rget("docentes_asignar_cursos")
					.then((r) => {
						this.docentes_asignar_cursos.data = r.data;
					})
					.finally(() => {
						this.docentes_asignar_cursos.loading = false;
					});
			},
		},
	};
</script>
