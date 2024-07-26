<?php

namespace App\Http\Controllers\dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashbordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index()
    {
        return view('dashboards.index');
    }
}
