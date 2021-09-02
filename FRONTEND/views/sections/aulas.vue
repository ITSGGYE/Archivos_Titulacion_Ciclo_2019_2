<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Aulas"
			:data="aulas.data"
			:columns="aulas.columns"
			row-key="id"
			:filter="filter"
			:loading="aulas.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Aula"
						no-caps
						@click="nuevoAula"
					></q-btn>
					<q-btn
						color="primary"
						icon-right="add"
						label="Aulas-Jornadas"
						no-caps
						@click="nuevoJornada"
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
						<span v-if="formActualizar && ida == props.row.idaj">
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
								@click="editarAula(props.row)"
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
					v-show="formActualizar && ida == props.row.idaj"
					:props="props"
				>
					<q-td colspan="100%">
						<!--<q-input v-model="aulass" label="Aulas"> </q-input>-->
						<q-select
							v-model="id_ctlg_aulass"
							:options="options.aul"
							label="Aulas"
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
				ida: -1,
				ano: "",
				//ano:"",
				_id_anos_lectivos: " ",
				id_ctlg_aulass: "",

				//jornadass:"",
				options: {
					aul: [],
				},

				aulas: {
					loading: false,
					columns: [
						{
							name: "aulas",
							field: "aulas",
							label: "Aula",
						},
						/*{
							name: "capacidad",
							field: "capacidad",
							label: "Capacidad",
						},*/
						{
							name: "edificios",
							field: "edificios",
							label: "Edificio",
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
			this.listaAulas();

			//	Promise.all([
			//this.estados(),
			//this.jorna()
			//this.estados()
			//	]).then((v)=>{

			this.init();

			//	});
		},
		methods: {
			/*	jorna(){
				return _.rpost(`aulas/jornadas/${this.ano}`).then((r)=>{
					this.options.jorna = r.data;
				});
			},*/

			excel() {
				this.report(
					"Reporte Aulas ",
					this.aulas.columns,
					this.aulas.data
				);
			},

			editarAula(row) {
				this.ida = row.idaj;

				this.id_ctlg_aulass = row.aulas;
				this.ano = row.idano;
				this.aul();

				//this.jornadass= row.jornadas;
				this.formActualizar = true;
			},

			aul() {
				return _.rget("aulas/catalogo_aulas_anos", {
					_id_anos_lectivos: this.ano,
				}).then((r) => {
					this.options.aul = r.data;
				});
			},
			guardar(row) {
				if (
					this.id_ctlg_aulass !== null &&
					this.id_ctlg_aulass !== ""
				) {
					_.rput(`aulas/${this.ida}`, null, {
						ida: row.idaj,
						id_ctlg_aulass: this.id_ctlg_aulass,
						//jornadass:this.jornadass
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaAulas();
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
				this.ida = row.idaj;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`aulas/elim/${this.ida}`, null, {
					ida: row.idaj,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaAulas();
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
			nuevoAula() {
				this.modal("aula", {});
			},
			nuevoJornada() {
				this.modal("aula_jornada", {});
			},

			listaAulas() {
				this.aulas.loading = true;
				_.rget("aulas")
					.then((r) => {
						this.aulas.data = r.data;
					})
					.finally(() => {
						this.aulas.loading = false;
					});
			},
		},
	};
</script>
