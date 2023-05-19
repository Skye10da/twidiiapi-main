<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    //
 public function Register(Request $request){
        try{
$registerCredential= new User();
$registerCredential->name= $request->name;
$registerCredential->username= $request->username;
$registerCredential->email= $request->email;
$registerCredential->password= Hash::make($request->password);
$registerCredential->save();
$response= ['status'=>200, 'message'=>'Register Successfully! Welcome to Twidii'];
return response()->json($response);

        }catch(Exception $e){
            $response= ['status'=>500, 'message'=>$e];
         
        }
    }


     function Login(Request $request){
        
        $user = User:: where('email', $request->email)->first();

        if($user!='[]' && Hash::check($request->password,$user->password)){
$token= $user->createToken('Personal Access Token')->plainTextToken;
$response=$response= ['status'=>200, 'token'=>$token, 'user'=>$user,'message'=>'Successfully Login'];
            return response()->json($response);
        }else if($user=='[]'){
$response= $response= ['status'=>500, 'message'=>'No record found with this email'];
       return response()->json($response);
}else{
    $response= $response= ['status'=>500, 'message'=>'Wrong Email or passowrd! Credential please try agin'];
       return response()->json($response);
}
    }
}
