<template>
	<q-page class="q-pa-md">

		<div class="q-gutter-md row items-start">

      <div class="col">
        	<q-select standout="bg-deep-purple-6 text-white" label="Docentes" v-model="f._id_docentes"  @input="dac()" :options="options.docentes"  emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>
      <div class="col">
       	<q-select standout="bg-deep-purple-6 text-white" label="Curso -Paralelo -Materia" v-model="f._id_dac"  @input="practicas()"  :options="options.dac" emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>
	   <div class="col">
      	<q-select standout="bg-deep-purple-6 text-white" label=" Periodo-Parcial-Insumo" v-model="f._id_practica"  @input="report()" :options="options.practicas" emit-value map-options style="min-width: 150px"></q-select>

      </div>
	  
    </div>
	
	<br>	
	
	<br>	
		<q-table title="Reportes" :data="reportes.data" :columns="reportes.columns" row-key="id"
			:loading="reportes.loading">

			<template v-slot:header="props">
				<br>
				<q-tr  text-align: center  bgcolor="orange"   :props="props">
					<q-th style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.label }}
					</q-th>
				</q-tr>
			</template>


			<template v-slot:body="props">
				<q-tr   :props="props">
					<q-td style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.value }}
					</q-td>
					
					<!--	<q-input 
							
							v-model.number="props.row.valor" 
					
							:readonly="props.row.spa==0"
		
							:min="0" :max="10">
						</q-input>-->
					
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



				f:{
					_id_docentes:"",
					_id_dac:"",
					_id_practica:"",
					_id_repot:"",
					
					
				},
				options:{
					
					docentes:[],
					dac:[],
					practicas:[],
					repot:[]
					

				},




			reportes: {
					loading: false,
					data:[],
					columns: [
						{
							name: "id_matriculas",
							field: "id_matriculas",
							label: "Matricula"
						},
						{
							name: "nombre",
							field: "nombre",
							label: "Estudiantes"
						},
						{
							name: "nota_final",
							field: "nota_final",
							label: "Nota Final"
						}

					]
				}
			}
		},
		created() {
			Promise.all([
				this.docentes(),
				//this.estudiantes()
				
			]).then((v)=>{
				this.init();
			});
			
		},
		methods: {
			
			docentes(){
					return _.rget("reportes/docentes").then((r)=>{//33
					this.options.docentes = r.data;
				});
			},
			dac(){
	this.f._id_dac="";
	this.f._id_practica="";
				return _.rget(`reportes/dac/${this.f._id_docentes}`).then((r)=>{//13
					this.options.dac = r.data;
				});
			},
			practicas(){
				this.f._id_practica="";
				return _.rget(`reportes/practicas/${this.f._id_dac}`).then((r)=>{//5
					this.options.practicas = r.data;
				});
			},
			repot(){
				console.log("ddd")
				return _.rget(`reportes/repot`,{
					_id_docentes_asignar_cursos:this.f._id_dac,
					_id_insumos:this.f._id_practica
				}).then((r)=>{//5
					this.notas.data=r.data;
				});
			},

			
			/*editarActividadCurso(row) {
				this.modal('actividad_curso', {
					formOld: row
				});
			},*/
			nuevoNota() {
				//this.modal('actividad_curso', {});
			},
			listaActividadesCursos() {
				this.actividades_cursos.loading = true;
				_.rget("actividades_cursos").then((r) => {
					this.actividades_cursos.data = r.data;
				}).finally(() => {
					this.actividades_cursos.loading = false;
				})
			}
		}
	}
</script>