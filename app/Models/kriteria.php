<?php

namespace App\Models;

use App\Models\Pemberkasan;
use App\Models\Subkriteria;
use App\Models\RekrutmenModel;
use App\Models\SubkriteriaCompareList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Subkriteria(){
        return $this->hasMany(Subkriteria::class);
    }

    public function SubkriteriaPerbandingan(){
        return $this->hasMany(SubkriteriaPerbandingan::class, 'kriteria_id');
    }

    public function Pemberkasan(){
        return $this->hasMany(Pemberkasan::class, 'kriteria_id');
    }
    
    public function KriteriaPlot(){
        return $this->hasMany(KriteriaPlot::class, 'kriteria_id');
    }

    public function rekrutmen(){
        return $this->belongsTo(RekrutmenModel::class);
    }

    protected static function booted () {
        static::deleting(function(Kriteria $kr) { // before delete() method call this
             $kr->Subkriteria()->delete();
             // do the rest of the cleanup...
        });
    }

}
