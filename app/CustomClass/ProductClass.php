<?php


namespace App\CustomClass;


use App\Product;

class ProductClass
{

    public static function create_product($product)
    {
        
            $photo = $product['photo'];
            $photoname = uniqid() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path() . '/uploads', $photoname);

            $product['photo'] = $photoname;

            Education::create($product);
        
        return response()->json(['status' => "success"]);
    }

}