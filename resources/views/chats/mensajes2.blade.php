@extends('layouts.chat')     

@section('contenido')
     <!--Navbar-->
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content ">
 
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
                                {{Auth()->user()->username}}&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right" style="font-size:35px">more_vert</i>
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
                            <div class="row left-align">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix ">search</i>
                                    <input type="text" id="autocomplete-input" class="autocomplete">
                                    <label for="autocomplete-input" class="nanum-gothic">Buscar</label>
                                </div>
                                <a class="waves-effect waves-teal btn-large modal-trigger col s12 " href="#modal1" style="text-align: left"><i class="material-icons left">add</i>Nuevo Chat</a>
                            </div>
                            <ul class="collection scroll">
    
                                @foreach ($contactos as $item)
                                @if ($item -> id_remitente == Auth() -> user() -> id)
                                <li class="collection-item avatar" style="border-bottom: none">
                                    <a href="{{asset('/chat/nochat/'.$item -> id)}}" style="color:#424242">
                                        <img src="{{asset('images/ronald rievest.jpg')}}" alt="" class="circle">
                                        <span class="title" style="font-weight: bolder">{{$item -> destinatario}}</span>
                                        <p class="truncate">First Line Second Linecasdasdasssssssssssssshghhhjjkhkjhgjg
                                        </p>
                                    </a>
                                </li> 
                                @else
                                <li class="collection-item avatar" style="border-bottom: none">
                                    <a href="{{asset('/chat/nochat/'.$item -> id)}}" style="color:#424242">
                                        <img src="{{asset('images/ronald rievest.jpg')}}" alt="" class="circle">
                                        <span class="title" style="font-weight: bolder">{{$item -> users -> username}}</span>
                                        <p class="truncate">First Line Second Linecasdasdasssssssssssssshghhhjjkhkjhgjg
                                        </p>
                                    </a>
                                </li>
                                @endif
                               
                                @endforeach
                         </ul>
                        </div>
                        <!--fin de primer columna-->
                        <div class="col m8">
                               
                            <div class="card-panel grey lighten-4 z-depth-0 chat">
                           
                               
                                @foreach ($conversacion as $item)
                                <div class="col m12" >
                                  

                                    @if (($item -> chat_remitente == Auth() -> user() -> id))
                                    <div class="me nanum-gothic mensaje" id="{{$item -> id}}">
                                            {{$item -> texto}}
                                                           
                         
                                    </div>
                                    @else
                                    <div class="friend nanum-gothic mensaje" id="{{$item -> id}}">
                                            {{$item -> texto}}
                                            
                                        
                                            {{-- <button onclick="decifrar()" > Decifrar </button> --}}
                                           
                                    </div>
                                   
                                    @endif
                                  
                                </div>
                               @endforeach
                               <div class="col m12 nanum-gothic text-black" id='response'></div>
    
                            </div>
                            <div class="col s12">
                            <input type="hidden" name="iddestinatario" id="iddestinatario" value="{{$destinatario}}">
                                    <input type="hidden" name="idchat" id="idchat" value="{{$chatid}}">
                                <div class="row">
                                    <div class="input-field col s11">
                                        <textarea id="mensaje" class="materialize-textarea" name="mensaje" ></textarea>
                                        <label for="mensaje">Escribe un mensaje aquí</label>
                                    </div>
                                    
                                    <button class="waves-effect waves-teal white btn-large col s1 z-depth-0" onclick="escribirMensaje()"><i class="material-icons Medium center-align Large " style="color:#4db6ac">near_me</i></button>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
       
    
        </div>
        <div id="modal1" class="modal" style="max-width:750px">
            <div class="modal-content">
              
              <div class="row"><br><br>
                <div class="input-field col s12">
                 <input type="text" id="contacto" class="validate" autofocus> 
                  <label for="c ontacto">Nombre de Usuario</label>
                </div>
              </div> 
             
            </div>
            <div class="modal-footer">
              <button class="waves-effect waves-light btn modal-trigger" onclick="agregarcontacto()">  Agregar </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
          </div>
@endsection

@section('javascript')
<script>
    function escribirMensaje(){
        let route = "{{route('mensaje.escribir')}}";
        let iddestinatario = $("#iddestinatario").val();
        let idchat = $("#idchat").val();
        let mensaje = $("#mensaje").val();
        console.log(iddestinatario+' '+ idchat+' '+mensaje);
    
        if(iddestinatario == "" || idchat == "" || mensaje == 0){
           
            $('#response').html("Verifique que no haya campos vacios");
            
        }else{
            $.ajax({
            url:route,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            datatype:'JSON',
            async:false,
            data:{iddestinatario,idchat,mensaje},
            success:function(data){
                if(data.msg == "msjsend"){
                    $('#response').html("El mensaje fue enviado");
                    $("#response").fadeOut("slow");
                    $("#mensaje").val("");
                    
                    
                }else{
                   
                    $('#response').html("Lo sentimos su mensaje no pudo ser enviado"); 
                }
            },
            error:function(data){
                $('#response').html("Ups Algo Salio mal error");
               
            }
        });
        }
        
        
    }

    $('.mensaje').on('click',function(){
        console.log("Pulso");

        let id = $(this).attr("id");
        let route = "{{route('mensaje.decrypt')}}";
        $.ajax({
            url:route,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET',
            datatype:'JSON',
            async:false,
            data:{id:id},
            success:function(data){
               console.log(data);
                $("#response").html(data);
            },
            error:function(data){
            }
        });
    });
</script>  

@endsection

   