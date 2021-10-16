<?php

namespace App\Http\Controllers;

use App\Actions\File;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('backend.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('backend.admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required'],
            'phone' => ['required'],
            'status' => ['required'],
            'role' => ['required'],
            'image' => ['required', 'mimes:jpg,png'],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'status' => $request->status,
            'role' => $request->role,
            'image' => File::upload($request->image, 'admin'),
        ]);

        if($admin){
            $this->notification('New Role Created Successfully!');
        }
        return redirect()->intended('admin/admin');
    }

    public function edit(Admin $admin)
    {
        return view('backend.admin.edit', compact('admin'));
    }
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => ['required'],
            'email' => 'required|string|email|max:255|unique:admins,email,'.$admin->id,
            'password' => ['required'],
            'phone' => ['required'],
            'status' => ['required'],
            'role' => ['required'],
        ]);

        if($request->image){
            File::deleteFile($admin->image);

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'status' => $request->status,
                'role' => $request->role,
                'image' => File::upload($request->image, 'admin'),
            ]);
        }else{
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'status' => $request->status,
                'role' => $request->role,
            ]);
        }
        $this->notification('Role Update Successfully!');
        return redirect()->intended('admin/admin');
    }

    public function destroy(Admin $admin)
    {
        File::deleteFile($admin->image);
        $admin->delete();
        $this->notification('Role Delete Successfully!');
        return redirect()->route('admin.admin.index');
    }


    // Role Active and Inactive
    public function roleAction(Admin $admin)
    {
        $status = $admin->status;
        if($status == 0){
            $admin->update([
                'status' => 1
            ]);
            $this->notification('Status Active Successfully!');
        }else{
            $admin->update([
                'status' => 0
            ]);
            $this->notification('Status Inactive Successfully!');
        }

        return back();
    }
}
