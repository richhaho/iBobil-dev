<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    
    public function __construct()
    {
        // DB::enableQueryLog();        
        // dd(DB::getQueryLog());
        $this->middleware('auth:api', ['except' => ['viewOne','viewOne2','getCaravan','getRV','getAll','finance']]);
    }

    public function viewOne(Request $request,$id)
    {   
        $product = Product::where('slug',$id)->firstorfail();

        if(!isset($product['adata']['prices']))
        {
            return response()->json(['product'=>$product],200); 
        }
        $ch = curl_init();  
        if(isset($product['adata']['mileage'])){
            $mileage = false;
        }else{
            $mileage = true;
        }

        if($product->type =='mobile-home'){
            $code = 136;
            $caravan = false;
        }else{
            $code = 135;
            $caravan = true;
        }
        $make = urlencode($product['adata']['make']);
        $model = urlencode($product['adata']['model']);
        $duration = 120;
        $downpayment = $product['adata']['prices']['main'] * 0.35;
        curl_setopt($ch,CURLOPT_URL,'https://preprod.bilkjopet.no/api/v1/iBobil/Pricing/CalculateLoanPricePrivate?request.useDebtInsurance='.$caravan.'&request.downPayment='.$downpayment.'&request.durationMonths='.$duration.'&request.agreementCode=303&request.investedAmount='.$product['adata']['prices']['main'].'&request.isObjectNew='.$mileage.'&request.isObjectDirectlyImported=true&request.objectMake='.$make.'&request.objectModel='.$model.'&request.objectGroupCode='.$code);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'apiKey:0023ab1a-b9f1-84f8-9927-2bd5b6c811ec',
            'Content-Type: application/json', 
            'Accept: application/json'
        ));
     
        $response=curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
     
        curl_close($ch);
        // $output= json_encode($output);
        // return response()
        //     ->json($body,200);  
        // return $response; 
 
        return response()
            ->json(['product'=>$product,'additional'=>$body],200);   
    }

    public function viewOne2(Request $request,$id)
    {   
        $product = Product::where('adId',$id)->firstorfail();       
 
        return response()
            ->json($product,200);   
    }

    public function getCaravan(Request $request)
    {   
        $products = Product::where('type','caravan')->get();
        return response()
            ->json(['products'=>$products],200);   
    }

    public function getRV(Request $request)
    {   
        $products = Product::where('type','mobile-home')->get();
        return response()
            ->json(['products'=>$products],200);   
    } 

    public function getAll(Request $request)
    {   
        $products = Product::all();
        return response()
            ->json(['products'=>$products],200);   
    }

    public function deactivated(Request $request,$id)
    {   
        $product = Product::where('adId',$id)->firstorfail();
        $product->active = 0;
        $product->save();
        return response()
            ->json(['message'=>'Product successfully deactivated'],200);   
    } 

    public function activated(Request $request,$id)
    {   
        $product = Product::where('adId',$id)->firstorfail();
        $product->active = 1;
        $product->save();
        return response()
            ->json(['message'=>'Product successfully activated'],200);   
    } 

    public function update_product(Request $request,$id)
    {   
        $request->validate([
            'name' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'video' => 'nullable|url',
            'vin' => 'nullable|string'
        ]);
        $product = Product::where('adId',$id)->firstorfail();
        if($request->name){
            $product->name = $request->name;
        }

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->video = $request->video;
        $product->vin = $request->vin;
        $product->save();

        return response()
            ->json(['product'=> $product,'message'=> 'Product successfully updated!'],200);   
    }  
    public function update_images(Request $request,$id)
    {   
        $request->validate([
            'file.*' => 'required|image'
        ]);

        $product = Product::where('adId',$id)->firstorfail();        

        foreach($request->file as $photo)
        {
            $name = time(). $photo->getClientOriginalName();
            $photo->move('images',$name);

            $images = $product->images;
            $images[]['url'] = url('images/').'/'.$name;

            $product->images=serialize($images);
            $product->save();
        }
       

        return response()
            ->json(['message'=> 'Product successfully updated!'],200);   
    }

    public function remove_image(Request $request,$id)
    {   
        $request->validate([
            'url' => 'required|url'
        ]);

        $product = Product::where('adId',$id)->firstorfail(); 
        $found = -1;
        $images = $product->images;


        foreach($images as $key=>$image)
        {
            if($image['url'] == $request->url){
                $found = $key;
                break;
            }
        }
        if($found >= 0){
            unset($images[$found]);
            $images = array_values($images);
        }

        $product->images=serialize($images);
        $product->save();

        return response()
            ->json(['product'=> $product,'message'=> 'Image successfully deleted!'],200);   
    }    

    public function finance(Request $request)
    {   
        $ch = curl_init();  
        
        $mileage = true;

        if($request->ibobil == 1){
            $code = 136;
        }else{
            $code = 135;
        }
        if($request->caravan == 1){
            $caravan = false;            
        }else{
            $caravan = true;
        }
        $make = 'any';
        $model = 'any';
        $price = $request->price;
        $equity = $request->equity;
        $year = $request->year;
        $month = $year * 12;

        curl_setopt($ch,CURLOPT_URL,'https://preprod.bilkjopet.no/api/v1/iBobil/Pricing/CalculateLoanPricePrivate?request.useDebtInsurance='.$caravan.'&request.downPayment='.$equity.'&request.durationMonths='.$month.'&request.agreementCode=303&request.investedAmount='.$price.'&request.isObjectNew='.$mileage.'&request.isObjectDirectlyImported=true&request.objectMake='.$make.'&request.objectModel='.$model.'&request.objectGroupCode='.$code);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'apiKey:0023ab1a-b9f1-84f8-9927-2bd5b6c811ec',
            'Content-Type: application/json', 
            'Accept: application/json'
        ));
     
        $response=curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
     
        curl_close($ch);
        // $output= json_encode($output);
        // return response()
        //     ->json($body,200);  
        // return $response; 
 
        return response()
            ->json(['additional'=>$body],200);   
    }
}
