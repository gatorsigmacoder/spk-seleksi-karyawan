<?php

namespace App\Models;

use App\Models\kriteria;
use App\Models\DaftarRekrutmen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemberkasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function DaftarRekrutmen(){
        return $this->belongsTo(DaftarRekrutmen::class, 'daftar_rekrutmen_id');
    }

    public function kriteria(){
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }
}
