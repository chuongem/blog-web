<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardItem extends Component
{
    public string $title;
    public string $subTitle;
    public string $image;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $subTitle
     * @param string $image
     */
    public function __construct(string $title, string $subTitle, string $image)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-item');
    }
}
