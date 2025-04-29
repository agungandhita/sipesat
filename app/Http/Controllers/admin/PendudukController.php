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

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nik', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan jenis kelamin
        if ($request->has('jenis_kelamin') && $request->jenis_kelamin != '') {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter berdasarkan RT
        if ($request->has('rt') && $request->rt != '') {
            $query->where('rt', $request->rt);
        }

        // Filter berdasarkan Dusun
        if ($request->has('dusun') && $request->dusun != '') {
            $query->where('dusun', $request->dusun);
        }

        // Pengurutan data
        if ($request->has('sort_by') && $request->sort_by != '') {
            $direction = $request->has('sort_direction') && $request->sort_direction == 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort_by, $direction);
        } else {
            $query->latest();
        }

        $data = $query->paginate(10);

        // Mendapatkan daftar RT dan Dusun untuk filter dropdown
        $rtList = Penduduk::distinct('rt')->whereNotNull('rt')->pluck('rt')->sort();
        $dusunList = Penduduk::distinct('dusun')->whereNotNull('dusun')->pluck('dusun')->sort();

        return view('admin.penduduk.index', [
            'data' => $data,
            'rtList' => $rtList,
            'dusunList' => $dusunList,
            'title' => 'Data Penduduk'
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
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
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

    public function update(Request $request, Penduduk $penduduk)
    {
        $penduduk->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun
        ]);
    
        return redirect()->route('penduduk')->with('success', 'Data penduduk berhasil diperbarui');
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
        return redirect()->route('penduduk')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Menampilkan data penduduk berdasarkan RT
     */
    public function byRT($rt)
    {
        $data = Penduduk::RT($rt)->get();

        return view('admin.penduduk.by_rt', [
            'data' => $data,
            'rt' => $rt,
            'title' => 'Data Penduduk RT ' . $rt
        ]);
    }

    /**
     * Menampilkan data penduduk berdasarkan Dusun
     */
    public function byDusun($dusun)
    {
        $data = Penduduk::Dusun($dusun)->get();

        return view('admin.penduduk.by_dusun', [
            'data' => $data,
            'dusun' => $dusun,
            'title' => 'Data Penduduk Dusun ' . $dusun
        ]);
    }
}
