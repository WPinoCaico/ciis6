import Home from './components/modulos/Home.vue'
import Inicio from './components/modulos/Inicio.vue'
// import ExampleComponent from './components/ExampleComponent.vue'
//GENERAL
import Login from './components/Login.vue'
//ADMINISTRADOR
import usuariosRoles from './components/modulos/usuariosRoles.vue'
import Reportes from './components/modulos/Reportes.vue'
import ReporteAsistenciaQR from './components/modulos/ReporteAsistenciaQR.vue'
import AsistenciaQR from './components/modulos/AsistenciaQR.vue'
import ListaAsistencia from './components/modulos/ListaAsistencia.vue'
import descargaCarne  from './components/modulos/descargaCarne.vue'
function can(value){
    return window.Laravel.jsPermissions.permissions.includes(value);
}
function is(value){
    return window.Laravel.jsPermissions.roles.includes(value);
}
export const routes = [
    {
        name: 'Home',
        path: '/dashboard',
        component: Home
    },
    {
        name: 'Inicio',
        path: '/inicio',
        component: Inicio,
        meta: {
            requiresAuth: true
          }
    },
    //GENERAL
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    //ADMINSTRADOR
    {
        name: 'usuariosRoles',
        path: '/usuarios-roles',
        component: usuariosRoles,
        beforeEnter: (to, from, next) => {
            if (is('Administrador')) next();
            else next('/inicio');
        }
    },
    {
        name: 'descargaCarne',
        path: '/descarga-carnet',
        component: descargaCarne,
        beforeEnter: (to, from, next) => {
            if (is('Administrador') || is('Asesor') || is('Colaborador')) next();
            else next('/inicio');
        }
    },
    {
        name: 'reporteGeneral',
        path: '/reporte-general',
        component: Reportes,
        beforeEnter: (to, from, next) => {
            if (is('Administrador') || is('Comision') || is('Colaborador')) next();
            else next('/inicio');
        }
    },
    //Reporte Asistencia QR
    {
        name: 'reporteasistenciaQR',
        path: '/reporte-asistencia-qr',
        component: ReporteAsistenciaQR,
        beforeEnter: (to, from, next) => {
            if (is('Administrador')|| is('Comision') || is('Colaborador')) next();
            else next('/inicio');
        }
    },
    //Asistencia QR
    {
        name: 'asistenciaQR',
        path: '/asistencia-qr',
        component: AsistenciaQR,
        beforeEnter: (to, from, next) => {
            if (is('Administrador')||is('Asesor')|| is('Asistente')|| is('Colaborador')) next();
            else next('/inicio');
        }
    },
    //Lista Asistencia
    {
        name: 'listaasistencia',
        path: '/lista-asistencia',
        component: ListaAsistencia,
        beforeEnter: (to, from, next) => {
            if (is('Administrador')|| is('Comision')) next();
            else next('/inicio');
        }
    }
]
