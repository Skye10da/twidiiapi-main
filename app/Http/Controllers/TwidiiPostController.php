<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TwidiiPost;
class twidiiPostController extends Controller
{
    
    public function Twidiiposts(Request $request, $id){
        if($id){
            $title= "Post";
            $twidiipost= new TwidiiPost;
            
        
        }else{
            $title= "Edit Post";
            $twidiipost = TwidiiPost ::find($id);
           
        
        }
   

if($request->isMethod('post')){
    $data=$request->all();
    $user= new User();
    $twidiipost->user_id= $data['user_id'];
     $twidiipost->post= $data['post'];
     $twidiipost->status=1;
     $twidiipost->save();

     if($twidiipost){
        $response=$response= ['status'=>200, 'message'=>'Twidii successfully post'];
                        return response()->json($response);
                    }else{
                        $response= $response= ['status'=>500, 'message'=>' please register to try agin'];
                           return response()->json($response);
                    }
     

     

    
}
    
    }
}
