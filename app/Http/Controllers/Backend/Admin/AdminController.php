<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard() {
        return view('admin.admin');
    }

    // admin login method;
    public function login() {
        return view('admin.login.login');
    }
}
