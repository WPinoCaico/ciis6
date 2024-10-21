<template>
    <div class="card mb-5 mb-xl-8">
		<div class="card-header border-0 pt-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label fw-bold fs-3 mb-1">Lista de Asistencia</span>
				<span class="text-muted mt-1 fw-semibold fs-7">Lista de Asistencia</span>
			</h3>
		</div>
		<div class="card-body py-3">
            <div class="input-group mb-5" style="display: block">
                <div class="row">
                    <!-- Filtro de busqueda por DNI o código -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>
                            Buscar
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" v-on:keyup.enter="buscar(2)" placeholder="Buscar por nombres o DNI o código" v-model="filtros.dato" aria-describedby="button-addon2">
                            <button class="btn btn-primary"  @click.prevent="buscar(2)" type="button" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                    <!-- Filtro por Condición  -->
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label>
                            Condición
                        </label>
                        <select class="form-select" @change="buscar(1)" aria-label="Select example" v-model="filtros.condicion">
                            <option value="">TODOS</option>
                            <option value="PRESENTE">PRESENTE</option>
                            <option value="AUSENTE">AUSENTE</option>
                        </select> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label>
                            RESETEAR
                        </label> 
                        <div class="m-demo-icon__preview">
                            <i @click="buscar(0)" class="bi bi-arrow-repeat fs-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Table container-->
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 rounded-start">N°</th>
                                <th>Apellidos y Nombres</th>
                                <th >Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="botonCargando">
                                <td colspan="12" class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                            <tr v-else v-for="(dato, index) in datos" :index="index" :key="dato.id">
                                <td class="ps-4">
                                   {{index+1}} 
                                </td>                                                      
                                <td>
                                    <div class="d-flex align-items-center">
                                        <p class="text-dark fw-bold mb-1 fs-6">{{ dato.apellidos+ ', '+ dato.nombre}}</p>
                                    </div>
                                </td>
                                <td>
                                    {{mostrarCondicion(dato.condicion)}}
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
		</div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            datos:[],
            botonCargando: false,
            filtros: {
                condicion: '',
                dato:''
            },
        }
    },
    mounted() {
        this.buscar(1)
    },
    methods: {
        async mostrarDatos() {

            this.botonCargando = true 
            let condicion = this.filtros.condicion
            let dato = this.filtros.dato            
			await axios
				.get(this.$parent.NombreRuta + "/api/fichas/lista_asistencia?condicion="+condicion+'&dato='+dato)
				.then((response) => {
				    this.datos = response.data;
                    this.botonCargando = false 
				})
				.catch(function (error) {
				    this.datos = [];
                    this.botonCargando = false 
				});
				},
        buscar(opcion) {
            switch (opcion) {
                case 0:
                    this.filtros.dato = '',
                    this.filtros.condicion = ''
                    break;
                case 1:
                    this.filtros.dato = ''
                    break;
                case 2:
                    this.filtros.condicion = ''
                    break;
            }
            this.mostrarDatos()
        },
        encodeid(id) {
            let codigo = btoa(id);
            return codigo;
        },
        mostrarCondicion(condicion) {
            if (condicion === null) {
                return 'AUSENTE';
            }
            if (condicion === 'PRESENTE') {
                return 'PRESENTE';
            }
            return condicion;
        },
    },
}
</script>