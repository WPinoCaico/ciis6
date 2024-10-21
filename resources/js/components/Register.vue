<template>
    <!--begin::Authentication - Sign-up -->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Aside-->
		<div class="d-flex flex-lg-row-fluid">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
				<!--begin::Image-->
				<!-- <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency.png" alt="" />
				<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency-dark.png" alt="" /> -->
				<!--end::Image-->
				<!--begin::Title-->
				<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">VI CONGRESO INTERNACIONAL DE INGENIERÍA DE SISTEMAS E INVESTIGACIÓN CIENTÍFICA</h1>
				<!--end::Title-->
				<!--begin::Text-->
				<!-- <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
				<a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed
				<br />and provides some background information about
				<a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
				<br />work following this is a transcript of the interview.</div> -->
				<!--end::Text-->
			</div>
			<!--end::Content-->
		</div>
		<!--begin::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
			<!--begin::Wrapper-->
			<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
				<!--begin::Content-->
				<div class="w-md-400px">
					<!--begin::Form-->
					<form class="form w-100" @submit.prevent="register" id="kt_sign_up_form" data-kt-redirect-url="" action="#">
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-dark fw-bolder mb-3">Registrarse</h1>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<!-- <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div> -->
							<!--end::Subtitle=-->
						</div>
						<!--begin::Heading-->
						<!--begin::Login options-->
						<!-- <div class="row g-3 mb-9">
							<div class="col-md-6">
								<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
							</div>
						</div> -->
						<!--end::Login options-->
						<!--begin::Separator-->
						<!-- <div class="separator separator-content my-14">
							<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
						</div> -->
						<!--end::Separator-->
						<!--begin::Input group=-->
						<div class="fv-row mb-5">
							<select class="form-select" v-model="fillRegister.cCarrera" aria-label="Tipo de documento" required>
								<option value="">Carrera de interés</option>
								<option value="1">
                                	Administración
								</option>
								<option value="2">
									Contabilidad
								</option>
								<option value="3">
									Administración de Turismo y Hotelería
								</option>
								<option value="4">
									Ingenierias de Sistemas
								</option>
								<option value="5">
									Agronomia
								</option>
							</select>
						</div>
						<div class="fv-row mb-8">
							<select class="form-select" v-model="fillRegister.cTDocumento" aria-label="Tipo de documento" required>
								<option value="">Tipo de documento</option>
								<option value="1">DNI</option>
								<option value="2">Carnet de extrangería</option>
							</select>
						</div>
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<input type="text" placeholder="Número documento" v-model="fillRegister.cNDocumento" name="numero_documento" minlength="8" maxlength="11" pattern="[0-9]+" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<input type="text" placeholder="Email personal(gmail, outlook, hotmail, otros)" v-model="fillRegister.cEmail" name="email" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
                        <div class="fv-row mb-8">
							<!--begin::Email-->
							<input type="text" placeholder="Nombres" v-model="fillRegister.cNombre" name="nombre" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
						<div class="fv-row mb-4">
							<!--begin::Email-->
							<input type="text" placeholder="Apellido paterno" v-model="fillRegister.cAPaterno" name="apellido_paterno" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
						<div class="fv-row mb-4">
							<!--begin::Email-->
							<input type="text" placeholder="Apellido materno" v-model="fillRegister.cAMaterno" name="apellido_materno" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
						<div class="fv-row mb-4">
							<!--begin::Email-->
							<input type="text" placeholder="Número de celular" v-model="fillRegister.cCelular" name="celular" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Email-->
						</div>
						<!--begin::Input group-->
						<div class="fv-row mb-8" data-kt-password-meter="true">
							<!--begin::Wrapper-->
							<div class="mb-1">
								<!--begin::Input wrapper-->
								<div class="position-relative mb-3">
									<input class="form-control bg-transparent" type="password" v-model="fillRegister.cCContrasena" placeholder="Contraseña" name="password" autocomplete="off" required/>
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
								</div>
								<!--end::Input wrapper-->
								<!--begin::Meter-->
								<!-- <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
								</div> -->
								<!--end::Meter-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Hint-->
							<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
							<!--end::Hint-->
						</div>
						<!--end::Input group=-->
						<!--end::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Repeat Password-->
							<input placeholder="Repetir contraseña" v-model="fillRegister.cContrasena" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" required />
							<!--end::Repeat Password-->
						</div>
						<!--end::Input group=-->
						<div v-if="error" class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
							<!--begin::Icon-->
							<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
							<!-- <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor"></path>
									<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor"></path>
								</svg>
							</span> -->
							<!--end::Svg Icon-->
							<!--end::Icon-->
							<!--begin::Content-->
							<!-- <div class="d-flex flex-column text-light pe-0 pe-sm-10">
								<span v-for="(e, index) in mensajeError" v-bind:key="index" v-text="e">The alert component can be used to highlight certain parts of your page for higher content visibility.</span>
							</div> -->
							<!--end::Content-->
							<!--begin::Close-->
							<!-- <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
								<span class="svg-icon svg-icon-2x svg-icon-light">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
										<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
									</svg>
								</span>
							</button> -->
							<!--end::Close-->
						</div>
						<!--begin::Accept-->
						<div class="fv-row mb-8">
							<label class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="toc" value="1" required />
								<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Acepto los
								<a href="https://portal.undc.edu.pe/terminos-y-condiciones/" class="ms-1 link-primary" target="_blank">Terminos y condiciones</a> y la 
								<a href="https://portal.undc.edu.pe/pdatospersonales/" class="ms-1 link-primary" target="_blank">Política de privacidad de los datos</a>.</span>
							</label>
						</div>
						<!--end::Accept-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" id="kt_sign_up_submit" class="btn btn-primary" :disabled="btnRegistrando">
								<span v-if="!btnRegistrando" class="indicator-label">Registrar</span>
								<span v-else>Espere por favor...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						
						<!--end::Submit button-->
						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">¿Ya tienes una cuenta?
						<a href="login" class="link-primary fw-semibold">Iniciar sesión</a></div>
						<!--end::Sign up-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Authentication - Sign-up-->
