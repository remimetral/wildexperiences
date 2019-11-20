<?php

namespace App\Widgets;

use App\Post;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class PackDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Voyager::model('Post')->count();
        $string = trans_choice('admin.dimmer.pack.title', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-paw',
            'title'  => "{$count} {$string}",
            'text'   => __('admin.dimmer.pack.text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('admin.dimmer.pack.link'),
                'link' => route('voyager.pack.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }
}
