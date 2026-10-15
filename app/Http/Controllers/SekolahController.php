<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\DapurSPPG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::with('dapurSppg')->latest()->get();
        return view('sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        $dapurs = DapurSPPG::all();
        return view('sekolah.create', compact('dapurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npsn'          => 'required|unique:sekolah,npsn',
            'nama_sekolah'  => 'required',
            'tingkat'       => 'required',
            'alamat_sekolah'=> 'required',
            'dapur_sppg_id' => 'nullable|exists:dapur_sppg,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_sekolah')) {
            $data['foto_sekolah'] = $request->file('foto_sekolah')->store('uploads/sekolah', 'public');
        }

        Sekolah::create($data);

        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil disimpan!');
    }

    public function edit(Sekolah $sekolah)
    {
        $dapurs = DapurSPPG::all();
        return view('sekolah.edit', compact('sekolah', 'dapurs'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'npsn'          => 'required|unique:sekolah,npsn,' . $sekolah->id,
            'nama_sekolah'  => 'required',
            'tingkat'       => 'required',
            'alamat_sekolah'=> 'required',
            'dapur_sppg_id' => 'nullable|exists:dapur_sppg,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_sekolah')) {
            if ($sekolah->foto_sekolah && Storage::disk('public')->exists($sekolah->foto_sekolah)) {
                Storage::disk('public')->delete($sekolah->foto_sekolah);
            }
            $data['foto_sekolah'] = $request->file('foto_sekolah')->store('uploads/sekolah', 'public');
        } else {
            unset($data['foto_sekolah']);
        }

        $sekolah->update($data);

        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil diperbarui!');
    }

    public function destroy(Sekolah $sekolah)
    {
        if ($sekolah->foto_sekolah && Storage::disk('public')->exists($sekolah->foto_sekolah)) {
            Storage::disk('public')->delete($sekolah->foto_sekolah);
        }

        $sekolah->delete();

        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil dihapus!');
    }
}