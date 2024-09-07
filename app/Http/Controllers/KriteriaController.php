<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\RekrutmenModel;
use App\Http\Requests\StorekriteriaRequest;
use App\Http\Requests\UpdatekriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        // return kriteria::all();
        return view('kriteria.index', [
            'kriteria' => kriteria::all()
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
        return view('kriteria.opsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekriteriaRequest $request)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'criteria_name' => 'required|max:255',
            'store_berkas' => 'required',
            'store_nilai' => 'required',
            'store_text' => 'required'
        ]);

        Kriteria::Create($validated);
        return redirect('/kriteria')->with('success', 'Data kriteria sudah terdaftar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(RekrutmenModel $kriterium)
    {
        $this->authorize('isAdmin');
        return view('kriteria.index', [
            'kriteria' => $kriterium->kriteria,
            'id' =>$kriterium->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(kriteria $kriterium)
    {
        $this->authorize('isAdmin');
        return view('kriteria.opsi.edit',[
            'kriteria' => $kriterium
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekriteriaRequest  $request
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekriteriaRequest $request, kriteria $kriterium)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'criteria_name' => 'required|max:255',
            'store_berkas' => 'required',
            'store_nilai' => 'required',
            'store_text' => 'required'
        ]);

        Kriteria::where('id', $kriterium->id)->update($validated);
        return redirect('/kriteria')->withToastSuccess('Kriteria berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(kriteria $kriterium)
    {
        $this->authorize('isAdmin');
        Kriteria::destroy($kriterium->id);
        return redirect('/kriteria')->withToastSuccess('Kriteria berhasil dihapus!');
    }
}
