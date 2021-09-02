<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Actividad Curso"
			:data="actividades_cursos.data"
			:columns="actividades_cursos.columns"
			row-key="id"
			:filter="filter"
			:loading="actividades_cursos.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Actividad"
						no-caps
						@click="nuevoActividadCurso"
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
								@click="editarActividadCurso(props.row)"
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
						<q-input
							v-model="descripcioness"
							label="Descripción"
							lazy-rules
							:rules="[
								(val) => (val && val.length > 0) || 'Requerida',
							]"
						>
						</q-input>
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
				_id_docentes: this.$root.currentPage.app.informacion
					.id_docentes,
				descripcioness: " ",
				actividades_cursos: {
					loading: false,
					columns: [
						{
							name: "ano_lectivo",
							field: "ano_lectivo",
							label: "Año Lectivo",
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
							name: "insumo",
							field: "insumo",
							label: "Insumo",
						},
						{
							name: "parcial",
							field: "parcial",
							label: "Parcial",
						},
						{
							name: "periodo",
							field: "periodo",
							label: "Periodo",
						},

						{
							name: "descripcion",
							field: "descripcion",
							label: "Descripcion",
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
			this.listaActividadesCursos(
				this.$root.currentPage.app.informacion.id_docentes
			);
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Actividades del Curso ",
					this.actividades_cursos.columns,
					this.actividades_cursos.data
				);
			},

			editarActividadCurso(row) {
				this.ids = row.id;
				this.descripcioness = row.descripcion;
				this.formActualizar = true;
			},
			guardar(row) {
				if (
					this.descripcioness !== null &&
					this.descripcioness !== ""
				) {
					_.rput(`actividades_cursos/${this.ids}`, null, {
						ids: row.id,
						descripcioness: this.descripcioness,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaActividadesCursos(
								this.$root.currentPage.app.informacion
									.id_docentes
							);
							this.$q.notify({
								type: "positive",
								message: "Actulaizado con exito",
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
						message: "No se puede actualizar",
					});
				}
			},

			eliminar(row) {
				this.ids = row.id;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`actividades_cursos/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaActividadesCursos(
							this.$root.currentPage.app.informacion.id_docentes
						);
						this.$q.notify({
							type: "positive",
							message: r.message || "Eliminado Correctamente",
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

			nuevoActividadCurso() {
				this.modal("actividad_curso", {});
			},
			/*	listaActividadesCursos() {
				this.actividades_cursos.loading = true;
				_.rget("actividades_cursos").then((r) => {
					this.actividades_cursos.data = r.data;
				}).finally(() => {
					this.actividades_cursos.loading = false;
				})
			},*/
			listaActividadesCursos(id_docentes) {
				this.actividades_cursos.loading = true;
				_.rget(`actividades_cursos/listar/${id_docentes}`)
					.then((r) => {
						this.actividades_cursos.data = r.data;
					})
					.finally(() => {
						this.actividades_cursos.loading = false;
					});
			},
		},
	};
</script>
