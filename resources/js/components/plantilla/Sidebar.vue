<template>
		<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
			<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
				<a :href="$parent.NombreRuta + '/inicio'">
					<div class="app-sidebar-logo-default" style="font-size: 25px; color: white; font-family: sans-serif;">
						CIIS 2024
					</div>
					<div class="app-sidebar-logo-minimize" style="font-size: 10px; color: white; font-family: sans-serif;">
						UNDC
					</div>
				</a>
				<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
					<span class="svg-icon svg-icon-2 rotate-180">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
							<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
						</svg>
					</span>
				</div>
			</div>
			<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
				<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
					<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
						<div class="menu-item pt-5">
							<div class="menu-content">
								<span class="menu-heading fw-bold text-uppercase fs-7">Páginas</span>
							</div>
						</div>						
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion" v-if="is('Administrador')||is('Colaborador')">
							<span class="menu-link">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-muted svg-icon-2"><svg width="25" height="28" viewBox="0 0 25 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.8254 27.3337H4.17203C3.1536 27.3337 2.17688 26.9291 1.45674 26.2089C0.736602 25.4888 0.332031 24.5121 0.332031 23.4937V4.50699C0.332031 3.48856 0.736602 2.51184 1.45674 1.7917C2.17688 1.07156 3.1536 0.666992 4.17203 0.666992H17.8254C18.8438 0.666992 19.8205 1.07156 20.5407 1.7917C21.2608 2.51184 21.6654 3.48856 21.6654 4.50699V23.4937C21.6654 24.5121 21.2608 25.4888 20.5407 26.2089C19.8205 26.9291 18.8438 27.3337 17.8254 27.3337ZM10.9987 7.33366C10.4713 7.33366 9.95571 7.49006 9.51718 7.78307C9.07865 8.07609 8.73685 8.49257 8.53502 8.97984C8.33319 9.46711 8.28038 10.0033 8.38327 10.5206C8.48616 11.0378 8.74014 11.513 9.11308 11.8859C9.48602 12.2589 9.96117 12.5129 10.4785 12.6158C10.9957 12.7186 11.5319 12.6658 12.0192 12.464C12.5065 12.2622 12.9229 11.9204 13.216 11.4818C13.509 11.0433 13.6654 10.5277 13.6654 10.0003C13.6654 9.29308 13.3844 8.6148 12.8843 8.11471C12.3842 7.61461 11.7059 7.33366 10.9987 7.33366ZM15.3587 19.3337C15.5794 19.347 15.8 19.3052 16.0005 19.2121C16.2011 19.1189 16.3753 18.9774 16.5076 18.8002C16.6398 18.623 16.7259 18.4157 16.7581 18.1969C16.7903 17.9781 16.7676 17.7548 16.692 17.547C16.2027 16.4571 15.3998 15.5378 14.3858 14.9061C13.3718 14.2744 12.1926 13.9591 10.9987 14.0003C9.81328 13.9677 8.64459 14.2856 7.63898 14.9141C6.63337 15.5426 5.83553 16.4538 5.34537 17.5337C4.9987 18.4003 5.70536 19.3337 7.38536 19.3337H15.3587ZM24.332 12.667H22.9987V18.0003H24.332C24.6857 18.0003 25.0248 17.8598 25.2748 17.6098C25.5249 17.3598 25.6654 17.0206 25.6654 16.667V14.0003C25.6654 13.6467 25.5249 13.3076 25.2748 13.0575C25.0248 12.8075 24.6857 12.667 24.332 12.667ZM24.332 4.66699H22.9987V10.0003H24.332C24.6857 10.0003 25.0248 9.85985 25.2748 9.6098C25.5249 9.35975 25.6654 9.02061 25.6654 8.66699V6.00033C25.6654 5.6467 25.5249 5.30756 25.2748 5.05752C25.0248 4.80747 24.6857 4.66699 24.332 4.66699Z" fill="currentColor"/>
										</svg>									
									</span>
								</span>
								<span class="menu-title">Asistencia</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								<!-- Menú Revisión de Carnet -->
								<div class="menu-item" v-if="is('Administrador')">
									<router-link class="menu-link" to="/descarga-carnet" exact-active-class="active">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Carnet</span>
									</router-link>
								</div>			
								<div class="menu-item" v-if="is('Administrador')||is('Colaborador')">
									<!--begin:Menu link-->
									<router-link class="menu-link" to="/asistencia-qr" exact-active-class="active">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Asistencia QR</span>
									</router-link>
								</div>
								<div class="menu-item" v-if="is('Administrador')">
									<router-link class="menu-link" to="/lista-asistencia" exact-active-class="active">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Lista Asistencia</span>
									</router-link>
								</div>
							</div>
						</div>
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion" v-if="is('Administrador')">
							<span class="menu-link">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor"/>
									<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor"/>
									</svg>
									</span>
								</span>
								<span class="menu-title">Gestión</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item" v-if="is('Administrador')">
									<router-link class="menu-link" to="/usuarios-roles" exact-active-class="active">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Usuarios roles</span>
									</router-link>
								</div>	
							</div>
						</div>						
						<!-- Menú Desplegable Reportes -->
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion" v-if="is('Administrador') || is('Tesoreria') || is('Comision') || is('Colaborador')">
							<span class="menu-link">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.0021 10.9128V3.01281C13.0021 2.41281 13.5021 1.91281 14.1021 2.01281C16.1021 2.21281 17.9021 3.11284 19.3021 4.61284C20.7021 6.01284 21.6021 7.91285 21.9021 9.81285C22.0021 10.4129 21.5021 10.9128 20.9021 10.9128H13.0021Z" fill="currentColor"/>
									<path opacity="0.3" d="M11.0021 13.7128V4.91283C11.0021 4.31283 10.5021 3.81283 9.90208 3.91283C5.40208 4.51283 1.90209 8.41284 2.00209 13.1128C2.10209 18.0128 6.40208 22.0128 11.3021 21.9128C13.1021 21.8128 14.7021 21.3128 16.0021 20.4128C16.5021 20.1128 16.6021 19.3128 16.1021 18.9128L11.0021 13.7128Z" fill="currentColor"/>
									<path opacity="0.3" d="M21.9021 14.0128C21.7021 15.6128 21.1021 17.1128 20.1021 18.4128C19.7021 18.9128 19.0021 18.9128 18.6021 18.5128L13.0021 12.9128H20.9021C21.5021 12.9128 22.0021 13.4128 21.9021 14.0128Z" fill="currentColor"/>
									</svg>
									</span>
								</span>
								<span class="menu-title">Reportes</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								<!-- Menú Reporte Asistencia QR -->
								<div class="menu-item" v-if="is('Administrador') || is('Comision') || is('Colaborador')">
									<router-link class="menu-link" to="/reporte-asistencia-qr" exact-active-class="active">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Asistencia</span>
									</router-link>
								</div>								
							</div>
						</div>						
					</div>
				</div>
			</div>			
		</div>
</template>
<script>
export default {
    data() {
        return {
            ficha: [],
            botonRevision: true,
            botonEnviar: false,
            botonGuardarFicha: false,
            loadingData: true,
            id_modalidad_usu: '',
            id_ficha_usu: '',
            id_estado_usu: ''
        };
    },
    mounted() {
        this.obtenerFicha()
    },
    methods: {
        async obtenerFicha() {
            this.botonGuardarFicha = true,
                this.loadingData = true
            await axios
			.get(this.$parent.NombreRuta + "/api/fichas")
			.then((response) => {
				this.loadingData = false
				this.botonGuardarFicha = false
				this.ficha = response.data
				if (this.ficha != 0) {
					this.id_modalidad_usu = this.ficha[0].mcp_id_modalidad
					this.id_ficha_usu = this.ficha[0].id
					this.id_estado_usu = this.ficha[0].id_estado
				}
			})
			.catch(function (error) {
				this.loadingData = false
				this.ficha = [];
			});
        }
    },

}
</script>