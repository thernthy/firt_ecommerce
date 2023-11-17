<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Product;
use App\Cart;  
use App\CartItem;  
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $category_shop = DB::table('catagory')
      ->select('catagory_name')
      ->orderByRaw('catagory_name DESC')
      ->get();
      $totalCartItems = DB::table('cart_items')
      ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
      ->where('carts.user_id', auth()->id())
      ->sum('cart_items.quantity');
      //dd($category_shop);
        return view('front.home', compact('category_shop', 'totalCartItems'));
    }
    public function home()
    {
      $userType = Auth::user()->user_type;
      if ($userType == 1) {
         return view('admin_dashboard.home');
        } else {
          $category_shop = DB::table('catagory')
          ->select('catagory_name')
          ->orderByRaw('catagory_name DESC')
          ->get();
          $totalCartItems = DB::table('cart_items')
          ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
          ->where('carts.user_id', auth()->id())
          ->sum('cart_items.quantity');
          return view('front.home', compact('category_shop', 'totalCartItems'));
        }
    }
  public function viewShop($shop_category){
      $category_name = urldecode($shop_category);
      $category_shop = DB::table('catagory')
          ->select('catagory_name')
          ->orderBy('catagory_name', 'DESC')
          ->get();
      $products = DB::table('products')
          ->select()
          ->where('category', $category_name)
          ->where('product_available_for_sale', 'yes')
          ->orderByRaw('updated_at - created_at DESC')
          ->get();
          $totalCartItems = DB::table('cart_items')
          ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
          ->where('carts.user_id', auth()->id())
          ->sum('cart_items.quantity');
        return view('front.view_shop', compact('shop_category', 'category_shop', 'products', 'totalCartItems'));
  }
  public function  product_view($slug)
  {
    $category_shop = DB::table('catagory')
    ->select('catagory_name')
    ->orderByRaw('catagory_name DESC')
    ->get();
    $target_product = DB::table('products')
    ->select()
    ->where('products.slug', $slug)
    ->first();
          $totalCartItems = DB::table('cart_items')
          ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
          ->where('carts.user_id', auth()->id())
          ->sum('cart_items.quantity');
    return view('front.product_view', compact('target_product','category_shop','totalCartItems'));
  }

  public function addcart($slug, Request $request)
  {
      if (!auth()->check()) {
          return view('auth.login');
      }
      $product = DB::table('products')->select(['product_id', 'price'])->where('product_id', $slug)->first();
      if (!$product) {
          return redirect()->back()->with('error', 'Product not found.');
      }
      $user_id = auth()->id();
      $quantity = 0;
      if ($request->has('quanttity')){ 
          $quantity = intval($request->input('quanttity'));
          $deleted = DB::table('carts')
          ->where('product_id', $slug)
          ->delete();
        if ($deleted) {
          $cart = new Cart();
          $cart->user_id = $user_id;
          $cart->product_id = $product->product_id;
          $cart->save();
          $cartItem = new CartItem();
          $cartItem->cart_id = $cart->id;
          $cartItem->product_id = $product->product_id; 
          $cartItem->price = $product->price; 
          $cartItem->quantity = $quantity;
          $cartItem->save();
        }else{
          $cart = new Cart();
          $cart->user_id = $user_id;
          $cart->product_id = $product->product_id;
          $cart->save();
          $cartItem = new CartItem();
          $cartItem->cart_id = $cart->id;
          $cartItem->product_id = $product->product_id; 
          $cartItem->price = $product->price; 
          $cartItem->quantity = $quantity;
          $cartItem->save();
        }
      }else{
        $existingCartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product->product_id)
            ->first();
        if ($existingCartItem) {
            return redirect()->route('view.cart')->with('message_success', '
            Product already exists in your cart you can add more quantity on the page
            ');
        }
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product->product_id;
        $cart->save();
        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->product_id; 
        $cartItem->price = $product->price; 
        $cartItem->quantity = $quantity;
        $cartItem->save();
      }
      return redirect()->back()->with('success', 'Product added to cart.');
  }
  public function viewCart(){
    $category_shop = DB::table('catagory')
    ->select('catagory_name')
    ->orderByRaw('catagory_name DESC')
    ->get();
    $totalCartItems = DB::table('cart_items')
    ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
    ->where('carts.user_id', auth()->id())
    ->sum('cart_items.quantity');
    //select items from cart table and Cartitem table whith spacesifice user
    $cart_items = Db::table('cart_items')
    ->select()
    ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
    ->join('products', 'cart_items.product_id', '=', 'products.product_id')
    ->where('carts.user_id', auth()->id())
    ->orderByRaw('cart_items.created_at - cart_items.updated_at DESC')
    ->get();
    $total_price = 0;
    foreach($cart_items as $item){
        $total_price += ($item->quantity * $item->price);
    }
    $user_id = auth()->id();
    return view('front.view_cart_items', compact('totalCartItems', 'category_shop', 'cart_items', 'total_price'));
  }
  public function update_cart_amout($cart_id, Request $request)
    {
      $quantity = DB::table('cart_items')->select()
      ->join('products', 'cart_items.product_id', '=', 'products.product_id')
      ->where('cart_id', $cart_id)->first();
      $new_quantity = $request->input('quantity');
      //dd($quantity->int_stock);
      if($quantity->int_stock > $quantity->quantity){
        DB::table('cart_items')->where('cart_id', $cart_id)
        ->update([
          'quantity' => ($quantity->quantity + $new_quantity)
        ]);
        return redirect()->back()->with('message_success', 'quantity has been add on "'.$quantity->name. '" item');
      }else{
        return redirect()->back()->with('message_error', "sorry the stock for 
        ".$quantity->name." is not enough!");
      }
    }
  public function decreased_cart_item($cart_id, Request $request)
  {
      $quantity = DB::table('cart_items')->select()
      ->join('products', 'cart_items.product_id', '=', 'products.product_id')
      ->where('cart_id', $cart_id)->first();
      $new_quantity = $request->input('quantity');
      $amount_in_cart_quantity = (!$quantity->quantity<0)? $quantity->quantity - $new_quantity : 0;
      //dd($amount_in_cart_quantity);
      DB::table('cart_items')->where('cart_id', $cart_id)
      ->update([
        'quantity' => $amount_in_cart_quantity
      ]);
      if($quantity->quantity<=0){
        return redirect()->back()->with('message_error', "The quantity can't not be negative!");
      }else{ 
        return redirect()->back()->with('message_success', 'quantity has been decreased on "'.$quantity->name.'" item');
      }
  }
  public function checkout(){
    $order_items = DB::table('cart_items')
    ->select()
    ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
    ->where('cart_items.quantity', '!=', 0)
    ->where('carts.user_id', auth()->id())
    ->get();
    if($order_items->isEmpty()){
      return redirect()->back()->with('message_error', 'please add the product to your card!');
    }else{
      return view('front.checkout', compact('order_items'));
    }
  }
  public function comfirmOrder(Request $request)
  {
      $currentDate = now();
      $items_cart = Db::table('cart_items')
      ->select()
      ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
      ->join('products', 'cart_items.product_id', '=', 'products.product_id')
      ->where('carts.user_id', auth()->id())
      ->where('cart_items.quantity', '!=', 0)
      ->orderByRaw('cart_items.created_at - cart_items.updated_at DESC')
      ->get();
      $total_price = 0;
      foreach($items_cart as $item){
          $total_price += ($item->quantity * $item->price);
      }
      $shipping = 2;
      $total_price += $shipping;
      if ($request->has('confirm_telegram')) {
          $telegram = $request->input('confirm_telegram');
      } else {
          $telegram = null;
      }
      if ($request->hasFile('confirm_screen_short')) {
          $image = $request->file('confirm_screen_short');
          $imageName = '.' . time() . '.' . $image->getClientOriginalExtension();
          $image->move('order_screen_short', $imageName);
      } else {
          $imageName = null;
      }
      $Order = new Order();
      $Order->user_id = auth()->id();
      $Order->order_date = $currentDate;
      $Order->status = "pending";
      $Order->total_amount = $total_price;
      $Order->contact_number = $request->input('confirm_phone');
      $Order->telegram_name = $telegram;
      $Order->payment_screen_short = $imageName;
      $Order->shipping_address = $request->input('confirm_shipping');
      $Order->save();
      foreach($items_cart as $product){
        $OrderItem = new OrderItem();
        $OrderItem->order_id = $Order->id;
        $OrderItem->product_id = $product->product_id;
        $OrderItem->quantity = $product->quantity;
        $OrderItem->price = $product->price;
        $OrderItem->save();
      }
      foreach ($items_cart as $product) {
        Cart::where('id', $product->cart_id)->delete();
      }
    
      return redirect()->route('view.cart')->with('message_success', "Thank you for your order. We will send you a message.");
  }
  
public function deleteCart($cart_id){
    $cart = DB::table('carts')
      ->where('id', $cart_id)
      ->where('user_id', auth()->id())
    ->first();
    if (!$cart) {
      return redirect()->back()->with('message_error', 'Cart not found.');
    }
    DB::transaction(function () use ($cart, $cart_id) {
    DB::table('cart_items')
              ->where('cart_id', $cart_id)
              ->delete();
    DB::table('carts')
              ->where('id', $cart_id)
              ->delete();
  });
  return redirect()->back()->with('message_success', 'Items and cart have been deleted.');
}

  
}
