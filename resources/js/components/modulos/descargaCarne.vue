<template>
    <div class="card mb-5 mb-xl-8">
		<div class="card-header border-0 pt-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label fw-bold fs-3 mb-1">Descarga de carnet</span>
				<span class="text-muted mt-1 fw-semibold fs-7">Verifica si un postulante no ha descrgado el carnet</span>
			</h3>
            <!-- Botón descarga masiva -->
            <button v-if="is('Administrador')" class="btn btn-primary" @click="descargarPDFs()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M13 5v6h3l-4 4-4-4h3V5h2z"/></svg>
            </button>
		</div>
		<div class="card-body py-3">
            <div class="input-group mb-5" style="display: block">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>
                            Buscar
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" v-on:keyup.enter="buscar(2)" placeholder="Buscar por nombres o DNI" v-model="filtros.dato" aria-describedby="button-addon2">
                            <button class="btn btn-primary"  @click.prevent="buscar(2)" type="button" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label>
                            Estados
                        </label>
                        <select class="form-select" @change="buscar(1)" aria-label="Select example" v-model.number="filtros.estado">
                            <option value="">TODOS</option>
                            <option value="1">DESCARGADO</option> 
                            <option value="0">NO DESCARGADO</option> 
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
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 rounded-start">N°</th>
                                <th>DNI</th>
                                <th>APELLIDOS</th>
                                <th>NOMBRES</th>
                                <th>CELULAR</th>
                                <th>ESTADO</th>
                                <th class="text-center rounded-end" style="width: 200px;">ACCION</th>
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
                                    {{dato.numero_documento}}
                                </td>
                                <td>
                                    {{dato.apellidos}}
                                </td>
                                <td>
                                    {{dato.dp_nombre}}
                                </td>
                                <td>
                                    {{dato.da_numero_celular}}                                    
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <span v-if="dato.fecha_confor_carne" class="badge badge-circle badge-success"></span>
                                    <span v-else class="badge badge-circle badge-warning"></span>
                                </td>
                                <td class="text-center">
                                    <a v-bind:href="$parent.NombreRuta + '/inscripcion/carne3?token=' + encodeid(dato.id)" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <span class="svg-icon svg-icon-3"><i class="bi bi-eye fs-2"></i></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
		</div>
    </div>
</template>
<script>
import JSZip from 'jszip';

export default {
    data() {
        return {
            datos:[],
            botonCargando: false,
            filtros: {
                // carrera: '',
                // modalidad: 1,
                estado: '',
                dato:''
            },
        }
    },
    mounted() {
        this.buscar(1)
    },
    methods: {
        async descargarPDFs() {
            try {
                // Filtrar los datos de los postulantes cuya condición sea 'INGRESO'
                const postulanteCarne = this.datos.filter(postulante => postulante.confor_carnet === 1);
                // Crear un nuevo objeto JSZip
                const zip = new JSZip();
                // Iterar sobre los postulantes y agregar los PDFs al archivo ZIP
                await Promise.all(postulanteCarne.map(async postulante => {
                    const url = `${this.$parent.NombreRuta}/inscripcion/carne3?token=${this.encodeid(postulante.id)}`;
                    const pdfResponse = await axios.get(url, { responseType: 'arraybuffer' });
                    // Obtener el nombre del archivo sin comillas
                    const contentDisposition = pdfResponse.headers['content-disposition'];
                    const matches = contentDisposition.match(/filename="?([^"]+)"?/);
                    const nombreArchivo = matches ? decodeURIComponent(escape(matches[1])) : 'archivo.pdf';
                    // Crear un objeto Blob a partir de los datos del PDF
                    const blob = new Blob([pdfResponse.data], { type: 'application/pdf' });
                    // Agregar el archivo al ZIP
                    zip.file(nombreArchivo, blob);
                }));
                // Generar el archivo ZIP
                const zipBlob = await zip.generateAsync({ type: 'blob' });
                // Crear un enlace de descarga y simular un clic para descargar el archivo ZIP
                const link = document.createElement('a');
                link.href = URL.createObjectURL(zipBlob);
                link.download = 'Carné CIIS6.zip';
                link.click();
            } catch (error) {
                console.error('Error al descargar los PDFs', error);
            }
        },
        async mostrarDatos() {
            this.botonCargando = true
            let estado = this.filtros.estado
            let dato = this.filtros.dato
			await axios
            .get(this.$parent.NombreRuta + "/api/fichas/descarga_carnet?estado="+estado+'&dato='+dato)
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
                    this.filtros.estado = ''
                    break;
                case 1:
                    this.filtros.dato = ''
                    break;
                case 2:
                    this.filtros.estado = ''
                    break;
            }
            this.mostrarDatos()
        },
        encodeid(id) {

            let codigo = btoa(id);
            return codigo;
        },
    },
}
</script>