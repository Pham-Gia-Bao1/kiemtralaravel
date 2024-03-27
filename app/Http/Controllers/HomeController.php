<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_Food;

class HomeController extends Controller
{
    public function index(Request $request){
        $foods = T_Food::all();
        return view('home',compact('foods'));
    }
    public function admin(Request $request){
        $products = T_Food::all();
        if(isset($request->search)) {
            $keyword = $request->search;
            $products = T_Food::where('name', 'like', "%$keyword%")
                                ->orWhere('description', 'like', "%$keyword%")
                                ->orWhere('category', 'like', "%$keyword%")
                                ->orWhere('old_price', 'like', "%$keyword%")
                                ->orWhere('new_price', 'like', "%$keyword%")
                                ->get();
        }

        return view('ListProduct',compact('products'));
    }
}
