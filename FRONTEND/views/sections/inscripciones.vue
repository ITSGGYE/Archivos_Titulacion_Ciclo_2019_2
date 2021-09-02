<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Inscripciones"
			:data="inscripciones.data"
			:columns="inscripciones.columns"
			row-key="id"
			:filter="filter"
			:loading="inscripciones.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nueva Inscripción"
						no-caps
						@click="nuevoIncripcion"
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
								@click="editarIncripcion(props.row)"
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
						<div class="row">
							<div class="col-md-4">
								<q-select
									v-model="id_jornadass"
									:options="options.jornadas"
									label="Jornadas"
									emit-value
									map-options
								>
								</q-select>
							</div>
							<div class="col-md-4 offset-md-2">
								<q-select
									v-model="id_representantess"
									:options="options.familiares"
									label="Representante"
									emit-value
									map-options
								>
								</q-select>
							</div>
						</div>
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
				id_jornadass: "",
				id_anos_lectivoss: "",
				id_cursoss: "",
				id_representantess: "",
				_id_estudiantes: -1,

				options: {
					jornadas: [],
					familiares: [],
				},
				inscripciones: {
					loading: false,
					columns: [
						{
							name: "id",
							field: "id",
							label: "N° Inscripción",
						},
						{
							name: "numero_documento",
							field: "numero_documento",
							label: "Número Documento",
						},
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Estudiante",
						},
						{
							name: "curso",
							field: "curso",
							label: "Curso",
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
						{
							name: "familiar",
							field: "familiar",
							label: "Representante",
						},
					],
					data: [],
				},
			};
		},
		created() {
			this.listaInscripciones();

			this.init();
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
		methods: {
			excel() {
				this.report(
					"Reporte Inscripciones ",
					this.inscripciones.columns,
					this.inscripciones.data
				);
			},

			editarIncripcion(row) {
				this.ids = row.id;
				this.id_anos_lectivoss = row.ano_lectivo;

				this.id_cursoss = row.curso;
				this._id_estudiantes = row.ide;
				this.jornadas();
				this.familiares();

				this.id_jornadass = row.jornada;
				this.id_representantess = row.familiar;

				this.formActualizar = true;
			},
			jornadas() {
				return _.rget("inscripciones/jornadas_anos_cursos", {
					anoss: this.id_anos_lectivoss,
					cursoss: this.id_cursoss,
				}).then((r) => {
					this.options.jornadas = r.data;
				});
			},
			familiares() {
				return _.rget(
					`familiares/familiares_estudiantes/${this._id_estudiantes}`
				).then((r) => {
					this.options.familiares = r.data;
				});
			},
			guardar(row) {
				_.rput(`inscripciones/${this.ids}`, null, {
					ids: row.id,
					id_jornadass: this.id_jornadass,
					id_representantess: this.id_representantess,
				})
					.then((r) => {
						this.formActualizar = false;
						this.listaInscripciones();
						this.$q.notify({
							type: "positive",
							message: "Actualizado con exito",
							timeout: 500,
						});
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al actualizar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},

			eliminar(row) {
				this.ids = row.id;
				//this.confirm=true;
				this.$q.loading.show();
				_.rdelete(`inscripciones/elim/${this.ids}`, null, {
					ids: row.id,
				})
					.then((r) => {
						//	this.confirm=false;
						this.listaInscripciones();
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
			nuevoIncripcion() {
				this.modal("inscripcion", {});
			},

			listaInscripciones() {
				this.inscripciones.loading = true;
				_.rget("inscripciones")
					.then((r) => {
						this.inscripciones.data = r.data;
					})
					.finally(() => {
						this.inscripciones.loading = false;
					});
			},
		},
	};
</script>
