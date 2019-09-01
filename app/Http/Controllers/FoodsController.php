<?php

namespace App\Http\Controllers;
use App\Food;
use App\Restaurant;
use App\Order;

use Illuminate\Http\Request;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function search(Request $request){
        $foodsAll = Restaurant::whereHas('foods',function($query) use ($request){
            $query->where('food_item','like','%'.$request->q.'%');
        })->get();
        // echo($foodsAll);
        return view('restaurants.searchShow')->with(['foodsAll'=>$foodsAll]);
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
        $food=new Food;
        $food->restaurant_id=$request->get('restaurant_id');
        $food->price=$request->input('price');
        $food->food_item=$request->input('food_item'); 
        $food->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('restaurants.menu');
        
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
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }
    public function remove(Request $request,$id)
    {
        if($id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$id])) {
 
                unset($cart[$id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $food=Food::find($id);
    $food->delete();
     return redirect('/')->with('success', 'Product added to cart successfully!');
    // return redirect('/');
    }
    public function cart(){
        return view ('restaurants.cart');
    }
    public function addToCart($id){
        $food = Food::find($id);  
    
       
        if(!$food) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        // "productId" => $food->id,
                        "name" => $food->food_item,
                        "quantity" => 1,
                        "price" => $food->price,
                        "restaurant" =>$food->restaurant_id,
                        
                    ]
            ];                    
 
            session()->put('cart', $cart);
        
 
            // return redirect()->back()->with('success', 'Product added to cart successfully!');
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            // return redirect()->back()->with('success', 'Product added to cart successfully!');
            return redirect('cart')->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            // "productId" => $food->id,
            "name" => $food->food_item,
            "quantity" => 1,
            "price" => $food->price,
            "restaurant" =>$food->restaurant_id,
            
        ];
 
        session()->put('cart', $cart);
 
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        return redirect('cart')->with('success', 'Product added to cart successfully!');
    }
    public function OrderItem(Request $request){
        $validator = $request->validate([
            'delivery_address' => 'required',
            'city' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $cart = session()->get('cart');
        foreach ($cart as $data) {
            $name = $data['name'];
            $quantity = $data['quantity'];            
            $total_price = $data['price']*$data['quantity'];
            $restaurant_id = $data['restaurant'];

        } 
        $user = auth()->user();  
        $restaurant = Restaurant::find($restaurant_id);  
        
        $order = new Order();
        $order->food = $name;
        $order->quantity = $quantity;
        $order->price = $total_price;
        $order->delivery_address = $request->get('delivery_address');
        $order->city = $request->get('city');
        $order->phone_number = $request->get('phone_number');
        $order->user_id = $user->id;
        $order->restaurant_id =$restaurant->id; 
        $order->save();
        if ($validator->fails()) {
            return redirect()->route('cart')->withErrors($validator)->withInput();
         }   

        return redirect()->route('cart')->with('success','orderplaced successfully');

    }

   
    

  
}
