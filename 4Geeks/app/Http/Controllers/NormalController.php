<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Note;
use DB;
use Illuminate\Support\Facades\Auth;
class NormalController extends Controller
{
    
    //FUNCIÓN QUE REDIRECCIONA AL INDEX DE CATEGORIA
    public function indexCategory(){

    	return view('normal.category.index');

    }
    //FUNCIÓN QUE DEVUELVE POR AJAX A LA PANTALLA LISTADO TODAS LAS CATEGORIAS

    public function listCategory(){
        
        $categories = Category::all();
        
        return response()->json($categories, 200);
        
    }

    //FUNCIÓN QUE REDIRECCIONA AL LISTADO DE CATEGORIA
    
    public function viewCategory(){
        
        return view('normal.category.list');
    }

    //FUNCIÓN QUE GUARDA LOS DATOS DE LA CATEGORIA
    
    public function createCategory( Request $request){

        try{
            DB::beginTransaction(); 
            
            $category = DB::table('category')
                            ->where('category','=',$request['category'])->get();
            if ( count($category) == 0 ){
                
                $category = new Category();
                $category->fill($request->all());


                $category->save();

                DB::commit();


                return response()->json('true', 200);
                
            }else{
                
                return response()->json('error', 200);
            }
            
            
            



        }catch (\Exception $e){

            DB::rollback();

            return response()->json('false', 200);

        }


    }
    
    //FUNCIÓN QUE REDIRECCIONA A LA PANTALLA DE MODIFICACION PASANDO LOS DATOS CORRESPONDIENTES DE LA CATEGORIA
    
    public function editCategory(Request $request,$id){
        
        $category = Category::find( $id );
        
        return view('normal.category.edit',[ 'category' => $category ]);
        
    }
    
    //FUNCIÓN QUE ELIMINA LA CATEGORIA SELECCIONADA, TODO ESTE PROCESO ES POR AJAX
    
    public function destroyCategory(Request $request,$id){
        
        try{
            DB::beginTransaction(); 
   
            $category = Category::find( $id );;
            $category->delete();

            DB::commit();
            
            $categories = Category::all();
        
            return response()->json($categories, 200);


        }catch (\Exception $e){

            DB::rollback();

        
            return response()->json(false, 200);

        }
        
        
    }
    
    //FUNCIÓN QUE MODIFICA LOS DATOS DE LA CATEGORIA
    
    public function updateCategory( Request $request){

        try{
            DB::beginTransaction(); 
            $category = Category::find( $request['id'] );
            $enter = 'false';
            
            $category_db = DB::table('category')
                            ->where('category','=',$request['category'])
                            ->get();
            
            if ( count($category_db) > 0 ){
                
                foreach( $category_db as $categoria){
                    
                    if ( $categoria->category == $category->category ){
                        $enter = 'true';
                        
                    }
                }
               
            }
            
            if ( count($category_db) == 0 || $enter == 'true'){
                
                $category->fill($request->all());
        
                $category->save();

                DB::commit();


                return response()->json('true', 200);
            }else{
                
                
                
                return response()->json('error', 200);
                
            }

        }catch (\Exception $e){

            DB::rollback();

            return response()->json('false', 200);

        }


    }
    
    //FUNCIÓN QUE FILTRA POR CATEGORIA EN LA PANTALLA DE LISTADO
    
    public function filterCategory( Request $request){
        
        if ( $request['filter'] == "" ){
            
            $categories = Category::all();
            
        }else{
            
            $categories = DB::table('category')
                        ->orWhere('category', 'like', '%'.$request['filter'].'%')
                        ->orWhere('created_at','like','%'.$request['filter'].'%')
                        ->get();
        }
        
        return response()->json($categories, 200);
    }
    
    //FUNCIÓN QUE FILTRA POR CATEGORIA, DE (A-Z) Y (Z-A) 
    
    public function orderCategory( Request $request ){
        
        if ( $request['option'] == 'asc' ){
            
            $categories = DB::table('category')
                    ->orderBy('category', 'asc')
                    ->get();
            
        }else if( ( $request['option'] == 'desc' ) ){
            
            $categories = DB::table('category')
                    ->orderBy('category', 'desc')
                    ->get();
            
        }
        
        return response()->json($categories, 200);
        
    }
    
    
    
    
    
    
    
    
    
    
    //FUNCIÓN QUE REDIRECCIONA AL INDEX DE NOTAS
    
