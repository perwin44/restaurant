<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users(){
        $data=User::all();
        return view('admin.users',compact('data'));
    }

    public function delete_user($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('message','User Deleted Successfully!');
    }

    public function food_menu(){
        $data=Food::all();
        return view('admin.food_menu',compact('data'));
    }

    public function upload_food(Request $request){
        $data=new Food;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $image=$request->image;
       // if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
    //}

        $data->save();
        return redirect()->back()->with('message','Food Added Successfully!');
    }

    public function delete_menu($id){
        $data=Food::find($id);
        $data->delete();
        return redirect()->back()->with('message','Food Deleted Successfully!');
    }

    public function update_view($id){
        $data=Food::find($id);
        return view('admin.update_view',compact('data'));
    }

    public function update(Request $request,$id){
        $data=Food::find($id);
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
    }

        $data->save();
        return redirect()->back()->with('message','Food Updated Successfully!');
    }

    public function view_reservation(){
        if(Auth::id()){
        $data=Reservation::all();
        return view('admin.admin_reservation',compact('data'));
    }
    else{
        return redirect('login');
    }
}

    public function view_chef(){
        $data=FoodChef::all();
        return view('admin.adminchef',compact('data'));
    }

    public function upload_chef(Request $request){
        $data=new FoodChef;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image=$imagename;
    }
    $data->save();
    return redirect()->back()->with('message','Chef Added Successfully!');
    }

    public function update_chef($id){
        $data=FoodChef::find($id);
        return view('admin.update_chef',compact('data'));
    }

    public function update_foodchef(Request $request,$id){
        $data=FoodChef::find($id);

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image=$imagename;
    }
    $data->name=$request->name;
    $data->speciality=$request->speciality;
    $data->save();
    return redirect()->back()->with('message',value: 'Chef Updated Successfully!');
    }

    public function delete_chef($id){
        $data=FoodChef::find($id);
        $data->delete();
        return redirect()->back()->with('message',value: 'Chef Deleted Successfully!');

    }

    public function orders(){
        $data=Order::all();
        return view('admin.orders',compact('data'));
    }

    public function search(Request $request){
        $search=$request->search;
        $data=Order::where('name','LIKE','%'.$search.'%')->orWhere('foodname','LIKE','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }
}
