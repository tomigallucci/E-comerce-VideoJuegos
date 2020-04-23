<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offerday;
use App\Product;

class OfferdayController extends Controller
{
    //
    public function api(){

        $offerday = Offerday::all();

        if(count($offerday) == 0){

            echo '{"data": []}';
   
            return;
         }  
        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($offerday); $i++){
            
            $product = Product::where('id','=', $offerday[$i]["product_id"])->get();
          
            $image = "<img src='/".$product[0]->image."' class='img-thumbnail' width='140px'>";

            if($offerday[$i]["offerOn"] == 1){
                  $morebutton = "<button class='btn btn-success btn-xs btnActive' idOffer='".$offerday[$i]->id."' statusOffer='0'>Activado</button>";
            }else{
                  $morebutton = "<button class='btn btn-danger btn-xs btnActive' idOffer='".$offerday[$i]->id."' statusOffer='1'>Desactivado</button>";
            }

            $button =  "<div class='btn-group'><a><button class='btn btn-warning btnEditOfferday' offerId='".$offerday[$i]["id"]."' productId='".$product[0]->id."' data-toggle='modal' data-target='#modalEditOfferDay'><i class='fa fa-pencil'></i></button></a><a><button class='btn btn-danger btnDeleteOfferday' offerId='".$offerday[$i]["id"]."' productId='".$product[0]->id."' ><i class='fa fa-times'></i></button></a></div>"; 

            $datosJson .='[
                  "'.($i+1).'",
                  "'.$image.'",
                  "'.$product[0]->title.'",
                  "'.number_format($offerday[$i]["price_discount"],2).'",
                  "'.$offerday[$i]->discount.'%",
                  "'.$offerday[$i]->date_limit.'",
                  "'.$offerday[$i]->created_at.'",
                  "'.$morebutton.'",
                  "'.$button.'"
                ],';

            }
  
          $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 

        }';
        
        return $datosJson;

    }
    public function api_show(Request $request){
        $offerOn = $request->offerOn;
        $offer = Offerday::where('offerOn','=','1')->get();
        return $offer;
    }
}
