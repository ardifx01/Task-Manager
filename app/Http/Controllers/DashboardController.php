<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::User()-> is_role == 'admin'){
            return view('admin.dashboard');
        }else if(Auth::User()-> is_role == 'user'){
            return view('user.dashboard');
        }
    }
}


?>