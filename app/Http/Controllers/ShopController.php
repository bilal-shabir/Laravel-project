<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();
        if(request()->category){
            $FeaturedProducts = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
                 
            });
            $Categoryname = $Categories->where('slug' , request()->category )->first()->name;
        }
        else{
            $FeaturedProducts= Product::where('featured',true);
            $Categoryname = 'Featured Products';
        }
        if(request()->sort == "low_high"){
            $FeaturedProducts = $FeaturedProducts->orderBy('price')->paginate(3);
            // $FeaturedProducts = $FeaturedProducts->sortBy('price'); 
            //had to be reomved because pagination  works with query builder and this was a collection
        }
        elseif (request()->sort == "high_low"){
            $FeaturedProducts = $FeaturedProducts->orderBy('price' , 'desc')->paginate(3);
            // $FeaturedProducts = $FeaturedProducts->sortByDesc('price');
            //had to be reomved because pagination  works with query builder and this was a collection
        }
        else{
            $FeaturedProducts = $FeaturedProducts->paginate(3);
        }
        
        return view('shop')->with([
            'Categories'=> $Categories ,
            'FeaturedProducts' => $FeaturedProducts,
            'Categoryname' => $Categoryname
            ]) ;
    }

    public function search( Request $request)
    {
        $Categories = Category::all();
        $Categoryname = 'Searched Results';
        $FeaturedProduct = Product::where('name', $request->search)->first();

        
            return view('search')->with([
                'Categories'=> $Categories ,
                'FeaturedProduct' => $FeaturedProduct,
                'Categoryname' => $Categoryname
                ]) ;
        
        
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $Product = Product::where('slug', $slug)->firstOrFail();
        $FeaturedProducts= Product::inRandomOrder()->take(6)->get();

        

        return view('product')->with([
            'Product'=> $Product ,
             'FeaturedProducts' => $FeaturedProducts
             ]) ;
    }

}
