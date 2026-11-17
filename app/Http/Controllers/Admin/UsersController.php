<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class UsersController extends Controller
{
    public function index()
    {
        $partners = Partner::query()
        ->with('user:id,name,surname,email')->latest()->paginate(10);
        return view('dashboard.admin.users.users', compact('partners')); 
    }
    
}
