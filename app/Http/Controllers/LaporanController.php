<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hclient;
use App\paket;
use DB;
use DateTime;
use File;
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
			$data = "Laporan Bulan ".$month." Tahun ".$year; 

	        $namapdf = 'pdf/'.$data.'.pdf';

	        $pdf = PDF::loadview('pdf/laporan',compact('laporan'));

	        $pdf->save($namapdf);
	        
	        // $file = "aaaa";
	        
	        return $namapdf;
    	}
    }
}
