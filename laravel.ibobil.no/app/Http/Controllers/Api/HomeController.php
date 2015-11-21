<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Brand;
use App\Info;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        $infos = Info::all();
        return response()
            ->json(['infos'=>$infos], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'weekly_motorhome'=> 'required',
            'new_motorhome'=> 'required',
            'used_motorhome'=> 'required',
            'sale_motorhome'=> 'required',
            'meta_title'=> 'nullable',
            'meta_description'=> 'nullable',
        ]);

        $info1= Info::where('key','weekly_motorhome')->first();
        if(!$info1){
            $info1 = new Info;
        }
        $info1->key = 'weekly_motorhome';
        $info1->value = serialize($request->weekly_motorhome);
        $info1->save();

        $info2= Info::where('key','new_motorhome')->first();
        if(!$info2){
            $info2 = new Info;
        }
        $info2->key = 'new_motorhome';        
        $info2->value = serialize($request->new_motorhome);
        $info2->save();

        $info3= Info::where('key','used_motorhome')->first();
        if(!$info3){
            $info3 = new Info;
        }
        $info3->key = 'used_motorhome';        
        $info3->value = serialize($request->used_motorhome);
        $info3->save();

        $info4= Info::where('key','sale_motorhome')->first();
        if(!$info4){
            $info4 = new Info;
        }
        $info4->key = 'sale_motorhome';        
        $info4->value = serialize($request->sale_motorhome);
        $info4->save();

        $info5= Info::where('key','home_meta_title')->first();
        if(!$info5){
            $info5 = new Info;
        }
        $info5->key = 'home_meta_title';        
        $info5->value = serialize($request->meta_title);
        $info5->save();

        $info4= Info::where('key','home_meta_description')->first();
        if(!$info4){
            $info4 = new Info;
        }
        $info4->key = 'home_meta_description';        
        $info4->value = serialize($request->meta_description);
        $info4->save();

        return response()->json(['message' => 'Home Info Successfully Updated!']);
    }
}
