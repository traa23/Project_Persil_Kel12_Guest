<?php

namespace App\Http\Controllers;

use App\Models\Persil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $persils = Persil::with('pemilik')->latest()->paginate(12);
            return view('guest.persil.index', compact('persils'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.persil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'kode_persil' => 'required|string|max:50|unique:persil,kode_persil',
                'luas_m2' => 'nullable|numeric|min:0',
                'penggunaan' => 'nullable|string|max:100',
                'alamat_lahan' => 'nullable|string',
                'rt' => 'nullable|string|max:5',
                'rw' => 'nullable|string|max:5',
            ], [
                'kode_persil.required' => 'Kode persil wajib diisi',
                'kode_persil.unique' => 'Kode persil sudah terdaftar',
                'luas_m2.numeric' => 'Luas harus berupa angka',
                'luas_m2.min' => 'Luas tidak boleh negatif',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $persil = Persil::create($request->only([
                'kode_persil',
                'luas_m2',
                'penggunaan',
                'alamat_lahan',
                'rt',
                'rw',
            ]));

            return redirect()->route('guest.persil.show', $persil->persil_id)
                ->with('success', 'Data persil berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $persil = Persil::with(['pemilik', 'dokumen', 'peta', 'sengketa'])->findOrFail($id);
            return view('guest.persil.show', compact('persil'));
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $persil = Persil::findOrFail($id);
            return view('guest.persil.edit', compact('persil'));
        } catch (\Exception $e) {
            return back()->with('error', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $persil = Persil::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'kode_persil' => 'required|string|max:50|unique:persil,kode_persil,' . $id . ',persil_id',
                'luas_m2' => 'nullable|numeric|min:0',
                'penggunaan' => 'nullable|string|max:100',
                'alamat_lahan' => 'nullable|string',
                'rt' => 'nullable|string|max:5',
                'rw' => 'nullable|string|max:5',
            ], [
                'kode_persil.required' => 'Kode persil wajib diisi',
                'kode_persil.unique' => 'Kode persil sudah terdaftar',
                'luas_m2.numeric' => 'Luas harus berupa angka',
                'luas_m2.min' => 'Luas tidak boleh negatif',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $persil->update($request->only([
                'kode_persil',
                'luas_m2',
                'penggunaan',
                'alamat_lahan',
                'rt',
                'rw',
            ]));

            return redirect()->route('guest.persil.show', $persil->persil_id)
                ->with('success', 'Data persil berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $persil = Persil::findOrFail($id);
            $persil->delete();

            return redirect()->route('guest.persil.index')
                ->with('success', 'Data persil berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
