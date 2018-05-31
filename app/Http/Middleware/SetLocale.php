<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Session;
use View;

class SetLocale
{
    /**
     * The availables languages.
     *
     * @array Lang
     */
    protected $lang = ['fr', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = substr($request->getPreferredLanguage(), 0, 2);

            if( in_array($locale, $this->lang) ) {
                Session::put('locale', $locale);
            } else {
                Session::put('locale', Config::get('app.locale'));
            }
        }

        /**
         * Set the local config.
         */
        Config::set('app.locale', $locale);

        /**
         * Share the config to the view.
         */
        if ($locale == 'fr') {
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

        return $next($request);
    }
}
