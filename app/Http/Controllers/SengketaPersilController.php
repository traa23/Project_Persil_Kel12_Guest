<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SengketaPersilController extends Controller
{
    public function index()
    {
        return view('admin.sengketa_persil.index');
    }

    public function create()
    {
        return view('admin.sengketa_persil.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.sengketa-persil.index');
    }

    public function show(string $id)
    {
        return view('admin.sengketa_persil.show');
    }

    public function edit(string $id)
    {
        return view('admin.sengketa_persil.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('admin.sengketa-persil.index');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.sengketa-persil.index');
    }
}
