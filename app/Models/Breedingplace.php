<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breedingplace extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function breeding()
    {
        return $this->belongsTo(Breeding::class, 'id_breeding');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function breedingreport()
    {
        return $this->hasMany(BreedingReport::class, 'breedingplace_id');
    }
}
