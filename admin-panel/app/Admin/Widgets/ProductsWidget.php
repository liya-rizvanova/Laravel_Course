<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use TCG\Voyager\Widgets\BaseDimmer;

class ProductsWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = Product::count();
        $string = 'Products';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} products in your database.",
            'button' => [
                'text' => 'View all products',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }
}
