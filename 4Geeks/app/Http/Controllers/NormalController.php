<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class NormalController extends Controller
{
    

    public function indexCategory(){

    	return view('normal.category.index');

    }

    public function listCategory(){
        
        $categories = Category::paginate(5);
        
    	return view('normal.category.list',[ 'categories' => $categories ]);

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
            
            return redirect()->route('listCategory');


        }catch (\Exception $e){

            DB::rollback();

            return redirect()->route('listCategory');

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
    
    public function indexNote(){

    	return view('normal.note.index');

    }

    public function listNote(){
        
    	return view('normal.note.list');

    }
}
