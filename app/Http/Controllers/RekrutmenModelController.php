<?php

namespace App\Http\Controllers;

use App\Models\Pemberkasan;
use App\Models\KriteriaPlot;
use Illuminate\Http\Request;
use App\Models\listPembobotan;
use App\Models\RekrutmenModel;
use App\Http\Requests\StoreRekrutmenModelRequest;
use App\Http\Requests\UpdateRekrutmenModelRequest;

class RekrutmenModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return view('rekrutmen.index', [
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
        $this->authorize('isAdmin');
        return view('rekrutmen.opsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRekrutmenModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'kuota' => 'required',
            'informasi' => 'required'
        ]);

        RekrutmenModel::create($validated);
        return redirect('/rekrutmen')->with('success', 'Data rekrutmen sudah terdaftar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekrutmenModel  $rekrutmenModel
     * @return \Illuminate\Http\Response
     */
    public function show(RekrutmenModel $rekrutman)
    {
        $this->authorize('isAdmin');
        return view('kriteria.index', [
            'kriteria' => $rekrutman->kriteria,
            'id' =>$rekrutman->id
        ]);
        // return $rekrutman->kriteria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekrutmenModel  $rekrutmenModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RekrutmenModel $rekrutman)
    {
        $this->authorize('isAdmin');
        return view('rekrutmen.opsi.edit', [
            'rekrutmen' => $rekrutman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekrutmenModelRequest  $request
     * @param  \App\Models\RekrutmenModel  $rekrutmenModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekrutmenModelRequest $request, RekrutmenModel $rekrutman)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'name' => 'required|max:255',
            'kuota' => 'required',
            'status' => 'required',
            'informasi' => 'required'
        ]);

        if($validated['status'] == true){
            if($rekrutman->KriteriaPlot->isNotEmpty()){
                RekrutmenModel::where('id', $rekrutman->id)->update($validated);
            }else{
                return back()->withToastSuccess('Mohon plotting kriteria terlebih dahulu!')->withInput();
            }
        }else{
            RekrutmenModel::where('id', $rekrutman->id)->update($validated); 
        }
        return redirect('/rekrutmen')->withToastSuccess('Data rekrutmen sudah terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekrutmenModel  $rekrutmenModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekrutmenModel $rekrutman)
    {
        $this->authorize('isAdmin');
        if($rekrutman->DaftarRekrutmen->isNotEmpty()){
            foreach ($rekrutman->DaftarRekrutmen as $key => $value) {
                if($value->Pemberkasan->isNotEmpty()){
                    Pemberkasan::destroy($value->Pemberkasan->pluck('id'));
                }
            }
        }
        RekrutmenModel::destroy($rekrutman->id);
        return redirect('/rekrutmen')->withToastSuccess('Data rekrutmen sudah terhapus!');
    }
}
