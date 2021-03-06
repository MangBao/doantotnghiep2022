<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Routes;
use App\Models\Permission;
use App\Models\Roles;

class QuanLyRoutesController extends Controller
{
    private $routes;
    private $permission;
    private $roles;
    private $htmlOptionRole;
    private $htmlOptionRoute;

    public function __construct(Routes $routes, Permission $permission, Roles $roles) {
        $this->routes = $routes;
        $this->permission = $permission;
        $this->roles = $roles;
        $this->htmlOptionRole = '';
        $this->htmlOptionRoute = '';
        $this->middleware('auth');
        $this->middleware('sinhvien');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->param) {
            $routes = $this->routes->join('permission', 'permission.route_id', '=', 'routes.id')
                                ->join('roles', 'roles.id', '=', 'permission.role_id')
                                ->where('routes.route_title', 'like', '%' . $request->param . '%')
                                ->orWhere('roles.role_name', 'like', '%' . $request->param . '%')
                                ->orderBy('roles.id', 'asc')->paginate(250);
        }
        else {
            $routes = $this->routes->join('permission', 'permission.route_id', '=', 'routes.id')
                                ->join('roles', 'roles.id', '=', 'permission.role_id')
                                ->orderBy('roles.id', 'asc')->paginate(10);
        }
        // dd($routes);
        // $routes = \DB::select('select * from roles r, permission p, routes rt where r.id = p.role_id and p.route_id = rt.id order by r.id');
        return view('quanlyroutes.index', ['route' => $routes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles->all();
        $routes = $this->routes->all();
        $i = 1;
        foreach ($routes as $route) {
            $this->htmlOptionRoute .= '<option value="' . $route->id . '">' . $i++ . ' . ' . $route->route_title . '</option>';
        }
        foreach ($roles as $role) {
            $this->htmlOptionRole .= '<option value="' . $role->id . '">' . $role->role_name . '</option>';
        }
        return view('quanlyroutes.create', [
            'htmlOptionRole' => $this->htmlOptionRole,
            'htmlOptionRoute' => $this->htmlOptionRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = $this->permission
                    ->join('routes', 'routes.id', '=', 'permission.route_id')
                    ->join('roles', 'roles.id', '=', 'permission.role_id')
                    ->where('role_id', $request->role_id)
                    ->where('route_id', $request->route_id)->first();

        if($permission) {
            $permission->toArray();
            return redirect()->route('quanlyroutes.create')->with('error', 'Quy???n '.$permission['role_name'].' truy c???p v??o route '.$permission['route_title'].' n??y ???? t???n t???i');
        }

        $this->permission->create([
            'role_id' => $request->role_id,
            'route_id' => $request->route_id,
            'status' => 1,
        ]);

        return redirect()->route('quanlyroutes.index')->with('success', 'Th??m m???i th??nh c??ng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blocking($role_id, $route_id)
    {
        $permission = $this->permission->where('role_id', $role_id)->where('route_id', $route_id)->get();
        // dd($permission);
        if($permission[0]->status == 1) {
            $this->permission->where('role_id', $role_id)->where('route_id', $route_id)->update(['status' => 0]);
            return redirect()->route('quanlyroutes.index')->with('success', '???? ch???n quy???n truy c???p');

        } else {
            $this->permission->where('role_id', $role_id)->where('route_id', $route_id)->update(['status' => 1]);
            return redirect()->route('quanlyroutes.index')->with('success', '???? m??? quy???n truy c???p');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($role_id, $route_id)
    {
        $this->permission->where('role_id', $role_id)->where('route_id', $route_id)->delete();
        return redirect()->route('quanlyroutes.index')->with('success', 'X??a th??nh c??ng');
    }
}
