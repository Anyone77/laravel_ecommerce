<?php

namespace App\Http\Controllers;


use Stripe;
use Session;

use Svg\Tag\Rect;

use Stripe\Charge;
use Stripe\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // function logout()
    // {
    //     Auth::logout();
    //     return view('');

    // }

    
    public function index()
    { 
        $products =  Products::Paginate(9);
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();

        $comment = Comment::orderBy('id','desc')->get();
        $reply = Reply::all();

        
            
        return view('home.user_page',compact('products','cart_count','id','comment','reply'));
    }

    public function redirect()
    {
        $userType = Auth::user()->usertype;

        if($userType == '1')
        {
            $total_product = Products::all()->count();
            $total_user = User::all()->count();
            $total_order = Order::all()->count();
            $order = Order::all();

            $total_price = 0;

            foreach($order as $order)
            {
                $total_price +=   $order->price * $order->quantity;
                
            }

            $order_delivered = Order::where('delivery_status','=','delivered')->get()->count();

            $order_processing = Order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_user','total_order','total_price','order_delivered','order_processing'));
        }else{
            
            $id = Auth::user()->id;
            $cart_count = cart::where('user_id',$id)->get()->count();
            $products =  Products::Paginate(9);
            $comment = Comment::all();
            $reply = Reply::all();
            
        return view('home.user_page',compact('products','comment','reply','cart_count'));
        }
    }

    public function product_detail($id)
    {
        $product = Products::find($id);
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();
      
        return view('home.product_detail',compact('product','cart_count'));
    }

    public function add_cart(Request $request, $id)
    {

        if(Auth::id()){
            
            $user = Auth::user();
            $userId = $user->id;
            $product = Products::find($id);

            

            $product_exit_id = Cart::where('product_id','=',$id)->where('user_id'
                                ,'=',$userId)->get('id')->first();

            
            
            if($product_exit_id)
            {
                $cart =Cart::find($product_exit_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

               

                if($product->discount_price != null)
                {
                    $cart->price = $product->discount_price * $cart->quantity ;
                }else{
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success('Product Add Successfully','We have added product to the cart');
               

                return redirect()->back();

            }else{

                $cart = new Cart();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_name = $product->name;

                if($product->discount_price != null)
                {
                    $cart->price = $product->discount_price * $cart->quantity  ;
                }else{
                    $cart->price = $product->price * $cart->quantity  ;
                }

                $cart->quantity = $request->quantity;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->user_id = $user->id;
    
                
                
                $cart->save();
    
                Alert::success('Product Add Successfully','We have added product to the cart');
                return redirect()->back();

            }
            


        }else{
            return redirect('login');
        }
        
    }

    public function show_cart()
    {
       $id = Auth::user()->id;
       
       $cart = cart::where('user_id',$id)->get();
       $cart_count = cart::where('user_id',$id)->get()->count();
       
       
        
        return view('home.show_cart',compact('cart','cart_count','id'));
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        Alert::success('Product remove Successfully','We have remove product from the cart');

        return redirect()->back();
    }

    public function cash_order()
    {
        $userId = Auth::user()->id;
       
       $data = cart::where('user_id',$userId)->get();

       foreach($data as $data)
       {
        $order = new order;

        $order->name = $data->name;
        $order->email = $data->email;
        $order->phone = $data->phone;
        $order->address = $data->address;
        $order->user_id = $userId;
        $order->product_name = $data->product_name;
        $order->quantity = $data->quantity;
        $order->image = $data->image;
        $order->price = $data->price;
        $order->product_id = $data->product_id;
        $order->address = $data->address;
        $order->payment_status = 'cash on delivery';
        $order->delivery_status ='processing';

        $order->save();

        $cart_id = $data->id;
        $cart  = Cart::find($cart_id);

        $cart->delete();

        

       }

       return redirect()->back()->with('message','Cash on delivery successfully, We will delivery your orders at soon.. ! Thank You....');

    }


    public function stripe($totalprice)
    {
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();
        return view('home.stripe',compact('totalprice','cart_count'));
    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        $userId = Auth::user()->id;
       
       $data = cart::where('user_id',$userId)->get();

       foreach($data as $data)
       {
        $order = new order;

        $order->name = $data->name;
        $order->email = $data->email;
        $order->phone = $data->phone;
        $order->address = $data->address;
        $order->user_id = $userId;
        $order->product_name = $data->product_name;
        $order->quantity = $data->quantity;
        $order->image = $data->image;
        $order->product_id = $data->product_id;
        $order->address = $data->address;
        $order->payment_status = 'paid';
        $order->delivery_status ='processing';
        $order->price = $data->price;

        $order->save();

       

        $cart_id = $data->id;
        $cart  = Cart::find($cart_id);

        $cart->delete();

       }

        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {

        if(Auth::id()){
            $user = Auth::user();

            $id = $user->id;
            $cart_count = cart::where('user_id',$id)->get()->count();
    
            $order = Order::where('user_id','=',$id)->get();

            return view('home.show_order',compact('id','cart_count','order'));
        }else{
            return redirect('login');
        }
       
    }

    public function cancel_order($id)
    {

        
        $order = Order::find($id);
        $order->delivery_status = 'You cancel your order';

        $order->save();

        return redirect()->back();
    }


    public function add_comment(Request $request)
    {
        if(Auth::id()){


        $name = Auth::user()->name;
        $id = Auth::user()->id;

        

           $comment = new Comment();

           $comment->name = $name;
           $comment->comment = $request->comment;
           $comment->user_id = $id;

           $comment->save();

           
           return redirect()->back();
        }else{
            return redirect('login');
        }


    }

    public function add_reply(Request $request, Comment $comment)
    {
        if(Auth::id()){


            
            
            $name = Auth::user()->name;
            $user_id = Auth::user()->id;
            
    
            
            $reply = new Reply();

            $reply->name = $name;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->user_id = $user_id;



            $reply->save();
          

               
               
               return redirect()->back();
            }else{
                return redirect('login');
            }

    }

    public function product_search(Request $request)
    {
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();

        $comment = Comment::orderBy('id','desc')->get();
        $reply = Reply::all();

        $search_text = $request->search;

        $products = Products::where('name','LIKE',"%$search_text%")->paginate(10);

        


        return view('home.user_page',compact('products','comment','reply','cart_count'));
    }

    public function all_product()
    {
        $products =  Products::Paginate(9);
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();

        $comment = Comment::orderBy('id','desc')->get();
        $reply = Reply::all();

        
            
        return view('home.all_product',compact('products','cart_count','id','comment','reply'));

    }

    
    public function all_product_search(Request $request)
    {
        $id = Auth::user()->id;
        $cart_count = cart::where('user_id',$id)->get()->count();

        $comment = Comment::orderBy('id','desc')->get();
        $reply = Reply::all();

        $search_text = $request->search;

        $products = Products::where('name','LIKE',"%$search_text%")->paginate(10);

        


        return view('home.all_product',compact('products','comment','reply','cart_count'));
    }



    public function myNotification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }


        return view('my-notification');
    }


}
