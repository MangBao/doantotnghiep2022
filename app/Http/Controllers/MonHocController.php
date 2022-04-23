<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoMon;
use App\Models\MonHoc;

class MonHocController extends Controller
{
    private $bomon;
    private $monhoc;
    private $htmlOptionBoMon;

    public function __construct(MonHoc $monhoc, BoMon $bomon) {
        $this->monhoc = $monhoc;
        $this->bomon = $bomon;
        $this->htmlOptionBoMon = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = $this->monhoc::latest()->paginate(10);
        $bms = $this->bomon::all();
        $i = 1;

        foreach($mhs as $mh){
            foreach($bms as $bm){
                if($mh->bomon_id == $bm->bomon_id){
                    $mh->tenbomon = $bm->tenbomon;
                }
            }
        }

        return view('monhoc.index',[
            'mhs' => $mhs,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bms = $this->bomon::all();

        foreach($bms as $bm){
            $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'">'.$bm->tenbomon.'</option>';
        }

        return view('monhoc.create',[
            'bms' => $bms,
            'htmlOptionBoMon' => $this->htmlOptionBoMon,
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
        $this->monhoc->create([
            'monhoc_id' => $request->monhoc_id,
            'tenmonhoc' => $request->tenmonhoc,
            'bomon_id' => $request->bomon_id,
        ]);

        return redirect()->route('monhoc.index')->with('success', 'Thêm môn học thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mh = $this->monhoc::find($id);
        $bms = $this->bomon::all();

        foreach($bms as $bm){
            if($mh->bomon_id == $bm->bomon_id){
                $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'" selected>'.$bm->tenbomon.'</option>';
            }
            else{
                $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'">'.$bm->tenbomon.'</option>';
            }
        }

        return view('monhoc.edit',[
            'mh' => $mh,
            'htmlOptionBoMon' => $this->htmlOptionBoMon,
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
        $this->monhoc->find($id)->update([
            'monhoc_id' => $request->monhoc_id,
            'tenmonhoc' => $request->tenmonhoc,
            'bomon_id' => $request->bomon_id,
        ]);
        return redirect()->route('monhoc.index')->with('success', 'Cập nhật môn học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->monhoc->find($id)->delete();
        return redirect()->route('monhoc.index')->with('success', 'Xóa môn học thành công');
    }
}
