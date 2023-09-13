<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrameController extends Controller
{
    public function leftFrameDisplay() {
        $categories = DB::table('categories')->get();

        return view('leftFrame', compact('categories'));
    }

    public function middleFrameDisplay() {
        $result = DB::table('products')
        ->whereIn('ProductID', [2, 6, 12])
        ->get();

        return view('middleFrame', compact('result'));
    }
}
