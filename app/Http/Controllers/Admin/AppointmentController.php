<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function addAppointmentForm(Request $request) {
        return view("admin.page.appointments.add");
    }
}
