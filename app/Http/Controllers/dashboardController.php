<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class dashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }
}

