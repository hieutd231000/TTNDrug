<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request) {
        return view("admin.page.payments.index");
    }

    public function addPaymentForm(Request $request) {
        return view("admin.page.payments.add");
    }

    public function patientInvoice(Request $request) {
        return view("admin.page.payments.invoice");
    }
}
