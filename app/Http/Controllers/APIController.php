<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    // get products
    public function products(Request $request)
    {
        $query = DB::table('products')->get();
        return response()->json(["products" => $query]);
    }
}
