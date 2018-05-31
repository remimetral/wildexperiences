<?php

namespace App\Http\Controllers;

use App;
use Config;
use Redirect;
use Request;
use Route;
use Session;
use View;

use App\Http\Controllers\Base\Controller;

class AppController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| App Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('locale');
	}

	/**
	 * Show the application splash to the user.
	 *
	 * @return Redirect
	 */
	public function splash()
	{
		return Redirect::route('home-'.Session::get('locale', Config::get('app.locale')));
	}

	/**
	 * Show the application home to the user.
	 *
	 * @return Response
	 */
	public function home()
	{
		$this->setLocale();
		return view('pages.home', ['page_id' => 'home']);
	}

	/**
	 * Show the application about to the user.
	 *
	 * @return Response
	 */
	public function about()
	{
		$this->setLocale();
		return view('pages.about', ['page_id' => 'about']);
	}

	/**
	 * Set the locale language.
	 */
	public function setLocale()
	{
		$lang = explode('-', Route::currentRouteName())[1];

		App::setLocale($lang);
		Session::put('locale', $lang);

		if ($lang == 'fr') {
			View::share([
				'lang' => 'fr',
				'langreverse' => 'en'
			]);
		} else {
			View::share([
				'lang' => 'en',
				'langreverse' => 'fr'
			]);
		}
	}

	/**
     * Change the locale language.
	 *
     * @param  Request $request
     * @return Response
     */
    public function changeLocale(Request $request)
    {
        $this->validate($request, ['locale' => 'required|in:fr,en']);

		App::setLocale($request->locale);
        Session::put('locale', $request->locale);

		return Redirect::route('home-'.$request->locale);
    }

}
