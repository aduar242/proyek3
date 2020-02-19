<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ReminderEmail;
use Illuminate\Support\Facades\Mail;
use App\Client;
use DB;
use App\Paket;
use App\Setting;
use App\Kategori;
use App\Map;
use Carbon;

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
        $mytime = Carbon\Carbon::now();
        $input = $request->all();
        if(isset($input['id_paket'])){
            $data = Client::where('id_paket',$input['id_paket'])->get();
            $kategoryCount = $this->getKategoriCount($input['id_paket']);
        }
        else{
            $data = Client::all();    
            $kategoryCount = $this->getKategoriCount();
        }
        
        $kategori = Paket::pluck('nama','id');
        return view('map',compact('data','kategori','kategoryCount','mytime'));
    }

    public function getKategoriCount($kat_id='')
    {
        $data = DB::table('pakets')
            ->select('pakets.id','pakets.nama',DB::raw("count(clients.id) as jml"))
            ->join('clients','clients.id_paket','=','pakets.id')
            ->groupBy('pakets.id','pakets.nama');

        if($kat_id){
            $data = $data->where('clients.id_paket',$kat_id);
        }
        

            return $data->get();
    }

    public function home()
    {
        $client = Client::with('paket')->get();
    
        return view('home',compact('client'));
    }

    public function ingatkan(){

        Mail::to("juanjuliyanto79@gmail.com")->send(new ReminderEmail());
        
        return "Reminder Email Berhasil Dikirim";
    }
}
