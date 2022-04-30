<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role_id = Auth::user()->role_id;
		//Lay route name tu link
		$routeName = Route::currentRouteName();
		$route     = DB::table('routes')->where('route_name', $routeName)->get();
		// echo $routeName;
		if ($route != null && count($route) > 0) {
			$route_id = $route[0]->id;
			// echo $route_id;

			$permission = DB::table('permission')->where('route_id', $route_id)->where('role_id', $role_id)->get();
			// echo $route_id.'-'.$role_id;
			// var_dump($permission);
			if ($permission != null && count($permission) > 0) {
				if ($permission[0]->status == 0) {
					return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào chức năng này');
				}
			} else {
				return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào chức năng này');
			}
		}

		return $next($request);
    }
}
