<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BreedingReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
    ];

    public function breedingplace()
    {
        return $this->belongsTo(Breedingplace::class, 'breedingplace_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
