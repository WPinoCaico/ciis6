@component('mail::message')
# <center>Hola.</center>

Confirma tu dirección de correo electrónico haciendo clic en el botón de abajo. Debes hacerlo para poder desbloquear el acceso a tu nueva cuenta.

@component('mail::button', ['url' => 'http://admision.undc.edu.pe/', 'color' => 'green'])
Activar cuenta
@endcomponent

{{-- @component('mail::panel')
This is the panel content.
@endcomponent --}}


Si el botón no funciona, solo tienes que pegar el siguiente enlace en la ventana del navegador: https://undc.edu.pe/admision/inscripciones/verificar-email.php?tipo=0&key=70787422&token=f55ee4f57330dc6bf5769a9f7d05032d7770
<br>
<br>
Equipo de admisión,<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
