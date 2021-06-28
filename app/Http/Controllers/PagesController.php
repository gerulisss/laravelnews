<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index()
    {
       $latestposts = Post::latest()->first();
    
       return view('index')->with('latestposts', $latestposts);
    }
}
