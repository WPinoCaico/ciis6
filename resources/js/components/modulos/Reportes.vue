<template>
  <div>
    <!-- Filter Procesos -->
    <!-- <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
      <label>
        Procesos
      </label>
      <select class="form-select" @change="buscar(1)" aria-label="Select example" v-model="filtros.procesos">
        <option value="">TODOS</option>
        <option value="24II">
          2024-II
        </option>
        <option value="24I">
          2024-I
        </option>
        <option value="23I">
          2023-I
        </option>
        <option value="22I">
          2022-I
        </option>
        <option value="21I">
          2021-I
        </option>
        <option value="20I">
          2020-I
        </option>
      </select>      
    </div> -->
    <!-- Filter Modalidades -->
    <!-- <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
      <label>
        Modalidades
      </label>
      <select class="form-select" @change="buscar(1)" aria-label="Select example" v-model.number="filtros.modalidad"
        style="width: 100%;">
        <option value="" style="font-weight: bold;">TODOS</option>
        <option value="1" style="font-weight: bold;">ORDINARIO</option>
        <option value="extraordinario" style="font-weight: bold;">EXTRAORDINARIO</option>
        <optgroup label="v">
          <option value="2">Primeros Puestos</option>
          <option value="3">Graduados y Titulados</option>
          <option value="10">Traslado Interno</option>
          <option value="4">Traslado Externo</option>
          <option value="5">Ley 29973 Personas con Discapacidad</option>
          <option value="6">Ley 28036 Deportistas Calificados</option>
          <option value="7">Ley 27277 Víctimas del Terrorismo</option>
          <option value="8">Centro PRE (Ingresantes)</option>
        </optgroup>
        <option value="11" style="font-weight: bold;">QUINTO DE SECUNDARIA</option>
      </select>
    </div> -->
    <!-- Tarjeta de Indicadores de Proceso de Inscripción-->
    <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Indicadores de Proceso</span>
        </h3>
      </div>
      <div class="card-body py-4">
        <div class="container" style="text-align: center;">
          <div class="row" style="display: flex; justify-content: center;">
            <!-- Total -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #007BFF; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style="font-size: 2rem; color: #007BFF; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #007BFF; margin: 0;">
                    Total
                  </h5>
                  <p v-if="totalProceso == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ totalProceso }}
                  </p>
                  <p>
                    Cantidad de Preinscritos e inscritos
                  </p>
                </div>
              </div>
            </div>
            <!-- Postulantes Validados -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #28a745; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #28a745; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #28a745; margin: 0;">
                    Postulantes Validados
                  </h5>
                  <p v-if="canInscritos == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canInscritos }}
                  </p>
                  <p>
                    Cantidad de Postulantes Inscritos
                  </p>
                  <p></p>
                </div>
              </div>
            </div>
            <!-- En proceso -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #ffc107; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #ffc107; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #ffc107; margin: 0;">
                    En Proceso
                  </h5>
                  <p v-if="canPreInscritos == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canPreInscritos }}
                  </p>
                  <p>Cantidad de Postulantes Pre Inscritos</p>
                </div>
              </div>
            </div>
            <!-- Pendientes a validar -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #dc3545; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #dc3545; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #dc3545; margin: 0;">
                    Pendientes Validar
                  </h5>
                  <p v-if="canPendientes == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canPendientes }}
                  </p>
                  <p>Postulantes por Verificar Documentos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tarjeta de Indicadores de cantidad -->
    <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Indicadores de cantidad</span>
        </h3>
      </div>
      <div class="card-body py-4">
        <div class="container">
          <div class="row" style="display: flex; justify-content: center;">
            <!-- Pagos por Derecho de Examen -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #007BFF; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #007BFF; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #007BFF; margin: 0;">
                    Total Derecho Exam.
                  </h5>
                  <p v-if="canPagoInscripcion == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canPagoInscripcion }}
                  </p>
                  <p>
                    Derecho de Examen Vendidos
                  </p>
                  <p></p>
                </div>
              </div>
            </div>
            <!-- Cantidad de Examen comprado por postulantes de colegio privado -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #28a745; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style="font-size: 2rem; color: #28a745; margin: 5px;"></i>

                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #28a745; margin: 0;">
                    Derecho E. Privado
                  </h5>
                  <p v-if="(canExamPriv) == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canExamPriv }}
                  </p>
                  <p>
                    Examen Colegio Privado
                  </p>
                </div>
              </div>
            </div>
            <!-- Cantidad de Examen comprado por postulantes de colegio público -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #ffc107; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style="font-size: 2rem; color: #ffc107; margin: 5px;"></i>

                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #ffc107; margin: 0;">
                    Derecho E. Público
                  </h5>
                  <p v-if="(canExamPubl) == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canExamPubl }}
                  </p>
                  <p>
                    Examen Colegio Público
                  </p>
                </div>
              </div>
            </div>
            <!-- Prospectos Vendidos -->
            <div class="col" style="margin-bottom: 25px; flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #dc3545; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-user" style=" font-size: 2rem; color: #dc3545; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #dc3545; margin: 0;">
                    Prospectos Vendidos
                  </h5>
                  <p v-if="canProspecto == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    {{ canProspecto }}
                  </p>
                  <p>Prospectos Vendidos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tarjeta de Reporte de Ventas -->
    <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Indicadores Económicos</span>
        </h3>
      </div>
      <div class="card-body py-4">
        <div class="container">
          <div class="row" style="display: flex; justify-content: center;">
            <!-- Ingreso Total -->
            <div class="col" style="margin-bottom: 25px;  flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #007BFF; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-money-bill" style="font-size: 2rem; color: #007BFF; margin: 5px;"></i>

                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #007BFF; margin: 0;">
                    Ingreso Total
                  </h5>
                  <p v-if="pagoTotal == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    S/. {{ pagoTotal }}
                  </p>
                  <p>
                    Total de Ingreso Generado por modalidad
                  </p>
                </div>
              </div>
            </div>
            <!-- Monto de Examen comprado por postulantes de colegio privado -->
            <div class="col" style="margin-bottom: 25px;  flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #28a745; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-money-bill" style="font-size: 2rem; color: #28a745; margin: 5px;"></i>

                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #28a745; margin: 0;">
                    Examen Colegio Privado
                  </h5>
                  <p v-if="(pagoExamPrivado) == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    S/.{{ pagoExamPrivado }}
                  </p>
                  <p>
                    Pago por derecho de Examen Colegio Privado
                  </p>
                </div>
              </div>
            </div>
            <!-- monto de Examen comprado por postulantes de colegio público -->
            <div class="col" style="margin-bottom: 25px;  flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #ffc107; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-money-bill" style="font-size: 2rem; color: #ffc107; margin: 5px;"></i>

                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #ffc107; margin: 0;">
                    Examen Colegio Público
                  </h5>
                  <p v-if="(pagoExamPublico) == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    S/.{{ pagoExamPublico }}
                  </p>
                  <p>
                    Pago por derecho de Examen Colegio Público
                  </p>
                </div>
              </div>
            </div>
            <!-- Monto de Prospectos Vendidos -->
            <div class="col" style="margin-bottom: 25px;  flex:initial; width:auto;">
              <div class="card"
                style="width: 16rem; border: 1px solid #dc3545; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <i class="fas fa-money-bill" style=" font-size: 2rem; color: #dc3545; margin: 5px;"></i>
                <div style="flex: 1; text-align: center; padding: 1px;">
                  <h5 class="card-title"
                    style="font-size: 1.5rem; line-height: 1.4em; font-weight: bold;height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: center; color: #dc3545; margin: 0;">
                    Prospectos Adquiridos
                  </h5>
                  <p v-if="pagoProspectos == 0" class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    0
                  </p>
                  <p v-else class="card-text"
                    style="font-size: 2rem; font-weight: bold;overflow: hidden; white-space: nowrap; text-overflow: ellipsis; color: #333; margin: 0;">
                    S/.{{ pagoProspectos }}
                  </p>
                  <p>Ingresos de Prospectos Vendidos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tarjeta Reporte General -->
    <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Reporte general</span>
        </h3>
      </div>
      <div class="card-body py-3">
        <div class="table-responsive">
          <table class="table table-row-dashed table-row-gray-300 gy-7">
            <thead>
              <tr class="fw-bold fs-6 text-gray-800">
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Progreso</th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="botonCargando">
                <td colspan="3" class="text-center">
                  <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </td>
              </tr>
              <tr v-else v-for="(dato, index) in data" :index="index" :key="index">
                <td>{{ dato.nombre }}</td>
                <td>{{ dato.cantidad }}</td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" :style="{ width: dato.porcentaje + '%' }"
                      aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Tarjeta Reporte por Fecha -->
    <div class="card card-bordered mb-5">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold text-dark">Reporte por fecha</span>
        </h3>
      </div>
      <div class="card-body">
        <div id="kt_apexcharts_3" style="height: 350px"></div>
      </div>
    </div>
    <!-- Tarjeta Reporte por modalidades -->
    <!-- <div class="card mb-5 mb-xl-8">
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label fw-bold fs-3 mb-1">Reporte por modalidades</span>
        </h3>
      </div>
      <div class="card-body py-3">
        <div class="table-responsive">
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
              <tr v-if="botonCargando">
                <td colspan="4" class="text-center">
                  <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </td>
              </tr>
              <tr v-else v-for="(dato, index) in dataModalidades" :index="index" :key="index">
                <td class="ps-4">{{ dato.modalidad }}</td>
                <td class="text-center">
                  {{ dato.inscritos }}
                </td>
                <td class="text-center">
                  {{ dato.proceso }}
                </td>
                <td class="text-center">{{ dato.total }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> -->
  </div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      // Igualado de variables a 0 para inicialización
      canModalidad: 0,
      canPendientes: 0,
      canPreInscritos: 0,
      canInscritos: 0,
      totalProceso: 0,
      canUsuarios: 0,
      canProspecto: 0,
      canExamPubl: 0,
      canExamPriv: 0,
      canPagoInscripcion: 0,
      pagoProspectos: 0,
      pagoExamPublico: 0,
      pagoExamPrivado: 0,
      pagoTotal: 0,
      data: [],
      name: '',
      botonCargando: false,
      themeMode: '',
      chart: '',
      dataModalidades: [],
      options: {
        series: [{
          name: "REGISTROS",
          data: []
        }],
        chart: {
          height: 350,
          type: 'area',
          locales: [{
            name: 'en',
            options: {
              months: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
              shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
              days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
              shortDays: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
              toolbar: {
                download: 'Download SVG',
                selection: 'Selection',
                selectionZoom: 'Selection Zoom',
                zoomIn: 'Zoom In',
                zoomOut: 'Zoom Out',
                pan: 'Panning',
                reset: 'Reset Zoom',
              }
            }
          }]
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        legend: {
          position: 'top'
        },
        theme: {
          mode: 'light',
          palette: 'palette1',
          monochrome: {
            enabled: false,
            color: '#255aee',
            shadeTo: themeMode,
            shadeIntensity: 0.65
          },
        },
      },
      filtros: {
        // carrera: '',
        // modalidad: 1,
        estado: 1,
        dato: '',
        // procesos: ''
      },
    };
  },
  mounted() {
    this.mostrarDatos();
    this.mostrarGrafico();
    if (localStorage.kt_metronic_theme_mode_value) {
      this.themeMode = localStorage.kt_metronic_theme_mode_value;
    }
  },
  methods: {
    async mostrarDatos() {  
      // let procesos = this.filtros.procesos
      // let modalidad = this.filtros.modalidad
      this.botonCargando = true,
        await axios
          // .get(this.$parent.NombreRuta + "/api/reporte?modalidad=" + modalidad +"&procesos="+ procesos)
          .get(this.$parent.NombreRuta + "/api/reporte")
          .then((response) => {
            this.data = response.data.general;
            this.dataModalidades = response.data.modalidades;
            // Llamado de variables para Indicadores de Proceso
            this.canPendientes = response.data.canPendientes;
            this.canPreInscritos = response.data.canPreInscritos;
            this.canInscritos = response.data.canInscritos;
            this.canUsuarios = response.data.canUsuarios;
            this.totalProceso = response.data.totalProceso;
            // Llamado de variables para Indicadores de Cantidad
            this.canProspecto = response.data.canProspecto;
            this.canExamPubl = response.data.canExamPubl;
            this.canExamPriv = response.data.canExamPriv;
            this.canPagoInscripcion = response.data.canPagoInscripcion;
            // Llamado de variables para Indicadores Económicos
            this.pagoProspectos = response.data.pagoProspectos;
            this.pagoExamPublico = response.data.pagoExamPublico;
            this.pagoExamPrivado = response.data.pagoExamPrivado;
            this.pagoTotal = response.data.pagoTotal;
            this.chart.updateSeries([{
              data: response.data.canUsuariosDia
            }])
            this.chart.appendSeries({
              name: 'PROSPECTOS',
              data: response.data.dia.canProspectosDia
            })
            this.chart.appendSeries({
              name: 'INSCRITOS',
              data: response.data.dia.canInscritosDia
            })
            this.chart.updateOptions({
              theme: {
                mode: this.themeMode,
                palette: 'palette1',
                monochrome: {
                  shadeTo: this.themeMode,
                },
              },
            })
            this.botonCargando = false
          })
          .catch(function (error) {
            this.datos = [];
            this.botonCargando = false
          });
    },
    // Crear variables para los datos de la primera tarjeta
    canDeIndice(indice) {
      return this.data && this.data.length > indice && this.data[indice] && this.data[indice].cantidad ? this.data[indice].cantidad : '';
    },
    mostrarGrafico() {
      this.chart = new ApexCharts(document.getElementById('kt_apexcharts_3'), this.options);
      this.chart.render();
    },
    buscar(opcion) {
      switch (opcion) {
        case 0:
          // this.filtros.procesos = '',
          this.filtros.dato = '',
          // this.filtros.modalidad = '',
          // this.filtros.carrera = '',
          this.filtros.estado = ''
        break;
        case 1:
          this.filtros.dato = ''          
        break;
        case 2:
          // this.filtros.procesos = '',
          // this.filtros.modalidad = '',
          // this.filtros.carrera = '',
          this.filtros.estado = ''
        break;
      }
      this.mostrarDatos()
    },
  },
  beforeMount() {
    this.$root.$on('send', data => {
      this.themeMode = data;
      this.chart.updateOptions({
        theme: {
          mode: data,
          palette: 'palette1',
          monochrome: {
            shadeTo: data,
          },
        },
      })
    });
  }
};
</script>