<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function Home() {
        return view('frontend.home');
    }

    public function Shop() {
        return view('frontend.shop');
    }

    public function Product() {
        return view('frontend.product');
    }

    public function News() {
        return view('frontend.news');
    }

    public function Article() {
        return view('frontend.news-detail');
    }

    public function Search() {
        return view('frontend.search');
    }

}
