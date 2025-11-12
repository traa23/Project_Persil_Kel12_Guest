<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPenggunaanController extends Controller
{
    public function index()
    {
        return view('admin.jenis_penggunaan.index');
    }

    public function create()
    {
        return view('admin.jenis_penggunaan.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.jenis-penggunaan.index');
    }

    public function show(string $id)
    {
        return view('admin.jenis_penggunaan.show');
    }

    public function edit(string $id)
    {
        return view('admin.jenis_penggunaan.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('admin.jenis-penggunaan.index');
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.jenis-penggunaan.index');
    }
}
