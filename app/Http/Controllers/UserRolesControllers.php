<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role};

class UserRolesControllers extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $roles = Role::all();

        $user_id = $request->session()->pull('user_id');
        if ($user_id) {
            $user = User::find($user_id);
            $data = $user->roles->pluck(['id']);
            $roleData = [];
            foreach ($data as $dt) {
                array_push($roleData, $dt);
            }
            $data = $user->id;
        } else {
            $data = null;
            $roleData = [];
        }
        
        return view('permissions.user_roles', compact(['users', 'roles', 'roleData', 'data']));
    }

    public function get(Request $request, $id)
    {
        $user_id = $id;
        $request->session()->put('user_id', $user_id);
    }

    public function store(Request $request)
    {
        // return $request;
        $user = User::findOrFail($request->user);
        $user->syncRoles($request->role);

        // return response()->json(['status' => 'success']);
        return redirect()->route('user-roles.index')
        ->with(['success' => 'Berhasil mengubah role user']);
    }
}
