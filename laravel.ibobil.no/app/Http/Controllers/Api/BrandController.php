<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Brand;
use App\Info;
use DB;

class BrandController extends Controller
{
    public function __construct()
    {
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        $this->middleware('auth:api', ['except' => ['index','brandOne']]);
    }

    public function index(Request $request)
    {
        $brands = Brand::all();
        return response()
            ->json(['brands'=>$brands], 200);
    }

    public function update_brands(Request $request)
    {
        $request->validate([
            'brands' => 'required',
            'meta_title'=> 'nullable',
            'meta_description'=> 'nullable',
        ]);

        foreach ($request->brands as $requestbrand) {
            $brand = Brand::findorfail($requestbrand['id']);
            $brand->description = $requestbrand['description'];
            $brand->logo = $requestbrand['logo'];
            $brand->save();
        }

        $info5= Info::where('key','brand_meta_title')->first();
        if(!$info5){
            $info5 = new Info;
        }
        $info5->key = 'brand_meta_title';        
        $info5->value = serialize($request->meta_title);
        $info5->save();

        $info4= Info::where('key','brand_meta_description')->first();
        if(!$info4){
            $info4 = new Info;
        }
        $info4->key = 'brand_meta_description';        
        $info4->value = serialize($request->meta_description);
        $info4->save();

        return response()->json(['message' => 'Brands Successfully Updated!','brands'=>$request->brands]);
    }

    public function brandOne(Request $request, $id)
    {
        $brand = Brand::where('slug',$id)->firstorfail();
        return response()
            ->json($brand, 200);
    }
}
