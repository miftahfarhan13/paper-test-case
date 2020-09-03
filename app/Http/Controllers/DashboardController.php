<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {   
        // if ($request->session()->exists('token')) {
        //     return redirect('dashboard');
        // }
        $data = $request->session()->all();
        $datajson = json_encode($data); 
        return view('dashboard', ['name'=> $datajson]);
        
    }

    public function login(Request $request)
    {
            $username = $request->username;
            $password = $request->password;

            $response = Http::withHeaders([
                'Content-Type' => 'application/json; charset=utf-8',
            
            ])->post('https://development.paper.id:3500/test-case/api/v1/login', [
                'username' => $username,
                'password' => $password,
            ]);

            $last_login = json_decode($response)->last_login;   
            $name = json_decode($response)->name; 
            $token = json_decode($response)->token;  
            
            session([
                'last_login' => $last_login,
                'name' => $name,
                'token'=> $token
            ]);

            return redirect('dashboard');
    }
}
