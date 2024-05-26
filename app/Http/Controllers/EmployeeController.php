<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDocument;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\User;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['datas'] = Employee::all();

        return view('dashboard.employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['job_titles'] = ['IT', 'Keuangan', 'Teknik'];

        return view('dashboard.employee.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'max:255',
            'address' => 'max:1000',
        ]);

        $avatarPath = '/assets/images/users/avatar-9.jpg';
        if ($request->hasFile('avatar')) {
            $save = $request->file('avatar')->store('public/avatar');
            $filename = $request->file('avatar')->hashName();
            $avatarPath = url('/') . '/storage/avatar/' . $filename;
        }

        Employee::create([
            'avatar' => $avatarPath,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('dashboard.employee.index')->with('OK', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['data'] = Employee::findOrFail($id);

        return view('dashboard.employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Employee::findOrFail($id);

        $request->validate([
            'avatar' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'max:255',
            'address' => 'max:1000',
        ]);

        $avatarPath = $data->avatar;
        if ($request->hasFile('avatar')) {
            $save = $request->file('avatar')->store('public/avatar');
            $filename = $request->file('avatar')->hashName();
            $avatarPath = url('/') . '/storage/avatar/' . $filename;
        }

        $data->update([
            'avatar' => $avatarPath,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('dashboard.employee.index')->with('OK', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();

        return redirect()->route('dashboard.employee.index')->with('OK', 'Data berhasil dihapus');
    }
}
