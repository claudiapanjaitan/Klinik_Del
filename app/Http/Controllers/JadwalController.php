<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $search = $request->search;
            $datas = Jadwal::orderBy('id','DESC')->when($search, function ($query, $search){
                return $query->where('petugas','like',"%{$search}%")->orWhere('NIP','like',"%{$search}%")->orWhere('hari','like',"%{$search}%")->orWhere('waktu','like',"%{$search}%");
            })->paginate(4);
            $datas->appends($request->all());

            return view('Jadwal.jadwal', [
                'datas' => $datas,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jadwal.create',["data" => new Jadwal]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
                // 'user_id' => Auth::user()->id,
                // 'user_id' => 'Auth::id()->id',
                'user_id' => 'Auth::id()->id',
                'petugas' => 'required|min:4',
                'NIP' => 'required|min:3',
                'hari' => 'required',
                'waktu' => 'required',
                'waktu2' => 'required'
        ],[
            'petugas.required' => 'Nama Petugas field is required.',
            'petugas.min' => 'Nama Petugas at least 4 characters.',
            'NIP.required' => 'NIP field is required.',
            'NIP.min' => 'NIP at least 4 characters.',
            'hari.required' => 'Hari field is required.',
            'waktu.required' => 'Waktu Tugas field is required.',
            'waktu2.required' => 'Selesai Tugas field is required.',
        ]);
    
            $jadwal = new Jadwal();
            $jadwal->user_id = Auth::user()->id;
            // $jadwal->user_id = Auth::user()->id;
            $jadwal->petugas = $request->petugas;
            $jadwal->NIP = $request->NIP;
            $jadwal->hari = $request->hari;
            $jadwal->waktu = $request->waktu;
            $jadwal->waktu2 = $request->waktu2;
    
            $jadwal->save();
            return redirect('/jadwal')->with('success', 'Jadwal Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('Jadwal.edit', ['data' => $jadwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'petugas' => 'required|min:4',
            'NIP' => 'required|min:3',
            'hari' => 'required',
            'waktu' => 'required',
            'waktu2' => 'required'
        ],[
            'petugas.required' => 'Nama Petugas field is required.',
            'petugas.min' => 'Nama Petugas at least 4 characters.',
            'NIP.required' => 'NIP field is required.',
            'NIP.min' => 'NIP at least 4 characters.',
            'hari.required' => 'Hari field is required.',
            'waktu.required' => 'Waktu Tugas field is required.',
            'waktu2.required' => 'Selesai Tugas field is required.',
        ]);

        $jadwal->petugas = $request->petugas;
        $jadwal->NIP = $request->NIP;
        $jadwal->hari = $request->hari;
        $jadwal->waktu = $request->waktu;
        $jadwal->waktu2 = $request->waktu2;

        $jadwal->update();
        return redirect('jadwal')->with('info', 'Jadwal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('status','Berhasil di hapus');
    }
}
