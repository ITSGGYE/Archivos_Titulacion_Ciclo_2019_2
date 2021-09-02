<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md q-pa-sd"
			title="Paralelos"
			:data="paralelos.data"
			:columns="paralelos.columns"
			row-key="id"
			:filter="filter"
			:loading="paralelos.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Paralelo"
						no-caps
						@click="nuevoParalelo"
					></q-btn>
					<q-btn
						color="primary"
						icon-right="add"
						label="Paralelos-Jornadas"
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
								@click="editarParalelo(props.row)"
							></q-btn>
							<q-btn
								color="negative"
								round
								dense
								icon="delete"
								@click="
									eliminar(props.row) && ida == props.row.idpj
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
						<q-input v-model="nombress" label="Paralelos">
						</q-input>
						<!--	<q-select 
							v-model="jornadass" 
							:options="options.jorna" 
							label="jornadas" 
							map-options
							emit-value
						>
						</q-select>-->
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
				nombress: " ",

				paralelos: {
					loading: false,
					columns: [
						/*{
							name: "id",
							label: "ID",
							field: "id",
						},*/
						{
							name: "paralelos",
							field: "paralelos",
							label: "Paralelo",
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
			this.listaParalelos();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Paralelos ",
					this.paralelos.columns,
					this.paralelos.data
				);
			},

			editarParalelo(row) {
				this.ids = row.id;
				this.nombress = row.paralelos;
				this.formActualizar = true;
			},

			guardar(row) {
				if (this.nombress !== null && this.nombress !== "") {
					_.rput(`paralelos/${this.ids}`, null, {
						ids: row.id,
						nombress: this.nombress,
						//jornadass:this.jornadass
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaParalelos();
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
				this.ida = row.idpj;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`paralelos/elim/${this.ida}`, null, {
					ida: row.idpj,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaParalelos();
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

			nuevoParalelo() {
				this.modal("paralelo", {});
			},
			nuevoJornada() {
				this.modal("paralelo_jornada", {});
			},

			listaParalelos() {
				this.paralelos.loading = true;
				_.rget("paralelos")
					.then((r) => {
						this.paralelos.data = r.data;
					})
					.finally(() => {
						this.paralelos.loading = false;
					});
			},
		},
	};
</script>
