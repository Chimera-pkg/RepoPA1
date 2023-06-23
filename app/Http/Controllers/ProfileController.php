<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Profil Pengguna - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('detail_profile', $data);
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {

        // dd('ok');
        $user = User::findOrFail($request->id_user);
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator, 'edit_profile')
                ->withInput();
        }

        // dd($request->avatar);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            // 'role' => $request->role,
        ];

        // dd($request->avatar == "20.png");

        if ($request->hasFile('avatar')) {

            if($user->avatar != '20.png'){
                if (file_exists(public_path('assets/img/avatars/' . $user->avatar))) {
                        unlink(public_path('assets/img/avatars/' . $user->avatar));
                }
            }

                
            

            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('assets/img/avatars'), $imageName);
            $data['avatar'] = $imageName;
        }

        $user->update($data);

        return redirect()->back()->with(['success' => 'Data Pengguna Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus_akun(Request $request)
    {

        $user = User::find($request->id_user);
        $user->delete();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function update_password()
    {
        $data = [
            'title' => 'Profil Pengguna - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('profile_security', $data);
    }

    public function edit_pw(Request $request)
    {

        $currentPassword = $request->currentPassword;
        $user = User::find(Auth::user()->id);

        if (Hash::check($currentPassword, $user->password)) {
            // Password cocok
            // dd('cocok');

            $data = [
                'password' => Hash::make($request->newPassword),
            ];

            $user->update($data);

            return redirect()->back()->with(['success' => 'Password Anda Berhasil Diupdate!']);

        } else {
            // dd('tidak cocok');
            return redirect()->back()->with(['error' => 'Password Sekarang yang Anda Masukan Salah!']);
        }

    }
}