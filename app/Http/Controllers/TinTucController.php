<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TinTuc;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TinTucController extends Controller
{
    private $tintuc;

    public function __construct(TinTuc $tintuc) {
        $this->tintuc = $tintuc;
        $this->middleware('auth');
        $this->middleware('sinhvien');
    }

    public function index(Request $request)
    {
        if($request->param) {
            $tintuc = $this->tintuc->where('title', 'like', '%' . $request->param . '%')
                            ->orWhere('heading1', 'like', '%' . $request->param . '%')
                            ->orWhere('content1', 'like', '%' . $request->param . '%')
                            ->orWhere('heading2', 'like', '%' . $request->param . '%')
                            ->orWhere('content2', 'like', '%' . $request->param . '%')
                            ->orWhere('heading3', 'like', '%' . $request->param . '%')
                            ->orWhere('content3', 'like', '%' . $request->param . '%')
                            ->orderBy('created_at', 'desc')->paginate(8);
        } else {
            $tintuc = $this->tintuc->orderBy('created_at', 'desc')->paginate(8);
        }

        $i = 1;

        if(count($tintuc) > 0) {
            return view('tintuc.index', [
                'tts' => $tintuc,
                'i' => $i
            ]);
        } else {
            return view('tintuc.index', [
                'tts' => $tintuc,
                'notification' => 'Không có tin tức nào'
            ]);
        }
    }

    public function create()
    {
        return view('tintuc.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content1' => 'required',
            'heading1' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf,doc,docx,ppt,pptx,zip,rar,7z|max:2048'
        ]);

        if($request->image1){
            $image1 = $request->image1;
            $image1_name = $image1->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image1, $image1_name);
        }
        else{
            $image1_name = 'default.png';
        }

        if($request->image2){
            $image2 = $request->image2;
            $image2_name = $image2->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image2, $image2_name);
        }
        else{
            $image2_name = '';
        }

        if($request->image3){
            $image3 = $request->image3;
            $image3_name = $image3->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image3, $image3_name);
        }
        else{
            $image3_name = '';
        }

        $file_name = array();
        if($request->filesupload){
            foreach($request->filesupload as $file){
                array_push($file_name, $file->getClientOriginalName());
                Storage::disk('public')->putFileAs('files', $file, $file->getClientOriginalName());
            }
        }
        else{
            $file_name = '';
        }

        // json_encode($file_name)

        // dd();

        $this->tintuc->create([
            'title' => $request->title,
            'heading1' => $request->heading1,
            'heading2' => $request->heading2,
            'heading3' => $request->heading3,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'image1' => $image1_name,
            'image2' => $image2_name,
            'image3' => $image3_name,
            'files' => json_encode($file_name),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('tintuc.index')->with('success', 'Thêm tin tức thành công');
    }

    public function delete($id)
    {
        $this->tintuc->find($id)->delete();

        return redirect()->route('tintuc.index')->with('success', 'Xóa tin tức thành công');
    }

    public function edit($id)
    {
        $tintuc = $this->tintuc->find($id)->first();

        return view('tintuc.edit', [
            'tts' => $tintuc
        ]);
    }

    public function update(Request $request, $id)
    {
        $img = $this->tintuc->find($id)->first();

        if($request->image1){
            $image1 = $request->image1;
            $image1_name = $image1->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image1, $image1_name);
        }
        else{
            $image1_name = $img->image1;
        }

        if($request->image2){
            $image2 = $request->image2;
            $image2_name = $image2->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image2, $image2_name);
        }
        else{
            $image2_name = $img->image2;
        }

        if($request->image3){
            $image3 = $request->image3;
            $image3_name = $image3->getClientOriginalName();
            Storage::disk('public')->putFileAs('images/tintuc', $image3, $image3_name);
        }
        else{
            $image3_name = $img->image3;
        }
        $this->tintuc->find($id)->update([
            'title' => $request->title,
            'heading1' => $request->heading1,
            'heading2' => $request->heading2,
            'heading3' => $request->heading3,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'image1' => $image1_name,
            'image2' => $image2_name,
            'image3' => $image3_name,
        ]);

        return redirect()->route('tintuc.index')->with('success', 'Cập nhật tin tức thành công');
    }

}
