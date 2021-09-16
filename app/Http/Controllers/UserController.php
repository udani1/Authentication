<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        $users = User ::orderBy('id','desc')->get(); //Id anuwa decending widihata oder karai
        return view ('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $roles = Role::all();
        return view ('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            'password'=>'required |between:8,255|confirmed',
            'password_confirmation'=>'required'
        ]);

        // dd($request);

        $user = new User;
        $user->name = $request->name;
        // $user->name = "Sammani";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show ($id)     //(User $user)<-this was I changed as ($id)
    {  //this below codes used for work the 'show' button as show the details of one row in table
       $user = User::find($id);
       return view ('admin.users.show' , compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   //this used for load the edit page when the cliked 'edit' button
        return view ('admin.users.edit' , compact('user')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            'password'=>'required |between:8,255|confirmed',
            'password_confirmation'=>'required'
        ]);

        // $user = User::find($request->id); we not this code because had define patan gannakotama function eka (User $user widihata)
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect ('/users');
    }
}
