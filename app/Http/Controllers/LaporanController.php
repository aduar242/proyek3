<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LaporanController extends Controller
{
    public function index(){
    		$laporan = DB::table('history_p','client')->orderby('created_at','DESC')->get();
    		return view('laporan.index',['laporan'=>$laporan]);
    }
}
