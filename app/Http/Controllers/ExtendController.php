<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Client;
use App\Paket;
use App\Hclient;
use DateTime;
use PDF;
use DB;
use File;
use App\Mail\InvoiceMail;
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
        $email = $dat->email;
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
       Hclient::create([
        'id_cl' => $request->id,
        'id_paket' => $request->paket,
        'masa_aktif' => $now,
        'masa_kadaluwarsa' => $tanggal,
        'invoice' => $invoice
       ]);
        $namapdf = 'pdf/'.$invoice.'.pdf';
        $client = Hclient::with(['client','paket'])->where('invoice',$invoice)->get();
        $pdf = PDF::loadview('pdf/transaksi',['client'=>$client]);
        $pdf->save($namapdf);
         // Kirim Mail
         Mail::to($email)->send(new InvoiceMail($invoice));
         // Delete PDF
         File::delete($namapdf);
         // Return View
         $client = Client::with('paket')->get();
         return redirect(route('home'));
   }
} 
