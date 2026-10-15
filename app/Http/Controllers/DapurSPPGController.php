<?php

namespace App\Http\Controllers;

use App\Models\DapurSPPG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DapurSPPGController extends Controller
{
    public function index()
    {
        $dapurs = DapurSPPG::latest()->get();
        return view('dapur.index', compact('dapurs'));
    }

    public function create()
    {
        return view('dapur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dapur'  => 'required',
            'tgl_berdiri' => 'required|date',
            'alamat'      => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads/dapur', 'public');
        }

        DapurSPPG::create($data);

        return redirect()->route('dapur.index')->with('success', 'Data Dapur SPPG berhasil disimpan!');
    }

    public function edit(DapurSPPG $dapur)
    {
        return view('dapur.edit', compact('dapur'));
    }

    public function update(Request $request, DapurSPPG $dapur)
    {
        $request->validate([
            'nama_dapur'  => 'required',
            'tgl_berdiri' => 'required|date',
            'alamat'      => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($dapur->foto && Storage::disk('public')->exists($dapur->foto)) {
                Storage::disk('public')->delete($dapur->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads/dapur', 'public');
        } else {
            // Jangan timpa foto lama jika tidak mengunggah file baru
            unset($data['foto']);
        }

        $dapur->update($data);

        return redirect()->route('dapur.index')->with('success', 'Data Dapur SPPG berhasil diperbarui!');
    }

    public function destroy(DapurSPPG $dapur)
    {
        if ($dapur->foto && Storage::disk('public')->exists($dapur->foto)) {
            Storage::disk('public')->delete($dapur->foto);
        }

        $dapur->delete();

        return redirect()->route('dapur.index')->with('success', 'Data Dapur SPPG berhasil dihapus!');
    }
}