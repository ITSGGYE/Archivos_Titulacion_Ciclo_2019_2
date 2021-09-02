<template>
	<q-page class="q-pa-md">


    <div class="q-gutter-md row items-start">

     <!-- <div class="col">
        	<q-select standout="bg-deep-purple-6 text-white" label="Docentes" v-model="f._id_docentes"  @input="dac()" :options="options.docentes"  emit-value map-options style="min-width: 150px"> </q-select>
		
      </div>-->
     
	   <div class="col">
      	<q-select standout="bg-deep-purple-6 text-white" label=" Año Lectivo" @input="ctg_periodos()" v-model="f._id_anos_lectivos" :options="options.anos_lectivos" emit-value map-options style="min-width: 150px"></q-select>

      </div>
	  
    </div>
	
	<br>	
	
	<br>	
		<q-table class="q-pa-md"  title="Periodos" :data="practicas.data" :columns="practicas.columns" row-key="id" :loading="practicas.loading"> 
				
			<template v-slot:top-right>
			
			</template>
			

			<template v-slot:header="props">
				<br>
				<q-tr  text-align: center  bgcolor="orange"   :props="props">
					<q-th style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.label }}
					</q-th>
					<q-th style="text-align: center;" >Periodos</q-th>
					<q-th auto-width></q-th>
				</q-tr>
			</template>


			<template v-slot:body="props">
				<q-tr   :props="props">
					<q-td style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.value }}
					</q-td>
					<q-td  align="center" valign="center">
						
      <q-checkbox 
	  toggle-indeterminate 
	  v-model="props.row._id_ctlg_periodos" 
	  />
    
						
						 <!--<q-input 
    	v-model.number="props.row.valor" 
      type="number"
      filled
      style="max-width: 200px"
	  :readonly="props.row.spa==0"
		
	  :step="0.01"
	  :min="0" :max="10"
    />-->

					</q-td>
					<!--<q-td auto-width>
						<q-btn color="primary" round dense icon="save" @click="editarNota(props.row)"></q-btn>
					</q-td>-->
				</q-tr>
			</template>



			<template v-slot:loading>
				<q-inner-loading showing color="primary"></q-inner-loading>
			</template>
			<template v-slot:top-right>
				<q-btn color="primary"   label="Guardar"  @click="guardar"></q-btn>
			</template>
		</q-table>
	</q-page>
</template>

<script>
	export default {
		data() {
			return {



				f:{
					
					_id_anos_lectivos:"",
					_id_ctlg_periodos:""
					
					
				},
				options:{
					
					anos_lectivos:[],
					ctlg_periodos:[],
					

				},




				practicas: {
					loading: false,
					data:[],
					columns: [
						{
							name: "id",
							field: "id",
							label: "ID"
						},
						{
							name: "nombre",
							field: "nombre",
							label: "ctg_periodos"
						}
					]
				}
			}
		},
		created() {
			//console.log(this.$root.currentPage.app.informacion)
			Promise.all([
				this.anos_lectivos(),
				this.ctlg_periodos()
				//this.dac(this.$root.currentPage.app.informacion.id_docentes)
			]).then((v)=>{
				this.init();
			});
			
		},
		/*mounted(){
			this.dac();
		},*/
		methods: {
			
			anos_lectivos(){
				
					return _.rget("practicas/anos_lectivos").then((r)=>{//33
					this.options.anos_lectivos = r.data;
				});
			},
			
			ctlg_periodos(){

				return _.rget("practicas/ctlg_periodos").then((r)=>{//5
					this.practicas.data=r.data;
				});
			},

			guardar(){
					

				this.$q.loading.show();
				_.rpost("practicas",null,{
					_id_anos_lectivos:row.id_anos_lectivos,
			 
			 _id_ctlg_periodos :row.periodos
				}).then((r)=>{
					
					this.ctlg_periodos();
				}).catch((r)=>{
					this.$q.notify({
						type: 'negative',
						message: r.message || 'Hubo un error al guardar'
					});
				}).finally(()=>{
					this.$q.loading.hide();
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