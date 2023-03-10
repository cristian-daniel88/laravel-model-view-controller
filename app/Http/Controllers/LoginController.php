<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start(); 
        $_SESSION["username"] = '';
        $_SESSION["id"] = '';
        return view('login');
    }


    public function login(Request $request ) 
    {
        session_start(); 
        $_SESSION["username"] = '';
        $_SESSION["id"] = '';
        $users = User::all();
        
        foreach ($users as $user) {
            if  
            (
            $user->username ==  $request->input('username') and 
            password_verify($request->input('password'), $user->password_hash)
            ) 
            {

            $_SESSION["username"] = $user->username;
            $_SESSION["id"] = $user->id;

            return redirect('/home');
            //return redirect()->action([AppController::class, 'index']);
            } else {
              return  view('login', ['error' => 'User & Password incorrect']);
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
