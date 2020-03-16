<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenis;

use App\Exports\JenisExport;
use Maatwebsite\Excel\Facades\Excel;

class JenisController extends Controller
{

	public function welcome(Request $request) {

    	// $filltable = Jenis::all();
    	// $filltable = Jenis::paginate(3);
    	// return view('jenis', ['filltable' => $filltable], compact('filltable'));

		$filltable = Jenis::when($request->search, function($query) use($request){
    		$query->where('nama_jen', 'LIKE', '%'.$request->search.'%');
    	})->paginate(3);

    	return view('jenis', compact('filltable'));

	}

    public function create() {	
		$jenis = Jenis::all();
    	return view('createJen', compact('jenis'));
	}

	public function store(Request $request) {	
		$this->validate($request, [
			'nama_jen' => 'required'
		]);

		Jenis::create([
			'nama_jen' => $request->nama_jen
		]);

    	return redirect('jenis');
	}

	public function delete($id_jenis){

		$delete = Jenis::find($id_jenis);
    	$delete->delete();

    	return redirect('jenis');
	}

	public function update($id_jenis){
		$datas = Jenis::select('id_jenis','nama_jenis')
                    ->where('id_jenis', '=', $id_jenis)
    				->first();
    	return view('updatejenis', compact('datas'));
	}

	public function updateStore($id_jenis,Request $request){
		$this->validate($request, [
			'nama_jenis' => 'required'
		]);

		$table = Jenis::find($id_jenis);

		$id_jenis = $request['id_jenis'];
	    $update = Jenis::where('id_jenis', $id_jenis)->first();
	    $update->nama_jenis = $request['nama_jenis'];
	    $update->update();
		
    	return redirect('jenis');
	}

	public function export_excel(){
		return Excel::download(new JenisExport, date('d-m-Y_').'jenis_'.date('h-ia').'.xlsx');
	}
}
