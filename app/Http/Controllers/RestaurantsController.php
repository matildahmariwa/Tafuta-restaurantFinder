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

        if($request->hasFile('cover_image')) {
            $restaurant->cover_image = ImageUploadController::store($request, 'cover_image');
        }

        $restaurant->save();

        return redirect("restaurants/");

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
        return view('restaurants.viewer')->with('restaurant', $restaurant);
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
