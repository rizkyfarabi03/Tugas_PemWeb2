<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class KlubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['klub'] = DB::table('klub')->get();
        return view('klub', $data);
          //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('tambahKlub');
        }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            if ($gambarInput =  $request->hasFile('gambarInput')){
                $request->file('gambarInput')->move('gambarklub/', $request->file('gambarInput')->getClientOriginalName());
                $request->file('gambarInput')->getClientOriginalName();
            } 
            // $gambarInput = $request->file('gambarInput')->move('gambarKlub/', $request->file('gambarInput')->getClientOriginalName());
            $namaInput = $request->input('namaInput');
            $tahunInput = $request->input('tahunInput');
            $pemilikInput = $request->input('pemilikInput');
            $managerInput = $request->input('managerInput');
            $pelatihInput = $request->input('pelatihInput');

    
            // dd($request->input(''));
    
            $query = DB::table('klub')->insert([
                'gambar' => $gambarInput,
                'nama_klub' => $namaInput,
                'tahun_terbentuk' => $tahunInput,
                'pemilik' => $pemilikInput,
                'manager' => $managerInput,
                'pelatih' => $pelatihInput
            ]);
    
            if ($query) {
                return redirect()->route('klub')->with('success', 'Data Berhasil Ditambahkan');
            } else {
                return redirect()->route('klub')->with('failed', 'Data Gagal Ditambahkan');
            }
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //    {
        $data['klub'] = DB::table('klub')->where('id', $id)->first();

        return view('editKlub', $data);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //{
        $gambarInput = $request->input('gambarInput');
        $namaInput = $request->input('namaInput');
        $tahunInput = $request->input('tahunInput');
        $pemilikInput = $request->input('pemilikInput');
        $managerInput = $request->input('managerInput');
        $pelatihInput = $request->input('pelatihInput');

        $query = DB::table('klub')->where('id', $id)->update([
            'gambar' => $gambarInput,
            'nama_klub' => $namaInput,
            'tahun_terbentuk' => $tahunInput,
            'pemilik' => $pemilikInput,
            'manager' => $managerInput,
            'pelatih' => $pelatihInput
        ]);

        if ($query) {
            return redirect()->route('klub')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('klub')->with('failed', 'Data Gagal Diupdate');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('klub')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('klub')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('klub')->with('failed', 'Data Gagal Dihapus');
        }
    }

}
