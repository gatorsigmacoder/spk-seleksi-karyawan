<?php

namespace App\Models;

use App\Models\SubkriteriaCompareList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubkriteriaPerbandingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function SubkriteriaCompareList(){
        return $this->belongsTo(SubkriteriaCompareList::class, 'subkriteria_compare_list_id');
    }
}
