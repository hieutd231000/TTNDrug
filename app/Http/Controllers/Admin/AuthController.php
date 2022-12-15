<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginAdminForm(Request $request) {
        return view("auth.admin.login");
    }
}
