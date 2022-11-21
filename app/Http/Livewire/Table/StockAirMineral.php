<?php

namespace App\Http\Livewire\Table;

use App\Models\StockBahanBakuAirMineral;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StockAirMineral extends LivewireDatatable
{
    public function builder()
    {
        return StockBahanBakuAirMineral::query();
    }

        public function columns()
    {
        return  [
            NumberColumn::name('id')->label('No')->defaultSort('asc')->sortBy('id'),
            NumberColumn::name('default_bahan_air.bahan_baku')->label('Bahan Baku')->searchable(),
            NumberColumn::name('jumlah_stock')->label('Stock Yang Tersedia')->editable(),
            Column::name('satuan')->label('Satuan'),
            DateColumn::name('tgl_stock')->label('Tanggal Update'),
        ];
    }

}
