<?php

namespace App\View\Components\restok;

use Illuminate\View\Component;

class restokFormTwo extends Component
{
    public $kodetrans;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($kodetrans=null)
    {
        $this->kodetrans = $kodetrans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components..restok.restok-form-two');
    }
}
