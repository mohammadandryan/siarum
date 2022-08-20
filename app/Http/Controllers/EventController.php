<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $events = Event::latest();
        if (request()->has('cari')) {
            $events = $events->where('nama', 'like', '%' . request('cari') . '%')->orWhere('deskripsi', 'like', '%' . request('cari') . '%')->paginate(10)->withQueryString();
        } else {
            $events = $events->paginate(10)->withQueryString();
        }
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'mulai' => 'date',
            'selesai' => 'date',
            'tempat' => 'max:255',
            'link_gambar' => 'max:255',
            'peserta' => 'max:255',
            'penyelenggara' => 'max:255',
            'status' => 'max:255',
        ];
       $validatedData = Validator::make($request->all(), $rules);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        } else {
            $validatedData = $request->all();
            Event::create($validatedData);
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect()->route('events.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $validatedData = $request->validate ([
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'mulai' => 'date',
            'selesai' => 'date',
            'tempat' => 'max:255',
            'link_gambar' => 'image|file|max:2048',
            'peserta' => 'max:255',
            'penyelenggara' => 'max:255',
            'status' => 'max:255',
        ]);
        if($request->file('link_gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['link_gambar'] = $request->file('link_gambar')->store('post-images');
        }
            $event->update($validatedData);
            session()->flash('success', 'Data berhasil diubah');
            return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('events.index');
    }
}
