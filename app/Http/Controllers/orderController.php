<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
class orderController extends Controller
{
    public function orderIndex() {
      $userType = Auth::user()->user_type;
      if ($userType == 1) {
          $Order_items = DB::table('orders')
          ->select()
          ->join('order_items', 'Orders.id', '=', 'order_items.order_id')
          ->join('users', 'orders.user_id', '=', 'users.id')
          ->get();
        return view('admin_dashboard.order_front', compact('Order_items'));
        } else {
          return abort(404);
    }
  }
}
