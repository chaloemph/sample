<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paymentbanking;
use App\Blog;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = DB::select('select * from blogs where 1 order by id desc');
        return view('home', compact('blogs'));
    }

    public function about()
    {
        $about_imgs = [
            'aboutus-1.jpg',
            'aboutus-2.jpg',
            'aboutus-3.jpg',
            'aboutus-4.jpg',
            'aboutus-5.jpg',
            'aboutus-6.jpg',
            'aboutus-7.jpg',
            'aboutus-8.jpg',
    ];
        return view('about', compact('about_imgs'));
    }

    public function payment()
    {
        $banks = Paymentbanking::all();
        return view('payment',compact('banks'));
    }
}
