{{-- @component('mail::message')
# Introduction

Dear,

We look forward to communicating more with you. For more information visit our blog.

@component('mail::button', ['url' => 'http://admision.undc.edu.pe/'])
Blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <!-- Body here -->
    {{-- @component('emails.message') --}}
    {{-- @component('mail::message') --}}
    # Introduction

    Dear,

    We look forward to communicating more with you. For more information visit our blog.

    @component('mail::button', ['url' => 'http://admision.undc.edu.pe/'])
    Blog
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
    {{-- @endcomponent --}}


    {{-- @endcomponent --}}
    {{-- @slot('body')
        @component('mail::body')
            # E-mail de bienvenida
        @endcomponent
    @endslot
    # E-mail de bienvenida

    Hola Cristian, bienvenido a **Programación y  más** !

    Espero que el material del sitio te sea de ayuda, y puedas mejorar tus habilidades en programación.

    Lo primero que debes hacer es confirmar tu correo electrónico haciendo clic en el siguiente enlace,

        @component('mail::button', [ 'url' => 'https://portal.undc.edu.pe/admision/' ])
            Clic para confirmar tu email
        @endcomponent --}}

    {{-- Subcopy --}}
    @slot('subcopy')
        @component('mail::subcopy')
            subcopy here
        @endcomponent
    @endslot


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent