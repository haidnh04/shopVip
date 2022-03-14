<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\Hash;


class User1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userService;

    public function __con(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $title = 'Danh sách thành viên';
        return view('admin.users.list1', compact('title'));
    }

    public function getUsers()
    {
        return User::orderByDesc('id')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm thành viên';
        $data = [
            'scope' => 'create',
        ];
        return view('admin.users.add1', compact('title'))->with($data);
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
            $users = new User;
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = Hash::make($request->get('password'));
            $users->role = $request->get('role');
            $users->status = $request->get('status');
            $users->created_at = date('Y-m-d H:i:s');
            $users->save();

            return response()->json([
                'status' => 200,
                'message' => 'Thành viên thêm ok'
            ]);
        } catch (\Exception $e) {
            //throw $th;
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Cập nhật thành viên';
        $data = [
            'scope' => 'edit',
            'id' => $id
        ];
        return view('admin.users.edit1', compact('title'))->with($data);
    }

    public function getUsersById($id)
    {
        $users = User::find($id);

        return response()->json([
            'status' => 200,
            'data' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->role = $request->get('role');
            $user->status = $request->get('status');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->update();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Xóa thành công',
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
