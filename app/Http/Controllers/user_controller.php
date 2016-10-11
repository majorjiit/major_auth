<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Http\Request;

class user_controller extends Controller{
	public $restful = true;

	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show_user_info($username)
	{
		echo "Congratulations ".$username.", you are registered with us!!";
		// /die();
	}

}