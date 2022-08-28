<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Warga extends Pivot
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function presensi(){
        return $this->hasMany(Presensi::class,'nim','nim');
    }
}
