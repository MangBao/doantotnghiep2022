<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;


class KhoaController extends Controller
{
    private $khoa;

    public function __construct(Khoa $khoa) {
        $this->khoa = $khoa;
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('sinhvien');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoas = $this->khoa->orderBy('khoa_id', 'asc')->paginate(8);
        $i = 1;

        return view('khoa.index', [
            'ks' => $khoas,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khoa = $this->khoa::all();
        foreach($khoa as $k){
            if($k->khoa_id == $request->khoa_id){
                return redirect()->route('khoa.create')->with('error', 'Khoa đã tồn tại');
            }
        }
        $this->khoa->create([
            'khoa_id' => $request->khoa_id,
            'tenkhoa' => $request->tenkhoa,
        ]);
        return redirect()->route('khoa.index')->with('success', 'Thêm khoa thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khoa = $this->khoa->where('khoa_id', $id)->first();

        return view('khoa.edit', [
            'k' => $khoa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->khoa->where('khoa_id', $id)->update([
            'khoa_id' => $request->khoa_id,
            'tenkhoa' => $request->tenkhoa,
        ]);

        return redirect()->route('khoa.index')->with('success', 'Cập nhật khoa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->khoa->where('khoa_id', $id)->delete();
        return redirect()->route('khoa.index')->with('success', 'Xóa thành công');
    }
}
