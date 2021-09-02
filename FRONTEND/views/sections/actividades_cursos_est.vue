<template>
	<q-page class="q-pa-md">
		<!--<div class="q-pa-md q-gutter-sm">
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
		</div>-->
		<br />

		<!--<div v-if="isHidden">-->
		<div class="q-gutter-md row items-start">
			<div class="col">
				<q-select
					standout="bg-deep-purple-6 text-white"
					label="Año Lectivo"
					v-model="f._id_anos_lectivos"
					@input="periodos()"
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
					standout="bg-deep-purple-6 text-white"
					label=" Periodo"
					v-model="f._id_periodos"
					@input="parciales()"
					:options="options.periodos"
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
					:options="options.parciales"
					emit-value
					map-options
					style="min-width: 150px"
				></q-select>
				<!--<div>
		  Model:{{f._id_estudiantes}}
	  </div>-->
			</div>
		</div>

		<br />

		<br />

		<q-table
			class="q-my-sm q-mr-md"
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
				<q-tr text-align: center bgcolor=" #3949ab " :props="props">
					<q-th
						style="text-align: center; color: #ffffff"
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
						<div v-else-if="col.value === null || col.value === ''">
							<q-badge color="dark">
								{{ col.value | upper }}
							</q-badge>
						</div>

						<div v-else>
							{{ col.value | upper }}
						</div>
					</q-td>
				</q-tr>
				<!--	<q-tr
						v-show="ids == props.row.moco && props.expand"
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
		<!--</div>

		<div v-if="isHidden == false">
			<div class="q-gutter-md row items-start">
				<div class="col">
					<q-select
						standout="bg-deep-purple-6 text-white"
						label="Año Lectivo"
						v-model="f._id_anos_lectivos"
						@input="periodos()"
						:options="options.anos_lectivos"
						emit-value
						map-options
						style="min-width: 150px;"
					>
					</q-select>
				</div>-->
		<!--  <div class="col">
        	<q-select standout="bg-deep-purple-6 text-white" label="Docentes" v-model="f._id_docentes"  @input="dac()" :options="options.docentes"  emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>-->

		<!--	<div class="col">
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
						<q-td auto-width>
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
		<!--		</q-td>
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
						</q-td>
					</q-tr>
				</template>

				<template v-slot:loading>
					<q-inner-loading showing color="primary"></q-inner-loading>
				</template>
			</q-table>
		</div>-->
	</q-page>
</template>

<script>
	export default {
		data() {
			return {
				filter: "",
				/*ids: -1,
				suma: 0,
				formActualizar: false,
				sumass: " ",
				exa: 0,
				isHidden: true,*/

				f: {
					_id_anos_lectivos: "",
					_id_estudiantes: this.$root.currentPage.app.informacion
						.id_estudiantes,
					_id_periodos: "",
					_id_parciales: "",

					_notas: "",
				},
				options: {
					anos_lectivos: [],
					estudiantes: [],

					parciales: [],
					periodos: [],
					generales: [],
					//quintos:[],
				},

				notas: {
					loading: false,
					data: [],
					columns: [
						{
							name: "materia",
							field: "materia",
							label: "Materias",
						},
						{
							name: "insumo",
							field: "insumo",
							label: "Insumo",
						},
						{
							name: "descripcion",
							field: "descripcion",
							label: "Descripcion",
						},
						{
							name: "nota",
							field: "nota",
							label: "Nota",
						},
					],
					/*qui: [
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
							name: "examen",
							field: "examen",
							label: "Examen",
						},
					],*/
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
					this.$root.currentPage.app.informacion.id_estudiantes
				),
			]).then((v) => {
				this.init();
			});
		},

		methods: {
			anos_lectivos(id_estudiantes) {
				return _.rget(`notas/estu_ano/${id_estudiantes}`).then((r) => {
					this.options.anos_lectivos = r.data;
					console.log(
						this.$root.currentPage.app.informacion.id_estudiantes
					);
				});
			},

			periodos() {
				return _.rget(`periodos/ctlg/${this.f._id_anos_lectivos}`).then(
					(r) => {
						this.options.periodos = r.data;
						console.log(
							this.$root.currentPage.app.informacion
								.id_estudiantes
						);
					}
				);
			},

			parciales() {
				this.notas.data = [];
				return _.rget(`parciales/ctlg/${this.f._id_periodos}`).then(
					(r) => {
						this.options.parciales = r.data;
					}
				);
			},

			generales() {
				return _.rget(`notas/notas_actividades`, {
					_id_estudiantess: this.$root.currentPage.app.informacion
						.id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
					_id_parcialess: this.f._id_parciales,
				}).then((r) => {
					//5
					this.notas.data = r.data;
				});
			},
			/*	quintos() {
				return _.rget(`notas/notas_quimestrales_estudiante`, {
					_id_estudiantess: this.$root.currentPage.app.informacion
						.id_estudiantes,
					_id_anos_lectivoss: this.f._id_anos_lectivos,
					_id_periodoss: this.f._id_periodos,
				}).then((r) => {
					//5
					this.notas.data = r.data;
				});
			},*/

			/*

			sumar(row) {
				totales=0;
				suma=[row.act_grupal,row.leccion,row.act_individual , row.tarea, row.evaluacion_escrita];
				n=suma.filter(suma>=0);
				totales=(n.reduce((a, b) => a + b, 0)/n.length).toFixed(2);
				this.suma=totales;



	       },*/
			editarNota(row) {
				this.ids = row.moco;
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
				console.log("eee" + totales);
			},
			editarQui(row) {
				this.ids = row.ma;
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
