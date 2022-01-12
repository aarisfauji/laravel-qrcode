<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.home.index', ['users' => $users]);
    }
}
