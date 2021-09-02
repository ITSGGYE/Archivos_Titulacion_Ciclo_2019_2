<template>
	<q-page class="q-pa-md">
		<br />
		<q-table
			class="q-pa-md"
			title="Usuarios"
			:data="usuarios.data"
			:columns="usuarios.columns"
			row-key="id"
			:filter="filter"
			:loading="usuarios.loading"
		>
			<template v-slot:top-right>
				<div class="q-gutter-md row">
					<q-btn
						color="primary"
						icon-right="add"
						label="Nuevo usuario"
						no-caps
						@click="nuevoUsuario"
					></q-btn>
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
					<q-th auto-width>Desactivar/Activar</q-th>
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
						{{ col.value }}
					</q-td>
					<q-td auto-width style="text-align: center">
						<template>
							<div class="q-gutter-sm">
								<q-btn
									color="primary"
									round
									dense
									icon="edit"
									@click="editarUsuario(props.row)"
								></q-btn>
								<q-dialog
									v-model="formActualizar"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 300px">
										<q-card-section>
											<div class="text-h6">Usuario</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-input
													v-model="nombress"
													label="Nombres"
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Please type something',
													]"
												></q-input>
												<q-input
													v-model="apellidoss"
													label="Apellidos"
													lazy-rules
													:rules="[
														(val) =>
															(val &&
																val.length >
																	0) ||
															'Please type something',
													]"
												></q-input>
												<q-input
													v-model="correoss"
													label="Correo"
													type="email"
												></q-input>

												<q-select
													readonly
													v-model="id_perfiless"
													:options="options.perfiles"
													label="Perfil"
													emit-value
													map-options
												></q-select>
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
								<q-btn
									color="primary"
									round
									dense
									icon="vpn_key"
									@click="cambiarContrasena(props.row)"
								></q-btn>
								<q-dialog
									v-model="formActualizar1"
									persistent
									transition-show="scale"
									transition-hide="scale"
								>
									<q-card style="width: 300px">
										<q-card-section>
											<div class="text-h6">
												Cambiar Contraseña
											</div>
										</q-card-section>

										<q-card-section
											style="max-height: 50vh"
											class="scroll"
										>
											<q-form class="q-gutter-md">
												<q-input
													v-model="contrasenass"
													label="Nueva Contraseña"
													filled
													:type="
														isPwd
															? 'password'
															: 'text'
													"
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
															:name="
																isPwd
																	? 'visibility_off'
																	: 'visibility'
															"
															class="cursor-pointer"
															@click="
																isPwd = !isPwd
															"
														/>
													</template>
												</q-input>
											</q-form>
										</q-card-section>

										<q-card-actions align="right">
											<q-btn
												color="primary"
												@click="guardar_contrasena"
												>Guardar</q-btn
											>
											<q-btn flat v-close-popup
												>cancelar</q-btn
											>
										</q-card-actions>
									</q-card>
								</q-dialog>
							</div>
						</template>
					</q-td>
					<q-td auto-width style="text-align: center">
						<q-toggle
							v-model="props.row.activa"
							size="md"
							checked-icon="check"
							color="green"
							unchecked-icon="clear"
							:false-value="2"
							:true-value="1"
							@input="
								usuarioBaja(props.row) && ids == props.row.id
							"
						></q-toggle>
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
				formActualizar1: false,
				ids: -1,
				iduc: -1,
				nombress: "",
				apellidoss: "",
				correoss: "",
				id_perfiless: "",
				_deleted_at: "",
				contrasenass: "",

				isPwd: true,
				options: {
					perfiles: [],
				},
				usuarios: {
					loading: false,
					columns: [
						/*{
							name: "id",
							label: "ID",
							field: "id",
						},*/
						{
							name: "nombre_completo",
							field: "nombre_completo",
							label: "Nombres",
						},
						{
							name: "correo",
							field: "correo",
							label: "Correo",
						},
						{
							name: "perfiles",
							field: "perfiles",
							label: "Perfil",
						},
					],
					data: [],
				},
			};
		},
		created() {
			this.listaUsuarios();
			Promise.all([
				//this.estados(),
				this.perfiles(),
			]).then((v) => {
				this.init();
			});
		},
		methods: {
			perfiles() {
				return _.rget("usuarios/todosperfiles").then((r) => {
					this.options.perfiles = r.data;
				});
			},

			validEmail: function (correoss) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(correoss);
			},

			editarUsuario(row) {
				this.ids = row.id;
				this.nombress = row.nombres;
				this.apellidoss = row.apellidos;
				this.correoss = row.correo;
				this.id_perfiless = row.id_perfiles;
				this.formActualizar = true;
			},

			guardar(row) {
				if (this.validEmail(this.correoss)) {
					this.$q.loading.show();
					_.rput(`usuarios/${this.ids}`, null, {
						ids: row.id,
						nombress: this.nombress,
						apellidoss: this.apellidoss,
						correoss: this.correoss,
						id_perfiless: this.id_perfiless,
					})
						.then((r) => {
							this.formActualizar = false;
							this.listaUsuarios();
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
						message: "correo invalido",
					});
				}
			},
			cambiarContrasena(row) {
				this.iduc = row.id;
				this.formActualizar1 = true;
			},

			guardar_contrasena(row) {
				if (this.contrasenass !== null && this.contrasenass !== "") {
					_.rput(`seguridad/${this.iduc}`, null, {
						iduc: row.id,
						contrasenass: this.contrasenass,
					})
						.then((r) => {
							this.formActualizar1 = false;
							this.contrasenass = "";
							this.$q.notify({
								message: r.message,
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

			usuarioBaja(row) {
				_.rput(`usuarios/zorro/${row.id}`, null, {
					ids: row.id,
					_deleted_at: row.activa,
				})
					.then((r) => {
						this.listaUsuarios();
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al guardar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},
			/*editarAno(row) {
				_.rput(`usuarios/zorro/${row.id}`, null, {
					ids: row.id,
					_id_ctlg_estados: row.id_ctlg_estados,
				})
					.then((r) => {
						this.listaAnos();
					})
					.catch((r) => {
						this.$q.notify({
							type: "negative",
							message: r.message || "Hubo un error al guardar",
						});
					})
					.finally(() => {
						this.$q.loading.hide();
					});
			},*/
			nuevoUsuario() {
				this.modal("usuario", {});
			},
			listaUsuarios() {
				this.usuarios.loading = true;
				_.rget("usuarios")
					.then((r) => {
						this.usuarios.data = r.data;
					})
					.finally(() => {
						this.usuarios.loading = false;
					});
			},
		},
	};
</script>
