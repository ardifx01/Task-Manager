<?php 

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::User()->is_role === 'admin') {
                return $next($request);
            }else{
                Auth::logout();
                return redirect(url('login'))->with('error', 'You must be logged in as a admin to access this page.');
            }
        }else {
            Auth::logout();
            return redirect(url('login'))->with('error', 'You must be logged in as a admin to access this page.');
        }
    }

}
?>