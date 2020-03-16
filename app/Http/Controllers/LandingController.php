<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Baju;
use App\Jenis;
use PDF;

class LandingController extends Controller
{
    public function index(Request $request){

         $baju = Baju::all();

    	return view('landing', compact('baju'));
    }

    public function buka(){
    	$user = User::all();
    	$baju = Baju::all();
    	$jenis = Jenis::all();

    	return view('pdf', compact('user', 'baju', 'jenis') );
    }

    public function cetak_pdf(){
    	$user = User::all();
    	$baju = Baju::all();
    	$jenis = Jenis::all();
 
    	$pdf = PDF::loadview('pdf', compact('user', 'baju', 'jenis'));
    	return $pdf->download('NF-Corp Data '.date('d-m-Y ').'on'.date(' h-ia').'.pdf');
    }
}
