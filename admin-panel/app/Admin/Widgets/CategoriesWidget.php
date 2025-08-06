<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use TCG\Voyager\Widgets\BaseDimmer;

class CategoriesWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = Category::count();
        $string = 'Categories';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} categories in your database.",
            'button' => [
                'text' => 'View all categories',
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }
}
