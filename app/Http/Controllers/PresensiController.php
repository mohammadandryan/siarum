<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\SubkController;
use App\Models\Subk;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subk_id)
    {
        $subk = Subk::find($subk_id);
        return view('presensi.create', compact('subk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subk_id, $nim)
    {
        $exis = Presensi::where('subk_id',"=",$subk_id)->where('nim',"=",$nim)->get();
        if ($exis->count()<1) {
            $datas = [
                'nim' => $nim,
                'subk_id' => $subk_id
            ];

            Presensi::create($datas);
            session()->flash('success', 'success');
            return redirect(url('/presensi/'.$subk_id));
        } else {
            session()->flash('success', 'success');
            return redirect(url('/presensi/'.$subk_id));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
    public function scan($subk_id, $nim)
    {
        return view('presensi.scan')->with([
            'subk_id'=> $subk_id,
            'nim'=> $nim,
        ]);
    }
}
