<?php

namespace App\Http\Controllers;

use App\Models\Pemberkasan;
use Illuminate\Http\Request;
use App\Models\RekrutmenModel;
use App\Models\DaftarRekrutmen;

class PrioritasPelamar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return view('prioritas_pelamar.index', [
            'rekrutmen' => RekrutmenModel::all()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RekrutmenModel $prioritas_pelamar)
    {
        $this->authorize('isAdmin');
        return view('prioritas_pelamar.opsi.show', [
            'rekrutmen' => $prioritas_pelamar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarRekrutmen $prioritas_pelamar)
    {
        $this->authorize('isAdmin');
        $kriteria_plot = $prioritas_pelamar->RekrutmenModel->KriteriaPlot;
        
        if ($kriteria_plot->isEmpty()) {
            return redirect()->back()->with('errors', 'Harap lakukan plotting kriteria!');
        }

        foreach ($kriteria_plot as $key => $value) {
            if($value->kriteria->store_nilai == true){
                $subkriteria = $value->kriteria->Subkriteria;
                if($subkriteria->isEmpty()){
                    return redirect()->back()->with('errors', 'Harap tambahkan subkriteria pada kriteria!');
                }
                
                foreach ($subkriteria as $k => $val) {
                    if(empty($val->weight)){
                        return redirect()->back()->with('errors', 'Harap analisa bobot subkriteria!');
                    }
                }
            }
        }

        return view('prioritas_pelamar.opsi.penilaian', [
            'rekrutmen' => $prioritas_pelamar, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarRekrutmen $prioritas_pelamar)
    {
        $this->authorize('isAdmin');
        $id = $prioritas_pelamar->RekrutmenModel->id;
        $data = $prioritas_pelamar->Pemberkasan;
        $datas = array_values($request->except(['_token', '_method']));
        $iteration = 0;
        foreach ($data as $key => $value) {
            if($value->kriteria->store_nilai == true){
                Pemberkasan::where('id', $value->id)->update(['nilai' => $datas[$iteration]]);
                $iteration++;
            }
        }

        return redirect('/prioritas-pelamar/'.$id)->with('success', 'Penilaian berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFile(Pemberkasan $berkas){
        $this->authorize('isAdmin');
        $path = public_path().'/users-file/'.$berkas->file;
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function download(Pemberkasan $berkas){
        $this->authorize('isAdmin');
        $path = public_path().'/users-file/'.$berkas->file;
        return response()->download($path, $berkas->client_file_name);
    }
}
