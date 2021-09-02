<template>
	<q-page class="q-pa-md">
		<div class="q-pa-md q-gutter-sm">
			<div class="q-gutter-sm">
				<span>Buscar por:</span>
				<q-radio
					dense
					v-model="isHidden"
					:val="1"
					label="Curso Parcial"
				></q-radio>
				<q-radio
					dense
					v-model="isHidden"
					:val="2"
					:loading="true"
					label="Curso Quimestral"
				></q-radio>
				<q-radio
					dense
					v-model="isHidden"
					:val="3"
					label="Estudiante Parcial"
				></q-radio>
				<q-radio
					dense
					v-model="isHidden"
					:val="4"
					label="Estudiante Quimestre"
				></q-radio>
			</div>
		</div>
		<br />

		<div v-if="isHidden == 1">
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
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Docentes"
						v-model="f._id_docentes"
						@input="dac()"
						:options="options.docentes"
						:loading="loadingSelect.docentes"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Curso -Aula/Paralelo -Materia"
						v-model="f._id_dac"
						@input="periodos(), etiquetas_dac()"
						:options="options.dac"
						:loading="loadingSelect.dac"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="parciales()"
						:options="options.periodos"
						:loading="loadingSelect.periodos"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Parcial"
						v-model="f._id_parciales"
						@input="generales()"
						v-show="sumar"
						:options="options.parciales"
						:loading="loadingSelect.parciales"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
			</div>

			<br />

			<br />

			<q-table
				class="q-my-sm q-pa-md"
				title="Notas"
				:data="notas.data"
				:columns="notas.columns"
				row-key="id"
				:filter="filter"
				:loading="notas.loading"
				id="tblData"
				hide-bottom
			>
				<template v-slot:top-right>
					<div class="q-gutter-md row">
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
							style="text-align: center"
							v-for="col in props.cols"
							:key="col.name"
							:props="props"
							>{{ col.label }}</q-th
						>
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
							<div v-if="col.value < 7 && col.value !== null">
								<q-badge color="negative">{{
									col.value | upper
								}}</q-badge>
							</div>
							<div
								v-else-if="
									col.value === null || col.value === ''
								"
							>
								<q-badge color="dark">{{
									col.value | upper
								}}</q-badge>
							</div>

							<div v-else>{{ col.value | upper }}</div>
						</q-td>
					</q-tr>
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>

		<!-- ///////////////////////////////////   Cursos Quimestre  ////////////////////////// -->

		<div v-if="isHidden == 2">
			<div class="q-gutter-md row items-start">
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
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Docentes"
						v-model="f._id_docentes"
						@input="dac()"
						:options="options.docentes"
						:loading="loadingSelect.docentes"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Curso -Aula/Paralelo -Materia"
						v-model="f._id_dac"
						@input="periodos(), etiquetas_dac()"
						:options="options.dac"
						:loading="loadingSelect.dac"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="quintos()"
						:options="options.periodos"
						:loading="loadingSelect.periodos"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
			</div>

			<br />

			<br />
			<q-table
				class="q-pa-md"
				title="Notas"
				:data="notas_quimi.data"
				:columns="notas_quimi.qui"
				row-key="id"
				:filter="filter"
				:loading="notas_quimi.loading"
				hide-bottom
			>
				<template v-slot:top-right>
					<div class="q-gutter-md row">
						<q-btn color="teal" icon="save_alt" @click="excels">
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
							style="text-align: center"
							v-for="col in props.cols"
							:key="col.name"
							:props="props"
							>{{ col.label }}</q-th
						>
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
							<div v-if="col.value < 7 && col.value !== null">
								<q-badge color="negative">
									{{ col.value | upper }}</q-badge
								>
							</div>
							<div
								v-else-if="
									col.value === null || col.value === ''
								"
							>
								<q-badge color="dark">{{
									col.value | upper
								}}</q-badge>
							</div>

							<div v-else>{{ col.value | upper }}</div>
						</q-td>
					</q-tr>
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>

		<!-- ///////////////////////////////////   Estudiante Parcial  ////////////////////////// -->

		<div v-if="isHidden == 3">
			<div class="q-gutter-md row items-start">
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Año Lectivo"
						v-model="f._id_anos_lectivos"
						@input="periodosss(), estudiantes()"
						:options="options.anos_lectivos"
						emit-value
						map-options
						style="min-width: 150px"
					>
					</q-select>
				</div>
				<div class="col">
					<q-select
						class="text-capitalize"
						standout="bg-deep-purple-6 text-white"
						label=" Estudiante"
						v-model="f._id_estudiantes"
						:options="options.estudiantes"
						:loading="loadingSelect.estudiantes"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="parciales()"
						:options="options.periodosss"
						:loading="loadingSelect.periodosss"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Parcial"
						v-model="f._id_parciales"
						@input="report_parciales(), etiquetas_datos_parc()"
						:options="options.parciales"
						:loading="loadingSelect.parciales"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
			</div>

			<br />

			<br />

			<q-table
				class="q-pa-md"
				title="Notas"
				:data="estParcial.data"
				:columns="estParcial.report_parcial"
				row-key="id"
				:filter="filter"
				:loading="estParcial.loading"
				hide-bottom
			>
				<template v-slot:top-right>
					<div class="q-gutter-md row">
						<q-btn color="teal" icon="save_alt" @click="parc_est">
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
							style="text-align: center"
							v-for="col in props.cols"
							:key="col.name"
							:props="props"
						>
							{{ col.label }}
						</q-th>
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
							<div v-if="col.value < 7 && col.value !== null">
								<q-badge color="negative">
									{{ col.value | upper }}
								</q-badge>
							</div>
							<div
								v-else-if="
									col.value === null || col.value === ''
								"
							>
								<q-badge color="dark">
									{{ col.value | upper }}
								</q-badge>
							</div>

							<div v-else>
								{{ col.value | upper }}
							</div>
						</q-td>
					</q-tr>
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>

		<!-- ///////////////////////////////////   Estudiante Quimestre  ////////////////////////// -->

		<div v-if="isHidden == 4">
			<div class="q-gutter-md row items-start">
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Año Lectivo"
						v-model="f._id_anos_lectivos"
						@input="periodosss(), estudiantes()"
						:options="options.anos_lectivos"
						emit-value
						map-options
						style="min-width: 150px"
					>
					</q-select>
				</div>
				<!--  <div class="col">
        	<q-select standout="bg-deep-purple-6 text-white" label="Docentes" v-model="f._id_docentes"  @input="dac()" :options="options.docentes"  emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>-->
				<div class="col">
					<q-select
						class="text-capitalize"
						standout="bg-deep-purple-6 text-white"
						label=" Estudiante"
						v-model="f._id_estudiantes"
						:options="options.estudiantes"
						:loading="loadingSelect.estudiantes"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>

				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="libres(), etiquetas_datos()"
						:options="options.periodosss"
						:loading="loadingSelect.periodosss"
						emit-value
						map-options
						style="min-width: 150px"
					></q-select>
				</div>
			</div>

			<br />

			<br />
			<q-table
				class="q-pa-md"
				title="Notas"
				:data="matru.data"
				:columns="matru.libre"
				row-key="id"
				:filter="filter"
				:loading="matru.loading"
				hide-bottom
			>
				<template v-slot:top-right>
					<div class="q-gutter-md row">
						<q-btn color="teal" icon="save_alt" @click="qui_est">
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
							style="text-align: center"
							v-for="col in props.cols"
							:key="col.name"
							:props="props"
						>
							{{ col.label }}
						</q-th>
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
							<div v-if="col.value < 7 && col.value !== null">
								<q-badge color="negative">
									{{ col.value | upper }}
								</q-badge>
							</div>
							<div
								v-else-if="
									col.value === null || col.value === ''
								"
							>
								<q-badge color="dark">
									{{ col.value | upper }}
								</q-badge>
							</div>

							<div v-else>
								{{ col.value | upper }}
							</div>
						</q-td>
						<!--<q-td auto-width>
							<q-btn
								size="sm"
								color="accent"
								round
								dense
								@click="
									editarQui(
										props.row,
										(props.expand = !props.expand)
									)
								"
								:icon="props.expand ? 'remove' : 'add'"
							/>-->

						<!--<q-btn color="primary" round dense icon="edit" @click="editarNota(props.row)"></q-btn>
					-->
						<!--	</q-td>
					</q-tr>
					<q-tr
						v-show="ids == props.row.ma && props.expand"
						:props="props"
					>
						<q-td colspan="100%" class="text-purple">
							<q-input
								color="text-purple"
								v-model="sumass"
								label="Promedio"
								readonly
							></q-input>
						</q-td>-->
					</q-tr>
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>
	</q-page>
