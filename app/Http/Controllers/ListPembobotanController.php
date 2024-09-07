<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Pemberkasan;
use App\Models\KriteriaPlot;
use Illuminate\Http\Request;
use App\Models\KriteriaBobot;
use App\Models\RekrutmenModel;
use App\Models\DaftarRekrutmen;
use App\Models\KriteriaPerbandingan;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorelistPembobotanRequest;
use App\Http\Requests\UpdatelistPembobotanRequest;

class ListPembobotanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        // $list = listPembobotan::first();
        // return $list->RekrutmenModel->name;
        return view('list_pembobotan.index', [
            "rekrutmen" => RekrutmenModel::all()
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelistPembobotanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelistPembobotanRequest $request)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'rekrutmen_model_id' => 'required|unique:list_pembobotans'
        ]);

        listPembobotan::create($validated);
        return redirect('/hitung-kriteria')->with('success', 'Rekrutmen sudah siap dianalisa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listPembobotan  $listPembobotan
     * @return \Illuminate\Http\Response
     */
    public function show(RekrutmenModel $hitung_kriterium)
    {
        $this->authorize('isAdmin');
        return view('list_pembobotan.opsi.show', [
            '_listPembobotan' => KriteriaPerbandingan::where('rekrutmen_model_id', $hitung_kriterium->id)->get(),
            'bobotKriteria' => $hitung_kriterium->KriteriaPlot,
            'list_Pembobotan' => $hitung_kriterium
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listPembobotan  $listPembobotan
     * @return \Illuminate\Http\Response
     */
    public function edit(listPembobotan $listPembobotan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelistPembobotanRequest  $request
     * @param  \App\Models\listPembobotan  $listPembobotan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelistPembobotanRequest $request, listPembobotan $listPembobotan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listPembobotan  $listPembobotan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekrutmenModel $hitung_kriterium)
    {
        $this->authorize('isAdmin');
        if($hitung_kriterium->DaftarRekrutmen->isNotEmpty()){
            $daftar = $hitung_kriterium->DaftarRekrutmen;
            foreach ($daftar as $key => $value) {
                $pemberkasan = $value->Pemberkasan;
                foreach ($pemberkasan as $k => $v) {
                    File::delete(public_path().'/users-file/'.$v->file);
                    Pemberkasan::destroy($v->id);
                }
                DaftarRekrutmen::destroy($value->id);
            }
        }
        if($hitung_kriterium->KriteriaPerbandingan->isNotEmpty()){
            foreach ($hitung_kriterium->KriteriaPerbandingan as $key => $value) {
                KriteriaPerbandingan::destroy($value->id);
            }
        }

        if($hitung_kriterium->KriteriaPlot->isNotEmpty()) {
            foreach ($hitung_kriterium->KriteriaPlot as $key => $value) {
                KriteriaPlot::destroy($value->id);
            }
        }

        RekrutmenModel::where('id', $hitung_kriterium->id)->update([
            "status" => false,
            "is_calculated" => false,
            "is_plotted" =>false,
            "ready_to_announce" =>false,
            "is_announced" =>false,
            "l_max" => 0,
            "c_index" => 0,
            "c_ratio" => 0
        ]);
        return redirect('/hitung-kriteria')->withToastSuccess('Analisa kriteria berhasil direset!');
    }

    public function penyesuaian(RekrutmenModel $hitung_kriterium){
        $this->authorize('isAdmin');
        if($hitung_kriterium->is_plotted == false){
            return view('kriteria.opsi.penyesuaian',[
                'kriteria' => kriteria::all(),
                'rekrutmen' => $hitung_kriterium
            ]);
        }

        return redirect()->back()->with('errors', 'Plotting sudah dilakukan, harap reset.');
    }
    
    public function simpan(Request $request, RekrutmenModel $hitung_kriterium){
        $this->authorize('isAdmin');
        $kriteria_id = array_values($request->except('_token'));
        $loop = count($kriteria_id);
        if($loop > 2){
            for ($i = 0; $i < $loop; $i++) { 
                $datas = [
                    'rekrutmen_model_id' => $hitung_kriterium->id,
                    'kriteria_id' => $kriteria_id[$i]
                ];
                KriteriaPlot::Create($datas);
            }
        }else{
            return redirect()->back()->with('errors', 'Gunakan minimal 3 kriteria!')->withInput();
        }
        
        RekrutmenModel::where('id', $hitung_kriterium->id)->update([
            'is_plotted' => true
        ]);
        return redirect('/hitung-kriteria')->with('success', 'Ploting kriteria berhasil!');
    }

    public function analisa(RekrutmenModel $hitung_kriterium){
        $this->authorize('isAdmin');
        $data = $hitung_kriterium->KriteriaPlot;
        $keys = array();
        foreach ($data as $key => $value) {
            if($value->kriteria->store_nilai == true){
                $keys[$key] = $value->kriteria->id;
            }
        }
        
        if(count($data) > 2){
            if($hitung_kriterium->is_calculated == false){
                $inten = [
                    "1" => "Sama pentingnya",
                    "3" => "Cukup penting", 
                    "5" => "Lebih penting",
                    "7" => "Sangat lebih penting",
                    "9" => "Mutlak lebih penting",
                    "2,4,6,8" => "Apabila ragu dengan dua nilai yang berdekatan",
                    "Kebalikan" => "Perbandingan secara terbalik, nilai 1 akan dibagi dengan nilai intensitas"
                ];
                return view('kriteria.opsi.hitung',[
                    'kriteria' => kriteria::whereIn('id', $keys)->get()->toArray(),
                    'rekrutmen' => $hitung_kriterium,
                    'intensitas' => $inten
                ]);
            }
            else{
                return redirect()->back()->with('errors', 'Silahkan reset pembobotan sebelum melanjutkan!');
            }
        }
        else{
            return redirect()->back()->with('errors', 'Silahkan ploting kriteria sebelum melanjutkan!');
        }
    }
}
