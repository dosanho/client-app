<?php

namespace App\Http\Controllers\Users;

use App\Http\Service\Client\BrandClient\BrandServiceClient;
use App\Http\Service\Client\CategoryClient\CategoryServiceClient;
use App\Http\Service\Client\ProductClient\ProductServiceClient;
use App\Http\Service\Client\ProductClient\SearchServiceClient;
use App\Http\Service\Client\SpecialityClient\SpecialityServiceClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SearchController
{
    protected ProductServiceClient $productService;

    protected CategoryServiceClient $categoryServiceClient;


    protected BrandServiceClient $brandServiceClient;

    protected SpecialityServiceClient $specialityServiceClient;

    protected SearchServiceClient $searchServiceClient;

    public function __construct(ProductServiceClient $productService,
                                CategoryServiceClient $categoryServiceClient,
                                BrandServiceClient $brandServiceClient,
                                SpecialityServiceClient $specialityServiceClient,
                                SearchServiceClient $searchServiceClient)
    {
        $this->productService = $productService;

        $this->categoryServiceClient = $categoryServiceClient;

        $this->brandServiceClient = $brandServiceClient;

        $this->specialityServiceClient = $specialityServiceClient;

        $this->searchServiceClient = $searchServiceClient;
    }

    public function index(Request $request){

        $product = $this->searchServiceClient->findAllByProductName($request);
        return view('user.home.search',[
            'title'=>'search',
            'count' =>count($product->get()),
            'name' =>$request->name
        ]);
    }

    public function show(Request $request){
        $page = (($request->page) - 1) * 6;;
        $product = $this->searchServiceClient->findAllByProductName($request)
            ->offset($page)
            ->limit(6)
            ->get();
       return $product;
    }

    public function total(Request $request){
        return  count($this->searchServiceClient->findAllByProductName($request)->get());
    }
    public function showTwo(Request $request){
//        $page = (($request->page) - 1) * 6;;
//        $product = $this->searchServiceClient->findAllByProductName($request)
//            ->offset($page)
//            ->limit(6)
//            ->get();
        return $request;
    }

}
