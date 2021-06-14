<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function userSettings(){
        return view('users.index');
    }

    public function absence(){
        return view('absence.index');
    }

    public function listDps(){
        return view('daftar_pemilih.dps.index');
    }

    public function listStaff()
    {
        return view('superadmin.staff_employee');
    }

    public function addStaff()
    {
        return view('superadmin.add_staff');
    }

    public function detailStaff()
    {
        return view('superadmin.detail_staff');
    }
}
