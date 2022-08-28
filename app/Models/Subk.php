<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subk extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
    public function presensi(){
        return $this->hasMany(Presensi::class);
    }

}
