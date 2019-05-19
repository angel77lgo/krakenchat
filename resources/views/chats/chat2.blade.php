<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat - KrakenChat</title>
    @include('layouts.tools')
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $(".dropdown-trigger").dropdown();
            //autocomplete
            $('input.autocomplete').autocomplete({
                data: {
                    "Apple": null,
                    "Microsoft": null,
                    "Google": 'https://placehold.it/250x250'
                },
            });
            $(".chat").animate({
                scrollTop: $('.chat').prop("scrollHeight")
            }, 1000);

            $('#modal1').modal();
        });
   
    </script>
</head>

<body>
    <!--Navbar-->
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content ">
        <li><a href="#">
             {{Auth()->user()->username}}
            </a>
        </li>
        <li><a href="#!">Perfil</a></li>
        <li><a href="#!">Configuración</a></li>
        <li class="divider"></li>
       
        <li><a href="{{route('logout')}} " onclick="event.preventDefault();
        document.getElementById('logout-form').submit()">Cerrar Sesión</a></li>

        <form action="{{route('logout')}}" method="post" id="logout-form">
                {{ csrf_field() }}
        </form>
    </ul>
    <nav style="background-color: white">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo white-text"></a>
            <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li>
                    <a class="dropdown-trigger grey-lighten-2-text nanum-gothic" href="#!" data-target="dropdown1">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right" style="font-size:35px">more_vert</i>
                </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--fin de navbar-->
    <div class="container">
        <div class="row" style="margin-top: 35px;">
            <div class="card z-depth-3 col m12 s12">
                <div class="card-content">

                    <!--primer columna-->
                    <div class="col m4 s12">
                        <div class="row ">
                            <div class="input-field col s12">
                                <i class="material-icons prefix ">search</i>
                                <input type="text" id="autocomplete-input" class="autocomplete">
                                <label for="autocomplete-input" class="nanum-gothic">Buscar</label>
                            </div>
                        </div>
                        <ul class="collection scroll">

                            @if (sizeof($contactos) == 0)
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal1"> Nuevo Chat</a>
                            @else
                            @foreach ($contactos as $item)
                            @if ($item -> id_remitente == Auth() -> user() -> id)
                            <li class="collection-item avatar" style="border-bottom: none">
                                <a href="#" style="color:#424242">
                                    <img src="{{asset('images/ronald rievest.jpg')}}" alt="" class="circle">
                                    <span class="title" style="font-weight: bolder">{{$item -> destinatario}}</span>
                                    <p class="truncate">First Line Second Linecasdasdasssssssssssssshghhhjjkhkjhgjg
                                    </p>
                                </a>
                            </li> 
                            @else
                            <li class="collection-item avatar" style="border-bottom: none">
                                <a href="#" style="color:#424242">
                                    <img src="{{asset('images/ronald rievest.jpg')}}" alt="" class="circle">
                                    <span class="title" style="font-weight: bolder">{{$item -> users -> username}}</span>
                                    <p class="truncate">First Line Second Linecasdasdasssssssssssssshghhhjjkhkjhgjg
                                    </p>
                                </a>
                            </li>
                            @endif
                           
                            @endforeach
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1"> Nuevo Chat</a>

                            @endif
                            
                           
                            
                        </ul>
                    </div>
                    <!--fin de primer columna-->
                    <div class="col m8">
                        <div class="card-panel grey lighten-4 z-depth-0 chat">
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                            <div class="col m12">
                                <div class="me nanum-gothic">
                                    Hola
                                </div>
                            </div>

                            <div class="col m12">
                                <div class="friend nanum-gothic">
                                    Pendejo
                                </div>
                            </div>
                        </div>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s11">
                                    <textarea id="mensaje" class="materialize-textarea"></textarea>
                                    <label for="mensaje">Escribe un mensaje aquí</label>
                                </div>
                                <a href="#" id="BotonEnviar">
                                    <i class="material-icons col s1" style="font-size: 30px; margin-top:20px;color:#4db6ac">near_me</i>
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Escriba el nombre del contacto:</h4>
          <input type="text" id="contacto" class="validate">
        </div>
        <div class="modal-footer">
          <button class="waves-effect waves-light btn modal-trigger" onclick="agregarcontacto()">  Agregar </button>
        </div>
      </div>
              
</body>

</html>
<script>
   
    function agregarcontacto(){
       
        let contacto = $("#contacto").val();
        console.log(contacto);
        let route = "{{route('chat.new')}}";
        $.ajax({
            url:route,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET',
            datatype:'JSON',
            async:false,
            data:{contacto:contacto},
            success:function(data){
                if(data == "noexiste"){
                    Swal.fire("Error","El usuario no existe","error");
                    $("#contacto").val("");
                }else if(data.msg = "eselmismo"){
                    Swal.fire("Estas pendejo","No pudes mandarte mensajes a ti mismo","info");
                }
            },
            error:function(data){
            }
        });
    }
</script>
          