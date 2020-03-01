<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Paket;

class PelayananController extends Controller
{
    public function show(){

    	$client = Client::with('paket')->get();
        return view('pelayanan.index',compact('client'));
    }
}
