<?php

namespace App\View\Composers;

use Illuminate\View\View;
use  App\Models\Slider;

class SliderComposer
{

    protected $users;


    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $sliders =  Slider::all();
        $view->with('sliders', $sliders);
    }
}
