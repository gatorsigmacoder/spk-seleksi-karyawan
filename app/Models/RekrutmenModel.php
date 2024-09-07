<?php

namespace App\Models;

use App\Models\kriteria;
use App\Models\KriteriaPlot;
use App\Models\DaftarRekrutmen;
use App\Models\KriteriaPerbandingan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekrutmenModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function KriteriaPerbandingan(){
        return $this->hasMany(KriteriaPerbandingan::class, 'rekrutmen_model_id');
    }

    public function KriteriaPlot(){
        return $this->hasMany(KriteriaPlot::class, 'rekrutmen_model_id');
    }

    public function DaftarRekrutmen(){
        return $this->hasMany(DaftarRekrutmen::class, 'rekrutmen_model_id');
    }

    protected static function booted () {
        static::deleting(function(RekrutmenModel $rek) { // before delete() method call this
             $rek->KriteriaPerbandingan()->delete();
             $rek->KriteriaPlot()->delete();
             $rek->DaftarRekrutmen()->delete();
             // do the rest of the cleanup...
        });
    }
}
