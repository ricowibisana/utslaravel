<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function welcome(Request $request) {

        $filltable = User::when($request->search, function($query) use($request){
            $query->where('nama', 'LIKE', '%'.$request->search.'%');
        })->paginate(3);

        return view('user', compact('filltable'));

        // $filltable = User::all();
        // $filltable = User::paginate(3);
        // return view('user', ['filltable' => $filltable], compact('filltable'));
    }

	public function postLogin(Request $request){
    	if (Auth::attempt($request->only('username','password'))) {
    		return redirect('/welcome');
    	}

    	return redirect('login')->with('login_failed','Invalid username or password');

        // dd($request->all());
    }    

	public function register(){
		$user = User::all();
    	return view('createLog', compact('user'));
    }    

    public function create(){
        $user = User::all();
        return view('createUser', compact('user'));
    }

    public function store(Request $request){
    	$this->validate($request, [
			'nama' => 'required',
			'username' => 'required',
			'password' => 'required'
		]);

    	$user = new User;
    	$user->nama = $request->nama;
    	$user->username = $request->username;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return redirect('/welcome');
    }

    public function storeUser(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user');
    }    

    public function delete($id_user){

        $delete = User::find($id_user);
        $delete->delete();

        return redirect('user');
    }

    public function logout(){
        Auth::logout();
        return redirect('login') ;
    }

    public function export_excel(){
        return Excel::download(new UserExport, date('d-m-Y_').'user_'.date('h-ia').'.xlsx');
    }
}
