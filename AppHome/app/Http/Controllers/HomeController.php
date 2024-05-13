<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $users = [
            ['id'=> '1', 'nom'=> 'yousra', 'metier'=>'Developpeur'],
            ['id'=> '2', 'nom'=> 'jawad', 'metier'=>'Ingenieur'],
            ['id'=> '3', 'nom'=> 'bahae', 'metier'=>'Directeur'],
            ['id'=> '4', 'nom'=> 'lilia', 'metier'=>'Entrepreneur']
        ];
        return view('home',compact('users'));
    }
}
