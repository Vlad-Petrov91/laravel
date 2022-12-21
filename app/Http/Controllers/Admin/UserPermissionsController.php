<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPermissionsController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->paginate(10);
        return view('admin.changePermissions')->with('users', $users);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.changePermissions')->with('success', 'Права изменены');
        } else {
            return redirect()->route('admin.changePermissions')->with('error', 'Вы не можете снять с себя права');
        }
    }
}
