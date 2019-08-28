<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;

class RegisterController extends Controller
{
    public function store(StoreUserRequest $request)
    {

        $StoredImagePath=Storage::putFile('public/photos', $request->file('image'));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $StoredImagePath, // we need to change public to storage when get the photo
        ]);
        $data['message']='User registered successfully';// we need to translate this
        return response()->json($data,200);

    }
}
