<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aviary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks'
    ];

    public function aviaryplace() 
    {
        return $this->hasMany(Aviaryplace::class,'id_aviary');
    }
}
