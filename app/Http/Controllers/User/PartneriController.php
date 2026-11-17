<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Partner;

class PartneriController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('home.partners', compact('partners'));
    }
}
