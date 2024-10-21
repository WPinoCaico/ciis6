<template>
  <!--begin::App-->
  <!--<div class="d-flex flex-column flex-root app-root" id="kt_app_root">-->
  <!--begin::Page-->
  <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
    <!--begin::Header-->
    <Header></Header>
    <!--end::Header-->
    <!--begin::Wrapper-->
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
      <!--begin::sidebar-->
      <Sidebar></Sidebar>
      <!--end::sidebar-->
      <!--begin::Main-->
      <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
          <!--begin::Toolbar-->
          <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxxl d-flex flex-stack">
              <!-- Título de página -->
              <!-- <div
                class="page-title d-flex flex-column justify-content-center flex-wrap me-3"
              >
                <h1
                  class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"
                >
                  {{ toolbarTittle }}
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                  <li class="breadcrumb-item text-muted">
                    <a
                      href="/inicio"
                      class="text-muted text-hover-primary"
                      >Home</a
                    >
                  </li>
                  <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                  </li>
                  <li class="breadcrumb-item text-muted">
                    {{ toolbarTittle }}
                  </li>
                </ul>
              </div> -->
              <!--end::Page title-->
              <!--begin::Actions-->
              <!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a
                  href="#"
                  class="
                    btn btn-sm
                    fw-bold
                    bg-body
                    btn-color-gray-700 btn-active-color-primary
                  "
                  data-bs-toggle="modal"
                  data-bs-target="#kt_modal_create_app"
                  >Rollover</a
                >

                <a
                  href="#"
                  class="btn btn-sm fw-bold btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#kt_modal_new_target"
                  >Add Target</a
                >
              </div> -->
              <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
          </div>
          <!--end::Toolbar-->
          <!--begin::Content-->
          <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div
              id="kt_app_content_container"
              class="app-container container-xxxl"
            >
              <router-view></router-view>
            </div>
            <!--end::Content container-->
          </div>
          <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <Footer></Footer>
        <!--end::Footer-->
      </div>
      <!--end:::Main-->
    </div>
    <!--end::Wrapper-->
  </div>
  <!--end::Page-->
  <!--</div>-->
  <!--end::App-->
</template>
<script>
import Header from "./plantilla/Header.vue";
import Sidebar from "./plantilla/Sidebar.vue";
import Footer from "./plantilla/Footer.vue";
export default {
  data() {
    return {
      //NombreRuta: "",
      NombreRuta: "/ciis6/public",
      user: null,
      UserData:{
        id:"",
        id_tipo_documento:"",
        numero_documento:"",
        nombre:"",
        apellido_paterno:"",
        apellido_materno:"",
        numero_celular:"",
        email:"",
        email_verified_at:"",
        two_factor_secret:"",
        two_factor_recovery_codes:"",
        two_factor_confirmed_at:"",
        created_at:"",
        updated_at:""
      }
    };
  },
  components: { Header, Sidebar, Footer },
  mounted() {
    this.auth();
	//this.auth2();
  },
  methods: {
    auth() {
      this.axios.get(this.NombreRuta + `/api/user`).then((response) => {
        this.user = response.data;
        this.UserData = Object.assign({}, this.user)
      });
    },
	auth2() {
      this.axios.get(this.NombreRuta + `/sanctum/csrf-cookie`).then((response) => {
        this.user = response.data;
      });
    },
  },
  computed: {
    // a computed getter
    toolbarTittle() {
      //let name = '',
      let name = this.$route.name;
      return (name = name.charAt(0).toUpperCase() + name.slice(1));
      // `this` points to the component instance
      //return str.charAt(0).toUpperCase() + str.slice(1);
      //this.NombreRuta=this.$route.name
    },
  },
};
</script>