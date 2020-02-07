<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
use App\Paket;
use App\Setting;
use App\Kategori;
use App\Map;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {
        $input = $request->all();
        if(isset($input['kategori_id'])){
            $data = Map::where('kategori_id',$input['kategori_id'])->get();
            $kategoryCount = $this->getKategoriCount($input['kategori_id']);
        }
        else{
            $data = Map::all();    
            $kategoryCount = $this->getKategoriCount();
        }
        
        $kategori = Kategori::pluck('nama','id');
        return view('map',compact('data','kategori','kategoryCount'));
    }

    public function getKategoriCount($kat_id='')
    {
        $data = DB::table('data_kategori')
            ->select('data_kategori.id','data_kategori.nama',DB::raw("count(data_maps.id) as jml"))
            ->join('data_maps','data_maps.kategori_id','=','data_kategori.id')
            ->groupBy('data_kategori.id','data_kategori.nama');

        if($kat_id){
            $data = $data->where('data_maps.kategori_id',$kat_id);
        }
        

            return $data->get();
    }

    public function home()
    {
        $client = Client::with('paket')->get();
    
        return view('home',compact('client'));
    }
}
