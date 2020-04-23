<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchandise;
use Illuminate\Support\Facades\Validator;

class MerchandiseController extends Controller
{   
    public function index1(){
        $merchandise = Merchandise::all();
        return view('merchandise', compact('merchandise'));
    }
    public function index()
    {
        //
        $merchandise = Merchandise::orderBy('code', 'DESC')->first();
        (!$merchandise) ? $code = 0 : $code =  $merchandise->code;
        return view('products-merchandise')->with('code', $code);
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //


        $validator = Validator::make($request->all(), [
            'code' => 'required|integer',
            'title' => 'required|string|min:2',
            'stock' => 'required|integer|min:0',
            'purchase_price' => 'required|min:0',
            'sale_price' => 'required|min:0',
            'photo' => 'nullable|image'
        ]);
        if ($validator->fails()) return redirect('admin/merchandise')->withErrors($validator)->withInput();
        if($request->photo == null){
            $image = "";
        }else {
            $photo = $request->photo;
            $time =  time();
            $ext = $photo->getClientOriginalExtension();
            $imageName = $time.'.'.$ext;
            $destinationPath = public_path('storage/img/merchandise/'.$request->code.'/');    
            $image = "storage/img/merchandise/".$request->code."/".$time.".".$ext;
            $photo->move($destinationPath, $imageName);
        }
            Merchandise::create([
            'code' =>  $request->code,
            'title' =>  $request->title,
            'stock' => $request->stock,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'image' => $image
        ]);

        return redirect('admin/merchandise');

    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editCode' => 'required|integer',
            'editTitle' => 'required|string|min:2',
            'editStock' => 'required|integer|min:0',
            'editPurchasePrice' => 'required|min:0',
            'editSalePrice' => 'required|min:0',
            'editPhoto' => 'nullable|image',
            'actualPhoto' => 'nullable|string'
        ]);
        if ($validator->fails()) return redirect('admin/merchandise')->withErrors($validator)->withInput();
        if($request->editPhoto == null){
            ($request->actualPhoto == null) ? $image = "" : $image = $request->actualPhoto;
        }else {
            $photo = $request->editPhoto;
            $time =  time();
            $ext = $photo->getClientOriginalExtension();
            $imageName = $time.'.'.$ext;
            $destinationPath = public_path('storage/img/merchandise/'.$request->editCode.'/');    
            $image = "storage/img/merchandise/".$request->editCode."/".$time.".".$ext;
            $photo->move($destinationPath, $imageName);
        }
         Merchandise::where('code','=',$request->editCode)->update([
            'title' =>  $request->editTitle,
            'stock' => $request->editStock,
            'purchase_price' => $request->editPurchasePrice,
            'sale_price' => $request->editSalePrice,
            'image' => $image
        ]);
        
        return redirect('/admin/merchandise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
        $id = $request->id;
        $merchandise = Merchandise::find($id);
        $photo = $merchandise["image"];
        // dd($photo);
        $code = $request->code;
        if($photo != null){
                unlink($photo);
                rmdir('storage/img/merchandise/'.$code);   
        }
        $merchandise->delete();

        return redirect("/admin/merchandise");

    }
    public function api(){

        $merchandise = Merchandise::All();
        if(count($merchandise) == 0){

            echo '{"data": []}';
   
            return;
         }  
        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($merchandise); $i++){
            
                if($merchandise[$i]->image){
                    
                    $image = "<img src='/".$merchandise[$i]->image."' width='100' >";

                }else{
                    $image = "<img src='/storage/img/merchandise/default/anonymous.png' width='100'>";
                }

                if($merchandise[$i]["stock"] <= 3){
  
                    $stock = "<button class='btn btn-danger'>".$merchandise[$i]->stock."</button>";
  
                }else if($merchandise[$i]["stock"] > 3 && $merchandise[$i]->stock <= 5){
  
                    $stock = "<button class='btn btn-warning'>".$merchandise[$i]->stock."</button>";
  
                }else{
  
                    $stock = "<button class='btn btn-success'>".$merchandise[$i]->stock."</button>";
  
                }
                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditMerchandise' idMerchandise='".$merchandise[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteMerchandise' idMerchandise='".$merchandise[$i]->id."' code='".$merchandise[$i]->code."' image='".$merchandise[$i]->image."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$image.'",
                    "'.$merchandise[$i]->title.'",
                    "'.$stock.'",
                    "'.$merchandise[$i]->purchase_price.'",
                    "'.$merchandise[$i]->sale_price.'",
                    "'.$merchandise[$i]->created_at.'",
                    "'.$button.'"
                  ],';
  
            }
            $datosJson = substr($datosJson, 0, -1);
  
           $datosJson .=   '] 
  
           }';
           $d = ""; $b = "";

          echo $datosJson;
    
    }
    public function api_show(Request $request){

        $id = $request->id;
    
        
        if(isset($id)){
            $merchandise = Merchandise::find($id);
            return $merchandise;
        }
        if(isset($id) && isset($request->getMerchandise))
        {
            $merchandise = Merchandise::find($id);
            return $merchandise;
        }
    }
}
