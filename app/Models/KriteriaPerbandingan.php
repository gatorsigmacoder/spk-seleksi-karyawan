<?php

namespace App\Models;

use App\Models\RekrutmenModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaPerbandingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function RekrutmenModel(){
        return $this->belongsTo(RekrutmenModel::class, 'rekrutmen_model_id');
    }
}

