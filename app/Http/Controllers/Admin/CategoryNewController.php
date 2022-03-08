<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewCategory;
use Illuminate\Support\Facades\Session;

class CategoryNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryNews = NewCategory::orderByDesc('id')->paginate(10);
        $title = 'Danh sách thể loại tin tức';
        return view('admin.news.categoryNews.list', compact('title', 'categoryNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Thêm thể loại tin tức';
        return view('admin.news.categoryNews.add', compact('title'));
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
            NewCategory::create($request->all());
            Session::flash('success', 'Thêm thể loại thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình thêm thể loại, bạn thử lại sau');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NewCategory $categorynew)
    {
        $title = 'Thêm thể loại tin tức';
        $categoryNews = NewCategory::firstOrFail();
        return view('admin.news.categoryNews.edit', compact('title', 'categorynew', 'categoryNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewCategory $categorynew)
    {
        try {
            $categorynew->name = $request->name;
            $categorynew->active = $request->active;
            $categorynew->save();
            Session::flash('success', 'Cập nhật thể loại thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Có lỗi trong quá trình cập nhật thể laoij, bạn thử lại sau');
        }
        return redirect()->route('listCategoryNew');
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
        $categorynew = NewCategory::where('id', $id)->first();
        if ($categorynew) {
            $categorynew->delete();
        }

        if ($categorynew) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công thể loại'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
