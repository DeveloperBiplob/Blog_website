<?php

namespace App\View\Components\Pertial;

use Illuminate\View\Component;

class WidgetComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $latestPosts;
    public $categories;
    public $tags;
    public function __construct($latestPosts, $categories, $tags)
    {
        $this->latestPosts = $latestPosts;
        $this->categories = $categories;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pertial.widget-component');
    }
}
