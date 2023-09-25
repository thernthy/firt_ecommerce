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
}
