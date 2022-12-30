<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incubationincubator extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function incubation()
    {
        return $this->belongsTo(Incubation::class, 'id_incubation');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function incubationreport()
    {
        return $this->hasMany(IncubationReport::class, 'incubationincubator_id');
    }
}
