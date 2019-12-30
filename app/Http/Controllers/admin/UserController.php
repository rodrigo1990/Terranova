<?php

namespace App\Http\Controllers\admin;

use App\Services\admin\SessionService;
use Illuminate\Http\Request;
use App\User;
use  App\Http\Controllers\admin\Controller;
Use View;


class UserController extends Controller
{

	protected $sessionService;


   function __construct(SessionService $sessionService){
      $this->sessionService=$sessionService;
    }

	public function login(Request $request){



		$exist = User::where('email',$request->username)
				  		->where('password',md5($request->password))
    				  	->exists();


    	if($exist==true){

    		$this->sessionService->storeSessionData($request);
    		return "true";
    	
    	}else{
    		return "false";
    	}

	}  


	public function logout(){
		return	$this->sessionService->deleteSessionData();
	} 


	public function users(){

		return User::all();

	}


	public function upload(Request $request){
		return 'request';
	}    
}
