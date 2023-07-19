<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gejala_id', 'believe', 'plausability', 'diagnosa_check'
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
