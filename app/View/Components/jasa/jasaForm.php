<?php

namespace App\View\Components\jasa;

use Illuminate\View\Component;

class jasaForm extends Component
{
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item=null)
    {
        $this->item = $item;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.jasa.jasa-form');
    }
}
