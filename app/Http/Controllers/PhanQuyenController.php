<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class PhanQuyenController extends Controller
{
    private $role;

    public function __construct(Roles $roles) {
        $this->role = $roles;
        $this->middleware('auth');
        $this->middleware('sinhvien');
    }

    public function index()
    {
        $roles = $this->role->orderBy('id', 'asc')->paginate(8);
        $i = 1;
        return view('phanquyen.index', [
            'quyen' => $roles,
            'i' => $i
        ]);
    }

    public function create()
    {
        return view('phanquyen.create');
    }

    public function store(Request $request)
    {
        $role_name = $this->role->where('role_name', $request->role_name)->first();
        if($role_name) {
            return redirect()->route('phanquyen.create')->with('error', 'Tên quyền đã tồn tại');
        }
        $this->role->create([
            'role_name' => $request->role_name
        ]);

        return redirect()->route('phanquyen.index')->with('success', 'Thêm quyền thành công');
    }

    public function delete($id)
    {
        $role = $this->role->find($id)->toArray();
        if($role['id'] == '1') {
            return redirect()->route('phanquyen.index')->with('error', 'Không thể xóa quyền admin');
        }
        $this->role->find($id)->delete();
        return redirect()->route('phanquyen.index');
    }
}
