<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }
    public function delete(Request $req, $id,$photo = null)
    {
    
        User::find($id)->delete();
        
        if($photo != "" || $photo != null){

            unlink($photo);
            rmdir('storage/img/users/'.$id);

        }

        return redirect("/admin/users");


    }
    public static function update(Request $request)
    {   

        $validateData = $request->validate([
            'name' => ['required','string','min:2','max:40'],
            'lastname' => ['required','string','min:2','max:40'],
            'email' => ['required','email:rfc,dns'],
            'password' => ['nullable'],
            'oldPassword' => ['required'],
            'birthday' => ['required', 'date'],
            'photo' => 'nullable|image',
            'oldPhoto' => 'nullable|string',
        ]);
        
        (isset($validateData["password"])) ? $password = Hash::make($validateData["password"]) : $password = $validateData["oldPassword"];
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
		
        $update = User::where('email','=',$validateData["email"])->update([
            'name' => $validateData["name"],
            'lastname' => $validateData["lastname"],
            'email' => $validateData["email"],
            'password' => $password,
            'birthday' => $validateData["birthday"],
            'image' => $image,
        ]);

        return redirect('/');
            
    }
    public function api()
    {

        $users = User::all();

        $datosJson = '{
            "data": [';
  
            for($i = 0; $i < count($users); $i++){
  
               
                if($users[$i]->image)
                {
                    
                    $image = "<img src='/".$users[$i]->image."' class='picture img-thumb' style='width: 80px' >";

                }else{

                    $image = "<img src='/storage/img/users/default/anonymous.png' style='width: 80px'>";

                }
                # status
                if($users[$i]->status != 0)
                {
                    $status = "<button class='btn btn-success btn-xs btnActive' idUser='".$users[$i]->id."' statusUser='0'>Activado</button>";

                }else {
                    $status = "<button class='btn btn-danger btn-xs btnActive' idUser='".$users[$i]->id."' statusUser='1'>Desactivado</button>";

                }
                # nombre completo
                $fullname = $users[$i]->name. " ". $users[$i]->lastname;

                $button =  "<div class='btn-group'><button class='btn btn-warning btnEditUser' idUser='".$users[$i]->id."' data-toggle='modal' data-target='#modalEditUser'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteUser' idUser='".$users[$i]->id."' image='".$users[$i]->image."'><i class='fa fa-times'></i></button></div>"; 
  
                $datosJson .='[
                    "'.($i+1).'",
                    "'.$fullname.'",
                    "'.$users[$i]->email.'",
                    "'.$image.'",
                    "'.$users[$i]->birthday.'",
                    "'.$status.'",
                    "'.$users[$i]->last_login.'",
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
        $status = $request->activateOrDesactivateUser;
        $email = $request->email;
        // return
        if(isset($email))
        {   
            $user = User::where('email','=',  $request["email"])->get();
            
            return $user;
        }
        if(isset($id) && isset($request->getUser))
        {
            $user = User::find($id);
            return $user;
        }
        if(isset($status) && isset($id))
        {   

            User::where('id','=',$id)->update([
                'status' => $status
            ]);
            return "<script>
                    swal.fire({
                        title: 'El usuario ha sido actualizado',
                        icon: 'success',
                        confirmButtonText: '¡Cerrar!'
                        }).then(function(result) {
                            if (result.value) {
            
                                window.location = '/admin/users';
            
                            }
                        })
                </script>";
        }
    }
}
