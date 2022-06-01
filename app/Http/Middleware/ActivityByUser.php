<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\GiangVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActivityByUser
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
        if (Auth::check()) {
            $permission_user = \DB::select('SELECT * FROM users u, permission p, routes r WHERE u.role_id = p.role_id AND p.route_id = r.id AND p.status = 1 AND u.id = '.Auth::id().' AND NOT r.route_name = "tinnhan.index"');
            // dd($permission_user);
            $route_name = [];
            foreach ($permission_user as $pu) {
                $routeindex = explode(".", $pu->route_name);
                for($i = 0; $i < count($routeindex); $i++) {
                    if($routeindex[1] == 'index') {
                        array_push($route_name, $pu->route_name);
                        break;
                    }
                }
            }
            Auth::user()->route_name = $route_name;

            GiangVien::find(Auth::user()->id)->update([
                'trangthaihoatdong' => 1,
            ]);
            // dd(Auth::user()->route_name);
        }
        return $next($request);
    }
}
