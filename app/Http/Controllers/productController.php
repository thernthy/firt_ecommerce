<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
class productController extends Controller
{
    public function products() {
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            return view('admin_dashboard.products_list');
        }else{
            abort(404);
        }
    }
    public function productsView() {
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            return view('admin_dashboard.view_product');
        }else{
            abort(404);
        }
    }
    public function addProduct() {
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            $catagory_name = DB::table('catagory')
            ->select('catagory_name')
            ->orderByRaw('updated_at - created_at DESC')
            ->get();
            //dd($catagory_name);
            return view('admin_dashboard.add_product', compact('catagory_name'));
        }else{
            abort(404);
        }
    }
    public function postProduct(Request $request){
        $category_name = $request->input('products_category');
        $request->validate([
            'products_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        if ($request->hasFile('products_img')) {
            $image = $request->file('products_img');
            $imageName = 'product_'. $category_name.'_'. time() . '.' . $image->getClientOriginalExtension();
        }
        DB::table('products')->insert([
            'name' => $request->input('product_name'),
            'description' =>$request->input('description'), 
            'price' => $request->input('price'),
            'category' => $category_name,
            'photo' => $imageName,
            'int_stock' => $request->input('int_stock'),
            'low_stock' => $request->input('low_stock'),
            'product_cost' => $request->input('cost'),
            'product_status' => 0,
            'product_available_for_sale' => $request->input('available_for_sale'),
        ]);
        $image->move('products_img', $imageName);
        return redirect()->back()->with('message_success', 'product has been add successfull');
        
    }
}
