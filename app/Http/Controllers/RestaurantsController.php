<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Restaurant;
use DB;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $restaurants=App\Restaurant::all();   
        // return view('restaurants.index',compact('restaurants'));
        return('restaurants.index')->with('restaurants' ,$restaurants);
        // return view ('restaurants.index', compact( 'restaurants'));
        // return View::make('restaurants.index', array('restaurants' => $restaurants));
            
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
    //handle file upload
    if($request->hasFile('cover_image')){
        // Get filename with the extension
        $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
        //Get just filename
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just ext
        $extension=$request->file('cover_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore=$filename.'_'.time().'_'.$extension;
        //Upload image
        $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
    }
    else 
    $fileNameToStore='noImage.jpg';

    {
        //Create Restaurant
        $restaurant=new Restaurant;
        $restaurant->name= $request->input('name');
        $restaurant->menu=$request->input('menu');
        $restaurant->hours=$request->input('hours');
        $restaurant->contact=$request->input('contact');
        $restaurant->payment=$request->input('payment');
        $restaurant->description=$request->input('description');
        $restaurant->cover_image=$fileNameToStore;
        $restaurant->save();
 
        return redirect("profile/");   
     }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $restaurant=Restaurant::find($id); 
        return view('restaurants.viewer')->with('restaurant',$restaurant);
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
