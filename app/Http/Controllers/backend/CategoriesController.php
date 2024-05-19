<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function addCategory() {
        return view('backend.add-category');
    }

    public function addCategorySubmit(Request $request) {}
}
