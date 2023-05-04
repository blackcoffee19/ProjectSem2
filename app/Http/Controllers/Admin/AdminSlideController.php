<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;


class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.pages.Slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.pages.Slide.create');
    }

    public function store(Request $request)
    {
        $item = $request->all();

        if ($request->hasFile('photo')) { // kiểm tra xem có file hình tồn tại chưa
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                return redirect('admin/slider');
            }
            $imageFile = $file->getClientOriginalName();
            $file->move("images/slider", $imageFile);
        } else {
            $imageFile = null;
        }

        $item['image'] = $imageFile;
        Slide::create($item);
        return redirect('admin/slides');
    }

    public function show(Slide $id_slide)
    {
        return view('admin.pages.Slide.detail', compact('id_slide'));
    }

    public function edit(Slide $id_slide)
    {
        return view('admin.pages.Slide.update', compact('id_slide'));
    }

    public function update(Request $request, $id_slide)
    {
        $slides = Slide::findOrFail($id_slide);
        $slides->title         = $request->input('title');
        $slides->title_color   = $request->input('title_color');
        $slides->content       = $request->input('content');
        $slides->content_color = $request->input('content_color');
        $slides->btn_content   = $request->input('btn_content');
        $slides->btn_bg_color  = $request->input('btn_bg_color');
        $slides->btn_color     = $request->input('btn_color');
        $slides->alert         = $request->input('alert');
        $slides->alert_color   = $request->input('alert_color');
        $slides->alert_bg      = $request->input('alert_bg');
        $slides->link          = $request->input('link');
        $slides->attr          = $request->input('attr');

        if ($request->hasFile('photo')) {
            // Xóa hình ảnh hiện tại của sản phẩm
            // unlink(public_path('images/category/' . $cats->image));

            // Lưu tệp tin mới vào thư mục lưu trữ hình ảnh
            $file = $request->file('photo');
            // $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('images/slider', $filename);

            // Cập nhật tên tệp tin mới cho sản phẩm
            $slides->image = $filename;
        }

        $slides->save();

        return redirect()->route('adminSlides');
        // return view('admin.pages.Banner.update', compact('id_banner'));
    }

    public function delete($id_slide)
    {
        Slide::find($id_slide)->delete();
        return redirect()->route('adminSlides');
    }
}
