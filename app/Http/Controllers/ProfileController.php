<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
    }
    public function edit(){
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.edit-profile', compact('user'));
    }

    public function update(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->update();

        Alert::success('Profile berhasil di update');
        return redirect('profile');
    }

    public function password(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.edit-password', compact('user'));
    }

    public function update_pass(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->update();

        Alert::success('Ubah password berhasil');
        return view('profile.edit-password', compact('user'));
    }
}
