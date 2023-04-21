<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request) {
        return view("admin.page.suppliers.index");
    }

    public function addPatientForm(Request $request) {
        return view("admin.page.suppliers.add");
    }

    public function patientProfile(Request $request) {
        return view("admin.page.suppliers.profile");
    }
}
