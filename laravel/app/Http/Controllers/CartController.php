<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FeaturedProducts= Product::inRandomOrder()->take(4)->get();
        return view('cart')->with('FeaturedProducts', $FeaturedProducts);
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
       $duplicates =  Cart::search(function ($cartItem, $rowId) use ($request) {return $cartItem->id === $request->id; });

       if ($duplicates->isNotEmpty()){
        return redirect()->route('cart.index')->with('success_message' , 'Item is already in your cart');
       }
        
        Cart::add($request->id, $request->name, 1 , $request->price)->associate('App\Product');
        
        return redirect()->route('cart.index')->with('success_message' , 'Item has been added to your cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric',
        ]);
        Cart::update($id, $request->quantity);
        session()->flash('success_message','Quantity Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with ('success_message','Item has been removed');
    }
}
