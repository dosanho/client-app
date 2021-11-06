<?php

namespace App\Http\Service\Client\ThumbClient;

use Illuminate\Support\Facades\DB;

class ThumbServiceClient
{
    public function findAllImgByProductId($id){
        return DB::table('img')
            ->select('img.*')
            ->where('product_id','=',$id)->get();
    }
}
