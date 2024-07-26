<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthNewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $users = User::select('*')
            ->leftjoin('departments', 'departments.dep_id', 'users.department')
            ->leftjoin('positions', 'positions.position_id', 'users.position');
        if (!empty($keyword)) {
            $users = $users->where(function ($query) use ($keyword) {
                $query->where('users.name', 'LIKE', "%$keyword%")
                    ->orWhere('users.lastname', 'LIKE', "%$keyword%")
                    ->orWhere('users.email', 'LIKE', "%$keyword%");
            });
        }
        $users = $users->paginate(13);
        return  view('auth.new.index', compact('users'));
    }

    public function create()
    {
        $departments = DB::table('departments')->get();
        $positions = DB::table('positions')->get();
        return  view('auth.new.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        //check User Hash::make($data['password']),
        $countUser = User::where('email', $request->email)->count();

        if ($countUser === 0) {
            if ($request->status) {
                $status = "Y";
            } else {
                $status = "N";
            }
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'lastname' => $request->lastname,
                'position' => $request->position,
                'department' => $request->department,
                'isAdmin' => $request->isAdmin,
                'status' => $status,
            ]);
            return redirect()->back()->with('success', 'เพิ่มสมาชิกสำเร็จ!!');
        } else {
            return redirect()->back()->with('error', 'บัญชีของมีผู้ใช้งานแล้ว!!');
        }
    }


    public function edit(Request $request)
    {
        $departments = DB::table('departments')->get();
        $positions = DB::table('positions')->get();
        $user = User::where('id', $request->id)
            ->leftjoin('departments', 'departments.dep_id', 'users.department')
            ->leftjoin('positions', 'positions.position_id', 'users.position')
            ->first();
        return  view('auth.new.edit', compact('departments', 'positions', 'user'));
    }

    public function update(User $user, Request $request)
    {
        if ($request->status) {
            $status = "Y";
        } else {
            $status = "N";
        }

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'lastname' => $request->lastname,
                'position' => $request->position,
                'department' => $request->department,
                'isAdmin' => $request->isAdmin,
                'status' => $status,
            ]);
            return redirect()->back()->with('success', 'แก้ไขสมาชิกสำเร็จ!!');
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'position' => $request->position,
                'department' => $request->department,
                'isAdmin' => $request->isAdmin,
                'status' => $status,
            ]);
            return redirect()->back()->with('success', 'แก้ไขสมาชิกสำเร็จ!!');
        }
    }

    //Delete
    public function delete(Request $request)
    {
        if ($request->dataID) {
            User::where('id', $request->dataID)->delete();
            return response()->json(['success'=>'ลบข้อมูลสมาชิกสำเร็จ!!']);
        }
        else{
            return response()->json(['error'=>'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!!']);
        }
    }
}
