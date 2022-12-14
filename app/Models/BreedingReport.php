<?php

namespace App\Models;

use App\Models\User;
use App\Models\Breedingplace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BreedingReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
    ];

    public function breedingplace()
    {
        return $this->belongsTo(Breedingplace::class, 'breedingplaces_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
