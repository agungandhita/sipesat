<?php

namespace App\Http\Controllers\admin;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = Penduduk::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%');
        }

        if ($request->has('jenis_kelamin') && $request->jenis_kelamin != '') {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $data = $query->latest()->get();

        return view('admin.penduduk.index', [
            'data' => $data,
            'title' => 'data penduduk'
        ]);
    }

    public function create()
    {
        return view('admin.penduduk.create', [
            'title' => 'Tambah Data Penduduk'
        ]);
    }

    public function store(StorePendudukRequest $request)
    {
        Penduduk::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'user_created' => auth()->id()
        ]);

        return redirect()->route('penduduk')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Penduduk $id)
    {
        return view('admin.penduduk.edit', [
            'penduduk' => $id,
            'title' => 'Edit Data Penduduk'
        ]);
    }

    public function update(UpdatePendudukRequest $request, Penduduk $id)
    {
        $id->update([
            'nama' => $request->nama ?? $id->nama,
            'alamat' => $request->alamat ?? $id->alamat,
            'nik' => $request->nik ?? $id->nik,
            'jenis_kelamin' => $request->jenis_kelamin ?? $id->jenis_kelamin,
            'user_updated' => Auth::id()
        ]);

        return redirect()->route('penduduk')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $update = Penduduk::where('warga_id', $id)->update([
            'user_deleted' => auth()->user()->id,
            'deleted' => true
        ]);

        if ($update) {
            Penduduk::find($id)->delete();
        }
        return redirect()->route('penduduk')->with('success', 'data berhasil di hapus');
    }
}
