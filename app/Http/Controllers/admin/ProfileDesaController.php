<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perangkatDesa = ProfileDesa::all();
        return view('admin.profile-desa.index', compact('perangkatDesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Form sudah ada di halaman index dalam bentuk modal
        return redirect()->route('admin.profile-desa.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_created'] = Auth::id();

        ProfileDesa::create($data);

        return redirect()->route('admin.profile-desa.index')
            ->with('success', 'Data perangkat desa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileDesa $profileDesa)
    {
        return view('admin.profile-desa.show', compact('profileDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileDesa $profileDesa)
    {
        // Form edit sudah ada di halaman index dalam bentuk modal
        return redirect()->route('admin.profile-desa.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileDesa $profileDesa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_updated'] = Auth::id();

        $profileDesa->update($data);

        return redirect()->route('admin.profile-desa.index')
            ->with('success', 'Data perangkat desa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileDesa $profileDesa)
    {
        // Soft delete dengan user_deleted
        $profileDesa->update([
            'user_deleted' => Auth::id(),
            'deleted' => 1
        ]);
        
        $profileDesa->delete();

        return redirect()->route('admin.profile-desa.index')
            ->with('success', 'Data perangkat desa berhasil dihapus');
    }
}
