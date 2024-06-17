<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $title = "Beranda | SMK AL - HUSNA";
        return view('front_end.beranda')
        ->with('title', $title);
    }
}
