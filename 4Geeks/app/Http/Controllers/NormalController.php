<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Note;
use DB;
use Illuminate\Support\Facades\Auth;
class NormalController extends Controller
{
    

    public function indexCategory(){

    	return view('normal.category.index');

    }

    public function listCategory(){
        
        $categories = Category::all();
        
        return response()->json($categories, 200);
        
    }
    
    public function viewCategory(){
        
        return view('normal.category.list');
    }

    public function createCategory( Request $request){

        try{
            DB::beginTransaction(); 
   
            $category = new Category();
            $category->fill($request->all());
            

            $category->save();

            DB::commit();


            return response()->json('true', 200);



        }catch (\Exception $e){

            DB::rollback();

            return response()->json('false', 200);

        }


    }
    
    public function editCategory(Request $request,$id){
        
        $category = Category::find( $id );
        
        return view('normal.category.edit',[ 'category' => $category ]);
        
    }
    
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
    
    public function updateCategory( Request $request){

        try{
            DB::beginTransaction(); 
   
            $category = Category::find( $request['id'] );
            $category->fill($request->all());
        
            $category->save();

            DB::commit();


            return response()->json('true', 200);



        }catch (\Exception $e){

            DB::rollback();

            return response()->json('false', 200);

        }


    }
    
    public function filterCategory( Request $request){
        
        if ( $request['filter'] == "" ){
            
            $categories = Category::all();
            
        }else{
            
            $categories = DB::table('category')
                        ->orWhere('category', 'like', $request['filter'].'%')
                        ->orWhere('created_at','like',$request['filter'].'%')
                        ->get();
        }
        
        return response()->json($categories, 200);
    }
    
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
    
    
    
    
    
    
    
    
    
    
    
    public function indexNote(){
        
        $category = Category::pluck('category','id');
        
    	return view('normal.note.index',['category' => $category]);

    }

    public function viewNote(){
        
        return view('normal.note.list');
    }
    
    public function listNote(){
        
    	$notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->select('title','description','category','note.created_at as created_at')
                        ->get();
        
        return response()->json($notes, 200);

    }
    
    public function createNote( Request $request){

            DB::beginTransaction(); 
   
            $note = new Note();
            $note->fill($request->all());
            $note->user_id = Auth::user()->id;
            

            $note->save();

            DB::commit();


            return response()->json('true', 200);




            DB::rollback();

            return response()->json('false', 200);


    }
    
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
    
    public function editNote(Request $request,$id){
        $category = Category::pluck('category','id');
        $note = Note::find( $id );
        
        return view('normal.note.edit',[ 'note' => $note, 'category' => $category ]);
        
    }
    
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
    
    public function filterNote( Request $request){
        
        if ( $request['filter'] == "" ){
            
            $notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->select('title','description','category','note.created_at as created_at')
                        ->get();
            
        }else{
            
            $notes = DB::table('note')
                        ->join('category','note.category_id','=','category.id')
                        ->orWhere('title', 'like', $request['filter'].'%')
                        ->orWhere('description', 'like', $request['filter'].'%')
                        ->orWhere('note.created_at','like',$request['filter'].'%')
                        ->orWhere('category','like',$request['filter'].'%')
                        ->get();
        }
        
        return response()->json($notes, 200);
    }
    
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
    
    
}
