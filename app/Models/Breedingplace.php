<?php

namespace App\Models;

use App\Models\BreedingReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breedingplace extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
        'name',
        'remarks'
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
        return $this->hasMany(BreedingReport::class,'breedingplaces_id');
    }
}
