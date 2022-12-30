<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breeding extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'breeding';

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function breedingplace()
    {
        return $this->hasMany(Breedingplace::class, 'id_breeding');
    }
}
