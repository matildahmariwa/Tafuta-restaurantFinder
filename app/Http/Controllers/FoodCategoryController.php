<?php

namespace App\Http\Controllers;

use App\FoodCategory;
use App\Restaurant;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FoodCategory $model)
    {
        return view('foodcategory.index', ['foodCategories' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new FoodCategory();
        $category->food_category = $request->input('food_category');
        $category->save();
        return redirect("foodcategory/");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\FoodCategory $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\FoodCategory $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodCategory = FoodCategory::find($id);
        return view('foodcategory.edit')->with('foodCategory', $foodCategory);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\FoodCategory $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foodCategory = FoodCategory::find($id);
        $foodCategory->food_category = $request->input('food_category');
        $foodCategory->save();
        return redirect ('/foodcategory')->withStatus(__('Menu category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\FoodCategory $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $foodCategory =FoodCategory::find($id);
        $foodCategory->delete();

        return redirect ('/foodcategory');
    }
}
