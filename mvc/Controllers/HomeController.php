<?php

namespace App\Controllers;
 
use App\Request;
use App\Controller;
use App\Users;



class HomeController extends Controller
{
    
    public function __construct()
    {
    	
    } 

 
    public function home(){ 
 
        $users = Users::all(); 
		return view('index',['data'=>$users]);
    } 


    public function add()
    {   
        
        return view('app/add'); 
    }

    public function update(Request $req)
    {   

        dd($req->all());
    }
 
 


}
