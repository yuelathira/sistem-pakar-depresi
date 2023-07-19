<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyakit;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'diagnosa_id', 'nilai_akurasi'
    ];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'diagnosa_id', 'id');
    }
}
