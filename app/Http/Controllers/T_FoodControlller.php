<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_Food;

class T_FoodControlller extends Controller
{
    public function index(Request $request)
    {
        $food = T_Food::all()->find($request->id);
        // dd($food);
        return view('productDetail', compact('food'));
    }

    public function show_form()
    {
        return view('form_add');
    }
    public function show_form_update(Request $request)
    {
        $food = T_Food::all()->find($request->id);
        return view('form_update', compact('food'));
    }

    public function update_food(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'old_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('img');
        $imageName = $image->getClientOriginalName(); // Lấy tên gốc của ảnh
        $image->move(public_path('assets/img'), $imageName); // Di chuyển ảnh vào thư mục public/assets/img

        // Tạo sản phẩm mới
        $food = T_Food::find($request->id);
        if($food){

            $food->name = $validatedData['name'];
            $food->old_price = $validatedData['old_price'];
            $food->new_price = $validatedData['new_price'];
            $food->description = $validatedData['description'];
            $food->category = $validatedData['category'];
            $food->main_img = str_replace('storage/', 'public/', $imageName); // Đường dẫn đến ảnh đã lưu
            $result = $food->save(); // Sử dụng phương thức save() để cập nhật
            if ($result) {
                return redirect()->route('home')->with('success','update Successfully');
            }
        }else{
            return redirect()->back()->with('error', 'update not successful');
        }


    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'old_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('img');
        $imageName = $image->getClientOriginalName(); // Lấy tên gốc của ảnh
        $image->move(public_path('assets/img'), $imageName); // Di chuyển ảnh vào thư mục public/assets/img

        // Tạo sản phẩm mới
        $food = new T_Food();
        $food->name = $validatedData['name'];
        $food->old_price = $validatedData['old_price'];
        $food->new_price = $validatedData['new_price'];
        $food->description = $validatedData['description'];
        $food->category = $validatedData['category'];
        $food->main_img = str_replace('storage/', 'public/', $imageName); // Đường dẫn đến ảnh đã lưu
        $result =  $food->save();
        if ($result) {
            return redirect()->route('home')->with('success','create Successfully');
        }else{
            return redirect()->back()->with('error', 'create not successful');
        }
    }

    public function delete(Request $request){
        $result = T_Food::find($request->id)->delete();
        if($result){
            return redirect()->route('home')->with('success','delete Successfully');;
        }else{
            return redirect()->back()->with('error', 'delete not successful');
        }
    }
}


