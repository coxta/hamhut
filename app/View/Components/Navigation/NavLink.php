<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class NavLink extends Component
{

    /**
     * Label
     *
     * @var string
     */
    public $label;

    /**
     * Icon
     *
     * @var string
     */
    public $icon;

    /**
     * Active
     *
     * @var string
     */
    public $href;

    /**
     * Active
     *
     * @var boolean
     */
    public $active;

    public function __construct(
        $label = null,
        $icon = null,
        $href = '#',
        $active = false
    ) {
        $this->label = $label;
        $this->icon = 'heroicon-o-' . $icon;
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation.nav-link');
    }
}
