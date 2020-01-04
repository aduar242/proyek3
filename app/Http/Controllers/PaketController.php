<?php

namespace App\Http\Controllers;

use App\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::orderBy('nama', 'ASC')->paginate(10);
        return view('pakets.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pakets.index');
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
            'nama' => 'required|string|max:50',
            'harga' => 'required|numeric'
        ]);

        try {
            $pakets = Paket::create([                
                'nama' => $request->nama,
                'harga' => $request->harga,                
            ]);
            return redirect(route('paket'))->with(['success' => '<string>' , $pakets->nama . '</strong> Ditambahkan']);
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
        $pakets = Paket::findOrFail($id);
        return view('pakets.edit', compact('pakets'));
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
            'nama' => 'required|nullable',
            'harga' => 'required',
        ]);

        try {
            $pakets = Paket::findOrFail($id);
            $pakets->update([
                'nama' => $request->nama,
                'harga' => $request->harga
            ]);
            return redirect(route('paket'))->with(['success' => 'Paket :' . $pakets->nama . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pakets = Paket::findOrFail($id);
        $pakets->delete();
        return redirect()->back()->with(['success' => 'Paket: ' . $pakets->nama . 'Telah Dihapus']);
    }
}
