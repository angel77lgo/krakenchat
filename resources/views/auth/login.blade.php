<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
        
  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });</script>
        <title>Login - KrakenChat</title>

    
        @include('layouts.tools')
    </head>
    <body>
        @include('layouts.navbar')
        <br>
        <div class="row">
            <div class="col m4"></div>
            <div class="col s12 m4 " >
                <div class="card z-depth-3">
                    <div class="card-content black-text center-align">
                        <img  src="{{asset('ico/logoarch.png')}}" class="responsive-img"  style="max-width:200px" >    
                        <br><br>
                        <span class="card-title"><b>Ingresa usuario y contraseña </b> </span>
                        <div class="row">
                                <form class="col s12">
                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="usuario" type="text" class="validate">
                                            <label for="usuario">Usuario</label>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password" type="password" class="validate">
                                            <label for="password">Contraseña</label>
                                        </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="input-field col s12">
                                                    <a class="waves-effect waves-light btn-large  col s12 ">Ingresar</a>
                                            </div>
                                        </div>
                                                        
                                </form>
                        </div>   
            
            
                            
                    </div>
                   
                </div>
            </div>
            <div class="col m4"></div>

        </div>
        
        @include('layouts.footer')      
 
    </body>
</html>