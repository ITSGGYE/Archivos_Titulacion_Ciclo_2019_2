<template>
	<q-page class="q-pa-md">
		<div class="q-pa-md q-gutter-sm">
			<div class="q-gutter-sm">
				<span> Buscar por: </span>
				<q-radio
					dense
					v-model="isHidden"
					:val="true"
					label="Parcial"
				></q-radio>
				<q-radio
					dense
					v-model="isHidden"
					:val="false"
					label="Quimestral"
				></q-radio>
			</div>
		</div>
		<br />

		<div v-if="isHidden">
			<div class="q-gutter-md row items-start">
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Año Lectivo"
						v-model="f._id_anos_lectivos"
						@input="dac()"
						:options="options.anos_lectivos"
						emit-value
						map-options
						style="min-width: 150px;"
					>
					</q-select>
				</div>
				<!--  <div class="col">
        	<q-select standout="bg-deep-purple-6 text-white" label="Docentes" v-model="f._id_docentes"  @input="dac()" :options="options.docentes"  emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>-->
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Curso -Aula/Paralelo -Materia"
						v-model="f._id_dac"
						@input="periodos()"
						:options="options.dac"
						emit-value
						map-options
						style="min-width: 150px;"
					>
					</q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="parciales()"
						:options="options.periodos"
						emit-value
						map-options
						style="min-width: 150px;"
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
						emit-value
						map-options
						style="min-width: 150px;"
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
							style="text-align: center;"
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
							style="text-align: center;"
							v-for="col in props.cols"
							:key="col.name"
							:props="props"
						>
							<div
								v-if="
									col.value < 7 &&
									col.value !== null &&
									col.value !== ''
								"
							>
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
									editarNota(
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
						v-show="ids == props.row.id && props.expand"
						:props="props"
					>
						<q-td colspan="100%" class="text-purple">
							<q-input
								color="text-purple"
								v-model="sumass"
								label="Promedio"
								readonly
							></q-input>
						</q-td>
					</q-tr>-->
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>
		<div v-if="isHidden == false">
			<div class="q-gutter-md row items-start">
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Año Lectivo"
						v-model="f._id_anos_lectivos"
						@input="dac()"
						:options="options.anos_lectivos"
						emit-value
						map-options
						style="min-width: 150px;"
					>
					</q-select>
				</div>

				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Curso -Aula/Paralelo -Materia"
						v-model="f._id_dac"
						@input="periodos()"
						:options="options.dac"
						emit-value
						map-options
						style="min-width: 150px;"
					>
					</q-select>
				</div>
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label=" Periodo"
						v-model="f._id_periodos"
						@input="quintos()"
						:options="options.periodos"
						emit-value
						map-options
						style="min-width: 150px;"
					></q-select>
				</div>
			</div>

			<br />

			<br />
			<q-table
				class="q-pa-md"
				title="Notas"
				:data="notas.data"
				:columns="notas.qui"
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
							style="text-align: center;"
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
							style="text-align: center;"
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
					<!--	<q-td auto-width>
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
						v-show="ids == props.row.id && props.expand"
						:props="props"
					>
						<q-td colspan="100%" class="text-purple">
							<q-input
								color="text-purple"
								v-model="sumass"
								label="Promedio"
								readonly
							></q-input>
						</q-td>
					</q-tr>-->
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
				formActualizar: false,
				sumass: " ",
				isHidden: true,

				f: {
					_id_anos_lectivos: "",
					_id_docentes: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_dac: "",
					//_id_dre:"",
					_id_periodos: "",
					_id_parciales: "",

					_notas: "",
				},
				options: {
					anos_lectivos: [],
					docentes: [],
					dac: [],
					parciales: [],
					periodos: [],
					generales: [],
					quintos: [],
				},

				notas: {
					loading: false,
					data: [],
					columns: [
						{
							name: "cedula",
							field: "cedula",
							label: "Cedula",
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
						}
					],
					qui: [
						{
							name: "cedula",
							field: "cedula",
							label: "Cedula",
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
			console.log(this.$root.currentPage.app.informacion);
			Promise.all([
				//this.docentes(),
				this.anos_lectivos(
					this.$root.currentPage.app.informacion.id_docentes
				),
			]).then((v) => {
				this.init();
			});
		},

		methods: {
			docentes() {
				return _.rget("notas/docentes").then((r) => {
					//33
					this.options.docentes = r.data;
				});
			},

			anos_lectivos(id_docentes) {
				return _.rget(
					`docentes_asignar_cursos/docentes_asignar_anoreporte/${id_docentes}`
				).then((r) => {
					this.options.anos_lectivos = r.data;
				});
			},

			/*docentes(){
				return _.rget(`notas/docentes_anos/${this.f._id_anos_lectivos}`).then((r)=>{
					this.options.docentes = r.data;
				});
			},
*/
			dac() {
				this.f._id_dac = "";
				this.f._id_dre = "";
				this.notas.data = [];
				return _.rget(`notas/dac_ano`, {
					_id_docente: this.$root.currentPage.app.informacion
						.id_docentes,
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
				this.notas.data = [];
				return _.rget(`notas/parciales/${this.f._id_periodos}`).then(
					(r) => {
						//5
						this.options.parciales = r.data;
					}
				);
			},

			periodos() {
				//this.f._id_dre="";
				this.notas.data = [];
				return _.rget(`notas/periodos/${this.f._id_dac}`).then((r) => {
					//5
					this.options.periodos = r.data;
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
				return _.rget(`notas/notas_finales_parcial_periodo_curso`, {
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_docentess: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_dacss: this.f._id_dac,
					_id_periodoss: this.f._id_periodos,
					_id_parcialess: this.f._id_parciales,
				}).then((r) => {
					//5
					this.notas.data = r.data;
				});
			},
			quintos() {
				return _.rget(`notas/notas_finales_quimestral`, {
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_docentess: this.$root.currentPage.app.informacion
						.id_docentes,
					_id_dacss: this.f._id_dac,
					_id_periodoss: this.f._id_periodos,
				}).then((r) => {
					//5
					this.notas.data = r.data;
				});
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
				n = suma.filter(suma >= 0);
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
				console.log("eee" + this.sumass);
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
				console.log("eee" + this.sumass);
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
