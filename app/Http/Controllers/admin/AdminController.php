<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Admin\AdminModel;
use App\Http\Controllers\Controller;
use App\Mail\ApplicationVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
            $request->session()->put('admin', 'active');
            return redirect('/admin');
        }
        return view('admin.login', ['error' => 'Invalid Username or Password!']);
    }

    public function getApplicants() {
        //get the data of apllicants
        $data = AdminModel::getApplications()->all();
        return $data;
    }

    public function updateVerified(Request $request) {
        $id = $request->all('id');
        $email = AdminModel::get_applicant_email($id);
        $affected = AdminModel::updateVerified($id['id']);
        if ($affected) {
            //email here
            Mail::to($email)->send(new ApplicationVerification());
            return redirect()->route('applications', ['success' => 200]);
        } else {
            return redirect()->route('applications', ['fail' => 400]);
        }
        
    }

    //logout function
    public function admin_logout(Request $request){
        if(Session::has('admin')){
            $request->session()->forget('admin');
            return redirect('/admin/login');
        }
    }
}
