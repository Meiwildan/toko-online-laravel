<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $itemfarrel) {
            if (!Product::where('id', $itemfarrel->prod_id)->where('qty', '>=', $itemfarrel->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $itemfarrel->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        

        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeOrderFarrel(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');



        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prodfarrel) 
        {
            $total += $prodfarrel->products->selling_price;
        }

        $order->total_price = $total;

        $order->tracking_no = 'Meiwildan Farrel'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $itemfarrel) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $itemfarrel->prod_id,
                'qty' => $itemfarrel->prod_qty,
                'price' => $itemfarrel->products->selling_price,
            ]);
            $prod = Product::where('id', $itemfarrel->prod_id)->first();
            $prod->qty =  $prod->qty - $itemfarrel->prod_qty;
            $prod->update();
        }
        if (Auth::user()->address == NULL) 
        {
            $user = User::where('id', Auth::id())->first();

            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect("/")->with('status', 'Order Placed Successfully');
    }
}
