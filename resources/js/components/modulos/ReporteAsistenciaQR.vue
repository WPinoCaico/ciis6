<template>
  <div>    
    <!-- Tarjeta de Indicadores de Proceso de Asistencia-->
    <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Indicadores de Proceso</span>
        </h3>
      </div>
      <div class="card-body py-4">
        <div class="container" style="text-align: center;">
          <div class="row" style="display: flex; justify-content: center;">
            <!-- Postulantes Presentes -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #007BFF; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style="font-size: 2rem; color: #007BFF; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #007BFF; margin: 0;">
                    Presentes
                  </h5>
                  <p v-if="postulantePresente == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ postulantePresente }}
                  </p>
                  <p>
                    Cantidad de Postulantes Presentes
                  </p>
                </div>
              </div>
            </div>
            <!-- Postulantes Ausentes -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #28a745; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #28a745; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #28a745; margin: 0;">
                    Ausentes
                  </h5>
                  <p v-if="postulanteAusente == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ postulanteAusente }}
                  </p>
                  <p>
                    Cantidad de Postulantes Ausentes
                  </p>
                  <p></p>
                </div>
              </div>
            </div>
            <!-- Postulantes Totales -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #ffc107; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #ffc107; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #ffc107; margin: 0;">
                    Total
                  </h5>
                  <p v-if="postulanteTotal == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ postulanteTotal }}
                  </p>
                  <p>Cantidad Total de Postulantes en Proceso</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      // Igualado de variables a 0 para inicialización
      postulanteTotal: 0,
      postulanteAusente: 0,
      postulantePresente: 0,
      tablaaulas:0,
      botonCargando: false,
      filtros: {
        estado: 1,
        dato: ''
      },
    };
  },
  mounted() {
    this.mostrarDatos();

  },
  methods: {
    async mostrarDatos() {
      let modalidad = this.filtros.modalidad
      this.botonCargando = true,
        await axios
          .get(this.$parent.NombreRuta + "/api/fichas/reporte_asistencia_qr")
          .then((response) => {
            // Llamado de variables para Indicadores de Proceso
            this.postulanteTotal = response.data.postulanteTotal;
            this.postulanteAusente = response.data.postulanteAusente;
            this.postulantePresente = response.data.postulantePresente;
            this.tablaaulas = response.data.tablaaulas;
            this.botonCargando = false
          })
          .catch(function (error) {
            // console.error('Error al obtener datos de la ficha:', error);
          });
    },
    buscar(opcion) {
      switch (opcion) {
        case 0:
          this.filtros.dato = ''
          break;
        case 1:
          this.filtros.dato = ''
          break;
        case 2:
          break;
      }
      this.mostrarDatos()
    },
  },
};
</script>