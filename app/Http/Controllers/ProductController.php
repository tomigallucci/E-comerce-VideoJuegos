<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Product;
use App\Trademark;
use App\Category;
use App\Offerday;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('code', 'DESC')->first();
        $categories = Category::all();
        $trademarks = Trademark::all();
        $code = $products->code;
        return view('products-games', compact('categories'), compact('trademarks'))->with('code', $code);
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd($request);
        $validator = Validator::make($request->all(), [
            'code' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'purchase_price' => 'required|min:0',
            'sale_price' => 'required|min:0',
            'trademark' => 'required|integer',
            'listLanguage' => 'nullable|string',
            'listCategories' => 'nullable|string',
            'releaseDate' => 'required|date',
            'isDlc' => 'required|integer',
            'photo' => 'nullable|image'
        ]);
     
        if ($validator->fails()) return redirect('admin/gaming')->withErrors($validator)->withInput();
        if($request->photo == null){
            $image = "";
        }else {
            $photo = $request->photo;
            $time =  time();
            $ext = $photo->getClientOriginalExtension();
            $imageName = $time.'.'.$ext;
            $destinationPath = public_path('storage/img/products/'.$request->code.'/');    
            $image = "storage/img/products/".$request->code."/".$time.".".$ext;
            $photo->move($destinationPath, $imageName);
        }
         Product::create([
            'code' =>  $request->code,
            'title' =>  $request->title,
            'description' => $request->description,
            'stock' => $request->stock,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'languages' => $request->listLanguage,
            'categories' => $request->listCategories,
            'release_date' => $request->releaseDate,
            'isDlc' => $request->isDlc,
            'image' => $image,
            'trademarks' =>  $request->trademark
        ]);

        return redirect('admin/gaming');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        $trademark = Trademark::find($product->trademarks);
        return view('game', compact('product'), compact('trademark'));

    }
    public function showproduct(Request $request)
    {
        //
        $product = Product::find($request->id);

        return $product;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editCode' => 'required|integer',
            'editTitle' => 'required|string',
            'editDescription' => 'required|string',
            'editStock' => 'required|integer|min:0',
            'editPurchasePrice' => 'required|min:0',
            'editSalePrice' => 'required|min:0',
            'editListLanguage' => 'nullable|string',
            'editListCategories' => 'nullable|string',
            'editReleaseDate' => 'required|date',
            'editIsDlc' => 'required|integer',
            'editPhoto' => 'nullable|image',
            'actualPhoto' => 'nullable|string'
        ]);
        if ($validator->fails()) return redirect('admin/gaming')->withErrors($validator)->withInput();
        if($request->editPhoto == null){
            ($request->actualPhoto == null) ? $image = "" : $image = $request->actualPhoto;
        }else {
            $photo = $request->editPhoto;
            $time =  time();
            $ext = $photo->getClientOriginalExtension();
            $imageName = $time.'.'.$ext;
            $destinationPath = public_path('storage/img/products/'.$request->editCode.'/');    
            $image = "storage/img/products/".$request->editCode."/".$time.".".$ext;
            $photo->move($destinationPath, $imageName);

        }
    
        
         Product::where('code','=',$request->editCode)->update([
            'title' =>  $request->editTitle,
            'description' => $request->editDescription,
            'stock' => $request->editStock,
            'purchase_price' => $request->editPurchasePrice,
            'sale_price' => $request->editSalePrice,
            'release_date' => $request->editReleaseDate,
            'isDlc' => $request->editIsDlc,
            'languages' => $request->editListLanguage,
            'categories' => $request->editListCategories,
            'image' => $image
        ]);
        
        return redirect('/admin/gaming');
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
        $offerday = Offerday::where('product_id','=',$id);
        $offerday->delete();
        $product = Product::find($id);
        $photo = $product["image"];
        // dd($photo);
        $code = $request->code;
        if($photo != null){
            
            unlink($photo);
            rmdir('storage/img/products/'.$code);
            
        }
        $product->delete();

        return redirect("/admin/gaming");

    }
    public function api(){

        $products = Product::All();
        if(count($products) == 0){

            echo '{"data": []}';
   
            return;
         }  
        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($products); $i++){
            
                if($products[$i]->image){
                    
                    $image = "<img src='/".$products[$i]->image."' width='100' >";

                }else{
                    $image = "<img src='/storage/img/products/default/anonymous.png' width='100'>";
                }
                if($products[$i]->categories)
                {

                    $a = json_decode($products[$i]->categories, true);
                    $b ='';
                    foreach ($a as $key => $valuekey) {

                        ($b == '') ? $b = $valuekey["category"] : $b.= ', '.$valuekey["category"];
                    }
                }else{
                    $b='';
                }
                if($products[$i]->languages)
                {

                    $c = json_decode($products[$i]->languages,true);
                    $d = '';
                    foreach ($c as $key => $value) {
                
                        ($d == '') ? $d = $value["language"] : $d.= ', '.$value["language"];
        
                    }
                }else{
                    $d = '';
                }
                    $trademark = Trademark::find($products[$i]->trademarks);
                
  
                if($products[$i]["stock"] <= 3){
  
                    $stock = "<button class='btn btn-danger'>".$products[$i]->stock."</button>";
  
                }else if($products[$i]["stock"] > 3 && $products[$i]->stock <= 5){
  
                    $stock = "<button class='btn btn-warning'>".$products[$i]->stock."</button>";
  
                }else{
  
                    $stock = "<button class='btn btn-success'>".$products[$i]->stock."</button>";
  
                }
                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$products[$i]->id."' code='".$products[$i]->code."' image='".$products[$i]->image."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$image.'",
                    "'.$products[$i]->title.'",
                    "'.$stock.'",
                    "'.$products[$i]->purchase_price.'",
                    "'.$products[$i]->sale_price.'",
                    "'.$d.'",
                    "'.$b.'",
                    "'.$trademark->name.'",
                    "'.$products[$i]->created_at.'",
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
    

        if(isset($id))
        {
            $product = Product::find($id);
            return $product;
        }
    }
}
