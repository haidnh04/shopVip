<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getAll($request)
    {
        return User::where('name', 'like', '%' . $request->name . '%')
        ->where('email', 'like', '%' . $request->email . '%')
        ->where('role', '<', 2)
        ->orderByDesc('id')
        ->paginate(10);
    }

    public function store($request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->status,
                'created_at' => date('Y-m-d H:i:s'),
                //'slug' => Str::slug($request->name, '-'),
            ]);
        } catch (\Exception $err) {
            //with('msg', 'Thêm sản phẩm không thành công');
            return false;
        }
        return true;
    }

    public function getOne()
    {
        return User::firstOrFail();
    }

    public function update($request, $user)
    {
        try {
            $user->name = $request->name;
            $user->email = strtolower($request->email);
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->status = $request->status;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
        } catch (\Exception $err) {
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
