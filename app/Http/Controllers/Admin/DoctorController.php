<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request) {
        return view("admin.page.doctors.index");
    }

    public function addDoctorForm(Request $request) {
        return view("admin.page.doctors.add");
    }

    public function doctorProfile(Request $request) {
        return view("admin.page.doctors.profile");
    }

    public function doctorCalendar(Request $request) {
        return view("admin.page.doctors.calendar");
    }
}
