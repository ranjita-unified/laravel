<?php namespace App\Http\Controllers;

namespace Jenssegers\Mongodb\MongodbServiceProvider;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		try{
			$mongo = new Mongo(); //create a connection to MongoDB
			$databases = $mongo->listDBs(); //List all databases
			echo '<pre>';
			print_r($databases);
			$mongo->close();
			} catch(MongoConnectionException $e) {
			//handle connection error
			die($e->getMessage());
			}
		return view('welcome');
		
			
		
	}

}
