<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="es">
	<!--begin::Head-->
	<head>
		<!--<base href="">-->
		<title>CIIS6 | UNDC</title>
		<meta charset="utf-8" />

		<meta name="description" content="Plataforma de inscripciones para el examen de admisión de la Universidad Nacional de Cañete" />
		<meta name="keywords" content="Admisión 2024, Examen de admisión, Universidad nacional de cañete" />
		<!-- CSRF Token -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--<meta property="og:locale" content="en_US" />-->
		<!--<meta property="og:type" content="article" />-->
		<meta property="og:title" content="INSCRIPCIONES - ADMISIÓN UNDC 2024" />
		<meta property="og:url" content="https://admision.undc.edu.pe" />
		<meta property="og:site_name" content="Admisión | UNDC" />

		<!--<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />-->

		<link rel="shortcut icon" href="/assets/media/logos/icono.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used by this page)-->
		<!--<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />-->
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!--<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />-->
		<!--end::Global Stylesheets Bundle-->

		<!-- <link rel="stylesheet" href="{{ mix('/css/plantilla.css') }}"> -->
		<link href="/ciis6/public/css/plantilla.css" rel="stylesheet" type="text/css" />

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
		<!--{{auth()->user()}}-->
		<!--begin::Theme mode setup on page load-->
		<script>
			if ( document.documentElement ) { 
				const defaultThemeMode = "system"; 
				const name = document.body.getAttribute("data-kt-name"); 
				let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); 
				if ( themeMode === null ) { 
					if ( defaultThemeMode === "system" ) { 
						themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
					} else { themeMode = defaultThemeMode; } 
				} document.documentElement.setAttribute("data-theme", themeMode); 
			}
		</script>
		<!--end::Theme mode setup on page load-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            @yield('content')
        </div>
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<!--<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>-->
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used by this page)-->
		<!--<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/new-target.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>-->
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		<script>
		window.Laravel = {
			jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():0 !!}
		}
		</script>
        <!-- <script src="{{ mix('js/plantilla.js') }}"></script> -->
		<script src="/ciis6/public/js/plantilla.js"></script>

		<!--Start of Tawk.to Script-->
		<!-- <script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/6024c90c918aa261273dd05b/1eu7r2mr9';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
		</script> -->
		<!--End of Tawk.to Script-->
	</body>
	<!--end::Body-->
</html>