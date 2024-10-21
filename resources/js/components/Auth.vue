<template>
  <router-view></router-view>
</template>
<script>
export default {
  data() {
    return {
      UserData: {
        id: "",
        id_tipo_documento: "",
        numero_documento: "",
        nombre: "",
        apellido_paterno: "",
        apellido_materno: "",
        numero_celular: "",
        email: "",
        email_verified_at: "",
        two_factor_secret: "",
        two_factor_recovery_codes: "",
        two_factor_confirmed_at: "",
        created_at: "",
        updated_at: "",
      },
    };
  },
};
</script>