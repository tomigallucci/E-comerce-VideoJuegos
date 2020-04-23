<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trademark;

class TrademarkController extends Controller
{
    //
    public function create(Request $request){
       
        Trademark::create([
            'name' => $request->trademark
        ]);

        return redirect('admin/trademark');

    }
    public function update(Request $request){

        $id = $request->idTrademark;

        Trademark::find($id)->update([
            'name' => $request->editTrademark
        ]);
        return redirect('admin/trademark');

    }
    public function api_show(Request $request)
    {

        $id = $request->id;

        if(isset($id))
        {

            $trademark = Trademark::find($id);
            
            return $trademark;

        }

    }
    public function delete(Request $request)
    {
        $id = $request->id;
        
        Trademark::find($id)->delete();

        return redirect('admin/trademark');

    }
    public function api(){

        $trademark = Trademark::all();

        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($trademark); $i++){
  
                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditTrademark' idTrademark='".$trademark[$i]->id."' data-toggle='modal' data-target='#modalEditTrademark'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteTrademark' idTrademark='".$trademark[$i]->id."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$trademark[$i]->name.'",
                    "'.$trademark[$i]->created_at.'",
                    "'.$button.'"
                  ],';
  
            }
  
          $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 

        }';
        
        return $datosJson;

    }
}
