<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Asignar Materia al Curso"
			:data="cursos_materias.data"
			:columns="cursos_materias.columns"
			row-key="id"
			:filter="filter"
			:loading="cursos_materias.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Asignación"
						no-caps
						@click="nuevoCursoMateria"
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
								@click="editarCursoMateria(props.row)"
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
					v-show="
						formActualizar &&
						ids == props.row.id &&
						tw == props.row.ano_lectivo
					"
					:props="props"
				>
					<q-td colspan="100%">
						<q-select
							v-model="materiass"
							:options="options.mate"
							label="Materias"
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
				materiass: " ",
				tw: "",

				options: {
					mate: [],
				},

				cursos_materias: {
					loading: false,
					columns: [
						/*	{
							name: "id",
							field: "id",
							label: "Id",
						},*/
						{
							name: "cursos",
							field: "cursos",
							label: "Curso",
						},
						{
							name: "materias",
							field: "materias",
							label: "Materia",
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
			this.listaCursosMaterias();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Cursos Materias",
					this.cursos_materias.columns,
					this.cursos_materias.data
				);
				/*var nameReport = "Cursos Materias";
				var j = {
					name: nameReport,
					title: "Escuela Interamericana",
					subtitle: "reporte de estudiantes",
					cols: _.map(this.cursos_materias.columns, (i) => {
						return [i.name, i.label];
					}),
					data: this.cursos_materias.data,
				};

				axios({
					method: "post",
					url: api("catalogos/report"), //"http://localhost:3000/ex", //api("catalogos/report"),
					data: j,
					responseType: "blob",
				}).then((response) => {
					const url = window.URL.createObjectURL(
						new Blob([response.data])
					);
					const link = document.createElement("a");
					link.href = url;
					link.setAttribute("download", `${nameReport}.xlsx`);
					document.body.appendChild(link);
					link.click();
				});*/
			},

			editarCursoMateria(row) {
				this.tw = row.ano_lectivo;
				this.mate();
				this.ids = row.id;
				this.materiass = row.materias;
				this.formActualizar = true;
			},

			mate() {
				return _.rget("cursos_materias/materias_anos", {
					ano_lectivo: this.tw,
				}).then((r) => {
					this.options.mate = r.data;
				});
			},

			guardar(row) {
				if (this.materiass !== null && this.materiass !== "") {
					_.rput(`cursos_materias/${this.ids}`, null, {
						ids: row.id,
						materiass: this.materiass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaCursosMaterias();
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
				_.rdelete(`cursos_materias/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaCursosMaterias();
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
			nuevoCursoMateria() {
				this.modal("curso_materia", {});
			},

			listaCursosMaterias() {
				this.cursos_materias.loading = true;
				_.rget("cursos_materias")
					.then((r) => {
						this.cursos_materias.data = r.data;
					})
					.finally(() => {
						this.cursos_materias.loading = false;
					});
			},
		},
	};
</script>
