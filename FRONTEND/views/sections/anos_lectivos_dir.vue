<template>
	<q-page class="q-pa-md">
	<br />
		<q-table class="q-pa-md" title="Años Lectivos" :data="anos_lectivos.data" :columns="anos_lectivos.columns" row-key="id"  :filter="filter"
			:loading="anos_lectivos.loading">
			<template v-slot:top-right>
				<div class="q-gutter-md row">
<!--	<q-btn color="primary" icon-right="add" label="Nuevo año Lectivo" no-caps @click="nuevoAno"></q-btn>-->
					<q-btn color="teal" icon="save_alt" @click="excel">
							<q-tooltip>
								Exportar a Excel
							</q-tooltip>
						</q-btn>
					<q-input filled  borderless dense debounce="300" v-model="filter" placeholder="Buscar">
						<template v-slot:append>
							<q-icon name="search" />
						</template>
					</q-input>

				</div>
			</template>



			<template v-slot:header="props">
			<br />
				<q-tr  text-align: center  bgcolor="orange"   :props="props">
					<q-th auto-width style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.label }}
					</q-th>
					<q-th auto-width >Activar Año Lectivo</q-th>
				</q-tr>
			</template>


			<template v-slot:body="props">
				<q-tr  :props="props">
					<q-td style="text-align: center;" v-for="col in props.cols" :key="col.name" :props="props">
						{{ col.value }}
					</q-td>
					
					<q-td  auto-width style="text-align: center;">
					<!--	<span v-if="formActualizar && ids == props.row.id">
							<q-btn 
								color="primary" 
								round dense 
								icon="check_circle" 
								@click="guardar"
								>
							</q-btn>
							<q-btn  color="negative"  round dense icon="close"  @click="formActualizar = false"></q-btn>
						</span>   --> 
					<!--	<q-btn color="primary" round dense icon="edit" @click="editarAno(props.row)"></q-btn>-->
						 <q-toggle
							v-model="props.row.id_ctlg_estados" 
							size="md"
							checked-icon="check"
							color="green"
							unchecked-icon="clear"
							:false-value="2"
							:true-value="1"
							@input="editarAno(props.row)&& ids==props.row.id" 
							
						
				
						></q-toggle>
						
				
					</q-td>
				
			<!--	</q-tr>

				<q-tr v-show="formActualizar &&  ids == props.row.id" :props="props">
				<q-td colspan="100%">
				  <q-input 
					  v-model="nombress" 
					  label="Nombre" 
					  mask="#### - #### "
					  >
				  </q-input>
				</q-td>
			</q-tr>-->

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
				filter: '',
				formActualizar: false,
				ids:'',
				_id_ctlg_estados:'',
				nombress:'',
				
				
				

				anos_lectivos: {
					loading: false,
					columns: [
						{
							name: "nombre",
							field: "nombre",
							label: "Año Lectivo"
						}
					
					],
					data: []
				}
			}
		},
		created() {
			this.listaAnos();
			this.init();
		},
		methods: {
		/*	editarAno(row) {
				this.ids = row.id;
				this.nombress= row.nombre;
				this.formActualizar = true;
				
			},*/
			excel() {
				var nameReport = "Anos lectivos";
				var j = {
					name: nameReport,
					title: "Escuela Interamericana",
					subtitle: "reporte de estudiantes",
					cols: _.map(this.anos_lectivos.columns, (i) => {
						return [i.name, i.label];
					}),
					data: this.anos_lectivos.data,
				};

				axios({
					method: "post",
					url: api("catalogos/report"), //"http://localhost:3000/ex", //api("catalogos/report"),
					data: j,
					responseType: "blob",
				}).then((response) => {
					const url = window.URL.createObjectURL(
						new Blob([response.data])
					);
					const link = document.createElement("a");
					link.href = url;
					link.setAttribute("download", `${nameReport}.xlsx`);
					document.body.appendChild(link);
					link.click();
				});
			},

			editarAno(row) {
			
			_.rput(`anos_lectivos/zorro/${row.id}`,null,{
				   ids:row.id,
				   _id_ctlg_estados:row.id_ctlg_estados

			   }).then((r)=>{
					this.listaAnos();
					

			   }).catch((r)=>{
				   this.$q.notify({
					   type: 'negative',
					   message: r.message || 'Hubo un error al guardar'
				   });
			   }).finally(()=>{
				   this.$q.loading.hide();
			   });	
				
			},
		/*	guardar(row){
				var y=this.nombress.replace(/ /g, ""),separador = "-", 
				arregloDeSubCadenas = y.split(separador);   
				let result=[];
				result = arregloDeSubCadenas.map(function (x) { 
					return parseInt(x, 10); 
				});

			result.forEach(function (elemento, indice, array) {
				return(elemento, indice);
				});


				var z = result[0];
				var y = result[1];
				var x = moment(z,'YYYY').isValid();
				var c= moment(z,'YYYY').add(1, 'year').calendar();  
				var f= moment(c).year(); 



			if(this.nombress !== null && this.nombress !== '' && f== y ){

				_.rput(`anos_lectivos/${this.ids}`,null,{
				   ids:row.id,
				   nombress:this.nombress
			   }).then((r)=>{
				   this.formActualizar = false;
				   this.listaAnos();
			   }).catch((r)=>{
				   this.$q.notify({
					   type: 'negative',
					   message: r.message || 'Hubo un error al guardar'
				   });
			   }).finally(()=>{
				   this.$q.loading.hide();
			   });
			}else{
				this.$q.notify({
					type: 'negative',
					message: 'no se puede guardar'
				});
			}


		   },*/

					
			nuevoAno() {
				this.modal('ano_lectivo', {});
			},
			listaAnos() {
				this.anos_lectivos.loading = true;
				_.rget("anos_lectivos").then((r) => {
					this.anos_lectivos.data = r.data;
				}).finally(() => {
					this.anos_lectivos.loading = false;
				})
			}
		}
	}
</script>