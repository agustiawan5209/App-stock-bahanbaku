<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Bawaan;
use App\Models\BahanBaku;
use App\Http\Requests\StoreBahanBakuRequest;
use App\Http\Requests\UpdateBahanBakuRequest;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cek()
    {
        $carbon = Carbon::now()->format('Y-m-d');
        // dd([$carbon, $this->produk_jadi]);
        $stock = Stock::all();
        // dd($stock);
        $df = Bawaan::all();
        $i = 0;
        $arr = [];
        for ($i; $i < $df->count(); $i++) {
            $arr[] = ($df[$i]['bbs'] * $this->produk_jadi) / $df[$i]['volume'];
        }
        // dd($stock);
        // menentukan Default value Atas Persediaan Barang;
        // menentukan default Mkasimal
        $this->DUS_dus = floor($arr[0]);
        $this->DUS_pipet = floor($arr[1]);
        $this->DUS_cup = floor($arr[2]);
        $this->DUS_penutup = floor($arr[3]);

        $stock1 =  Stock::where('id', 1)->where('jumlah_stock', '<', intval($this->DUS_dus))->get();
        if ($stock1->count() > 0) {
            session()->flash('message', "Maaf Bahan Baku Dus Tidak Mencukupi ");
            $this->invalidBTN = false;
        } else {
            $this->invalidBTN = true;
        }
        $stock2 =  Stock::where('id', 2)->where('jumlah_stock', '<', intval($this->DUS_pipet))->get();
        if ($stock2->count() > 0) {
            session()->flash('message', "Maaf Bahan Baku Pipet Tidak Mencukupi ");
            $this->invalidBTN = false;
        } else {
            $this->invalidBTN = true;
        }
        $stock3 =  Stock::where('id', 3)->where('jumlah_stock', '<', intval($this->DUS_cup))->get();
        if ($stock3->count() > 0) {
            session()->flash('message', "Maaf Bahan Baku Cup Tidak Mencukupi ");
            $this->invalidBTN = false;
        } else {
            $this->invalidBTN = true;
        }
        $stock4 =  Stock::where('id', 4)->where('jumlah_stock', '<', intval($this->DUS_penutup))->get();
        if ($stock4->count() > 0) {
            session()->flash('message', "Maaf Bahan Lid Cup/Penutup Tidak Mencukupi ");
            $this->invalidBTN = false;
        } else {
            $this->invalidBTN = true;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBahanBakuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBahanBakuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(BahanBaku $bahanBaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function edit(BahanBaku $bahanBaku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanBakuRequest  $request
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBahanBakuRequest $request, BahanBaku $bahanBaku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahanBaku $bahanBaku)
    {
        //
    }
}
