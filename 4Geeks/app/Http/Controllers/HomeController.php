<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Type_User;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    
    //FUNCIÓN PARA REDIRECCIONAR AL LOGIN
    
	public function getLogin ( Request $request  ){

		return view('auth.login');

	}
    
    //FUNCIÓN PARA REDIRECCIONAR AL REGISTER 
	public function getRegister ( Request $request ){

		return view('auth.register');

	}
    
    //FUNCION PARA VERIFICACION DE CUENTA Y ACCESO AL HOME
    
	public function postLogin( Request $request ){

		//VERIFICA LAS CREDENCIALES DEL USUARIO
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {

            if(Auth::user()->typeUser->type == 'normal'){

                return response()->json('true', 200);//REDIRECCION A LA VISTA SEGUN EL TIPO DE USUARIO

            }


        }else{
            
            return response()->json('false', 200);


        }
	}

    //FUNCIÓN PARA REGISTRAR USUARIOS DE TIPO NORMAL
	public function postRegister( Request $request ){
        
        try{
              
            DB::beginTransaction(); 

            if ( Hash::check( $request->get('password') , bcrypt( $request->get('password_confirmation') ) )  ){
                $user = DB::table('users')
                            ->where('email','=',$request['email'])->get(); //VERIFICA SI EL CORREO EXISTE

                if ( count($user) == 0) {
                
                    $user = new User();
                    $user->fill($request->all());
                    $user->type_user_id = 1; //Usuario normal

                    $user->save();

                    DB::commit();


                    return response()->json('true', 200);
                    
                }else{
                    
                    return response()->json('error', 200);
                }
                
            }else{
                
                return response()->json('false', 200);
                
            }
            

        }catch (\Exception $e){

            DB::rollback();

            return response()->json('error', 200);

        }

    }


    //FUNCIÓN QUE REDIRECCIONA AL HOME

	public function home( Request $request ){

		return view('normal.index');

	}

    //FUNCIÓN QUE SACA DE LA SESIÓN AL USUARIO

	public function getLogout(){

		Auth::logout();//CIERRA A SESSION DEL USUARIO

        return redirect()->route('getLogin');//REDIRECCION A LA PANTALLA INICIO
	}

}
