<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Materias"
			:data="materias.data"
			:columns="materias.columns"
			row-key="id"
			:filter="filter"
			:loading="materias.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Materia"
						no-caps
						@click="nuevoMateria"
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
						placeholder="Search"
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
								@click="editarMateria(props.row)"
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
							v-model="id_ctlg_materiass"
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
				id_ctlg_materiass: " ",

				options: {
					mate: [],
				},
				materias: {
					loading: false,
					columns: [
						/*{
							name: "id",
							label: "ID",
							field: "id",
						},*/
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
			this.listaMaterias();
			Promise.all([this.mate()]).then((v) => {
				this.init();
			});
		},
		methods: {
			excel() {
				this.report(
					"Reporte Materias ",
					this.materias.columns,
					this.materias.data
				);
			},
			mate() {
				return _.rget("materias/ctlg").then((r) => {
					this.options.mate = r.data;
				});
			},

			editarMateria(row) {
				this.ids = row.id;
				this.id_ctlg_materiass = row.materias;
				this.formActualizar = true;
			},

			guardar(row) {
				if (
					this.id_ctlg_materiass !== null &&
					this.id_ctlg_materiass !== ""
				) {
					_.rput(`materias/${this.ids}`, null, {
						ids: row.id,
						id_ctlg_materiass: this.id_ctlg_materiass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaMaterias();
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
				_.rdelete(`materias/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaMaterias();
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

			nuevoMateria() {
				this.modal("materia", {});
			},
			/*nuevaJornada() {
				this.modal('ctlg_jornada', {});
			},*/
			listaMaterias() {
				this.materias.loading = true;
				_.rget("materias")
					.then((r) => {
						this.materias.data = r.data;
					})
					.finally(() => {
						this.materias.loading = false;
					});
			},
		},
	};
</script>
