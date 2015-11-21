<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Brand;
use App\Info;
use DB;

class FooterController extends Controller
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
        $info1= Info::where('key','footer_content')->first();
        if(!$info1){
            $info1 = new Info;
        }        
        $info1->key = 'footer_content';
        $info1->value = serialize($request->footer_content);
        $info1->save();

        $info2= Info::where('key','facebook_link')->first();
        if(!$info2){
            $info2 = new Info;
        }        
        $info2->key = 'facebook_link';
        $info2->value = serialize($request->facebook_link);
        $info2->save();

        $info3= Info::where('key','twitter_link')->first();
        if(!$info3){
            $info3 = new Info;
        }        
        $info3->key = 'twitter_link';
        $info3->value = serialize($request->twitter_link);
        $info3->save();

        $info4= Info::where('key','google_link')->first();
        if(!$info4){
            $info4 = new Info;
        }        
        $info4->key = 'google_link';
        $info4->value = serialize($request->google_link);
        $info4->save();

        $info5= Info::where('key','pinterest_link')->first();
        if(!$info5){
            $info5 = new Info;
        }        
        $info5->key = 'pinterest_link';
        $info5->value = serialize($request->pinterest_link);
        $info5->save();

        $info6= Info::where('key','youtube_link')->first();
        if(!$info6){
            $info6 = new Info;
        }        
        $info6->key = 'youtube_link';
        $info6->value = serialize($request->youtube_link);
        $info6->save();
        

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

        return response()->json(['message' => 'Footer Info Successfully Updated!']);
    }

    public function update_top(Request $request)
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
        $info1= Info::where('key','home_top_headline')->first();
        if(!$info1){
            $info1 = new Info;
        }        
        $info1->key = 'home_top_headline';
        $info1->value = serialize($request->home_top_headline);
        $info1->save();

        $info2= Info::where('key','home_top_sub_headline')->first();
        if(!$info2){
            $info2 = new Info;
        }        
        $info2->key = 'home_top_sub_headline';
        $info2->value = serialize($request->home_top_sub_headline);
        $info2->save();

        $info3= Info::where('key','home_top_text')->first();
        if(!$info3){
            $info3 = new Info;
        }        
        $info3->key = 'home_top_text';
        $info3->value = serialize($request->home_top_text);
        $info3->save();

        $info4= Info::where('key','home_top_image')->first();
        if(!$info4){
            $info4 = new Info;
        }        
        $info4->key = 'home_top_image';
        $info4->value = serialize($request->home_top_image);
        $info4->save();

        $info5= Info::where('key','brand_top_headline')->first();
        if(!$info5){
            $info5 = new Info;
        }        
        $info5->key = 'brand_top_headline';
        $info5->value = serialize($request->brand_top_headline);
        $info5->save();

        $info6= Info::where('key','brand_top_sub_headline')->first();
        if(!$info6){
            $info6 = new Info;
        }        
        $info6->key = 'brand_top_sub_headline';
        $info6->value = serialize($request->brand_top_sub_headline);
        $info6->save();
        

        $info8= Info::where('key','brand_top_image')->first();
        if(!$info8){
            $info8 = new Info;
        }
        $info8->key = 'brand_top_image';        
        $info8->value = serialize($request->brand_top_image);
        $info8->save();        

        return response()->json(['message' => 'Top Info Successfully Updated!']);
    }
}
