<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;


class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reviews=App\Review::all(); 
        // $restaurant_id=$request->route('restaurant_id');
        // $restaurant=Restaurant::find($restaurant_id);
        // return view('restaurants.viewer')->with('reviews',$restaurant->reviews);

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
        if (! Auth::check()) {
            return redirect('/index');
        }
        
        $review=new Review;
        $review->user_id=auth()->user()->id;
        $review->restaurant_id=$request->get('restaurant_id');
        $review->value=$request->input('value');
        $review->rating=$request->input('rating'); 
        $review->save();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
  
    $reviews = Review::find($id); // Find all reviews model by restaurantID
    return view('restaurants.review'); // This will do $reviews = reviews
    // now you can foreach over reviews in your blade
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
