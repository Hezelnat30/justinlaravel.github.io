<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Arr;
use Monolog\Level;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function index()
    {
        $user_list = User::all();
        return view('user.index', [
            'user_list' => $user_list
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    protected function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $validasi = FacadesValidator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'level' => 'required|in:admin,operator'
        ]);
        if ($validasi->fails()) {
            return redirect('user/create')
                ->withInput()
                ->withErrors($validasi);
        }

        // Hash Password
        $data['password'] = bcrypt($data['password']);
        // Menyimpan user level
        $data['level'] = $request->input('level');

        User::create($data);
        Session::flash('flash_message', 'Data User Berhasil Disimpan!');
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return redirect('user');
    }

    /**
     * Show the form for editing the specified resource.
     */
    protected function edit(User $user)
    {
        //
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
        $data = $request->all();

        $validasi = FacadesValidator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:users,email,' . $data['id'],
            'password' => 'sometimes|confirmed|min:6',
            'level' => 'required|in:admin,operator'
        ]);

        if ($validasi->fails()) {
            return redirect("user/{$user->id}/edit")
                ->withInput()
                ->withErrors($validasi);
        }

        if ($request->has('password')) {
            // Hash Password
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }

        $user->update($data);
        Session::flash('flash_message', 'Data User Berhasil Diupdate!');
        return redirect('user');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('flash_message', 'Data User Berhasil Dihapus!');
        Session::flash('penting', true);
        return redirect('user');
    }
}
