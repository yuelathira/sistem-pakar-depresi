<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodegejala', 'namagejala'
    ];

    public function pengetahuans()
    {
        return $this->hasMany(Pengetahuan::class);
    }
}
