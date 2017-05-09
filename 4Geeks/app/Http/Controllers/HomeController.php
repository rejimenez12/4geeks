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
    
	public function getLogin ( Request $request  ){

		return view('auth.login');

	}

	public function getRegister ( Request $request ){

		return view('auth.register');

	}

	public function postLogin( Request $request ){

		//VERIFICA LAS CREDENCIALES DEL USUARIO
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {

        	

            /*Session::flash('messageSuccess', 'Bienvenido sesión: '.Auth::user()->typeUser->type);//MENSAJE DE BIENVENIDA PARA EL USUARIO*/

            if(Auth::user()->typeUser->type == 'Normal'){

                return response()->json('true', 200);//REDIRECCION A LA VISTA SEGUN EL TIPO DE USUARIO

            }

            return response()->json('true', 200);


        }else{
            
            return response()->json('false', 200);

            /*Session::flash('messageError', 'Contraseña o usuario incorrecto');

            return back()->withInput();//REDIRECCION ATRAS CON VALORES DE LA PETICION HTTP*/

        }
	}


	public function postRegister( Request $request ){

        try{
            DB::beginTransaction(); 

            if ( Hash::check( $request->get('password') , bcrypt( $request->get('password_confirmation') ) )  ){
                
                $user = new User();
                $user->fill($request->all());
                $user->type_user_id = 1; //Usuario normal

                $user->save();

                DB::commit();


                return response()->json('true', 200);
                
            }else{
                
                return response()->json('false', 200);
                
            }
            

        }catch (\Exception $e){

            DB::rollback();

            return response()->json('error', 200);

        }

    }




	public function home( Request $request ){

		return view('normal.index');

	}


	public function getLogout(){

		Auth::logout();//CIERRA A SESSION DEL USUARIO

        return redirect()->route('getLogin');//REDIRECCION A LA PANTALLA INICIO
	}

}
