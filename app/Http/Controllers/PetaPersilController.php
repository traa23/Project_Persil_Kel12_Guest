<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaPersilController extends Controller
{
    public function index()
    {
        return view('admin.peta_persil.index');
    }

    public function create()
    {
        return view('admin.peta_persil.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.peta-persil.index');
    }

    public function show(string $id)
    {
        return view('admin.peta_persil.show');
    }

    public function edit(string $id)
    {
        return view('admin.peta_persil.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('admin.peta-persil.index');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.peta-persil.index');
    }
}
