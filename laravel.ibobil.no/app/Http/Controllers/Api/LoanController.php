<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Product;
use DB;

class LoanController extends Controller
{
    
    public function __construct()
    {
        // DB::enableQueryLog();        
        // dd(DB::getQueryLog());
        $this->middleware('auth:api', ['except' => ['index']]);
    }
   
    public function index(Request $request)
    {   
        $product = Product::findorfail($request->id);

        
        if($product->type =='mobile-home')
        {
            $code = 136;
            $caravan = false;
            if(isset($product['adata']['mileage'])){
                $new = false;
            }else{
                $new = true;
            }
        }else{
            $code = 135;
            $caravan = true;
            $new = true;
        }

        $price = $request->price;
        $equity = $request->equity;
        $year = $request->year;
        $month = $year * 12;   

        $ch = curl_init(); 
        
        if($new)
        {
            curl_setopt($ch,CURLOPT_URL,'https://preprod.bilkjopet.no/api/v1/iBobil/NewCarLoanApplicationPrivateApplicantRequest?electronicConsent=false');
            $data = [
                "Applicant" => [
                    "Contacts" => [
                        "MobilePhone" => $request->phone,
                        "Email" => $request->email
                    ],
                    "Ssn" => $request->ssn
                ],
                "UseDebtInsurance" => false,
                "R35" => false,
                "AgreementCode" => "303",
                "Duration" => $month,
                "DownPayment" => $equity,
                "GroupCode" => $code,
                "Make" => $product['adata']['make'],
                "Model" => $product['adata']['model'],
                "RegistrationYear" => $product['adata']['year'],
                "Price" => $product['adata']['prices']['main'],
            ];
        } else{
            curl_setopt($ch,CURLOPT_URL,'https://preprod.bilkjopet.no/api/v1/iBobil/UsedCarLoanApplicationPrivateApplicantRequest?electronicConsent=false');
            $data = [
                "Identification" => [
                    "RegistrationNumber" => "ZH49860"
                ],
                "InitialMileage" => $product['adata']['mileage'],
                "Applicant" => [
                    "Contacts" => [
                        "MobilePhone" => $request->phone,
                        "Email" => $request->email
                    ],
                    "Ssn" => $request->ssn
                ],
                "UseDebtInsurance" => false,
                "R35" => false,
                "AgreementCode" => "303",
                "Duration" => $month,
                "DownPayment" => $equity,
                "GroupCode" => $code,
                "Make" => $product['adata']['make'],
                "Model" => $product['adata']['model'],
                "RegistrationYear" => $product['adata']['year'],
                "Price" => $product['adata']['prices']['main'],
            ];          
        }
        $jsondata = json_encode($data);
        $jsondata = trim($jsondata,'"');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondata);
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
            ->json($body,200);   
    }
}
