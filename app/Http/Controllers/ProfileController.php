<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'avatar' => 'mimes:png,jpg|max:2048'
        ]);
        
        $checkEmail = User::where('email', $request->email)->first();
        if($checkEmail != null)
        {
            if($checkEmail->id != $data->id)
            {
                return redirect()->back()->with('ERR', 'Email telah digunakan');
            }
        }
        
        
        $avatarPath = $data->avatar;
        if ($request->hasFile('avatar')) {
            $save = $request->file('avatar')->store('public/avatar');
            $filename = $request->file('avatar')->hashName();
            $avatarPath = url('/') . '/storage/avatar/' . $filename;
        }
        
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatarPath
        ]);
        
        if($request->password != '' && $request->password != null)
        {
            $data->update([
                'password' => bcrypt($request->password),
            ]); 
        }
        
        return redirect()->route('dashboard.index')->with('OK', 'Data berhasil diubah');
    }
}
