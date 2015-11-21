<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Brand;
use App\Info;
use DB;

class RvController extends Controller
{
    public function __construct()
    {
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        $this->middleware('auth:api', ['except' => ['index','brandOne']]);
    }

    public function update_rv(Request $request)
    {
        $request->validate([
            'meta_title'=> 'nullable',
            'meta_description'=> 'nullable',
        ]);

        

        $info5= Info::where('key','rv_meta_title')->first();
        if(!$info5){
            $info5 = new Info;
        }
        $info5->key = 'rv_meta_title';        
        $info5->value = serialize($request->meta_title);
        $info5->save();

        $info4= Info::where('key','rv_meta_description')->first();
        if(!$info4){
            $info4 = new Info;
        }
        $info4->key = 'rv_meta_description';        
        $info4->value = serialize($request->meta_description);
        $info4->save();

        return response()->json(['message' => 'Ibobil info Successfully Updated!','brands'=>$request->brands]);
    }
}
