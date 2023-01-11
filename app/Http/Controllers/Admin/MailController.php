<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(Request $request) {
        return view("admin.page.mailbox.mailbox");
    }

    public function compose(Request $request) {
        return view("admin.page.mailbox.compose");
    }

    public function read(Request $request) {
        return view("admin.page.mailbox.readmail");
    }
}
