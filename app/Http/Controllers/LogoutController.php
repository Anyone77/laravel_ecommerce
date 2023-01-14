<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Products;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    

    function logout()
    {
        Auth::logout();
        
        $products =  Products::Paginate(9);
        $comment = Comment::all();
        $reply = Reply::all();
        return view('home.user_page',compact('products','comment','reply'));
        

    }
}
