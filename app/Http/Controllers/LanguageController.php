<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller
{
    //
    public function create(Request $request){

        Language::create([
            'name' => $request->newLanguage
        ]);
        return redirect('admin/languages');
    }
    public function update(Request $request)
    {

        $id = $request->idLanguage;

        Language::find($id)->update([
            'name' => $request->editLanguage
        ]);
        return redirect('admin/languages');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        
        Language::find($id)->delete();

        return redirect('admin/languages');

    }
    public function api(){

        $language = Language::all();

        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($language); $i++){
  
                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditlanguage' idLanguage='".$language[$i]->id."' data-toggle='modal' data-target='#modalEditlanguage'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteLanguage' idLanguage='".$language[$i]->id."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$language[$i]->name.'",
                    "'.$language[$i]->created_at.'",
                    "'.$button.'"
                  ],';
  
            }
  
          $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 

        }';
        
        return $datosJson;

    }
    public function api_show(Request $request){

        $id = $request->id;
        $name = $request->name;

        if(isset($id))
        {
            $language = Language::find($id);
            return $language;
        }
        if(isset($name))
        {

            $language = Language::where('name','=',$name)->get();

            return $language;

        }

    }
}
