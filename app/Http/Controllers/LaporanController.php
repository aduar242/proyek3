<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LaporanController extends Controller
{
    public function index(){
    		$month = date("m");
    		$laporan = DB::table('history_p')->whereMonth('created_at',$month)->orderby('created_at','DESC')->get();
    		return view('laporan.index',compact('laporan'));
    }
}
