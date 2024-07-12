<?php

namespace App\View\Components\jasa;

use Illuminate\View\Component;

class jasaTableOne extends Component
{
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components..jasa.jasa-table-one');
    }
}
