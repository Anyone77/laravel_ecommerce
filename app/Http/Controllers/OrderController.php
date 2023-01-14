<?php

namespace App\Http\Controllers;

use Stripe\Product;
use App\Models\Order;
use App\Notifications\MyFirstNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;

use PDF;
use Notification;
use Symfony\Component\Finder\Finder;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $order = Order::all();

        return view('admin.order',compact('order'));
    }

    public function delivered_order($id)
    {
        $order = Order::find($id);
        
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = Order::find($id);
        
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order,new MyFirstNotification($details));

        return redirect()->back();

    }

    public function search(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name','LIKE',"%$searchText%")
                            ->orWhere('phone','LIKE',"%$searchText%")
                            ->orWhere('product_name','LIKE',"%$searchText%")->get();
                            

        return view('admin.order',compact('order'));
    }
}
