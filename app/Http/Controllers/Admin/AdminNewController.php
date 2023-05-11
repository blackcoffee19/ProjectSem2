<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.pages.News.index', compact('news'));
    }

    public function create()
    {
        return view('admin.pages.News.create');
    }

    public function store(Request $request)
    {
        News::create($request->all());

        return redirect('admin/new')->with('success', 'Bạn đã thêm 1 thông báo mới');
    }

    public function edit(News $id_news)
    {
        return view('admin.pages.News.update', compact('id_news'));
    }

    public function update(Request $request, $id_news)
    {
        $news = News::findOrFail($id_news);

        $news->order_code   = $request->input('order_code');
        $news->title        = $request->input('title');
        $news->id_user      = $request->input('id_user');
        $news->link         = $request->input('link');
        $news->attr         = $request->input('attr');
        $news->send_admin   = $request->input('send_admin');
        // $news->created_at = $request->input('created_at');
        // $news->updated_at = $request->input('updated_at');

        $news->save();

        return redirect()->route('adminNew')->with('success', 'Cập nhật thông báo thành công');
    }


    public function delete($id_news)
    {
        News::find($id_news)->delete();
        return redirect()->route('adminNew')->with('success', 'Xoá thông báo thành công');
    }
}
