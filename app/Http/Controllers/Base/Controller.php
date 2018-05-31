<?php namespace App\Http\Controllers\Base;

use JavaScript;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Base Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	use DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->middleware('guest');

		JavaScript::put([
			'lang' => Config::get('app.locale'),
			'agent_browser' => Agent::browser(),
			'agent_browser_version' => Agent::version(Agent::browser()),
			'plateform' => Agent::platform(),
			'plateform_version' => Agent::version(Agent::platform()),
			'agent_isMobile' => Agent::isMobile(),
			'agent_isTablet' => Agent::isTabet(),
		]);

		/*
		view()->share('lang', Config::get('app.locale'));

		if(Config::get('app.locale') == 'fr'):
			view()->share('langreverse', 'en');
		else:
			view()->share('langreverse', 'fr');
		endif;
		*/

		/**
		* Fix Chrome bug cache.
		*
		* https://code.google.com/p/chromium/issues/detail?id=28035
		*/
		header("Expires: Fri, 01 Jan 1990 00:00:00 GMT");
		header("Pragma: no-cache");
		header("Cache-Control: private, no-cache, must-revalidate, no-store");
		header("Vary: *");
	}

}
