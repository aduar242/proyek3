<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('paket')->orderBy('created_at', 'DESC')->paginate(10);
        $pakets = Paket::orderBy('nama', 'ASC')->get();
        return view('clients.index', compact('clients','pakets')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_paket' => 'required|exits:pakets,id',
            'desa' => 'required',
            'kecamatan' => 'required',
            'no_rumah' => 'required',
            'masa_aktif' => 'required',
            'masa_kadaluwarsa' => 'required',
        ]);
        
        try {
            $client = Client::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'id_paket' => $request->id_paket,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'no_rumah' => $request->no_rumah,
                'masa_aktif' => $request->masa_aktif,
                'masa_kadaluwarsa' => $request->masa_kadaluwarsa,
            ]);
            return redirect(route('client'))->with(['success' => '<string>' , $client->nama . '</strong> Ditambahkan']);
        } catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        return view('clients.edit', compact('clients'));
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
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_paket' => 'required|exists:pakets,id',
            'desa' => 'required',
            'kecamatan' => 'required',
            'no_rumah' => 'required',
            'masa_aktif' => 'required',
            'masa_kadaluwarsa' => 'required'
        ]);
        try {
            $client = Client::findOrFail($id);
            $client->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'id_paket' => $request->id_paket,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'no_rumah' => $request->no_rumah,
                'masa_aktif' => $request->masa_aktif,
                'masa_kadaluwarsa' => $request->masa_kadaluwarsa
            ]);
            return redirect(route('client'))
            ->with(['success' => '<strong>' . $client->nama . '</strong> Diperbaharui']);
        }
        catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
        return redirect(route('client'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::findOrFail($id);
        $clients->delete();
        return redirect()->route('client');
    }
}
