<?php

namespace App\Models;

use App\Models\Pemberkasan;
use App\Models\RekrutmenModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarRekrutmen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function RekrutmenModel(){
        return $this->belongsTo(RekrutmenModel::class, 'rekrutmen_model_id');
    }

    public function Pemberkasan(){
        return $this->hasMany(Pemberkasan::class, 'daftar_rekrutmen_id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
