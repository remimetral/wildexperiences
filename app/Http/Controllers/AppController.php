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
	 * Show the application activities to the user.
	 *
	 * @return Response
	 */
	public function activities()
	{
		$this->setLocale();
		$winter = App\Page::whereSlug('winter-activities')->firstOrFail();
		$summer = App\Page::whereSlug('summer-activities')->firstOrFail();
		return view('pages.activities', ['page_id' => 'activities'], compact('winter', 'summer'));
	}

	/**
	 * Show the application pack to the user.
	 *
	 * @return Response
	 */
	public function pack()
	{
		$this->setLocale();
		$posts = App\Post::all();
		return view('pages.pack', ['page_id' => 'pack'], compact('posts'));
	}

	/**
	 * Show the application calendar to the user.
	 *
	 * @return Response
	 */
	public function calendar()
	{
		$this->setLocale();
		return view('pages.calendar', ['page_id' => 'calendar']);
	}

	/**
	 * Show the application location to the user.
	 *
	 * @return Response
	 */
	public function location()
	{
		$this->setLocale();
		$location = App\Page::whereSlug('location')->firstOrFail();
		return view('pages.location', ['page_id' => 'location'], compact('location'));
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
