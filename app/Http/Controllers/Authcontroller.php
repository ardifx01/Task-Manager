<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function register()
    {
        $data['meta_title'] = 'Register';
        return view('loginform.register', $data);
    }

    public function register_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'is_role' => 'required|in:user,admin',
        ]);

        $user = new User();
        $user->name           = trim($request->name);
        $user->email          = trim($request->email);   
        $user->password       = Hash::make($request->password);
        $user->is_role        = trim($request->is_role);
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('login')->with('success','Registration successful, please login.');
    }
    public function index()
    {
        return view('loginform.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt(['email' => $request -> email, 'password' => $request -> password], true)) {
            if (Auth::User()-> is_role == 'admin'){
                return redirect()->intended('admin/dashboard');
            }else if (Auth::User()-> is_role == 'user') {
                return redirect()->intended('user/dashboard');
            }else {
                return redirect('login')->with('error', 'No Availabels email or password, please check and try again.');
            }
        }else {
            return redirect()->back()->with('error', 'Pleasere check your credentials and try again.');
        }
    }

    public function login()
    {
        return view('loginform.login');
    }

    public function logout()
        {
            Auth::logout();
            return redirect('/login')->with('success', 'Anda berhasil logout.');
        }

}
?>