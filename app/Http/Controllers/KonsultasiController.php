<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $search = $request->search;
            $konsultasi = Konsultasi::orderBy('id','DESC')->when($search, function ($query, $search){
                return $query->where('nama','like',"%{$search}%")->orWhere('nomor_induk','like',"%{$search}%")->orWhere('keluhan','like',"%{$search}%")->orWhere('tanggal_konsultasi','like',"%{$search}%")->orWhere('waktu_konsultasi','like',"%{$search}%")->orWhere('status','like',"%{$search}%");
            })->paginate(5);
            $konsultasi->appends($request->all());
            return view('pengajuan.konsultasi', [
                'datas' => $konsultasi,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan.create',["data" => new Konsultasi()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'user_id' => Auth::user()->id,
            // 'user_id' => 'Auth::id()->id',
            'user_id' => 'Auth::id()->id',
            'keluhan' => 'required',
            'tanggal_konsultasi' => 'required',
            'waktu_konsultasi' => 'required'
    ],[
            'keluhan.required'=>'Keluhan field is required.',
            'tanggal_konsultasi.required'=>'Tanggal Konsultasi field is required.',
            'waktu_konsultasi.required'=>'Waktu Konsultasi field is required.',
    ]);
            $konsultasi = new Konsultasi();
            $konsultasi->user_id = Auth::user()->id;
            $konsultasi->nama = Auth::user()->nama;
            $konsultasi->nomor_induk = Auth::user()->nomor_induk;
            $konsultasi->keluhan = $request->keluhan;
            $konsultasi->tanggal_konsultasi = $request->tanggal_konsultasi;
            $konsultasi->waktu_konsultasi = $request->waktu_konsultasi;
            $konsultasi->status = 'Konsultasi Anda belum disetujui';
            $konsultasi->pemberitahuan = 'Konsultasi Anda belum disetujui';

            $konsultasi->save();
            return redirect('konsultasi')->with('success', 'Konsultasi Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsultasi $konsultasi)
    {
        return view('pengajuan.edit', ['data' => $konsultasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        $request->validate([
            'user_id' => 'Auth::id()->id',
            'keluhan' => 'required',
            'tanggal_konsultasi' => 'required',
            'waktu_konsultasi' => 'required'
        ],[
            'keluhan.required'=>'Keluhan field is required.',
            'tanggal_konsultasi.required'=>'Tanggal Konsultasi field is required.',
            'waktu_konsultasi.required'=>'Waktu Konsultasi field is required.',
        ]);

        // $data = Konsultasi::findOrFail($id);
        $konsultasi->nama = Auth::user()->nama;
        $konsultasi->nomor_induk = Auth::user()->nomor_induk;
        $konsultasi->keluhan = $request->keluhan;
        $konsultasi->tanggal_konsultasi = $request->tanggal_konsultasi;
        $konsultasi->waktu_konsultasi = $request->waktu_konsultasi;

        $konsultasi->update();
        return redirect('konsultasi')->with('info', 'Konsultasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konsultasi $konsultasi)
    {
        $konsultasi->delete();
        // dd($request->all());
        return redirect()->route('konsultasi.index')->with('status','Berhasil di hapus');
    }

    public function terima($id)
    {
        $konsultasi=Konsultasi::where('id',$id)->first();
        $konsultasi->status='Konsultasi anda telah diterima';
        $konsultasi->pemberitahuan='Konsultasi Anda Diterima';
        $konsultasi->update();
        return redirect('/konsultasi')->with('success', 'Permintaan Konsultasi telah diterima');
    }

    public function tolak($id)
    {
        $konsultasi=Konsultasi::where('id',$id)->first();
        $konsultasi->status='Konsultasi anda telah ditolak';
        $konsultasi->pemberitahuan='Konsultasi Anda Ditolak';
        $konsultasi->update();
        return redirect('/konsultasi')->with('success', 'Permintaan Konsultasi telah ditolak');
    }
}
