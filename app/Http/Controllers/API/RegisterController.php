<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;

class RegisterController extends Controller
{
    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {

        $StoredImagePath=Storage::putFile('public/photos', $request->file('image'));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $StoredImagePath,
        ]);
        $data['message']= trans('messages.new_user');
        return response()->json($data,200);

    }
}
