<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PagesController extends Controller
{
    function home(){
        return view('frontend.home-page.index');
    }

    function shopPage(){
        $products = Product::all()->where('status', '=' , 'product');
        $product_sales = Product::all()->where('sale', '!=' , null);
        $count = Product::count();
        $latest_product = Product::all()->where('created_at','>','2022-07-05 01:16:02');
        // dd($latest_product);
        // $latest_product = Product::all()->sortByDesc('created_at');
        // dd($latest_product);
        return view('frontend.shop-page.index' , [
            'products' => $products,
            'product_sales' => $product_sales,
            'count' => $count,
            'latest_product' => $latest_product
        ]);
    }

    function shopDetails(){
        $product_detail = Product::all()->where('status','=','details')->first();
        $product_details = Product::all()->where('status','=','details');
        $futured_product = Product::all()->where('created_at','>','2022-07-05 01:16:02')->skip(2)->take(4);
        return view('frontend.shopping-details-page.index',[
            'product_details' => $product_details,
            'product_detail' => $product_detail,
            'futured_product' => $futured_product
        ]);
    }

}
