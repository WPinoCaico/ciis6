@component('mail::message')
# ¡{{$details['nombres']}}, inscripción completada!

Estimado(a) postulante, mediante el presente se confirma que se ha completado su inscripción en el proceso de admisión 2024.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

@component ('mail::panel') 
+ N° de documento de identidad: **{{$details['dni']}}**
+ Carrera: **{{$details['carrera']}}**
+ Modalidad: **{{$details['modalidad']}}**
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
