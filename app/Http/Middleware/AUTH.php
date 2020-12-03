<?php
namespace App\Http\Middleware;
use App;
use Closure;
use Auth as User;
class AUTH
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $_USER = User::user();
        if($_USER == null) return redirect()->route("auth.getlogin",['goto' => $request->fullUrl()]);
        return $next($request);
    }
}
