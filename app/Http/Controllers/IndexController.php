<?php namespace App\Http\Controllers;

use App\User;
use Auth;

class IndexController extends Controller {
	
	public function __construct()
	{
		//$this->middleware('auth');
		//redirects to login
	}

	public function instantiate()
	{
		
		
		$username = Auth::user();
		$title = getenv('SITE_TITLE').getenv('SITE_MOTTO');
		
		return view('index', compact('title','username'));
	}

}
