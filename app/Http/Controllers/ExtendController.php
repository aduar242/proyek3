<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Paket;
use DateTime;

class ExtendController extends Controller
{
   public function show($id)
   {
   		$client = Client::where('id',$id)->get();
   		$paket  = Paket::get(); 
   		return view('extend.index',compact('client','paket'));
   }
   public function harga(Request $request){
   		if ($request->ajax()) {
   			$data = $request->id;
   			$paket = Paket::where('id',$data)->pluck("harga");
	  		return $paket;
   		}
   }
   public function update(Request $request){
         $invoice = "TW";
         $invoice .= date("YmdHis");
   		$data = Client::where('id',$request->id)->get();
   		foreach ($data as $dat) {
   			$tanggal = $dat->masa_kadaluarsa;
   		}
   		$now     = date("Y-m-d");
   		$tanggal = new DateTime($tanggal);
   		$tanggal->modify("+30 days");
         $client = Client::findOrFail($request->id);
   		$client->update([
   			'id_paket'=>$request->paket,
   			'masa_kadaluwarsa'=>$tanggal,
   			'masa_aktif'=>$now
   		]);
         $h_pel = DB::table('history_p');
         $h_pel->insert([
          'id_cl' => $request->id,
          'id_paket' => $request->paket,
          'masa_aktif' => $now,
          'masa_kadaluwarsa' => $tanggal,
          'invoice' => $invoice
         ]);

         $client = Client::with('paket')->get();
         return view('home',compact('client'));
   }
} 
