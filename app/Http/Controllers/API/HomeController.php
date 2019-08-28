<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\TweetResource;
use App\Tweet;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $usersIds=auth('api')->user()->users->pluck('id');
        $data['tweets']=Tweet::whereIn('user_id',$usersIds)->paginate(10);
        TweetResource::collection($data['tweets']);
        return response()->json($data,200);


    }
}
