<template>
  <div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold fs-3 mb-1">Silmulacro de admisión</span>
      </h3>
    </div>
    <div v-if="ficha != 0 && ficha[0].id_estado_revision == 3 && ficha[0].mcp_id_modalidad == 1" class="card-body py-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card text-right">
            <div class="card-header bg-primary pt-7">
              <h3 class="card-title align-items-center w-100 text-center"><span
                  class="card-label fw-bold text-white">IMPORTANTE</span></h3>
            </div>
            <div class="card-body" style="text-align: left">
              <ul>
                <span class="badge badge-warning badge-lg">
                  <h3>IMPORTANTE: ANOTAR SU CÓDIGO DE POSTULANTE: {{ ficha[0].codigo_p }}</h3>
                </span>
                <br>
                <br>
                <li>Podrá acceder al simulacro con un correo Gmail</li>
                <li>El simulacro tiene una duración de 3 horas, de 9:00AM a 12:00 PM del 09 de marzo</li>
                <li>Pregunta correctamente contestada = 1 punto.</li>
                <li>Solo para el presente simulacro no hay puntos en contra</li>
                <li>Enviar antes de las 12:00PM las repuestas para visualizar el resultado</li>
                <!-- <li>Llevar el carné completo el día del examen junto a su documento de indentidad(DNI).</li>
                            <li>Las impresiones dactilares y firma en el carné se colocarán el día del examen en el aula.</li> -->
                <!-- <li>Firma y poner huella donde corresponda</li>
                        <li>Subir el carné escaneado y esperar la verificación</li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <!-- <a v-if="ficha[0].mcp_tipo==1" v-bind:href="'https://forms.gle/7YP3WaTpqEPPcYud8'" class="btn btn-success btn-block w-100" target="_blank">Acceder al Simulacro Tipo A
                </a>
                <a v-else-if="ficha[0].mcp_tipo==2" v-bind:href="'https://forms.gle/j9iMeckF6d6mrgu57'" class="btn btn-success btn-block w-100" target="_blank">Acceder al Simulacro Tipo B
                </a> -->
          <a v-bind:href="'#'" class="btn btn-success btn-block w-100 disabled" :disabled="true"
            target="_blank">Finalizado
          </a>
        </div>
      </div>
      <!-- <div class="table-responsive">
            <table class="table table-row-bordered">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 text-muted bg-light">
                <th class="ps-4 rounded-start">Modalidad</th>
                <th class="text-center">Inscritos</th>
                <th class="text-center rounded-end">En proceso</th>
                <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr index="0">
                <td class="ps-4">ORDINARIO</td>
                <td class="text-center">1413</td>
                <td class="text-center">145</td>
                <td class="text-center">1558</td>
                </tr>
                <tr index="1">
                <td class="ps-4">VICTIMAS DE TERRORISMO</td>
                <td class="text-center">17</td>
                <td class="text-center">1</td>
                <td class="text-center">18</td>
                </tr>
                <tr index="2">
                <td class="ps-4">TRASLADO EXTERNO</td>
                <td class="text-center">8</td>
                <td class="text-center">2</td>
                <td class="text-center">10</td>
                </tr>
                <tr index="3">
                <td class="ps-4">TRASLADO INTERNO</td>
                <td class="text-center">3</td>
                <td class="text-center">2</td>
                <td class="text-center">5</td>
                </tr>
                <tr index="4">
                <td class="ps-4">PRIMEROS PUESTOS</td>
                <td class="text-center">52</td>
                <td class="text-center">4</td>
                <td class="text-center">56</td>
                </tr>
                <tr index="5">
                <td class="ps-4">GRADUADOS Y TITULADOS</td>
                <td class="text-center">6</td>
                <td class="text-center">4</td>
                <td class="text-center">10</td>
                </tr>
                <tr index="6">
                <td class="ps-4">CEPRE</td>
                <td class="text-center">98</td>
                <td class="text-center">6</td>
                <td class="text-center">104</td>
                </tr>
                <tr index="7">
                <td class="ps-4">DISCAPACIDAD</td>
                <td class="text-center">8</td>
                <td class="text-center">0</td>
                <td class="text-center">8</td>
                </tr>
                <tr index="8">
                <td class="ps-4">DEPORTISTAS CALIFICADOS</td>
                <td class="text-center">1</td>
                <td class="text-center">0</td>
                <td class="text-center">1</td>
                </tr>
                <tr index="9">
                <td class="ps-4">TOTAL</td>
                <td class="text-center">1606</td>
                <td class="text-center">164</td>
                <td class="text-center">1770</td>
                </tr>
            </tbody>
            </table>
        </div> -->
    </div>
    <div v-else class="alert alert-dismissible bg-warning d-flex flex-column flex-sm-row p-5 mb-10">
      <!--begin::Icon-->
      <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0"><svg width="24" height="24" viewBox="0 0 24 24"
          fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.3"
            d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
            fill="currentColor"></path>
          <path
            d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
            fill="currentColor"></path>
        </svg></span>
      <!--end::Icon-->
      <!--begin::Wrapper-->
      <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 light">Simulacro solo disponible para postulantes inscritos</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <!-- <span>Felicitaciones has completado tu inscripción!.</span> -->
        <!--end::Content-->
      </div>
      <!--end::Wrapper-->
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
          //this.asignar(response.data)
        })
        .catch(function (error) {
          this.loadingData = false
          this.ficha = [];
        });
    },
    
  },
};
</script>