</template>
<script>
export default {
    data() {
		return {
			btnRegistrando:false,
			fillRegister:{
				cCarrera: '',
				cTDocumento: '',
				cNDocumento: '',
                cNombre:'',
				cAPaterno:'',
				cAMaterno:'',
				cCelular:'',
				cEmail:'',
				cCContrasena:'',
				cContrasena:''
			},
			error:0,
			mensajeError:[],
			csrfToken: null
		}
	},
    mounted() {
		//this.csrf= document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
	},
    methods: {
        async register(){
			if(this.validarRegister()){
				return;
			}
			this.btnRegistrando=true;
			await axios.get('sanctum/csrf-cookie')
			await axios.post(`register`, {
			'id_carrera':this.fillRegister.cCarrera,
			'id_tipo_documento':this.fillRegister.cTDocumento,
			'numero_documento':this.fillRegister.cNDocumento,
            'nombre':this.fillRegister.cNombre,
			'apellido_paterno':this.fillRegister.cAPaterno,
			'apellido_materno':this.fillRegister.cAMaterno,
			'numero_celular':this.fillRegister.cCelular,
			'email':this.fillRegister.cEmail,
			'password': this.fillRegister.cContrasena,
            'password_confirmation': this.fillRegister.cContrasena 
			})
            .then((response) => {
				//console.log(response.data)
				this.btnRegistrando=false;
				location.href ="login";
            })
            .catch((error) => {
                //this.mensajeError=error.response.data.errors;
				//console.log('error')
				this.error=1;
				this.btnRegistrando=false;
				/* if(this.mensajeError.length){
					
				} */
				let datos = error.response.data.errors
				//console.log(datos)
				for (let clave in datos){
					//console.log(JSON.stringify(Object.assign({}, datos[clave][0])));
					//console.log(JSON.stringify(datos[clave]));
					//console.log(Object.assign({}, datos[clave]));
					for (var i in datos[clave]){

						//this.mensajeError.push(JSON.stringify(Object.assign({}, datos[clave][clave2])));
						//console.log()
						this.mensajeError.push(' - ' + datos[clave][i]);
					}
					
				}
            });
		},
        validarRegister(){
			this.error=0;
			this.mensajeError=[];
			if(!this.fillRegister.cNDocumento){
				this.mensajeError.push(' - El número de documento es un campo obligatorio')
			}
			if(!this.fillRegister.cEmail){
				this.mensajeError.push(' - El correo electronico es un campo obligatorio')
			}
            if(!this.fillRegister.cNombre){
				this.mensajeError.push(' - El nombre es un campo obligatorio')
			}
			if(!this.fillRegister.cAPaterno){
				this.mensajeError.push(' - El apellido paterno es un campo obligatorio')
			}
			if(!this.fillRegister.cAMaterno){
				this.mensajeError.push(' - El apellido materno es un campo obligatorio')
			}
			if(!this.fillRegister.cCelular){
				this.mensajeError.push(' - El número de celular es un campo obligatorio')
			}
			if(!this.fillRegister.cContrasena){
				this.mensajeError.push(' - La contraseña es un campo obligatorio')
			}
			if(this.fillRegister.cContrasena!=this.fillRegister.cCContrasena){
				this.mensajeError.push(' - Los campos de contraseña no coinciden')
			}
			if(this.mensajeError.length){
				this.error=1;
			}
			return this.error;
		}
    },
}
</script>