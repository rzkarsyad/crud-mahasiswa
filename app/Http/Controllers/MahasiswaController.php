<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate();

        $jurusan = Jurusan::pluck('nama_jurusan', 'kode');

        return view('mahasiswa.index', compact("mahasiswa", "jurusan"));
    }

    public function getKelas(Request $request)
    {
        $kelas = Kelas::where('kode_jurusan', $request->kode_jurusan)->pluck('nama_kelas', 'kode');

        return response()->json($kelas);
    }

    public function getMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id', $request->id);

        return response()->json($mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Mahasiswa();
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->kode_jurusan = $request->jurusan;
        $data->kode_kelas = $request->kelas;
        $data->angkatan = $request->angkatan;
        $data->save();

        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Mahasiswa::where('id', $id)->delete();

        return redirect('mahasiswa');
    }
}
