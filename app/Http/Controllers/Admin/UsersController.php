<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $tab = request('tab', 'students');
        return view('dashboard.admin.users.users', compact('tab')); 
    }
    
}
