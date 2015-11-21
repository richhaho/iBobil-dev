<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Brand;
use App\Info;
use DB;

class AboutController extends Controller
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
        // $request->validate([
        //     'top_banner_image'=> 'required',
        //     'top_banner_title'=> 'required',
        //     'article_1'=> 'required',
        //     'article_2'=> 'required',
        //     // 'side_images'=> 'required',
        //     'slider_images'=> 'required',
        //     'middle_banner_image'=> 'required',
        //     'middle_slider_images'=> 'required',
        //     'address'=> 'required',
        //     'email'=> 'required',
        //     'phone'=> 'required',
        // ]);
        $info1= Info::where('key','top_banner_image')->first();
        if(!$info1){
            $info1 = new Info;
        }        
        $info1->key = 'top_banner_image';
        $info1->value = serialize($request->top_banner_image);
        $info1->save();

        // return response()->json(['message' => 'About Info Successfully Updated!']);
        

        $info2= Info::where('key','top_banner_title')->first();
        if(!$info2){
            $info2 = new Info;
        }
        $info2->key = 'top_banner_title';        
        $info2->value = serialize($request->top_banner_title);
        $info2->save();

        $info3= Info::where('key','article_1')->first();
        if(!$info3){
            $info3 = new Info;
        }
        $info3->key = 'article_1';        
        $info3->value = serialize($request->article_1);
        $info3->save();

        $info4= Info::where('key','article_2')->first();
        if(!$info4){
            $info4 = new Info;
        }
        $info4->key = 'article_2';        
        $info4->value = serialize($request->article_2);
        $info4->save();

        $info11= Info::where('key','article_3')->first();
        if(!$info11){
            $info11 = new Info;
        }
        $info11->key = 'article_3';        
        $info11->value = serialize($request->article_3);
        $info11->save();

        $info12= Info::where('key','article_4')->first();
        if(!$info12){
            $info12 = new Info;
        }
        $info12->key = 'article_4';        
        $info12->value = serialize($request->article_4);
        $info12->save();

        $info13= Info::where('key','side_images')->first();
        if(!$info13){
            $info13 = new Info;
        }
        $info13->key = 'side_images';        
        $info13->value = serialize($request->side_images);
        $info13->save();

        $info5= Info::where('key','slider_images')->first();
        if(!$info5){
            $info5 = new Info;
        }
        $info5->key = 'slider_images';        
        $info5->value = serialize($request->slider_images);
        $info5->save();

        $info6= Info::where('key','middle_banner_image')->first();
        if(!$info6){
            $info6 = new Info;
        }
        $info6->key = 'middle_banner_image';        
        $info6->value = serialize($request->middle_banner_image);
        $info6->save();

        $info7= Info::where('key','middle_slider_images')->first();
        if(!$info7){
            $info7 = new Info;
        }
        $info7->key = 'middle_slider_images';        
        $info7->value = serialize($request->middle_slider_images);
        $info7->save();

        $info8= Info::where('key','address')->first();
        if(!$info8){
            $info8 = new Info;
        }
        $info8->key = 'address';        
        $info8->value = serialize($request->address);
        $info8->save();

        $info9= Info::where('key','email')->first();
        if(!$info9){
            $info9 = new Info;
        }
        $info9->key = 'email';        
        $info9->value = serialize($request->email);
        $info9->save();

        $info10= Info::where('key','phone')->first();
        if(!$info10){
            $info10 = new Info;
        }
        $info10->key = 'phone';        
        $info10->value = serialize($request->phone);
        $info10->save();

        $info11= Info::where('key','about_meta_title')->first();
        if(!$info11){
            $info11 = new Info;
        }
        $info11->key = 'about_meta_title';        
        $info11->value = serialize($request->meta_title);
        $info11->save();

        $info12= Info::where('key','about_meta_description')->first();
        if(!$info12){
            $info12 = new Info;
        }
        $info12->key = 'about_meta_description';        
        $info12->value = serialize($request->meta_description);
        $info12->save();

        return response()->json(['message' => 'About Info Successfully Updated!']);
    }
}
