<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * The header
     *
     * @var string
     */
    public $header;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header)
    {
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation.header');
    }
}
