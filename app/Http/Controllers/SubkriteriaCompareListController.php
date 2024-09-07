<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Subkriteria;
use App\Models\SubkriteriaBobot;
use App\Models\SubkriteriaCompareList;
use App\Models\SubkriteriaPerbandingan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSubkriteriaCompareListRequest;
use App\Http\Requests\UpdateSubkriteriaCompareListRequest;

class SubkriteriaCompareListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return view('subkriteriaList.index', [
            'subctr_compare_list' => kriteria::where('store_nilai', true)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('subkriteriaList.opsi.create', [
            'kriteria' => kriteria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubkriteriaCompareListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubkriteriaCompareListRequest $request)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'kriteria_id.*' => 'required|unique:subkriteria_compare_lists,kriteria_id'
        ]);

        foreach ($validated as $key => $value) {
            foreach ($value as $val) {
                var_dump($val);
                SubkriteriaCompareList::create(['kriteria_id' => $val]);
            }
        }

        return redirect('/hitung-subkriteria')->withToastSuccess('Subkriteria sudah siap dianalisa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubkriteriaCompareList  $subkriteriaCompareList
     * @return \Illuminate\Http\Response
     */
    public function show(kriteria $hitung_subkriterium)
    {
        $this->authorize('isAdmin');
        if($hitung_subkriterium->is_calculated == false){
            return redirect()->back()->with('errors', 'Harap melakukan analisa terlebih dahulu!');
        }else{
            return view('subkriteriaList.opsi.show', [
                'subkriteria' => $hitung_subkriterium->Subkriteria,
                'konsistensi' => $hitung_subkriterium
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubkriteriaCompareList  $subkriteriaCompareList
     * @return \Illuminate\Http\Response
     */
    public function edit(SubkriteriaCompareList $subkriteriaCompareList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubkriteriaCompareListRequest  $request
     * @param  \App\Models\SubkriteriaCompareList  $subkriteriaCompareList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubkriteriaCompareListRequest $request, SubkriteriaCompareList $subkriteriaCompareList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubkriteriaCompareList  $subkriteriaCompareList
     * @return \Illuminate\Http\Response
     */
    public function destroy(kriteria $hitung_subkriterium)
    {
        $this->authorize('isAdmin');
        if($hitung_subkriterium->SubkriteriaPerbandingan->isNotEmpty()){
            foreach ($hitung_subkriterium->SubkriteriaPerbandingan as $key => $value) {
                SubkriteriaPerbandingan::destroy($value->id);
            }
        }

        foreach ($hitung_subkriterium->Subkriteria as $key => $value) {
            Subkriteria::where('id', $value->id)->update(['weight' => 0]);
        }
        
        kriteria::where('id', $hitung_subkriterium->id)->update([
            "is_calculated" => false,
            "l_max" => 0,
            "c_index" => 0,
            "c_ratio" => 0
        ]);
        return redirect('/hitung-subkriteria')->withToastSuccess('Analisa subkriteria berhasil dihapus!');
    }

    public function analisa(kriteria $kriteria){
        $this->authorize('isAdmin');
        if($kriteria->is_calculated == true){
            return redirect()->back()->with('errors', 'Harap reset analisa sebelum melanjutkan!');
        }else{
            $subctr = $kriteria->Subkriteria;
            if ($subctr->count() < 3) {
                return redirect()->back()->with('errors', 'Minimal ada 3 subkriteria untuk melanjutkan analisa!');
            }else{
                $inten = [
                    "1" => "Sama pentingnya",
                    "3" => "Cukup penting", 
                    "5" => "Lebih penting",
                    "7" => "Sangat lebih penting",
                    "9" => "Mutlak lebih penting",
                    "2,4,6,8" => "Apabila ragu dengan dua nilai yang berdekatan",
                    "Kebalikan" => "Perbandingan secara terbalik, nilai 1 akan dibagi dengan nilai intensitas"
                ];
                return view('subkriteriaList.opsi.analisa',[
                    'list' => $kriteria,
                    'subkriteria' => $subctr->toArray(),
                    'intensitas' => $inten
                ]);
                
            }
        }
    }
}
