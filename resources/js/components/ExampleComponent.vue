<template>
  <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div id="test_vocacional" class="m-content">
                <div class="row  justify-content-md-center">
                    <div :class="[$parent.UserData.id ? 'col-lg-8' : '', 'col-lg-5']">
                        <div class="m-login__logo" style="text-align: center; margin-top: 10px;">
                            <a v-if="!$parent.UserData.id" href="#">
                                <!-- <img src="https://portal.undc.edu.pe/admision/inscripciones/images/icono.png" width="90" height="100"> -->
                            </a>
                            <br>
                            <h3 v-if="!$parent.UserData.id">UNIVERSIDAD NACIONAL DE CAÑETE</h3>
                            <h5 v-if="!$parent.UserData.id">Oficina de Admisión</h5>
                            <br>
                        </div>
                        <div v-if="resultado==0" class="card shadow-xl">
                            <div class="card-header">
                                <h3 class="card-title">Test Vocacional</h3>
                            </div>
                            <form @submit.prevent="guardar" class="">
                                <div class="card-body fs-4">
                                    <div v-if="!$parent.UserData.id" class="m-form__heading">
                                        <h6 class="m-form__heading-title">
                                            DATOS
                                        </h6>
                                    </div>
                                    <div v-if="!$parent.UserData.id" class="input-group row">
                                        <div class="col-lg-6">
                                            <label>
                                                Nombre y apellidos:
                                            </label>
                                            <input type="text" class="form-control" v-model="nuevoRegistro.nombres" placeholder="Ingrese sus nombres completos" required>

                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">
                                                Celular
                                            </label>
                                            <!-- <div class="m-input-icon m-input-icon--right"> -->
                                                <input type="text" class="form-control" v-model="nuevoRegistro.celular" minlength="9" maxlength="9" pattern="[0-9]+" title="Solo números. Tamaño max: 9 dígitos." placeholder="Ingrese celular" required autocomplete="off">
                                                <!-- <span class="m-input-icon__icon m-input-icon__icon--right">
                                                    <span>
                                                        <i class="la la-mobile"></i>
                                                    </span>
                                                </span> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div v-if="!$parent.UserData.id" class="input-group row">
                                        <div class="col-lg-12">
                                            <label>
                                                Institución educativa:
                                            </label>
                                            <!-- <div class="m-input-icon m-input-icon--right"> -->
                                                <input type="text" class="form-control" v-model="nuevoRegistro.ie" placeholder="Ingrese el nombre de su colegio" required>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div v-if="!$parent.UserData.id" class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="">
                                                Email
                                            </label>
                                            <input type="Email" class="form-control" v-model="nuevoRegistro.email" size="50" maxlength="50" placeholder="Ingrese su correo" required autocomplete="off">
                                        </div>
                                    </div>
                                    <br>
                                    <div v-if="!$parent.UserData.id" class="m-form__heading">
                                        <h6 class="m-form__heading-title">
                                            TEST
                                        </h6>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2 fs-4" for="materias">
                                            1. ¿Cuáles de las siguientes materias son las que más te interesan en la escuela?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.materias" id="flexCheckChecked1" name="materias" required>
												<label class="form-check-label" for="flexCheckChecked1">Historia, Taller de Lectura y Redacción e Inglés</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.materias" id="flexCheckChecked1" name="materias">
												<label class="form-check-label" for="flexCheckChecked1">Economía, Sociología y Contabilidad</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.materias" id="flexCheckChecked1" name="materias">
												<label class="form-check-label" for="flexCheckChecked1">Matemática, Física y Química</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.materias" id="flexCheckChecked1" name="materias">
												<label class="form-check-label" for="flexCheckChecked1">Biología, Química y Ecología</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="libros">
                                            2. ¿Qué tipo de libros te llama la atención leer?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.libros" id="flexCheckDefault2" name="libros" required>
												<label class="form-check-label" for="flexCheckDefault2">Historia, Taller de Lectura y Redacción e Inglés</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.libros" id="flexCheckDefault2" name="libros">
												<label class="form-check-label" for="flexCheckDefault2">Aquellos en los que necesitas poner mucha atención para identificar las claves y pistas para así armar la historia</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.libros" id="flexCheckDefault2" name="libros">
												<label class="form-check-label" for="flexCheckDefault2">Historias en las que pueda saber fácilmente cómo el protagonista resolvió el problema que lo metió allí</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.libros" id="flexCheckDefault2" name="libros">
												<label class="form-check-label" for="flexCheckDefault2">Libros donde encuentres muchos detalles de los ambientes, que sean muy descriptivos</label>
											</div>
										</div>

                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="personaje">
                                            3. Si pudieras ser un personaje de la historia mundial ¿quién serías?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.personaje" id="flexCheckDefault3" name="personaje" required>
												<label class="form-check-label" for="flexCheckDefault3">Un hombre de negocios exitoso, como Bill Gates</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.personaje" id="flexCheckDefault3" name="personaje">
												<label class="form-check-label" for="flexCheckDefault3">Un inventor famoso, como Steve Jobs</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.personaje" id="flexCheckDefault3" name="personaje">
												<label class="form-check-label" for="flexCheckDefault3">Un novelista reconocido con el premio nobel, como Mario Vargas</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.personaje" id="flexCheckDefault3" name="personaje">
												<label class="form-check-label" for="flexCheckDefault3">Un científico destacado, como Gregor Mendel</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="trabajos">
                                            4. Si escogieras uno de los siguientes trabajos para el resto de tus días ¿cúal sería?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.trabajos" id="flexCheckDefault4" name="trabajos" required>
												<label class="form-check-label" for="flexCheckDefault4">Administrador de una Agencia de Viajes</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.trabajos" id="flexCheckDefault4" name="trabajos">
												<label class="form-check-label" for="flexCheckDefault4">Asistente de algún personaje importante</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.trabajos" id="flexCheckDefault4" name="trabajos">
												<label class="form-check-label" for="flexCheckDefault4">Investigador de un Centro de Mejoramiento Genético de Plantas</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.trabajos" id="flexCheckDefault4" name="trabajos">
												<label class="form-check-label" for="flexCheckDefault4">Técnico de reparación de aparatos eléctricos y electrónicos</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="causas">
                                            5. ¿Con cuál de las siguientes causas, usted se siente más identificado?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.causas" id="flexCheckDefault5" name="causas" required>
												<label class="form-check-label" for="flexCheckDefault5">Luchas en contra de la extinción de áreas verdes y espacios públicos</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.causas" id="flexCheckDefault5" name="causas">
												<label class="form-check-label" for="flexCheckDefault5">Programa se seguridad Alimentaria para contribuir con el hambre del mundo</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.causas" id="flexCheckDefault5" name="causas">
												<label class="form-check-label" for="flexCheckDefault5">La paz mundial y el trato igualitario hacia cualquier tipo de persona</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.causas" id="flexCheckDefault5" name="causas">
												<label class="form-check-label" for="flexCheckDefault5">Movimiento en contra de nuevos impuestos y reformas de leyes</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="actividades">
                                            6. ¿Con cuál de las siguientes actividades artísticas o culturales te sientes más cómodo?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.actividades" id="flexCheckDefault6" name="actividades" required>
												<label class="form-check-label" for="flexCheckDefault6">Algún curso de pintura o escultura</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.actividades" id="flexCheckDefault6" name="actividades">
												<label class="form-check-label" for="flexCheckDefault6">Clases de Instrumentos Musicales como guitarra, piano o batería</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.actividades" id="flexCheckDefault6" name="actividades">
												<label class="form-check-label" for="flexCheckDefault6">Talleres de guía ecoturístico o museología</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.actividades" id="flexCheckDefault6" name="actividades">
												<label class="form-check-label" for="flexCheckDefault6">Taller en Agricultura vertical, jardinería, diseño de áreas verdes</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="escenarios">
                                            7. De los escenarios que se te presentan a continuación ¿cuál te sería más atractivo?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.escenarios" id="flexCheckDefault7" name="escenarios" required>
												<label class="form-check-label" for="flexCheckDefault7">Un laboratorio científico</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.escenarios" id="flexCheckDefault7" name="escenarios">
												<label class="form-check-label" for="flexCheckDefault7">Una carrera de alta velocidad</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.escenarios" id="flexCheckDefault7" name="escenarios">
												<label class="form-check-label" for="flexCheckDefault7">Un banco</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.escenarios" id="flexCheckDefault7" name="escenarios">
												<label class="form-check-label" for="flexCheckDefault7">Un crucero</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="persona">
                                            8. En lo que más te fijas de una persona que no conoces cuando conversa contigo es
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.persona" id="flexCheckDefault8" name="persona" required>
												<label class="form-check-label" for="flexCheckDefault8">Si hace gestos o utiliza mucho sus manos</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.persona" id="flexCheckDefault8" name="persona">
												<label class="form-check-label" for="flexCheckDefault8">Que utilice las palabras exactas para decir lo que quiere expresar</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.persona" id="flexCheckDefault8" name="persona">
												<label class="form-check-label" for="flexCheckDefault8">Su espíritu aventurero y desafiante</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.persona" id="flexCheckDefault8" name="persona">
												<label class="form-check-label" for="flexCheckDefault8">El tiempo que se tarda en explicarte lo que quiere decir</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4 mb-10">
                                        <label class="label-left mb-2" for="actividad_mental">
                                            9. De la lista a continuación ¿cuál es la actividad mental que más te gusta hacer?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.actividad_mental" id="flexCheckDefault9" name="actividad_mental" required>
												<label class="form-check-label" for="flexCheckDefault9">Impulsar ideas creativas y mantener buenas relaciones con la gente</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.actividad_mental" id="flexCheckDefault9" name="actividad_mental">
												<label class="form-check-label" for="flexCheckDefault9">Proponer una estrategia para que la actividad que se me asignó pueda hacerse más rápido</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.actividad_mental" id="flexCheckDefault9" name="actividad_mental">
												<label class="form-check-label" for="flexCheckDefault9">Analizar un objeto en cuanto a su funcionamiento y partes que lo componen</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.actividad_mental" id="flexCheckDefault9" name="actividad_mental">
												<label class="form-check-label" for="flexCheckDefault9">Operaciones matemáticas</label>
											</div>
										</div>
                                    </div>
                                    <div class="fs-4">
                                        <label class="label-left mb-2" for="dia_libre">
                                            10. Para un día libre ¿qué actividad de las siguientes prefieres hacer?
                                        </label>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="2" v-model="nuevoRegistro.dia_libre" id="flexCheckDefault9" name="dia_libre" required>
												<label class="form-check-label" for="flexCheckDefault9">Ir a un museo o disfrutar de la naturaleza</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="1" v-model="nuevoRegistro.dia_libre" id="flexCheckDefault9" name="dia_libre">
												<label class="form-check-label" for="flexCheckDefault9">Ir a apostar a las carreras o un casino</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="4" v-model="nuevoRegistro.dia_libre" id="flexCheckDefault9" name="dia_libre">
												<label class="form-check-label" for="flexCheckDefault9">Ir a jugar bolos o bailar</label>
											</div>
										</div>
                                        <div class="mb-2">
											<div class="form-check">
												<input class="form-check-input" type="radio" value="3" v-model="nuevoRegistro.dia_libre" id="flexCheckDefault9" name="dia_libre">
												<label class="form-check-label" for="flexCheckDefault9">Estar en un día de campo o realizar un vuelo en globo</label>
											</div>
										</div>
                                    </div>
                                    <!-- <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label>
                                                User Group:
                                            </label>
                                            <div class="m-radio-inline">
                                                <label class="m-radio m-radio--solid">
                                                    <input type="radio" name="example_2" checked value="2">
                                                    Sales Person
                                                    <span></span>
                                                </label>
                                                <label class="m-radio m-radio--solid">
                                                    <input type="radio" name="example_2" value="2">
                                                    Customer
                                                    <span></span>
                                                </label>
                                            </div>
                                            <span class="m-form__help">
                                                Please select user group
                                            </span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <!-- <button type="reset" class="btn btn-secondary">
                                                    Cancel
                                                </button> -->
                                            </div>
                                            <!-- <div class="col-lg-6 m--align-right">
                                                <button type="reset" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </div> -->
                                        </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <div v-if="resultado==1" class="card shadow-xl">
                            <div class="card-header">
                                <h3 class="card-title">Resultado</h3>
                            </div>
                            <div class="card-body fs-4">
                                <h3>VAS QUE VUELAS PARA UNA CARRERA DE CIENCIAS EXACTAS</h3>
                                <hr>
                                <p>Debido a tus gustos, eres una persona que disfruta todo lo que tiene que ver con cálculos numéricos, actividades que sean muy precisas en su ejecución, así como que pongan a prueba tu capacidad mental y creatividad.</p>
                                <p><b>Carreras que puedes estudiar: </b> Ingeniería de Sistemas, Ingeniería Industrial, Informática, Ingeniería de Procesos, Arquitectura, Ingeniería de Software</p>
                                <br>
                                <p><b>Ahora que conoces tus opciones, recibe información de la carrera de tu interés</b></p>
                                <b>PIDE INFORMACIÓN A:</b>
                                <br>
                                <b>- 934 197 144</b><br>
                                <b>- sistemas_admision@undc.edu.pe</b><br><br>
                                <a href="https://drive.google.com/file/d/1UVo-5KXddcsaHKi_KwWQX1NT_qBQ4aXa/view?usp=sharing" target="_blank"> Descargar díptico - Ing. de sistemas</a>
                            </div>
                        </div>
                        <div v-if="resultado==2" class="card shadow-xl">
                            <div class="card-header">
                                <h3 class="card-title">Resultado</h3>
                            </div>
                            <div class="card-body fs-4">
                                <h3>LO TUYO, ¡ES EL TURISMO Y HUMANIDADES!</h3>
                                <hr>
                                <p>Te gusta pensar de manera diferente, te gustan los emprendimientos y piensas en forma innovadora, estos son aspectos super importantes para ti, para lograr cualquier tipo de objetivo, también, eres aficionado a los viajes, a
                                    conocer nuevas culturas y estudiar nuevos idiomas, así como aprovechar la oportunidad de viajar al extranjero.</p>
                                <p><b>Carreras que puedes estudiar: </b> Turismo, Traducción e Interpretación, Gastronomía Internacional, Idiomas, Educación</p>
                                <br>
                                <p><b>Ahora que conoces tus opciones, recibe información de la carrera de tu interés</b></p>
                                <b>PIDE INFORMACIÓN A:</b>
                                <br>
                                <b>- 960 732 455</b><br>
                                <b>- turismo_admision@undc.edu.pe</b><br><br>
                                <a href="https://drive.google.com/file/d/1vUTJ321haAvJbWDqLnh9wt0AxA92E6gM/view?usp=sharing" target="_blank"> Descargar díptico - Adm. de turismo y hotería</a>
                            </div>
                        </div>
                        <div v-if="resultado==3" class="card shadow-xl">
                            <div class="card-header">
                                <h3 class="card-title">Resultado</h3>
                            </div>
                            <div class="card-body fs-4">
                                <h3>LA AGRONOMÍA Y LAS CIENCIAS FORESTALES TE ESTÁN LLAMANDO</h3>
                                <hr>
                                <p>La Naturaleza es algo muy importante para personas como tú, es por eso que tienes siempre un sentido racional del aprovechamiento de los recursos y de su conservación para las futuras generaciones, donde predomine la calidad e inocuidad
                                    para una vida saludable. Te gusta el análisis de las situaciones antes de emitir cualquier tipo de juicio, por eso, sueles ser tan acertado en todos tus comentarios.</p>
                                <p><b>Carreras que puedes estudiar: </b> Agronomía, Ingeniería Forestal, Ingeniería Ambiental, Biología.</p>
                                <br>
                                <p><b>Ahora que conoces tus opciones, recibe información de la carrera de tu interés</b></p>
                                <b>PIDE INFORMACIÓN A:</b>
                                <br>
                                <b>- 947 148 205</b><br>
                                <b>- agronomia_admision@undc.edu.pe</b><br><br>
                                <a href="https://drive.google.com/file/d/1w9ohRYk8uFC47Qp_Kc-X6qvaLNjC7mG3/view?usp=sharing" target="_blank"> Descargar díptico - Agronomía</a>
                            </div>
                        </div>
                        <div v-if="resultado==4" class="card shadow-xl">
                            <div class="card-header">
                                <h3 class="card-title">Resultado</h3>
                            </div>
                            <div class="card-body fs-4">
                                <h3>TIENES QUE ESTUDIAR EN LAS ÁREAS ADMINISTRATIVAS</h3>
                                <hr>
                                <p>Tienes un alto sentido de la palabra "eficiencia" y te gusta que las cosas se hagan bien o que mejor ¡no se hagan! Es por eso que prefieres tener el control de las
                                    actividades que realizas tú y de los demás, para que el producto o servicio salgan de manera óptima.</p>
                                <p><b>Carreras que puedes estudiar: </b> Economía, Finanzas, Administración , Negocios Internacionales, Contabilidad, Hotelería y Turismo.</p>
                                <br>
                                <p><b>Ahora que conoces tus opciones, recibe información de la carrera de tu interés</b></p>
                                <b>PIDE INFORMACIÓN A:</b>
                                <br>
                                <b>- 917 933 448</b><br>
                                <b>- contabilidad_admision@undc.edu.pe</b>
                                <br><br>
                                <a href="https://drive.google.com/file/d/1w7Pyi8xV40t5xIxLyzR_IYGLuBtXy7bu/view?usp=sharing" target="_blank"> Descargar díptico - Contabilidad</a>
                                <br><br>
                                <hr>
                                <b>- 934 058 582</b><br>
                                <b>- administracion_admision@undc.edu.pe</b><br><br>
                                <a href="https://drive.google.com/file/d/1r_diyMWDoF1zto1PLO-LG5iBgQipqPFZ/view?usp=sharing" target="_blank"> Descargar díptico - Administración</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin::Footer -->
        <!-- <footer class="m-grid__item		m-footer " style="margin-left: 0px;">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            2021 &copy; Equipo de admisión |
                            <a href="../../../admision" target="_blank" class="m-link">
                                Universidad Nacional de Cañete
                            </a>
                        </span>
                    </div>

                </div>
            </div>
        </footer> -->
        <!-- end::Footer -->
    </div>
</template>

<script>
export default {
  data() {
    return {
      botonEnviar: false,
      nuevoRegistro: {
        nombres: "",
        celular: "",
        ie: "",
        email: "",
        materias: "",
        libros: "",
        personaje: "",
        trabajos: "",
        causas: "",
        actividades: "",
        escenarios: "",
        persona: "",
        actividad_mental: "",
        dia_libre: "",
      },
      resultado: 0,
      isLogin:''
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.isLogin = this.$parent.UserData.id ? true : false
  },
  computed: {
    
  }
};
</script>
