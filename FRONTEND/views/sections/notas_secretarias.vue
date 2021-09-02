<template>
	<q-page class="q-pa-md">
		<br />
		<div class="q-pa-md q-gutter-sm row items-start">
			<div class="col">
				<q-select
					standout="bg-deep-purple-6 text-white"
					label="Año Lectivo"
					v-model="f._id_anos_lectivos"
					@input="docentes()"
					:options="options.anos_lectivos"
					emit-value
					map-options
					style="min-width: 150px"
				>
				</q-select>
			</div>
			<div class="col">
				<q-select
					standout="bg-deep-purple-6 text-white"
					label="Docentes"
					v-model="f._id_docentes"
					@input="dac()"
					:options="options.docentes"
					emit-value
					map-options
					style="min-width: 150px"
				>
				</q-select>
			</div>
			<div class="col">
				<q-select
					standout="bg-deep-purple-6 text-white"
					label="Curso -Aula/Paralelo -Materia"
					v-model="f._id_dac"
					@input="dre()"
					:options="options.dac"
					emit-value
					map-options
					style="min-width: 150px"
				>
				</q-select>
			</div>
			<div class="col">
				<q-select
					standout="bg-deep-purple-6 text-white"
					label=" Periodo-Parcial-Insumo-Deber"
					v-model="f._id_dre"
					@input="estu()"
					:options="options.dre"
					emit-value
					map-options
					style="width: 250px"
					behavior="dialog"
				></q-select>
			</div>
		</div>

		<br />

		<br />
		<q-table
			class="q-pa-md"
			title="Notas"
			:data="notas.data"
			:columns="notas.columns"
			row-key="id"
			:filter="filter"
			:loading="notas.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
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
						style="text-align: center"
						v-for="col in props.cols"
						:key="col.name"
						:props="props"
					>
						{{ col.label }}
					</q-th>
					<q-th style="text-align: center">Notas</q-th>
					<q-th auto-width></q-th>
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
					<q-td align="center" valign="center">
						<q-input
							v-model.number="props.row.valor"
							type="number"
							filled
							style="max-width: 200px"
							:step="0.01"
							:min="0"
							:max="10"
						/>
					</q-td>
					<q-td auto-width>
						<q-btn
							:disable="props.row.spa == 0"
							color="primary"
							round
							dense
							icon="save"
							@click="nuevaNota(props.row)"
						></q-btn>
						<q-btn
							color="primary"
							round
							dense
							icon="edit"
							@click="editarNota(props.row)"
						></q-btn>
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
				ids: "",
				valorss: " ",
				deshabilitar: false,

				f: {
					_id_anos_lectivos: "",
					_id_docentes: "",
					_id_dac: "",
					_id_dre: "",
					_id_estu: "",
					_notas: "",
				},
				options: {
					anos_lectivos: [],
					docentes: [],
					dac: [],
					dre: [],
					estu: [],
				},

				notas: {
					loading: false,
					data: [],
					columns: [
						/*{
							name: "id",
							field: "id",
							label: "ID",
						},*/
						{
							name: "id_matriculas",
							field: "id_matriculas",
							label: "N° Matricula",
						},
						{
							name: "nombre",
							field: "nombre",
							label: "Estudiantes",
						},
					],
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
			//console.log(this.$root.currentPage.app.informacion)
			Promise.all([
				//this.docentes(),
				this.anos_lectivos(),
			]).then((v) => {
				this.init();
			});
		},

		/*mounted(){
			this.dac();
		},*/
		methods: {
			anos_lectivos() {
				return _.rget("anos_lectivos/ctlg").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},

			docentes() {
				return _.rget(
					`notas/docentes_anos/${this.f._id_anos_lectivos}`
				).then((r) => {
					this.options.docentes = r.data;
				});
			},

			dac() {
				this.f._id_dac = "";
				this.f._id_dre = "";
				this.notas.data = [];
				return _.rget(`notas/dac_ano`, {
					_id_docente: this.f._id_docentes,
					_id_anos_lectivo: this.f._id_anos_lectivos,
				}).then((r) => {
					//5
					this.options.dac = r.data;
				});
			},

			/*
			dac(id_docentes){
	this.f._id_dac="";
	this.f._id_dre="";
	this.notas.data=[];
				return _.rget(`notas/dac/${id_docentes}`).then((r)=>{//13
					this.options.dac = r.data;
				});
			},*/
			dre() {
				this.f._id_dre = "";
				this.notas.data = [];
				return _.rget(`notas/dre/${this.f._id_dac}`).then((r) => {
					//5
					this.options.dre = r.data;
				});
			},
			estu() {
				return _.rget(`notas/estu`, {
					_id_docentes_asignar_cursos: this.f._id_dac,
					_id_actividades_cursos: this.f._id_dre,
				}).then((r) => {
					//5
					this.notas.data = r.data;
				});
			},

			editarNota(row) {
				if (row.valor >= 0 && row.valor <= 10) {
					this.$q.loading.show();
					_.rput(`notas/${row.id}`, null, {
						ids: row.id,
						valorss: row.valor,
					})
						.then((r) => {
							this.estu();
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
						message: "Calificación desde 0 hasta 10",
					});
				}
			},
			/*editarActividadCurso(row) {
				this.modal('actividad_curso', {
					formOld: row
				});
			},*/

			nuevaNota(row) {
				/*	if(row.valor!== null && row.valor!== ''&& row.id!== null && row.id!== ''){
					this.$q.notify({
						type: 'negative',
						message: 'Ya esta calificada'
					});
					this.deshabilitar=true;

				}else{
				
				*/

				if (row.valor >= 0 && row.valor <= 10 && row.spa == 1) {
					this.$q.loading.show();
					_.rpost("notas", null, {
						_id_matriculas: row.id_matriculas,
						_id_actividades_cursos: this.f._id_dre,
						_valor: row.valor,
					})
						.then((r) => {
							this.deshabilitar = true;

							this.estu();
							this.$q.notify({
								type: "positive",
								message: "Guardada con exito",
								timeout: 500,
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
						message: "Calificación desde 0 hasta 10",
					});
				}
				//}
			},
			listaActividadesCursos() {
				this.actividades_cursos.loading = true;
				_.rget("actividades_cursos")
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
