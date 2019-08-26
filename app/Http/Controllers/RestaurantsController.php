<?php

namespace App\Http\Controllers;

use App\Review;
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
    public function index(Restaurant $model)
    {
        return view('restaurants.index', ['restaurants' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
        //Create Restaurant
        $restaurant = new Restaurant;
        $restaurant->name = $request->input('name');
        $restaurant->opening_time = $request->input('opening_time');
        $restaurant->physical_address = $request->input('physical_address');
        $restaurant->closing_time = $request->input('closing_time');
        $restaurant->days_of_operation = $request->input('days_of_operation');
        $restaurant->website = $request->input('website');
        $restaurant->email = $request->input('email');
        $restaurant->phone = $request->input('phone');
        $restaurant->lat=$request->input('lat');
        $restaurant->lng=$request->input('lng');
        $restaurant->vendor_id=auth()->user()->id;
        $restaurant->cover_image=$fileNameToStore;
       

        $restaurant->save();

        return redirect("home/");

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.profile')->with('restaurant', $restaurant);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.edit')->with('restaurant', $restaurant);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->input('name');
        $restaurant->opening_time = $request->input('opening_time');
        $restaurant->physical_address = $request->input('physical_address');
        $restaurant->closing_time = $request->input('closing_time');
        $restaurant->days_of_operation = $request->input('days_of_operation');
        $restaurant->website = $request->input('website');
        $restaurant->email = $request->input('email');
        $restaurant->phone = $request->input('phone');
        // $restaurant->cover_image=$fileNameToStore;
        // $restaurant->menu_image=$menuNameToStore;
        $restaurant->save();
        return redirect('/restaurants')->withStatus(__('Restaurant successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect('/restaurants');
    }

    public function profile($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.profile')->with('restaurant', $restaurant);
    }

}
