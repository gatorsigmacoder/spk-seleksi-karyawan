<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RekrutmenModel;

class Dashboard extends Controller
{
    public function admin(){
        $this->authorize('isAdmin');
        return view('dashboard.index', [
            'pelamar' => User::where('is_admin', false)->get(),
            'rekrutmen' => RekrutmenModel::all()
        ]);
    }

    public function pelamar(){
        $this->authorize('pendaftar');
        $user_id = auth()->user()->id;
        return view('dashboard.pelamar', [
            'rekrutmen' => RekrutmenModel::where('status', true)->whereDoesntHave('DaftarRekrutmen', function ($query) use ($user_id){
                $query->where('user_id', '=', $user_id);
            })->get()     
        ]);
    }
}
