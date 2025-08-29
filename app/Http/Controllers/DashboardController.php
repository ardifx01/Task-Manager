<?php 

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if (Auth::user()->is_role == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::user()->is_role == 'user') {
            return view('user.dashboard');
        }
    }

    public function index()
    {
        // Ambil task yang ditugaskan ke user login
        $tasks = Task::where('assigned_to', Auth::id())->get();

        return view('user.dashboard', compact('tasks'));
    }
}


?>