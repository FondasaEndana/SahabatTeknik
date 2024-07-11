<?php

namespace App\View\Components\transaksi;

use Illuminate\View\Component;

class transaksiFormTwoPelanggan extends Component
{
    public $kodetrans;
    public $pelanggan;
    public $getPelanggan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($kodetrans=null,$pelanggan,$getPelanggan)
    {
        $this->kodetrans = $kodetrans;
        $this->pelanggan = $pelanggan;
        $this->getPelanggan = $getPelanggan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.transaksi.transaksi-form-two-pelanggan');
    }
}
