<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case 'ADMIN':
                return redirect()->route('admin.index');
                break;
            case 'CLIENT':
                return redirect()->route('client.index');
                break;
            default:
                return redirect("/");
                break;
        }
    }
}
