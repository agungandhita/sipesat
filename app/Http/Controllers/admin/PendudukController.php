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
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $data = $query->latest()->get();

        return view('admin.penduduk.index', [
            'data' => $data,
            'title' => 'data penduduk'
        ]);
    }

    public function store(StorePendudukRequest $request)
    {
       Penduduk::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'user_created' => auth()->id()
        ]);

        return redirect()->route('penduduk')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(UpdatePendudukRequest $request, Penduduk $id) {
        $id->update([
            'alamat' => $request->alamat,
            'user_updated' => Auth::id()
        ]);

        return redirect()->back();
    }


    public function destroy($id) {

        $update = Penduduk::where('warga_id', $id)->update([
            'user_deleted' => auth()->user()->user_id,
            'deleted' => true
        ]);

        // dd($update);
        if ($update) {
            Penduduk::find($id)->delete();
        }
        return redirect()->back();
    }
}
