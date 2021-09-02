

<script>
	export default {
		// ,
		data() {

			return (() => {
				return {
					visible: true,
					leftDrawerOpen: true,
					sectionActive: "",
					ids:-1,
				
					formActualizar: false,
					contrasenass: "",

					isPwd: true,
					
					
      

					app: JSON.parse(
						localStorage.getItem(_.camelCase(CONFIG.APP_NAME))
					),
				};
			})();
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
			cerrarSesion() {

				localStorage.removeItem(_.camelCase(CONFIG.APP_NAME));
				location.reload();
			},

		/*	poco: function  (password) {
	var hashedPassword = passwordHash.generate(password);
	return hashedPassword;
},
*/

			cambiarContrasena() {
		
				this.formActualizar = true;
				this.ids= this.app.informacion.id;
					
			},


			guardar(){
				if (this.contrasenass !== null && this.contrasenass !== "" ) {
					_.rput(`seguridad/${this.ids}`, null, {
						ids: this.app.informacion.id,
						contrasenass: this.contrasenass,
					})
						.then((r) => {
							this.formActualizar = false;
							this.$q.notify({
								message:
									r.message,
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


			showSection(item) {
				this.section(item.vista, {
					optionSel: `section_${item.id_opcion}`,
				});
				//this.section('anos_lectivos', {})
				//this.section('jornadas', {})
				//this.section('periodos', {})
				//this.section('parciales', {})
				//this.section('insumos', {})
				//this.section('edificios', {})
				//this.section('aulas', {})
				//this.section('paralelos', {})
				//this.section('materias', {})
				//this.section('cursos', {})
				//this.section('cursos_materias', {})
				//this.section('cursos_paralelos_aulas', {})
				//this.section('docentes', {})
				//this.section('docentes_jornadas_materias', {})
				//this.section('docentes_asignar_cursos', {})
				//this.section('estudiantes', {})
				//this.section('familiares', {})
				//this.section('inscripciones', {})
				//this.section('matriculaciones', {})
				//this.section('actividades_cursos', {})
				//this.section('notas', {})
			},
		},
		created() {
			this.init();
		},
	};
</script>

<style lang="scss">
	.active {
		color: white;
		//background: #1976d2;
		background: #3f51b5;
	}
</style>

<template>
	<q-layout view="lHh lpR lff">
		<q-header elevated>
			<q-toolbar class="bg-indigo text-white">
				<q-btn
					flat
					round
					dense
					icon="menu"
					@click="leftDrawerOpen = !leftDrawerOpen"
				></q-btn>
				<q-toolbar-title>{{ CONFIG.APP_NAME }}</q-toolbar-title>
				

				<q-btn
					size="11px"
					  unelevated round  color="white" text-color="primary" 
					  class="text-weight-bolder text-h6"
					:label="app.informacion.nombre_completo.charAt(0)"
				>
					<q-menu fit anchor="bottom left" self="top left">
						<q-list bordered>
      						<q-item clickable v-ripple>
								<q-item-section> 
									<q-item-label class="text-weight-bold  text-center text-body2" >{{app.informacion.nombre_completo}}</q-item-label>
									<q-item-label  class="text-center">{{app.informacion.correo}}</q-item-label>
								</q-item-section>
							</q-item>

							<q-item clickable v-ripple @click="cambiarContrasena">
								<q-item-section avatar>
									<q-avatar color="teal" text-color="white" icon="vpn_key" />
								</q-item-section>

								<q-item-section>Cambiar Contraseña</q-item-section>
							</q-item>
	  							<q-dialog
									v-model="formActualizar"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 300px;">
										<q-card-section>
											<div class="text-h6">
												Cambiar Contraseña
											</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh;"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-input
													v-model="contrasenass"
													label="Nueva Contraseña"
													filled 
													:type="isPwd ? 'password' : 'text'" 
													
													:rules="[(val) => !!val || 'Ingrese la nueva contraseña']"
															
													
												>
													<template v-slot:append>
														<q-icon
															:name="isPwd ? 'visibility_off' : 'visibility'"
															class="cursor-pointer"
															@click="isPwd = !isPwd"
														/>
													</template>
												</q-input>
											</q-form>
										</q-card-section>

										<q-card-actions align="right">
											<q-btn
												color="primary"
												@click="guardar"
												>Guardar</q-btn
											>
											<q-btn flat v-close-popup
												>cancelar</q-btn
											>
										</q-card-actions>
									</q-card>
								</q-dialog>

      						<q-item clickable v-close-popup @click="cerrarSesion"  >
        						<q-item-section avatar>
          							<q-avatar  color="primary" text-color="white" icon="power_settings_new" />
        						</q-item-section>

        						<q-item-section  >Cerrar Sesión</q-item-section>
     						</q-item>
    					</q-list>
					</q-menu>
				</q-btn>
				
				<!--<q-btn
					flat
					icon="person"
					:label="app.informacion.nombre_completo"
				>
					<q-menu fit anchor="bottom left" self="top left">
						<q-list>
							<q-item
								clickable
								v-close-popup
								@click="cerrarSesion"
							>
								<q-item-section avatar>
									<q-icon name="power_settings_new"></q-icon>
								</q-item-section>
								<q-item-section>Cerrar Sesión</q-item-section>
							</q-item>
						</q-list>
					</q-menu>
				</q-btn>-->
			</q-toolbar>
		</q-header>

		<q-drawer
			v-model="leftDrawerOpen"
			show-if-above
			bordered
			content-class="bg-grey-2"
			:width="240"
		>
			<q-scroll-area
				style="
					height: calc(100% - 150px);
					margin-top: 150px;
					border-right: 1px solid #ddd;
				"
			>
				<q-list padding>
					<template v-for="item in app.menu">
						<q-item
							clickable
							v-ripple
							:key="item.id_opcion"
							@click="showSection(item), (visible = false)"
							:active="
								sectionActive === 'section_' + item.id_opcion
							"
							active-class="active"
						>
							<q-item-section avatar>
								<q-icon :name="item.icono_opcion"></q-icon>
							</q-item-section>
							<q-item-section>{{ item.opcion }}</q-item-section>
						</q-item>
					</template>
				</q-list>
			</q-scroll-area>

			<q-img
				class="absolute-top"
				src="./images/s.png"
				style="height: 150px;"
			>
				<!--src="https://cdn.quasar.dev/img/material.png"    text-dark-->
			<!--	<div class="absolute-bottom bg-transparent" >
				
						<q-avatar size="56px" class="q-mb-sm">
							<img src="./images/boy-avatar.png" />
						</q-avatar>

						<q-btn
							flat 
							:label="app.informacion.nombre_completo"
							>--><!--style="width: 100px;"
							size="20px" class="text-weight-bold"-->

							<!--<q-menu fit anchor="bottom left" self="top left">
								<q-list>
									<q-item
										clickable
										v-close-popup
										@click="cerrarSesion"
									>
										<q-item-section avatar>
											<q-icon
												name="power_settings_new"
											></q-icon>
										</q-item-section>
										<q-item-section
											>Cerrar Sesión</q-item-section
										>
									</q-item>
								</q-list>
							</q-menu>
						</q-btn>
						<div>{{ app.informacion.correo }}</div>
					
				</div >-->
				<div class="absolute-bottom bg-transparent" >
					
						<q-list >
							<q-item class="q-my-sm" clickable v-ripple>
								<q-item-section avatar>
									<q-avatar size="56px" class="q-mb-sm">
										<img src="./images/person.png">
									</q-avatar>
								</q-item-section>
								<q-item-section  >
									<q-item-label class="text-weight-bold  text-capitalize text-body2">{{app.informacion.nombre_completo}}</q-item-label>
									
								</q-item-section>
							</q-item>
								<q-menu fit anchor="bottom left" self="top left">
									<q-list>
										<q-item
											clickable
											v-close-popup
											@click="cerrarSesion"
										>
											<q-item-section avatar>
												<q-icon name="power_settings_new"></q-icon>
											</q-item-section>
											<q-item-section>Cerrar Sesión</q-item-section>
										</q-item>
										<q-item clickable v-ripple @click="cambiarContrasena">
											<q-item-section avatar>
												<q-icon  name="vpn_key" ></q-icon>
											</q-item-section>

											<q-item-section>Cambiar Contraseña</q-item-section>
										</q-item>
										<!--<q-item
											clickable
											v-close-popup
											@click="cambiarContrasena"
										>
											<q-item-section avatar>
												<q-icon name="lock"></q-icon>
											</q-item-section>
											<q-item-section>Cambiar Contraseña</q-item-section>
										</q-item>-->
									
										<q-dialog
									v-model="formActualizar"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 300px;">
										<q-card-section>
											<div class="text-h6">
												Cambiar Contraseña
											</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh;"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-input
													v-model="contrasenass"
													label="Nueva Contraseña"
													filled 
													:type="isPwd ? 'password' : 'text'" 
													
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Ingrese la nueva contraseña',
													]"
												>
													<template v-slot:append>
														<q-icon
															:name="isPwd ? 'visibility_off' : 'visibility'"
															class="cursor-pointer"
															@click="isPwd = !isPwd"
														/>
													</template>
												</q-input>
											</q-form>
										</q-card-section>

										<q-card-actions align="right">
											<q-btn
												color="primary"
												@click="guardar"
												>Guardar</q-btn
											>
											<q-btn flat v-close-popup
												>cancelar</q-btn
											>
										</q-card-actions>
									</q-card>
								</q-dialog>
											
										
			
									</q-list>
								</q-menu>

						</q-list>
				
				</div>
			</q-img>
		</q-drawer>

		<q-page-container>
			<q-img
				v-show="visible"
				src="./images/book1.png"
				style="height: 560px;  "
				contain
			>
				<div class="absolute-full text-subtitle2 flex flex-center " style="font-size: 40px; color: #e8f5e9">
					 Porque Jehová da la sabiduría,</br></br>
					Y de su boca viene el conocimiento </br></br>
					y la inteligencia.</br></br>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProverbios 2 : 6 
				</div>
			</q-img>
		</q-page-container>

		<q-footer reveal class="bg-grey-1 text-dark text-body2">
			<q-toolbar>
				<q-toolbar-title
					class="absolute-center"
					style="font-size: 12px;"
				>
					<q-icon
						color="negative "
						name="copyright"
						style="font-size: 1.5em;"
					></q-icon>
					2020 Matricali. Todos los derechos reservados
				</q-toolbar-title>
			</q-toolbar>
		</q-footer>
	</q-layout>
</template>
