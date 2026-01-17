<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
    $role = Auth::user()->role;

    if ($role === 'admin') {
        return view('dashboardadmin');
    } elseif ($role === 'kepsek') {
        return view('dashboardkepsek');
    } elseif ($role === 'staf') {
        return view('dashboardstaf');
    }

    abort(403);
    }

}
