<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Pemberkasan;
use Illuminate\Http\Request;
use App\Models\listPembobotan;
use App\Models\RekrutmenModel;
use App\Models\DaftarRekrutmen;
use App\Http\Requests\StorePemberkasanRequest;
use App\Http\Requests\UpdatePemberkasanRequest;

class PemberkasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DaftarRekrutmen $rekrutmen)
    {
        return view('pemberkasan.index', [
            'rekrutmen' => $rekrutmen,
            'pemberkasan' => $rekrutmen->Pemberkasan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pemberkasan $pemberkasan)
    {
        return view('pemberkasan.opsi.create', [
            'pemberkasan' => $pemberkasan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemberkasanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pemberkasan $pemberkasan)
    {
        if($pemberkasan->kriteria->store_berkas == true){
            $data = $request->validate([
                'file' => 'required'
            ]);
    
            $file = $data['file'];
            $clientOriginalName = $file->getClientOriginalName();
            $namaFile = 'users-file'.uniqid().'.'.$file->getClientOriginalExtension();
            $input = [
                'file' => $namaFile,
                'client_file_name' => $clientOriginalName
            ];
            Pemberkasan::where('id', $pemberkasan->id)->update($input);
            $file->move(public_path().'/users-file', $namaFile);
    
            return redirect('/daftar-rekrutmen/pemberkasan/'.$pemberkasan->daftar_rekrutmen_id)->withToastSuccess('File sudah terupload!');
        }
        else{
            $data = $request->validate([
                'description' => 'required'
            ]);
            Pemberkasan::where('id', $pemberkasan->id)->update($data);
            return redirect('/daftar-rekrutmen/pemberkasan/'.$pemberkasan->daftar_rekrutmen_id)->withToastSuccess('Data tersimpan!');
        }

        // $loop = count(array_values($request->except(['_token'])));
        //     for ($i=0; $i < $loop; $i++) { 
        //         $request->validate([
        //             'file_'.$i.'' => 'required'
        //         ]);
        //     }
    
        //     $berkas = $rekrutmen->Pemberkasan;
        //     $IDs = $berkas->pluck('kriteria_id');
        //     $kriteria = kriteria::whereIn('id', $IDs)->get();
    
        //     $data = $request->except(['_token']);
        //     // $file = $data['file_0'];
        //     // return $file->getClientOriginalName();
    
        //     $iteration = 0;
    
        //     foreach ($berkas as $key => $value) {
        //        if($value->kriteria->store_berkas === 1){
        //             $file = $data['file_'.$key.''];
        //             $namaFile = 'users-file'.uniqid().'.'.$file->getClientOriginalExtension();
        //             $input = [
        //                 'file' => $namaFile
        //             ];
        //             Pemberkasan::where('id', $value->id)->update($input);
        //             $data['file_'.$key.'']->move(public_path().'/users-file', $namaFile);
    
        //             $iteration++;
        //        }
        //     }
        //     DaftarRekrutmen::where('id', $rekrutmen->id)->update(['assigned' => true]);
        //     return redirect('/daftar-rekrutmen')->withToastSuccess('File Sudah terupload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemberkasan  $pemberkasan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemberkasan $pemberkasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemberkasan  $pemberkasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemberkasan $pemberkasan)
    {
        return view('pemberkasan.opsi.edit', [
            'pemberkasan' => $pemberkasan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemberkasanRequest  $request
     * @param  \App\Models\Pemberkasan  $pemberkasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemberkasan $pemberkasan)
    {
        $data = $request->validate([
            'description' => 'required'
        ]);
        Pemberkasan::where('id', $pemberkasan->id)->update($data);
        return redirect('/daftar-rekrutmen/pemberkasan/'.$pemberkasan->daftar_rekrutmen_id)->withToastSuccess('Data tersimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemberkasan  $pemberkasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemberkasan $pemberkasan)
    {
        //
    }

    public function openFile(Pemberkasan $file){
        $path = public_path().'/users-file/'.$file->file;
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
