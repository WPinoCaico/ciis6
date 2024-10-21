<template>
  <div>
    <div class="class card mb-5 mb-xl-8">
      <p>{{ error }}</p>
      <qrcode-stream @init="onInit" @decode="onDecode"></qrcode-stream>
    </div>
    <!-- FILTRO BUSQUEDA -->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <label>
        Buscar
      </label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" v-on:keyup.enter="buscar(2)"
          placeholder="Buscar por nombres o DNI o código" v-model="filtros.dato" aria-describedby="button-addon2">
        <button class="btn btn-primary" @click.prevent="buscar(2)" type="button" id="button-addon2">Buscar</button>
      </div>
    </div>
    <!-- BOTÓN PARA LIMPIEZA DE FILTROS -->
    <div>
      <button class="btn btn-secondary" @click="limpiarFiltros()">Limpiar Filtros</button>
    </div>
    <!-- Tabla de datos por ficha -->
    <div class="card-body py-3">
      <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4">
          <thead>
            <tr class="fw-bold text-muted bg-light">
              <th>DNI</th>
              <th>Apellidos y Nombres</th>
              <th class="text-center rounded-end">Registrar Asistencia</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(dato, index) in datos" :index="index" :key="index">
              <td>{{ dato.numero_documento }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <p class="text-dark fw-bold mb-1 fs-6">{{ dato.dp_apellido_p + ' ' + dato.dp_apellido_m + ', ' +
                    dato.nombre }}</p>
                </div>
              </td>
              <td class="text-center">
                <button type="button" @click.prevent="registrarAsistencia" :class="[botonRegistrar ? 'm-loader m-loader--light m-loader--right' : '',
                  'btn',
                  'w-100',
                dato.AD1 === null ? 'btn-primary' : 'btn-danger']"
                  :disabled="botonRegistrar || dato.AD1 == 'INGRESO' || dato.AD1 == 'NO INGRESO' || dato.AD1 == 'AUSENTE' || dato.AD1 == 'PRESENTE' || botonRegistrarDisabled"
                  id="button-addon2">
                  <span v-if="botonRegistrar">Registrando</span>
                  <span v-else>{{ dato.AD1 == 'INGRESO' || dato.AD1 == 'NO INGRESO' || dato.AD1 ==
                    'AUSENTE' || dato.AD1 == 'PRESENTE' ? 'Registrado' : 'Registrar' }}</span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</template>
<script>
import { QrcodeStream } from 'vue-qrcode-reader'

export default {
  data() {
    return {
      error: '',
      decodedString: '',
      extractedId: '',
      datos: [],
      botonRegistrar: false,
      botonRegistrarDisabled: false,
      filtros: {
        dato: ''
      },
    }
  },
  components: {
    QrcodeStream
  },
  methods: {
    async onInit(promise) {
      try {
        const { capabilities } = await promise
        //successfully initalized
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "Al usuario se le negó el permiso de acceso a la cámara."
        } else if (error.name === 'NotFoundError') {
          this.error = "no se ha instalado ningún dispositivo de cámara adecuado"
        } else if (error.name == 'NotReadableError') {
          this.error = "la página no es un servidor a través de HTTPS (o localhost)"
        } else if (error.name == 'OverconstrainedError') {
          this.error = "tal vez la cámara ya esté en uso"
        } else if (error.name == 'StreamApiNotSupportedError') {
          this.error = "El navegador parece carecer de funciones"
        }
      } finally {
        //hide loading indicator
      }
    },
    // método que se activa cuando se decodifica el QR
    async onDecode(decodedString) {
      // ver el contenido del qr
      this.decodedString = decodedString;
      // abrir otra ventana con el contenido del qr
      // window.location.replace(decodedString);
      // Verificar si la cadena contiene 'token='
      const tokenIndex = decodedString.indexOf('token=');
      if (tokenIndex !== -1) {
        // Extraer la parte después de 'token='
        const tokenValue = decodedString.substring(tokenIndex + 'token='.length);
        // Decodificar el valor base64 extraído
        try {
          const id = atob(tokenValue);
          this.extractedId = id;
        } catch (error) {
          console.error('Error al decodificar:', error);
          this.extractedId = 'Error al decodificar el ID';
        }
      } else {
        this.extractedId = 'No se encontró ningún token en la cadena';
      };
      // Llamar a obtenerDatosFicha() después de que this.extractedId esté actualizado
      await this.obtenerDatosFicha();
    },
    async obtenerDatosFicha() {
      let dato = this.filtros.dato
      // Prueba de llamado de extractedId
      console.log('ficha ' + this.extractedId);
      let extracted = this.extractedId;
      await axios
        .get(this.$parent.NombreRuta + "/api/datosficha?extracted=" + extracted + '&dato=' + dato)
        .then((response) => {
          // Procesar la respuesta con los datos de la ficha
          this.datos = response.data;
          //console.log(response.data); // Aquí tendrás los datos de la ficha desde Laravel
          // Actualizar tu componente con los datos recibidos
        })
        .catch(function (error) {
          console.error('Error al obtener datos de la ficha:', error);
          // Manejar el error en caso de que ocurra
        });
    },
    async registrarAsistencia() {
      let extracted = this.extractedId;
      let dato = this.filtros.dato;
      // Cambia el estado del botón antes de que se realice la solicitud
      this.botonRegistrar = true;
      await axios
        .put(this.$parent.NombreRuta + "/api/registrarasistencia?extracted=" + extracted + '&dato=' + dato)
        .then(response => {
        // Realizar acciones adicionales después de registrar la asistencia si es necesario
            window.location.reload();
        })
        // Puedes realizar acciones adicionales después de registrar la asistencia si es necesario
        .catch(function (error) {
          console.error('Error al registrar asistencia:', error);
        });
      // Restablece el estado del botón después de la solicitud, independientemente de si fue exitosa o no
      this.botonRegistrar = false;
    },
    buscar(opcion) {
      switch (opcion) {
        case 0:
          this.filtros.dato = ''
            // this.filtros.condicion = ''
          break;
        case 1:
          this.filtros.dato = ''
          break;
        case 2:
            // this.filtros.condicion = ''
          break;
      }
      this.obtenerDatosFicha()
    },
    limpiarFiltros() {
      this.extractedId = '';
      this.filtros.dato = '';
      // Solo llama a obtenerDatosFicha si hay algún filtro definido
      if (this.extractedId || this.filtros.dato) {
        this.obtenerDatosFicha();
      }
    }
  },
  mounted() {
    // this.obtenerDatosFicha();
  }
}
</script> 