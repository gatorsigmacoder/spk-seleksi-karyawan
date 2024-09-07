<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Subkriteria;
use App\Http\Requests\StoreSubkriteriaRequest;
use App\Http\Requests\UpdateSubkriteriaRequest;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return view('subkriteria.index',[
            'subkriteria' => Subkriteria::orderBy('kriteria_id', 'asc')->get()
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
        return view('subkriteria.opsi.create', [
            'kriteria' => kriteria::where('store_nilai', true)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubkriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubkriteriaRequest $request)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'subctr_name.*' => 'required|max:255',
            'kriteria_id' => 'required'
        ]);

        foreach ($validated['subctr_name'] as $key => $value) {
            Subkriteria::Create([
                'kriteria_id' => $validated['kriteria_id'],
                'subctr_name' => $value
            ]);
        }
        return redirect('/subkriteria')->withToastSuccess('Subkriteria telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkriteria $subkriterium)
    {
        $this->authorize('isAdmin');
        return view('subkriteria.opsi.edit',[
            'subkriteria' => $subkriterium
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubkriteriaRequest  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubkriteriaRequest $request, Subkriteria $subkriterium)
    {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'subctr_name' => 'required|max:255'
        ]);

        Subkriteria::where('id', $subkriterium->id)->update($validated);
        return redirect('/subkriteria')->withToastSuccess('Subkriteria telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkriteria $subkriterium)
    {
        $this->authorize('isAdmin');
        Subkriteria::destroy($subkriterium->id);
        return redirect('/subkriteria')->withToastSuccess('Subkriteria berhasil dihapus!');
    }
}
