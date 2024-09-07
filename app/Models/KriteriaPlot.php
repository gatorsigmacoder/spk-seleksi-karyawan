<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPlot extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function RekrutmenModel(){
        return $this->belongsTo(RekrutmenModel::class, 'rekrutmen_model_id');
    }

    public function kriteria(){
        return $this->belongsTo(kriteria::class, 'kriteria_id');
    }

}
