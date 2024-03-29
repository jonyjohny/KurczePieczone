<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incubation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'closed',
        'archived',
        'name',
        'remarks',
    ];

    public function incubationincubator()
    {
        return $this->hasMany(Incubationincubator::class, 'id_incubation');
    }
}
