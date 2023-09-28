<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str; 
class productController extends Controller
{
    public function products() {
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            $get_products = DB::table('products')->select(
                'product_id',
                'name',
                'price',
                'photo',
                'int_stock',
                'product_cost',
                'slug'
            )
            ->orderByRaw('int_stock ASC')
            ->get();
            return view('admin_dashboard.products_list', compact('get_products'));
        }else{
            abort(404);
        }
    }
    public function productsView($slug) {
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            $get_view_product = DB::table('products')
            ->select()
            ->where('slug', $slug)
            ->first();
            return view('admin_dashboard.view_product', compact('get_view_product'));
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
            $image->move('products_img', $imageName);
        }
        $productId = DB::table('products')->insertGetId([
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
        $nameSlug = Str::slug($request->input('product_name'));
        $categorySlug = Str::slug($category_name);
        $slug = $nameSlug . '-' . $categorySlug;
        DB::table('products')->where('product_id', $productId)->update(['slug' => $slug]);
        return redirect()->back()->with('message_success', 'Product has been added successfully');
    }
    public function edit_product_view($slug) {
        $edit_product_target = DB::table('products')
        ->select()
        ->where('slug', $slug)
        ->first();
        return view('admin_dashboard.edit_product', compact('edit_product_target'));
    }
    public function saveEdit($slug, Request $request)
            {
                $category_name = $request->input('products_category');
                $request->validate([
                    'products_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $product = DB::table('products')
                    ->where('product_id', $slug)
                    ->first();

                if (!$product) {
                    return redirect()->back()->with('error', 'Product not found.');
                }
                $affected = DB::table('products')
                    ->where('product_id', $slug)
                    ->update([
                        'name' => $request->input('product_name'),
                        'description' => $request->input('description'),
                        'price' => $request->input('price'),
                        'category' => $category_name,
                        'int_stock' => $request->input('in_stock'),
                        'low_stock' => $request->input('low_stock'),
                        'product_cost' => $request->input('cost'),
                        'product_available_for_sale' => $request->input('available_for_sale'),
                    ]);

                if ($request->hasFile('products_img')) {
                    $image = $request->file('products_img');
                    $imageName = 'product_' . $category_name . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move('products_img', $imageName);
                    DB::table('products')
                        ->where('product_id', $slug)
                        ->update(['photo' => $imageName]);
                }
                $nameSlug = Str::slug($request->input('product_name'));
                $categorySlug = Str::slug($category_name);
                $newSlug = $nameSlug . '-' . $categorySlug;
                DB::table('products')
                    ->where('product_id', $slug)
                    ->update(['slug' => $newSlug]);

                return redirect()->back()->with('message_success', 'Product has been updated');
            }
    public function deletProduct($slug){
       DB::table('products')->where('slug', $slug)->delete();
       return redirect()->back()->with('message_success', 'product has been deleted!');
    }
}
