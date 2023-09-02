<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KelolaPenggunaController extends Controller
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
            'title' => 'Kelola Pengguna - Aplikasi Pengelolaan Stok Annisa Kosmetik',
        ];

        return view('kelola_pengguna', $data);
    }

    public function get_all_users(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('id', '!=', Auth::user()->id)->get();
            return datatables()->of($data)
                ->addColumn('action', function (User $user) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        ]);

        // dd($req->name);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = time() . '.' . $req->avatar->extension();
        $req->avatar->move(public_path('assets/img/avatars'), $imageName);

        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'role' => $req->role,
            'avatar' => $imageName,
            'password' => Hash::make($req->password),
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::findOrFail($request->id_user);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|unique:users,username,' . $user->id,
            'role' => 'required|string',
            'password' => ['nullable', 'string', 'min:8'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {

            if ($request->avatar != "20.png") {
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

    public function update_status($id)
    {

        // dd($id);
        $user = User::find($id);

        // $data = [];

        if ($user->status == 1) {

            $data = [
                'status' => 0,
            ];
        } else {

            $data = [
                'status' => 1,
            ];
        }

        $user->update($data);

        return redirect()->back()->with(['success' => 'Status Pengguna Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data = User::find($id);

        if (file_exists(public_path('assets/img/avatars/' . $data->avatar))) {
            unlink(public_path('assets/img/avatars/' . $data->avatar));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
