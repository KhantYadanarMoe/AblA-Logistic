<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderCompleted;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('user.index', [
            'randoms'=>Product::inRandomOrder()->take(4)->get()
        ]);
    }

    public function about(){
        return view('user.about');
    }

    public function products(){
        return view('user.products', [
            'products'=>Product::latest()->filter(request(['search']))->get()
        ]);
    }

    public function contact(){
        return view('user.contact');
    }

    public function storeContact(){
        $formData = request()->validate([
            "firstName" => ["required"],
            "lastName" => ["required"],
            "message" => ["required"],
            "phone" => ["required"],
        ]);
        Contact::create($formData);

        return redirect()->back()->with('success', "Your message arrived. We will contact you in a day. Thanks for reaching out.");
    }

    public function cart(){
        return view('user.cart', [
            'carts'=>Cart::latest()->get()
        ]);
    }

    public function addToCart(Request $request){
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to add to the cart');
        }

        $request->validate([
            'thumbnail'=>'required|string',
            'name'=>'required|string',
            'price'=>'required|integer'
        ]);

        $existingCartItem = Cart::where('user_id', $user->id)
                                ->where('thumbnail', $request->input('thumbnail'))
                                ->where('name', $request->input('name'))
                                ->first();
        
        if ($existingCartItem) {
            return redirect()->back()->with('error', 'This product is already in your cart.');
        }

        Cart::create([
            'user_id'=>$user->id,
            'thumbnail'=>$request->input('thumbnail'),
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
        ]);

        $wishlistItem = Wishlist::where('user_id', $user->id)
                                ->where('thumbnail', $request->input('thumbnail'))
                                ->where('name', $request->input('name'))
                                ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
        }

        if (session()->has('cartCount')) {
            session()->put('cartCount', session()->get('cartCount') + 1);
        } else {
            session()->put('cartCount', 1);
        }


        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id){
        $cartItem = Cart::find($id);

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Item not found in cart.');
        }

        $cartItem->delete();

        $cartCount = Cart::where('user_id', auth()->id())->count();
        session(['cartCount' => $cartCount]);

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    public function storeOrder(Request $request){
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string', 
            'msg' => 'required',
            'quantities' => 'required|array',
            'quantities.*.quantity' => 'required|integer',
            'quantities.*.price' => 'required|numeric',
            'quantities.*.name' => 'required|string',
            'quantities.*.thumbnail' => 'required|string',
        ]);

        $userId = auth()->id();

        $total = 0;
        foreach ($request->quantities as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $orderNumber = '#' . rand(1000, 9999);

        // Create order
        $order = Order::create([
            'user_id' => $userId,
            'order_no' => $orderNumber,
            'total' => $total,
            'address' => $request->address,
            'phone' => $request->phone,
            'msg' => $request->msg,
        ]);

        // Move cart items to order items
        foreach ($request->quantities as $cartId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'thumbnail' => $item['thumbnail'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);

            // Optionally, delete the cart item
            Cart::where('user_id', $userId)->where('id', $cartId)->delete();
        }

        // Reset cart count in the session
        session(['cartCount' => 0]);

        // Return response
        return redirect('/cart')->with('order', 'Order placed successfully!');
    }

    public function userInfo(){
        return view('user.user-info', [
            'user' => Auth::user(),
            'info' => Auth::user()->info,
        ]);
    }

    public function createUserInfo(Request $request){
        $data = $request->validate([
            'phone' => 'required',
            'street' => 'required',
            'township' => 'required',
            'city' => 'required',
        ]);

        $user = Auth::user();
        $userInfo = $user->info;

        $data['user_id'] = $user->id;

        if ($userInfo) {
            $userInfo->update($data);
        } else {
            $user->info()->create($data);
        }

        return redirect('/user-info')->with('success', 'User information updated successfully.');
    }

    public function wishlist(){
        $user=Auth::user();

        $wishlists = $user->wishlists()->filter(request(['search']))->get();
        return view('user.wishlist', [
            'wishlists'=>$wishlists
        ]);
    }

    public function addToWishlist(Request $request){
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to add to the wishlist.');
        }

        $request->validate([
            'thumbnail' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|integer',
            'desc' => 'required|string',
        ]);

        $existingWishlistItem = Wishlist::where('user_id', $user->id)
                                        ->where('thumbnail', $request->input('thumbnail'))
                                        ->where('name', $request->input('name'))
                                        ->first();

        if ($existingWishlistItem) {
            return redirect()->back()->with('error', 'This product is already in your wishlist.');
        }

        Wishlist::create([
            'user_id' => $user->id,
            'thumbnail' => $request->input('thumbnail'),
            'name' => $request->input('name'), 
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
        ]);

        return redirect()->back()->with('success', 'Product added to your wishlist successfully!');
    }

    public function orderHistory(){
        $user=Auth::user();
        $orders = $user->orders()->with('orderItems')->get();
        $completeds = OrderCompleted::where('user_id', auth()->id())
                    ->where('status', 'completed')
                    ->get();

        return view('user.order-history', [
            'orders'=>$orders,
            'completeds'=>$completeds,
        ]);
    }

    public function userOrderDetail($orderId){
        $order = Order::findOrFail($orderId);

        $items = OrderItem::where('order_id', $orderId)->get();

        return view('user.order-details', compact('order', 'items'));
    }

    public function showCompletedOrderDetail($c_id){
        $order = OrderCompleted::where('c_id', $c_id)->with('completedOrderDetails')->firstOrFail();

        return view('user.completed-order-details', compact('order'));
    }
}