<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrderDetail;
use App\Models\Contact;
use App\Models\ContactDone;
use App\Models\Order;
use App\Models\OrderCompleted;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $userCount = User::count();
        $completedOrdersCount = OrderCompleted::where('status', 'completed')->count();
        $totalOrdersCount = Order::count();
        $sellingProductsCount = Product::count();
        return view('admin.dashboard', [
            'orders'=>Order::latest()->take(2)->get(),
            'contacts'=>Contact::latest()->take(3)->get(),
            'user' => $userCount,
            'completed' => $completedOrdersCount,
            'total' => $totalOrdersCount,
            'products'=>$sellingProductsCount
        ]);
    }

    public function products(){
        return view('admin.products', [
            'products' => Product::latest()->filter(request(['search']))->get()
        ]);
    }

    public function users(){
        return view('admin.users', [
            'users' => User::latest()->filter(request(['search']))->withCount('orders')->get()
        ]);
    }

    public function contacts(){
        return view('admin.contact', [
            'contacts'=>Contact::latest()->filter(request(['search']))->get()
        ]);
    }

    public function contacted(){
        return view('admin.contacted', [
            'contacteds'=>ContactDone::latest()->filter(request(['search']))->get()
        ]);
    }

    public function contactDone($id){
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found.');
        }

        $contactDone = new ContactDone();
        $contactDone->name = $contact->firstName;
        $contactDone->phone = $contact->phone;
        $contactDone->message = $contact->message;
        $contactDone->save();

        $contact->delete();

        return redirect()->back()->with('success', 'Contacted');
    }

    public function createProducts(){
        return view('admin.create-products');
    }

    public function storeProducts(){
        $formData = request()->validate([
            "name" => ["required"],
            "price" =>  ["required", "numeric"],
            "desc" =>  ["required", "min:150"],
        ]);
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Product::create($formData);

        return redirect('/admin/products')->with('success', 'Products Added successfully!');
    }

    public function editProducts(Product $product){
        return view('admin.edit-products', [
            'product' => $product
        ]);
    }

    public function updateProducts(Product $product){
        $formData = request()->validate([
            "name" => ["required"],
            "price" =>  ["required", "numeric"],
            "desc" =>  ["required", "min:150"],
        ]);
        $formData['thumbnail'] = request()->file('thumbnail') ?
            request()->file('thumbnail')->store('thumbnails') : $product->thumbnail;
        $product->update($formData);

        return redirect('admin/products')->with('updated', "Products data updated successfully!");
    }

    public function destroyProducts(Product $product){
        $product->delete();
        return redirect('/admin/products')->with('delete', 'Product Deleted successfully!');
    }

    public function orders(){
        return view('admin.orders', [
            'orders'=>Order::latest()->filter(request(['search']))->get()
        ]);
    }

    public function order($orderId)
    {
        // Fetch the order details based on the order_id
        $order = Order::findOrFail($orderId);

        // Fetch the order items associated with the order_id
        $items = OrderItem::where('order_id', $orderId)->get();

        // Pass the data to the view
        return view('admin.order-details', compact('order', 'items'));
    }

    public function completedOrder(){
        return view('admin.completed-orders', [
            'completeds'=>OrderCompleted::latest()->filter(request(['search']))->get()
        ]);
    }

    public function deliverOrder(Request $request, $orderId)
{
    DB::transaction(function() use ($orderId) {
        // Fetch the order and related order items
        $order = Order::findOrFail($orderId);
        $orderItems = $order->orderItems;

        // Create a new completed order
        $completedOrder = OrderCompleted::create([
            'c_id'=>$order->id,
            'user_id' => $order->user_id,
            'order_no' => $order->order_no,
            'total' => $order->total,
            'phone' => $order->phone,
            'address' => $order->address,
            'msg' => $order->msg,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ]);

        // Transfer each order item to the completed order details table
        foreach ($orderItems as $item) {
            CompletedOrderDetail::create([
                'completed_order_id' => $completedOrder->id,
                'thumbnail' => $item->thumbnail,
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Delete the original order and order items
        $order->orderItems()->delete();
        $order->delete();
    });

    return redirect('/admin/orders/completed');
}

    public function showCompletedOrderDetail($c_id)
    {
        // Fetch the completed order details using c_id
        $order = OrderCompleted::where('c_id', $c_id)->with('completedOrderDetails')->firstOrFail();

        // Pass the data to the view
        return view('admin.completed-order-details', compact('order'));
    }
}
