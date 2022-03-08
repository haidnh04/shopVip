<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewCategory;
use App\Models\KindNew;
use Illuminate\Support\Facades\Session;


class KindNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kindNews = KindNew::with('categoryNews')->orderByDesc('id')->paginate(10);
        $title = 'Danh sách loại tin tức';
        return view('admin.news.kindNews.list', compact('title', 'kindNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm loại tin tức';
        $categoryNews = NewCategory::get();
        return view('admin.news.kindNews.add', compact('title', 'categoryNews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            KindNew::create($request->all());
            Session::flash('success', 'Thêm loại tin tức thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình thêm loại tin tức, bạn thử lại sau');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KindNew $kindnew)
    {
        $title = 'Thêm thể loại tin tức';
        $kindNews = KindNew::firstOrFail();
        $categoryNews = NewCategory::where('active', 1)->get();
        return view('admin.news.kindNews.edit', compact('title', 'kindnew', 'kindNews', 'categoryNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KindNew $kindnew)
    {
        try {
            $kindnew->name = $request->name;
            $kindnew->category_id =  $request->category_id;
            $kindnew->active = $request->active;
            $kindnew->save();
            Session::flash('success', 'Cập nhật loại tin tức thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Có lỗi trong quá trình cập nhật loại tin tức, bạn thử lại sau');
        }
        return redirect()->route('listKindNew');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $kindnew = KindNew::where('id', $id)->first();
        if ($kindnew) {
            $kindnew->delete();
        }

        if ($kindnew) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công loại tin tức'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
