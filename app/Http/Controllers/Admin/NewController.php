<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NNew;
use App\Models\NewCategory;
use App\Models\KindNew;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NNew::orderByDesc('id')->paginate(10);
        $title = 'Danh sách tin tức';
        $categoryNews = NewCategory::get();
        $kindNews = KindNew::get();
        return view('admin.news.news.list', compact('title', 'news', 'categoryNews', 'kindNews'));
    }

    public function changeActive(Request $request)
    {
        $user = NNew::find($request->news_id);
        $user->active = $request->active;
        $user->save();
        return redirect()->route('listNew');
    }


    public function changeHightlight(Request $request)
    {
        $user = NNew::find($request->news_id);
        $user->hightlight = $request->hightlight;
        $user->save();
        return redirect()->route('listNew');
    }

    public function nNewCount(NNew $nnews)
    {
        $Key = 'blog' . $nnews->id;
        if (Session::has($Key)) {
            DB::table('n_news')
                ->where('id', $nnews->id)
                ->increment('view', 1);
            Session::put($Key, 1);
        }
        // Write your code which you want
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm tin tức';
        $categoryNews = NewCategory::get();
        $kindNews = KindNew::get();
        return view('admin.news.news.add', compact('title', 'categoryNews', 'kindNews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        try {
            NNew::create($request->all());
            Session::flash('success', 'Thêm tin tức thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi trong quá trình thêm tin tức, bạn thử lại sau');
        }
        return redirect()->route('listNew');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NNew $new)
    {
        $title = 'Thêm thể loại tin tức';
        $news = NNew::firstOrFail();
        $categoryNews = NewCategory::where('active', 1)->get();
        $kindNews = KindNew::where('active', 1)->get();
        // $comments = Comment::orderByDesc('id')->get();
        return view('admin.news.news.edit', compact('title', 'new', 'news', 'categoryNews', 'kindNews'));
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
    public function update(UpdateNewsRequest $request, NNew $new)
    {
        try {
            $new->name = $request->name;
            $new->summary = $request->summary;
            $new->content = $request->content;
            $new->file = $request->file;
            $new->hightlight = $request->hightlight;
            $new->kind_id = $request->kind_id;
            $new->active = $request->active;
            $new->save();
            Session::flash('success', 'Cập nhật tin tức thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Có lỗi trong quá trình cập nhậttin tức, bạn thử lại sau');
        }
        return redirect()->route('listNew');
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
        $new = NNew::where('id', $id)->first();
        if ($new) {
            $new->delete();
        }

        if ($new) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tin tức'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }


    public function destroy1(Request $request)
    {
        $id = $request->id;
        $comment = Comment::where('id', $id)->first();
        if ($comment) {
            $comment->delete();
        }

        if ($comment) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bình luận'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
