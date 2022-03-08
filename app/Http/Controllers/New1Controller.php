<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\KindNew;
use Illuminate\Http\Request;
use App\Models\NNew;
use App\Models\NewCategory;

class New1Controller extends Controller
{

    public function __construct()
    {
        $categoryNews = NewCategory::all();
        view()->share('categoryNews', $categoryNews);
    }

    public function categoryNews()
    {
        $title = 'Thể loại tin tức';
        return view('news.categoryNews', compact('title'));
    }

    public function kindNews($id)
    {
        $title = 'Loại tin tức';
        $kindNews = KindNew::find($id);
        $news = NNew::where('kind_id', $id)->paginate(5);
        return view('news.kindNews', compact('title', 'kindNews', 'news'));
    }

    public function news($id)
    {
        $title = 'Tin tức';
        $news = NNew::find($id);
        $highlightNews = NNew::where('hightlight', 1)->take(4)->get();
        $moreNews = NNew::where('kind_id', $news->kind_id)->take(4)->get();
        return view('news.news', compact('title', 'news', 'highlightNews', 'moreNews'));
    }

    public function postComment($id, Request $request)
    {
        try {
            $idtintuc = $id;
            $comment = new Comment;
            $comment->new_id = $idtintuc;
            $comment->name = $request->name;
            $comment->content = $request->content;
            $comment->save();
        } catch (\Exception $err) {
            dd($id);
        }

        return redirect("/news/$id");
    }

    public function contact()
    {
        $title = 'Liên hệ';
        return view('contact', compact('title'));
    }

    public function about()
    {
        $title = 'Chúng tôi';
        return view('about', compact('title'));
    }
}
