<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CreatesController extends Controller
{
    // display all details in home
    public function home(){
    	$users = User::all();
    	return view('home', ['users' => $users]);
    }
    // INSERT USER
    public function add(Request $request){

    	$this -> validate($request, [
    		'name' => 'required',
    		'phone' => 'required',
    		'email' => 'required',
    		'password' => 'required'
    	]);
    	$users = new user;
    	$users -> name = $request -> input('name');
    	$users -> phone = $request -> input('phone');
    	$users -> email = $request -> input('email');
        // encrypted password
    	$users -> password = bcrypt($request->input('password'));
    	$users -> save();
    	return redirect('/') -> with('info', 'User Added Successfully');

    }

    // seleect and goto update page
    public function  update($id){
        $users = User::find($id);
        return view('update', ['users' => $users]);
    }

    // update user details
    public function edit(Request $request,$id){
        $this -> validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $data =  array(
            'name' => $request -> input('name'),
            'phone' => $request -> input('phone'),
            'email' => $request -> input('email')
        );
        User::where('id',$id)
        ->update($data);
        return redirect('/') -> with('info', 'User Updated Successfully');
    }

    // delete user
    public function delete($id){
        User::where('id',$id)
        ->delete();
        return redirect('/') -> with('info', 'User Deleted Successfully');

    }
}
