<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    //     $ads = Advertisement::latest()->where('user_id', auth()->user()->id)->get();
    //     // dd($ads);
        return view('backend.dashboard.index'); // , compact('ads')
    }
}
