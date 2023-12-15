<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelas = Kelas::all();
        return view('kelas/index', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelasRequest $request)
    {
        //
        Kelas::create($request->all());
        Session::flash('flash_message', 'Data kelas berhasil disimpan!');
        return redirect('kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        //
        return view('kelas.edit', [
            'kelas' => $kela
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Kelas $kelas, KelasRequest $request)
    {
        //
        $kelas->update($request->all());
        Session::flash('flash_message', 'Data kelas berhasil disimpan!');
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        //
        $kela->siswa()->delete();

        $kela->delete();

        Session::flash('flash_message', 'Data Kelas berhasil dihapus!');
        Session::flash('penting', true);
        return redirect('kelas');
    }
}
