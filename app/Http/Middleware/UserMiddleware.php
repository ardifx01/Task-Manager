<?php 

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::User()->is_role === 'user') {
                return $next($request);
            }else{
                Auth::logout();
                return redirect(url('login'))->with('error', 'You must be logged in as a user to access this page.');
            }
        }else {
            Auth::logout();
            return redirect(url('login'))->with('error', 'You must be logged in as a user to access this page.');
        }
    }

}
?>