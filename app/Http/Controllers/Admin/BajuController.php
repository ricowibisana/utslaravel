<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Baju;
use App\Jenis;


use App\Exports\BajuExport;
use Maatwebsite\Excel\Facades\Excel;

class BajuController extends Controller
{
    public function welcome(Request $request) {

    	// $filltable = Baju::all();
    	// $filltable = Baju::paginate(3);
    	// $divisi = Divisi::all();
    	// return view('welcome', ['filltable' => $filltable], compact('filltable', 'divisi'));

    	$filltable = Baju::when($request->search, function($query) use($request){
    		$query->where('nama', 'LIKE', '%'.$request->search.'%');
    	})->paginate(3);

    	return view('welcome', compact('filltable'));
	}

	// public function search(Request $request) {
	// 	$cari = $request->cari;

	// 	$karyawan = DB::table('karyawan')
	// 				->where('nik', 'LIKE', "%{$request->search}%")
	// 				->orWhere('nama', 'LIKE', "%{$request->search}%")
	// 				->orWhere('alamat', 'LIKE', "%{$request->search}%")
	// 				->orWhere('email', 'LIKE', "%{$request->search}%")
	// 				->paginate();
	// 	return view('welcome', ['filltable' => $filltable]);
	// }

	public function create() {	
		$jenis = Jenis::all();
    	return view('create', compact('jenis'));
	}

	public function store(Request $request) {	
		$this->validate($request, [
			'nama' => 'required',
			'harga' => 'required',
			'jenis' => 'required',
			'foto' => 'required|image|mimes:jpeg,png,jpg|max:4096'
		]);

		$file = $request->file('foto');
		$imageBaju = $request->nama . '_' . date('dmY') . '.' . $file->getClientOriginalExtension();
		$file->move(public_path("uploads "), $imageBaju);
		// $insert['foto'] = "$imageBaju";

		Baju::create([
			'nama' => $request->nama,
			'harga' => $request->harga,
			'jenis' => $request->jenis,
			'foto' => $insert['foto'] = "$imageBaju"
		]);

    	return redirect('/welcome');
	}

	public function delete($id){

		$delete = Baju::find($id);
    	$delete->delete();

    	return redirect('welcome');
	}

	public function update($id){
		$datas = Baju::select('id', 'nama', 'harga', 'jenis','foto')
                    ->where('id', '=', $id)
    				->first();
    	$jenis = Jenis::all();
    	return view('update', compact('datas', 'jenis'));
	}

	public function updateStore($id,Request $request){
		$this->validate($request, [
			'nama' => 'required',
			'harga' => 'required',
			'jenis' => 'required',
			'foto' => 'required|image|mimes:jpeg,png,jpg|max:4096'
		]);

		$table = Baju::find($id);

		if ($file = $request->file('foto')) {
			$usedImageBaju = public_path("uploads/{ $table->foto }");

			if (File::exists($usedImageBaju)) {
				unlink($usedImageBaju);
			}

			$destinationPath = 'uploads/';
			$imageBaju = $request->nama . '_' . date('dmY') . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $imageBaju);


			$id = $request['id'];
	    	$update = Baju::where('id', $id)->first();
	        $update->nama = $request['nama'];
	        $update->harga = $request['harga'];
	        $update->jenis = $request['jenis'];
	        $update->foto = $insert['foto'] = "$imageBaju";

	        $update->update();
		}


    	return redirect('welcome');
	}

	public function export_excel(){
		return Excel::download(new BajuExport, date('d-m-Y_').'baju_'.date('h-ia').'.xlsx');
	}
}
