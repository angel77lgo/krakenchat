<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genero;
use App\User;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero = Genero::all();


        return view('users.registro',compact('genero'));
    }

    public function loginview()
    {
        return view('users.login');
    }

    public function profileview()
    {
        $user = Auth() -> user();

        return view('users.profile',compact('user'));
    }

    

    public function login(Request $request)
    {
        $data = $request -> all();
        // dd($data);
        $usuario = User::where("username","=",$request -> username)->get()->first();

        if(is_object($usuario)){
            if(Auth::attempt(['username' => $request -> username, 'password' => $request -> password])){
                return redirect()->route('chat.index');
            }
            return back()->withErrors(["password"=>"La contraseña es incorrecta"]);
        }else{
            return back()->withErrors(['username' => 'El usuario no esta registrado o es incorrecto']);
        }
    
        // if(is_object($usuario)){
        //     if(Hash::check($request->password, $usuario -> password)){

        //         return view('chats.chat2',compact('usuario'));

        //     }else{
        //         return back()->withErrors(['password' => 'La contraseña no coincide']);
        //     }
        // }else{
        //     return back()->withErrors(['username' => 'El usuario no esta registrado']);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $verificar = User::where('username','=',$request -> username)->get()->first();
        if(is_object($verificar)){
            $verificar -> msg = "existe";
            return $verificar;
        }
        
        DB::beginTransaction();
        try{
            $usuario = new User();
            $usuario -> nombre = $request -> nombre;
            $usuario -> apellidos = $request -> apellido;
            $usuario -> username = $request -> username;
            $usuario -> password = Hash::make($request -> password);
            $usuario -> status_id = $request -> status;
            $usuario -> genero_id = $request -> genero;

            $usuario -> save();
            $usuario -> msg = "success";

        }catch(Exception $e){
            DB::rollback();
            return $e;
        }
        DB::commit();
        return $usuario;
    }



    public function show(Request $request)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $usuario = User::find($request -> id);

        if(is_object($usuario)){
            $usuario -> msg = "success";
            return $usuario;
        }else{
            $usuario -> msg = "error";
            return $usuario;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try{

        }catch(Exception $e){
            DB::rollback();
            return $e;
        }
        DB::commit();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
    
        Auth::logout();

        return redirect('/usuario/login');
    }
}
