<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;



class AsalSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asal_sekolah');
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
    
        $rules = [
            'npsn' => 'required|unique:asal_sekolah,npsn|numeric',
            'nama_sekolah' => 'required',
            'alamat_asal_sekolah' => 'required'
        ];

        $message = [
            'npsn.required' => 'NPSN tidak boleh kosong dan harus angka!',
            'npsn.unique' => 'No. NPSN sudah terdaftar!',
            'npsn.numeric' => 'No. NPSN harus angka!',
            'nama_sekolah.required' => 'Nama sekolah tidak boleh kosong!',
            'alamat_asal_sekolah.required' => 'Alamat sekolah tidak boleh kosong!'
        ];

        $this->validate($request, $rules, $message);

        AsalSekolah::create([
            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat_asal_sekolah
        ]);

        return response()->json(['message' => 'Data Asal Sekolah berhasil tersimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsalSekolah  $asalSekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       $asalSekolah = AsalSekolah::findOrFail($id);
       return $asalSekolah; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsalSekolah  $asalSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(AsalSekolah $asalSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsalSekolah  $asalSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsalSekolah $asalSekolah)
    {

        $rules = [
            'npsn' => 'required|numeric|unique:asal_sekolah,npsn,'.$request->id,
            'nama_sekolah' => 'required',
            'alamat_asal_sekolah' => 'required'
        ];

        $message = [
            'npsn.required' => 'NPSN tidak boleh kosong dan harus angka!',
            'npsn.unique' => 'No. NPSN sudah terdaftar!',
            'npsn.numeric' => 'No. NPSN harus angka!',
            'nama_sekolah.required' => 'Nama sekolah tidak boleh kosong!',
            'alamat_asal_sekolah.required' => 'Alamat sekolah tidak boleh kosong!'
        ];

        $this->validate($request, $rules, $message);
        
        $asalSekolah = AsalSekolah::findOrFail($request->id);
        $asalSekolah->update([
            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat_asal_sekolah
        ]);

        return response()->json([
            'message' => 'Data asal sekolah berhasil diperbaharui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsalSekolah  $asalSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
        $asal_sekolah = AsalSekolah::findOrFail($id);
        $asal_sekolah->delete();

        return response()->json([
            'message' => 'Data Asal Sekolah berhasil terhapus!' 
        ]);
    }

    // Data untuk datatable
    public function datatable()
    {
        $asal_sekolah = DB::table('asal_sekolah')->select(['id', 'npsn', 'nama_sekolah', 'alamat']);
        return DataTables::queryBuilder($asal_sekolah)
        ->addColumn('aksi', function($asal_sekolah){
            return '<a href="'.route('asal_sekolah.destroy', $asal_sekolah->id).'" id="btnHapus" class="button btn btn-sm btn-danger" data-id="'. $asal_sekolah->id .'"><i class="fas fa-trash"></i></a>
            <a href="'.route('asal_sekolah.show', $asal_sekolah->id).'" id="btnDetail" class="button btn btn-sm btn-info" data-id="'. $asal_sekolah->id .'"><i class="fas fa-eye"></i></a>
            <a href="'.route('asal_sekolah.edit', $asal_sekolah->id).'" id="btnEdit" class="button btn btn-sm btn-success" data-id="'. $asal_sekolah->id .'"><i class="fas fa-edit"></i></a>
            ';
        })
        ->addIndexColumn()
        ->rawColumns(['aksi'])
        ->make(true);

    }
    // Data untuk datatable yang berada di view tambah_pendaftar.blade.php
    public function datatable2()
    {
        $asal_sekolah = DB::table('asal_sekolah')->select(['id', 'npsn', 'nama_sekolah', 'alamat']);
        return DataTables::queryBuilder($asal_sekolah)
        ->addColumn('aksi', function($asal_sekolah){
            return '<a href="'.route('asal_sekolah.destroy', $asal_sekolah->id).'" id="btnHapus" class="button btn btn-sm btn-danger" data-id="'. $asal_sekolah->id .'"><i class="fas fa-trash"></i></a>
            <a href="'.route('asal_sekolah.edit', $asal_sekolah->id).'" id="btnEdit" class="button btn btn-sm btn-primary" data-id="'. $asal_sekolah->id .'"><i class="fas fa-edit"></i></a>
            <a href="#" id="btnPilih" class="button btn btn-sm btn-success" data-id="'. $asal_sekolah->id .'" data-nama-sekolah="'. $asal_sekolah->nama_sekolah .'"><i class="fas fa-check"></i></a>
            ';
        })
        ->addIndexColumn()
        ->rawColumns(['aksi'])
        ->make(true);
    }
}
