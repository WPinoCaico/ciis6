<template>
<div>
	<!--begin::Tables Widget 11-->
	<div class="card mb-5 mb-xl-8">
		<!--begin::Header-->
		<div class="card-header border-0 pt-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label fw-bold fs-3 mb-1">Usuarios</span>
				<span class="text-muted mt-1 fw-semibold fs-7">Todos los usuarios</span>
			</h3>
			<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click para agregar nuevo usuario">
				<a href="#" @click.prevent="abrirModal(1)" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">
				<span class="svg-icon svg-icon-3">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
						<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
					</svg>
				</span>Nuevo Usuario</a>
			</div>
		</div>
		<div class="card-body py-3">
			<div class="table-responsive">
				<table class="table align-middle gs-0 gy-4">
					<thead>
						<tr class="fw-bold text-muted bg-light">
							<th class="ps-4 rounded-start">N°</th>
							<th>N° Documento</th>
							<th>Usuario</th>
							<th>Email</th>
							<th>Verificado</th>
							<th>Estado</th>
							<th>Rol</th>
							<th class="min-w-200px text-center rounded-end">Acción</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(dato, index) in datos" :index="index" :key="dato.id">
							<td class="ps-4">{{ index+1 }}</td>
							<td>
								{{ dato.numero_documento }}
							</td>
							<td>
								<div class="d-flex align-items-center">

									<p class="text-dark fw-bold mb-1 fs-6">{{ dato.nombre + ' ' +  dato.apellido_paterno + ' ' + dato.apellido_materno}}</p>
								</div>
							</td>
							<td>{{ dato.email }}</td>
							<td>
								<span v-if="dato.email_verified_at" class="badge badge-circle badge-success"></span>
                                <span v-else class="badge badge-circle badge-danger"></span>
							</td>
							<td>
								<span class="badge badge-light-success fs-7 fw-bold">Activo</span>
							</td>
							<td>
								<span class="badge badge-light-primary fs-7 fw-bold">{{ dato.rol }}</span>
							</td>
							<td class="text-center">
								<!-- Button Edit Data User -->
								<a href="#" @click.prevent="abrirModal(0, dato)"
								class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
								data-bs-toggle="modal" data-bs-target="#kt_modal_new_address"
								title="Editar Datos">
									<span class="svg-icon svg-icon-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
											<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
										</svg>
									</span>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!-- MODAL -->
	<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<div class="modal-content">
				<form class="form" action="#" id="kt_modal_new_address_form" @submit.prevent="guardar">
					<div class="modal-header" id="kt_modal_new_address_header">
						<h2 v-if="tipoModal==1">Agregar Nuevo Usuario</h2>
						<h2 v-else>Editar Usuario</h2>
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" id="closemodal">
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
						</div>
					</div>
					<div class="modal-body py-10 px-lg-17">
						<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
							<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
								<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
										<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
										<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
									</svg>
								</span>
								<div class="d-flex flex-stack flex-grow-1">
									<div class="fw-semibold">
										<h4 class="text-gray-900 fw-bold">Advertencia</h4>
										<div class="fs-6 text-gray-700">Ingrese los datos correctos.
										</div>
									</div>
								</div>
							</div>
							<div class="row g-9 mb-5">
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">TIPO DOCUMENTO</label>
									<select class="form-control m-input" v-model="datosRegistro.id_tipo_documento" placeholder="Seleccione" required>
										<option value="" hidden>Seleccione tipo</option>
										<option value="1">
											DNI
										</option>
										<option value="2">
											C.E.
										</option>
									</select>
								</div>
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">N° DOCUMENTO</label>
									<input class="form-control form-control-solid" v-model="datosRegistro.numero_documento" placeholder="" name="state" />
								</div>
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">Rol</label>
									<select class="form-select" v-model="datosRegistro.rol" required="">
										<option value="" hidden>Seleccione rol</option>
										<option v-for="item in roles" :key="item.id" :value="item.name">{{item.name}}</option>
									</select>
								</div>
							</div>
							<!--Data Nombres y Apellidos-->
							<div class="row mb-5">
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">Nombres</label>
									<input type="text" v-model="datosRegistro.nombre" class="form-control form-control-solid" placeholder="" name="Nombres" />
								</div>
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">Apellidos Paterno</label>
									<input type="text" v-model="datosRegistro.apellido_paterno" class="form-control form-control-solid" placeholder="" name="ApellidoPaterno" />
								</div>
								<div class="col-md-4 fv-row">
									<label class="required fs-5 fw-semibold mb-2">Apellidos Materno</label>
									<input type="text" v-model="datosRegistro.apellido_materno" class="form-control form-control-solid" placeholder="" name="ApellidosMaterno" />
								</div>
							</div>
							<div class="row mb-5">
								<div class="col-md-6 fv-row">
								<label class="required fs-5 fw-semibold mb-2">Correo electronico</label>
								<input type="email" v-model="datosRegistro.email" class="form-control form-control-solid" placeholder="" name="Email" />
								</div>
								<div class="col-md-6 fv-row">
								<label class="required fs-5 fw-semibold mb-2">Celular</label>
								<input type="text" v-model="datosRegistro.numero_celular" class="form-control form-control-solid" placeholder="" name="Celular" />
								</div>
							</div>
							<div class="row g-9 mb-5">
								<div class="col-md-9 fv-row">
									<label class="required fs-5 fw-semibold mb-2">Nueva contraseña</label>
									<input v-if="tipoModal==0" type="password" v-model="nuevaContrasena" class="form-control form-control-solid" placeholder="" name="state" />
									<input v-else type="password" v-model="datosRegistro.password" class="form-control form-control-solid" placeholder="" name="state" />
								</div>
								<div class="col-md-3 fv-row">
									<label class="fs-5 fw-semibold mb-2"></label>
									<a v-if="tipoModal==0" href="#" @click="actualizarContrasena()" class="form-control btn btn-danger btn-hover-scale me-5">Actualizar</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Botón Guardar -->
					<div class="modal-footer flex-center">
						<button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
							<span class="indicator-label">Guardar</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</template>
