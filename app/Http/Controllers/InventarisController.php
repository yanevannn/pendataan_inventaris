<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventarisController extends Controller
{
    public function index(){
        $inventaris = Inventaris::all();
        return view('index', compact('inventaris'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'status' => 'required|in:baik,rusak,hilang',
            'jumlah' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->storeAs(
                'inventaris_fotos', // Direktori penyimpanan
                time() . '_' . $request->file('foto')->getClientOriginalName(), // Nama file
                'public' // Disk penyimpanan
            );
        }

        Inventaris::create($data);
        return redirect()->route('inventaris.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id){
        $inventaris = Inventaris::findOrFail($id);
        return view('edit', compact('inventaris'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'status' => 'required|in:baik,rusak,hilang',
            'jumlah' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $inventaris = Inventaris::findOrFail($id);
        if ($request->hasFile('foto')) {
            if ($inventaris->foto) {
                Storage::disk('public')->delete($inventaris->foto);
            }
            $data['foto'] = $request->file('foto')->storeAs(
                'inventaris_fotos',
                time() . '_' . $request->file('foto')->getClientOriginalName(),
                'public'
            );
        }

        $inventaris->update($data);
        return redirect()->route('inventaris.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Inventaris $inventaris){
        if ($inventaris->foto) {
            Storage::disk('public')->delete($inventaris->foto);
        }
        $inventaris->delete();
        return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus');
    }

    
}
