<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Client;
use App\Kecamatan;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::All();
        $clients = Client::with('paket')->orderBy('created_at', 'DESC')->paginate(10);
        $pakets = Paket::orderBy('nama', 'DESC')->get();
        return view('clients.index', compact('clients','pakets','kecamatan')); 
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
            'id_paket' => 'required|exists:pakets,id',
            'lat' => 'required',
            'long' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'no_rumah' => 'required',
            'masa_aktif' => 'required',
            'masa_kadaluwarsa' => 'required',
            'invoice' => 'required'
        ]);
        
        try {
            $clients = Client::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'id_paket' => $request->id_paket,
                'desa' => $request->desa,
                'lat' => $request->lat,
                'long' => $request->long,
                'kecamatan' => $request->kecamatan,
                'no_rumah' => $request->no_rumah,
                'masa_aktif' => $request->masa_aktif,
                'masa_kadaluwarsa' => $request->masa_kadaluwarsa
            ]);
            $id = $clients->id;
            $h_pel = DB::table('history_p');
            $h_pel->insert([
                'id_cl' => $id,
                'id_paket' => $request->id_paket,
                'masa_aktif' => $request->masa_aktif,
                'masa_kadaluwarsa' => $request->masa_kadaluwarsa,
                'invoice' => $request->invoice

            ]);

            return redirect(route('client'))->with(['success' => '<string>' , $clients->nama . '</strong> Ditambahkan']);
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
        $pakets = Paket::orderBy('nama', 'ASC')->get();
        return view('clients.edit', compact('clients','pakets'));
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
            'desa' => 'required',
            'kecamatan' => 'required',
            'no_rumah' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        try {
            $client = Client::findOrFail($id);
            $client->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'no_rumah' => $request->no_rumah,
                'lat' => $request->lat,
                'long' => $request->long,
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
        return redirect()->back()->with(['success' => '<strong>' . $clients->name . '</strong> Telah Dihapus!']);
    }

    public function kecamatan()
    {
        $kecamatan = Kecamatan::All();
        return view('clients.index', compact('kecamatan')); 
    }

    public function alamat($kecamatan)
    {
        $kelurahan = DB::table('desa')->where('nm_kecamatan',$kecamatan)->get();
        return response()->json([$kelurahan]);
    }


}
