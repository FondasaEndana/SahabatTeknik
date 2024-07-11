<?php

namespace App\View\Components\pelanggan;

use Illuminate\View\Component;

class pelangganTable extends Component
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
        return view('components.pelanggan.pelanggan-table');
    }
}
