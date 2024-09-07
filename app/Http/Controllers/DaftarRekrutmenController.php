<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Pemberkasan;
use App\Models\RekrutmenModel;
use App\Models\DaftarRekrutmen;
use App\Http\Requests\StoreDaftarRekrutmenRequest;
use App\Http\Requests\UpdateDaftarRekrutmenRequest;

class DaftarRekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar_rekrutmen.index',[
            'rekrutmen' => DaftarRekrutmen::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('pendaftar');
        // return RekrutmenModel::doesntHave('DaftarRekrutmen')->get(); Left Join
        $user_id = auth()->user()->id;
        return view('daftar_rekrutmen.opsi.create', [
            'rekrutmen' => RekrutmenModel::where('status', true)->whereDoesntHave('DaftarRekrutmen', function ($query) use ($user_id){
                $query->where('user_id', '=', $user_id);
            })->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDaftarRekrutmenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDaftarRekrutmenRequest $request)
    {
        $this->authorize('pendaftar');
        $validated = $request->validate([
            'rekrutmen_model_id' => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;
        DaftarRekrutmen::Create($validated);

        $param = [
            'rekrutmen_model_id' => $validated['rekrutmen_model_id'],
            'user_id' => $validated['user_id']
        ];

        $dr = DaftarRekrutmen::where($param)->first();
        $list_id = RekrutmenModel::where('id', $validated['rekrutmen_model_id'])->first();
        
        $data = $list_id->KriteriaPlot;
        foreach ($data as $key => $value) {
            $datas = [
                'daftar_rekrutmen_id' => $dr->id,
                'kriteria_id' => $value->kriteria->id
            ];
    
            Pemberkasan::Create($datas);
        }

        return redirect('/daftar-rekrutmen')->withToastSuccess('Berhasil menambahkan rekrutmen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarRekrutmen  $daftarRekrutmen
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarRekrutmen $daftar_rekrutman)
    {
        $this->authorize('pendaftar');
        return view('daftar_rekrutmen.opsi.show', [
            'DaftarRekrutmen' => $daftar_rekrutman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarRekrutmen  $daftarRekrutmen
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarRekrutmen $daftarRekrutmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarRekrutmenRequest  $request
     * @param  \App\Models\DaftarRekrutmen  $daftarRekrutmen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaftarRekrutmenRequest $request, DaftarRekrutmen $daftarRekrutmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarRekrutmen  $daftarRekrutmen
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarRekrutmen $daftarRekrutmen)
    {
        //
    }
}
