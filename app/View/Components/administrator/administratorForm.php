<?php

namespace App\View\Components\administrator;

use Illuminate\View\Component;

class administratorForm extends Component
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
        return view('components.administrator.administrator-form');
    }
}
