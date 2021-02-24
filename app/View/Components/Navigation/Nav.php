<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class Nav extends Component
{
    /**
     * Nav Type
     *
     * @var string
     */
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation.nav');
    }
}
