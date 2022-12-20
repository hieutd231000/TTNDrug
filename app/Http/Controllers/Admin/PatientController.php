<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request) {
        return view("admin.page.patients.index");
    }

    public function addPatientForm(Request $request) {
        return view("admin.page.patients.add");
    }

    public function patientProfile(Request $request) {
        return view("admin.page.patients.profile");
    }
}