</template>

<script>
	export default {
		data() {
			return {
				filter: "",
				ids: -1,
				suma: 0,
				exa: 0,
				formActualizar: false,
				sumass: " ",
				isHidden: 1,
				y: "",

				loadingSelect: {
					docentes: false,
					dac: false,
					parciales: false,
					periodos: false,
					periodosss: false,
					estudiantes: false,
				},

				f: {
					_id_anos_lectivos: "",
					_id_docentes: "",
					_id_dac: "",
					//_id_dre:"",
					_id_periodos: "",
					_id_parciales: "",
					_id_estudiantes: "",

					_notas: "",
				},
				options: {
					anos_lectivos: [],
					docentes: [],
					dac: [],
					parciales: [],
					periodos: [],
					periodosss: [],
					generales: [],
					estudiantes: [],
					libres: [],
					etiquetas_datos: [],
					etiquetas_dac: [],
					quintos: [],
				},

				notas: {
					loading: false,
					data: [],
					columns: [
						{
							name: "cedula",
							field: "cedula",
							label: "Cédula",
						},
						{
							name: "estudiante",
							field: "estudiante",
							label: "Estudiante",
						},
						{
							name: "tarea",
							field: "tarea",
							label: "Tarea",
						},
						{
							name: "leccion",
							field: "leccion",
							label: "Lección",
						},
						{
							name: "act_individual",
							field: "act_individual",
							label: "Act. Individual",
						},
						{
							name: "act_grupal",
							field: "act_grupal",
							label: "Act. Grupal",
						},
						{
							name: "evaluacion_escrita",
							field: "evaluacion_escrita",
							label: "Evaluación Escrita",
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Promedio",
						},
					],
					/*	qui: [
						{
							name: "cedula",
							field: "cedula",
							label: "Cédula",
						},
						{
							name: "estudiante",
							field: "estudiante",
							label: "Estudiante",
						},
						{
							name: "parcial_1",
							field: "parcial_1",
							label: "1er. Parcial",
						},
						{
							name: "parcial_2",
							field: "parcial_2",
							label: "2do. Parcial",
						},
						{
							name: "parcial_3",
							field: "parcial_3",
							label: "3er. Parcial",
						},
						{
							name: "total_parcial",
							field: "total_parcial",
							label: "80% Parciales",
						},
						{
							name: "examen",
							field: "examen",
							label: "Examen",
						},
						{
							name: "total_examen",
							field: "total_examen",
							label: "20% Examen",
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Promedio Quimestral",
						},
					],*/
				},

				notas_quimi: {
					loading: false,
					data: [],
					qui: [
						{
							name: "cedula",
							field: "cedula",
							label: "Cédula",
						},
						{
							name: "estudiante",
							field: "estudiante",
							label: "Estudiante",
						},
						{
							name: "parcial_1",
							field: "parcial_1",
							label: "1er. Parcial",
						},
						{
							name: "parcial_2",
							field: "parcial_2",
							label: "2do. Parcial",
						},
						{
							name: "parcial_3",
							field: "parcial_3",
							label: "3er. Parcial",
						},
						{
							name: "total_parcial",
							field: "total_parcial",
							label: "80% Parciales",
						},
						{
							name: "examen",
							field: "examen",
							label: "Examen",
						},
						{
							name: "total_examen",
							field: "total_examen",
							label: "20% Examen",
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Promedio Quimestral",
						},
					],
				},

				matru: {
					loading: false,
					data: [],
					libre: [
						{
							name: "materia",
							field: "materia",
							label: "Materias",
						},
						{
							name: "parcial_1",
							field: "parcial_1",
							label: "1er. Parcial",
						},
						{
							name: "parcial_2",
							field: "parcial_2",
							label: "2do. Parcial",
						},
						{
							name: "parcial_3",
							field: "parcial_3",
							label: "3er. Parcial",
						},
						{
							name: "total_parcial",
							field: "total_parcial",
							label: "80% Parciales",
						},
						{
							name: "examen",
							field: "examen",
							label: "Examen",
						},
						{
							name: "total_examen",
							field: "total_examen",
							label: "20% Examen",
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Promedio Quimestral",
						},
					],
				},

				estParcial: {
					loading: false,
					data: [],

					report_parcial: [
						{
							name: "materia",
							field: "materia",
							label: "Materias",
						},
						{
							name: "tarea",
							field: "tarea",
							label: "Tarea",
						},
						{
							name: "leccion",
							field: "leccion",
							label: "Lección",
						},
						{
							name: "act_individual",
							field: "act_individual",
							label: "Act. Individual",
						},
						{
							name: "act_grupal",
							field: "act_grupal",
							label: "Act. Grupal",
						},
						{
							name: "evaluacion_escrita",
							field: "evaluacion_escrita",
							label: "Evaluación Escrita",
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Promedio",
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
		watch: {
			isHidden: function (value) {
				this.limpiarSelect();
			},
		},

		methods: {
			limpiarSelect() {
				this.f._id_anos_lectivos = "";
				this.f._id_docentes = "";
				this.f._id_dac = "";

				this.f._id_periodos = "";
				this.f._id_parciales = "";
				this.f._id_estudiantes = "";
			},

			excel() {
				this.report(
					"Reporte " + this.y,
					this.notas.columns,
					this.notas.data
				);
			},

			excels() {
				this.report(
					"Reporte " + this.y,
					this.notas_quimi.qui,
					this.notas_quimi.data
				);
			},
			parc_est() {
				this.report(
					//"REPORTE " + this.y,
					this.y,
					this.estParcial.report_parcial,
					this.estParcial.data
				);
			},
			qui_est() {
				this.report(this.y, this.matru.libre, this.matru.data);
			},
			anos_lectivos() {
				//this.notas_quimi.data = [];
				return _.rget("anos_lectivos/anos_lectivosreport").then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},

			docentes() {
				this.f._id_docentes = "";
				this.notas.data = [];
				//this.notas_quimi.data = [];
				this.loadingSelect.docentes = true;
				return _.rget(`notas/docentes_anos/${this.f._id_anos_lectivos}`)
					.then((r) => {
						this.options.docentes = r.data;
					})
					.finally(() => {
						this.loadingSelect.docentes = false;
					});
			},

			dac() {
				this.f._id_dac = "";
				this.f._id_dre = "";
				this.notas.data = [];
				//this.notas_quimi.data = [];
				this.loadingSelect.dac = true;
				return _.rget(`notas/dac_ano`, {
					_id_docente: this.f._id_docentes,
					_id_anos_lectivo: this.f._id_anos_lectivos,
				})
					.then((r) => {
						//5
						this.options.dac = r.data;
					})
					.finally(() => {
						this.loadingSelect.dac = false;
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
							},
							dre(){
								this.f._id_dre="";
								this.notas.data=[];
								return _.rget(`notas/dre/${this.f._id_dac}`).then((r)=>{//5
									this.options.dre = r.data;
								});
							},*/

			parciales() {
				//this.f._id_dre="";
				this.f._id_parciales = "";
				this.notas.data = [];
				this.loadingSelect.parciales = true;
				return _.rget(`notas/parciales/${this.f._id_periodos}`)
					.then((r) => {
						//5
						this.options.parciales = r.data;
					})
					.finally(() => {
						this.loadingSelect.parciales = false;
					});
			},

			periodos() {
				this.f._id_periodos = "";
				this.notas.data = [];

				this.loadingSelect.periodos = true;
				return _.rget(`notas/periodos/${this.f._id_dac}`)
					.then((r) => {
						//5
						this.options.periodos = r.data;
					})
					.finally(() => {
						this.loadingSelect.periodos = false;
					});
			},

			estudiantes() {
				this.f._id_estudiantes = "";
				this.matru.data = [];
				this.loadingSelect.estudiantes = true;
				return _.rget(`notas/ano_estud/${this.f._id_anos_lectivos}`)
					.then((r) => {
						this.options.estudiantes = r.data;

						//this.matru.data = r.data;
					})
					.finally(() => {
						this.loadingSelect.estudiantes = false;
					});
			},

			periodosss() {
				this.f._id_periodos = "";
				this.matru.data = [];
				this.loadingSelect.periodosss = true;
				return _.rget(`periodos/ctlg/${this.f._id_anos_lectivos}`)
					.then((r) => {
						this.options.periodosss = r.data;
					})
					.finally(() => {
						this.loadingSelect.periodosss = false;
					});
			},

			/*estu(){
								return _.rget(`notas/estu`,{
									_id_docentes_asignar_cursos:this.f._id_dac,
									_id_actividades_cursos:this.f._id_dre
								}).then((r)=>{//5
									this.notas.data=r.data;
								});
							},*/

			generales() {
				this.notas.loading = true;
				return _.rget(`notas/notas_finales_parcial_periodo_curso`, {
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_docentess: this.f._id_docentes,
					_id_dacss: this.f._id_dac,
					_id_periodoss: this.f._id_periodos,
					_id_parcialess: this.f._id_parciales,
				})
					.then((r) => {
						//5
						this.notas.data = r.data;
					})
					.finally(() => {
						this.notas.loading = false;
					});
			},
			quintos() {
				this.notas_quimi.loading = true;
				return _.rget(`notas/notas_finales_quimestral`, {
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_docentess: this.f._id_docentes,
					_id_dacss: this.f._id_dac,
					_id_periodoss: this.f._id_periodos,
				})
					.then((r) => {
						//5
						this.notas_quimi.data = r.data;
					})
					.finally(() => {
						this.notas_quimi.loading = false;
					});
			},

			libres() {
				this.matru.loading = true;
				return _.rget(`notas/notas_quimestrales_estudiante`, {
					_id_estudiantess: this.f._id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
				})
					.then((r) => {
						//5
						this.matru.data = r.data;
					})
					.finally(() => {
						this.matru.loading = false;
					});
			},

			report_parciales() {
				this.estParcial.loading = true;
				return _.rget(`notas/notas_finales_estudiante`, {
					_id_estudiantess: this.f._id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
					_id_parcialess: this.f._id_parciales,
				})
					.then((r) => {
						this.estParcial.data = r.data;
					})
					.finally(() => {
						this.estParcial.loading = false;
					});
			},

			etiquetas_datos() {
				return _.rget(`notas/estudiantes_periodo_libreta`, {
					_id_estudiantess: this.f._id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
				}).then((r) => {
					this.options.etiquetas_datos = r.data[0].label;
					this.y = this.options.etiquetas_datos;
					//console.log(this.y)
				});
			},

			etiquetas_datos_parc() {
				return _.rget(`notas/estudiantes_parcial_libreta`, {
					_id_estudiantess: this.f._id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
					_id_parcialess: this.f._id_parciales,
				}).then((r) => {
					this.options.etiquetas_datos_parc = r.data[0].label;
					this.y = this.options.etiquetas_datos_parc;
					//console.log(this.y)
				});
			},

			etiquetas_dac() {
				return _.rget(`notas/dac_etiqueta/${this.f._id_dac}`).then(
					(r) => {
						this.options.etiquetas_dac = r.data[0].label;
						this.y = this.options.etiquetas_dac;
					}
				);
			},

			sumar(row) {
				totales = 0;
				suma = [
					row.act_grupal,
					row.leccion,
					row.act_individual,
					row.tarea,
					row.evaluacion_escrita,
				];
				n = suma.filter(Boolean);
				totales = (n.reduce((a, b) => a + b, 0) / n.length).toFixed(2);
				this.suma = totales;
			},
			editarNota(row) {
				this.ids = row.id;
				totales = 0;
				suma = [
					row.act_grupal,
					row.leccion,
					row.act_individual,
					row.tarea,
					row.evaluacion_escrita,
				];
				n = suma.filter((el) => el === 0 || Boolean(el));
				totales = (n.reduce((a, b) => a + b, 0) / n.length).toFixed(2);
				this.sumass = totales;
				this.formActualizar = true;
			},

			editarQui(row) {
				this.ids = row.id;
				pro_parcial = 0;
				pro_examen = 0;
				totales = 0;

				suma = [row.parcial_1, row.parcial_2, row.parcial_3];
				n = suma.filter((el) => el === 0 || Boolean(el));
				pro_parcial = (n.reduce((a, b) => a + b, 0) / n.length).toFixed(
					2
				);

				exa = [row.examen];
				z = exa.filter((el) => el === 0 || Boolean(el));
				pro_examen = (z.reduce((a, b) => a + b, 0) / z.length).toFixed(
					2
				);

				totales = (pro_parcial * 0.8 + pro_examen * 0.2).toFixed(2);

				this.sumass = totales;
				/*this.formActualizar = true;*/
				/*console.log("eee" + this.sumass);*/
			},
			//https://quasar.dev/style/sass-scss-variables
			exportTable() {
				// naive encoding to csv format
				/*const content = [
					this.columns.map((col) => wrapCsvValue(col.label)),
				]
					.concat(
						this.data.map((row) =>
							this.columns
								.map((col) =>
									wrapCsvValue(
										typeof col.field === "function"
											? col.field(row)
											: row[
													col.field === void 0
														? col.name
														: col.field
											  ],
										col.format
									)
								)
								.join(",")
						)
					)
					.join("\r\n");

				const status = exportFile(
					"table-export.csv",
					content,
					"text/csv"
				);

				if (status !== true) {
					this.$q.notify({
						message: "Browser denied file download...",
						color: "negative",
						icon: "warning",
					});
				}*/
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
