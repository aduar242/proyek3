<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class ExtendController extends Controller
{
   public function show($id)
   {
   		$client = Client::where('id',$id)->get();
   		return view('extend.index',compact('client'));
   }
}