    public function indexNote(){
        
        $category = Category::pluck('category','id');
        
    	return view('normal.note.index',['category' => $category]);

    }

    //FUNCIÓN QUE REDIRECCIONA AL LISTADO DE NOTAS
    
    public function viewNote(){
        
        return view('normal.note.list');
    }
    
    //FUNCIÓN QUE DEVUELVE POR AJAX A LA PANTALLA LISTADO TODAS LAS NOTAS
    
    public function listNote(){
        
    	$notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->select('note.id','title','description','category','mark','note.created_at as created_at')
                        ->get();
        
        return response()->json($notes, 200);

    }
    
    //FUNCIÓN QUE CREA NOTAS
    
    public function createNote( Request $request){

            DB::beginTransaction(); 
   
            $note = new Note();
            $note->fill($request->all());
            $note->user_id = Auth::user()->id;
            $note->mark = 0;

            $note->save();

            DB::commit();


            return response()->json('true', 200);




            DB::rollback();

            return response()->json('false', 200);


    }
    
    //FUNCIÓN QUE ELIMINA LAS NOTAS CON AJAX
    
    public function destroyNote(Request $request,$id){
        
        try{
            DB::beginTransaction(); 
   
            $note = Note::find( $id );;
            $note->delete();

            DB::commit();
            
            $notes = Note::all();
        
            return response()->json($notes, 200);


        }catch (\Exception $e){

            DB::rollback();

        
            return response()->json(false, 200);

        }
        
        
    }
    
    //FUNCIÓN QUE REDIRECCIONA A LA PANTALLA EDITAR CON SUS RESPECTIVOS DATOS
    
    public function editNote(Request $request,$id){
        $category = Category::pluck('category','id');
        $note = Note::find( $id );
        
        return view('normal.note.edit',[ 'note' => $note, 'category' => $category ]);
        
    }
    
    //FUNCIÓN QUE MODIFICA LOS DATOS DE LAS NOTAS
    
    public function updateNote( Request $request){
        try{
            DB::beginTransaction(); 
   
            $note = Note::find( $request['id'] );
            $note->fill($request->all());
        
            $note->save();

            DB::commit();


            return response()->json('true', 200);



        }catch (\Exception $e){

            DB::rollback();

            return response()->json('false', 200);

        }


    }
    
    //FUNCIÓN QUE FILTRA POR TODOS LOS ATRIBUTOS EN LA TABLA DEL LISTADO DE NOTAS
    
    public function filterNote( Request $request){
        
        if ( $request['filter'] == "" ){
            
            $notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->select('note.id','title','description','category','mark','note.created_at as created_at')
                        ->get();
            
        }else{
            
            $notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->orWhere('title', 'like', '%'.$request['filter'].'%')
                        ->orWhere('description', 'like', '%'.$request['filter'].'%')
                        ->orWhere('note.created_at','like','%'.$request['filter'].'%')
                        ->orWhere('category','like',$request['filter'].'%')
                        ->get();
        }
        
        return response()->json($notes, 200);
    }
    
    //FUNCIÓN QUE FILTRA POR NOTAS, DE (A-Z) Y (Z-A) 
    
    public function orderNote( Request $request ){
        
        if ( $request['option'] == 'asc' ){
            
            $notes = DB::table('note')
                    ->orderBy('title', 'asc')
                    ->get();
            
        }else if( ( $request['option'] == 'desc' ) ){
            
            $notes = DB::table('note')
                    ->orderBy('title', 'desc')
                    ->get();
            
        }
        
        return response()->json($notes, 200);
        
    }
    
    //FUNCIÓN QUE PONE STATUS LISTO O EN ESPERA PARA LAS NOTAS
    
    public function marcarNote( Request $request ){
        
        
        $note = Note::find( $request['id'] );

        if ( $request['option'] == 0 ){
            
            $note->mark = 0;
            
            
            
        }else{
            
            $note->mark = 1;
        }
        
        
        if ($note->save()){
            
            return response()->json($note->mark, 200);
        }else{
            return response()->json('false', 200);
        }
        
       
    }
    
    
    
}
