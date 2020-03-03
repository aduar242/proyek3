<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hclient;
use App\paket;
use DB;
use DateTime;
use File;
use Response,Redirect;
use PDF;

class LaporanController extends Controller
{
    public function show(){
    		$month = date("m");
    		$year = date("Y");
    		$laporan = Hclient::with('paket')
    		->whereMonth('created_at',$month)
    		->whereYear('created_at',$year)
    		->orderby('created_at','DESC')
    		->get();
    		return view('laporan.index',compact('laporan'));
    }

    public function ubah(Request $request){
    	if ($request->ajax()) {

	    	$month= $request->bl;

			$year = $request->th;

			$laporan = Hclient::with('paket')
			->whereMonth('created_at',$month)
			->whereYear('created_at',$year)
			->orderby('created_at','DESC')
			->get();

	        

	        $no=1;

	        $tr = '<!-- Table -->';
	        foreach ($laporan as $sw) {

	        	$tanggal = new DateTime($sw->created_at);
	           	$tanggal = $tanggal->Format("d-m-Y");

	            $tr .= '<tr>
	            <td>'.$no.'</td>
	            <td>'.$sw->invoice.'</td>
	            <td>'.$tanggal.'</td>
	            <td>'.$sw->paket->nama.'</td>
	            <td>'.$sw->masa_aktif.'</td>
	          	<td>'.$sw->masa_kadaluwarsa.'</td>
	        	</tr>';
	            $no++;
	        }

	       	return $tr;
    	}        
    }

    public function cetak(Request $request){
    	if ($request->ajax()) {

    		if($request->bl==00){
    			$month = date("m");
    		}else{
    			$month = $request->bl;
    		}

			$year  = $request->th;

			$laporan = Hclient::with('paket')
			->whereMonth('created_at',$month)
			->whereYear('created_at',$year)
			->orderby('created_at','DESC')
			->get();
			$data = "Laporan Transaksi Bulan ".$month." Tahun ".$year; 

	        $namapdf = 'pdf/'.$data.'.pdf';
	        File::delete($namapdf);
	        $pdf = PDF::loadview('pdf/laporan',compact('laporan','data'));

	        $pdf->save($namapdf);
	        
	        // $file = "aaaa";
	        
	        return $namapdf;
    	}
    }

    public function keuangan(){
    	$month = date("m");
		$year = date("Y");
		$paket = Paket::all();
		$client = Hclient::whereMonth('created_at',$month)
			->whereYear('created_at',$year)
			->get();

		
		return view('laporan.keuangan',compact('paket','client'));
    }

    public function ubahk(Request $request){
    	if ($request->ajax()) {

	    	$month= $request->bl;

			$year = $request->th;

			$paket = Paket::all();

			$client = Hclient::whereMonth('created_at',$month)
    			->whereYear('created_at',$year)
    			->get();

    		$no=1; 
    		$alltotal=0;
    		$tr = '<!-- Table -->';

            foreach($paket as $p){
                $total =0;
                foreach($client as $c){
                    if($p->id==$c->id_paket){
                        $total++;
                    }
                }
                $subtotal = $total*$p->harga; 
                $tr .= '<tr>
                    <td>'.$no.'</td>
                    <td>'.$p->nama.'</td>
                    <td>'.$total.'</td>
                    <td> Rp '.$subtotal.'</td>
                </tr>';
                $alltotal+=$subtotal; 
                $no++;
            }

            $alltotal = "Rp ".$alltotal;

            // return $alltotal;
	       	return Response::json(array(
	       		'tr'=>$tr,
	       		'alltotal'=>$alltotal
			));
    	}        
    }

    public function cetakkeu(Request $request){
    	if ($request->ajax()) {

    		if($request->bl==00){
    			$month = date("m");
    		}else{
    			$month = $request->bl;
    		}

			$year  = $request->th;

			$paket = Paket::get();
			$client = Hclient::whereMonth('created_at',$month)
				->whereYear('created_at',$year)
				->get();

		

			$data = "Laporan Keuangan Bulan ".$month." Tahun ".$year; 

	        $namapdf = 'pdf/'.$data.'.pdf';
	        File::delete($namapdf);
	        $pdf = PDF::loadview('pdf/keuangan',compact('client','paket','data'));

	        $pdf->save($namapdf);
	        
	        // $file = "aaaa";
	        
	        return $namapdf;
    	}
    }
}
