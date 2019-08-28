<?php

namespace App\Http\Controllers\API;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{

    public function store(User $user,Request $request)
    {

       if(auth('api')->user()->users->contains('id',$user->id))
       {
           $data['message']='You had followed the user before';// we need to translate this
           return response()->json($data,403);
       }
        $user->followers()->attach(auth('api')->id());
        $data['message']='You followed a user successfully';// we need to translate this
        return response()->json($data,200);
    }


}
