<?php

namespace App\View\Components\transaksi;

use Illuminate\View\Component;

class transaksiFormTwo extends Component
{
    public $kodetrans;
    public $pelanggan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($kodetrans=null,$pelanggan)
    {
        $this->kodetrans = $kodetrans;
        $this->pelanggan = $pelanggan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components..transaksi.transaksi-form-two');
    }
}
