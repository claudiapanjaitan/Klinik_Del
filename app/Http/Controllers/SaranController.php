<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Http\Requests\StoreSaranRequest;
use App\Http\Requests\UpdateSaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('saran.saran', [
            // 'komentar' => Saran::Where('parent_id',null)->get(),
            'saran' => Saran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saran.saran', ["data" => new Saran()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'user_id' => Auth::user()->id,
            'user_id' => 'Auth::id()->id',
            // 'username' => 'required',
            'saran' => 'required',
        ],[
            'saran.required' => 'Saran field is required.'
        ]);

        $saran = new Saran();
        $saran->user_id = Auth::user()->id;
        $saran->username = Auth::user()->nama;
        $saran->saran = $request->saran;

        $saran->save();
        // dd($request->all());
        return redirect('/saran')->with('success', 'Saran Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saran  $saran
     * @return \Illuminate\Http\Response
     */
    public function show(Saran $saran, $id)
    {
        $data = Saran::findOrFail($id);
        return view('saran.saran')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saran  $saran
     * @return \Illuminate\Http\Response
     */
    public function edit(Saran $saran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaranRequest  $request
     * @param  \App\Models\Saran  $saran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaranRequest $request, Saran $saran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saran  $saran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saran $saran)
    {
        $saran->delete();
        // saran::destroy($saran->id);
        return redirect('saran')->with('status','Berhasil di hapus');
    }
}
