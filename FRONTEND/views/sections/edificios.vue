<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Edificios"
			:data="edificios.data"
			:columns="edificios.columns"
			row-key="id"
			:filter="filter"
			:loading="edificios.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo Edificio"
						no-caps
						@click="nuevoEdificio"
					></q-btn>
					<q-btn
						color="primary"
						icon-right="add"
						label="Edificio - Año Lectivo"
						no-caps
						@click="nuevoAno"
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
								@click="editarEdificio(props.row)"
							></q-btn>
							<q-btn
								color="negative"
								round
								dense
								icon="delete"
								@click="
									eliminar(props.row) &&
										ida == props.row.ideano
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
						<q-input v-model="nombress" label="Nombre"> </q-input>
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
				edificios: {
					loading: false,
					columns: [
						/*	{
							name: "id",
							label: "ID",
							field: "id",
						},*/
						{
							name: "nombre",
							field: "nombre",
							label: "Edificio",
						},

						{
							name: "direccion",
							field: "direccion",
							label: "Dirección",
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
			this.listaEdificios();
			this.init();
		},
		methods: {
			excel() {
				this.report(
					"Reporte Edificios ",
					this.edificios.columns,
					this.edificios.data
				);
			},
			editarEdificio(row) {
				this.ids = row.id;
				this.nombress = row.nombre;
				this.formActualizar = true;
			},
			guardar(row) {
				if (this.nombress !== null && this.nombress !== "") {
					_.rput(`edificios/${this.ids}`, null, {
						ids: row.id,
						nombress: this.nombress,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaEdificios();
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
				this.ida = row.ideano;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`edificios/elim/${this.ida}`, null, {
					ida: row.ideano,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaEdificios();
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

			nuevoEdificio() {
				this.modal("edificio", {});
			},
			nuevoAno() {
				this.modal("edificio-anos_lectivos", {});
			},
			listaEdificios() {
				this.edificios.loading = true;
				_.rget("edificios")
					.then((r) => {
						this.edificios.data = r.data;
					})
					.finally(() => {
						this.edificios.loading = false;
					});
			},
		},
	};
</script>
