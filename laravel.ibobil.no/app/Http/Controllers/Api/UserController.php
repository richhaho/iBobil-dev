<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;



class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    
    public function update_profile(Request $request)
    {
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'email' => 'required|email',
        'password' => 'nullable|confirmed',
        'image' => 'nullable'
      ]);

      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      if($request->password){
        $user->password = bcrypt($request->password);
      }
      if($request->image){
        $user->image = $request->image;
      }
      $user->save();

      return response()->json(['message' => 'Profile Successfully Updated!','user'=>$user]);
    }

   
}
