<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Finn\RestClient\CurlClient;
use Finn\FinnClient\FinnClient;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    // public function getCaravan()
    // {
    //     header('Content-Type: text/html; charset=utf-8');
    //     $apiKey = '8Dn1qRjc3Q9jsRKq';
    //     $orgId = '301823153';
    //     $type= 'caravan';
    //     $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36';
    //     $apiUrl = "https://cache.api.finn.no/iad/search/".$type."?orgId=$orgId";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    //     curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    //     curl_setopt($ch, CURLOPT_URL, utf8_decode($apiUrl));
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-finn-apikey: $apiKey"));
    //     $rawData = curl_exec($ch);
    //     if (curl_error($ch)) {
    //         die("Fetch problem");
    //     }
    //     $xmlData = new \SimpleXMLElement($rawData);
    //     $xml = simplexml_load_string($rawData);
    //     $json = json_encode($xml);
    //     $array = json_decode($json,TRUE);
    //     dd($array);
    // }

    public function saveAllDataToDb()
    {


        //Set up the CurlClient to be used in FinnClient
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
        /*
            Then you can do a search with any query parameters for the 'realestate-homes'-resource
            Any of the property resources may be used here.
        */
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

        /*
            Or if you already know the id of the ad you want
            you can use the client this way to get just the ONE object
        */
        // $results = $client->getObject('caravan', 118964029);
        // dd($result->results);
        foreach($result1->results as $product)
        {
            $result = $this->fetchOne('caravan', $product->id);
            $product = new Product;
            $product->adId = $result->id;
            $product->name = $result->title;
            $product->updated = $result->updated;
            $product->published = $result->published;
            $product->links = serialize($result->links);
            $product->location = serialize($result->location);
            $product->images = serialize($result->images);
            $product->adata = serialize($result->aData);
            $product->type = 'caravan';
            $product->save();
        }

        foreach($result2->results as $product)
        {
            $result = $this->fetchOne('mobile-home', $product->id);
            $product = new Product;
            $product->adId = $result->id;
            $product->name = $result->title;
            $product->updated = $result->updated;
            $product->published = $result->published;
            $product->links = serialize($result->links);
            $product->location = serialize($result->location);
            $product->images = serialize($result->images);
            $product->adata = serialize($result->aData);
            $product->type = 'mobile-home';
            $product->save();
        }

        dd('completed');
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
                } elseif ($field->attributes()->name == 'weight') {
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
