<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incubationincubator extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
        'name',
        'remarks'
    ];

    public function reproductions()
    {
        return $this->belongsTo(Incubation::class, 'id_incubation');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
 