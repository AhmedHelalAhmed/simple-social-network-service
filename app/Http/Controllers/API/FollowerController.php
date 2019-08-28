<?php

namespace App\Http\Controllers\API;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{
    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(User $user,Request $request)
    {

       if(auth('api')->user()->users->contains('id',$user->id))
       {
           $data['message']=trans('messages.user_followed_before');
           return response()->json($data,403);
       }
        $user->followers()->attach(auth('api')->id());
        $data['message']=trans('messages.user_followed');
        return response()->json($data,200);
    }


}
