<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AnnnounceResult;
use App\Models\RekrutmenModel;
use App\Models\DaftarRekrutmen;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HitungWP extends Controller
{
    public function hitung_wp(RekrutmenModel $rekrutmen){
        $this->authorize('isAdmin');
        $data = $rekrutmen->DaftarRekrutmen;
        $nilai = $rekrutmen->KriteriaPlot;
        foreach ($data as $key => $value) {
            $array = array();
            $i = 0;
            foreach ($value->Pemberkasan as $k => $val) {
                if($val->kriteria->store_nilai == true){
                    $plot = $nilai->where('kriteria_id', $val->kriteria_id)->first();
                    if($plot){
                        $array[$i] = pow($val->nilai, $plot->weight);
                    }else{
                        return redirect()->back()->with('errors', 'Harap lakukan prioritas kriteria!');
                    }
                    $i++;
                } 
            }
            $vec_s = array_product($array);
            DaftarRekrutmen::where('id', $value->id)->update(['vektor_s' => $vec_s]);
        }
        
        $newData = DaftarRekrutmen::where('rekrutmen_model_id', $rekrutmen->id)->get();
        $vector_s = $newData->pluck('vektor_s')->toArray();
        $var = array_sum($vector_s);
        foreach ($newData as $key => $value) {
            $vec_v = $value->vektor_s/$var;
            DaftarRekrutmen::where('id', $value->id)->update(['vektor_v' => $vec_v]);
        }
        
        RekrutmenModel::where('id', $rekrutmen->id)->update(['ready_to_announce' => true]);

        return redirect('/prioritas-pelamar/'.$rekrutmen->id)->with('success', 'Prioritas pelamar berhasil!');
    }

    public function show_rank(RekrutmenModel $rekrutmen){
        $this->authorize('isAdmin');
        return view('prioritas_pelamar.opsi.rank', [
            'rekrutmen' => $rekrutmen->DaftarRekrutmen->sortByDesc('vektor_v')->values(),
            'seleksi' => $rekrutmen
        ]);         
    }
    
    public function rincian_nilai(User $pendaftar){
        $this->authorize('isAdmin');
        return view('prioritas_pelamar.opsi.rincian_nilai', [
            'pendaftar' => $pendaftar->DaftarRekrutmen
        ]);         
    }

    public function announce(RekrutmenModel $rekrutmen){
        $this->authorize('isAdmin');
        $data = $rekrutmen->DaftarRekrutmen->sortByDesc('vektor_v')->skip(0)->take($rekrutmen->kuota);
        foreach ($data as $key => $value) {
            DaftarRekrutmen::where('id', $value->id)->update([
                'is_accepted' => true
            ]);
        }
        
        RekrutmenModel::where('id', $rekrutmen->id)->update([
            'is_announced' => true
        ]);
        
        $users = $rekrutmen->DaftarRekrutmen;
        foreach ($users as $key => $value) {
            $dataEmail = [
                'nama' => $value->User->name,
                'status' => $value->is_accepted
            ];
            Mail::to($value->User->email)->send(new AnnnounceResult($dataEmail));
        }

        return redirect('/prioritas-pelamar/'.$rekrutmen->id)->with('success', 'Berhasil diumumkan!');
    }

    public function cancelAnnounce(RekrutmenModel $rekrutmen){
        $this->authorize('isAdmin');
        $DaftarRekrutmen = $rekrutmen->DaftarRekrutmen;
        foreach ($DaftarRekrutmen as $key => $value) {
            if($value->is_accepted == true){
                DaftarRekrutmen::where('id', $value->id)->update([
                    'is_accepted' => false
                ]); 
            }
        }

        RekrutmenModel::where('id', $rekrutmen->id)->update([
            'is_announced' => false
        ]);
        return redirect('/prioritas-pelamar/'.$rekrutmen->id)->with('success', 'Pengumuman dibatalkan!');
    }

    public function resetPenilaian(RekrutmenModel $rekrutmen){
        $this->authorize('isAdmin');
        if($rekrutmen->is_announced == true){
            return redirect('/prioritas-pelamar/'.$rekrutmen->id)->with('errors', 'Batalkan pengumuman terlebih dahulu!');
        }

        $DaftarRekrutmen = $rekrutmen->DaftarRekrutmen;
        foreach ($DaftarRekrutmen as $key => $value) {
            DaftarRekrutmen::where('id', $value->id)->update([
                'vektor_v' => 0,
                'vektor_s' => 0
            ]); 
        }

        RekrutmenModel::where('id', $rekrutmen->id)->update([
            'ready_to_announce' => false
        ]);
        return redirect('/prioritas-pelamar/'.$rekrutmen->id)->with('success', 'Perangkingan telah direset!');
    }
}