<script>
export default {
	name:'usuarios',
	data() {
		return {
			datos:[],
			//MODAL REGISTER:1 MODAL EDIT:0
			roles:[],
			tipoModal:1,
			csrfToken: null,
			nuevaContrasena: '',
			datosRegistro:{
				id_tipo_documento: '',
				numero_documento:"",
				nombre: '',
				apellido_paterno: '',
				apellido_materno: '',
				numero_celular: '',
				email:"",
				password:"",
				rol: '',
				contrasena: '',
			},
			defaulRegistro:{
				id_tipo_documento: '',
				numero_documento:"",
				nombre: '',
				apellido_paterno: '',
				apellido_materno: '',
				numero_celular: '',
				email:"",
				password:"",
				rol: "",
				contrasena: '',
			}
		}
	},
	mounted() {
		this.csrfToken = document.querySelector('meta[name="csrf-token"]').content,
		this.mostrarDatos()
		this.listarRoles()
	},
	methods: {
		async mostrarDatos() {
			await axios
				.get(this.$parent.NombreRuta + "/api/usuarios-roles")
				.then((response) => {
				this.datos = response.data;
				})
				.catch(function (error) {
				this.datos = [];
				});
				},
		async listarRoles() {
			await axios
				.get(this.$parent.NombreRuta + "/api/roles")
				.then((response) => {
				this.roles = response.data;
				})
				.catch(function (error) {
				this.roles = [];
				});
				},
		async crear(){
			this.axios.post(this.$parent.NombreRuta + `/api/usuarios-roles`, {
            'id_tipo_documento':this.datosRegistro.id_tipo_documento,
			'numero_documento':this.datosRegistro.numero_documento,
			'nombre':this.datosRegistro.nombre,
			'apellido_paterno':this.datosRegistro.apellido_paterno,
			'apellido_materno':this.datosRegistro.apellido_materno,
			'email':this.datosRegistro.email,
			'numero_celular':this.datosRegistro.numero_celular,
			'rol':this.datosRegistro.rol,
			'password': this.datosRegistro.password,
            'password_confirmation': this.datosRegistro.password
			})
            .then((response) => {
				console.log(response.data)
				this.cerrarModal();
				this.datosRegistro = Object.assign({}, this.defaulRegistro)
				this.mostrarDatos();
				//location.href ="/login";
            })
            .catch((error) => {
                this.errors=error.response.data.errors;
                console.log(error);
            });
        },
		async actualizar(){
            await this.axios.put(this.$parent.NombreRuta + `/api/usuarios-roles/`+this.datosRegistro.id, {
            'id':this.datosRegistro.id,
			'id_tipo_documento':this.datosRegistro.id_tipo_documento,
			'numero_documento':this.datosRegistro.numero_documento,
			'nombre':this.datosRegistro.nombre,
			'apellido_paterno':this.datosRegistro.apellido_paterno,
			'apellido_materno':this.datosRegistro.apellido_materno,
			'email':this.datosRegistro.email,
			'numero_celular':this.datosRegistro.numero_celular,
			'rol':this.datosRegistro.rol,
			})
            .then(response=>{
				if(response.data.success==1){
                    toastr.options = {
                        "positionClass": "toastr-bottom-right",
                        "timeOut": "5000"
                    };
                    toastr.success('Datos actualizados');
                }else{
                    toastr.options = {
                        "positionClass": "toastr-bottom-right",
                        "timeOut": "5000"
                    };
                    toastr.error('Datos no actualizados');
                }
				this.mostrarDatos();
				console.log(response.data)
			})
            .catch(error=>{
				toastr.options = {
                    "positionClass": "toastr-bottom-right",
                    "timeOut": "5000"
                };
                toastr.error('Datos no actualizados');
                console.log(error)
            })
        },
		async registrarContrasena(){
			await this.axios.post(this.$parent.NombreRuta + `/api/usuarios/contrasena`, {
            'id':this.datosRegistro.id,
			'password':this.nuevaContrasena
			})
            .then(response=>{
				if(response.data.success==1){
					this.nuevaContrasena=''
                    toastr.options = {
                        "positionClass": "toastr-bottom-right",
                        "timeOut": "5000"
                    };
                    toastr.success('Contraseña actualizada');
                }else{
                    toastr.options = {
                        "positionClass": "toastr-bottom-right",
                        "timeOut": "5000"
                    };
                    toastr.error('Contraseña no actualizada');
                }
			})
            .catch(error=>{
                console.log(error)
				toastr.options = {
                    "positionClass": "toastr-bottom-right",
                    "timeOut": "5000"
                };
                toastr.error('Contraseña no actualizada');
            })
		},
		abrirModal(valor, dato){
			this.tipoModal=valor,
			this.datosRegistro = Object.assign({}, dato)
		},
		cerrarModal(){
			document.getElementById('closemodal').click();
		},
		guardar(){
			if(this.tipoModal==1){
				this.crear()
			}else{
				this.actualizar()
			}
		},
		borrarRegistro(id) {
			if (confirm("¿Confirma eliminar el registro?")) {
				this.axios
				.delete(`/api/usuarios-roles/${id}`)
				.then((response) => {
					this.mostrarDatos();
				})
				.catch((error) => {
					console.log(error);
				});
			}
		},
		actualizarContrasena(){
			if(this.nuevaContrasena.length<6){
				toastr.options = {
                    "positionClass": "toastr-bottom-right",
                    "timeOut": "5000"
                };
                toastr.error('Contraseña muy corta');
			}else if(this.nuevaContrasena.length<20){
				this.registrarContrasena()
			}
		}
	},
}
</script>