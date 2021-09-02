<template>
	<q-dialog
		v-model="state"
		persistent
		transition-show="scale"
		transition-hide="scale"
	>
		<q-card style="width: 300px">
			<q-card-section>
				<div class="text-h6">Año Lectivo</div>
			</q-card-section>

			<q-card-section style="max-height: 50vh" class="scroll">
				<q-form class="q-gutter-md">
					<q-input
						v-model="form._nombre"
						label="Nombre"
						mask="#### - #### "
						:rules="[(val) => !!val || '* Requerido']"
					></q-input>
				</q-form>
			</q-card-section>

			<q-card-actions align="right">
				<q-btn color="primary" @click="guardar">Guardar</q-btn>
				<q-btn flat v-close-popup>cancelar</q-btn>
			</q-card-actions>
		</q-card>
	</q-dialog>
</template>

<script>
	import moment from "moment";
	import extendMoment from "moment-range";

	export default {
		data() {
			return {
				form: {
					_nombre: "",
				},

				options: {
					//estados:[],
				},
			};
		},
		created() {
			_.merge(this.form, _.get(this, "formOld", {}));

			Promise.all([
				//this.estados(),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			/*aso(){
				

				var y=this.form._nombre.replace(/ /g, ""),separador = "-", 
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
var f= moment(c).get('year'); 
console.log(f);

	},*/

			//toUpperCase();  convertir en mayuscula las palabras
			guardar() {
				var y = this.form._nombre.replace(/ /g, ""),
					separador = "-",
					arregloDeSubCadenas = y.split(separador);
				let result = [];
				result = arregloDeSubCadenas.map(function (x) {
					return parseInt(x, 10);
				});

				result.forEach(function (elemento, indice, array) {
					return elemento, indice;
				});

				var z = result[0];
				var y = result[1];
				var x = moment(z, "YYYY").isValid();
				var c = moment(z, "YYYY").add(1, "year").calendar();
				var f = moment(c).year();

				if (
					this.form._nombre !== null &&
					this.form._nombre !== "" &&
					f == y
				) {
					this.$q.loading.show();
					_.rpost("anos_lectivos", null, this.form)
						.then((r) => {
							this.close();
							this.$parent.listaAnos();
							this.$q.notify({
								type: "positive",
								timeout: 500,
								message: "Guardada con exito",
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
						message: "no se puede guardar",
					});
				}
			},
		},
	};
</script>
