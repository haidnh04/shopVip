<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\todoList;
use DB;
use Illuminate\Support\Facades\Log;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Trang chủ quản trị viên";
        //Tổng số đơn hàng hôm nay
        $cartsToday = Cart::whereRaw('DATE(created_at) = CURDATE()')->count('created_at');
        $cartsToday = number_format($cartsToday);

        //Tổng số đơn hàng hôm qua
        $cartsBeforeDate = Cart::whereDate('created_at', '=', Carbon::now()->subDay(1))->count('created_at');
        $cartsBeforeDate = number_format($cartsBeforeDate);

        //Tổng số đơn hàng tuần này
        $cartsWeek = Cart::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count('created_at');
        $cartsWeek = number_format($cartsWeek);

        //Tổng số đơn hàng tháng này
        $currentMonth = date('m');
        $cartsMonth = Cart::whereRaw('MONTH(created_at) = ?', [$currentMonth])->count('created_at');
        $cartsMonth = number_format($cartsMonth);

        //Tổng số đơn hàng năm này
        $cartsYear = Cart::whereYear('created_at', now()->year)->count('created_at');
        $cartsYear = number_format($cartsYear);

        //Tổng số đơn hàng từ trước đến nay
        $carts = Cart::all();
        $resultAllCarts = count($carts);
        $resultAllCarts = number_format($resultAllCarts);

        // =====================================================================================
        //Tổng số tiền hôm nay
        $moneyToday = Cart::whereRaw('DATE(created_at) = CURDATE()')->sum('price');
        $moneyToday = number_format($moneyToday);

        //Tổng số tiền hôm qua
        $moneyBeforeDate = Cart::whereDate('created_at', '=', Carbon::now()->subDay(1))->sum('price');
        $moneyBeforeDate = number_format($moneyBeforeDate);

        //Tổng số tiền tuần này
        $moneyWeek = Cart::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
        $moneyWeek = number_format($moneyWeek);

        //Tổng số tiền tháng này
        $moneyMonth = Cart::whereRaw('MONTH(created_at) = ?', [$currentMonth])->sum('price');
        $moneyMonth = number_format($moneyMonth);

        //Tổng số tiền năm này
        $moneyYear = Cart::whereYear('created_at', now()->year)->sum('price');
        $moneyYear = number_format($moneyYear);

        //Tổng số tiền từ trước đến nay
        $moneyAllCarts = Cart::sum('price');
        $moneyAllCarts = number_format($moneyAllCarts);

        //Việc cần làm
        $todoLists = todoList::orderBy('created_at', 'desc')->get();
        // $diffirenceTime = todoList

        return view('admin.users.home', compact(
            'title',
            'cartsToday',
            'cartsBeforeDate',
            'cartsWeek',
            'cartsMonth',
            'cartsYear',
            'resultAllCarts',
            'moneyToday',
            'moneyBeforeDate',
            'moneyWeek',
            'moneyMonth',
            'moneyYear',
            'moneyAllCarts',
            'todoLists',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTodoList(Request $request)
    {
        todoList::create($request->all());
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTodoList(Request $request)
    {
        $id = $request->id;
        $product = todoList::where('id', $id)->first();
        if ($product) {
            $result = $product->delete();
        }
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
