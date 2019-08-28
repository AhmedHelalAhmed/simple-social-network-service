<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTweetRequest;
use App\Tweet;
use App\Http\Controllers\Controller;
use Exception;
class TweetController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTweetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTweetRequest $request)
    {
        $inputData=$request->only('text');
        $inputData['user_id']=auth('api')->id();
        Tweet::create($inputData);
        $data['message']='User create the tweet successfully';
        return response()->json($data,200);

    }



    /**
     * @param Tweet $tweet
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     * this is hard delete we can make it soft delete if needed
     */
    public function destroy(Tweet $tweet)
    {
        //TODO we need to handle the user can delete only his tweets
        $tweet->delete();
        $data['message']='User delete the tweet successfully';
        return response()->json($data,200);
    }
}
