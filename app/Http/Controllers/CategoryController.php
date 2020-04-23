<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function create(Request $request){

        Category::create([
            'name' => $request->newCategory
        ]);
        return redirect('admin/categories');
    }
    public function Api(){

        $category = Category::all();

        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($category); $i++){
  
                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditCategory' idCategory='".$category[$i]->id."' data-toggle='modal' data-target='#modalEditCategory'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteCategory' idCategory='".$category[$i]->id."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$category[$i]->name.'",
                    "'.$category[$i]->created_at.'",
                    "'.$button.'"
                  ],';
  
            }
  
          $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 

        }';
        
        return $datosJson;

    }
    public function api_show(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if(isset($id))
        {
            $category = Category::find($id);

            return $category;
        }
        if(isset($name))
        {

            $category = Category::where('name','=', $name)->get();

            return $category;


        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        
        Category::find($id)->delete();

        return redirect('admin/categories');

    }
    public function update(Request $request)
    {

        $id = $request->idCategory;

        Category::find($id)->update([
            'name' => $request->editCategory
        ]);
        return redirect('admin/categories');
    }
}
