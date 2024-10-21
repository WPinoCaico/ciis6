<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
  <title>Carné Participante</title>
</head>
<body>  
    <div class="page"> 
        <!-- QR -->
        @isset($qr)
        <img src="data:image/png;base64, {!! $qr !!}">
        @endisset
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- NOMBRES Y APELLIDOS -->
        <div class="nomape">            
          <br>
            <b>
            {{ $dp_nombre ?? '' }} {{ $dp_apellido_p ?? '' }} {{ $dp_apellido_m ?? '' }}
            </b>
            <br>            
          <br>
        </div>
        <!-- DNI -->
        <div class="dni">
          <b>
          {{$numero_documento}}
          </b>
        </div>
        <div>
          <img class="fondo" src="{{ public_path('assets/media/images/carnet.jpg') }}">
        </div>        
    </div>
    
</body>
<style>
  .fondo {
    margin: 0;
    position: absolute; 
    top: 0; 
    left: 0; 
    height: 100%; 
    width: 100%; 
    z-index: 0;
  }
  body {
    margin: 0;
    padding: 0;
    width: 105mm; 
    height: 148mm; 
    font-family: sans-serif;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: hidden;
  }
  img {
    position: absolute;
    margin-left: 117px;
    top:  83px;
  }  
  @page {    
    size: A6; 
    margin: 0;
  }
  .nomape{
    position: absolute;
    top:  272px; 
    text-align: center;
    font-size: 25px; 
    color: #0f2b43;
  }
  .dni{
    position: absolute;
    margin-left: 165px;
    top:  481px; 
    font-size: 20px;
    color: white;
  }
</style>
</html>