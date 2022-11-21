<?php

namespace App\View\Components\pesan;

use App\Models\BahanBaku;
use Illuminate\View\Component;

class itemTableCell extends Component
{
    public $itemID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemID)
    {
        $this->itemID = $itemID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bb = BahanBaku::where('suppliers_id', $this->itemID);
        return view('components.pesan.item-table-cell',[
            'bb'=> $bb
        ]);
    }
}
