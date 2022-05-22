<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function dashboardAdmin() {
        return view('admin.index');
    }

    public function application() {
        $data = $this->getApplicants();
        return view('admin.applications', ['data' => $data]);
    }

    public function login(Request $request) {
        $username = $request->all('username');
        $password = $request->all('password');
        $data = AdminModel::login($username, $password);
        
        if ($data) {
            return redirect('/admin');
        }
        return view('admin.login', ['error' => 'Invalid Username or Password!']);
    }

    public function getApplicants() {
        $data = AdminModel::getApplications()->all();
        return $data;
    }

    public function updateVerified(Request $request) {
        $id = $request->all('id');
        $affected = AdminModel::updateVerified($id['id']);
        if ($affected) {
            return redirect()->route('applications', ['success' => 200]);
        } else {
            return redirect()->route('applications', ['fail' => 400]);
        }
        
    }
}
