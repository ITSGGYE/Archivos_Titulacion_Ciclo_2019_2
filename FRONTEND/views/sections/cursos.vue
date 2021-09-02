<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Cursos"
			:data="cursos.data"
			:columns="cursos.columns"
			row-key="id"
			:filter="filter"
			:loading="cursos.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Curso"
						no-caps
						@click="nuevoCurso"
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
								@click="editarCurso(props.row)"
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
							v-model="id_ctlg_cursoss"
							:options="options.curs"
							label="Cursos"
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
				id_ctlg_cursoss: " ",

				options: {
					curs: [],
				},
				cursos: {
					loading: false,
					columns: [
						/*	{
							name: "id",
							label: "ID",
							field: "id",
						},*/
						{
							name: "cursos",
							field: "cursos",
							label: "Curso",
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
			this.listaCursos();
			Promise.all([this.curs()]).then((v) => {
				this.init();
			});
		},
		methods: {
			excel() {
				this.report(
					"Reporte Cursos ",
					this.cursos.columns,
					this.cursos.data
				);
			},
			curs() {
				return _.rget("cursos/ctlg").then((r) => {
					this.options.curs = r.data;
				});
			},

			editarCurso(row) {
				this.ids = row.id;
				this.id_ctlg_cursoss = row.cursos;
				this.formActualizar = true;
			},
			guardar(row) {
				if (
					this.id_ctlg_cursoss !== null &&
					this.id_ctlg_cursoss !== ""
				) {
					_.rput(`cursos/${this.ids}`, null, {
						ids: row.id,
						id_ctlg_cursoss: this.id_ctlg_cursoss,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaCursos();
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
				_.rdelete(`cursos/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaCursos();
						this.$q.notify({
							type: "positive",
							message: r.message || "Eliminado Correctamente",
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

			nuevoCurso() {
				this.modal("curso", {});
			},
			/*nuevaJornada() {
				this.modal('ctlg_jornada', {});
			},*/
			listaCursos() {
				this.cursos.loading = true;
				_.rget("cursos")
					.then((r) => {
						this.cursos.data = r.data;
					})
					.finally(() => {
						this.cursos.loading = false;
					});
			},
		},
	};
</script>
