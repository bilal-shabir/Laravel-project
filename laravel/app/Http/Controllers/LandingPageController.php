<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FeaturedProducts= Product::where('featured',true)->take(6)->get();
        $TopSellingProducts= Product::inRandomOrder()->take(8)->get();

        return view('LandingPage')->with([
            'FeaturedProducts'=> $FeaturedProducts ,
             'TopSellingProducts' => $TopSellingProducts
             ]) ;
    }

   
}
