<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $clinic = Clinic::orderBy('id','DESC')->when($search, function ($query, $search){
            return $query->where('petugas','like',"%{$search}%")->orWhere('NIP','like',"%{$search}%")->orWhere('hari','like',"%{$search}%")->orWhere('waktu','like',"%{$search}%");
        })->paginate(6);
        $clinic->appends($request->all());
        return view('aboutclinic.clinic', ['aboutclinic' => $clinic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutclinic.create',["aboutclinic" => Clinic::all()]);
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
            'user_id' => 'Auth::id()->id',
            'nama' => 'required|min:4',
            'deskripsi' => 'required',
            'gambar' => 'required||mimes:jpg,jpeg,png,gif,svg'
        ],[
            'nama.required'=>'Nama Fasilitas field is required.',
            'nama.min'=>'Nama Fasilitas at least 4 characters.',
            'deskripsi.required'=>'Deskripsi Fasilitas field is required.',
            'gambar.required'=>'Gambar field is required.',
            'gambar.mimes'=>' Gambar must be a file of type: jpg, jpeg, png, gif, svg.',
        ]);

        $file = $request->file('gambar');
        $namaFile =$file->getClientOriginalName();
        $tujuanFile = 'fasilitas';
        $file->move($tujuanFile,$namaFile);

        $clinic = new Clinic;
        $clinic->user_id = Auth::user()->id;
        $clinic->nama = $request->nama;
        $clinic->deskripsi = $request->deskripsi;
        $clinic->gambar = $namaFile;
        
        $clinic->save();
        return redirect('aboutclinic')->with('success', 'Fasilitas Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $aboutclinic)
    {
        // $data = Clinic::all();
        return view('aboutclinic.edit', compact('aboutclinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clinic)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif,svg'
        ],[
            'nama.required'=>'Nama Fasilitas field is required.',
            'nama.min'=>'Nama Fasilitas at least 4 characters.',
            'deskripsi.required'=>'Deskripsi Fasilitas field is required.',
            'gambar.mimes'=>' Gambar must be a file of type: jpg, jpeg, png, gif, svg.',
        ]);
        
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'fasilitas';
    
            $file->move($tujuanFile, $namaFile);
    
            Clinic::where('id',$clinic)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar' =>  $namaFile
            ]);
        }else{
            Clinic::where('id',$clinic)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]); 
        }
        
        // $clinic->update();
        return redirect('aboutclinic')->with('info', 'Fasilitas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic=Clinic::find($id);
        $clinic->delete();
        return back()->with('status','Fasilitas berhasil dihapus');
    }
}
