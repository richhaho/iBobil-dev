<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

use App\Product;
use App\Brand;

use Finn\RestClient\CurlClient;
use Finn\FinnClient\FinnClient;



class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['responseCode'=> 0,'message' => 'Credentials do not match!'], 401);
        }

        $curlClient = new CurlClient(array(
            "userAgent" => "testuser",
            "httpMethod" => "GET"
        ));
        //Set your apikey as a header
        $apiKey = "8Dn1qRjc3Q9jsRKq";
        $curlClient->setHeaders(array(
            "x-finn-apikey: $apiKey"
        ));

        //Inject the curlClient into FinnClient
        $client = new FinnClient($curlClient);
        
        $result1 = $client->search('caravan', array(
            'orgId' => '301823153',
            'page' => '',
            'rows' => '',
            'q' => ''
        ));

        $result2 = $client->search('mobile-home', array(
            'orgId' => '301823153',
            'page' => '',
            'rows' => '',
            'q' => ''
        ));

        $brands = [];

        foreach($result1->results as $product)
        {
            $result = $this->fetchOne('caravan', $product->id);
            $product = Product::where('adId',$result->id)->first();
            if(!$product){
                $product = new Product;
            }
            $product->adId = $result->id;
            $product->name = $result->title;
            $product->updated = $result->updated;
            $product->published = $result->published;
            $product->links = serialize($result->links);
            $product->location = serialize($result->location);
            $product->images = serialize($result->images);
            $product->adata = serialize($result->aData);
            $product->type = 'caravan';
            $product->slug = str_slug($result->title.$result->id, '-');
            $product->meta_title = $product->name.' | iBobil Nord-Norges største Caravan Senter';
            $product->save();

        }

        foreach($result2->results as $product)
        {
            $result = $this->fetchOne('mobile-home', $product->id);
            $product = Product::where('adId',$result->id)->first();
            if(!$product){
                $product = new Product;
            }
            $product->adId = $result->id;
            $product->name = $result->title;
            $product->updated = $result->updated;
            $product->published = $result->published;
            $product->links = serialize($result->links);
            $product->location = serialize($result->location);
            $product->images = serialize($result->images);
            $product->adata = serialize($result->aData);
            $product->type = 'mobile-home';
            $product->slug = str_slug($result->title.$result->id, '-');
            $product->meta_title = $product->name.' | iBobil Nord-Norges største Caravan Senter';
            $product->save();

            if (!in_array($result->aData['make'], $brands))
            {
                $brands[]= $result->aData['make'];
            }
        }

        foreach($brands as $name)
        {
            $brand = Brand::where('name',$name)->first();
            if(!$brand){
                $brand= new Brand;
            }
            $brand->name = $name;
            $brand->slug = str_slug($name, '-');      

            $brand->save();
        }


        return response()->json([
            'code'=> 200,
            'message' => 'Successfully logged in',
            'token' => $token,
            'user' => Auth::user()         
        ]);
    }

    public function test(Request $request)
    {        
        return response()->json('success', 200); 
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
      auth()->logout();

      return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token
        ]);
    }

    public function viewOne()
    {
        header('Content-Type: text/html; charset=utf-8');
        $apiKey = '8Dn1qRjc3Q9jsRKq';
        $orgId = '301823153';        
        $adId = '118964029';
        $type= 'caravan';
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36';
        //urlencode: "..q=" . urlencode("mjøsa");
        //location=0.20061 == Oslo
        $apiUrl = "https://cache.api.finn.no/iad/ad/$type/$adId";
        //fetch using curl (or whatever you prefer, curl is good for setting custom headers)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_URL, utf8_decode($apiUrl));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-finn-apikey: $apiKey"));
        $rawData = curl_exec($ch);
        if (curl_error($ch)) {
            die("Fetch problem");
        }

        $xmlData = new \SimpleXMLElement($rawData);
        
        $entry = new \SimpleXMLElement($rawData);
        $ns = $entry->getNamespaces(true);
        $resultSet = $this->parseEntry($entry, $ns);

        dd($resultSet);
    }

    public function fetchOne($type,$id)
    {
        header('Content-Type: text/html; charset=utf-8');
        $apiKey = '8Dn1qRjc3Q9jsRKq';
        $orgId = '301823153';        
        $adId = $id;
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36';
        //urlencode: "..q=" . urlencode("mjøsa");
        //location=0.20061 == Oslo
        $apiUrl = "https://cache.api.finn.no/iad/ad/$type/$adId";
        //fetch using curl (or whatever you prefer, curl is good for setting custom headers)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_URL, utf8_decode($apiUrl));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-finn-apikey: $apiKey"));
        $rawData = curl_exec($ch);
        if (curl_error($ch)) {
            die("Fetch problem");
        }

        $xmlData = new \SimpleXMLElement($rawData);
        
        $entry = new \SimpleXMLElement($rawData);
        $ns = $entry->getNamespaces(true);
        $resultSet = $this->parseEntry($entry, $ns);

        return $resultSet;
    }

    private function parseEntry($entry, $ns)
    {       
        $property = (object) [];
            
            $property->id = (string)$entry->children($ns['dc'])->identifier;
            $property->title = (string)$entry->title;
            $property->updated = (string)$entry->updated;
            $property->published = (string)$entry->published;
          
            $links = array();
            foreach ($entry->link as $link) {
                $rel = $link->attributes()->rel;
                $ref = $link->attributes()->href;
                $links["$rel"] = "$ref";
            }
            $property->links = $links;
          
            $isPrivate = "false";
            $status = "";
            $adType = "";
            foreach ($entry->category as $category) {
              if ($category->attributes()->scheme =="urn:finn:ad:private"){
                $isPrivate = $category->attributes()->term;
              }
              //if disposed == true, show the label
              if ($category->attributes()->scheme =="urn:finn:ad:disposed"){
                if($category->attributes()->term == "true"){
                  $status = $category->attributes()->label;
                }
              }
              if ($category->attributes()->scheme =="urn:finn:ad:type"){
                $adType = $category->attributes()->label;
              }
            }
            
            // $property->isPrivate = (string)$isPrivate;
            // $property->status = (string)$status;
            // $property->adType = (string)$adType;
            
            // $property->georss = (string)$entry->children($ns['georss'])->point;
            $location = $entry->children($ns['finn'])->location;
            // $property->city = (string)$location->children($ns['finn'])->city;
            // $property->address = (string)$location->children($ns['finn'])->address;
            // $property->postalCode = (string)$location->children($ns['finn'])->{'postal-code'};

            $property->location['address'] = (string)$location->children($ns['finn'])->address;
            $property->location['postalCode'] = (string)$location->children($ns['finn'])->{'postal-code'};
            $property->location['city'] = (string)$location->children($ns['finn'])->city;
            $property->location['country'] = (string)$location->children($ns['finn'])->country;
            $property->location['content'] = (string)$location->children($ns['finn'])->content;
            $property->location['link'] = (string)$location->children($ns['finn'])->link;
            $property->location['geo'] = (string)$entry->children($ns['georss'])->point;

            
            $contacts = array();
            $work = null;
            $mobile = null;
            $fax = null;
            foreach($entry->children($ns['finn'])->contact as $contact) {
                $name = (string) $contact->children()->name;
                $title = (string) $contact->attributes()->title;
                foreach($contact->{'phone-number'} as $numbers) {
                    switch($numbers->attributes()) {
                        case 'work':
                            $work = (string) $numbers;
                            break;
                        case 'mobile':
                            $mobile = (string) $numbers;
                            break;
                        case 'fax':
                            $fax = (string) $numbers;
                            break;
                    }
                }
                array_push($contacts, array(
                    'name' => $name,
                    'title' => $title,
                    'work' => $work,
                    'mobile' => $mobile,
                    'fax' => $fax
                ));
            }
            $property->contacts = $contacts;
            
            $images = array();
            if ($entry->children($ns['media']) && $entry->children($ns['media'])->content->attributes()) {
                //$images = $entry->children($ns['media'])->content->attributes();
                foreach($entry->children($ns['media'])->content as $content) {
                    $images[] = current($content->attributes());
                }
            }
            $property->images = $images;
        
            $property->author = (string)$entry->author->name;
        
            $adata = $entry->children($ns['finn'])->adata;
            $livingSizeFrom = 0;
            $livingSizeTo = 0;
            $propertyType = "";
            $numberOfBedrooms = 0;
            $ownershipType = "";
            $usableSize = "";
            $primarySize = "";
            $ingress = "";
            $situation = "";
            $facilities = array();
            $generalText = array();
            foreach ($adata->children($ns['finn'])->field as $field) { 

                $newfield = $field->attributes()->name;

                if ($field->attributes()->name == 'description') {
                    $property->aData["$newfield"]  =  array((string) $field)[0];
                } elseif ($field->attributes()->name == 'equipment') {
                    foreach($field->value as $value){
                        $property->aData["$newfield"][] = (string)$value;
                    }
                } elseif ($field->attributes()->name == 'engine') {
                    foreach($field as $value){
                        // dd($value->attributes());
                        $name = $value->attributes()->name;
                        // dd($name);
                        $value = (string) $value->attributes()->value;
                        // dd($value);

                        // $property->aData["$newfield"] = [];
                        
                        $property->aData["$newfield"]["$name"] = $value;
                    }
                }elseif ($field->attributes()->name == 'weight') {
                    foreach($field as $value){
                        // dd($value->attributes());
                        $name = $value->attributes()->name;
                        // dd($name);
                        $value = (string) $value->attributes()->value;
                        // dd($value);

                        // $property->aData["$newfield"] = [];
                        
                        $property->aData["$newfield"]["$name"] = $value;
                    }
                } elseif ($field->attributes()->name == 'price') {
                    foreach($field as $value){
                        // dd($value->attributes());
                        $name = $value->attributes()->name;
                        // dd($name);
                        $value = (string) $value->attributes()->value;
                        // dd($value);

                        // $property->aData["$newfield"] = [];
                        
                        $property->aData["$newfield"]["$name"] = $value;
                    }
                }

                else{
                    try{
                        $property->aData["$newfield"]  =  array((string) $field->attributes()->value)[0];
                    } catch(\ErrorException $e){
                        continue;
                    }
                }         
            }         
        
            
            
        
        
            $mainPrice = "";
            $totalPrice = "";
            $collectiveDebt = "";
            $sharedCost = "";
            $estimatedValue = "";
            $sqmPrice = "";
            $mainPriceFrom = "";
            $mainPriceTo = "";
            foreach ($adata->children($ns['finn'])->price as $price) {
                if ($price->attributes()->name == 'main') {
                    $property->aData["prices"]["main"] = (string)$price->attributes()->value;

                    $mainPrice = $price->attributes()->value;
                    $mainPriceFrom = $price->attributes()->from;
                    $mainPriceTo = $price->attributes()->to;
                }
                if ($price->attributes()->name == 'net') {
                    $property->aData["prices"]["net"] = (string)$price->attributes()->value;
                }
                if ($price->attributes()->name == 'total') {
                    $totalPrice = $price->attributes()->value;
                }
                if ($price->attributes()->name == 'collective_debt') {
                    $collectiveDebt = $price->attributes()->value;
                }
                if ($price->attributes()->name == 'shared_cost') {
                    $sharedCost = $price->attributes()->value;
                }
                if ($price->attributes()->name == 'estimated_value') {
                    $estimatedValue = $price->attributes()->value;
                }
                if ($price->attributes()->name == 'square_meter') {
                    $sqmPrice = $price->attributes()->value;
                }
            }
            $property->mainPrice = (string)$mainPrice;
            $property->mainPriceFrom = (string)$mainPriceFrom;
            $property->mainPriceTo = (string)$mainPriceTo;
            $property->totalPrice = (string)$totalPrice;
            $property->collectiveDebt = (string)$collectiveDebt;
            $property->sharedCost = (string)$sharedCost;
            $property->estimatedValue = (string)$estimatedValue;
            $property->sqmPrice = (string)$sqmPrice;
            
        
            
            return $property;
    }
}
