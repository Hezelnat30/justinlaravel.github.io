<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HobiRequest;
use App\Models\Hobi;
use Illuminate\Support\Facades\Session;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hobi_list = Hobi::all();
        return view('hobi.index', [
            'hobi_list' => $hobi_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('hobi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HobiRequest $request)
    {
        //
        Hobi::create($request->all());
        Session::flash('flash_message', 'Data hobi berhasil di update!');
        return redirect('hobi');
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
    public function edit(Hobi $hobi)
    {
        //
        return view('hobi.edit', [
            'hobi' => $hobi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Hobi $hobi, HobiRequest $request)
    {
        //
        $hobi->update($request->all());
        Session::flash('flash_message', 'Data hobi berhasil di update!');
        return redirect('hobi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hobi $hobi)
    {
        //
        $hobi->delete();
        Session::flash('flash_message', 'Data hobi berhasil dihapus!');
        Session::flash('penting', true);
        return redirect('hobi');
    }
}
