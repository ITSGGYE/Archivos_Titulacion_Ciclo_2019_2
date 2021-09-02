<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Asignar Cursos-Paralelos-Aulas"
			:data="cursos_paralelos_aulas.data"
			:columns="cursos_paralelos_aulas.columns"
			row-key="id"
			:filter="filter"
			:loading="cursos_paralelos_aulas.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Asignación"
						no-caps
						@click="nuevoCursoParalelo"
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
								@click="editarCursoParalelo(props.row)"
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
						tw == props.row.jornadas
					"
					:props="props"
				>
					<q-td>
						<q-select
							v-model="aulass"
							:options="options.aul"
							label="Aulas"
							emit-value
							map-options
						>
						</q-select>
						<!--<q-select 
							v-model="jornadass" 
							:options="options.jor" 
							label="Jornadas" 
							emit-value 
							map-options
							>-->
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
				aulass: " ",
				tw: "",
				anos_lectivosss: "",

				options: {
					aul: [],
				},

				cursos_paralelos_aulas: {
					loading: false,
					columns: [
						{
							name: "cursos",
							field: "cursos",
							label: "Curso",
						},
						{
							name: "aula",
							field: "aula",
							label: "Aula",
						},
						{
							name: "paralelos",
							field: "paralelos",
							label: "Paralelo",
						},
						{
							name: "jornadas",
							field: "jornadas",
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
			this.listaCursosParalelos();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Cursos-Aulas-Paralelos ",
					this.cursos_paralelos_aulas.columns,
					this.cursos_paralelos_aulas.data
				);
			},
			editarCursoParalelo(row) {
				this.tw = row.jornadas;
				this.anos_lectivosss = row.ano_lectivo;
				this.aul();
				this.ids = row.id;
				this.aulass = row.aula;
				this.formActualizar = true;
			},

			aul() {
				return _.rget("cursos_paralelos_aulas/aulas_jornadas", {
					jornadass: this.tw,
					ano_lectivossss: this.anos_lectivosss,
				}).then((r) => {
					this.options.aul = r.data;
				});
			},

			guardar(row) {
				if (this.aulass !== null && this.aulass !== "") {
					_.rput(`cursos_paralelos_aulas/${this.ids}`, null, {
						ids: row.id,
						aulass: this.aulass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaCursosParalelos();
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
				_.rdelete(`cursos_paralelos_aulas/elim/${this.ids}`, null, {
					ids: row.id,
					//	ida: row.idcj,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaCursosParalelos();
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

			nuevoCursoParalelo() {
				this.modal("curso_paralelo_aula", {});
			},
			/*nuevaJornada() {
				this.modal('ctlg_jornada', {});
			},*/
			listaCursosParalelos() {
				this.cursos_paralelos_aulas.loading = true;
				_.rget("cursos_paralelos_aulas")
					.then((r) => {
						this.cursos_paralelos_aulas.data = r.data;
					})
					.finally(() => {
						this.cursos_paralelos_aulas.loading = false;
					});
			},
		},
	};
</script>
