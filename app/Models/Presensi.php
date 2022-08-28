<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function subk(){
        return $this->belongsTo(Subk::class);
    }
    public function warga(){
        return $this->belongsTo(Warga::class,'nim','nim');
    }
}
