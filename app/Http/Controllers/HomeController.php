<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('redirects');
        }
        else{
        $data=Food::all();
        $chef=FoodChef::all();
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count();
        return view('home',compact('data','chef','count'));
    }
}

    public function redirects(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.adminhome');
        }
        else{
            $data=Food::all();
            $chef=FoodChef::all();
            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();
            return view('home',compact('data','chef','count'));
        }
    }

    public function reservation(Request $request){
        $data=new Reservation;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->date=$request->date;
        $data->guest=$request->guest;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back()->with('message','Reservation Added Successfully!');
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user_id=Auth::id();
            $foodid=$id;
            $quantity=$request->quantity;

            $cart=new Cart;
            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;
            $cart->save();


            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }

    public function show_cart(Request $request,$id){
        $count=Cart::where('user_id',$id)->count();
        if(Auth::id()==$id){
        $data2=Cart::select('*')->where('user_id','=',$id)->get();
        $data=Cart::where('user_id',$id)->join('food','carts.food_id','=',second: 'food.id')->get();
        return view('show_cart',compact('count','data','data2'));
    }
    else{
        return redirect()->back();
    }
}

    public function remove($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Food Deleted Successfully!');

    }

    public function order_confirm(Request $request){
        foreach($request->foodname as $key=>$foodname){
            $data=new Order;
            $data->foodname=$foodname;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->save();
            return redirect()->back()->with('message','Food Ordered Successfully!');
        };
    }
}
