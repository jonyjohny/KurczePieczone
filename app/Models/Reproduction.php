<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reproduction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function reporductionRow()
    {
        return $this->hasMany(ReproductionRow::class, 'id_reproduction');
    }
}
